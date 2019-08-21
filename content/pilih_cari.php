<?php
	include"../include/lib_inc.php";

	$kec = $_POST['ops'];
	if ($kec==1)
	$sqla = "SELECT kode_kecamatan , nama_kecamatan 
            FROM kecamatan";
		 
	$querya = mysqli_query($conn, $sqla);
            
    while ($rowa = mysqli_fetch_array($querya)){
                                        
   echo '<option value="'.$rowa["kode_kecamatan"].'"> '.$rowa["nama_kecamatan"].' </option>'; } 
  /* cari kelurahan*/
	$kel = $_POST['ops'];
	if ($kel==2)
	$sqlb = "SELECT id_kelurahan , nama_kelurahan
            FROM kelurahan";
		 
	$queryb = mysqli_query($conn, $sqlb);
            
    while ($rowb = mysqli_fetch_array($queryb)){
                                        
   echo '<option value="'.$rowb["id_kelurahan"].'"> '.$rowb["nama_kelurahan"].' </option>'; } 
  /* cari jenis usaha*/
	$jush = $_POST['ops'];
	if ($jush==3)
	$sqlc = "SELECT id_usaha , produk_utama
            FROM data_usaha";
		 
	$queryc = mysqli_query($conn, $sqlc);
            
    while ($rowc = mysqli_fetch_array($queryc)){
                                        
   echo '<option value="'.$rowc["id_usaha"].'"> '.$rowc["produk_utama"].' </option>'; } 
  /* cari jenis usaha*/
	$sekus = $_POST['ops'];
	if ($sekus==4)
	$sqld = "SELECT id_sektor , nama_sektor
            FROM sektor_usaha";
		 
	$queryd = mysqli_query($conn, $sqld);
            
    while ($rowd = mysqli_fetch_array($queryd)){
                                        
   echo '<option value="'.$rowd["id_sektor"].'"> '.$rowd["nama_sektor"].' </option>'; } 

?>