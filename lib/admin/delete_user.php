<?php
	include "../../include/lib_inc.php";

	$del = $_GET['del'];
												
	$akn = mysqli_query($conn,"DELETE FROM user WHERE md5(id_user)='$del'");
													
	header('location:../../index.php?hal='.md5('pengguna').'');
?>
