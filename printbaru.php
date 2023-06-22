<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';
$id = $_GET["id"];
$cetak = query("SELECT * FROM rekapitulasi WHERE id=$id");






// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="printstyle.css"> -->
</head>

<body>
    <input type="hidden" name="id" id="id" value=" ';
$html .= $cetak[0]["id"];
$html .= '">
    <div class="kertas">
        <div class="content">
            <table border="1">
                <tr>
                    <td colspan="2" style="height: 0cm;">
                        <img src="img/kopsurat.PNG" alt="Kop surat" style="width:21.5 cm; margin-left:0.5cm;">

        </div>
    </div>
                     </td>

    </tr>
    <tr>
        <div class="waktu">
            <td colspan="2" style="vertical-align: bottom; height:1cm; display:absolute;">
                <p style="text-align: right; margin-right:0.5cm;"> ';
$html .=    "Kudus,  ";
$html .= (date("d", strtotime($cetak[0]["tgl_surat"]))) . " " . getBulan(date("n", strtotime($cetak[0]["tgl_surat"]))) . " " . date("Y", strtotime($cetak[0]["tgl_surat"]));
$html .= '</p>
            </td>
        </div>
    </tr>';

$html .= '   <!-- left -->
<tr>
    <td style="vertical-align: top; width : 15cm; height : 2cm; display :absolute; ">
        <p style="margin-left:0.5cm;">Nomor <span>&nbsp; &nbsp;:</span> ' . $cetak[0]["nomor_surat"] . '</p>
        <p style="margin-left:0.5cm;">Lamp <span>&nbsp; &nbsp;&nbsp; :</span> ' . $cetak[0]["lampiran"] . '</p>
        <p style=" margin-left:0.5cm;">Hal <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> ' . $cetak[0]["perihal"] . '</p>
    </td> ';

$html .=   '<!-- right -->
    <td style="vertical-align: top;">
        <p style="margin-right:0.5cm;">Kepada : </p>
        <p style="margin-right:0.5cm;">Yth. ' . $cetak[0]["tujuan_surat"] . '</p>
        <p style="margin-right:0.5cm;">' . $cetak[0]["jabatan_tujuan"] . '</p>
        <p style="margin-right:0.5cm;">' . $cetak[0]["alamat"] . ' </p>
    </td>
    </tr>';
$html .= '<tr>
    <td colspan="2" style="vertical-align: top; margin-right:0.5cm;">
        <p style="margin-left:0.5cm; margin-right:0.5cm;">Dengan hormat,</p>
        <div class="margin" style="margin-right:0.5cm; text-align: justify; text-indent: 50px;">
            ' . $cetak[0]["pembukaan"] . '
            ' . $cetak[0]["isi"] . '
            ' . $cetak[0]["penutup"] . '
        </div>
    </td>
</tr>
<tr>
    <td></td>
    <td style=" height:4cm; display:absolute;">
        <P style="vertical-align: top; text-align:center; margin-top:40px; ">' . $cetak[0]["jabatan"] . '</P>
        <p style="vertical-align: top; text-align:center; line-height: 10;">' . $cetak[0]["nama"] . '</p>
    </td>
</tr>';
$html .=   '</table>
    </div>
    </div>
</body>

</html>';



// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
