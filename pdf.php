<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:

require 'functions.php';
$id = $_GET["id"];
$cetak = query("SELECT * FROM rekapitulasi WHERE id=$id");

$stylesheet = file_get_contents('printstyle.css');
$mpdf = new \Mpdf\Mpdf();
// Write some HTML code:
$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="printstyle.css">
</head>

<body>
    <input type="hidden" name="id" id="id" value="' . $cetak[0]["id"] . '">
    
            <table border="1" cellspacing="2px">
                <tr>
                    <td>
                        <img src="img/logo.png" alt="Kop surat" style="width: 15%; height:15%; margin-left:0.5cm; float:left;">
                  </td>
                  <td>
                  <div class="kanan" style="text-align: center;">
                        <h2 style="margin-right: 50px;">POLITEKNIK KUDUS</h2>
                        <h2>SK MENRISTEK DAN DIKTI RI NOMOR 911/KPT/I/2019</h2>
                        <div class="lokasi" style="line-height: 0.1;">
                        <p>JL. dr. Loekmonohadi No.19 Telp. (0291) 437942 Kudus 59348</p>
                        <p>Email : <a href="">politeknikkudus@gmail.com</a> </p>
                        </div>
                    </td>
                    
                </tr>
                <tr>
                    
                        <td colspan="2">
                             <p style="text-align:right">';
$html .= 'Kudus, ' . (date("d F Y", strtotime($cetak[0]["tgl_surat"])));
$html .= '</p>
                            </td>
                </tr>';
$html .= '<!-- left -->
<tr>
                    <td>
                        <p>Nomor: ' . $cetak[0]["nomor_surat"] . '</p>
                        <p>Lamp :' . $cetak[0]["lampiran"] . '</p>
                        <p>Hal: ' . $cetak[0]["perihal"] . '</p>
                    </td>
                    
                    <!-- right -->
                    <td>
                        <p style="margin-right:0.5cm; padding-left: 50px;">Kepada : </p>
                        <p style="margin-right:0.5cm;">Yth. ' . $cetak[0]["tujuan_surat"] . '</p>
                        <p style="margin-right:0.5cm;">jabatan</p>
                        <p style="margin-right:0.5cm;">di Kudus</p>
                    </td>
                    </tr>';

$html .= '<tr>
                        <td colspan="2">
                            <p>Dengan hormat,</p>
                            ' . $cetak[0]["pembukaan"] . '</p>
                            ' . $cetak[0]["isi"] . '</p>
                            ' . $cetak[0]["penutup"] . '</p>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td >
                            <P>' . $cetak[0]["jabatan"] . ' </P>
                            <p >Nama</p>
                        </td>
                    </tr>';
$html .= ' </table>
            </div>
        </div>
</body>
</html>';
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

// Output a PDF file directly to the browser
$mpdf->Output();
