<?php
	include"../include/lib_inc.php";

	$kec = $_POST['idkec'];
	$sqld = "SELECT kode_kecamatan, nama_kecamatan 
            FROM kecamatan WHERE kode_kecamatan='$kec'";
	$queryd = mysqli_query($conn, $sqld);
    $rowd = mysqli_fetch_array($queryd);		
	
	$sqla = "SELECT id_kelurahan, kode_kecamatan, nama_kelurahan, kode_pos 
    	    FROM kelurahan WHERE kode_kecamatan='$rowd[kode_kecamatan]'";
		 
	$querya = mysqli_query($conn, $sqla);
            
    while ($rowa = mysqli_fetch_array($querya)){	
    	if ($rowa["id_kelurahan"] == $row['id_kelurahan']){
        	$ceka = "selected";
        }
        else {
        	$ceka = "";
        }
                                        
   echo '<option value="'.$rowa["id_kelurahan"].'" '.$ceka.'> '.$rowa["nama_kelurahan"].' </option>'; } 

?>