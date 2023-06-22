<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}


require 'fpegawai.php';
$id = $_GET["id"];

$value = query("SELECT * FROM tb_karyawan WHERE id=$id");
//chek apaakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    if (ubah($data) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah')
                document.location.href='pegawai.php'
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Ubah')
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
    <h1 style="text-align: center;">EDIT DATA KARYAWAN</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $value[0]["id"] ?>">
        <input type="hidden" name="gambarlama" value="<?php echo $value[0]["img"] ?>">
        <label for="nama">NAMA</label><input type="text" name="nama" id="nama" value="<?php echo $value[0]["nama"] ?>"><br>
        <label for="nidn">NIDN</label><input type="text" name="nidn" id="nidn" value="<?php echo $value[0]["nidn"] ?>"><br>
        <label for="nik">NIK</label><input type="text" name="nik" id="nik" value="<?php echo $value[0]["nik"] ?>"><br>
        <label for="tl">TEMPAT LAHIR</label><input type="text" name="tl" id="tl" value="<?php echo $value[0]["tempat_lahir"] ?>"><br>
        <label for="tgl">TANGGAL LAHIR</label><input type="date" name="tgl" id="tgl" value="<?php echo $value[0]["tanggal_lahir"] ?>"><br>
        <label for="jabatan">JABATAN</label><input type="text" name="jabatan" id="jabatan" value="<?php echo $value[0]["jabatan"] ?>"><br>
        <label for="pendidikan">PENDIDIKAN</label><input type="text" name="pendidikan" id="pendidikan" value="<?php echo $value[0]["pendidikan"] ?>"><br>
        <label for="alamat">ALAMAT</label><input type="text" name="alamat" id="alamat" value="<?php echo $value[0]["alamat"] ?>"><br>
        <label for="nidn">NO. TELEPON</label><input type="text" name="telp" id="telp" value="<?php echo $value[0]["nomor_telp"] ?>"><br>
        <img src="imgkaryawan/<?php echo $value[0]["img"] ?>" alt="<?php echo $value[0]["img"] ?>" width="300" style="margin-left: 200px;"><br>
        <label for="gambar">GAMBAR</label><input type="file" name="gambar" id="gambar"><br>
        <button type="submit" name="submit">UBAH</button>
    </form>
</body>

</html>