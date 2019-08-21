<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$kel       = mysqli_query($conn,"SELECT id_kelurahan, nama_kelurahan, kode_kecamatan, kode_pos FROM kelurahan WHERE id_kelurahan='$edit'");
	while($row = mysqli_fetch_array($kel)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Kelurahan</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/kelurahan/update_kelurahan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Kelurahan</label>
                    <input type="hidden" name="idkelurahan"  class="form-control" value="<?=$row['id_kelurahan']; ?>" />					
     				<input type="text" name="namakel"  class="form-control" value="<?=$row['nama_kelurahan']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Kecamatan</label>
                  <select class="form-control" name="idkec">
                  	
                    <?php
						$sqla = "SELECT kode_kecamatan,  nama_kecamatan 
								FROM kecamatan";
									
						$querya = mysqli_query($conn, $sqla);
							
						while ($rowa = mysqli_fetch_array($querya))
									
							{	
								if ($rowa["kode_kecamatan"] == $idkec){
									$cek = "checked";
								}
								else {
									$cek = "";
								}
												
						echo '<option value="'.$rowa["kode_kecamatan"].'" '.$cek.'> '.$rowa["nama_kecamatan"].'</option>								
													
						'; }?>                                            
                	</select>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kode Pos</label>
     				<input type="text" name="kodepos"  class="form-control" maxlength="5" value="<?=$row['kode_pos']; ?>"/>
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