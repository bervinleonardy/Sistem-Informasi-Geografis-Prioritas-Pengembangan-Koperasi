<?php
error_reporting(0);
include "../../include/lib_inc.php";
require "../../include/Classes/excel_reader.php";
?>	
<div class="modal-dialog">
    	<div class="modal-content">

      	<div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Import Data wp</h4>
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
						 $truncate ="TRUNCATE TABLE wp";
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
				   $idwp		  = $data->val($i, 1);
				   $keaktifan	  = $data->val($i, 2);
				   $idkop		  = $data->val($i, 3);
				   $jenkop		  = $data->val($i, 4);
				   $jumangp		  = $data->val($i, 5);
				   $modsenp		  = $data->val($i, 6);
				   $modlup		  = $data->val($i, 7);
				   $assetp		  = $data->val($i, 8);
				   $omsetp		  = $data->val($i, 9);
				   $shup		  = $data->val($i, 10);
				   $produktifitas = $data->val($i, 11);				
					$mo = 5/29; 
					$om = 5/29;
					$as	= 5/29;
					$pr = 4/29;
					$sh = 4/29;
					$ke = 3/29;
					$te = 3/29;										

					if  ($keaktifan == 'aktif')  {
						 $aktif = pow(5,-$ke);
					}
					if ($keaktifan == 'tidak aktif') {
						 $aktif = pow(0,-$ke);
					}										

					if ($jumangp < 1) {
						 $jumang = pow(1,-$te);
					}
					if (($jumangp >= 1) && ($jumangp <= 5)) {
						 $jumang = pow(2,-$te);
					}									
					if (($jumangp >= 5) && ($jumangp <= 10)) {
						 $jumang = pow(3,-$te);
					}									
					if (($jumangp >= 10) && ($jumangp <= 20)) {
						 $jumang = pow(4,-$te);
					}									
					if  ($jumangp > 20) {
						 $jumang = pow(5,-$te);
					}	

					if ($modsenp < 12035000) {
						 $modsen = pow(1,$mo);
					}
					if (($modsenp >= 12035000) && ($modsenp <= 100000000)) {
						 $modsen = pow(2,$mo);
					}									
					if (($modsenp >= 100000000) && ($modsenp <= 700000000)) {
						 $modsen = pow(3,$mo);
					}									
					if (($modsenp >= 700000000) && ($modsenp <= 1000000000)) {
						 $modsen = pow(4,$mo);
					}									
					if  ($modsenp > 1000000000) {
						 $modsen = pow(5,$mo);
					}	

					if ($assetp < 29640600) {
						 $asset = pow(1,$as);
					}
					if (($assetp >= 29640600) && ($assetp <= 117000000)) {
						 $asset = pow(2,$as);
					}									
					if (($assetp >= 117000000) && ($assetp <= 720000000)) {
						 $asset = pow(3,$as);
					}									
					if (($assetp >= 720000000) && ($assetp <= 1500000000)) {
						 $asset = pow(4,$as);
					}									
					if  ($assetp > 1500000000) {
						 $asset = pow(5,$as);
					}	

					if ($omsetp < 15200000) {
						 $omset = pow(1,$om);
					}
					if (($omsetp >= 15200000) && ($omsetp <= 103000000)) {
						 $omset =pow(2,$om);
					}									
					if (($omsetp >= 103000000) && ($omsetp <= 710000000)) {
						 $omset =pow(3,$om);
					}									
					if (($omsetp >= 710000000) && ($omsetp <= 1100000000)) {
						 $omset =pow(4,$om);
					}									
					if  ($omsetp > 1100000000) {
						 $omset =pow(5,$om);
					}	

					if ($shup < 3801000) {
						 $shu = pow(1,$sh);
					}
					if (($shup >= 3801000) && ($shup <= 10000000)) {
						 $shu = pow(2,$sh);
					}									
					if (($shup >= 10000000) && ($shup <= 40000000)) {
						 $shu = pow(3,$sh);
					}									
					if (($shup >= 40000000) && ($shup <= 100000000)) {
						 $shu = pow(4,$sh);
					}									
					if  ($shup > 100000000) {
						 $shu = pow(5,$sh);
					}	

					if ($produktifitas <= 3) {
						 $prod = pow(1,$pr);
					}
					if (($produktifitas > 3) && ($produktifitas <= 8)) {
						 $prod = pow(2,$pr);
					}									
					if (($produktifitas >= 9) && ($produktifitas <= 14)) {
						 $prod = pow(3,$pr);
					}									
					if (($produktifitas >= 15) && ($produktifitas <= 20)) {
						 $prod = pow(4,$pr);
					}									
					if  ($produktifitas > 20) {
						 $prod = pow(5,$pr);
					}
					$Si = $aktif * $jumang * $modsen * $asset * $omset * $shu * $prod;					
			//      setelah data dibaca, masukkan ke tabel pegawai sql
				  $query = "INSERT INTO wp(id_wp, keaktifan, id_koperasi,jenis_koperasi, jumlah_anggota , modal_sendiri , modal_luar, asset , omset , shu , produktifitas ,Si) 
									VALUES ('$idwp','$keaktifan','$idkop','$jenkop ','$jumangp','$modsenp','$modlup','$assetp','$omsetp','$shup','$produktifitas','$Si')";
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