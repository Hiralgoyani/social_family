<?php
require_once( UNYSON_EVENT_HELPER_DIR . '/vendor/autoload.php');
use Dompdf\Dompdf;

function bearsthemes_event_export_booking_data_pdf($content, $name = 'data_file.pdf') {
  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  $dompdf->loadHtml($content);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'landscape');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF to Browser
  $dompdf->stream($name);
}
