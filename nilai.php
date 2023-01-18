<?php
$con = mysqli_connect('localhost', 'root', '','nilai_db');


$NNama = $_POST['Nama'];
$NNis = $_POST['Nis'];
$NRombel = $_POST['Rombel'];   

$NProd = $_POST['Prod'];
$NBi = $_POST['Bi'];
$NSb = $_POST['Sb'];
$NMtk = $_POST['Mtk'];
$NSjrh = $_POST['Sjr'];
$NPai = $_POST['Paibp'];
$Npp = $_POST['Pp'];  

$NRata = ($NProd + $NBi + $NSb + $NMtk + $NSjrh + $NPai + $Npp) / 7;

$nilai = [$NProd, $NBi, $NSb, $NMtk, $NSjrh, $NPai, $Npp];
$NMax = max($nilai);
$NMin = min($nilai);


$sql = "INSERT INTO `nilai` (`nilai_id`, `nilai_nama`, `nilai_nis`, `nilai_rombel`, `nilai_prod`, `nilai_bindo`, `nilai_sbud`, `nilai_mtk`, `nilai_sjrh`, `nilai_paibp`, `nilai_pp`, `nilai_rata`, `nilai_min`, `nilai_max`) VALUES ('0', '$NNama', '$NNis', '$NRombel', '$NProd', '$NBi', '$NSb', '$NMtk','$NSjrh', '$NPai', '$Npp', '$NRata', '$NMin', '$NMax')"; 
$rs = mysqli_query($con, $sql);



if ($rs) {
	echo "Nilai berhasil dimasukan!";
}

echo "<br>";

$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "<a href='$url'>Kembali</a>"; 
?>  