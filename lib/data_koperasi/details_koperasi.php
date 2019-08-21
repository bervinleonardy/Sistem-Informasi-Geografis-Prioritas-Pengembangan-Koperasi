<?php
	include'../../include/lib_inc.php';
    $details   = $_GET["details"];
	$usa       = mysqli_query($conn,"SELECT * FROM data_koperasi WHERE id_koperasi='$details'");
	while($row = mysqli_fetch_array($usa)){
	$array_data[] = array(
		"id"=>$row['id_koperasi'],
		"nama"=>$row['nama_koperasi'],
		"lnt"=>$row['latitude'],
		"lng"=>$row['longitude']
	);		
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Data Koperasi</h4>
        </div>

        <div class="modal-body">
        	<table border="0" align="center">
                <tr>
                	<td align="right"><font color="#BBBBBB">Nama Koperasi: </font></td>
                    <td>&nbsp; <?=$row['nama_koperasi']?></td>
                </tr>
                <?php
					$sqla = "SELECT id_pengurus, nama_pengurus FROM pengurus WHERE id_pengurus='$row[id_pengurus]'";										
					$querya = mysqli_query($conn, $sqla);								
					$rowa = mysqli_fetch_array($querya);						
				?>
                <tr>
                	<td align="right"><font color="#BBBBBB">Pengurus : </font></td>
                    <td>&nbsp; <?=$rowa['nama_pengurus']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Jenis : </font></td>
                    <td>&nbsp; <?=$row['jenis_koperasi']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Kelompok : </font></td>
                    <td>&nbsp; <?=$row['kel_koperasi']?></td>
                </tr>
                <?php
					$sqlb = "SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$row[id_sektor]'";										
					$queryb = mysqli_query($conn, $sqlb);								
					$rowb = mysqli_fetch_array($queryb);						
				?>
                <tr>
                	<td align="right"><font color="#BBBBBB">Sek. Usaha : </font></td>
                    <td>&nbsp; <?=$rowb['nama_sektor']?></td>
                </tr>
                <?php
					$sqlc = "SELECT id_kelurahan,kode_kecamatan, nama_kelurahan AS namkel,kode_pos 
							FROM kelurahan WHERE id_kelurahan='$row[id_kelurahan]' ";										
					$queryc = mysqli_query($conn, $sqlc);								
					$rowc = mysqli_fetch_array($queryc);
		
					$sqld = "SELECT kode_kecamatan, nama_kecamatan AS namkec 
							FROM kecamatan WHERE kode_kecamatan='$rowc[kode_kecamatan]' ";
					$queryd = mysqli_query($conn, $sqld);								
					$rowd = mysqli_fetch_array($queryd);		
				?>
                <tr>
                	<td align="right"><font color="#BBBBBB">Alamat : </font></td>
                    <td>&nbsp; <?=$row['alamat_koperasi']?> Kel. <?=$rowc['namkel']?> Kec. <?=$rowd['namkec']?> Kota.  Bandung <?=$rowc['kode_pos']?></td>
                </tr>
                <tr>
                	<td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                	<td align="Center" colspan="2"><font color="#BBBBBB"> GAMBAR KOPERASI </font></td>
                </tr>
                <?php 
					if($row['foto1']!=''){$pic1 = $row['foto1'];}
						else{$pic1 = 'pict_default.png';}
					if($row['foto2']!=''){$pic2 = $row['foto2'];}
						else{$pic2 = 'pict_default.png';}
					if($row['foto3']!=''){$pic3 = $row['foto3'];}
						else{$pic3 = 'pict_default.png';}
					if($row['foto4']!=''){$pic4 = $row['foto4'];}
						else{$pic4 = 'pict_default.png';}
					if($row['foto5']!=''){$pic5 = $row['foto5'];}
						else{$pic5 = 'pict_default.png';}
				?>
                <tr>
                	<td align="Center" colspan="2">
					<img alt="" class="img-thumbnail" src="content/images/koperasi/<?=$pic1;?>" width="200px" height="150px" /> &nbsp; 
					<img alt="" class="img-thumbnail" src="content/images/koperasi/<?=$pic2;?>" width="200px" height="150px"> &nbsp; 
					<img alt="" class="img-thumbnail" src="content/images/koperasi/<?=$pic3;?>" width="300px" height="250px">
					</td>
                </tr>
                <tr>
                	<td align="Center" colspan="2">
					<img alt="" class="img-thumbnail" src="content/images/koperasi/<?=$pic4;?>" width="200px" height="150px"> &nbsp; 
					<img alt="" class="img-thumbnail" src="content/images/koperasi/<?=$pic5;?>" width="200px" height="150px">
					</td>
                </tr>
                <tr>
                	<td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                	<td align="Center" colspan="2"><font color="#BBBBBB"> LOKASI </font></td>
                </tr>				
            </table>
                <div class="form-group" style="padding-bottom: 20px;">
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
					map = new google.maps.Map(document.getElementById("mapx"), myOptions);
				<?php
					// uncomment the 2 lines below to get real data from the db
					// $result = mysql_query("SELECT * FROM parkings");
					// while ($row = mysql_fetch_array($result))
						echo "addMarker(new google.maps.LatLng(".$row['latitude'].", ".$row['longitude']."), map);";
				?>					
				}
				function addMarker(latLng, map) {							
					var marker = new google.maps.Marker({
						position: latLng,
						map: map,
						draggable: false, // enables drag & drop
						animation: google.maps.Animation.DROP
					});
					return marker;
				}
				</script>					
     				<input type="hidden" name="lat" id="lat" class="form-control" value="<?=$row['latitude']?>"/>
                    <input type="hidden" name="lng" id="lng" class="form-control" value="<?=$row['longitude']?>"/>
                    <script src="content/js/lokasi.js"></script>
                    <div id="mapx" style="width:550px; height: 300px;"></div>
                </div>				
	    	<div class="modal-footer">
				<button class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
	       </div>
		   <?php } ?>
        </div>           
    </div>
</div>

</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC0HfzglV5QxTY26lJSTo0YJ0lChqVx0dU&callback=initialize"></script>