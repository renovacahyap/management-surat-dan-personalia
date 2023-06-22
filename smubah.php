<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}




require 'fsuratmasuk.php';
$id = $_GET["id"];

$value = query("SELECT * FROM tb_suratmasuk WHERE no=$id");
//chek apaakah tombol submit sudah ditekan atau belum

if (isset($_POST["submit"])) {
    if (ubah($data) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah')
                document.location.href='surat_masuk.php'
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah')
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
    <title>Ubah Data Surat Masuk</title>
    <link rel="stylesheet" href="smtambah.css">
</head>

<body>
    <h1 style="text-align: center;">EDIT DATA SURAT MASUK</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $value[0]["no"] ?>">
        <label for="nomor_urut">NOMOR URUT</label><input type="text" name="nomor_urut" value="<?php echo $value[0]["nomor_urut"] ?>" required><br>
        <label for="alamat">ALAMAT</label> <input type="text" name="alamat" value="<?php echo $value[0]["alamat_pengirim"] ?>" required><br>
        <label for="tgl_surat">TANGGAL SURAT</label><input type="date" name="tgl_surat" id="tgl_surat" value="<?php echo $value[0]["tgl_surat"] ?>" required><br>
        <label for="no_surat">NO SURAT</label><input type="text" name="no_surat" id="no_surat" value="<?php echo $value[0]["nomor_surat"] ?>" required><br>
        <label for="lampiran">LAMPIRAN</label><input type="text" name="lampiran" id="lampiran" value="<?php echo $value[0]["lampiran"] ?>" required><br>
        <label for="pengolah">PENGOLAH</label><input type="text" name="pengolah" id="pengolah" value="<?php echo $value[0]["pengolah"] ?>" required><br>
        <label for="tgl_diteruskan">TANGGAL DITERUSKAN</label><input type="date" name="tgl_diteruskan" id="tgl_diteruskan" value="<?php echo $value[0]["tgl_diteruskan"] ?>" required><br>
        <label for="ttd">TANDA TANGAN</label> <input type="text" name="ttd" id="ttd" value="<?php echo $value[0]["ttd"] ?>" required><br>
        <button type="submit" name="submit">UBAH</button>
    </form>
</body>

</html>