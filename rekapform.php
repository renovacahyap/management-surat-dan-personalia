<?php
require 'functions.php';
global $link;
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
        alert('Apakah Data Sudah Benar?')
            alert('data berhasil ditambahkan');
            document.location.href='#'
        </script>
        ";
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan')
            <script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat masuk</title>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">

        <?php
        $t = time();
        echo "Kudus,  " . (date("d F Y", $t));
        ?>

        <div class="container" style="display: flex; align-items: center; ">
            <div class="kiri">
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
                <label for="nomor">Nomor</label><br>
                <input type="text" name="nomor" id="nomor" value="<?php echo $id; ?>" required>

                <!-- textfield nomor jabatan -->
                <select name="kodejabatan" id="kodejabatan" required>
                    //kode jabatan
                    <?php while ($row1 = mysqli_fetch_assoc($result)) :; ?>
                        <option value="<?php echo $row1["kode"]; ?>"><?php echo $row1["jabatan"]; ?></option>
                    <?php endwhile; ?>
                </select><br>


                <!-- Lampiran -->
                <label for="lampiran">lampiran</label><br>
                <input type="text" name="lampiran" id="lampiran" required>

                <select name="selectlampiran" id="selectlampiran" required>
                    <option value="lembar">lembar</option>
                    <option value="buku">buku</option>
                    <option value="berkas">berkas</option>
                </select><br>

                <!-- text field perihal -->
                <label for="perihal">Perihal</label><br>
                <input type="text" name="perihal" id="perihal" required><br>
            </div>
            <div class="container" style="margin-left:20%">
                <!-- tujuan surat -->
                <label for="tujuan_surat">Tujuan</label><br>
                <input type="text" name="tujuan_surat" id="tujuan_surat" placeholder="Orang yang dituju" required><br>

                <!-- jabatan tujuan -->
                <label for="jabatan_tujuan">Jabatan</label><br>
                <input type="text" name="jabatan_tujuan" id="jabatan_tujuan" placeholder=" Jabatan Orang yang dituju" required><br>

                <!-- alamat -->
                <label for="alamat">Alamat</label><br>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
            </div>
        </div>

        <div>
            <!-- Pembukaan Surat -->
            <label for="pembukaan">Pembukaan Surat</label><br>
            <textarea name="pembukaan" id="pembukaan" cols="50" rows="10"></textarea><br>

            <!-- Isi Surat -->
            <label for="isi">Isi Surat</label><br>
            <textarea name="isi" id="isi" cols="30" rows="10"></textarea><br>

            <!-- Penutup -->
            <label for="penutup">Penutup Surat</label><br>
            <textarea name="penutup" id="penutup" cols="30" rows="10"></textarea>
        </div>

        <!-- ttd -->
        <!-- jabatan -->
        <select name="jabatan" id="jabatan">
            <?php while ($row2 = mysqli_fetch_assoc($result3)) :; ?>
                <option value="<?php echo $row2["jabatan"]; ?>"><?php echo $row2["jabatan"]; ?></option>
            <?php endwhile; ?>
        </select><br>

        <label for="namattd"></label>
        <input type="text" name="namattd" id="namattd" required>


        <div>
            <button type="submit" name="submit" onclick="return confirm('Tolong Chek Terlebih Dahulu ! Data Tidak Dapat Diubah.')">SIMPAN</button>
        </div>
    </form>


    <script type="text/javascript">
        window.onload = function() {
            CKEDITOR.replace('pembukaan', {
                uiColor: '#87c6e1'
            });
            CKEDITOR.replace('isi', {
                uiColor: '#87c6e1'
            });
            CKEDITOR.replace('penutup', {
                uiColor: '#87c6e1'
            });
        }
    </script>
</body>

</html>