<?php
	include "../../include/lib_inc.php";

	$idpeng        = $_POST['idpeng'];
	$nama          = $_POST['nama'];
	$noktp         = $_POST['noktp'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$alamat        = $_POST['alamat'];
	$notel         = $_POST['notel'];
	$tptlahir      = $_POST['tptlahir'];
	$tgllahir      = $_POST['tgllahir'];
	$jenkel        = $_POST['jenkel'];
	$user        = $_POST['user'];
	$passak        = md5($password);
	
	if($_FILES['fotoktp']['name']!="") {
		$fotoktp       = $_FILES['fotoktp']['name'];
		$filetoupload  = $_FILES['fotoktp']['tmp_name'];
		$target        = "../../content/images/ktp/";
												
		$ext           = explode('.',$fotoktp);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$fotoktp );													
		}													
	} elseif($_FILES['fotoktp']['name']=="") {
	   		$fotoktp = $ktp;
	}	
												
	if($_FILES['fotoak']['name']!="") {
		$fotoak        = $_FILES['fotoak']['name'];
		$filetoupload  = $_FILES['fotoak']['tmp_name'];
		$target        = "../../content/images/pengurus/";
												
		$ext           = explode('.',$fotoak);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
												
	  	if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$fotoak );													
		}
											
	}elseif($_FILES['fotoak']['name']=="") {
			$fotoak = $fot;
	}
												
										
	$query = mysqli_query($conn,"UPDATE pengurus SET nama_pengurus='$nama', no_ktp='$noktp', email_pengurus='$email', alamat='$alamat', no_telp='$notel', tempat_lahir='$tptlahir', tanggal_lahir='$tgllahir', jenis_kelamin='$jenkel', foto_ktp='$fotoktp', foto_pengurus='$fotoak', id_user='$user'
								WHERE id_pengurus='$idpeng'");
	$querya= mysqli_query($conn,"UPDATE user SET nama_user='$nama', foto_user='$fotoak', email='$email', no_telp='$notel', NIP='$noktp'
								WHERE id_user='$user'");
	
												
	header('location:../../index.php?hal='.md5('pengurus').'');
?>
