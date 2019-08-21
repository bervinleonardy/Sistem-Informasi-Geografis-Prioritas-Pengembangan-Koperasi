<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$us        = mysqli_query($conn,"SELECT * FROM wp  WHERE id_wp='$edit'");
	while($row = mysqli_fetch_array($us)){
	$namkop = $row['id_koperasi'];
	$jumang = $row['jumlah_anggota'];
	$modsen = $row['modal_sendiri'];
	$modlu  = $row['modal_luar'];
	$asset  = $row['asset'];
	$shu    = $row['shu'];
	$omset  = $row['omset'];
	$pro    = $row['produktifitas'];
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/wp/update_wp.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Koperasi</label>
					<div class="col-sm-6">
                  <select class="form-control" name="idkop">
<!--                  	<option>--Pilih--</option>-->
                    <?php
						
						$sqla = "SELECT id_koperasi, nama_koperasi
								FROM data_koperasi WHERE id_koperasi='$namkop'";
									
						$querya = mysqli_query($conn, $sqla);
//						$rowx = mysqli_fetch_array($querya);	
						while ($rowa = mysqli_fetch_array($querya))
									
							{	
								if ($rowa["id_koperasi"] == $idkop){
									$cek = "checked";
								}
								else {
									$cek = "";
								}
												
						echo '<option value="'.$rowa["id_koperasi"].'" '.$cek.' readonly> '.$rowa["nama_koperasi"].'</option>								
													
						'; }?>                                            
                	</select>
					</div>	
                </div>  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Kelompok Koperasi</label>
					
				  <div class="col-sm-6">	
						<?php
							$sqlz = "SELECT id_koperasi,kel_koperasi FROM data_koperasi WHERE id_koperasi='$namkop' ";																
							$queryz = mysqli_query($conn, $sqlz);														
							$rowz = mysqli_fetch_array($queryz);
						?>							
                        <?php 
							if($rowz['kel_koperasi']=='Serba Usaha'){
								$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Profesi'){
								$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Pegawai Negeri'){
								$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Karyawan'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Simpan Pinjam'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Kepolisian'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Pepabri'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='checked';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Wanita'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='checked';$ceklis9='';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Angkatan Darat'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='checked';$ceklis10='';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Pasar'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='checked';$ceklis11='';
							}elseif($rowz['kel_koperasi']=='Lainnya'){
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
				  </div>
                </div>			 
			  <div class="clearfix"> </div>
                    <div class="form-group" style="padding-bottom: 20px;">
                        <label class="col-sm-3 control-label">Keaktifan</label>
                        <div class="col-sm-6">
                            <?php
								$aktif = $row['keaktifan'];
								$sqlc = "SELECT keaktifan FROM wp WHERE keaktifan='$aktif'";																
								$queryc = mysqli_query($conn, $sqlc);														
								$row = mysqli_fetch_array($queryc);
							?>							
                        <?php 
							if($row['keaktifan']=='aktif'){
								$ceklis1='checked'; $ceklis2=''; 
							}elseif($row['keaktifan']=='tidak aktif'){
								$ceklis1=''; $ceklis2='checked';
							}
						echo'
                            <input type="radio" name="keaktifan" value="aktif" '.$ceklis1.'> Aktif
                            <input type="radio" name="keaktifan" value="tidak aktif" '.$ceklis2.'> Tidak Aktif';
						?>				
                        </div>
                    </div>
				<div class="clearfix"> </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Jumlah Anggota</label>
					<div class="col-sm-6">
					<input type="hidden" name="idwp"  class="form-control">					
                  	<input type="text" name="jumang"  class="form-control" placeholder="Jumlah Anggota"  value="<?= number_format($jumang) ?>" >
					</div>	
                </div>
			   <div class="clearfix"> </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Modal Sendiri</label>
				  <div class="col-sm-6">	
                  	<input type="text" name="modsen"  class="form-control" placeholder="Modal Sendiri" value="<?= number_format($modsen) ?>" >
				  </div>	   
                </div>	
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Modal Luar</label>
				  <div class="col-sm-6">	
                  <input type="text" name="modlu"  class="form-control" placeholder="Modal Luar" value="<?= number_format($modlu) ?>" >
				   </div> 	  
                </div>
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Asset</label>
				  <div class="col-sm-6">	
                  <input type="text" name="asset"  class="form-control" placeholder="Asset" value="<?= number_format($asset) ?>" >
				   </div> 	  
                </div>
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Volume Usaha/Omset</label>
				  <div class="col-sm-6">	
                  <input type="text" name="omset"  class="form-control" placeholder="Volume Usaha/Omset" value="<?= number_format($omset) ?>" >
				   </div> 	  
                </div>	
				<div class="clearfix"> </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Sisa Hasil Usaha</label>
				  <div class="col-sm-6">	
                  <input type="text" name="shu"  class="form-control" placeholder="Sisa Hasil Usaha" value="<?= number_format($shu) ?>" >
				   </div> 	  
                </div>	
			  <div class="clearfix"> </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Produktifitas (%)</label>
				  <div class="col-sm-6">	
                  <input type="text" name="produktifitas"  class="form-control" placeholder="Produktifitas" value="<?= $pro ?>" >
				</div>
				<div class="clearfix"> </div>	
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">Simpan</button>
					<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
	            </div>
            </form>
            <?php } ?>

        </div>           
    </div>
</div>