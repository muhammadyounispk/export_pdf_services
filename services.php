<?php
include_once 'functions.php';
switch($_GET['case')
{

case 'export_pdf':
        if (isset($_POST['pdf_content']) && !empty($_POST['pdf_content'])) {
            $pdf_name = $_POST['pdf_name'];
            $pdf_content = $_POST['pdf_content'];
            $content = get_html('report');
            $content = str_replace('{report_name}', $pdf_name, $content);
            $content = str_replace('{content}', $pdf_content, $content);
            $content = str_replace('<div class="col-lg-6 text-right">', '<div class="col-lg-6 text-right" style="float: right; width: 300px; margin-top: -24px;">', $content);
            $data = str_replace('<b>', '<b style="font-weight: bold !important;">', $content);
            create_pdf($data, $pdf_name, TRUE);
        }
        break;

    case 'export_excel':
        if (isset($_POST['pdf_content']) && !empty($_POST['pdf_content'])) {
            $pdf_name = $_POST['pdf_name'];
            $pdf_content = $_POST['pdf_content'];
            $file = "$pdf_name.xls";
            $test = "<table border=1>2</table>";
//            header("Content-type: application/vnd.ms-excel");
//            header("Content-Disposition: attachment; filename=$file");
            echo $test;
        }
        
        }
        
        ?>
