<?php

class Karyawan {
    // Properti
    public $nama;
    public $golongan;
    public $jamLembur;

    // 5. Constructor dengan parameter
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
    }

    // 1. Data gaji pokok berdasarkan golongan 
    public function getGajiPokok() {
        $daftarGaji = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
            "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
            "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];
        
        // Cek jika golongan ada di array, jika tidak set 0
        return isset($daftarGaji[$this->golongan]) ? $daftarGaji[$this->golongan] : 0;
    }

    // Menghitung total gaji: Gaji Pokok + (Jam Lembur * 15.000)
    public function getTotalGaji() {
        $upahLembur = $this->jamLembur * 15000; // 2. Besaran lembur
        return $this->getGajiPokok() + $upahLembur;
    }

    // 7. Destructor dipanggil otomatis saat objek di-unset
    public function __destruct() {
      
    }
}

// 4. Inisialisasi Array untuk menyimpan data objek
$dataKaryawan = [];

// Menambahkan data awal sesuai contoh di gambar
$dataKaryawan[] = new Karyawan("Winny", "IIb", 30);
$dataKaryawan[] = new Karyawan("Stendy", "IIIc", 32);
$dataKaryawan[] = new Karyawan("Alfred", "IVb", 30);

// 3. Perulangan untuk Menu Utama
while (true) {
    echo "\n===== MENU GAJI KARYAWAN =====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    
    $pilih = readline("Pilih menu: ");

    switch ($pilih) {
        // [READ] Menampilkan Data
        case '1':
            echo "\n===== DATA GAJI KARYAWAN =====\n";
            echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";
            foreach ($dataKaryawan as $index => $karyawan) {
                $no = $index + 1;
                $totalGajiFormat = "Rp" . number_format($karyawan->getTotalGaji(), 0, '', ',');
                echo "$no | {$karyawan->nama} | {$karyawan->golongan} | {$karyawan->jamLembur} | $totalGajiFormat\n";
            }
            break;

        // [CREATE] Menambah Data
        case '2':
            echo "\n--- Tambah Data Baru ---\n";
            $namaInput = readline("Masukkan Nama: ");
            $golonganInput = readline("Masukkan Golongan (ex: IIb): ");
            $lemburInput = readline("Masukkan Jam Lembur: ");
            
            // Instansiasi objek baru & simpan ke array
            $dataKaryawan[] = new Karyawan($namaInput, $golonganInput, (int)$lemburInput);
            echo "Data berhasil ditambahkan!\n";
            break;

        // [UPDATE] Mengubah Data
        case '3':
            $noEdit = readline("\nMasukkan No data yang ingin diubah: ");
            $idxEdit = $noEdit - 1; 
            
            if (isset($dataKaryawan[$idxEdit])) {
                $karyawan = $dataKaryawan[$idxEdit];
                
                
                $namaBaru = readline("Masukkan Nama Baru (KOSONG=TIDAK MENGUBAH): ");
                if (trim($namaBaru) !== "") {
                    $karyawan->nama = $namaBaru;
                }
                
                $golBaru = readline("Masukkan Golongan Baru (KOSONG=TIDAK MENGUBAH): ");
                if (trim($golBaru) !== "") {
                    $karyawan->golongan = $golBaru;
                }
                
                $lemburBaru = readline("Masukkan Jam Lembur Baru (KOSONG=TIDAK MENGUBAH): ");
                if (trim($lemburBaru) !== "") {
                    $karyawan->jamLembur = (int)$lemburBaru;
                }
                
                echo "Data berhasil diperbarui!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        // [DELETE] Menghapus Data & Unset Objek
        case '4':
            $noHapus = readline("\nMasukkan No data yang ingin dihapus: ");
            $idxHapus = $noHapus - 1;
            
            if (isset($dataKaryawan[$idxHapus])) {
                
                unset($dataKaryawan[$idxHapus]);
                
                $dataKaryawan = array_values($dataKaryawan);
                echo "Data berhasil dihapus!\n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        // KELUAR
        case '5':
            echo "Keluar dari program...\n";
            exit;

        default:
            echo "Pilihan tidak valid, silakan coba lagi!\n";
            break;
    }
}
?>