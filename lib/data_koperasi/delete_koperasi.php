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
	$del  = $_GET['del'];
												
	$akn  = mysqli_query($conn,"DELETE FROM data_koperasi WHERE md5(id_koperasi)='$del'");
	echo '<script type="text/javascript">
				swal({ 
			  title: "Sukses",
			   text: "Data Koperasi Berhasil Dihapus",
				type: "success"
			  },
			  function(){
				  window.location.href = "../../index.php?hal='.md5('perusahaan').'";
			});												
	</script>';	
?>
</body>
</html>	