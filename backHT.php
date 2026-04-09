<?php
// ini BackHT.php
// ================== CLASS ==================

class Employee {
    protected $nama;
    protected $gajiDasar;
    protected $masaKerja;

    public function __construct($nama, $gajiDasar, $masaKerja) {
        $this->nama = $nama;
        $this->gajiDasar = $gajiDasar;
        $this->masaKerja = $masaKerja;
    }

    public function getNama() { return $this->nama; }
    public function getMasaKerja() { return $this->masaKerja . " Tahun"; }

    public function hitungGaji() {
        return $this->gajiDasar;
    }
}

// Programmer
class Programmer extends Employee {
    public function hitungGaji() {
        $bonus = 0;

        if ($this->masaKerja < 1) {
            $bonus = 0;
        } elseif ($this->masaKerja <= 10) {
            $bonus = 0.01 * $this->masaKerja * $this->gajiDasar;
        } else {
            $bonus = 0.02 * $this->masaKerja * $this->gajiDasar;
        }

        return $this->gajiDasar + $bonus;
    }
}

// Direktur
class Direktur extends Employee {
    public function hitungGaji() {
        $bonus = 0.5 * $this->masaKerja * $this->gajiDasar;
        $tunjangan = 0.1 * $this->masaKerja * $this->gajiDasar;

        return $this->gajiDasar + $bonus + $tunjangan;
    }
}

// Pegawai Mingguan
class PegawaiMingguan extends Employee {
    private $hargaBarang;
    private $stockBarang;
    private $totalPenjualan;

    public function __construct($nama, $gajiDasar, $masaKerja, $harga, $stock, $jual) {
        parent::__construct($nama, $gajiDasar, $masaKerja);
        $this->hargaBarang = $harga;
        $this->stockBarang = $stock;
        $this->totalPenjualan = $jual;
    }

    public function hitungGaji() {
        $pencapaian = ($this->totalPenjualan / max($this->stockBarang,1)) * 100;

        if ($pencapaian > 70) {
            $tambahan = 0.10 * $this->hargaBarang * $this->totalPenjualan;
        } else {
            $tambahan = 0.03 * $this->hargaBarang * $this->totalPenjualan;
        }

        return $this->gajiDasar + $tambahan;
    }
}

// ================== AMBIL DATA ==================

// Gunakan null coalescing untuk mencegah undefined index
$nama = $_POST['nama'] ?? '';
$jabatan = $_POST['jabatan'] ?? '';
$gaji = $_POST['gaji'] ?? 0;
$masa = $_POST['masa'] ?? 0;

$harga = $_POST['harga'] ?? 0;
$stock = $_POST['stock'] ?? 1;
$jual = $_POST['jual'] ?? 0;

// ================== OBJECT ==================
$karyawan = null;

if (!empty($_POST)) {
    if ($jabatan == "Programmer") {
        $karyawan = new Programmer($nama, $gaji, $masa);
    } elseif ($jabatan == "Direktur") {
        $karyawan = new Direktur($nama, $gaji, $masa);
    } else {
        $karyawan = new PegawaiMingguan($nama, $gaji, $masa, $harga, $stock, $jual);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Gaji</title>
</head>
<body>

<div class="box">
    <h2>Hasil Perhitungan Gaji</h2>

    <?php if ($karyawan): ?>
        <p><b>Nama:</b> <?= htmlspecialchars($karyawan->getNama()); ?></p>
        <p><b>Jabatan:</b> <?= htmlspecialchars($jabatan); ?></p>
        <p><b>Masa Kerja:</b> <?= $karyawan->getMasaKerja(); ?></p>
        <p><b>Total Gaji:</b> Rp <?= number_format($karyawan->hitungGaji(), 0, ',', '.'); ?></p>
    <?php else: ?>
        <p>Form belum disubmit atau data kosong.</p>
    <?php endif; ?>

    <br>
    <a href="FormHT.php">← Kembali</a>
</div>

</body>
</html>