<?php
	include'include/lib_inc.php';
		$edit      = $_GET["edit"];
		$usa       = mysqli_query($conn,"SELECT * FROM data_koperasi WHERE md5(id_koperasi)='$edit'");
		while ($row       = mysqli_fetch_array($usa)){		
		$array_data[] = array(
			"id"=>$row['id_koperasi'],
			"nama"=>$row['nama_koperasi'],
			"lnt"=>$row['latitude'],
			"lng"=>$row['longitude']
		);			
?>

<script type="text/javascript">
function select_kelurahan(idkec)
{
	$.ajax({
        url: 'content/pilih_kelurahan.php',
        data : 'idkec='+idkec,
		type: "post", 
        dataType: "html",
		timeout: 10000,
        success: function(response){
			$('#onc_kel').html(response);
        }
    });
}
</script>

<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <?php if ($_GET['edit']!=''){
					echo '
            			<form class="form-horizontal bucket-form" method="post" action="lib/data_koperasi/update_koperasi.php" enctype="multipart/form-data">';
						$tbl='Ubah';
			}?>			
            <header class="panel-heading">
                <?php echo $tbl; ?> Data Koperasi
            </header>
            <div class="panel-body">
					<div class="form-group">
						<label class="col-sm-3 control-label">ID Koperasi</label>
						<div class="col-sm-6">
							<input type="text" name="idkop" class="form-control" value="<?=$row['id_koperasi']?>" placeholder="<?=$row['id_koperasi']?>" required/>
						</div>
					</div>				
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Koperasi</label>
                        <div class="col-sm-6">
     						<input type="text" name="nama"  class="form-control" value="<?=$row['nama_koperasi']?>" required/>							
                            <?php
								$sqlc = "SELECT id_pengurus FROM pengurus WHERE id_pengurus='$row[id_pengurus]'";																
								$queryc = mysqli_query($conn, $sqlc);														
								$rowc = mysqli_fetch_array($queryc);
							?>
                            <input type="hidden" name="user"  class="form-control" value="<?=$rowc['id_pengurus']?>" />
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Koperasi</label>
                       <div class="col-lg-6">
                        <?php 
							if($row['jenis_koperasi']=='Konsumen'){
								$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($row['jenis_koperasi']=='Jasa'){
								$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($row['jenis_koperasi']=='Simpan Pinjam'){
								$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($row['jenis_koperasi']=='Pemasaran'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';
							}elseif($row['jenis_koperasi']=='Produsen'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';
							}elseif($row['jenis_koperasi']=='Lainnya'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';
							}
								   
						echo'
                            <input type="radio" name="jenkop" value="Konsumen" '.$ceklis1.'> Konsumen
                            <input type="radio" name="jenkop" value="Jasa" '.$ceklis2.'> Jasa
                            <input type="radio" name="jenkop" value="Simpan Pinjam" '.$ceklis3.'> Simpan Pinjam
							<input type="radio" name="jenkop" value="Pemasaran" '.$ceklis4.'> Pemasaran
							<input type="radio" name="jenkop" value="Produsen" '.$ceklis5.'> Produsen
							<input type="radio" name="jenkop" value="Jasa" '.$ceklis6.'> Lainnya
							'
							;
						?>
                        </div>							
<!--							<input type="text" name="jenkop"  class="form-control" value="?=$row['jenis_koperasi']?>" required/>-->
					</div>				
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelompok Koperasi</label>
                        <div class="col-sm-6">
                        <?php 
							if($row['kel_koperasi']=='Serba Usaha'){
								$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Profesi'){
								$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Pegawai Negeri'){
								$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Karyawan'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Simpan Pinjam'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Kepolisian'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Pepabri'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='checked';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Wanita'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='checked';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Angkatan Darat'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='checked';$ceklis10='';$ceklis11='';
							}elseif($row['kel_koperasi']=='Pasar'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='checked';$ceklis11='';
							}elseif($row['kel_koperasi']=='Lainnya'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='checked';
							}
							
								   
						echo'
                            <input type="checkbox" name="kelkop" value="Serba Usaha" '.$ceklis1.'> Serba Usaha
                            <input type="checkbox" name="kelkop" value="Profesi" '.$ceklis2.'> Profesi
                            <input type="checkbox" name="kelkop" value="Pegawai Negeri" '.$ceklis3.'> Pegawai Negeri
							<input type="checkbox" name="kelkop" value="Karyawan" '.$ceklis4.'> Karyawan
							<input type="checkbox" name="kelkop" value="Simpan Pinjam" '.$ceklis5.'> Simpan Pinjam
							<input type="checkbox" name="kelkop" value="Kepolisian" '.$ceklis6.'> Kepolisian
							<input type="checkbox" name="kelkop" value="Pepabri" '.$ceklis7.'> Pepabri
							<input type="checkbox" name="kelkop" value="Wanita" '.$ceklis8.'> Wanita	
							<input type="checkbox" name="kelkop" value="Angkatan Darat" '.$ceklis9.'> Angkatan Darat
							<input type="checkbox" name="kelkop" value="Pasar" '.$ceklis10.'> Pasar
							<input type="checkbox" name="kelkop" value="Lainnya" '.$ceklis11.'> Lainnya							
							'
							;
						?>							
<!--                            <input type="text" name="kelkop"  class="form-control" value="?=$row['kel_koperasi']?>" required/>-->
                        </div>
                    </div>
				
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-6">
                            <textarea name="alamat" cols="49" rows="3" class="form-control" required><?=$row['alamat_koperasi']?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Bentuk Koperasi</label>
                        <div class="col-sm-6">
                        <?php 
							if($row['bentuk_koperasi']=='Primer'){
								$ceklis1='checked'; $ceklis2=''; 
							}elseif($row['bentuk_koperasi']=='Sekunder'){
								$ceklis1=''; $ceklis2='checked';
							}
						echo'
                            <input type="radio" name="benkop" value="Primer" '.$ceklis1.'> Primer
                            <input type="radio" name="benkop" value="Sekunder" '.$ceklis2.'> Sekunder';
						?>							
<!--                            <input type="text" name="benkop"  class="form-control" value="?=$row['bentuk_koperasi']?>" required/>-->
                        </div>
                    </div>				
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kecamatan</label>
                        <div class="col-sm-6">
                            <select name="idkec" class="form-control" onchange="select_kelurahan(this.value);">
                                <option value="">---Pilih Kecamatan---</option>
                                <?php
                                    $sqlc = "SELECT kode_kecamatan, nama_kecamatan 
                                            FROM kecamatan";
                            
                                    $queryc = mysqli_query($conn, $sqlc);
                    
                                    while ($rowc = mysqli_fetch_array($queryc))
                                
                                    {	
                                        if ($rowc["kode_kecamatan"] == $row['kode_kecamatan']){
                                            $cek = "selected";
                                        }
                                        else {
                                            $cek = "";
                                        }
                                                
                                   echo '<option value="'.$rowc["kode_kecamatan"].'" '.$cek.'> '.$rowc["nama_kecamatan"].' </option>'; } 
                                                
                                ?> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kelurahan</label>
                        <div class="col-sm-6">
                            <select name="idkel" class="form-control" id="onc_kel">
                                <option value="">---Pilih Kelurahan---</option>
                                <?php
								if($edit!=''){
                                    $sqlf = "SELECT id_kelurahan, nama_kelurahan 
                                            FROM kelurahan";
                            
                                    $queryf = mysqli_query($conn, $sqlf);
                    
                                    while ($rowf = mysqli_fetch_array($queryf))
                                
                                    {	
                                        if ($rowf["id_kelurahan"] == $row['id_kelurahan']){
                                            $cekf = "selected";
                                        }
                                        else {
                                            $cekf = "";
                                        }
                                                
                                   echo '<option value="'.$rowf["id_kelurahan"].'" '.$cekf.'> '.$rowf["nama_kelurahan"].' </option>'; } 
								}
                                ?> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-6">
                            <input type="text" name="email"  class="form-control" value="<?=$row['email']?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No. Telp</label>
                        <div class="col-sm-6">
                            <input type="text" name="notel"  class="form-control" value="<?=$row['no_telp']?>" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Sektor Usaha</label>
                        <div class="col-lg-6">
                            <select name="idsektor" class="form-control">
                                <option value="">---Pilih Sektor Usaha---</option>
                                <?php
                                    $sqlb = "SELECT id_sektor, nama_sektor 
                                            FROM sektor_usaha";
                            
                                    $queryb = mysqli_query($conn, $sqlb);
                    
                                    while ($rowb = mysqli_fetch_array($queryb))
                                
                                    {	
                                        if ($rowb["id_sektor"] == $row['id_sektor']){
                                            $cekb = "selected";
                                        }
                                        else {
                                            $cekb = "";
                                        }
                                                
                                   echo '<option value="'.$rowb["id_sektor"].'" '.$cekb.'> '.$rowb["nama_sektor"].' </option>'; } 
                                                
                                ?> 
                            </select>
                        </div>
                    </div>

                    <div class="form-group">					
                        <label class="col-sm-3 control-label">Lokasi</label>
                        <div class="col-lg-6">
						<script type="text/javascript">
						var map;
						function initialize() {
							// Set static latitude, longitude value
							var latlng = new google.maps.LatLng(<?php echo $row['latitude']; ?>, <?php echo $row['longitude']; ?>);
							// Set map options
							var myOptions = {
								zoom: 18,
								center: latlng,
								panControl: true,
								zoomControl: true,
								scaleControl: true,
								mapTypeId: 'roadmap'
							}
							// Create map object with options
							map = new google.maps.Map(document.getElementById("mape"), myOptions);
						<?php
							// uncomment the 2 lines below to get real data from the db
							// $result = mysql_query("SELECT * FROM parkings");
							// while ($row = mysql_fetch_array($result))
								echo "addMarker(new google.maps.LatLng(".$row['latitude'].", ".$row['longitude']."), map);";
						?>					
						}
						function addMarker(latLng, map) {
								document.getElementById('lat').value = [latLng.lat()];
								document.getElementById('lng').value = [latLng.lng()];							
							var marker = new google.maps.Marker({
								position: latLng,
								map: map,
								draggable: true, // enables drag & drop
								animation: google.maps.Animation.DROP
							});
							
							google.maps.event.addListener(marker, 'drag', function() {
								addMarker(marker.getPosition());
							});	
							return marker;
						}
						</script>							
                            <input type="text" name="lat" id="lat" class="form-control" value="<?=$row['latitude']?>" required/>
                            <input type="text" name="lng" id="lng" class="form-control" value="<?=$row['longitude']?>" required/>
                            
<!--                            <script src="content/js/lokasi.js"></script>-->
                            <div id="mape" style="width:auto; height: 300px;"></div>
                            <span class="help-block"><font color="#FB0307">Geser marker (Penanda Lokasi) sesuai lokasi anda!</font></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Foto Koperasi</label>
                        <div class="col-lg-6">
                            <span class="help-block"><font color="#FB0307">Maksimal 5 foto </font></span>
							<?=$row['foto1']?>
                            <input type="file" name="foto1"><br>
							<?=$row['foto2']?>
                            <input type="file" name="foto2"><br>
							<?=$row['foto3']?>
                            <input type="file" name="foto3"><br>
							<?=$row['foto4']?>
                            <input type="file" name="foto4"><br>
							<?=$row['foto5']?>
                            <input type="file" name="foto5"><br>			
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-lg-offset-3 col-lg-6">
                  			<a href="?hal=<?=md5('perusahaan')?>"><button type="submit" class="btn btn-danger pull-right">Kembali</button></a>
                        	<input type="submit" class="btn btn-success pull-right" value="<?php echo $tbl; ?>"></button> &nbsp; 
                            
                        </div>
                    </div>
                </form>
			<?php } ?>
            </div>
        </section>
        <!-- page end-->
        </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAxgh83y8vSI1-91nTOTDiUfQUmWmpcfRU&callback=initialize"></script>
<!--<script src="content/js/lokasi.js"></script>-->
<script>
$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});
</script>