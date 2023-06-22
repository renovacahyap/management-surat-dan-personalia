<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}




require 'fsuratmasuk.php';

if (isset($_POST["submit"])) {
    if (tambah() > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan')
            document.location.href='surat_masuk.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan')
            document.location.href='surat_masuk.php'
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Surat Masuk</title>
    <link rel="stylesheet" href="smtambah.css">
</head>

<body>
    <h1 style="text-align: center;">INPUT DATA SURAT MASUK</h1>
    <form action="" method="post">
        <label for="nomor_urut">NOMOR URUT</label><input type="text" name="nomor_urut"><br>
        <label for="alamat">ALAMAT</label> <input type="text" name="alamat"><br>
        <label for="tgl_surat">TANGGAL SURAT</label><input type="date" name="tgl_surat" id="tgl_surat"><br>
        <label for="no_surat">NO SURAT</label><input type="text" name="no_surat" id="no_surat"><br>
        <label for="lampiran">LAMPIRAN</label><input type="text" name="lampiran" id="lampiran"><br>
        <label for="pengolah">PENGOLAH</label><input type="text" name="pengolah" id="pengolah"><br>
        <label for="tgl_diteruskan">TANGGAL DITERUSKAN</label><input type="date" name="tgl_diteruskan" id="tgl_diteruskan"><br>
        <label for="ttd">TANDA TANGAN</label> <input type="text" name="ttd" id="ttd"><br>
        <button type="submit" name="submit">INPUT</button>
    </form>
</body>

</html>