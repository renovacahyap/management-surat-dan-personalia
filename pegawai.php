<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: login-form-v4/Login_v4/index.php");
    exit;
}


require 'fpegawai.php';
global $row;
$tampil = query("SELECT * FROM tb_karyawan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="DataTables-1.10.24\js\jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="DataTables-1.10.24\css\jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" href="pegawai.css"> -->
    <link rel="stylesheet" href="stylepegawai.css">
</head>

<body>
    <h1 style="text-align :center;">DATA KARYAWAN</h1>
    <form action="" method="post">
        <button style="background-color: #6EB5FF; color:white; border: none; border-radius: 3px; padding: 8px 12px ;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size:22px;
            margin: 4px 2px;
            cursor: pointer;" formaction="fitur.php"><i class="fa fa-home" style="align-items: center;"></i></button>

        <button style="
                border-radius: 3px;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        font-size: 20px;
        margin: 4px 4px;
        cursor: pointer;" formaction=" tambah_karyawan.php">Tambah Data</button> <br></br>

        <div style="overflow-x:auto;">
            <table id="example">
                <thead>
                    <th style="border-radius: 15px 0px 0px 0px;">NO</th>
                    <th>NAMA</th>
                    <th>NIDN</th>
                    <th>NIK</th>
                    <th>TEMPAT DAN TANGGAL LAHIR</th>
                    <th>JABATAN</th>
                    <th>PENDIDIKAN</th>
                    <th>ALAMAT</th>
                    <th>NOMOR TELEPHON</th>
                    <th style="border-radius: 0px 15px 0px 0px;">AKSI</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($tampil as $tmp) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $tmp["nama"] ?></td>
                            <td><?php echo $tmp["nidn"] ?></td>
                            <td><?php echo $tmp["nik"] ?></td>
                            <td><?php echo $tmp["tempat_lahir"] ?><?php echo ", " ?><?php echo $tmp["tanggal_lahir"] ?></td>
                            <td><?php echo $tmp["jabatan"] ?></td>
                            <td><?php echo $tmp["pendidikan"] ?></td>
                            <td><?php echo $tmp["alamat"] ?></td>
                            <td><?php echo $tmp["nomor_telp"] ?></td>
                            <td>
                                <button style="background-color: #ffa600; color:white; border: none; border-radius: 3px; cursor: pointer; " formaction="detail_karyawan.php?id=<?php echo $tmp["id"] ?>" title="Detail Karyawan"><i class="fa  fa-user-o" style="align-items: center;"></i></button>


                                <button title="Hapus Data Karyawan" style="background-color: red; color:white; border: none; border-radius: 3px; cursor: pointer; " formaction="hapus_karyawan.php?id=<?php echo $tmp["id"] ?>" onclick="return confirm('yakin?')"><i class="fa fa-trash" style="align-items: center;"></i></button>

                                <button title="Ubah Data Karyawan" style="background-color: #6EB5FF; color:white; border: none; border-radius: 3px; cursor: pointer;" formaction="ubah_karyawan.php?id=<?php echo $tmp["id"] ?>"><i class="fa fa-edit" style="align-items: center;"></i></button>

                            </td>

                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>