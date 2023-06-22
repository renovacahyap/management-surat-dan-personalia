<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
require 'functions.php';
$id = $_GET["id"];
$cetak = query("SELECT * FROM rekapitulasi WHERE id=$id");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cetak.css">
</head>
<body>
    <input type="hidden" name="id" id="id" value="' . $cetak[0]["id"] . '">
    <table border=1 cellspacing="0" cellpadding="10">
        <tr>
            <td colspan="2"> <img src="" alt="Kop surat"></td>

        </tr>
        <tr>
            <div class="waktu">
                <td colspan="2">
                    <p>';
$html .= 'Kudus,';
$html .= (date("d F Y", time()));
'</p>
                </td>
            </div>
        </tr>';
$html .=     '<tr>
            <div class="nlh">
                <!-- nomor -->
        <tr>
            <td>
                <p>Nomor:' .  $cetak[0]["nomor_surat"] . '</p>
            </td>
            <td>
                <p>Kepada : </p>
            </td>
        </tr>
        <!-- lampiran -->
        <tr>
            <td>
                <p>Lamp :' . $cetak[0]["lampiran"] . '</p>
            </td>
            <td>
                <p>Yth. ' . $cetak[0]["tujuan_surat"] . '</p>
            </td>
        </tr>
        <!-- perihal -->
        <tr>
            <td>
                <p>Hal:' . $cetak[0]["perihal"] . '</p>
            </td>
            <td>
                <p>jabatan</p>
                <p>di Kudus</p>
            </td>
        </tr>
        <br>
        </div>
        </tr>';
$html .=  '<tr>
            <td colspan="2">
                <p>Dengan hormat,</p>
            </td>
        </tr>
        <div class="indent">
            <!-- pembukaan -->
            <tr>
                <td colspan="2">' .
    $cetak[0]["pembukaan"]
    . '</td>
            </tr>
            <!-- isi -->
            <tr>
                <td colspan="2">
                    ' . $cetak[0]["isi"] . '
                </td>
            </tr>
            <!-- penutup -->
            <tr>
                <td colspan="2">
                    ' . $cetak[0]["penutup"] . '
                </td>
            </tr>
        </div>
        <tr>
            <td colspan="2">
                <P>Jabatan</P>
                <p>Nama</p>
            </td>
        </tr>';
$html .= '</table>
</body>
</html>';
// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('');
