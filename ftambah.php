<?php
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "bau");

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($_POST["nama"]);
    $nidn = htmlspecialchars($_POST["nidn"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $tl = htmlspecialchars($_POST["tl"]);
    $tgl = htmlspecialchars($_POST["tgl"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $pendidikan = htmlspecialchars($_POST["pendidikan"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $telp = htmlspecialchars($_POST["telp"]);
    // $gambar = htmlspecialchars($_POST["gambar"]);
    // insert query 
    $query = "INSERT INTO tb_karyawan VALUES('','$nama','$nidn','$nik','$tl','$tgl','$jabatan','$pendidikan','$alamat','$telp')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
