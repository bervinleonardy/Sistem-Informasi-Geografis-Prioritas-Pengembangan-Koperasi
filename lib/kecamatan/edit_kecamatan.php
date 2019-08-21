<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$kec       = mysqli_query($conn,"SELECT kode_kecamatan, nama_kecamatan FROM kecamatan WHERE kode_kecamatan='$edit'");
	while($row = mysqli_fetch_array($kec)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Kecamatan</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/kecamatan/update_kecamatan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Kecamatan</label>
                    <input type="hidden" name="idkecamatan"  class="form-control" value="<?=$row['kode_kecamatan']; ?>" />					
     				<input type="text" name="namakec"  class="form-control" value="<?=$row['nama_kecamatan']; ?>"/>
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