<?php
require 'functions.php';
$id = $_GET["id"];
$cetak = query("SELECT * FROM rekapitulasi WHERE id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="printstyle.css">
</head>

<body onload="javascript:print()">
    <input type="hidden" name="id" id="id" value="<?php echo $cetak[0]["id"] ?>">

    <div class="content">
        <table style="width: 21.5 cm; height :29.7cm">
            <tr>
                <td colspan="2" style="height: 5cm;">
                    <img src="img/kop.PNG" alt="Kop surat" style="width:21.5 cm; margin-left:0.5cm;">
                </td>
    </div>

    </tr>
    <tr>
        <div class="waktu">
            <td colspan="2" style="vertical-align: bottom; height:1cm; display:absolute;">
                <p style="text-align: right;margin-right:0.5cm; font-family: Times New Roman, Times, serif;"> <?php
                                                                                                                $t = $cetak[0]["tgl_surat"];
                                                                                                                $bulanAngka = date("n", strtotime($t));
                                                                                                                $bulan = getBulan($bulanAngka);
                                                                                                                echo "Kudus,  " . (date("d", strtotime($t))) . " " . $bulan . " " . date("Y", strtotime($t));
                                                                                                                ?></p>
            </td>
        </div>
    </tr>
    <tr>
        <!-- left -->
        <td style="vertical-align: top; width : 15cm; height : 2cm; display :absolute;  font-family: Times New Roman, Times, serif;">
            <p style="margin-left:0.5cm;">Nomor <span>&nbsp; &nbsp;:</span> <?php echo $cetak[0]["nomor_surat"] ?></p>
            <p style="margin-left:0.5cm;">Lamp <span>&nbsp; &nbsp;&nbsp; :</span> <?php echo $cetak[0]["lampiran"] ?></p>
            <p style=" margin-left:0.5cm;">Hal <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?php echo $cetak[0]["perihal"] ?></p>
        </td>
        <!-- right -->
        <td style="vertical-align: top; font-family: Times New Roman, Times, serif;">
            <p style="margin-right:0.5cm;">Kepada : </p>
            <p style="margin-right:0.5cm;">Yth. <?php echo $cetak[0]["tujuan_surat"]; ?></p>
            <p style="margin-right:0.5cm;"><?php echo $cetak[0]["jabatan_tujuan"] ?></p>
            <p>di </p>
            <p style="margin-left: 0.5cm; font-weight: bold; text-decoration: underline;"><?php echo $cetak[0]["alamat"] ?></p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="vertical-align: top; margin-right:0.5cm;">
            <div class="margin" style="margin-right:0.5cm; text-align: justify; text-indent: 50px;word-wrap: break-word;">
                <?php echo $cetak[0]["isi"] ?>
            </div>
        </td>
    </tr>
    <tr>
        <td></td>
        <td style=" height:4cm; display:absolute;">
            <P style="vertical-align: top; text-align:center; margin-top: 0px; font-family: Times New Roman, Times, serif;"><?php echo $cetak[0]["jabatan"] ?> </P>
            <br>
            <br>
            <p style="vertical-align: top; text-align:center; font-family: Times New Roman, Times, serif; font-weight: bold; text-decoration: underline;"><?php echo $cetak[0]["nama"] ?></p>
        </td>
    </tr>
    </table>
    </div>
    </div>
</body>

</html>