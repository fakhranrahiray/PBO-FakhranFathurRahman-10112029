<?php
session_start();

if (!isset($_SESSION['data_pembeli'])) {
    $_SESSION['data_pembeli'] = array();
}

$pesan_error = "";
if (isset($_SESSION['pesan_error'])) {
    $pesan_error = $_SESSION['pesan_error'];
    unset($_SESSION['pesan_error']);
}
// Ini Function buat menampilkan data
function tampilkan_data($index = 0) {
    if ($index >= 50) {
        return;
    }

    if (isset($_SESSION['data_pembeli'][$index])) {
        $data = $_SESSION['data_pembeli'][$index];

        echo "<tr>";
        echo "<td>" . ($index + 1) . "</td>";
        echo "<td>" . $data['nama'] . "</td>";
        echo "<td>" . $data['member'] . "</td>";
        echo "<td>" . $data['belanja'] . "</td>";
        echo "<td>" . $data['diskon'] . "</td>";
        echo "<td>" . $data['bayar'] . "</td>";
        echo "<td>
                <form method='POST' action='proses.warung.php'>
                    <input type='hidden' name='index_hapus' value='$index'>
                    <button type='submit'>Hapus</button>
                </form>
              </td>";
        echo "</tr>";
    }

    tampilkan_data($index + 1);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Warung</title>
</head>
<body>

<h2>PROGRAM KASIR WARUNG</h2>

<?php
if ($pesan_error != "") {
    echo "<p style='color:red;'><b>$pesan_error</b></p>";
}


?>
<?php
// Untuk membuat form
?>
<form method="POST" action="proses.warung.php">
    Nama Pembeli : <br>
    <input type="text" name="nama_pembeli"><br><br>

    Apakah Memiliki Kartu Member? : <br>
    <input type="radio" name="status_member" value="Memiliki"> Memiliki
    <input type="radio" name="status_member" value="Tidak Memiliki"> Tidak Memiliki
    <br><br>

    Total Belanja : <br>
    <input type="text" name="total_belanja"><br><br>

    <button type="submit" name="tombol_tambah">Tambah</button>
</form>

<hr>

<h3>Data Pembeli</h3>

<table border="1" cellpadding="8">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Member</th>
    <th>Total Belanja</th>
    <th>Diskon</th>
    <th>Biaya yang Dikeluarkan</th>
    <th>Hapus Data?</th>
</tr>

<?php tampilkan_data(); ?>

</table>

</body>
</html>