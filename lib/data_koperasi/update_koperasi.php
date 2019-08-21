<?php include "../../include/lib_inc.php";?>
<!DOCTYPE html>
<html>
<head>
<!--sweet alert-->
<script type='text/javascript' src="../../sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweet-alert/sweet-alert.css">	
</head>
<body>
<?php
	$idkop      = $_POST['idkop'];
	$nama       = $_POST['nama'];
	$user       = $_POST['user'];
	$jenkop     = $_POST['jenkop'];
    $benkop     = $_POST['benkop'];
	$alamat     = $_POST['alamat'];
	$idkel      = $_POST['idkel'];
	$idkec      = $_POST['idkec'];
	$email      = $_POST['email'];
	$notel      = $_POST['notel'];
	$lat        = $_POST['lat'];
	$lng        = $_POST['lng'];
	$kelkop     = $_POST['kelkop'];
	$idsektor   = $_POST['idsektor'];
	$date  	    = date("Y-m-d H:i:s", time());
	
	if($_FILES['foto1']['name']!="") {
		$foto1       = $_FILES['foto1']['name'];
		$filetoupload  = $_FILES['foto1']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto1);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto1 );													
		}													
	} elseif($_FILES['foto1']['name']=="") {
	   		$foto1 = $foto1;
	}	
												
	if($_FILES['foto2']['name']!="") {
		$foto2       = $_FILES['foto2']['name'];
		$filetoupload  = $_FILES['foto2']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto2);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto2 );													
		}													
	} elseif($_FILES['foto2']['name']=="") {
	   		$foto2 = $foto2;
	}	
	
	if($_FILES['foto3']['name']!="") {
		$foto3       = $_FILES['foto3']['name'];
		$filetoupload  = $_FILES['foto3']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto3);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto3 );													
		}													
	} elseif($_FILES['foto3']['name']=="") {
	   		$foto3 = $foto3;
	}	
	
	if($_FILES['foto4']['name']!="") {
		$foto4       = $_FILES['foto4']['name'];
		$filetoupload  = $_FILES['foto4']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto4);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto4 );													
		}													
	} elseif($_FILES['foto4']['name']=="") {
	   		$foto4 = $foto4;
	}	
	
	if($_FILES['foto5']['name']!="") {
		$foto1       = $_FILES['foto5']['name'];
		$filetoupload  = $_FILES['foto5']['tmp_name'];
		$target        = "../../content/images/koperasi/";
												
		$ext           = explode('.',$foto5);										
		$ekstensi      = end($ext);												
		$ekstensi      = strtolower($ekstensi);	
													
		if($ekstensi=='gif' OR $ekstensi=='jpg' OR $ekstensi=='jpeg' OR $ekstensi=='png') {	
			move_uploaded_file($filetoupload, $target.$foto5 );													
		}													
	} elseif($_FILES['foto5']['name']=="") {
	   		$foto5 = $foto5;
	}	
												
										
	$query = mysqli_query($conn,"UPDATE data_koperasi SET nama_koperasi='$nama', jenis_koperasi='$jenkop', id_pengurus ='$user', alamat_koperasi='$alamat',kel_koperasi='$kelkop',bentuk_koperasi='$benkop', id_kelurahan='$idkel', email='$email', no_telp='$notel', latitude='$lat', longitude='$lng',id_sektor='$idsektor', foto1='$foto1', foto2='$foto2', foto3='$foto3', foto4='$foto4', foto5='$foto5' WHERE id_koperasi='$idkop'");
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Koperasi Berhasil Diupdate",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('perusahaan').'";
			});												
	</script>';	
?>
</body>
</html>	