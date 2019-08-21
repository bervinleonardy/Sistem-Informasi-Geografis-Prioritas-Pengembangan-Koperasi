<?php
	include "../../include/lib_inc.php";

	$del = $_GET['del'];
												
	$akn = mysqli_query($conn,"DELETE FROM wp WHERE md5(id_wp)='$del'");
													
	header('location:../../index.php?hal='.md5('wp').'');
?>
