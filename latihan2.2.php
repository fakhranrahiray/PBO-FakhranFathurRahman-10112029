<?php

class Belanja {
    public $namaPembeli ;
    public $namaBarang  ;
    public $hargaBarang ;
    public $jumlahBarang;
    public $diskon;
    public $uangBayar;
    public $pajak = 0.2; 

    public function totalHarga(): float|int {
        return $this->hargaBarang * $this->jumlahBarang;
    }

    public function totalDiskon(): float|int {
        return $this->totalHarga() * $this->diskon;
    }

    public function hargaSetelahDiskon(): float|int {
        return $this->totalHarga() - $this->totalDiskon();
    }

    public function totalPajak(): float|int {
        return $this->hargaSetelahDiskon() * $this->pajak;
    }

    public function hargaBayar(): float|int {
        return $this->hargaSetelahDiskon() + $this->totalPajak();
    }

    public function uangKembalian(): float|int {
        return $this->uangBayar - $this->hargaBayar();
    }
}

$belanja1 = new Belanja();
$belanja1->namaPembeli ="Miftah" ;
$belanja1->namaBarang = "Odol" ;
$belanja1->hargaBarang = 30000 ;
$belanja1->jumlahBarang = 2 ;
$belanja1->diskon = 0.01 ;
$belanja1->uangBayar = 100000 ;

$belanja2 = new Belanja();
$belanja2->namaPembeli ="Bahlil" ;
$belanja2->namaBarang = "Koyo" ;
$belanja2->hargaBarang = 1800 ;
$belanja2->jumlahBarang = 2 ;
$belanja2->diskon = 0.03 ;
$belanja2->uangBayar = 50000 ;

echo "<pre>";
echo "Nama Pembeli   : " . $belanja1->namaPembeli . "\n";
echo "Nama Barang    : " . $belanja1->namaBarang . "\n";
echo "Subtotal       : Rp" . $belanja1->totalHarga() . "\n";
echo "Diskon         : Rp" . $belanja1->totalDiskon() . "\n";
echo "Setelah Diskon : Rp" . $belanja1->hargaSetelahDiskon() . "\n";
echo "Pajak (1%)    : Rp" . $belanja1->totalPajak() . "\n";
echo "Total Bayar    : Rp" . $belanja1->hargaBayar() . "\n";
echo "Uang Bayar     : Rp" . $belanja1->uangBayar . "\n";
echo "Kembalian      : Rp" . $belanja1->uangKembalian() . "\n";

echo "<pre>";
echo "Nama Pembeli   : " . $belanja2->namaPembeli . "\n";
echo "Nama Barang    : " . $belanja2->namaBarang . "\n";
echo "Subtotal       : Rp" . $belanja2->totalHarga() . "\n";
echo "Diskon         : Rp" . $belanja2->totalDiskon() . "\n";
echo "Setelah Diskon : Rp" . $belanja2->hargaSetelahDiskon() . "\n";
echo "Pajak (3%)    : Rp" . $belanja2->totalPajak() . "\n";
echo "Total Bayar    : Rp" . $belanja2->hargaBayar() . "\n";
echo "Uang Bayar     : Rp" . $belanja2->uangBayar . "\n";
echo "Kembalian      : Rp" . $belanja2->uangKembalian() . "\n";

echo "Terima Kasih Sudah Berbelanja" ; 
echo "</pre>";

?>
