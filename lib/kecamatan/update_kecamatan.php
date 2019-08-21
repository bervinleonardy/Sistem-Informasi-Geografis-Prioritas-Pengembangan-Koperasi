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

	$idkecamatan  = $_POST['idkecamatan'];
	$namakec      = $_POST['namakec'];
	$kec          = mysqli_query($conn,"SELECT * FROM kecamatan ORDER BY kode_kecamatan DESC");
	$row      	  = mysqli_fetch_array($kec);
	$ketemu    	  = $row['nama_kecamatan'];
	if($ketemu=$namakec) {
		echo '<script type="text/javascript">
				swal({ 
			  title: "Oops",
			   text: "Data Nama Kecamatan Sudah Terdaftar",
				type: "warning" 
			  },
			  function(){
				  window.history.back();
			});												
			</script>';
		}
		elseif ($ketemu!=$namakec) {												
	$query    =  mysqli_query($conn,"UPDATE  kecamatan SET  nama_kecamatan='$namakec'
									 WHERE kode_kecamatan='$idkecamatan'");
												
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Kecamatan Berhasil Diupdate",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('kecamatan').'";
			});												
	</script>';	
	}
?>
</body>
</html>	