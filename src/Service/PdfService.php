<?php

namespace App\Service;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService {
    // ajouter une option de police 
    $options = new Options();
    $options->set('defaultFont', 'Courier');  
// instantiate and use the dompdf class
$dompdf = new dompdf($options);
$dompdf->loadHtml('hello world');

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
//donner un nom au fichier
$fichier="monFichier.pdf";

// Output the generated PDF to Browser
$dompdf->stream($fichier);
}