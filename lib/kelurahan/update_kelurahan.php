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
	$idkelurahan  = $_POST['idkelurahan'];
	$namakel      = $_POST['namakel'];
	$idkec     	  = $_POST['idkec'];
	$kodepos      = $_POST['kodepos'];

	$kel          = mysqli_query($conn,"SELECT * FROM kelurahan ORDER BY id_kelurahan DESC");
	$row      	  = mysqli_fetch_array($kel);
	$ketemunama   = $row['nama_kelurahan'];
	if($ketemunama==$namakel) {
		echo '<script type="text/javascript">
				swal({ 
			  title: "Oops",
			   text: "Data Nama Kelurahan Sudah Terdaftar",
				type: "warning" 
			  },
			  function(){
				  window.history.back();
			});												
			</script>';		
	}	
	elseif ($ketemunama!=$namakel) {
	$query    =  mysqli_query($conn,"UPDATE  kelurahan SET nama_kelurahan='$namakel', kode_kecamatan='$idkec', kode_pos='$kodepos' WHERE id_kelurahan='$idkelurahan'");
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Kelurahan Berhasil Diupdate",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('kelurahan').'";
			});												
	</script>';	
	}
	else if ($idkec==''){
		echo '<script type="text/javascript">
				swal({ 
			  title: "Oops",
			   text: "Data Kecamatan Belum Dipilih",
				type: "warning" 
			  },
			  function(){
				  window.history.back();
			});												
			</script>';		
	}
?>
</body>
</html>	