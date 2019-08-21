<?php
	include'../../include/lib_inc.php';
    $edit      = $_GET["edit"];
	$akn       = mysqli_query($conn,"SELECT * FROM pengurus WHERE id_pengurus='$edit'");
	while($row = mysqli_fetch_array($akn)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Akun</h4>
        </div>

        <div class="modal-body">
        	<form action="lib/pengurus_koperasi/update_pengurus.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama</label>
                    <input type="hidden" name="idpeng"  class="form-control" value="<?=$row['id_pengurus']; ?>" />
     				<input type="text" name="nama"  class="form-control" value="<?=$row['nama_pengurus']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. KTP</label>
     				<input type="text" name="noktp"  class="form-control" value="<?=$row['no_ktp']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Email</label>
     				<input type="text" name="email"  class="form-control" value="<?=$row['email_pengurus']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Alamat</label>
     				<input type="text" name="alamat"  class="form-control" value="<?=$row['alamat']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. Telepon</label>
     				<input type="text" name="notel"  class="form-control" value="<?=$row['no_telp']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Tempat Lahir</label>
     				<input type="text" name="tptlahir"  class="form-control" value="<?=$row['tempat_lahir']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Tanggal Lahir</label>
     				<input type="text" name="tgllahir" id="tanggal" class="form-control" value="<?=$row['tanggal_lahir']; ?>"/><button id="tanggal"><i class="fa fa-calendar"></i></button>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Jenis Kelamin</label>
                    <br />
     				<?php
						if($row["jenis_kelamin"]=='L'){
							$cek1='checked'; $cek2="";
						}elseif($row["jenis_kelamin"]=='P'){
							$cek1=""; $cek2='checked';
						}
						echo '<input type="radio" name="jenkel" value="L" '.$cek1.'> Laki-laki
                    		  <input type="radio" name="jenkel" value="P" '.$cek2.'> Perempuan';
					?>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto KTP</label>
     				<input type="file" name="fotoktp" width="50%" >
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="fotoktp" value="'. $row['foto_ktp'] .'">';
						}
					?>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto Profil</label>
     				<input type="file" name="fotoak" width="50%" >
                    <?php 
						if ($edit!=''){
							echo '<input type="text" name="fotoak" value="'. $row['foto_pengurus'] .'">';
						}
					?>
                    <input type="hidden" name="user"  class="form-control" value="<?=$row['id_user']; ?>" />
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

    <script src="../../js/bootstrap-datepicker.js"></script>