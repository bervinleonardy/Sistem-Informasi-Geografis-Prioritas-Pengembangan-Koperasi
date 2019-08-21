<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$usa       = mysqli_query($conn,"SELECT * FROM data_koperasi WHERE id_koperasi='$edit'");
	while($row = mysqli_fetch_array($usa)){
?>

<script type="text/javascript">
function select_kelurahan(idkec)
{
	$.ajax({
        url: '../../content/pilih_kelurahan.php',
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

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Koperasi</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/data_koperasi/update_koperasi.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Usaha</label>
                    <input type="hidden" name="iduasha"  class="form-control"  value="<?=$row['id_usaha']?>"/>
     				<input type="text" name="nama"  class="form-control" value="<?=$row['nama_usaha']?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Produk Utama</label>
     				<input type="text" name="produk"  class="form-control" value="<?=$row['produk_utama']?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Alamat</label>
     				<textarea name="alamat" cols="55" rows="3"><?=$row['alamat_usaha']?></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kecamatan</label>
     				<select name="idkec" class="form-control" onchange="select_kelurahan(this.value);">
                    	<option value="">---Pilih Kecamatan---</option>
                        <?php
                        	$sqlc = "SELECT kode_kecamatan, kode_kecamatan, nama_kecamatan 
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
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kelurahan</label>
     				<select name="idkel" class="form-control" id="onc_kel">
                    	<option value="">---Pilih Kelurahan---</option>
                        <?php
							$sqle = "SELECT kode_kecamatan, kode_kecamatan, nama_kecamatan 
                                    FROM kecamatan WHERE kode_kecamatan='$row[kode_kecamatan]'";                    
                    		$querye = mysqli_query($conn, $sqle);            
                            $rowe = mysqli_fetch_array($querye);
														
							$sqla = "SELECT id_kelurahan, kode_kelurahan, nama_kelurahan, kode_kecamatan, kode_pos 
									FROM kelurahan WHERE kode_kecamatan='$rowe[kode_kecamatan]'";
								 
							$querya = mysqli_query($conn, $sqla);
									
							while ($rowa = mysqli_fetch_array($querya)){	
								if ($rowa["id_kelurahan"] == $row['id_kelurahan']){
									$ceka = "selected";
								}
								else {
									$ceka = "";
								}
																
						   echo '<option value="'.$rowa["id_kelurahan"].'" '.$ceka.'> '.$rowa["nama_kelurahan"].' </option>'; } 
					   ?>
                	</select>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Email</label>
     				<input type="text" name="email"  class="form-control" value="<?=$row['email']?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. Telepon</label>
     				<input type="text" name="notel"  class="form-control" value="<?=$row['no_telp']?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Skala Usaha</label>
                    <br />
                    <?php
						$sqld = "SELECT id_usaha, skala FROM data_usaha WHERE id_usaha='$edit'";
                    
                    	$queryd = mysqli_query($conn, $sqld);
            
                    	$rowd = mysqli_fetch_array($queryd);
						if ($rowd["skala"] == $row["skala"]){
                			$cekd = "checked";
                    	}
                   		elseif ($rowd["skala"] != $row["skala"]){
                    		$cekd = "";
						}
					?>
                    <input type="radio" name="skala" value="MIKRO" <?=$cekd?>> Mikro
                   	<input type="radio" name="skala" value="KECIL" <?=$cekd?>> Kecil
                    <input type="radio" name="skala" value="MENENGAH" <?=$cekd?>> Menengah
					
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Sektor Usaha</label>
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
                
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Lokasi</label>
     				<input type="hidden" name="lat" id="lat" class="form-control" value="<?=$row['latitude']?>"/>
                    <input type="hidden" name="lng" id="lng" class="form-control" value="<?=$row['longitude']?>"/>
                    
                    <script src="js/lokasi.js"></script>
                    <div id="map" style="width:550px; height: 300px;"></div>
                    <p><font color="#FB0307">Geser marker (Penanda Lokasi) sesuai lokasi anda!</font></p>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto Usaha</label>
                    <p><font color="#FB0307">Maksimal 5 foto untuk setiap usaha Anda !</font></p>
     				<?php 
						if ($edit!=''){
							echo '<input type="text" name="foto1" value="'. $row['foto1'] .'">';
						}
					?>
                    <input type="file" name="foto1">
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="foto2" value="'. $row['foto2'] .'">';
						}
					?>
                    <input type="file" name="foto2">
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="foto3" value="'. $row['foto3'] .'">';
						}
					?>
                    <input type="file" name="foto3">
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="foto4" value="'. $row['foto4'] .'">';
						}
					?>
                    <input type="file" name="foto4">
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="foto5" value="'. $row['foto5'] .'">';
						}
					?>
                    <input type="file" name="foto5">
                </div>                
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">Simpan</button>
					<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
	            </div>
            </form>
            <?php } ?>

        </div>           
    </div>
</div>

    <script src="js/lokasi.js"></script>