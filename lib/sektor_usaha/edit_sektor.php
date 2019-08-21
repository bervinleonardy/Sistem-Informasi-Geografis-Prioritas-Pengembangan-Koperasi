<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$sek       = mysqli_query($conn,"SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$edit'");
	while($row = mysqli_fetch_array($sek)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Sektor Usaha</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/sektor_usaha/update_sektor.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Sektor</label>
                    <input type="hidden" name="idsektor"  class="form-control" value="<?=$row['id_sektor']; ?>" />
     				<input type="text" name="namasek"  class="form-control" value="<?=$row['nama_sektor']; ?>"/>
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