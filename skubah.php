<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}


require 'functions.php';
$id = $_GET["id"];

$value = query("SELECT * FROM rekapitulasi WHERE id=$id");
//chek apaakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    if (ubah($data) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah')
                document.location.href='surat_keluar.php'
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah')
                document.location.href='surat_keluar.php'
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
    <title>Edit Data Surat Keluar</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="skubahbaru.css">
</head>

<body style="width: 21.5cm; margin:auto">
    <h1 style="text-align: center;">Ubah Data Surat Keluar</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $value[0]["id"] ?>">
        <label for="nomor">NOMOR </label> <input type="text" name="nomor" id="nomor" required value="<?php echo $value[0]["nomor_surat"] ?>"><br>
        <label for="lampiran">LAMPIRAN </label> <input type="text" name="lampiran" id="lampiran" required value="<?php echo $value[0]["lampiran"] ?>"><br>
        <label for="tujuan_surat">TUJUAN SURAT </label><input type="text" name="tujuan_surat" id="tujuan_surat" required value="<?php echo $value[0]["tujuan_surat"] ?>"><br>
        <label for="tgl_surat">TANGGAL SURAT </label><input type="text" name="tgl_surat" id="tgl_surat" required value="<?php echo $value[0]["tgl_surat"] ?>"><br>
        <label for="perihal">PERIHAL </label><input type="text" name="perihal" id="perihal" required value="<?php echo $value[0]["perihal"] ?>"><br>
        <label for="alamat">ALAMAT </label><input type="text" name="alamat" id="alamat" required value="<?php echo $value[0]["alamat"] ?>"><br>
        <label for="isi">ISI </label><textarea style="width: 109%;" name="isi" id="isi" cols="30" rows="10"><?php echo $value[0]["isi"] ?></textarea> <br>
        <label for="jabatan">JABATAN </label><input type="text" name="jabatan" id="jabatan" required value="<?php echo $value[0]["jabatan"] ?>"><br>
        <label for="namattd">NAMA </label><input type="text" name="namattd" id="namattd" required value="<?php echo $value[0]["nama"] ?>"><br>
        <button type="submit" name="submit">UBAH DATA</button>

    </form>
    <script type="text/javascript">
        window.onload = function() {

            CKEDITOR.replace('isi', {
                uiColor: '#87c6e1'
            });

        }
    </script>
</body>

</html>