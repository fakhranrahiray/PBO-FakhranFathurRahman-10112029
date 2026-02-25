<?php
#membuat array 
function formatRupiah($angka) {
    return "Rp." . number_format($angka, 0, ',', '.');
}


class Belanja {
    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;
    public $diskon;

    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
;
    }

    public function HitungTotalDenganDiskon($persenDiskon): float|int {
        $subtotal = $this->hitungSubtotal();
        $diskon =  ($persenDiskon / 100) * $subtotal;
        return $subtotal - $diskon;
        
    }

}
//Ini Array Associative untuk data pembelian
$data = [
    'namaPembeli' => 'Esteban Gyriz',
    'namaBarang' => 'Adidas Yeezy Boost 350 V2',
    'hargaBarang' => 3000000,
    'jumlahBeli' => 1,
] ;

$belanja = new Belanja();
$belanja->namaPembeli = $data['namaPembeli'];
$belanja->namaBarang = $data['namaBarang'];
$belanja->hargaBarang = $data['hargaBarang'];
$belanja->jumlahBeli = $data['jumlahBeli'];

echo "<pre>";
echo "<h2> STRUK BELANJA</h2>";
echo "Nama Pembeli: " . $belanja->namaPembeli . "\n";
echo "Nama Barang: " . $belanja->namaBarang . "\n";
echo "Harga Barang: " . formatRupiah($belanja->hargaBarang) . "\n";
echo "Jumlah Beli: " . $belanja->jumlahBeli . "\n";
echo "Subtotal: " . formatRupiah($belanja->hitungSubtotal()) . "\n";
echo "Total Setelah Diskon (10%): " . formatRupiah($belanja->HitungTotalDenganDiskon(10)) . "\n";
echo "</pre>";

?>
