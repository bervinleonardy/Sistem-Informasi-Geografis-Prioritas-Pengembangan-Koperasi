<?php
	include "../../include/lib_inc.php";

	$user         = $_POST['user'];
	$namaus       = $_POST['namaus'];
	$email        = $_POST['email'];
	$notel 		  = $_POST['notel'];
	$NIP     = $_POST['NIP'];
	$idtipe       = $_POST['idtipe'];
	$status       = $_POST['status'];
	$passus        = md5($password);
	
	if($_FILES['fotous']['name']!="") {
		$fotous       = $_FILES['fotous']['name'];
		$filetoupload  = $_FILES['fotous']['tmp_name'];
		$target        = "../../content/images/user/";
												
		$ext           = explode('.',$fotous);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$fotous );													
		}													
	} elseif($_FILES['fotous']['name']=="") {
	   		$fotous = $foto;
	}
												
										
	$query = mysqli_query($conn,"UPDATE user SET nama_user='$namaus', foto_user='$fotous', email='$email', no_telp='$notel', NIP='$NIP', 				 								tipe_user='$idtipe', status='$status'
								WHERE id_user='$user'");
	
												
	header('location:../../index.php?hal='.md5('pengguna').'');
?>
