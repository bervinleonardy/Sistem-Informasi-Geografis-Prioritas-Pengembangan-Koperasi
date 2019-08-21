<?php
	include_once'cases.php';
?>
<?php
	$dftr = $_GET['dftr'];
	$nk	  = $_GET['nk'];									
	$ver  = mysqli_query($conn,"UPDATE user SET status='Aktif' WHERE md5(id_user)='$dftr' AND md5(NIP)='$nk'");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Innotech.web.id - Geographic information systems business potential</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link href="css/responsive-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/logo/logo.ico">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css">
        
        <script src="maps/leaflet.js"></script>
		<script src="maps/wax.leaf.min.js"></script>
        <link href="maps/leaflet.css" rel="stylesheet">
        <link href="maps/leaflet.ie.css" rel="stylesheet">
    </head>
	 
    <body>
<div class="header">
	<section id="header" class="appear">
		
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="" data-0="line-height:90px;" data-300="line-height:50px;"><img src="img/logo/logo.png" style="width:80px; height:70px;"> Geographic Information Systems Kota Bandung 
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="">Data Usaha</a></li>
						<li><a href="#section-about">Info</a></li>
						<li><a href="#section-contact">Kontak</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModaldaftar">Daftar</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModallogin">Login</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
	<div class="container">
			<!-- Pop Up Modals Daftar -->
            <div class="modal fade" id="myModaldaftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <div class="close" data-dismiss="modal">X</div>
                    <h4 class="modal-title" id="myModalLabel">Form Daftar</h4>
                  </div>
                  <div class="modal-body">
					<form class="form-horizontal" action="/daftar/akun.php" name="modal_popup" enctype="multipart/form-data" method="post">
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="nama">Nama</label>
							 <div class="col-sm-10">
							 <input type="hidden" name="idakun"  class="form-control"/>
								<input type="text" name="nama" class="form-control" id="nama" placeholder="Isikan Nama Lengkap" required="">
							 </div>	
						 </div>
						 	
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="Nomor KTP">NIP</label>
							  <div class="col-sm-10">
								<input type="text" name="ktp" class="form-control" id="noktp" placeholder="Isikan Nomor Induk KTP" required="">
							  </div>	
						 </div>
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="email">Email</label>	
						 	<div class="col-sm-10">
								<input type="email" name="email" class="form-control" id="email" placeholder="Email Harus Valid" required="">
							</div>	
						 </div>
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="password">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
							</div>	
						 </div>
						 
						 <div class="form-group">	
						 <label class="control-label col-sm-2" for="ulangpassword">Ulang</label>
						 	<div class="col-sm-10">
								<input type="password" name="ulangpassword" class="form-control" id="ulangpassword"  placeholder="Tulis Ulang Password" required="">
							</div>
						 </div>
						 
						 <div class="form-group">	
						 <label class="control-label col-sm-2" for="alamat">Alamat</label>
						 	<div class="col-sm-4">
								<textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="Isikan Alamat Lengkap" required></textarea>
							</div>	
							<div class="col-sm-1">
								<label for="rt">RT</label>
							</div>
							<div class="col-sm-2">
								<input type="text" name="rt" class="form-control" placeholder="">
							</div>
						 	<div class="col-sm-1">
						 		<label for="rw">RW</label>
							</div>	
							<div class="col-sm-2">
								<input type="text" name="rw" class="form-control" placeholder="">
							</div>							
						 </div>	
						
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="tempat">Tempat</label>
						 	<div class="col-sm-10">
								<input type="text" name="tempat" class="form-control" id="tempat"  placeholder="Tempat Lahir" required="">
							</div>	
						 </div>	
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="tanggal">Tanggal</label>
							 <div class="col-sm-10">
								<input type="text" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal Lahir" class="tanggal" required="">
							 </div>	
						 </div>
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="telp">Telpon</label>
						 	<div class="col-sm-10">
								<input type="tel" name="telp" class="form-control" id="telp" placeholder="Nomor Telepon" >
							</div>	
						 </div>
						 	
						 <div class="form-group">
						 <label class="control-label col-sm-3" for="scan">Foto Copy KTP</label>	
							 <div class="col-sm-4"> 
								<input type="file" name="scan" id="scan" accept="image/*">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><br>
							 </div>	
						</div>	
						
						<div class="modal-footer">
							<input type="submit" class="line-btn blue" value="Daftar" ></button>
							<input type="reset" class="line-btn red" data-dismiss="modal" value="Kembali" ></button>
						</div>
					</form>                  
                  </div>
                </div>
              </div>
            </div>
		<!-- END Pop Up Modals Daftar--> 
			
				<!-- Pop Up Modals Login -->
            <div class="modal fade" id="myModallogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <div class="close" data-dismiss="modal">X</div>
                    <h4 class="modal-title" id="myModalLabel">Form Login</h4>
                  </div>
                  <div class="modal-body">
					
				
							<div id="sendmessage">Selamat Datang</div>
							<div id="errormessage">NIP Atau Password Salah</div>
							<form action="lib/login.php?log=<?=md5('login') ?>" method="post" role="form">
								<div class="form-group">
								<label for="NIP">NIP</label>
									<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" data-msg="Silakan Masukan No KTP Anda" required="" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
								<label for="password">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-msg="NIP Atau Password Salah" required=""/>
									<div class="validation"></div>
								</div>
								<p class="no-marg"><a href="#">Lupa Password?</a></p>
								<div class="modal-footer">
									<input type="submit" class="line-btn green" value="Login"></div><br>
									<p>Belum Punya Akun? <a href="#" data-toggle="modal" data-target="#myModaldaftar">Daftar Disini</a></p>
							</form>
						
					
                  </div>
                </div>
              </div>
            </div>
		</div>
		<!-- END Pop Up Modals Login--> 	
					
	<!-- contact -->
		<section id="section-contact" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Terima Kasih!</h2>
							<p>Selamat akun Anda sudah terverifikasi. Silahkan Login untuk membuat Data Usaha Anda.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="lib/login.php?log=<?=md5('login') ?>" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <label for="NIP">NIP</label>
									<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" data-msg="Silakan Masukan No KTP Anda" required="" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-msg="NIP Atau Password Salah" required=""/>
                                <div class="validation"></div>
                            </div>                            
                            <div class="text-center"><input type="submit" class="line-btn green" value="Login"></div>
                        </form>
					</div>
					<!-- ./span12 -->
				</div>
			</div>
		</section>		
        <section id="footer" class="section footer">
            <div class="container">
                <div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
                    <div class="col-sm-12 align-center">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>				
                    </div>
                </div>
    
                <div class="row align-center copyright">
                        <div class="col-sm-12">
                            <p>&copy; GREEN Theme</p>
                            <div class="credits">
                                <!-- 
                                    All the links in the footer should remain intact. 
                                    You can delete the links only if you purchased the pro version.
                                    Licensing information: https://bootstrapmade.com/license/
                                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Green
                                -->
                                <a href="#">Bootstrap Themes</a> by <a href="#">BootstrapMade</a>
                            </div>
                        </div>
                </div>
            </div>
    
        </section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyAaQlE85IpOK4A7yjfA96bouvrYIGFTQD0"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="js/skrollr.min.js"></script>		
	<script src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/responsive-slider.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/grid.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
	<script>wow = new WOW({}).init();</script>
    <script src="contactform/contactform.js"></script>
    
</body>
</html>