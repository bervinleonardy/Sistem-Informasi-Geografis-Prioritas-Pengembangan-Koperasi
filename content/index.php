<?php 
session_start();

$error_reporting = E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT);
error_reporting($error_reporting);
$time_server   = date( 'O' ) / 100;
$time_offset = TIME_OFFSET - $time_server;
setlocale (LC_TIME, TIME_LOCALE);

?>
<?php
if ($_SESSION["kopsign"]==true){
include_once'include/lib_inc.php';
?>
<?php
	$sql = "SELECT id_user, nama_user, foto_user, tipe_user, user_date 
			FROM user WHERE id_user='$_SESSION[user]'";
									
	$query = mysqli_query($conn, $sql);
							
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<head>
<title>SIGKOP :: Halaman <?php
	if ($row['tipe_user']== 'Kasie' ){
		echo 'Kasie Pengembangan & Pembiayaan Koperasi';
	}
	elseif ($row['tipe_user']!= 'Kasie'){
		echo $row['tipe_user'];
	}
	?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Geograpich Informations System Data Koperasi Kota Bandung, Bandung, Koperasi di Bandung" />
<link rel="shortcut icon" href="img/logo/logo.ico">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="content/css/bootstrap.min.css" >
<link href="content/style/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-datepicker3.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="content/css/style.css" rel='stylesheet' type='text/css' />
<link href="content/css/style-responsive.css" rel="stylesheet"/>
<link href="content/style/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<link href="content/style/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="content/css/font.css" type="text/css"/>
<link href="content/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="content/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="content/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="content/js/jquery2.0.3.min.js"></script>
<script src="content/js/raphael-min.js"></script>
<script src="content/js/morris.js"></script>

<script src="maps/src/Leaflet.draw.js"></script>
<script src="maps/src/Leaflet.Draw.Event.js"></script>
<link rel="stylesheet" href="maps/src/leaflet.draw.css"/>

<script src="maps/src/Toolbar.js"></script>
<script src="maps/src/Tooltip.js"></script>

<script src="maps/src/ext/GeometryUtil.js"></script>
<script src="maps/src/ext/LatLngUtil.js"></script>
<script src="maps/src/ext/LineUtil.Intersect.js"></script>
<script src="maps/src/ext/Polygon.Intersect.js"></script>
<script src="maps/src/ext/Polyline.Intersect.js"></script>
<script src="maps/src/ext/TouchEvents.js"></script>

<script src="maps/src/draw/DrawToolbar.js"></script>
<script src="maps/src/draw/handler/Draw.Feature.js"></script>
<script src="maps/src/draw/handler/Draw.SimpleShape.js"></script>
<script src="maps/src/draw/handler/Draw.Polyline.js"></script>
<script src="maps/src/draw/handler/Draw.Marker.js"></script>
<script src="maps/src/draw/handler/Draw.Circle.js"></script>
<script src="maps/src/draw/handler/Draw.CircleMarker.js"></script>
<script src="maps/src/draw/handler/Draw.Polygon.js"></script>
<script src="maps/src/draw/handler/Draw.Rectangle.js"></script>


<script src="maps/src/edit/EditToolbar.js"></script>
<script src="maps/src/edit/handler/EditToolbar.Edit.js"></script>
<script src="maps/src/edit/handler/EditToolbar.Delete.js"></script>

<script src="maps/src/Control.Draw.js"></script>

<script src="maps/src/edit/handler/Edit.Poly.js"></script>
<script src="maps/src/edit/handler/Edit.SimpleShape.js"></script>
<script src="maps/src/edit/handler/Edit.Rectangle.js"></script>
<script src="maps/src/edit/handler/Edit.Marker.js"></script>
<script src="maps/src/edit/handler/Edit.CircleMarker.js"></script>
<script src="maps/src/edit/handler/Edit.Circle.js"></script>	
	
<script src="maps/leaflet.js"></script>
<script src="maps/wax.leaf.min.js"></script>
<link href="maps/leaflet.css" rel="stylesheet">
<link href="maps/leaflet.ie.css" rel="stylesheet">

<!--
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAxgh83y8vSI1-91nTOTDiUfQUmWmpcfRU&callback=initialize"></script>
<script src="content/js/lokasi.js"></script>
-->

<body>

<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        <i class="fa fa-location-arrow"></i> <font color="#3B4A5D">SIG</font>KOP
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>

<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
    
    <?php 
		if(($row['tipe_user']=='Staf Seksi') ||($row['tipe_user']=='Staf Data') || ($row['tipe_user']=='Kasie')){
	?>           
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown">
        <?php
			$sqla = "SELECT id_koperasi, nama_koperasi 
					FROM data_koperasi WHERE id_koperasi='0001'";											
			$querya = mysqli_query($conn, $sqla);
			
			if(mysqli_num_rows($querya)!=0){
				$th='<span class="badge bg-important">'.mysqli_num_rows($querya).'</span>';
				$judul='<li><p>Data Usaha Baru</p></li>';
				}
			else{
				$th='';
				$judul='<li><p>Tidak ada Pemberitahuan</p></li>';
				}
		?>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Notification Data Usaha Baru">

                <i class="fa fa-asterisk"></i>
                <?=$th;?>
            </a>
            <ul class="dropdown-menu extended notification">
            	<?=$judul;?>                
			<?php            									
				while($rowa = mysqli_fetch_array($querya)){				
			?>             
                <li>
                <a href="?hal=<?=md5("perusahaan")?>">
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-map-marker"></i></span>
                        <div class="noti-info">
                        	<h6><?=$rowa['nama_koperasi']?></h6>
                            <br>Data Usaha telah ditambahkan.
                        </div>
                    </div>
                </a>
                </li>
            <?php }?>
            </ul>
        </li>
        <!-- notification dropdown end -->
        <!-- settings start -->
        <li class="dropdown">
        <?php
			$sqlb = "SELECT id_pengurus, nama_pengurus 
					FROM pengurus WHERE id_pengurus=''";											
			$queryb = mysqli_query($conn, $sqlb);		
			
			if(mysqli_num_rows($queryb)!=0){
				$th2='<span class="badge bg-warning">'.mysqli_num_rows($queryb).'</span>';
				$judul2='<li><p>Pengurus Koperasi Baru</p></li>';
				}
			else{
				$th2='';
				$judul2='<li><p>Tidak ada Pemberitahuan</p></li>';
				}
		?>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" title="Notifications Pemilik Usaha Baru">
                <i class="fa fa-bell-o"></i>
                <?=$th2;?>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <?=$judul2;?>
            <?php
				while($rowb = mysqli_fetch_array($queryb)){
			?>
                <li>
                    <a href="?hal=<?=md5("pengusaha")?>">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5><?=$rowb['nama_pengurus']?></h5>
                                <p>Telah mendaftar sebagai pengurus koperasi baru.</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
             <?php }?>
            </ul>
        </li>
        <!-- settings end -->
        <?php }?> 
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
        <li class="dropdown">
        			
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <?php 
				if($row['foto_user']!=''){
					$gam = $row['foto_user'];
					}
				else{
					$gam = 'user_default.png';
					}
			?>
                <img alt="" src="content/images/user/<?=$gam;?>" >
                <span class="NIP"><?=substr($row['nama_user'],0,10),'.';?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="lib/login.php?log=<?=md5("logout")?>"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->


<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <?php require'lib/menu_nav.php';?>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	
    <?php 
		require'b_cases.php';
	?>
    
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>&copy; 2018 Sistem Informasi Geografis Dinas Koperasi Kota Bandung. All rights reserved | Design by <a href="https://blaxtech.blogspot.com/">BlaxTech</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>

  
<script src="content/js/bootstrap.js"></script>
<script src="content/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="content/js/scripts.js"></script>
<script src="content/js/jquery.slimscroll.js"></script>
<script src="content/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="content/js/jquery.scrollTo.js"></script>

     <?php }
		elseif ($_SESSION["kopsign"]!=true){
			include 'login.php';
		}
    ?>   
    
</body>
</html>
