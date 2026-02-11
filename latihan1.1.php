<?php
class Pengguna {
    protected $nama;
    public $role;

    public function __construct($nm, $r) {
        $this->nama = $nm;
        $this->role = $r;
    }

    public function cekInfo() {
        return "User: $this->nama ($this->role)";
    }
}

class Mahasiswa extends Pengguna {
    private $nim;

    public function __construct($nm, $id) {
        parent::__construct($nm, "Member");
        $this->nim = $id;
    }


    public function cekInfo() {
        return "Nama: $this->nama | NIM: $this->nim";
    }

    public function getNim() {
        return $this->nim;
    }
}

$mhs = new Mahasiswa("Fakhran", "10112029");
echo "<h3>DATA MAHASISWA</h3>";
echo $mhs->cekInfo();
?>



































