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

<body>
    <input type="hidden" name="id" id="id" value="<?php echo $cetak[0]["id"] ?>">
    <div class="kertas">
        <div class="content">
            <table border="1" cellspacing="2px">
                <tr>
                    <td colspan="2" style="height: 5cm;">
                        <div class="gambar" style="display:flex">
                            <img src="img/logo.png" alt="Kop surat" style="width: 15%; height:15%; margin-left:0.5cm;">
                            <div class="item" style="align-items: center;  margin-left:0.5cm; text-align: center; line-height: 0.5;">
                                <h2>POLITEKNIK KUDUS</h2>
                                <h2>SK MENRISTEK DAN DIKTI RI NOMOR 911/KPT/I/2019</h2>
                                <div class="lokasi" style="line-height: 0.1;">
                                    <P>JL. dr. Loekmonohadi No.19 Telp. (0291) 437942 Kudus 59348</P>
                                    <p>Email : <a href="">politeknikkudus@gmail.com</a> </p>
                                </div>
                            </div>

                        </div>

                    </td>

                </tr>
                <tr>
                    <div class="waktu">
                        <td colspan="2" style="vertical-align: bottom; height:1cm; display:absolute;">
                            <p style="text-align: right;margin-right:0.5cm;"> <?php
                                                                                $t = $cetak[0]["tgl_surat"];
                                                                                echo "Kudus,  " . (date("d F Y", strtotime($t)));
                                                                                ?></p>
                        </td>
                    </div>
                </tr>
                <!-- left -->
                <td style="vertical-align: top; width : 13cm; height : 2cm; display :absolute; ">
                    <p style="margin-left:0.5cm;">Nomor : <?php echo $cetak[0]["nomor_surat"] ?></p>
                    <p style="margin-left:0.5cm;">Lamp : <?php echo $cetak[0]["lampiran"] ?></p>
                    <p style=" margin-left:0.5cm;">Hal: <?php echo $cetak[0]["perihal"] ?></p>
                </td>
                <!-- right -->
                <td style="vertical-align: top;">
                    <p style="margin-right:0.5cm;">Kepada : </p>
                    <p style="margin-right:0.5cm;">Yth. <?php echo $cetak[0]["tujuan_surat"]; ?></p>
                    <p style="margin-right:0.5cm;"><?php echo $cetak[0]["jabatan_tujuan"] ?></p>
                    <p style="margin-right:0.5cm;"><?php echo $cetak[0]["alamat"] ?></p>
                </td>
                </tr>
                <tr>
                    <td colspan="2" style="vertical-align: top; margin-right:0.5cm;">
                        <p style="margin-left:0.5cm; margin-right:0.5cm;">Dengan hormat,</p>
                        <div class="margin" style="margin-right:0.5cm; text-align: justify; text-indent: 50px; ">
                            <?php echo $cetak[0]["pembukaan"] ?>
                            <?php echo $cetak[0]["isi"] ?>
                            <?php echo $cetak[0]["penutup"] ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style=" height:4cm; display:absolute;">
                        <P style="vertical-align: top; text-align:center; margin-top:40px; "><?php echo $cetak[0]["jabatan"] ?> </P>
                        <p style="vertical-align: top; text-align:center; line-height: 10;"><?php echo $cetak[0]["nama"] ?></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>