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
function tambah()
{
    global $conn;
    $nourut = htmlspecialchars($_POST["nomor_urut"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $tgl = htmlspecialchars($_POST["tgl_surat"]);
    $nosurat = htmlspecialchars($_POST["no_surat"]);
    $lampiran = htmlspecialchars($_POST["lampiran"]);
    $pengolah = htmlspecialchars($_POST["pengolah"]);
    $tglterus = htmlspecialchars($_POST["tgl_diteruskan"]);
    $ttd = htmlspecialchars($_POST["ttd"]);
    // insert query 
    $query = "INSERT INTO tb_suratmasuk VALUES('','$nourut','$alamat','$tgl','$nosurat','$lampiran','$pengolah','$tglterus','$ttd')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;

    $id = $_POST["id"];
    $nourut = htmlspecialchars($_POST["nomor_urut"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $tgl = htmlspecialchars($_POST["tgl_surat"]);
    $nosurat = htmlspecialchars($_POST["no_surat"]);
    $lampiran = htmlspecialchars($_POST["lampiran"]);
    $pengolah = htmlspecialchars($_POST["pengolah"]);
    $tglterus = htmlspecialchars($_POST["tgl_diteruskan"]);
    $ttd = htmlspecialchars($_POST["ttd"]);
    // insert query 
    $query = "UPDATE tb_suratmasuk SET nomor_urut='$nourut',alamat_pengirim='$alamat',tgl_surat='$tgl',nomor_surat='$nosurat',lampiran='$lampiran',pengolah='$pengolah',tgl_diteruskan='$tglterus',ttd='$ttd' WHERE no=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_suratmasuk WHERE no = $id");
    mysqli_affected_rows($conn);
}
function cari($keyword)
{
    $query = "SELECT * FROM tb_suratmasuk WHERE no = '$keyword' ";
    return query($query);
}
