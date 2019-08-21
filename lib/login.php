<?php 
session_start();
include "../include/lib_inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<!--sweet alert-->
<script type='text/javascript' src="../sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../sweet-alert/sweet-alert.css">	
</head>
<body>	
<?php 
	switch ($_GET["log"]){   	
		case md5("login")		:	   $user = mysqli_query($conn,"SELECT id_user, tipe_user, status FROM user
															WHERE tipe_user = 'Staf Seksi' AND tipe_user = 'Kasie' AND tipe_user = 'Staf Data' OR NIP  = '".$_POST["NIP"]."' 
															AND password = '".md5($_POST["password"])."'
															");
									   $row = mysqli_fetch_array($user);
									   
									   if (mysqli_num_rows($user)>=1){
										   if($row['status']=='Aktif'){		
										   	$_SESSION["user"]       = $row['id_user'];
											$_SESSION["tipeus"] 	= $row['tipe_user'];	
											$_SESSION["kopsign"]    = true;	
											if ($row['tipe_user']== 'Kasie' ){
												$result = 'Kasie Pengembangan & Pembiayaan Koperasi';
											}
											elseif ($row['tipe_user']!= 'Kasie'){
												$result = $row['tipe_user'];
											}   
											echo '<script type="text/javascript">
														swal({ 
													  title: "Selamat Datang",
													   text: "'.$result.'",
														type: "success"
													  },
													  function(){
														  window.location.href = "../";
													});												
											</script>'; 
									   		}
											elseif ($row['status']=='Nonaktif'){
												echo "<script>alert('Akun Anda belum diaktivasi, silahkan cek email Anda untuk memverifikasi Akun !!!');window.location='../';</script>";
												}

									   }else {
												echo '<script type="text/javascript">
														swal({ 
													  title: "Oops",
													   text: "NIP atau Password salah !!",
														type: "error" 
													  },
													  function(){
														  window.history.back();
													});												
											</script>';
											   }
									   mysqli_close($conn);							   
								  	   break;
									   
		case md5("logout")		:	$user  = session_unset($_SESSION["user"]);
						  			$u_date  = date("Y-m-d H:i:s", time());
									   
									$usr = mysqli_query($conn,"UPDATE user SET user_date='$u_date' WHERE id_user='$user'");
									   
									session_destroy();
									   
									echo '<script type="text/javascript">
												swal({ 
											  title: "Terima Kasih",
											   text: "Anda Sudah Logout dari Sistem",
												type: "success"
											  },
											  function(){
												  window.location.href = "../index.php";
											});												
									</script>'; 
									  
									   break;
								   
   }
?>
</body>
</html>