<?php
	$sql = "SELECT id_user, nama_user, foto_user, tipe_user, user_date 
			FROM user WHERE id_user='$_SESSION[user]'";
									
	$query = mysqli_query($conn, $sql);
							
	$row = mysqli_fetch_array($query);
?>
<section class="wrapper">
	<?php 
		if($row['tipe_user']=='Staf Seksi') {
	?> 
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-book"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Koperasi</h4>
                     <?php
						$sql = "SELECT id_koperasi FROM data_koperasi";										
						$query  = mysqli_query($conn, $sql);
                        if (!$query) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$row = mysqli_fetch_array($query);						
					  ?>
					<h3><?=mysqli_num_rows($query);?> data</h3>
                    <a href="?hal=<?=md5("perusahaan")?>" class="btn btn-warning btn-sm"> lihat data</a>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Pengurus</h4>
                    <?php
						$sqla = "SELECT id_pengurus FROM pengurus";										
						$querya  = mysqli_query($conn, $sqla);
                        if (!$querya) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$rowa = mysqli_fetch_array($querya);						
					  ?>
					  <h3><?=mysqli_num_rows($querya);?> data</h3>
					  <a href="?hal=<?=md5("pengurus")?>" class="btn btn-warning btn-sm"> lihat data</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-building-o"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Kecamatan</h4>
						<?php
						$sqlb = "SELECT kode_kecamatan FROM kecamatan";										
						$queryb  = mysqli_query($conn, $sqlb);
                        if (!$queryb) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$rowb = mysqli_fetch_array($queryb);						
					  ?>
					  <h3><?=mysqli_num_rows($queryb);?> data terdaftar</h3>
					  <a href="?hal=<?=md5("kecamatan")?>" class="btn btn-warning btn-sm"> lihat data</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
<!--
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-home" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Kop. Aktif</h4>
						?php
						$sqlc = "SELECT id_wp,keterangan FROM wp WHERE keterangan='Aktif' ";										
						$queryc  = mysqli_query($conn, $sqlc);
                        if (!$queryc) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$rowc = mysqli_fetch_array($queryc);						
					  ?>
					  <h3>?=mysqli_num_rows($queryc);?> data</h3>
					  <a href="?hal=?=md5("wp")?>" class="btn btn-warning btn-sm"> lihat data</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
-->
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
    <?php }?>
	<?php 
		if($row['tipe_user']=='Staf Data'){
	?> 
		<!-- //market-->
		<div class="market-updates">
<!--
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-book"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Koperasi</h4>
                     ?php
						$sql = "SELECT id_koperasi FROM data_koperasi";										
						$query  = mysqli_query($conn, $sql);
                        if (!$query) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$row = mysqli_fetch_array($query);						
					  ?>
					<h3>?=mysqli_num_rows($query);?> data</h3>
                    <a href="?hal=?=md5("perusahaan")?>" class="btn btn-warning btn-sm"> lihat data</a>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-home" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Kop. Prioritas</h4>
						?php
						$sqlc = "SELECT id_wp FROM wp ";										
						$queryc  = mysqli_query($conn, $sqlc);
                        if (!$queryc) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$rowc = mysqli_fetch_array($queryc);						
					  ?>
					  <h3>?=mysqli_num_rows($queryc);?> data</h3>
					  <a href="?hal=?=md5("wp")?>" class="btn btn-warning btn-sm"> lihat data</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
-->
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
    <?php }?>		
	<?php 
		if($row['tipe_user']=='Kasie'){
	?> 
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-book"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Koperasi</h4>
                     <?php
						$sql = "SELECT id_koperasi FROM data_koperasi";										
						$query  = mysqli_query($conn, $sql);
                        if (!$query) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$row = mysqli_fetch_array($query);						
					  ?>
					<h3><?=mysqli_num_rows($query);?> data</h3>
                    <a href="?hal=<?=md5("perusahaan")?>" class="btn btn-warning btn-sm"> lihat data</a>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-home" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Kop. Prioritas</h4>
						<?php
						$sqlc = "SELECT id_wp FROM wp ";										
						$queryc  = mysqli_query($conn, $sqlc);
                        if (!$queryc) {
                            die ('SQL Error: ' . mysqli_error($conn));
                        }
						$rowc = mysqli_fetch_array($queryc);						
					  ?>
					  <h3><?=mysqli_num_rows($queryc);?> data</h3>
					  <a href="?hal=<?=md5("wp")?>" class="btn btn-warning btn-sm"> lihat data</a>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
    <?php }?>	
	<?php
      	if(!isset($row['tipe_user'])=='Staf Seksi'){	
	?>
		<div class="w3-agile-google_map">
			<div class="col-md-12">
            <h3 align="center">Geografis Data Koperasi Kota Bandung</h3>
            <h3>&nbsp;</h3>
            <?php 	
            	include"content/gambar_map.php";   	
			?>
            </div>
            <div class="clearfix"></div>
		</div>
	<?php }?>
	<?php
      	if($row['tipe_user']=='Staf Data'){	
	?>
		<div class="w3-agile-google_map">
			<div class="col-md-12">
            <h3 align="center">Geografis Data Koperasi Kota Bandung</h3>
            <h3>&nbsp;</h3>
            <?php 	
            	include"content/map.php";   	
			?>
            </div>
            <div class="clearfix"></div>
		</div>
	<?php }?>	
    <?php
      	if($row['tipe_user']=='Kasie'){	
	?>
		<div class="w3-agile-google_map">
			<div class="col-md-12">
            <h3 align="center">Geografis Data Koperasi Kota Bandung</h3>
            <h3>&nbsp;</h3>
            <?php 	
            	include"content/map.php";   	
			?>
            </div>
            <div class="clearfix"></div>
		</div>
    <?php }?>
</section>
<script src="maps/leaflet.js"></script>
<script src="maps/wax.leaf.min.js"></script>
<link href="maps/leaflet.css" rel="stylesheet">
<link href="maps/leaflet.ie.css" rel="stylesheet">
