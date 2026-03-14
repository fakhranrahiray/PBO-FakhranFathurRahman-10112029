<?php

function formatRupiah($angka): string{
    return "Rp ".number_format(num: $angka, decimals: 0, decimal_separator: ",", thousands_separator: ".");
}

class BelanjaWarung{

    public $nama;
    public $barang;
    public $harga;
    public $jumlah;
    public $member;

    public function subtotal(): float|int{
        return $this->harga * $this->jumlah;
    }

    public function diskon($subtotal): int{

        $diskon = 0;

        if($this->member == true){

            if($subtotal > 500000){
                $diskon = 50000;
            }
            elseif($subtotal > 100000){
                $diskon = 15000;
            }

        }
        else{

            if($subtotal > 100000){
                $diskon = 5000;
            }

        }

        return $diskon;

    }

    public function total(): float|int{

        $subtotal = $this->subtotal();
        $diskon = $this->diskon(subtotal: $subtotal);

        return $subtotal - $diskon;

    }

}

$nama   = $_POST['nama'];
$barang = $_POST['barang'];
$harga  = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$member = $_POST['member'];

echo "<h2>Hasil Data Belanja</h2>";

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

for($i=0; $i<count(value: $nama); $i++){

    $belanja = new BelanjaWarung();

    $belanja->nama = $nama[$i];
    $belanja->barang = $barang[$i];
    $belanja->harga = $harga[$i];
    $belanja->jumlah = $jumlah[$i];
    $belanja->member = $member[$i];

    $subtotal = $belanja->subtotal();
    $diskon = $belanja->diskon(subtotal: $subtotal);
    $total = $belanja->total();

    echo "<tr>";

    echo "<td>".$no."</td>";
    echo "<td>".$belanja->nama."</td>";
    echo "<td>".($belanja->member ? "Ya" : "Tidak")."</td>";
    echo "<td>".$belanja->barang."</td>";
    echo "<td>".formatRupiah(angka: $subtotal)."</td>";
    echo "<td>".formatRupiah(angka: $diskon)."</td>";
    echo "<td>".formatRupiah(angka: $total)."</td>";

    echo "</tr>";

    $no++;

}

echo "</table>";

?>