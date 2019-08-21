<?php
	include "../../include/lib_inc.php";
	
	$user       = $_POST['user'];
	$namaus       = $_POST['namaus'];
	$email        = $_POST['email'];
	$notel 		  = $_POST['notel'];
	$NIP     = $_POST['NIP'];
	$password     = $_POST['password'];
	$idtipe       = $_POST['idtipe'];
	$status       = $_POST['status'];
	
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
	}
											
	$us      = mysqli_query($conn,"SELECT id_user FROM user ORDER BY id_user DESC");
	$row     = mysqli_fetch_array($us);
	$passus  = md5($password);
	$kosong  = $row['id_user']+1;
									
	$query   = mysqli_query($conn,"INSERT INTO user(id_user, nama_user, foto_user, email, no_telp, NIP, password, tipe_user,status) 
									VALUES ('$kosong','$namaus','$fotous','$email','$notel','$NIP','$passus','$idtipe','$status')");
	header('location:../../index.php?hal='.md5('pengguna').'');
	
?>
