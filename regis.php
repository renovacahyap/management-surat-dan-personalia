<?php

require 'fregis.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST > 0)) {
        echo
        "<script>
            alert('user baru berhasil ditambah');
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <!-- <style>
        label {

            display: block;
        }
    </style> -->
    <link rel="stylesheet" href="regis.css">
</head>

<body>


    <div class="user">
        <header class="user__header">
            <img src="img/logo.png" alt="" style="width: 100px;" />
            <h1 class="user__title">Sign-Up Form</h1>
        </header>

        <form action="" method="post" class="form">

            <div class="form__group">
                <input type="text" name="username" id="username" class="form__input" placeholder="Username">
            </div>

            <div class="form__group">

                <input type="password" name="password" id="password" class="form__input" placeholder="Password">
            </div>

            <div class="form__group">

                <input type="password" name="password2" id="password2" class="form__input" placeholder="Konfirmasi Password">
            </div>
            <button type="submit" name="register" class="btn">Register!</button>

        </form>
        <script>
            const button = document.querySelector('.btn')
            const form = document.querySelector('.form')

            button.addEventListener('click', function() {
                form.classList.add('form--no')
            });
        </script>
</body>

</html>