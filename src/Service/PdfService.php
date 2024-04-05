<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{

    private $domPdf;

    public function __construct()
    {
        // ajouter une option de police 
        $options = new Options();
        $options->set('defaultFont', 'Courier');

        $this->domPdf = new DomPdf($options);
        

        // (Optional) Setup the paper size and orientation
        $this->domPdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        
        //donner un nom au fichier
  
    }
 
    // Fonction pour afficher le PDF dans le navigateur
    public function affichePdf($html)
    {
        // Charger le HTML dans Dompdf
        $this->domPdf->loadHtml($html);

        // Rendre le PDF
        $this->domPdf->render();

        // Stream le PDF dans le navigateur
        $this->domPdf->stream("facture.pdf", [
            "Attachment" => false
        ]);
    }
     // fonction pour générer le pdf
     public function generePdf($html)
     {
         // Charger le HTML dans Dompdf
         $this->domPdf->loadHtml($html);
          // Rendre le PDF
         $this->domPdf->render();
      // Retourner le contenu du PDF en tant que chaîne binaire
         $this->domPdf->output();
         
     }
}
