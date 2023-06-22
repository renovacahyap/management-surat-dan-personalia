<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}


require 'fsuratmasuk.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
    <script> 
        alert('Data Gagal Dihapus');
        document.location.href='surat_masuk.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data Berhasil Dihapus');
        document.location.href='surat_masuk.php';
    </script>
    ";
}
