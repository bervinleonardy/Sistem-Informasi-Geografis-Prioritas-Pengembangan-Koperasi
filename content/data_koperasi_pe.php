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
<div class="table-agile-info">        
  <div class="panel panel-default">  
    <div class="panel-heading">
      Data Usaha 
    </div>
    <div class="panel-body">
	<?php
		include'lib/data_usaha/list_usaha_a.php';
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
            <h4 class="modal-title" id="myModalLabel">Tambah Data Pemilik Usaha</h4>
        </div>

        <div class="modal-body">
          <form action="lib/data_usaha/add_usaha.php" name="modal_popup" enctype="multipart/form-data" method="POST">            
          		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Usaha</label>
                    <input type="hidden" name="iduasha"  class="form-control" />
     				<input type="text" name="nama"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Produk Utama</label>
     				<input type="text" name="produk"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Alamat</label>
     				<textarea name="alamat" cols="55" rows="3" required></textarea>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kecamatan</label>
     				<select name="idkec" class="form-control" onchange="select_kelurahan(this.value);">
                    	<option value="">---Pilih Kecamatan---</option>
                        <?php
                        	$sql = "SELECT kode_kecamatan, kode_kecamatan, nama_kecamatan 
                                    FROM kecamatan";
                    
                    		$query = mysqli_query($conn, $sql);
            
                            while ($row = mysqli_fetch_array($query))
                        
                            {	
            	                if ($row["kode_kecamatan"] == $idkec){
                	                $cek = "selected";
                                }
                                else {
                                    $cek = "";
                                }
                                        
                           echo '<option value="'.$row["kode_kecamatan"].'" '.$cek.'> '.$row["nama_kecamatan"].' </option>'; } 
                                        
                		?> 
                	</select>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kelurahan</label>
     				<select name="idkel" class="form-control" id="onc_kel">
                    	<option value="">---Pilih Kelurahan---</option>
                	</select>
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
                	<label for="Modal Name">Skala Usaha</label>
                    <br />
                    <input type="radio" name="skala" value="MIKRO"> Mikro
                   	<input type="radio" name="skala" value="KECIL"> Kecil
                    <input type="radio" name="skala" value="MENENGAH"> Menengah
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
            	                if ($rowb["id_sektor"] == $idsektor){
                	                $cekb = "selected";
                                }
                                else {
                                    $cekb = "";
                                }
                                        
                           echo '<option value="'.$rowb["id_sektor"].'" '.$cek.'> '.$rowb["nama_sektor"].' </option>'; } 
                                        
                		?> 
                	</select>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Lokasi</label>
     				<input type="hidden" name="lat" id="lat" class="form-control" required/>
                    <input type="hidden" name="lng" id="lng" class="form-control" required/>
                    
                    <script src="content/js/lokasi.js"></script>
                    <div id="map" style="width:auto; height: 300px;"></div>
                    <p><font color="#FB0307">Geser marker (Penanda Lokasi) sesuai lokasi anda!</font></p>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Foto Usaha</label>
                    <p><font color="#FB0307">Maksimal 5 foto untuk setiap usaha Anda !</font></p>
     				<input type="file" name="foto1">
                    <input type="file" name="foto2">
                    <input type="file" name="foto3">
                    <input type="file" name="foto4">
                    <input type="file" name="foto5">
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

<!-- Modal Popup untuk Details--> 
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



											

		
<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modall").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/data_usaha/edit_usaha.php",
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
    			   url: "lib/data_usaha/details_usaha.php",
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
<script async defer
          src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDjKCzu3yhGFjZIFOtYioGtr5bV8QXPqvY &callback=initMap">
        </script>
<script src="content/js/lokasi.js"></script>
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
