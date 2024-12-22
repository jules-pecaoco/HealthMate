

<?php
ob_start();

// PDF Library
require_once 'library/tcpdf/tcpdf.php';
require_once 'library/tcpdf/config/tcpdf_config.php';

function medicationPDF() {
  $medications = (new MedicationController)->getMedicationById($_SESSION['user']['user_id']);

  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->AddPage();
  $html =
    '
    <h1>Medication List</h1>
    ';

  $medication = $medications;
  $html .= '<table border="1" cellpadding="5" cellspacing="0">';
  $html .= '<tr>';
  $html .= '<th>Medication</th>';
  $html .= '<th>Dosage</th>';
  $html .= '<th>Frequency</th>';
  $html .= '<th>Start Date</th>';
  $html .= '<th>End Date</th>';
  $html .= '</tr>';
  $html .= '<tr>';
  $html .= '<td>' . $medication['med_name'] . '</td>';
  $html .= '<td>' . $medication['dosage'] . '</td>';
  $html .= '<td>' . $medication['frequency'] . '</td>';
  $html .= '<td>' . $medication['interval'] . '</td>';
  $html .= '<td>' . $medication['start_time'] . '</td>';
  $html .= '</tr>';

  $html .= '</table>';
  $pdf->writeHTML($html, true, false, true, false, '');


  ob_end_clean();


  $pdf->Output('medication.pdf', 'I');
}
