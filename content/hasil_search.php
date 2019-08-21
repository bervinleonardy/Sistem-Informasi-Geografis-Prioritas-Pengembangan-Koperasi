<?php
	include_once'cases.php';
	include"include/lib_inc.php";
?>
		
<!DOCTYPE html>
    <html class="no-js"> 
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
					<h1><a class="navbar-brand" href="" data-0="line-height:90px;" data-300="line-height:50px;"><img src="img/logo/logo.png" style="width:80px; height:70px;"> Geographic Information Systems Kota Bandung 
					</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="?gis=<?=base64_encode('home'.$string)?>">Data Usaha</a></li>
						<li><a href="#section-about">Info</a></li>
						<li><a href="#section-works">Gallery</a></li>
						<li><a href="#section-contact">Kontak</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModaldaftar">Daftar</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModallogin">Login</a></li>
						<li><a href="" data-toggle="modal" data-target="#myModalcari"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
					</ul>	
				</div><!--/.navbar-collapse -->
			</div>
		
		
	</section>
	</div>
	
		
	<!-- Pop Up Modals Daftar -->
		<div class="container">
            <div class="modal fade" id="myModaldaftar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                   <div class="close" data-dismiss="modal">X</div>
                    <h4 class="modal-title" id="myModalLabel">Form Daftar</h4>
                  </div>
                  <div class="modal-body">
                    <div id="sendmessage">Akun anda sementara belum aktif silakan tunggu sampai dinas mengaktifkan</div>
                     <div id="errormessage"></div>                 
					<form id="formdaftar" class="form-horizontal" action="lib/pemilik_usaha/add_akun.php" name="modal_popup" enctype="multipart/form-data" method="post">
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="nama">Nama</label>
							 <div class="col-sm-10">
							 	<input type="hidden" name="idakun"  class="form-control"/>
							 	<input type="hidden" name="user"  class="form-control"/>
								<input type="text" name="nama" class="form-control" id="daftar-nama" placeholder="Isikan Nama Lengkap" required="">
								<div class="validation"></div>
							 </div>
						 </div>
						 	
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="Nomor KTP">No.KTP</label>
							  <div class="col-sm-10">
								<input type="text" name="noktp" class="form-control" id="noktp" placeholder="Isikan Nomor Induk KTP" required="">
								<div class="validation"></div>
							  </div>	
						 </div>

						 <div class="form-group">
						 <label class="control-label col-sm-2" for="Nomor KTP">Jenis Kelamin</label>
							  <div class="col-sm-10">
								  <input type="radio" name="jenkel" VALUE="L"> Laki-laki
								  <input type="radio" name="jenkel" VALUE="P"> Perempuan 
							  </div>
						 </div>
							   						 						 
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="email">Email</label>	
						 	<div class="col-sm-10">
								<input type="email" name="email" class="form-control" id="email" placeholder="Harus Email Aktif" required="">
								<div class="validation"></div>
							</div>	
						 </div>
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="password">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
								<div class="validation"></div>
							</div>	
						 </div>

						 <div class="form-group">
						 <label class="control-label col-sm-2" for="upassword">Ulang</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Tulis Ulang Password" required="">
								<div class="validation"></div>
							</div>	
						 </div>						 						 
						 
						 <div class="form-group">	
						 <label class="control-label col-sm-2" for="alamat">Alamat</label>
						 	<div class="col-sm-10">
								<textarea type="text" name="alamat" class="form-control" id="alamat" placeholder="Isikan Alamat Lengkap" required></textarea>
								<div class="validation"></div>
							</div>							
						 </div>	
						
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="tptlahir">Tempat</label>
						 	<div class="col-sm-10">
								<input type="text" name="tptlahir" class="form-control" id="tptlahir"  placeholder="Tempat Lahir" required="">
								<div class="validation"></div>
							</div>	
						 </div>	
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="tanggal">Tanggal</label>
							 <div class="col-sm-10">
								<input type="text" id="tanggal" name="tgllahir" class="form-control" placeholder="Tanggal Lahir" required="">
								<div class="validation"></div>
							 </div>	
						 </div>
						 
						 <div class="form-group">
						 <label class="control-label col-sm-2" for="notel">Telpon</label>
						 	<div class="col-sm-10">
								<input type="tel" name="notel" class="form-control" id="notel" placeholder="Nomor Telepon" >
								<div class="validation"></div>
							</div>	
						 </div>
						 	
						 <div class="form-group">
						 <label class="control-label col-sm-3" for="scan">Foto Copy KTP</label>	
							 <div class="col-sm-4"> 
								<input type="file" name="fotoktp" id="scan" accept="image/*">
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><br>
							 </div>	
						</div>	
						
						 <div class="form-group">
						 <label class="control-label col-sm-3" for="fotoak">Foto Akun</label>	
							 <div class="col-sm-4"> 
								<input type="file" name="fotoak" id="fotoak" accept="image/*">
							 </div>	
						</div>
												
						<div class="modal-footer">
							<input type="submit" onkeyup='formdaftar()' class="line-btn blue" value="Daftar" >
							<input type="reset" class="line-btn red" data-dismiss="modal" value="Kembali" >
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
									<input type="text" name="NIP" class="form-control" id="NIP" placeholder="NIP" data-msg="Silakan Masukan No KTP Anda" />
									<div class="validation"></div>
								</div>
								<div class="form-group">
								<label for="password">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" data-msg="NIP Atau Password Salah"/>
									<div class="validation"></div>
								</div>
								<p class="no-marg"><a href="#">Lupa Password?</a></p>
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
							
						<!--</form>
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
									</div>-->
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
	
	<!--about-->
	<section id="section-about" class="section appear clearfix">
		<div class="container">
			<div class="about">
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="title">
							<div class="wow bounceIn">
						
							<h2 class="section-heading animated" data-animation="bounceInUp">Hasil Search</h2>
							
						
							</div>
						</div>
					</div>
				</div>
				<div class="row">
				        <?php 
							  if($_POST["findtext"]!="") { $find=$_POST["findtext"]; }
	  						  else { $find=$_GET["findtext"]; }
					
							  $where=" (nama_usaha LIKE '%$find%' OR alamat_usaha like '%$find%')";
							 
								  
							  $nam        = "SELECT * FROM data_usaha WHERE $where ORDER BY DESC";
											
							  $query      = mysqli_query($conn, $nam);
							  while ($row = mysqli_fetch_array($query)){  
							  					  
						?>           

			
					<div class="col-lg-12 ">
								<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA USAHA</strong></td>
                                        <td align="center"><strong>PEMILIK</strong></td>
                                        <td align="center"><strong>ALAMAT</strong></td>
                                        <td align="center"><strong>EMAIL</strong></td>
                                        <td align="center"><strong>No. TELP</strong></td>
                                        <td align="center"><strong>SKALA</strong></td>
                                        <td align="center"><strong>SEKTOR USAHA</strong></td>
                                        <td align="center"><strong>TANGGAL DAFTAR</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = 'SELECT id_usaha, nama_usaha, id_user, produk_utama, alamat_usaha, id_kelurahan, kode_kecamatan, email, no_telp, latitude, longitude, skala, id_sektor, tgl_daftar FROM data_usaha';										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_usaha']?></td>
                                        <?php
											$sqla = "SELECT id_user, nama_user FROM user WHERE id_user='$row[id_user]'";										
											$querya = mysqli_query($conn, $sqla);								
											$rowa = mysqli_fetch_array($querya);						
										?>
                                        <td align="center"><?=$rowa['nama_user']?></td>                                        <?php
											$sqlb = "SELECT id_kelurahan, kode_kecamatan, nama_kelurahan AS namkel, nama_kecamatan AS namkec, kode_pos 
													FROM kelurahan, kecamatan WHERE id_kelurahan='$row[id_kelurahan]' AND kode_kecamatan='$row[kode_kecamatan]'";										
											$queryb = mysqli_query($conn, $sqlb);								
											$rowb = mysqli_fetch_array($queryb);						
										?>
                                        <td align="center"><?=$row['alamat_usaha']?> Kel. <?=$rowb['namkel']?> Kec. <?=$rowb['namkec']?> Kota.  Bandung <?=$rowb['kode_pos']?> </td>
                                        <td align="center"><?=$row['email']?></td>
                                        <td align="center"><?=$row['no_telp']?></td>
                                        <td align="center"><?=$row['skala']?></td>
                                        <?php
											$sqlc = "SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$row[id_sektor]'";										
											$queryc = mysqli_query($conn, $sqlc);								
											$rowc = mysqli_fetch_array($queryc);						
										?>
                                        <td align="center"><?=$rowc['nama_sektor']?></td>
                                        <td align="center"><?=$row['tgl_daftar']?></td>                                         
                                        
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>						
							
						</div>
					<?php }?>
				</div>
					
			</div>
			
		</div>
	</section>	
		
	<section id="section-map" class="clearfix">
		<?php include_once "content/map.php"; ?>
	</section>
	
