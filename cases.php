<?php
function kodeAcak($panjang)
{
 $karakter = '';
 $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
 $karakter .= '1234567890'; // karakter numerik
 $karakter .= '@#$^*()_+=/?'; // karakter simbol
 
 $string = '';
 for ($i=0; $i < $panjang; $i++) { 
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
 }
 return $string; // pengulangan secara acak 
}
$panjang = 60 ;
$string = kodeAcak($panjang);

switch (isset($_GET['gis'])){
	case base64_encode("rumahku"):		
		$redirect="content/home.php";
		break;

	case base64_encode("haldep"):
		$redirect="awal.php";
		break;
		
		
	default:
		$redirect="content/home.php";
		break;
	}

include_once "$redirect";
?>