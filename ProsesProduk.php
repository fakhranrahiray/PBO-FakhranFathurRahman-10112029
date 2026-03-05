<?php 

function formatRupiah($angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class BelanjaWarung {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;

    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    public function hitungDiskon($subtotal): float|int {
        if ($subtotal > 100000) {
            return $subtotal * 0.1;
        }
        return 0;
    }

    public function hitungTotal(): float|int {
        $subtotal = $this->hitungSubtotal();
        $diskon = $this->hitungDiskon($subtotal);
        return $subtotal - $diskon;
    }
}

$errors = [];

$nama   = trim(string: $_POST['nama'] ?? '');
$barang = trim(string: $_POST['barang'] ?? '');
$harga  = (int) ($_POST['harga'] ?? 0);
$jumlah = (int) ($_POST['jumlah'] ?? 0);

if (empty($nama)) {
    $errors[] = "Nama pembeli tidak boleh kosong.";
}

if (empty($barang)) {
    $errors[] = "Nama barang tidak boleh kosong.";
}

if ($harga <= 0) {
    $errors[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
    $errors[] = "Jumlah beli harus lebih dari 0.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Belanja</title>
</head>
<body>

<h2>Hasil Proses Belanja</h2>

<?php if (!empty($errors)) : ?>

    <div style="color:red;">
        <b>Terjadi Kesalahan:</b>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <a href="FormProduk.php">Kembali ke Form</a>

<?php else : ?>

    <?php
        $belanja = new BelanjaWarung();
        $belanja->namaPembeli = htmlspecialchars(string: $nama);
        $belanja->namaBarang  = htmlspecialchars(string: $barang);
        $belanja->hargaBarang = $harga;
        $belanja->jumlahBeli  = $jumlah;
    ?>

    <?php
        $subtotal = $belanja->hitungSubtotal();
        $diskon   = $belanja->hitungDiskon(subtotal: $subtotal);
        $total    = $belanja->hitungTotal();
    ?>

    Pembeli : <?= $belanja->namaPembeli ?><br>
    Barang  : <?= $belanja->namaBarang ?><br>
    Subtotal: <?= formatRupiah(angka: $subtotal) ?><br>
    Diskon  : <?= formatRupiah(angka: $diskon) ?><br>
    <b>Total Bayar: <?= formatRupiah(angka: $total) ?></b><br><br>

    <a href="FormProduk.php">Input Lagi</a>

<?php endif; ?>

</body>
</html>










