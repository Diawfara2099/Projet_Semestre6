<?php
require_once '../../vendor/autoload.php';

// TCPDF namespace is not needed, just instantiate it directly
// use TCPDF; // This line can be removed if not using namespaces

// Fetch the payment details from the database
require_once '../../Database/paiement_db.php';

// Get the payment ID from the query parameter
$paiementId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch payment details
$paiement = getPaiementById($paiementId);

// Create new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Payment Receipt');
$pdf->SetSubject('Payment Details');

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Add content
$html = "
<h1>Payment Details</h1>
<p><strong>ID Paiement:</strong> {$paiement->id}</p>
<p><strong>Date de Paiement:</strong> {$paiement->date_paiement}</p>
<p><strong>ID Contrat:</strong> {$paiement->contrat_id}</p>
<p><strong>Nom du Client:</strong> {$paiement->client_nom}</p>
<p><strong>Prenom du Client:</strong> {$paiement->client_prenom}</p>
<p><strong>ID Gestionnaire:</strong> {$paiement->gestionnaire_id}</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF as a file
$pdf->Output('payment_' . $paiement->id . '.pdf', 'I'); // 'I' for inline display in the browser, 'D' for download
