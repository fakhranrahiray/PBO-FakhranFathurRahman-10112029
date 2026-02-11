<?php
class kalkulatorSuhu {
public $celsius;
public function toFahrenheit() {
return ($this->celsius * 1.8) + 32;
}
public function toKelvin() {
return $this->celsius + 273.15;
}
}
$kalkulator1 = new kalkulatorSuhu();
$kalkulator1->celsius=80;

echo "<pre>";
echo " ";
echo "====Kalkulator Suhu====\n";
echo "satuan: celcius (°C)\n";  
echo "-----------------------\n";
echo "SUHU (C)  : " . $kalkulator1->celsius . " °C\n";
echo "FARENHEIT : " . $kalkulator1->toFahrenheit() . " °F\n";
echo "KELVIN    : " . $kalkulator1->toKelvin() . " K\n";
echo "=======================\n";

?>