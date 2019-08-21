<?php
	include'../../include/lib_inc.php';
    $details   = $_GET["details"];
	$akn       = mysqli_query($conn,"SELECT * FROM pengurus WHERE id_pengurus='$details'");
	while($row = mysqli_fetch_array($akn)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Detail Data Pengurus</h4>
        </div>

        <div class="modal-body">
        	<table border="0" align="center">
                <?php
					if($row['foto_pengurus']!=''){
					 $pic = $row['foto_pengurus'];
					}
					elseif($row['foto_pengurus']==''){
						$pic = 'default_akun.jpg';
					}
				?>						   
            	<tr>
                	<td colspan="2" align="center"><img src="content/images/pengurus/<?=$pic?>" height="150px"></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Nama : </font></td>
                    <td>&nbsp; <?=$row['nama_pengurus']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">No. KTP : </font></td>
                    <td>&nbsp; <?=$row['no_ktp']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Tempat & Tanggal Lahir : </font></td>
                    <td>&nbsp; <?=$row['tempat_lahir']?>, <?=$row['tanggal_lahir']?></td>
                </tr>
                <?php
					if($row['jenis_kelamin']=='L'){
						$jen = 'Laki-Laki';
					}
					if($row['jenis_kelamin']!='L'){
						$jen = 'Perempuan';
					}
				?>
                <tr>
                	<td align="right"><font color="#BBBBBB">Jenis Kelamin : </font></td>
                    <td>&nbsp; <?=$jen;?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Alamat : </font></td>
                    <td>&nbsp; <?=$row['alamat']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">Email : </font></td>
                    <td>&nbsp; <?=$row['email_pengurus']?></td>
                </tr>
                <tr>
                	<td align="right"><font color="#BBBBBB">No. Telp : </font></td>
                    <td>&nbsp; <?=$row['no_telp']?></td>
                </tr>
                 <tr>
                	<td align="right"><font color="#BBBBBB">Waktu Pendaftaran : </font></td>
                    <td>&nbsp; <?=$row['tgl_daftar']?></td>
                </tr>
                <tr>
                	<td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                	<td align="Center" colspan="2"><font color="#BBBBBB"> FOTO KTP </font></td>
                </tr>
                <?php
					if($row['foto_ktp']!=''){
					 $pic1 = $row['foto_ktp'];
					}
					elseif($row['foto_ktp']==''){
						$pic1 = 'default_ktp.png';
					}
				?>					
                <tr>
                	<td align="Center" colspan="2"><img src="content/images/ktp/<?=$pic1?>" height="250px"></td>
                </tr>
            </table>	                
	    	<div class="modal-footer">
        		<a href="#" class="open_modal" id="<?=$row['id_pengurus'];?>"><button class="btn btn-success" type="button">Edit</button></a>
				<button class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
	       </div>
		   <?php } ?>
        </div>           
    </div>
</div>

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>



<script src="../../js/bootstrap-datepicker.js"></script>