<?php
include "../../include/lib_inc.php";
require "../../include/Classes/excel_reader.php";
?>	
<div class="modal-dialog">
    	<div class="modal-content">

      	<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Import Data Pengurus Dan User</h4>
        </div>

        <div class="modal-body">
		<form name="myForm" id="myForm" onSubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
			<input type="file" id="filesekush" name="filesekush" />
			<label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>			
         <div class="modal-footer">
            <button class="btn btn-success" type="submit" name="submit" value="Import">Import</button>
            <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">Kembali</button>
         </div>			
		</form>
		
        </div>		
        </div>
    </div>
			<?php 
			if (isset($_POST['submit'])) {?>			
			<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
			<div id="info"></div>
			<?php

				$target = basename($_FILES['filesekush']['name']) ;
				move_uploaded_file($_FILES['filesekush']['tmp_name'], $target);

				$data = new Spreadsheet_Excel_Reader($_FILES['filesekush']['name'],false);

			//    menghitung jumlah baris file xls
				$baris = $data->rowcount($sheet_index=0);

			//    jika kosongkan data dicentang jalankan kode berikut
				if($_POST['drop']==1){
			//             kosongkan tabel sektor usaha
//						 $truncate ="TRUNCATE TABLE pengurus";
						 $truncate ="TRUNCATE TABLE user";	
						 mysqli_query($conn,$truncate);
				};

			//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
				for ($i=2; $i<=$baris; $i++)
				{
			//        menghitung jumlah real data. Karena kita mulai pada baris ke-2, maka jumlah baris yang sebenarnya adalah 
			//        jumlah baris data dikurangi 1. Demikian juga untuk awal dari pengulangan yaitu i juga dikurangi 1
					$barisreal = $baris-1;
					$k = $i-1;

			// menghitung persentase progress
					$percent = intval($k/$barisreal * 100)."%";

			// mengupdate progress
					echo '<script language="javascript">
					document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'; background-color:lightblue\">&nbsp;</div>";
					document.getElementById("info").innerHTML="'.$k.' data berhasil diinsert ('.$percent.' selesai).";
					</script>';

			//       membaca data (kolom ke-1 sd terakhir)
//					$idpeng      = $data->val($i, 1);  
//					$nama        = $data->val($i, 2);  
//					$noktp       = $data->val($i, 3);
//					$email       = $data->val($i, 4);
//					$password    = $data->val($i, 5);
//					$alamat      = $data->val($i, 6);
//					$notel       = $data->val($i, 7);
//					$tptlahir    = $data->val($i, 8);
//					$tgllahir    = $data->val($i, 9);
//					$jenkel      = $data->val($i, 10);
//					$fotoktp     = $data->val($i, 11);
//					$fotoak	     = $data->val($i, 12);
//					$user        = $data->val($i, 13);
					$date  	     = date("Y-m-d H:i:s", time());	
					//import user
					$iduser       = $data->val($i, 1);
					$namaus       = $data->val($i, 2);
					$fotous       = $data->val($i, 3);
					$email        = $data->val($i, 4);
					$notel 		  = $data->val($i, 5);
					$NIP     = $data->val($i, 6);
					$password     = $data->val($i, 7);
					$tipeus       = $data->val($i, 8);
					$status       = $data->val($i, 9);
					
					
			//      setelah data dibaca, masukkan ke tabel pegawai sql
//				  $query = "INSERT INTO pengurus(id_pengurus, nama_pengurus, no_ktp, email_pengurus, password, alamat, no_telp, tempat_lahir, tanggal_lahir, jenis_kelamin, foto_ktp, foto_pengurus, id_user, tgl_daftar) VALUES ('$idpeng', '$nama', '$noktp', '$email', '$password', '$alamat', '$notel', '$tptlahir', '$tgllahir', '$jenkel', '$fotoktp', '$fotoak', '$user','$date') ";
			//import user		
				  $query = "INSERT INTO user(id_user, nama_user, foto_user, email, no_telp, NIP, password,tipe_user,status,user_date) VALUES ('$iduser','$namaus','$fotous','$email','$notel','$NIP','$password','$tipeus','$status','$date')";					
				  $hasil = mysqli_query($conn,$query);

				  flush();

			//      kita tambahkan sleep agar ada penundaan, sehingga progress terbaca bila file yg diimport sedikit
			//      pada prakteknya sleep dihapus aja karena bikin lama hehe
			 //     sleep(1);

				}

			//    hapus file xls yang udah dibaca
				unlink($_FILES['filesekush']['name']);
			}
			echo '<a href="javascript:history.go(-1)">back</a>';
			?>
	 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filesekush', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>