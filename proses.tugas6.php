<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Volume Bangun Ruang</title>
    <style>
        body { font-family: "Times New Roman", Times, serif; padding: 20px; }
        table {
            border-collapse: collapse;
            width: 650px;
            text-align: center;
        }
        th, td {
            border: 1px solid black;
            padding: 5px 8px;
        }
        th {
            background-color: blue;
            color: white;
            font-weight: normal;
        }
        td.left-align { text-align: left; }
    </style>
</head>
<body>

<?php
// CLASS & PROPERTIES
class BangunRuang {
    public $jenis;
    public $sisi;
    public $jari_jari;
    public $tinggi;

    // Constructor (Method otomatis saat objek dibuat)
    public function __construct($jenis, $sisi, $jari_jari, $tinggi) {
        $this->jenis = $jenis;
        $this->sisi = $sisi;
        $this->jari_jari = $jari_jari;
        $this->tinggi = $tinggi;
    }

    // FUNCTION / METHOD (Menghitung Volume)
    public function hitungVolume() {
        $volume = 0;
        $pi = 3.14; // Menggunakan 3.14 agar hasil perhitungan persis dengan gambar soal

        // PERCABANGAN (Switch Case)
        switch ($this->jenis) {
            case 'Bola':
                // Rumus: 4/3 * pi * r^3
                $volume = (4/3) * $pi * pow($this->jari_jari, 3);
                break;
            case 'Kerucut':
                // Rumus: 1/3 * pi * r^2 * t
                $volume = (1/3) * $pi * pow($this->jari_jari, 2) * $this->tinggi;
                break;
            case 'Limas Segi Empat':
                // Rumus: 1/3 * luas alas(sisi*sisi) * tinggi
                $volume = (1/3) * pow($this->sisi, 2) * $this->tinggi;
                break;
            case 'Kubus':
                // Rumus: sisi^3
                $volume = pow($this->sisi, 3);
                break;
            case 'Tabung':
                // Rumus: pi * r^2 * t
                $volume = $pi * pow($this->jari_jari, 2) * $this->tinggi;
                break;
        }
        return $volume;
    }
}

// Memeriksa apakah ada data POST yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['data'])) {
    
    // ARRAY (Mengambil array dari input form)
    $data_input = $_POST['data'];
    $kumpulan_objek = []; 

    //  PERULANGAN (Membuat Object untuk setiap baris array)
    foreach ($data_input as $item) {
        // Pembuatan Object baru
        $objek = new BangunRuang($item['jenis'], $item['sisi'], $item['jari_jari'], $item['tinggi']);
        // Memasukkan object ke dalam array $kumpulan_objek
        array_push($kumpulan_objek, $objek);
    }

    // TABEL (Mencetak output HTML)
    echo "<table>";
    echo "<tr>
            <th>Jenis Bangun Ruang</th>
            <th>Sisi</th>
            <th>Jari-jari</th>
            <th>Tinggi</th>
            <th>Volume</th>
          </tr>";

    // Perulangan untuk mencetak baris-baris tabel dari kumpulan objek
    foreach ($kumpulan_objek as $bangun) {
        echo "<tr>";
        echo "<td class='left-align'>" . htmlspecialchars($bangun->jenis) . "</td>";
        echo "<td>" . htmlspecialchars($bangun->sisi) . "</td>";
        echo "<td>" . htmlspecialchars($bangun->jari_jari) . "</td>";
        echo "<td>" . htmlspecialchars($bangun->tinggi) . "</td>";
        echo "<td>" . $bangun->hitungVolume() . "</td>"; // Memanggil method perhitungan
        echo "</tr>";
    }
    
    echo "</table>";

} else {
    echo "<p>Silakan isi form terlebih dahulu!</p>";
}
?>

</body>
</html>