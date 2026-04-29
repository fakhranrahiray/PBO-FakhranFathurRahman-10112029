<?php

// ==========================================
// CLASS INDUK
// ==========================================
class uang_tabungan {
    protected $saldo;
    private $nama_siswa;

    public function __construct($nama, $saldo_awal) {
        $this->nama_siswa = $nama;
        $this->saldo = $saldo_awal;
    }

    public function get_nama() { return $this->nama_siswa; }
    public function cek_saldo() { return $this->saldo; }

    public function format_rp($angka) {
        return "Rp " . number_format($angka, 0, ',', '.');
    }
}

// ==========================================
// CLASS ANAK
// ==========================================
class siswa1 extends uang_tabungan {
    public function setor($jumlah) {
        if ($jumlah > 0) $this->saldo += $jumlah;
    }

    public function tarik($jumlah) {
        if ($jumlah > 0 && $this->saldo >= $jumlah) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

class siswa2 extends siswa1 {}
class siswa3 extends siswa1 {}


// ==========================================
// MAIN PROGRAM
// ==========================================
$input_stream = fopen("php://stdin", "r");

$daftar_siswa = [
    new siswa1("Aymen Kauruf", 50000000),
    new siswa2("Qeylan Asyarif", 12000000),
    new siswa3("Seyna Syahrika", 1000000)
];

while (true) {
    echo "\n======================================\n";
    echo "       PROGRAM TABUNGAN SEKOLAH       \n";
    echo "======================================\n";

    foreach ($daftar_siswa as $key => $s) {
        echo ($key + 1) . ". " . $s->get_nama() . 
             " | Saldo: " . $s->format_rp($s->cek_saldo()) . "\n";
    }

    echo "--------------------------------------\n";
    echo "0. Keluar\n";
    echo "Ketik Nomor / Nama Siswa: ";

    $pilihan = trim(fgets($input_stream));
    if ($pilihan === '0') break;


    
    $siswa_aktif = null;

    // =========================
    // CARI SISWA
    // =========================
    if (is_numeric($pilihan)) {

        if (isset($daftar_siswa[$pilihan - 1])) {
            $siswa_aktif = $daftar_siswa[$pilihan - 1];
        }

    } else {

        $hasil_cari = [];
        foreach ($daftar_siswa as $key => $s) {
            if (strtolower($s->get_nama()) === strtolower($pilihan)) {
                $hasil_cari[] = $s;
            }
        }

        if (count($hasil_cari) == 1) {
            $siswa_aktif = $hasil_cari[0];
        } elseif (count($hasil_cari) > 1) {
            echo "\n[!] Nama ganda, pilih salah satu:\n";
            foreach ($hasil_cari as $i => $s) {
                echo ($i+1) . ". " . $s->get_nama() . "\n";
            }
            echo "Pilih: ";
            $sub = (int)trim(fgets($input_stream));
            if (isset($hasil_cari[$sub - 1])) {
                $siswa_aktif = $hasil_cari[$sub - 1];
            } else {
                echo "[!] Pilihan tidak valid.\n";
            }
        }
    }

    // =========================
    // TRANSAKSI
    // =========================
    if ($siswa_aktif) {

        echo "\n>>> LOGIN: " . strtoupper($siswa_aktif->get_nama()) . " <<<\n";
        echo "1. Setor | 2. Tarik | 3. Batal\nPilih: ";
        $aksi = trim(fgets($input_stream));

        if ($aksi == '1') {

            echo "Jumlah Setor: ";
            $jml = (int)trim(fgets($input_stream));

            if ($jml <= 0) {
                echo "[!] Jumlah tidak valid.\n";
            } else {
                $siswa_aktif->setor($jml);
                echo "Berhasil! Saldo: " . 
                     $siswa_aktif->format_rp($siswa_aktif->cek_saldo()) . "\n";
            }

        } elseif ($aksi == '2') {

            echo "Jumlah Tarik: ";
            $jml = (int)trim(fgets($input_stream));

            if ($jml <= 0) {
                echo "[!] Jumlah tidak valid.\n";
            } elseif ($siswa_aktif->tarik($jml)) {
                echo "Berhasil! Sisa: " . 
                     $siswa_aktif->format_rp($siswa_aktif->cek_saldo()) . "\n";
            } else {
                echo "[!] Saldo tidak cukup.\n";
            }

        } elseif ($aksi == '3') {
            echo "Batal.\n";
        } else {
            echo "[!] Menu tidak valid.\n";
        }

    } else {

        if (is_numeric($pilihan)) {
            echo "\n[!] Data Tida Ditemukan.\n";
        } else {
            echo "\n[!] Nama siswa tidak ditemukan.\n";
        }

    }

    echo "\nTekan Enter...";
    fgets($input_stream);
}

fclose($input_stream);