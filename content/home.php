<?php
	include_once'cases.php';
	$dftr = $_GET['dftr'];
	$nk	  = $_GET['nk'];									
	$ver  = mysqli_query($conn,"UPDATE user SET status='Aktif' WHERE md5(id_user)='$dftr' AND md5(NIP)='$nk'");
?>
       	
<!DOCTYPE html>
    <html class="no-js"> 
    <head>
		<!-- BASICS -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistem Informasi Geografis Koperasi Kota Bandung</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link href="css/responsive-slider.css" rel="stylesheet">
		<link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
        <link rel="shortcut icon" href="img/logo/logo.ico">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- skin -->
		<link rel="stylesheet" href="skin/default.css"> 
   		
    	<!--Api Leaflet Maps-->
    	<script src="maps/leaflet.js"></script>
		<script src="maps/wax.leaf.min.js"></script>
        <link href="maps/leaflet.css" rel="stylesheet">
        <link href="maps/leaflet.ie.css" rel="stylesheet">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
		<!--Api Leaflet Maps AJAX Geojson-->
		<script type="text/javascript" src="maps/leaflet.ajax.js"></script>
		<script src="maps/spin.js"></script>
		<script src="maps/leaflet.spin.js"></script>
		<script src="maps/leaflet-src1.js"></script>
		<script type="text/javascript" src="maps/bouncemarker.js"></script>
        <!--external css-->
        <link rel="stylesheet" type="text/css" href="js/gritter/css/jquery.gritter.css" />  
     </head>
	 
    <body>
<div class="header">
	<section id="header" class="appear">
		
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
				
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="" data-0="line-height:90px;" data-300="line-height:50px;"><img src="img/logo/logo.png" style="width:80px; height:70px;"> SIGKOP Kota Bandung 
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
<!--
						<li class="active"><a href="?gis=<?=base64_encode('home'.$string)?>">Data Usaha</a></li>
						<li><a href="#section-about">Info</a></li>
						<li><a href="#section-works">Gallery</a></li>
						<li><a href="#section-contact">Kontak</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModaldaftar">Daftar</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModallogin">Login</a></li>
-->
					</ul>	
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
			<!-- Pop Up Modals Petunjuk Pengguna -->
            <div class="modal fade" id="myModalpetunjuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <div class="close" data-dismiss="modal">X</div>
                    <h4 class="modal-title" id="myModalLabel">Petunjuk Penggunaan</h4>
                  </div>
                  <div class="modal-body">
				
			
					<div class="row-slider">
						<div class="col-lg-12 mar-bot30">
							<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
								<div class="slides" data-group="slides">
									<ul>
  	    		
										<div class="slide-body" data-group="slide">
											<li><img alt="" class="img-responsive" src="img/slider/1.jpg" width="100%" height="500"/></li>
											<li><img alt="" class="img-responsive" src="img/slider/2.jpg" width="100%" height="500"/></li>
<!--
											<li><img alt="" class="img-responsive" src="img/slider/pencet_deskripsi.jpg" width="100%" height="500"/></li>
											<li><img alt="" class="img-responsive" src="img/slider/petunjuk_arah.jpg" width="100%" height="500"/></li>							
-->
										</div>
									</ul>
										<a class="slider-control left" href="#" data-jump="prev"><i class="fa fa-angle-left fa-2x"></i></a>
										<a class="slider-control right" href="#" data-jump="next"><i class="fa fa-angle-right fa-2x"></i></a>
								
								</div>
							</div>
						</div>					
					</div>
							
					<div class="modal-footer">
					<input type="reset" class="line-btn red" data-dismiss="modal" value="Tutup" >
					</div>
						
                  </div>
                </div>
              </div>
            </div>
		<!-- END Pop Up Modals Petunjuk Pengguna-->		
	
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
									<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" data-msg="Silakan Masukan No KTP Anda" />
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
		<!-- END Pop Up Modals Login--> 	
		<!-- Advance Search by Bootsnip-->
            <div class="modal alert-info" id="myModalcari" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-body">
                  					
					<div class="col-md-12">
						<div class="input-group" id="adv-search">
						 <form action="content/hasil_search.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<input type="text" class="form-control" name="findtext" placeholder="Cari Informasi Usaha" />							
							
						</form>
							<div class="input-group-btn">
								<div class="btn-group" role="group">
									<div class="dropdown dropdown-lg">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"  value="findops"><span class="caret"></span></button>										
										<div class="dropdown-menu dropdown-menu-right" role="menu">
										
											<form class="form-horizontal" method="post" action="" role="form">
											  <div class="form-group">
												<label for="filter">Cari Berdasarkan</label>
												<select name="ops" onChange="select_filter(this.value);" class="form-control">		
													<option >Semua</option>
													<option value="1">Kecamatan</option>
													<option value="2">Kelurahan</option>
													<option value="3">Jenis Usaha</option>
													<option value="4">Sektor Usaha</option>
												</select>
											  </div>
											  <div class="form-group">
												<select id="onc_ops" name="inputan" class="form-control">		
													<option >Semua</option>
												</select>
											  </div>
											  <button type="submit" class="btn btn-primary" value="cari">
											  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>Cari </button>
											</form>
										</div>
									</div>
									<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
							</form>
								</div>
							</div>
						</div>
					  </div>
					<!-- END Advance Search by Bootsnip-->
				  
              </div>
            </div>
		</div>
		<!-- map -->
		<section id="section-map" class="clearfix">
			<?php include_once "content/map.php"; ?>
		</section>		

        <section id="footer" class="section footer">
            <div class="container">
			<div class="row animated opacity mar-bot0" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">			
				</div>
			</div>				
                <div class="row align-center copyright">
                  <p>&copy; 2018 Sistem Informasi Geografis Dinas Koperasi Kota Bandung. All rights reserved | Design by <a href="https://blaxtech.blogspot.com/">BlaxTech</a></p>
                 </div>
            </div>
        </section>
		
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/validate.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
        <!--Datepicker Tanggal-->
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>   
		<script>
		$(function(){
			$("#tanggal").datepicker({
				format:'yyyy-mm-dd',
				autoclose:true
			});
		});
		</script>   
	<script>
	$(document).ready(function(){
	   $("#myModalpetunjuk").modal();
	});
	</script>	  
</body>
</html>