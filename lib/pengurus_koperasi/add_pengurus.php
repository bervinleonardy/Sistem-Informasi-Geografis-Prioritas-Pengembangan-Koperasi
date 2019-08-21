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
	$date  	       = date("Y-m-d H:i:s", time());	
	
	if(@$_FILES['fotoktp']['name']!="") {
		$fotoktp       = @$_FILES['fotoktp']['name'];
		$filetoupload  = @$_FILES['fotoktp']['tmp_name'];
		$target        = "../../content/images/ktp/";
												
		$ext           = explode('.',$fotoktp);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$fotoktp );													
		}													
	}
												
	if(@$_FILES['fotoak']['name']!="") {
		$fotoak    	   = @$_FILES['fotoak']['name'];
		$filetoupload  = @$_FILES['fotoak']['tmp_name'];
		$target        = "../../content/images/pengurus/";
															
		$ext           = explode('.',$fotoak);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$fotoak );													
		}											
	}
											
	$akn     = mysqli_query($conn,"SELECT id_pengurus FROM pengurus ORDER BY id_pengurus DESC");
	$row     = mysqli_fetch_array($akn);
	$us      = mysqli_query($conn,"SELECT id_user FROM user ORDER BY id_user DESC");
	$rowa    = mysqli_fetch_array($us);
	$passak  = md5($password);
	$kosong  = $row['id_pengurus']+1;
	$kosong2 = $rowa['id_user']+1;
	$query   = mysqli_query($conn,"INSERT INTO pengurus(id_pengurus, nama_pengurus, no_ktp, email_pengurus, password, alamat, no_telp, tempat_lahir, tanggal_lahir, jenis_kelamin, foto_ktp, foto_pengurus, id_user, tgl_daftar) 
									VALUES ('$kosong', '$nama', '$noktp', '$email', '$passak', '$alamat', '$notel', '$tptlahir', '$tgllahir', '$jenkel', '$fotoktp', '$fotoak', '$kosong2','$date') ");
									
	$querya   = mysqli_query($conn,"INSERT INTO user(id_user, nama_user, foto_user, email, no_telp, NIP, password, tipe_user, status) 
									VALUES ('$kosong2','$nama','$fotoak','$email','$notel','$noktp','$passak','Pengurus','Nonaktif')");
	
	$dftr = md5($kosong2);
	$nk   = md5($noktp);
	$em   = $email;
	$verificationLink = "http://sigkopbandung.co.nf/index.php?dftr=" . $dftr."&mail=".$em."&nk=".$nk;
	
	 			$htmlStr = "";
                 
                $htmlStr .= "Terima kasih sudah mendaftar di Koperasi Kota Bandung<br />";
				$htmlStr .= "Dengan data akun sebagai berikut : <br /><br />";
                $htmlStr .= "Nama     : {$nama}<br />";
                $htmlStr .= "No. KTP  : {$noktp}<br />";
				$htmlStr .= "Email    : {$em}<br />";
                $htmlStr .= "No. Telp : {$notel}<br />";
                $htmlStr .= "Alamat   : {$alamat}<br /><br />";  
				              
                $htmlStr .= "Lengkapi pedaftaran Anda dengan memverifikasi email akun Anda. Silahkan klik link dibawah.<br /><br /><br />";
                $htmlStr .= "<a href=\"{$verificationLink}\" target=\"_blank\" style=\"padding:1em; font-weight:bold; background-color:blue; color:#fff;\">COMPLETE REGISTRATION</a><br /><br /><br />";
                 
         		ini_set("SMTP","localhost");
			    ini_set("smtp_port","25");
				 
                $name = "Dinas Koperasi Usaha Mikro, Kecil dan Menengah Kota Bandung";
                $email_sender = "account-notreply@sigkopbandung.co.nf";
                $subject = "Verifications Registration Account";
                $recipient_email = $em;
 
                $headers  = "MIME-Version: 1.0 \r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
				
				
 
                $body = $htmlStr;
				
				@mail($recipient_email, $subject, $body, $headers);
				
				if(@mail){
					echo "<script>alert('Silahkan cek email Anda untuk memverifikasi Akun !!!');window.location='../../index.php?hal=".md5('pengurus')."';</script>";
					}
				else{
					echo'Gagal Dikirim !!';
					}

	
?>
