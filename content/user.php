<?php session_start();?>
<?php
	$sql = "SELECT id_user, nama_user, foto_user, tipe_user, user_date 
			FROM user WHERE id_user='$_SESSION[user]'";
									
	$query = mysqli_query($conn, $sql);
							
	$row = mysqli_fetch_array($query);
?>
<section class="wrapper">
<div class="table-agile-info">        
  <div class="panel panel-default">  
    <div class="panel-heading">
      Data Pengguna 
    </div>
    <div class="panel-body">
	<?php
		include'lib/admin/list_user.php';
	?>
     	</div>
	</div>
  </div>
</section>
  <!-- Modal Popup untuk Add--> 
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalAdd" class="modal fade">
	<div class="modal-dialog">
    	<div class="modal-content">

      	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Data Admin</h4>
        </div>

        <div class="modal-body">
          <form action="lib/admin/add_user.php" name="modal_popup" enctype="multipart/form-data" method="POST">            
          		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama</label>
                    <input type="hidden" name="user"  class="form-control" />
     				<input type="text" name="namaus"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto User</label>
     				<input type="file" name="fotous">
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Email</label>
     				<input type="text" name="email"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. Telepon</label>
     				<input type="text" name="notel"  class="form-control" required/>
                </div> 
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Modal Name">Tipe User</label>
                  <select class="form-control" name="idtipe">
                  	<option>--Pilih--</option>
                    <?php
						$sqla = "SELECT id_user, tipe_user
								FROM user";
									
						$querya = mysqli_query($conn, $sqla);
						while ($rowa = mysqli_fetch_array($querya))
									
							{	
								if ($rowa["id_user"] == $iduser){
									$cek = "checked";
								}
								else {
									$cek = "";
								}
												
						echo '<option value="'.$rowa["id_user"].'" '.$cek.'> '.$rowa["tipe_user"].'</option>								
													
						'; }?>                                            
                	</select>
                </div>			  
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">NIP</label>
     				<input type="text" name="NIP" class="form-control" required/>
                </div>               
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Password</label>
     				<input type="password" name="password"  class="form-control" required/>    
                    <input type="hidden" name="status" value="Aktif" class="form-control" />
                </div>  			  
              	<div class="modal-footer">
                  <button class="btn btn-success" type="submit">Tambah</button>
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
              	</div>
          </form>

           

            </div>

           
        </div>
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Anda yakin ingin menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>



											

		
<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/admin/edit_user.php",
    			   type: "GET",
    			   data : {edit: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>   
<!-- DataTables JavaScript -->
<script src="content/style/datatables/js/jquery.dataTables.min.js"></script>
<script src="content/style/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="content/style/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


    					