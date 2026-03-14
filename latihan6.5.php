<?php

function formatRupiah($angka): string {
    return 'Rp ' . number_format(
        (int)$angka,
        0,
        ',',
        '.'
    );
}

class Belanja {

    public $namaPembeli;
    public $namaBarang;
    public $hargaBarang;
    public $jumlahBeli;
    public $member;

    public function hitungSubtotal(): float|int {
        return $this->hargaBarang * $this->jumlahBeli;
    }

    public function hitungDiskon($subtotal): float|int {
        if ($subtotal > 100000){
            return $subtotal * 0.1;
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
        "nama"=>"Budi",
        "barang"=>"Gula",
        "harga"=>65000,
        "jumlah"=>2,
        "member"=>true
        
    ],

    [
        "nama"=>"Sinta",
        "barang"=>"Minyak",
        "harga"=>140000,
        "jumlah"=>1,
        "member"=>false
        
    ],

      [
        "nama"=>"Zaki",
        "barang"=>"Salad",
        "harga"=>636386,
        "jumlah"=>1,
        "member"=>false
        
    ],




];

echo "<table border='1' cellpadding='6'>";

echo "<tr>
<th>No</th>
<th>Nama</th>
<th>Member</th>
<th>Barang</th>
<th>Subtotal</th>
<th>Diskon</th>
<th>Total</th>
</tr>";

$no = 1;

foreach($dataBelanja as $d){

    $belanja = new Belanja();

    $belanja->namaPembeli = $d["nama"];
    $belanja->namaBarang = $d["barang"];
    $belanja->hargaBarang = $d["harga"];
    $belanja->jumlahBeli = $d["jumlah"];
    $belanja->member = $d["member"];

    $subtotal = $belanja->hitungSubtotal();
    $diskon = $belanja->hitungDiskon($subtotal);
    $total = $belanja->hitungTotal();

    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$belanja->namaPembeli."</td>";
    echo "<td>".($belanja->member ? "Ya" : "Tidak")."</td>";
    echo "<td>".$belanja->namaBarang."</td>";
    echo "<td>".formatRupiah($subtotal)."</td>";
    echo "<td>".formatRupiah($diskon)."</td>";
    echo "<td>".formatRupiah($total)."</td>";
    echo "</tr>";
}

echo "</table>";

?>