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
	$kdkecamatan  = $_POST['kdkecamatan'];
	$namakec      = $_POST['namakec'];
											
	$kec          = mysqli_query($conn,"SELECT * FROM kecamatan ORDER BY kode_kecamatan DESC");
	$row      	  = mysqli_fetch_array($kec);
	$ketemu    	  = $row['kode_kecamatan'];
	if ($ketemu!=$kdkecamatan) {
	$query        = mysqli_query($conn,"INSERT INTO kecamatan(kode_kecamatan,  nama_kecamatan) VALUES ('$kdkecamatan','$namakec') ");
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Kecamatan Berhasil Ditambahkan",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('kecamatan').'";
			});												
	</script>';				
	}
	else {
		echo '<script type="text/javascript">
				swal({ 
			  title: "Oops",
			   text: "Data Kode Kecamatan Sudah Terdaftar",
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