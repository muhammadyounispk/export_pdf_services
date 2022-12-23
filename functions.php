<?php

function create_pdf($html, $file_name, $download = FALSE) {
    global $site_root;
    $path = $_SERVER['DOCUMENT_ROOT'] . $site_root . 'uploads/reports/';
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    if (strpos($file_name, "Monthly") !== false) {
        $dompdf->set_paper('A4', 'landscape');
    } else if ($file_name == "SRH Main Services - Yearly Continuous Trend Report") {
        $dompdf->set_paper('A4', 'landscape');
    } else if ($file_name == "Motivational Services Data Consolidation Report") {
        $dompdf->set_paper('A4', 'landscape');
    } else {
        $dompdf->setPaper('A4', 'portrait');
    }
    $dompdf->render();
    //$dompdf->getCanvas()->page_text(560, 25, "{PAGE_NUM} of {PAGE_COUNT}", NULL, 10, array(0, 0, 0));
    $pdf = $path . $file_name . '.pdf';
    file_put_contents($pdf, $dompdf->output());
    header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
    header('Pragma: no-cache'); // HTTP 1.0
    header('Expires: 0');
    if ($download == TRUE) {
        $dompdf->stream($file_name, array('Attachment' => 1));
    } else {
        return $file_name;
    }
}

function get_html($template) {
    $myFile = $template . ".html";
    $fh = fopen($myFile, 'r');
    $content = fread($fh, filesize($myFile));
    fclose($fh);
    return $content;
}

?>
