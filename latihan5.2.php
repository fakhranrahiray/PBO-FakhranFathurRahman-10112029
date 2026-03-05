<?php

function formatRupiah($angka): string {
    return 'Rp ' . number_format(
        num: (int) $angka,
        decimals: 0,
        decimal_separator: ',',
        thousands_separator: '.'
    );
}

class Belanja {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;

    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    public function hitungDiskon($subtotal): float|int {
        if ($subtotal > 100000){
            return $subtotal * 0.1; // diskon 10%
        }
        return 0;
    }

    public function hitungTotal(): float|int {
        $subtotal = $this->hitungSubtotal();
        $diskon   = $this->hitungDiskon($subtotal);
        return $subtotal - $diskon;
    }
}

$dataBelanja = [

[
    'namaPembeli' => 'Miftah',
    'namaBarang'  => 'Mie Ayam',
    'hargaBarang' => 12000,
    'jumlahBeli'  => 12,
],

[
    'namaPembeli' => 'Frras',
    'namaBarang'  => 'Kopi',
    'hargaBarang' => 4000,
    'jumlahBeli'  => 12,
]

];




echo "<h2>TRANSAKSI 1</h2>";

$errors1 = [];

$nama   = $dataBelanja[0]["namaPembeli"];
$barang = $dataBelanja[0]["namaBarang"];
$harga  = $dataBelanja[0]["hargaBarang"];
$jumlah = $dataBelanja[0]["jumlahBeli"];

if (empty($nama)) {
    $errors1[] = "Nama pembeli tidak boleh kosong.";
}

if ($harga <= 0) {
    $errors1[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
    $errors1[] = "Jumlah beli harus lebih dari 0.";
}

if (!empty($errors1)) {

    foreach ($errors1 as $error) {
        echo $error . "<br>";
    }

} else {

    $belanja1 = new Belanja();
    $belanja1->namaPembeli = $nama;
    $belanja1->namaBarang  = $barang;
    $belanja1->hargaBarang = $harga;
    $belanja1->jumlahBeli  = $jumlah;

    $subtotal = $belanja1->hitungSubtotal();
    $diskon   = $belanja1->hitungDiskon($subtotal);
    $total    = $belanja1->hitungTotal();

    echo "Pembeli : $belanja1->namaPembeli<br>";
    echo "Barang  : $belanja1->namaBarang<br>";
    echo "Subtotal: " . formatRupiah($subtotal) . "<br>";
    echo "Diskon  : " . formatRupiah($diskon) . "<br>";
    echo "<b>Total Bayar: " . formatRupiah($total) . "</b><br><br>";
}




echo "<h2>TRANSAKSI 2</h2>";

$errors2 = [];

$nama   = $dataBelanja[1]["namaPembeli"];
$barang = $dataBelanja[1]["namaBarang"];
$harga  = $dataBelanja[1]["hargaBarang"];
$jumlah = $dataBelanja[1]["jumlahBeli"];

if (empty($nama)) {
    $errors2[] = "Nama pembeli tidak boleh kosong.";
}

if ($harga <= 0) {
    $errors2[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
    $errors2[] = "Jumlah beli harus lebih dari 0.";
}

if (!empty($errors2)) {

    foreach ($errors2 as $error) {
        echo $error . "<br>";
    }

} else {

    $belanja2 = new Belanja();
    $belanja2->namaPembeli = $nama;
    $belanja2->namaBarang  = $barang;
    $belanja2->hargaBarang = $harga;
    $belanja2->jumlahBeli  = $jumlah;

    $subtotal = $belanja2->hitungSubtotal();
    $diskon   = $belanja2->hitungDiskon($subtotal);
    $total    = $belanja2->hitungTotal();

    echo "Pembeli : $belanja2->namaPembeli<br>";
    echo "Barang  : $belanja2->namaBarang<br>";
    echo "Subtotal: " . formatRupiah($subtotal) . "<br>";
    echo "Diskon  : " . formatRupiah($diskon) . "<br>";
    echo "<b>Total Bayar: " . formatRupiah($total) . "</b><br><br>";
}

?>