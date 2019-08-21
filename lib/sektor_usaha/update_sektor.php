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

	$idsektor     = $_POST['idsektor'];
	$namasek      = $_POST['namasek'];
	$sek          = mysqli_query($conn,"SELECT * FROM sektor_usaha ORDER BY id_sektor DESC");
	$row      	  = mysqli_fetch_array($sek);
	$ketemu    	  = $row['nama_sektor'];
	if($ketemu=$namasek) {
		echo '<script type="text/javascript">
				swal({ 
			  title: "Oops",
			   text: "Data Sektor Usaha Sudah Terdaftar",
				type: "warning" 
			  },
			  function(){
				  window.history.back();
			});												
			</script>';
		}
	elseif ($ketemu!=$namakec) {
	$query    =  mysqli_query($conn,"UPDATE  sektor_usaha SET nama_sektor='$namasek' 
									 WHERE id_sektor='$idsektor'");
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Sektor Usaha Berhasil Diupdate",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('sektor').'";
			});												
	</script>';	
	}
?>
</body>
</html>	