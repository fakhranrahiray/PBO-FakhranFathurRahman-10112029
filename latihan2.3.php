<?php
class Belanja {
    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBarang;
    public $diskon;
    public $pajak = 0.02;

    public function __construct($namaPembeli, $namaBarang, $hargaBarang, $jumlahBarang, $diskon) {
        $this->namaPembeli = $namaPembeli;
        $this->namaBarang = $namaBarang;
        $this->hargaBarang = $hargaBarang;
        $this->jumlahBarang = $jumlahBarang;
        $this->diskon = $diskon;
    }

    public function totalHarga(): float|int {
        $subtotal = $this->hargaBarang * $this->jumlahBarang;
        return $subtotal;
    }
}

$belanja1 = new Belanja(
    namaPembeli: "Miftah",
    namaBarang: "Sampo",
    hargaBarang: 9000,
    jumlahBarang: 2,
    diskon: 0.1
);

$belanja2 = new Belanja(
    namaPembeli: "Lolo",
    namaBarang: "Sampo",
    hargaBarang: 9000,
    jumlahBarang: 4,
    diskon: 0.1
);

echo "<pre>";

echo "Nama Pembeli: " . $belanja1->namaPembeli . "\n";
echo "Nama Barang: " . $belanja1->namaBarang . "\n";
echo "Harga Barang: Rp " . $belanja1->hargaBarang . "\n";
echo "Jumlah Barang: " . $belanja1->jumlahBarang . "\n";
echo "Diskon: " . ($belanja1->diskon * 100) . "%\n";
echo "Subtotal: Rp " . $belanja1->totalHarga() . "\n\n";

echo "Nama Pembeli: " . $belanja2->namaPembeli . "\n";
echo "Nama Barang: " . $belanja2->namaBarang . "\n";
echo "Harga Barang: Rp " . $belanja2->hargaBarang . "\n";
echo "Jumlah Barang: " . $belanja2->jumlahBarang . "\n";
echo "Diskon: " . ($belanja2->diskon * 100) . "%\n";
echo "Subtotal: Rp " . $belanja2->totalHarga() . "\n";

echo "</pre>";
?>
