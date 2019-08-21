<?php
	session_start();
?>
<!DOCTYPE html>
    <html class="no-js">
		<head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SIG KOPERASI | Bandung :: Login</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="../js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/bootstrap-theme.css">
		<link href="../css/responsive-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap-datepicker3.min.css">
        <link rel="shortcut icon" href="../img/logo/logo.ico">

		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="../skin/default.css">		
			
        <!--external css-->
        <link rel="stylesheet" type="text/css" href="../js/gritter/css/jquery.gritter.css" />	   <script src="../js/jquery-3.2.1.min.js"></script>  
     </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <center><h1 class="panel-title">Selamat Datang di SIGKOP Bandung</h1><br>
							<center><h3 class="panel-title">Silahkan Login</h3></center>
                    </div>
					<div class="modal-body">
					 <h1><center><img src="../img/logo/logo-koperasi.png" height="200" width="200"></h1>
					</div>					
                    <div class="panel-body">
							<div id="sendmessage">Selamat Datang</div>
							<div id="errormessage">NIP Atau Password Salah</div>
							<form action="../lib/login.php?log=<?=md5('login') ?>" method="post" role="form">
								<div class="form-group">
								<label for="NIP">NIP</label>
									<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" data-msg="Silakan Masukan NIP Anda" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
								<label for="password">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-msg="NIP Atau Password Salah"/>
									<div class="validation"></div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="line-btn green" value="Login">
								</div>
							</form>
                    </div>
                </div>
            </div>
        </div>
    </div>						
		
</body>
