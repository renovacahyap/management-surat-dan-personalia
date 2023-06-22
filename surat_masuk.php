<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}



require 'fsuratmasuk.php';
// session_start();
global $row;



// konfigurasi pagination
// $jumlah_dataperhalaman = 2;
// $jumalahdata = count(query("SELECT * FROM tb_suratmasuk"));
// $jumlahhalaman = ceil($jumalahdata / $jumlah_dataperhalaman);
// $halamanAktif = (isset($_GET["pages"])) ? $_GET["pages"] : 1;
// $awalData = ($jumlah_dataperhalaman * $halamanAktif) - $jumlah_dataperhalaman;
// var_dump($jumlahhalaman);

// //limit link
// $jumlahLink = 3;
// if ($halamanAktif > $jumlahLink) {
//     $start_number = $halamanAktif - $jumlahLink;
// } else {
//     $start_number = 1;
// }


// if ($halamanAktif < ($jumlahhalaman - $jumlahLink)) {
//     $end_number = $halamanAktif + $jumlahLink;
// } else {
//     $end_number = $jumlahhalaman;
// }
// end



// $tampil = query("SELECT * FROM tb_suratmasuk LIMIT $awalData,$jumlah_dataperhalaman");
$tampil = query("SELECT * FROM tb_suratmasuk ORDER BY `no` DESC");

// if (isset($_POST["cari"])) {
//     $tampil = cari($_POST["keyword"]);
//     $cari = $_POST["keyword"];
//     $_SESSION['keyword'] = $cari;
// } else {
//     $cari;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="DataTables-1.10.24\js\jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="DataTables-1.10.24\css\jquery.dataTables.min.css">
    <link rel="stylesheet" href="smstyle.css">
</head>

<body>
    <h1>Surat Masuk</h1>
    <form action="" method="POST">
        <button style="background-color: #6EB5FF; color:white; border: none; border-radius: 3px; padding: 8px 12px ;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size:22px;
            margin: 4px 2px;
            cursor: pointer;" formaction="fitur.php"><i class="fa fa-home" style="align-items: center;"></i></button>

        <button style="border-radius: 3px;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
        margin: 4px 4px;
        cursor: pointer;" formaction="smtambah.php">Input Data</button><br>

        <div style="overflow-x:auto;">
            <table border=1 cellspacing="0" cellpadding="10" id="example">
                <thead>
                    <th>No</th>
                    <th>Nomor</th>
                    <th>Alamat Pengirim</th>
                    <th>Tanggal</th>
                    <th>Nomor Surat</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($tampil as $tmp) { ?>
                        <tr>
                            <td>
                                <?php echo $i; ?>
                            </td>
                            <td><?php echo $tmp["nomor_urut"] ?></td>
                            <td><?php echo $tmp["alamat_pengirim"] ?></td>
                            <td><?php echo $tmp["tgl_surat"] ?></td>
                            <td><?php echo $tmp["nomor_surat"] ?></td>

                            <td>
                                <div class="aksi">
                                    <button formaction="smubah.php?id=<?php echo $tmp["no"] ?>" style="background-color: cyan; ">
                                        <i class="fa fa-edit" style="align-items: center; "></i></button>

                                    <button style="background-color: red; color:white;" formaction="smhapus.php?id=<?php echo $tmp["no"] ?>" onclick="return confirm('Yakin Ingin Menghapus?')"><i class="fa fa-trash" style="align-items: center;"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- navigasi pages -->

    </form>

    <!-- <?php if ($halamanAktif > 1) : ?>
        <a href="?pages= <?php echo $halamanAktif - 1; ?> ">&laquo;</a>
    <?php endif ?>

    <?php for ($i = $start_number; $i <= $end_number; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?pages=<?php echo $i; ?>" style="font-weight:bold; background-color:red"> <?php echo $i; ?> </a>

        <?php else : ?>
            <a href="?pages=<?php echo $i; ?>"> <?php echo $i; ?> </a>
        <?php endif; ?>
    <?php endfor ?>

    <?php if ($halamanAktif < $jumlahhalaman) : ?>
        <a href="?pages= <?php echo $halamanAktif + 1; ?> ">&raquo;</a>
    <?php endif ?> -->

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>