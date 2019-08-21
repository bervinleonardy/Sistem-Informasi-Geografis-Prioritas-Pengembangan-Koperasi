<script>
$(function(){
	$("#tanggal").datepicker({
		format:'yyyy-mm-dd'
	});
});
</script>
<section class="wrapper">
<div class="table-agile-info">        
  <div class="panel panel-default">  
    <div class="panel-heading">
      Data Akun Pengurus Koperasi 
    </div>
    <div class="panel-body">
	<?php
		include'lib/pengurus_koperasi/list_pengurus.php';
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
            <h4 class="modal-title" id="myModalLabel">Tambah Akun Pengurus Koperasi</h4>
        </div>

        <div class="modal-body">
          <form action="lib/pengurus_koperasi/add_pengurus.php" name="modal_popup" enctype="multipart/form-data" method="POST">            
          		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama</label>
                    <input type="hidden" name="idpeng"  class="form-control" />
     				<input type="text" name="nama"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. KTP</label>
     				<input type="text" name="noktp"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Email</label>
     				<input type="text" name="email"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Password</label>
     				<input type="password" name="password"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Alamat</label>
     				<input type="text" name="alamat"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. Telepon</label>
     				<input type="text" name="notel"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Tempat Lahir</label>
     				<input type="text" name="tptlahir"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Tanggal Lahir</label>
     				<input type="text" name="tgllahir" id="tanggal" class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Jenis Kelamin</label>
                    <br />
                    <input type="radio" name="jenkel" value="L"> Laki-laki
                   	<input type="radio" name="jenkel" value="P"> Perempuan
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto KTP</label>
     				<input type="file" name="fotoktp">
                    <input type="hidden" name="user"  class="form-control" />
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto Pengurus</label>
     				<input type="file" name="fotoak">
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

<!-- Modal Popup untuk Import--> 
<!--<div id="ModalImp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
-->

<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalDetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

<!-- Javascript untuk popup modal Import--> 
<!--
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal1").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/pengurus_koperasi/import.php",
    			   type: "GET",
    			   data : {edit: m,},
    			   success: function (ajaxData){
      			   $("#ModalImp").html(ajaxData);
      			   $("#ModalImp").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>									
-->

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modall").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/pengurus_koperasi/edit_pengurus.php",
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

<!-- Javascript untuk popup modal Details --> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/pengurus_koperasi/details_pengurus.php",
    			   type: "GET",
    			   data : {details: m,},
    			   success: function (ajaxData){
      			   $("#ModalDetails").html(ajaxData);
      			   $("#ModalDetails").modal('show',{backdrop: 'true'});
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
<script src="js/bootstrap-datepicker.js"></script>   
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


    					