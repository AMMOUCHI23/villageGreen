<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'make:puml',
    description: 'Create puml class diagram from Entities declared in `src/Entity`',
)]
class PumlCommand extends Command
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {

        $this->manager = $manager;
        parent::__construct();
    }


    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Load all entities classes
        $this->manager->getMetadataFactory()->getAllMetadata();

        $entities = [];
        $graph = [];

        foreach (get_declared_classes() as $value) {
            $entity_name = "";
            $reflector = new \ReflectionClass($value);
            $attr = $reflector->getAttributes();
            // Get entity's short name
            $entity_name = array_reduce($attr, fn ($previous, $a) => $a->getName() == "Doctrine\ORM\Mapping\Entity" ? $previous . $reflector->getShortName() : $previous);
            if ($entity_name) {

                $properties = [];
                $props = $reflector->getProperties();
                foreach ($props as $p) {
                    // echo "**** " . $p->getName() . "\n";
                    // if ($p->getName() == "Doctrine\ORM\Mapping\Entity") {
                    // $entities[] = $name;
                    // }
                    $p_attrs = $p->getAttributes();
                    foreach ($p_attrs as $p_a) {
                        // echo ">>>>>>>> " . $p_a->getName() . "\n";
                        if ($p_a->getName() == "Doctrine\ORM\Mapping\Column") {
                            $properties[] = $p->getName();
                        }
                        // $last = explode("\\",$p_a->getName());
                        @$last = end((explode("\\", $p_a->getName())));
                        if (in_array($last, ["OneToMany", "ManyToOne", "ManyToMany", "OneToOne"])) {
                            $args = $p_a->getArguments();
                            foreach ($args as $arg_k => $arg_v) {
                                $graphAdd = false;
                                if ($arg_k == "targetEntity") {
                                    if (!array_key_exists("inversedBy", $args)) {
                                        $graphAdd = true;
                                    }
                                }
                                if ($graphAdd) {
                                    $graph[] = [$reflector->getShortName(), @end((explode("\\", $arg_v))), $last];
                                }
                            }
                            $properties[] = "**" . $p->getName() . "**";
                        }
                    }
                }
                $entities[$entity_name] = $properties;
            }
        }

        // var_dump($graph);

        // Generate puml data
        $data = "";
        foreach ($entities as $key => $props) {
            $data .= "class $key {\n";
            foreach ($props as $v) {
                $data .= "\t$v\n";
            }
            $data .= "}\n\n";
        }

        foreach ($graph as $v) {
            if ($v[2] == "OneToMany")
                $data .= $v[0] . " \"1\"--\"*\" " . $v[1] . "\n";
            if ($v[2] == "ManyToOne")
                $data .= $v[0] . " \"*\"--\"1\" " . $v[1] . "\n";
            if ($v[2] == "ManyToMany")
                $data .= $v[0] . " \"*\"--\"*\" " . $v[1] . "\n";
            if ($v[2] == "OneToOne")
                $data .= $v[0] . " \"1\"--\"1\" " . $v[1] . "\n";
        }

        $data .= "\n\nhide methods\nhide circle\n\n";
        file_put_contents("./puml/index.puml", $data);

        $data_url = encodep($data);

        $plant_url = "https://www.plantuml.com/plantuml/png/" . $data_url;

        $curl_cmd = "curl --silent $plant_url --output - > puml/index.png";
        // echo "Execute :\n" . $curl_cmd . "\n";

        if (!file_exists('puml/')) {
            mkdir('puml');
        }

        system($curl_cmd);

        return Command::SUCCESS;
    }
}



function encodep($text)
{
    // $data = utf8_encode($text);
    $data = mb_convert_encoding($text, "UTF-8");
    $compressed = gzdeflate($data, 9);
    return encode64($compressed);
}

function encode6bit($b)
{
    if ($b < 10) {
        return chr(48 + $b);
    }
    $b -= 10;
    if ($b < 26) {
        return chr(65 + $b);
    }
    $b -= 26;
    if ($b < 26) {
        return chr(97 + $b);
    }
    $b -= 26;
    if ($b == 0) {
        return '-';
    }
    if ($b == 1) {
        return '_';
    }
    return '?';
}

function append3bytes($b1, $b2, $b3)
{
    $c1 = $b1 >> 2;
    $c2 = (($b1 & 0x3) << 4) | ($b2 >> 4);
    $c3 = (($b2 & 0xF) << 2) | ($b3 >> 6);
    $c4 = $b3 & 0x3F;
    $r = "";
    $r .= encode6bit($c1 & 0x3F);
    $r .= encode6bit($c2 & 0x3F);
    $r .= encode6bit($c3 & 0x3F);
    $r .= encode6bit($c4 & 0x3F);
    return $r;
}

function encode64($c)
{
    $str = "";
    $len = strlen($c);
    for ($i = 0; $i < $len; $i += 3) {
        if ($i + 2 == $len) {
            $str .= append3bytes(ord(substr($c, $i, 1)), ord(substr($c, $i + 1, 1)), 0);
        } else if ($i + 1 == $len) {
            $str .= append3bytes(ord(substr($c, $i, 1)), 0, 0);
        } else {
            $str .= append3bytes(
                ord(substr($c, $i, 1)),
                ord(substr($c, $i + 1, 1)),
                ord(substr($c, $i + 2, 1))
            );
        }
    }
    return $str;
}
