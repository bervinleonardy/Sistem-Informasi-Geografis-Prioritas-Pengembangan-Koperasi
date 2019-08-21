<?php
	include "../../include/lib_inc.php";

	$del = $_GET['del'];
	$del2 = $_GET['del2'];
												
	$akn = mysqli_query($conn,"DELETE FROM pengurus WHERE md5(id_pengurus)='$del'");
	$usr = mysqli_query($conn,"DELETE FROM user WHERE md5(id_user)='$del2'");
													
	header('location:../../index.php?hal='.md5('pengurus').'');
?>
