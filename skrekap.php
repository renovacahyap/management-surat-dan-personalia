<?php
require 'fskrekap.php';

//cbox
$query = "SELECT * FROM kode_jabatan";
$query1 = "SELECT * FROM kode_hal";
$result = mysqli_query($link, $query);
$result1 = mysqli_query($link, $query1);
$result3 = mysqli_query($link, $query);

if (isset($_POST["submit"])) {
    if (tambah() > 0) {
        echo "
        <script>
            alert('Data Berhasil Ditambahkan')
            document.location.href='surat_keluar.php'
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan')
            document.location.href='surat_keluar.php'
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Surat Keluar</title>
    <link rel="stylesheet" href="skrekap.css">
</head>

<body>
    <h1 style="text-align: center;">Rekap Surat Keluar</h1>
    <form action="" method="post">

        <!-- textfield nomor -->
        <?php
        //nomor
        $tahun = date("Y", time());
        $ceknomor = "SELECT tahun FROM rekapitulasi WHERE tahun='$tahun'";
        $result4 = mysqli_query($link, $ceknomor);

        if (mysqli_fetch_assoc($result4)) {
            $cupid = "SELECT COUNT(tahun) as banyak FROM rekapitulasi WHERE tahun='$tahun'";
            $result5 = mysqli_query($link, $cupid);
            $result6 = mysqli_fetch_array($result5);
            $kodeBarang = $result6['banyak'];
            $urutan = (int) substr($kodeBarang, 0, 3);
            $urutan++;
            $kodeBarang =  sprintf("%04s", $urutan);
            $id = $kodeBarang;
        } else {
            $cupid = "SELECT COUNT(tahun) as banyak FROM rekapitulasi WHERE tahun='$tahun'";
            $result5 = mysqli_query($link, $cupid);
            $result6 = mysqli_fetch_array($result5);
            $kodeBarang = $result6['banyak'];
            $urutan = (int) substr($kodeBarang, 0, 3);
            $urutan++;
            $kodeBarang =  sprintf("%04s", $urutan);
            $id = $kodeBarang;
        };
        ?>
        <label for="nomor">Nomor</label>
        <input type="text" name="nomor" id="nomor" value="<?php echo $id; ?>" style="width:120px" required>

        <!-- textfield nomor jabatan -->
        <select name="kodejabatan" id="kodejabatan" style="width: 47.3%;" required>
            //kode jabatan
            <option value="">~ Select Kode Jabatan ~</option>
            <?php while ($row1 = mysqli_fetch_assoc($result)) :; ?>
                <option value="<?php echo $row1["kode"]; ?>"><?php echo $row1["jabatan"]; ?></option>
            <?php endwhile; ?>
        </select>

        <!-- Select Kode Hal -->
        <select name="kodehal" id="kodehal" style="width: 30%;" required>
            <option value="">~ Select Kode Hal ~</option> -->
            <?php while ($row3 = mysqli_fetch_assoc($result1)) :; ?>
                <option value="<?php echo $row3["kode"]; ?>"><?php echo $row3["hal"]; ?></option>
            <?php endwhile; ?>
        </select> <br>

        <label for="tujuan_surat">Tujuan Surat</label><br>
        <input type="text" name="tujuan_surat" id="tujuan_surat"><br>
        <label for="tgl">Tanggal</label><br>
        <input type="date" name="tgl" id="tgl"><br>
        <label for="perihal">Perihal</label><br>
        <input type="text" name="perihal" id="perihal"> <br>

        <button type="submit" name="submit">INPUT</button>

    </form>
</body>

</html>