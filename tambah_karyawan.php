<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}


require 'fpegawai.php';
if (isset($_POST["submit"])) {
    if (tambah() > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan')
            document.location.href='pegawai.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan')
            document.location.href='pegawai.php'
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
    <title>Tambah Datta Karyawan</title>
    <link rel="stylesheet" href="karyawan.css">
</head>

<body>
    <h1 style="text-align: center;">Tambah Data Karyawan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">NAMA</label><input type="text" name="nama" id="nama"><br>
        <label for="nidn">NIDN</label><input type="text" name="nidn" id="nidn"><br>
        <label for="nik">NIK</label><input type="text" name="nik" id="nik"><br>
        <label for="tl">TEMPAT LAHIR</label><input type="text" name="tl" id="tl"><br>
        <label for="tgl">TANGGAL LAHIR</label><input type="date" name="tgl" id="tgl"><br>
        <label for="jabatan">JABATAN</label><input type="text" name="jabatan" id="jabatan"><br>
        <label for="pendidikan">PENDIDIKAN</label><input type="text" name="pendidikan" id="pendidikan"><br>
        <label for="alamat">ALAMAT</label><input type="text" name="alamat" id="alamat"><br>
        <label for="nidn">NO. TELEPON</label><input type="text" name="telp" id="telp"><br>
        <label for="gambar">GAMBAR :</label><input type="file" name="gambar" id="gambar"> <br>
        <button type="submit" name="submit">TAMBAH</button>
    </form>
</body>

</html>