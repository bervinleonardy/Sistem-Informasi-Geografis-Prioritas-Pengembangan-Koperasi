<?php
	include "../../include/lib_inc.php";

	$idwp         = $_POST['idwp'];
	$idkop        = $_POST['idkop'];
	$kelkop       = $_POST['kelkop'];
	$keaktifan	  = $_POST['keaktifan'];
	$jumangp  	  = $_POST['jumang'];
	$modsenp 	  = $_POST['modsen'];
	$modlup   	  = $_POST['modlu'];
	$assetp   	  = $_POST['asset'];
	$omsetp   	  = $_POST['omset'];
	$shup    	  = $_POST['shu'];
	$produktifitas= $_POST['produktifitas'];

	$mo = 5/29;
	$om = 5/29;
	$as	= 5/29;
	$pr = 4/29;
	$sh = 4/29;
	$ke = 3/29;
	$te = 3/29;										

	if  ($keaktifan == 'aktif')  {
		 $aktif = pow(5,-$ke);
	}
	if ($keaktifan == 'tidak aktif') {
		 $aktif = pow(0,-$ke);
	}										

	if ($jumangp < 1) {
		 $jumang = pow(1,-$te);
	}
	if (($jumangp >= 1) && ($jumangp <= 5)) {
		 $jumang = pow(2,-$te);
	}									
	if (($jumangp >= 5) && ($jumangp <= 10)) {
		 $jumang = pow(3,-$te);
	}									
	if (($jumangp >= 10) && ($jumangp <= 20)) {
		 $jumang = pow(4,-$te);
	}									
	if  ($jumangp > 20) {
		 $jumang = pow(5,-$te);
	}	

	if ($modsenp < 12035000) {
		 $modsen = pow(1,$mo);
	}
	if (($modsenp >= 12035000) && ($modsenp <= 100000000)) {
		 $modsen = pow(2,$mo);
	}									
	if (($modsenp >= 100000000) && ($modsenp <= 700000000)) {
		 $modsen = pow(3,$mo);
	}									
	if (($modsenp >= 700000000) && ($modsenp <= 1000000000)) {
		 $modsen = pow(4,$mo);
	}									
	if  ($modsenp > 1000000000) {
		 $modsen = pow(5,$mo);
	}	

	if ($assetp < 29640600) {
		 $asset = pow(1,$as);
	}
	if (($assetp >= 29640600) && ($assetp <= 117000000)) {
		 $asset = pow(2,$as);
	}									
	if (($assetp >= 117000000) && ($assetp <= 720000000)) {
		 $asset = pow(3,$as);
	}									
	if (($assetp >= 720000000) && ($assetp <= 1500000000)) {
		 $asset = pow(4,$as);
	}									
	if  ($assetp > 1500000000) {
		 $asset = pow(5,$as);
	}	

	if ($omsetp < 15200000) {
		 $omset = pow(1,$om);
	}
	if (($omsetp >= 15200000) && ($omsetp <= 103000000)) {
		 $omset =pow(2,$om);
	}									
	if (($omsetp >= 103000000) && ($omsetp <= 710000000)) {
		 $omset =pow(3,$om);
	}									
	if (($omsetp >= 710000000) && ($omsetp <= 1100000000)) {
		 $omset =pow(4,$om);
	}									
	if  ($omsetp > 1100000000) {
		 $omset =pow(5,$om);
	}	

	if ($shup < 3801000) {
		 $shu = pow(1,$sh);
	}
	if (($shup >= 3801000) && ($shup <= 10000000)) {
		 $shu = pow(2,$sh);
	}									
	if (($shup >= 10000000) && ($shup <= 40000000)) {
		 $shu = pow(3,$sh);
	}									
	if (($shup >= 40000000) && ($shup <= 100000000)) {
		 $shu = pow(4,$sh);
	}									
	if  ($shup > 100000000) {
		 $shu = pow(5,$sh);
	}	

	if ($produktifitas <= 3) {
		 $prod = pow(1,$pr);
	}
	if (($produktifitas > 3) && ($produktifitas <= 8)) {
		 $prod = pow(2,$pr);
	}									
	if (($produktifitas >= 9) && ($produktifitas <= 14)) {
		 $prod = pow(3,$pr);
	}									
	if (($produktifitas >= 15) && ($produktifitas <= 20)) {
		 $prod = pow(4,$pr);
	}									
	if  ($produktifitas > 20) {
		 $prod = pow(5,$pr);
	}
	$Si = $aktif * $jumang * $modsen * $asset * $omset * $shu * $prod;
									
	$query   = mysqli_query($conn,"UPDATE wp SET keaktifan='$keaktifan', id_koperasi='$idkop',kel_koperasi='$kelkop ' , jumlah_anggota ='$jumangp', modal_sendiri='$modsenp' , modal_luar='$modlup', asset ='$assetp', omset='$omsetp' , shu='$shup' , produktifitas='$produktifitas' ,Si='$Si' WHERE id_wp='$idwp'");
	
												
	header('location:../../index.php?hal='.md5('wp').'');
?>
