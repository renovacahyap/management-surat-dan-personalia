<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}





require 'functions.php';
global $row;
$tampil = query("SELECT * FROM rekapitulasi ORDER BY `id` DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keluar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="DataTables-1.10.24\js\jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="DataTables-1.10.24\css\jquery.dataTables.min.css">
    <link rel="stylesheet" href="surat_keluar.css">
</head>

<body>
    <h1 style="text-align: center;">REKAPITULASI SURAT KELUAR</h1>
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
        cursor: pointer;" formaction="form.php">Form Surat</button>
        <button style="border-radius: 3px;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
        margin: 4px 4px;
        cursor: pointer;" formaction="skrekap.php">Rekap Surat</button>
        <table id="example">
            <thead>
                <tr>
                    <th style="border-radius: 15px 0px 0px 0px;">No.</th>
                    <th>Aksi</th>
                    <th>Nomor Surat</th>
                    <th>Tujuan Surat</th>
                    <th>Tanggal</th>
                    <th style="border-radius: 0px 15px 0px 0px;">Perihal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($tampil as $tmp) { ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <button style="background-color: #6EB5FF; color:white; border: none; border-radius: 3px; cursor:pointer;" formaction="skubah.php?id=<?php echo $tmp["id"] ?>"><i class="fa fa-edit" style="align-items: center;"></i></button>
                            <button style="background-color: red; color:white; border: none; border-radius: 3px; cursor:pointer;" formaction="skhapus.php?id=<?php echo $tmp["id"] ?>" onclick="return confirm('Yakin Ingin Menghapus?')"><i class="fa fa-trash" style="align-items: center;"></i></button>
                            <button style="background-color: #34deeb; color:black; border: none; border-radius: 3px;cursor:pointer; " formaction="cetakbaru.php?id=<?php echo $tmp["id"] ?>" formtarget="_blank"><i class="fa fa-print" style="align-items: center;"></i></button>
                        </td>
                        <td><?php echo $tmp["nomor_surat"] ?></td>
                        <td><?php echo $tmp["tujuan_surat"] ?></td>
                        <td><?php echo $tmp["tgl_surat"] ?></td>
                        <td><?php echo $tmp["perihal"] ?></td>
                    </tr>
                    <?php $i++ ?>
                <?php } ?>
            </tbody>
        </table>
    </form>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>


</html>