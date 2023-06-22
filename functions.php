<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bau";
$link = mysqli_connect($host, $user, $password, $database);

//mengganti romawi
function getRomawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}


function query($query)
{
    global $link;

    $result = mysqli_query($link, $query);

    $rows = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah()
{
    global $link;
    //penomoran
    $bulan = date("n", time());
    $romawi = getRomawi($bulan);
    $tahun = date("Y", time());
    $nomor = htmlspecialchars($_POST["nomor"] . "/" . $_POST["kodejabatan"] . "/" . $_POST["kodehal"] . "/" . $romawi . "/" . $tahun);

    $lampiran = htmlspecialchars($_POST["lampiran"] . " " . $_POST["selectlampiran"]);

    $perihal = htmlspecialchars($_POST["perihal"]);


    $tgl = htmlspecialchars(date("Y-m-d", time()));
    $tujuan_surat = htmlspecialchars($_POST["tujuan_surat"]);
    $jabatan_tujuan = htmlspecialchars($_POST["jabatan_tujuan"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    // textarea
    // $pembukaan = $_POST["pembukaan"];
    $isi = $_POST["isi"];
    // $penutup = $_POST["penutup"];

    // tanda tangan

    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $nama =  htmlspecialchars($_POST["namattd"]);
    // insert query 
    $query = "INSERT INTO rekapitulasi VALUES('','$nomor','$lampiran','$tujuan_surat','$tgl','$tahun','$perihal','$jabatan_tujuan','$alamat','$isi','$jabatan','$nama')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}

function kode_jabatan()
{
    global $link;
    $query = "SELECT * FROM kode_jabatan";
    $result = mysqli_query($link, $query);
}

function ubah($data)
{
    global $link;

    $id = $_POST["id"];
    $nomor = htmlspecialchars($_POST["nomor"]);
    $lampiran = htmlspecialchars($_POST["lampiran"]);
    $tujuan_surat = htmlspecialchars($_POST["tujuan_surat"]);
    $tgl = htmlspecialchars($_POST["tgl_surat"]);
    $hal = htmlspecialchars($_POST["perihal"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    // textarea
    // $pembukaan = $_POST["pembukaan"];
    $isi = $_POST["isi"];
    // $penutup = $_POST["penutup"];

    // tanda tangan

    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $nama =  htmlspecialchars($_POST["namattd"]);
    // insert query 
    $query = "UPDATE rekapitulasi SET nomor_surat='$nomor',lampiran='$lampiran',tujuan_surat='$tujuan_surat',tgl_surat='$tgl',perihal='$hal',alamat='$alamat',isi='$isi',jabatan='$jabatan',nama='$nama' WHERE id=$id";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}
function hapus($id)
{
    global $link;
    mysqli_query($link, "DELETE FROM rekapitulasi WHERE id=$id");
    mysqli_affected_rows($link);
}
