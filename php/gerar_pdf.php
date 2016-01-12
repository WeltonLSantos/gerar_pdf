<?php
$nameCliente		= utf8_encode($_POST['nameCliente']);
$cpfCliente			= utf8_encode($_POST['cpfCliente']);
$emailCliente		= utf8_encode($_POST['emailCliente']);

// PEGA O ARQUIVO MODELO
$pdf = file_get_contents("../modelo.html");

// SUBSTITUI COM OS DADOS FORNECIDOS
$pdf = str_replace("#nameCliente","$nameCliente",$pdf);
$pdf = str_replace("#cpfCliente","$cpfCliente",$pdf);
$pdf = str_replace("#emailCliente","$emailCliente",$pdf);

// SOLICITA A CLASS MPDF
require_once("mpdf/mpdf.php");

// INSTANCIA A CLASS MPDF
$mpdf = new mPDF();

// ESCREVE O PDF
$mpdf->WriteHTML($pdf);

// SAIDA DO PDF NO NAVEGADOR
$mpdf->Output("Relatório - ".$nome.".pdf","D");
// SE QUISER SALVAR É SÓ DIRECIONAR O DIRETORIO
//$arquivo_contrato = $mpdf->Output("../requerimentos/".$nome.".pdf");