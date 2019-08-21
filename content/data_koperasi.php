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
      Data Koperasi 
    </div>
    <div class="panel-body">
	<?php
		require'lib/data_koperasi/list_koperasi.php';
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
            <h4 class="modal-title" id="myModalLabel">Tambah Data Koperasi</h4>
        </div>

        <div class="modal-body">
          <form action="lib/data_koperasi/add_koperasi.php" name="modal_popup" enctype="multipart/form-data" method="POST">            
          		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">ID Koperasi</label>
     				<input type="text" name="idkop"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Koperasi</label>
     				<input type="text" name="nama"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Pengurus Koperasi</label>
     				<input type="text" name="pengurus"  class="form-control" required/>
                </div>			  
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Jenis Koperasi</label>
					<?php 
						if($row['jenis_koperasi']=='Konsumen'){
							$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
						}elseif($row['jenis_koperasi']=='Jasa'){
							$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
						}elseif($row['jenis_koperasi']=='Simpan Pinjam'){
							$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';
						}elseif($row['jenis_koperasi']=='Pemasaran'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';
						}elseif($row['jenis_koperasi']=='Produsen'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';
						}elseif($row['jenis_koperasi']=='Lainnya'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';
						}

					echo'<br/>
						<input type="radio" name="jenkop" value="Konsumen" '.$ceklis1.'> Konsumen
						<input type="radio" name="jenkop" value="Jasa" '.$ceklis2.'> Jasa
						<input type="radio" name="jenkop" value="Simpan Pinjam" '.$ceklis3.'> Simpan Pinjam
						<input type="radio" name="jenkop" value="Pemasaran" '.$ceklis4.'> Pemasaran
						<input type="radio" name="jenkop" value="Produsen" '.$ceklis5.'> Produsen
						<input type="radio" name="jenkop" value="Jasa" '.$ceklis6.'> Lainnya
						'
						;
						?>     				
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kelompok Koperasi</label>
					<?php 
						if($row['kel_koperasi']=='Serba Usaha'){
							$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Profesi'){
							$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Pegawai Negeri'){
							$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Karyawan'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Simpan Pinjam'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Kepolisian'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Pepabri'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='checked';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Wanita'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='checked';$ceklis9='';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Angkatan Darat'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='checked';$ceklis10='';$ceklis11='';
						}elseif($row['kel_koperasi']=='Pasar'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='checked';$ceklis11='';
						}elseif($row['kel_koperasi']=='Lainnya'){
							$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';$ceklis7='';$ceklis8='';$ceklis9='';$ceklis10='';$ceklis11='checked';
						}


					echo'<br/>
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
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Alamat</label>
     				<input type="text" name="alamat"  class="form-control" required/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Bentuk Koperasi</label>
					<?php 
						if($row['bentuk_koperasi']=='Primer'){
							$ceklis1='checked'; $ceklis2=''; 
						}elseif($row['bentuk_koperasi']=='Sekunder'){
							$ceklis1=''; $ceklis2='checked';
						}
					echo'<br/>
						<input type="radio" name="benkop" value="Primer" '.$ceklis1.'> Primer
						<input type="radio" name="benkop" value="Sekunder" '.$ceklis2.'> Sekunder';
					?>	     				
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Kecamatan</label>
					<select name="idkec" class="form-control" onchange="select_kelurahan(this.value);">
						<option value="">---Pilih Kecamatan---</option>
						<?php
							$sqlc = "SELECT kode_kecamatan, nama_kecamatan 
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
						if($edit!=''){
							$sqlf = "SELECT id_kelurahan, nama_kelurahan 
									FROM kelurahan";

							$queryf = mysqli_query($conn, $sqlf);

							while ($rowf = mysqli_fetch_array($queryf))

							{	
								if ($rowf["id_kelurahan"] == $row['id_kelurahan']){
									$cekf = "selected";
								}
								else {
									$cekf = "";
								}

						   echo '<option value="'.$rowf["id_kelurahan"].'" '.$cekf.'> '.$rowf["nama_kelurahan"].' </option>'; } 
						}
						?> 
					</select>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Email</label>
                    <input type="text" name="email"  class="form-control" required>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">No. Telp</label>
                    <input type="text" name="notel"  class="form-control" required>
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
						<input type="text" name="lat" id="lat" class="form-control" readonly/>
						<input type="text" name="lng" id="lng" class="form-control" readonly/>

<!--						<script src="content/js/lokasi.js"></script>-->
						<div id="map" style="width:auto; height: 300px;"></div>
						<span class="help-block"><font color="#FB0307">Geser marker (Penanda Lokasi) sesuai lokasi anda!</font></span>
				</div>	
				<div class="form-group" style="padding-bottom: 20px;">
					<label for="Modal Name">Foto Koperasi</label>
						<span class="help-block"><font color="#FB0307">Maksimal 5 foto </font></span>
						<input type="file" name="foto1"><br>
						<input type="file" name="foto2"><br>
						<input type="file" name="foto3"><br>
						<input type="file" name="foto4"><br>
						<input type="file" name="foto5"><br>
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
<!--
<div id="ModalImp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
-->
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
<!-- Javascript untuk popup modal Import -->
<!--
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal1").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/data_koperasi/import.php",
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
    			   url: "lib/data_koperasi/edit_koperasi.php",
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
    			   url: "lib/data_koperasi/details_koperasi.php",
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
<script>
$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyC0HfzglV5QxTY26lJSTo0YJ0lChqVx0dU&callback=initialize"></script>
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
