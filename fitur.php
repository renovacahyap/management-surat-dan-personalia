<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fitur.css">
    <title>Home</title>

</head>

<body>
    <div class="con">
        <div class="logo">
            <img src="img/logo.png">
        </div>
    </div>
    <div class="position">
        <div class="container">
            <div class="card">
                <div class="content">
                    <a href="surat_keluar.php">
                        <h1>Surat Keluar</h1>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="content">
                    <a href="surat_masuk.php">
                        <h1>Surat Masuk</h1>
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="content">
                    <a href="pegawai.php">
                        <h1>Data Karyawan</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="vanilla.js/vanilla-tilt.js"></script>
    <script type="text/javascript">
        VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1
        });
    </script>
</body>

</html>