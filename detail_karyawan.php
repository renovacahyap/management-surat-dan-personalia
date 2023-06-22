<?php
require 'fpegawai.php';
$id = $_GET["id"];

$value = query("SELECT * FROM tb_karyawan WHERE id=$id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan</title>
    <link rel="stylesheet" href="dk.css">
</head>

<body>
    <h1 style="text-align: center;">DETAIL PROFIL KARYAWAN</h1>
    <div class="container">

        <!-- left -->
        <div class="left">
            <img src="imgkaryawan/<?= $value[0]["img"] ?>" alt="<?php echo $value[0]["img"] ?>" width="300" height="400">
        </div>



        <!-- right -->
        <div class="right">
            <ul style="position: relative;
background: #fff;">
                <div id="li">
                    <li hidden> <?php echo $value[0]["id"] ?></li>
                    <li> <span>1</span><?php echo $value[0]["nama"] ?> </li>
                    <li> <span>2</span><?php echo $value[0]["nidn"] ?> </li>
                    <li> <span>3</span><?php echo $value[0]["nik"] ?> </li>
                    <li> <span>4</span><?php echo $value[0]["tempat_lahir"] ?> </li>
                    <li> <span>5</span><?php echo $value[0]["tanggal_lahir"] ?> </li>
                    <li> <span>6</span><?php echo $value[0]["jabatan"] ?> </li>
                    <li> <span>7</span><?php echo $value[0]["pendidikan"] ?> </li>
                    <li> <span>8</span><?php echo $value[0]["alamat"] ?></li>
                    <li> <span>9</span><?php echo $value[0]["nomor_telp"] ?> </li>
                </div>
            </ul>


        </div>

    </div>
</body>

</html>