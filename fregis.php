<?php 
$conn=mysqli_connect("localhost","root","","bau");
function registrasi($data){
    global $conn;

    $username =strtolower(stripslashes($_POST["username"]));
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $password2 = mysqli_real_escape_string($conn,$_POST["password2"]);

    //cek username sudah ada atau belum 
   $result =  mysqli_query($conn, "SELECT username from user WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah terdaftar')</script>";
        return false;
    }


    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('salah')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);
    // TAMBAHKAN USER BARU KE DATABASE
    mysqli_query($conn,"INSERT INTO user VALUES('', '$username', '$password')");
    return  mysqli_affected_rows($conn);

    
}
