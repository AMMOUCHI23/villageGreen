<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{

    private $domPdf;

    public function __construct()
    {
        // Options de configuration de Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Ariel'); // Définir la police par défaut

        // Initialisation de Dompdf avec les options
        $this->domPdf = new Dompdf($options);

        // Définir la taille de la page et l'orientation (facultatif)
        $this->domPdf->setPaper('A4', 'landscape');
    }
 
    // Afficher le PDF dans le navigateur
    public function affichePdf($html, $fileName = 'bon_commande.pdf')
    {
        // Charger le HTML dans Dompdf
        $this->domPdf->loadHtml($html);

        // Rendre le PDF
        $this->domPdf->render();

        // Stream le PDF dans le navigateur
        $this->domPdf->stream($fileName, [
            "Attachment" => false // Empêcher le téléchargement automatique
        ]);
    }

    // Générer le PDF et le retourner en tant que chaîne binaire
    public function generePdf($html)
    {
        // Charger le HTML dans Dompdf
        $this->domPdf->loadHtml($html);

        // Rendre le PDF
        $this->domPdf->render();

        // Retourner le contenu du PDF en tant que chaîne binaire
        return $this->domPdf->output();
    }
}
