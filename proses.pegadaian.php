<?php

class PegadaianSyariah {
    
    public $pinjaman;
    public $bungaPersen;
    public $lamaAngsuran;
    public $keterlambatanHari;
    
    const DENDA_PER_HARI = 0.0015; 

    public function __construct($pinjaman, $lama, $telat) {
        $this->pinjaman = $pinjaman;
        $this->bungaPersen = 10; 
        $this->lamaAngsuran = $lama;
        $this->keterlambatanHari = $telat;
    }

    public function hitungTotalPinjaman() {
        $nominalBunga = $this->pinjaman * ($this->bungaPersen / 100);
        return $this->pinjaman + $nominalBunga;
    }

    public function hitungAngsuran() {
        return $this->hitungTotalPinjaman() / $this->lamaAngsuran;
    }

    public function hitungDenda() {
        $angsuran = $this->hitungAngsuran();
        return $angsuran * self::DENDA_PER_HARI * $this->keterlambatanHari;
    }

    public function hitungTotalBayar() {
        return $this->hitungAngsuran() + $this->hitungDenda();
    }

    public function formatRupiah($angka) {
        return "Rp. " . number_format($angka, 0, ',', '.');
    }
}

if (isset($_POST['hitung'])) {
    
    $pinjaman = $_POST['pinjaman'];
    $lama = $_POST['lama'];
    $telat = $_POST['telat'];

    
    $minimalPinjaman = 500000; 

    if ($pinjaman < $minimalPinjaman) {
        echo "<script>
                alert('Maaf, minimal peminjaman adalah Rp. " . number_format($minimalPinjaman, 0, ',', '.') . "');
                window.location.href='form.pegadaian.php';
              </script>";
        exit; 
    }
    

    $transaksi = new PegadaianSyariah($pinjaman, $lama, $telat);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Hasil Perhitungan</title>
    <style>
        .result-group {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 20px;
            width: 50%;
        }
        .header { margin-bottom: 20px; }
        .red-text { color: red; font-style: italic; }
    </style>
</head>
<body>
    
    <span class="logo">Tugas Pertemuan 3</span>

    <div class="header">
        <h3>TOKO PEGADAIAN SYARIAH</h3>
        <p>Jl Keadilan No 16</p>
        <p>Telp. 72353459</p>
    </div>

    
        <h3>Program Penghitung Besaran Angsuran Hutang</h3>
        
        Besaran Pinjaman : <?php echo $transaksi->formatRupiah($transaksi->pinjaman); ?><br>
        Besar bunga ditetapkan (%) : <?php echo $transaksi->bungaPersen; ?>%<br>
        Total Pinjaman : <?php echo $transaksi->formatRupiah($transaksi->hitungTotalPinjaman()); ?><br>
        Lama angsuran (bulan) : <?php echo $transaksi->lamaAngsuran; ?><br>
        Besaran angsuran : <?php echo $transaksi->formatRupiah($transaksi->hitungAngsuran()); ?>
    </div>

    
        <br>
        <br>
            Ketentuan denda keterlambatan 0.15% per <br>
            hari dari angsuran
        </p>

        Keterlambatan Angsuran (Hari): <?php echo $transaksi->keterlambatanHari; ?><br>
        Denda Keterlambatan : <?php echo number_format($transaksi->hitungDenda(), 0, ',', ''); ?> <br>
        Besaran Pembayaran : <?php echo number_format($transaksi->hitungTotalBayar(), 0, ',', ''); ?>
    </div>
    
    <br>
    <a href="form.pegadaian.php"><button>Kembali</button></a>

</body>
</html>

<?php 
} else {
    echo "Silahkan isi form terlebih dahulu.";
}
?>