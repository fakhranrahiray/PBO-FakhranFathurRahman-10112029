<?php
$jumlah = $_POST['jumlah'];

$nama   = $_POST['nama'];
$kelas  = $_POST['kelas'];
$matkul = $_POST['matkul'];
$nilai  = $_POST['nilai'];

$data = array();

function simpanData($i, $max, &$data, $nama, $kelas, $matkul, $nilai) {
    if ($i >= $max) return;

    $data[$i] = array(
        "nama"   => $nama[$i],
        "kelas"  => $kelas[$i],
        "matkul" => $matkul[$i],
        "nilai"  => $nilai[$i],
        "status" => ($nilai[$i] >= 60) ? "Lulus Kuis" : "Tidak Lulus Kuis"
    );

    simpanData($i+1, $max, $data, $nama, $kelas, $matkul, $nilai);
}

simpanData(0, $jumlah, $data, $nama, $kelas, $matkul, $nilai);

function tampilData($i, $max, $data) {
    if ($i >= $max) return;

    echo "Nama : ".$data[$i]['nama']."<br>";
    echo "Kelas : ".$data[$i]['kelas']."<br>";
    echo "Mata Kuliah : ".$data[$i]['matkul']."<br>";
    echo "Nilai : ".$data[$i]['nilai']."<br>";
    echo $data[$i]['status']."<br>";
    echo "<hr>";

    tampilData($i+1, $max, $data);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Data</title>
</head>
<body>

<h2>Nilai Mahasigma Universitas Konoha</h2>

<?php tampilData(0, $jumlah, $data); ?>

<form method="post" action="form.input.nilai.php">
<input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">

<?php
function kirimBalik($i, $max, $nama, $kelas, $matkul, $nilai){
    if ($i >= $max) return;
?>

<input type="hidden" name="nama[]" value="<?php echo $nama[$i]; ?>">
<input type="hidden" name="kelas[]" value="<?php echo $kelas[$i]; ?>">
<input type="hidden" name="matkul[]" value="<?php echo $matkul[$i]; ?>">
<input type="hidden" name="nilai[]" value="<?php echo $nilai[$i]; ?>">

<?php
    kirimBalik($i+1, $max, $nama, $kelas, $matkul, $nilai);
}

kirimBalik(0, $jumlah, $nama, $kelas, $matkul, $nilai);
?>

<button type="submit">Kembali</button>
</form>

</body>
</html>