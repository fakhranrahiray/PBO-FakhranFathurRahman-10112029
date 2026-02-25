<?php
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 1;

if ($jumlah < 1) $jumlah = 1;
if ($jumlah > 36) $jumlah = 36;

$nama   = isset($_POST['nama']) ? $_POST['nama'] : array();
$kelas  = isset($_POST['kelas']) ? $_POST['kelas'] : array();
$matkul = isset($_POST['matkul']) ? $_POST['matkul'] : array();
$nilai  = isset($_POST['nilai']) ? $_POST['nilai'] : array();

if (isset($_POST['tambah']) && $jumlah < 36) {
    $jumlah++;
}

if (isset($_POST['hapus']) && $jumlah > 1) {
    $jumlah--;


    unset($nama[$jumlah]);
    unset($kelas[$jumlah]);
    unset($matkul[$jumlah]);
    unset($nilai[$jumlah]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Latihan Array</title>
</head>
<body>

<h2>Form Data Mahasiswa</h2>

<form method="post">

<!-- Kodingan supaya ketika memencet enter tombol submit dan tambah tidak terpicu  -->
<input type="submit" style="display:none">

<input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">

<?php
function tampilForm($i, $max, $nama, $kelas, $matkul, $nilai) {
    if ($i > $max) return;
?>

<h3>Data Mahasiswa <?php echo $i; ?></h3>

Nama :
<input type="text" name="nama[]" 
value="<?php echo isset($nama[$i-1]) ? $nama[$i-1] : ''; ?>">
<br><br>

Kelas :
<input type="text" name="kelas[]" 
value="<?php echo isset($kelas[$i-1]) ? $kelas[$i-1] : ''; ?>">
<br><br>

Mata Kuliah :
<input type="text" name="matkul[]" 
value="<?php echo isset($matkul[$i-1]) ? $matkul[$i-1] : ''; ?>">
<br><br>

Nilai :
<input type="number" name="nilai[]" 
value="<?php echo isset($nilai[$i-1]) ? $nilai[$i-1] : ''; ?>">
<br><br>

<hr>

<?php
    tampilForm($i+1, $max, $nama, $kelas, $matkul, $nilai);
}

tampilForm(1, $jumlah, $nama, $kelas, $matkul, $nilai);
?>

<button type="submit" name="tambah" value="1">Tambah Tabel</button>

<button type="submit" name="hapus" value="1">Hapus Tabel</button>

<button type="submit" 
        formaction="proses.input.nilai.php" 
        name="proses" 
        value="1">
Proses
</button>

</form>

</body>
</html>