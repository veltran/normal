<?php   
    use Dompdf\Dompdf;
    include "librerias/dompdf/autoload.inc.php";
    $pdf=new Dompdf();
    $html=file_get_contents("http://localhost/proyecto/normal/pruebadomp.php");
    $pdf->loadHtml($html);
    $pdf->setPaper("A2","landigpage");
    $pdf->render();
    $pdf->stream();

?>