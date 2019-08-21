<?php
	session_start();
	include "../../include/lib_inc.php";?>
<!DOCTYPE html>
<html>
<head>
<!--sweet alert-->
<script type='text/javascript' src="../../sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweet-alert/sweet-alert.css">	
</head>
<body>
<?php	
	error_reporting(0);
	$idkop      = $_POST['idkop'];
	$nama       = $_POST['nama'];
	$pengurus   = $_POST['pengurus'];
	$jenkop     = $_POST['jenkop'];
    $benkop     = $_POST['benkop'];
	$alamat     = $_POST['alamat'];
	$idkel      = $_POST['idkel'];
	$email      = $_POST['email'];
	$notel      = $_POST['notel'];
	$lat        = $_POST['lat'];
	$lng        = $_POST['lng'];
	$kelkop     = $_POST['kelkop'];
	$idsektor   = $_POST['idsektor'];									
												
	if($_FILES['foto1']['name']!="") {
		$foto1         = $_FILES['foto1']['name'];
		$filetoupload  = $_FILES['foto1']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto1);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto1 );													
		}													
	}
	
	if($_FILES['foto2']['name']!="") {
		$foto2         = $_FILES['foto2']['name'];
		$filetoupload  = $_FILES['foto2']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto2);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto2 );													
		}													
	}											

	if($_FILES['foto3']['name']!="") {
		$foto3         = $_FILES['foto3']['name'];
		$filetoupload  = $_FILES['foto3']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto3);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto3 );													
		}													
	}											
	
	if($_FILES['foto4']['name']!="") {
		$foto4         = $_FILES['foto4']['name'];
		$filetoupload  = $_FILES['foto4']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto4);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto4 );													
		}													
	}
	
	if($_FILES['foto5']['name']!="") {
		$foto5         = $_FILES['foto5']['name'];
		$filetoupload  = $_FILES['foto5']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto5);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
											
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto5 );													
		}													
	}
												
	$usa     = mysqli_query($conn,"SELECT id_koperasi FROM data_koperasi ORDER BY id_koperasi DESC");
	$usp     = mysqli_query($conn,"SELECT id_pengurus FROM pengurus ORDER BY id_pengurus DESC");
	$row     = mysqli_fetch_array($usa);
	$rowp    = mysqli_fetch_array($usp);
	$kosong  = $row['id_koperasi']+1;
	$kosongp = $rowp['id_pengurus']+1;
	$query   = mysqli_query($conn,"INSERT INTO pengurus(id_pengurus, nama_pengurus,email_pengurus,alamat,no_telp) VALUES ('$kosongp','$pengurus','$email','$alamat','$notel') ");
	$query   .= mysqli_query($conn,"INSERT INTO data_koperasi(id_koperasi, nama_koperasi,jenis_koperasi, id_pengurus, kel_koperasi, alamat_koperasi,bentuk_koperasi, id_kelurahan, latitude, longitude, id_sektor, foto1, foto2, foto3, foto4, foto5) VALUES ('$idkop','$nama','$jenkop','$kosongp','$kelkop','$alamat','$benkop','$idkel','$lat','$lng','$idsektor','$foto1','$foto2','$foto3','$foto4','$foto5') ");
	
		
	$sqle = "SELECT id_user, tipe_user FROM user WHERE id_user='$_SESSION[user]'";
	$querye = mysqli_query($conn,$sqle);
	$rowe = mysqli_fetch_array($querye);
	
	if($rowe['tipe_user']=='Staf Seksi'){
		$op='perusahaan';
		}
	elseif($rowe['tipe_user']!='Staf Seksi'){
		$op='lisdatak';
		}
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Koperasi Berhasil Ditambahkan",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5($op).'";
			});												
	</script>';								

?>
</body>
</html>