<?php
session_start();

class Pembeli {

    public $nama;
    public $member;
    public $belanja;

    function __construct($nama, $member, $belanja) {
        $this->nama = $nama;
        $this->member = $member;
        $this->belanja = $belanja;
    }

    function hitung_diskon() {

        if ($this->member == "Memiliki") {

            if ($this->belanja > 500000) {
                return 50000;
            } elseif ($this->belanja > 100000) {
                return 15000;
            } else {
                return 0;
            }

        } else {

            if ($this->belanja > 100000) {
                return 5000;
            } else {
                return 0;
            }
        }
    }

    function hitung_total_bayar() {
        return $this->belanja - $this->hitung_diskon();
    }
}
// Ini Class
class Warung {
    // Ini Method
    function tambah_pembeli($data) {
        $_SESSION['data_pembeli'][] = $data;
    }

   function hapus_pembeli($index) {
    unset($_SESSION['data_pembeli'][$index]);
    $_SESSION['data_pembeli'] = array_values($_SESSION['data_pembeli']);
}
}

if (!isset($_SESSION['data_pembeli'])) {
    $_SESSION['data_pembeli'] = array();
}
// Ini Objeknya
$warungku = new Warung();


if (isset($_POST['tombol_tambah'])) {

    $nama_pembeli = $_POST['nama_pembeli'];
    $status_member = isset($_POST['status_member']) ? $_POST['status_member'] : "";
    $total_belanja = $_POST['total_belanja'];

    // Ini Kodingan buat ngevalidasi kalau data osong atau total belanja <=0 maka eror
    if ($nama_pembeli == "" || 
        $status_member == "" || 
        $total_belanja == "" || 
        !is_numeric($total_belanja) || 
        $total_belanja <= 0) {

        $_SESSION['pesan_error'] = "Maaf ada kesalahan input, mohon ketik ulang.";
        header("Location: form.warung.php");
        exit();

    } else {

        $pembeli = new Pembeli($nama_pembeli, $status_member, $total_belanja);

        $data = array(
            "nama" => $pembeli->nama,
            "member" => $pembeli->member,
            "belanja" => $pembeli->belanja,
            "diskon" => $pembeli->hitung_diskon(),
            "bayar" => $pembeli->hitung_total_bayar()
        );

        $warungku->tambah_pembeli($data);

        header("Location: form.warung.php");
        exit();
    }
}

// Ini Kodingan buat ngehapus data
if (isset($_POST['index_hapus'])) {

    $index = $_POST['index_hapus'];
    $warungku->hapus_pembeli($index);

    header("Location: form.warung.php");
    exit();
}
?>