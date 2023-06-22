//nomor
$tahun = date("Y",time());
$ceknomor= "SELECT tahun FROM rekapitulasi WHERE tahun='$tahun'";
$result4=mysqli_query($link,$ceknomor);

if (mysqli_fetch_assoc($result4)) {
    $cupid="SELECT COUNT(tahun) as banyak FROM rekapitulasi";
    $result5= mysqli_query($link,$cupid);
    $result6=mysqli_fetch_array($result5);
    $kodeBarang=$result6['banyak'];
    $urutan = (int) substr($kodeBarang, 0, 3);
    $urutan++;
    $kodeBarang =  sprintf("%04s", $urutan);
    $id=$kodeBarang;
}else {
    $urutan = (int) substr(1, 0, 3);
    $kodeBarang =  sprintf("%04s", $urutan);
    $id=$kodeBarang;
};