<!-- DataTables JavaScript -->
<script src="content/style/datatables/js/jquery.dataTables.min.js"></script>
<script src="content/style/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="content/style/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
	
<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>
	<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/validate.js"></script>
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
    <!-- Tambahan Pop Up-->
    <script type="text/javascript" src="js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="js/gritter-conf.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Selamat Datang di SIG Kota Bandung',
            // (string | mandatory) the text inside the notification
            text: 'Untuk versi mobile sedang dalam project development kami untuk informasinya cek website resminya di <a href="http://www.blaxtech.cf" target="_blank" style="color:#ffd777">blaxtech.cf</a>.',
            // (string | optional) the image to display on the left
            image: 'img/logo/logo.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
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
	
    <script type="text/javascript" src="js/jquery.validate.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
	$("#formdaftar").validate({
		rules:{ nama:"required",
				noktp:{required:true,number: true}, 
			   	email:{required:true,email:true},
				password:{required: true,minlength:5},      
				cpassword:{required: true,equalTo: "#password"},
				alamat:"required",
			   	tptlahir:"required",
			    tgllahir:"required",
			    notel:{required:true,number: true},
			  },
		messages:{ 
				nama:{required:'Nama harus di isi'},
				noktp:{
					required:'No.KTP harus di isi',
					number  :'Hanya boleh di isi Angka'},
				email: {
					required:'Email harus di isi',
					email   :'Email harus valid'},			
				password: {
					required :'Password harus di isi',
					minlength:'Password minimal 5 karakter'},
				cpassword: {
					required:'Ulangi Password harus di isi',
					equalTo :'Isinya harus sama dengan Password'},
				alamat:{required:'Alamat harus di isi'},
				tptlahir:{required:'Tempat lahir harus di isi'},
				tgllahir:{required:'Tanggal harus di isi'},
				notel:{
					required:'No.Telp harus di isi',
					number  :'Hanya boleh di isi Angka'}
				},
		 success: function(label) {
			label.text('OK!').addClass('valid');}
		});
	});
	</script>          
        
   
	<!--Search Ajax-->
	<script type="text/javascript">
	function select_filter(ops)
	{
		$.ajax({
			url: 'content/pilih_cari.php',
			data : 'ops='+ops,
			type: "post", 
			dataType: "html",
			timeout: 10000,
			success: function(response){
				$('#onc_ops').html(response);
			}
		});
	}
	</script>	  
</body>
</html>
		