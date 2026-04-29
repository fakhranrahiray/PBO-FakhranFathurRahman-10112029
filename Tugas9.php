<?php

// ==========================================
// 3.b CLASS INDUK (uang_tabungan)
// ==========================================
class uang_tabungan {
    protected $saldo;       // 3.d Protected
    private $nama_siswa;    // 3.d Private

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
// 3.c CLASS ANAK (siswa 1, siswa 2, siswa 3)
// ==========================================
class siswa1 extends uang_tabungan {
    public function setor($jumlah) { $this->saldo += $jumlah; }
    public function tarik($jumlah) {
        if ($this->saldo >= $jumlah) { $this->saldo -= $jumlah; return true; }
        return false;
    }
}

class siswa2 extends uang_tabungan {
    public function setor($jumlah) { $this->saldo += $jumlah; }
    public function tarik($jumlah) {
        if ($this->saldo >= $jumlah) { $this->saldo -= $jumlah; return true; }
        return false;
    }
}

class siswa3 extends uang_tabungan {
    public function setor($jumlah) { $this->saldo += $jumlah; }
    public function tarik($jumlah) {
        if ($this->saldo >= $jumlah) { $this->saldo -= $jumlah; return true; }
        return false;
    }
}

// ==========================================
// MAIN PROGRAM
// ==========================================

// 3.i Gunakan fopen
$input_stream = fopen("php://stdin", "r");

// Kita buat data dengan beberapa nama yang sama untuk tes verifikasi
$daftar_siswa = [
    new siswa1("Aymen Kauruf", 50000000),
    new siswa2("Qeylan Asyarif", 12000000), 
    new siswa3("Seyna Syahrika", 1000000)
];

while (true) {
    echo "\n======================================\n";
    echo "       PROGRAM TABUNGAN SEKOLAH       \n";
    echo "======================================\n";
    
    // 3.g Menampilkan saldo awal
    foreach ($daftar_siswa as $key => $s) {
        echo ($key + 1) . ". " . $s->get_nama() . " | Saldo: " . $s->format_rp($s->cek_saldo()) . "\n";
    }
    
    echo "--------------------------------------\n";
    echo "0. Keluar\n";
    echo "Ketik Nomor Siswa: ";
    
    $pilihan = trim(fgets($input_stream));
    if ($pilihan === '0') break;

    $siswa_aktif = null;

    // --- LOGIKA PENCARIAN & VERIFIKASI ---
    
    if (is_numeric($pilihan) && isset($daftar_siswa[$pilihan - 1])) {
        // Jika inputnya angka, langsung pilih berdasarkan index
        $siswa_aktif = $daftar_siswa[$pilihan - 1];
    } else {
        // Jika inputnya nama, cari semua yang cocok (antisipasi nama ganda)
        $hasil_cari = [];
        foreach ($daftar_siswa as $key => $s) {
            if (strtolower($s->get_nama()) === strtolower($pilihan)) {
                $hasil_cari[] = ['index' => $key, 'objek' => $s];
            }
        }

        if (count($hasil_cari) > 1) {
            // VERIFIKASI NAMA GANDA
            echo "\n[!] Ditemukan " . count($hasil_cari) . " nama '" . $pilihan . "'. Pilih yang mana?\n";
            foreach ($hasil_cari as $i => $data) {
                echo ($i + 1) . ". " . $data['objek']->get_nama() . " (Saldo: " . $data['objek']->format_rp($data['objek']->cek_saldo()) . ")\n";
            }
            echo "Pilih (1-" . count($hasil_cari) . "): ";
            $sub_pilihan = (int)trim(fgets($input_stream));
            if (isset($hasil_cari[$sub_pilihan - 1])) {
                $siswa_aktif = $hasil_cari[$sub_pilihan - 1]['objek'];
            }
        } elseif (count($hasil_cari) === 1) {
            $siswa_aktif = $hasil_cari[0]['objek'];
        }
    }

    // --- PROSES TRANSAKSI ---
    
    if ($siswa_aktif) {
        echo "\n>>> LOGIN: " . strtoupper($siswa_aktif->get_nama()) . " <<<\n";
        echo "1. Setor | 2. Tarik | 3. Batal\nPilih: ";
        $aksi = trim(fgets($input_stream));

        if ($aksi == '1') {
            echo "Jumlah Setor: ";
            $jml = (int)trim(fgets($input_stream));
            $siswa_aktif->setor($jml);
            echo "Berhasil! Saldo: " . $siswa_aktif->format_rp($siswa_aktif->cek_saldo()) . "\n";
        } elseif ($aksi == '2') {
            echo "Jumlah Tarik: ";
            $jml = (int)trim(fgets($input_stream));
            if ($siswa_aktif->tarik($jml)) {
                echo "Berhasil! Sisa: " . $siswa_aktif->format_rp($siswa_aktif->cek_saldo()) . "\n";
            } else {
                echo "Gagal! Saldo tidak cukup.\n";
            }
        }
    } else {
        echo "\n[!] Siswa tidak ditemukan atau input salah.\n";
    }

    echo "\nTekan Enter...";
    fgets($input_stream);
}

fclose($input_stream);