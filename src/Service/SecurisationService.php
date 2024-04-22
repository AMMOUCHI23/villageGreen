<?php
namespace App\Service;
class SecurisationService
{
    public function securisation(string $donnee) : String {
        // Supprimer les espaces en début et fin de chaîne
        $donnee= trim($donnee);
        // Supprimer les caractères d'échappement (slashes)
        $donnee=stripslashes($donnee);
        // Supprimer les balises HTML et PHP
        $donnee=strip_tags($donnee);
        return $donnee;
    }
}