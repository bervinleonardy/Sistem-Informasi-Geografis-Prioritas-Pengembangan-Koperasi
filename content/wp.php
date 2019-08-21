<section class="wrapper">
<div class="table-agile-info">        
  <div class="panel panel-default">  
    <div class="panel-heading">
      Penentuan Prioritas Pengembangan Koperasi 
    </div>
    <div class="panel-body">
	<?php 
		if($row['tipe_user']=='Staf Seksi'){
	?>		
        <div class="modal-body">
          <form action="lib/wp/add_wp.php" name="modal_popup" enctype="multipart/form-data" method="POST">     
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Koperasi</label>
					<div class="col-sm-6">
                  <select class="form-control" name="idkop">
                  	<option>--Pilih--</option>
                    <?php
						$sqla = "SELECT id_koperasi, nama_koperasi
								FROM data_koperasi";
									
						$querya = mysqli_query($conn, $sqla);
						while ($rowa = mysqli_fetch_array($querya))
									
							{	
								if ($rowa["id_koperasi"] == $idkop){
									$cek = "checked";
								}
								else {
									$cek = "";
								}
												
						echo '<option value="'.$rowa["id_koperasi"].'" '.$cek.'> '.$rowa["nama_koperasi"].'</option>								
													
						'; }?>                                            
                	</select>
					</div>	
                </div>  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Jenis Koperasi</label>
					
				  <div class="col-sm-6">	
						<?php
							$sqlz = "SELECT id_koperasi,jenis_koperasi FROM data_koperasi ";																
							$queryz = mysqli_query($conn, $sqlz);														
							$rowz = mysqli_fetch_array($queryz);
						?>							
                        <?php 
							if($rowz['jenis_koperasi']=='Konsumen'){
								$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($rowz['jenis_koperasi']=='Jasa'){
								$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($rowz['jenis_koperasi']=='Simpan Pinjam'){
								$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';
							}elseif($rowz['jenis_koperasi']=='Pemasaran'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';
							}elseif($rowz['jenis_koperasi']=='Produsen'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';
							}elseif($rowz['jenis_koperasi']=='Lainnya'){
								$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';
							}
							
								   
						echo'
                            <input type="checkbox" name="jenkop" value="Konsumen" '.$ceklis1.'> Konsumen
                            <input type="checkbox" name="jenkop" value="Jasa" '.$ceklis2.'> Jasa
                            <input type="checkbox" name="jenkop" value="Simpan Pinjam" '.$ceklis3.'> Simpan Pinjam
							<input type="checkbox" name="jenkop" value="Pemasaran" '.$ceklis4.'> Pemasaran
							<input type="checkbox" name="jenkop" value="Produsen" '.$ceklis5.'> Produsen
							<input type="checkbox" name="jenkop" value="Lainnya" '.$ceklis6.'> Lainnya						
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
								$sqlc = "SELECT keaktifan FROM wp ";																
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
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Jumlah Anggota</label>
					<div class="col-sm-6">
					<input type="hidden" name="idwp"  class="form-control">					
                  	<input type="text" name="jumang"  class="form-control" placeholder="Jumlah Anggota" required>
					</div>	
                </div>
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Modal Sendiri</label>
				  <div class="col-sm-6">	
                  	<input type="text" name="modsen"  class="form-control" placeholder="Modal Sendiri" required>
				  </div>	   
                </div>	
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Modal Luar</label>
				  <div class="col-sm-6">	
                  <input type="text" name="modlu"  class="form-control" placeholder="Modal Luar" required>
				   </div> 	  
                </div>
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Asset</label>
				  <div class="col-sm-6">	
                  <input type="text" name="asset"  class="form-control" placeholder="Asset" required>
				   </div> 	  
                </div>
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Volume Usaha/Omset</label>
				  <div class="col-sm-6">	
                  <input type="text" name="omset"  class="form-control" placeholder="Volume Usaha/Omset" required>
				   </div> 	  
                </div>	

                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Sisa Hasil Usaha</label>
				  <div class="col-sm-6">	
                  <input type="text" name="shu"  class="form-control" placeholder="Sisa Hasil Usaha" required>
				   </div> 	  
                </div>	
			  
                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-sm-3 control-label">Produktifitas (%)</label>
				  <div class="col-sm-6">	
                  <input type="text" name="produktifitas"  class="form-control" placeholder="Produktifitas" required>
				   </div> 	  
                </div>				  

			  <div class="modal-footer">
                  <button class="btn btn-success" type="submit">Proses</button>
                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Reset</button>
              	</div>
          </form>
		</div>		
	<?php } if($row['tipe_user']=='Kasie'){
		include'lib/wp/list_wp.php';
	}?>
     </div>
	</div>
  </div>
</section>
<!-- Modal Popup untuk Import--> 
<!--<div id="ModalImp" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->

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

<!-- Javascript untuk popup modal Import -->
<!--
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal1").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/wp/import.php",
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
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "lib/wp/edit_wp.php",
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
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<!-- Jquery DataTables -->
<script type="text/javascript" language="javascript" src="http:////cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap dataTables Javascript -->
<script type="text/javascript" language="javascript" src="http://cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example1').DataTable();
    });
//exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

		var trBoldBlue = $("table");

	$(trBoldBlue).on("click", "tr", function (){
			$(this).toggleClass("bold-blue");
	});	
</script>
<script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable();
    });
    $(document).ready(function() {
        $('#dataTables-example3').DataTable();
    });	
    $(document).ready(function() {
        $('#dataTables-example4').DataTable();
    });	
    $(document).ready(function() {
        $('#dataTables-example5').DataTable();
    });	
    $(document).ready(function() {
        $('#dataTables-example6').DataTable();
    });		
</script> 
<script>
$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});
</script>    					