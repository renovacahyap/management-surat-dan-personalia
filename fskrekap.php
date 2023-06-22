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
    $bulan = date("n", time($_POST["tgl"]));
    $romawi = getRomawi($bulan);
    $tahun = date("Y", time($_POST["tgl"]));
    $nomor = htmlspecialchars($_POST["nomor"] . "/" . $_POST["kodejabatan"] . "/" . $_POST["kodehal"] . "/" . $romawi . "/" . $tahun);

    // $nomor = htmlspecialchars($_POST["nomor"]);
    $tgl = htmlspecialchars($_POST["tgl"]);
    $tujuan_surat = htmlspecialchars($_POST["tujuan_surat"]);
    $perihal = htmlspecialchars($_POST["perihal"]);
    // insert query 
    $query = "INSERT INTO rekapitulasi VALUES('','$nomor','','$tujuan_surat','$tgl','$tahun','$perihal','','','','','')";
    mysqli_query($link, $query);
    return mysqli_affected_rows($link);
}
