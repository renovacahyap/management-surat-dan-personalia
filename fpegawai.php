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
    // upload gambar
    $gambar = upload();

    if (!$gambar) {
        $gambar='';
        // return false;
    }



    // insert query 
    $query = "INSERT INTO tb_karyawan VALUES('','$nama','$nidn','$nik','$tl','$tgl','$jabatan','$pendidikan','$alamat','$telp','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //chek gambar sudah diupload atau belum
    if ($error === 4) {
        echo "
            <script>
                alert('Pilih Gambar Terlebih Dahulu!');
            </script>
            ";
        return false;
    }
    // chek apakah yang diupload gambar?
    $ekstensigambarvalid = array('jpg', 'png', 'jpeg');
    $extensigambar = explode('.', $namaFile);
    $extensigambar = strtolower(end($extensigambar));

    if (!in_array($extensigambar, $ekstensigambarvalid)) {
        echo "<script>
                alert('Yang Anda Upload Bukan Gambar!');
                document.location.href='tambah_karyawan.php'
            </script>";
        return false;
    }

    //cek gambar apakah size nya besar?
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Data Terlalu Besar (Max 500 Mb)')
            </script>";
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensigambar;

    move_uploaded_file($tmpName, 'imgkaryawan/' . $namaFileBaru);
    return $namaFileBaru;
}


function ubah()
{
    global $conn;
    $id = $_POST["id"];
    $nama = htmlspecialchars($_POST["nama"]);
    $nidn = htmlspecialchars($_POST["nidn"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $tl = htmlspecialchars($_POST["tl"]);
    $tgl = htmlspecialchars($_POST["tgl"]);
    $jabatan = htmlspecialchars($_POST["jabatan"]);
    $pendidikan = htmlspecialchars($_POST["pendidikan"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $gambarLama = $_POST["gambarlama"];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    // insert query 
    $query = "UPDATE tb_karyawan SET nama='$nama',nidn='$nidn',nik='$nik',tempat_lahir='$tl',tanggal_lahir='$tgl',jabatan='$jabatan',pendidikan='$pendidikan',alamat='$alamat',nomor_telp='$telp',img='$gambar' WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id = $id");
    mysqli_affected_rows($conn);
}
