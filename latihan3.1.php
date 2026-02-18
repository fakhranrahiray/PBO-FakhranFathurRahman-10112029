<?php
class Kendaraan
{
    var $jumlahRoda;
    var $jenisKendaraan;
    var $warna;
    var $bahanBakar = "Premium";
    var $harga = 10000000;
    var $merek;
    var $tahunPembuatan = 2004;

    function statusHarga()
    {
        if ($this->harga > 50000000)
            return "Mahal";
        else
            return "Murah";
    }

    function dapatSubsidi()
    {
        if ($this->bahanBakar == "Premium")
            return "Mendapatkan Subsidi";
        else
            return "Tidak Mendapatkan Subsidi";
    }

    function hargaSecondKendaraan()
    {
        $hargaSecond = $this->harga - ($this->harga * 0.10); 
        return $hargaSecond;
    }

    function statusBBM()
    {
         if ($this->statusHarga() == "Mahal")
            return "Pertamax";
        else
            return "Pertalite";   
    }

    function kelas()
    {
         if ($this->statusHarga() == "Mahal")
            return "Unggulan";
        else
            return "Biasa";   
    }    
}

$objekKendaraan1 = new Kendaraan;

$objekKendaraan1->harga = 90000000;
$objekKendaraan1->tahunPembuatan = 2019;
$objekKendaraan1->merek = "Yamaha MIO";
$objekKendaraan1->bahanBakar = "Pertamax";
$objekKendaraan1->warna = "Merah";
$objekKendaraan1->jumlahRoda = 2;
$objekKendaraan1->jenisKendaraan = "Motor";

echo "=== Kendaraan 1 ===";
echo "<br>";
echo "Merek: " . $objekKendaraan1->merek;
echo "<br>";
echo "Jenis Kendaraan: " . $objekKendaraan1->jenisKendaraan;
echo "<br>";
echo "Warna: " . $objekKendaraan1->warna;
echo "<br>";
echo "Harga: " . $objekKendaraan1->harga;
echo "<br>";
echo "Tahun Pembuatan: " . $objekKendaraan1->tahunPembuatan;
echo "<br>";
echo "Kategori Harga: " . $objekKendaraan1->statusHarga();
echo "<br>";
echo "Bahan Bakar: " . $objekKendaraan1->statusBBM();
echo "<br>";
echo "Kelas: " . $objekKendaraan1->kelas();
echo "<br>";
echo "Status Bahan Bakar : " . $objekKendaraan1->dapatSubsidi() ;
echo "<br>";
echo "Harga Bekas: " . $objekKendaraan1->hargaSecondKendaraan() ;
echo "<br>";
echo "Jumlah Roda: " . $objekKendaraan1->jumlahRoda;

echo "<br><br>";

$objekKendaraan2 = new Kendaraan;

$objekKendaraan2->jumlahRoda = 4;
$objekKendaraan2->jenisKendaraan = "Mobil";
$objekKendaraan2->bahanBakar = "Premium";
$objekKendaraan2->tahunPembuatan = 2022;
$objekKendaraan2->merek = "Honda Brio";
$objekKendaraan2->warna = "Putih";


echo "=== Kendaraan 2 ===";
echo "<br>";
echo "Merek: " . $objekKendaraan2->merek;
echo "<br>";
echo "Jenis Kendaraan: " . $objekKendaraan2->jenisKendaraan;
echo "<br>";
echo "Warna: " . $objekKendaraan2->warna;
echo "<br>";
echo "Harga: " . $objekKendaraan2->harga;
echo "<br>";
echo "Tahun Pembuatan: " . $objekKendaraan2->tahunPembuatan;
echo "<br>";
echo "Kategori Harga: " . $objekKendaraan2->statusHarga();
echo "<br>";
echo "Bahan Bakar: " . $objekKendaraan2->statusBBM();
echo "<br>";
echo "Kelas: " . $objekKendaraan2->kelas();
echo "<br>";
echo "Status Bahan Bakar : " . $objekKendaraan2 ->dapatSubsidi() ;
echo "<br>";
echo "Harga Bekas: " . $objekKendaraan2->hargaSecondKendaraan() ;
echo "<br>";
echo "Jumlah Roda: " . $objekKendaraan2->jumlahRoda;
?>
