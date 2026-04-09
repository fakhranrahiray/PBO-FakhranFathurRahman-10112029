<?php 
class produk {     
    public $nama;     
    public $harga;      

    public function __construct($nama, $harga) {         
        $this->nama = $nama;         
        $this->harga = $harga;     
    }       

    public function getInfo() {         
        
        return "Produk: " . $this->nama . " - Rp" . number_format($this->harga, 0, ',', '.') . "<br>";      
    } 
}  

class ProdukDigital extends produk {     
    public $ukuranFile;      

    public function __construct($nama, $harga, $ukuranFile) {         
        parent::__construct($nama, $harga);         
        $this->ukuranFile = $ukuranFile;     
    }         

    public function getInfo() {         
        
        return "Produk Digital: " . $this->nama . " - Rp" . number_format($this->harga, 0, ',', '.') . " | Ukuran File: " . $this->ukuranFile . " MB <br>";       
    } 
}  

$produk1 = new produk("Laptop", 12000000); 
$produk2 = new ProdukDigital("E-book PHP", 120000, 100);  


$data = [
    ["tipe"=>"produk", "nama"=>"Buku", "harga"=>5000],
    ["tipe"=>"digital", "nama"=>"Ebook", "harga"=>100000, "size"=>25]
];

foreach($data as $d){

    foreach($data as $d){

    if($d["tipe"] == "produk"){
        $obj = new produk($d["nama"], $d["harga"]);
    } else {
        $obj = new ProdukDigital($d["nama"], $d["harga"], $d["size"]);
    }

    echo $obj->getInfo();
    }
}
?>
