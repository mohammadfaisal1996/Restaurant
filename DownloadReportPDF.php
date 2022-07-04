<?php
ob_start();
include_once  __DIR__ . '/connectionDb.php';
$database = new connectionDb();
$db = $database->getConnection();


include ("mpdf/mpdf/src/Mpdf.php");
$mpdf=new  mpdf("c","A4","","",0,0,0,0,0,0);

$mpdf->WriteHTML("<h1>Go</h1>");
$mpdf->Output('test.pdf','D');
?>

