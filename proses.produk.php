<?php

function formatRupiah($angka): string {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class Produk {

    public $nama;
    public $harga;

    public function hitungSubtotal($jumlah): float|int {
        return $this->harga * $jumlah;
    }

    public function hitungDiskon($subtotal, $persenDiskon): float|int {
        return ($persenDiskon / 100) * $subtotal;
    }

    public function hitungTotal($jumlah, $persenDiskon): float|int {
        $subtotal = $this->hitungSubtotal($jumlah);
        $diskon = $this->hitungDiskon($subtotal, $persenDiskon);
        return $subtotal - $diskon;
    }
}
$data = [
    "nama" => htmlspecialchars(string: $_POST['nama']),
    "harga" => (int) $_POST['harga'],
    "jumlah" => (int) $_POST['jumlah'],
    "diskon" => (int) $_POST['diskon']
];

$produk = new Produk();
$produk->nama = $data["nama"];
$produk->harga = $data["harga"];

$subtotal = $produk->hitungSubtotal(jumlah: $data["jumlah"]);
$diskon = $produk->hitungDiskon(subtotal: $subtotal, persenDiskon: $data["diskon"]);
$total = $produk->hitungTotal(jumlah: $data["jumlah"], persenDiskon: $data["diskon"]);

echo "<h2>HASIL BELANJA</h2>";
echo "Produk : " . $produk->nama . "<br>";
echo "Harga : " . formatRupiah(angka: $produk->harga) . "<br>";
echo "Jumlah : " . $data["jumlah"] . "<br>";
echo "Subtotal : " . formatRupiah(angka: $subtotal) . "<br>";
echo "Diskon (" . $data["diskon"] . "%) : " . formatRupiah(angka: $diskon) . "<br>";
echo "Total Bayar : " . formatRupiah(angka: $total) . "</b>";


?>