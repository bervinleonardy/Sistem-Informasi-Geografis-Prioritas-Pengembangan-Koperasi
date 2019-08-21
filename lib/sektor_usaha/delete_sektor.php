<?php include "../../include/lib_inc.php"; ?>
<!DOCTYPE html>
<html>
<head>
<!--sweet alert-->
<script type='text/javascript' src="../../sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../sweet-alert/sweet-alert.css">	
</head>
<body>
<?php
	$del = $_GET['del'];											
	$sek = mysqli_query($conn,"DELETE FROM sektor_usaha WHERE md5(id_sektor)='$del'");												
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Sektor Usaha Berhasil Dihapus",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('sektor').'";
			});												
	</script>';	
?>
</body>
</html>