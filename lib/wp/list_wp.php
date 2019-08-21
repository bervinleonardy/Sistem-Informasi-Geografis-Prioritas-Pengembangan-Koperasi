<a href="lib/wp/print_wp.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>

<!--<a href="#" class="open_modal1 btn btn-primary pull-right" data-target="#ModalImp" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Import Data</a> -->

<!--    <a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>-->
<h5>&nbsp;</h5>
							<h3>Tabel Pembobotan Kriteria</h3>
							 <div class="col-lg-12" style="width: 100%; overflow-x: auto;  ">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>KRITERIA</strong><i class="fa fa-fw fa-sort"></td>
                                        <td align="center"><strong>SIFAT </td>
                                        <td align="center"><strong>BOBOT</td>
                                        <td align="center"><strong>W</td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php 
									$mo = 5/29;
									$om = 5/29;
									$as	= 5/29;
									$pr = 4/29;
									$sh = 4/29;
									$ke = 3/29;
									$te = 3/29;						
									?>
                                    <tr>
										<td align="center">Modal Sendiri</td>
										<td align="center">Benefit</td>
										<td align="center">5</td>
										<td align="center"><?= $mo ?></td>
									</tr>	
									<tr>	
										<td align="center">Omset</td>
										<td align="center">Benefit</td>
										<td align="center">5</td>
										<td align="center"><?= $om ?></td>
									</tr>	
									<tr>	
										<td align="center">Aset</td>
										<td align="center">Benefit</td>
										<td align="center">5</td>
										<td align="center"><?= $as ?></td>
									</tr>	
									<tr>	
										<td align="center">Produktifitas</td>
										<td align="center">Benefit</td>
										<td align="center">4</td>
										<td align="center"><?= $pr ?></td>
									</tr>	
									<tr>	
										<td align="center">Sisa Hasil Usaha</td>
										<td align="center">Benefit</td>
										<td align="center">4</td>
										<td align="center"><?= $sh ?></td>
									</tr>	
									<tr>	
										<td align="center">Keaktifan</td>
										<td align="center">Cost</td>
										<td align="center">3</td>
										<td align="center"><?= $ke ?></td>
									</tr>	
									<tr>	
										<td align="center">Jumlah Anggota</td>
										<td align="center">Cost</td>
										<td align="center">3</td>
										<td align= "center"><?= $te ?></td>
                                    </tr>
                                </tbody>						
                            </table>
							</div>
							<br>

							<h5>&nbsp;</h5>
							<div class="clearfix"> </div>
							<center>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="GET">   	
							<div class="form-group" style="padding-bottom: 20px;">
							  <label class="col-sm-3 control-label">Filter Jenis Koperasi</label>
								<div class="col-sm-6">
							  <select class="form-control" name="filidkop">
								<option>--Pilih--</option>
								<?php
									$sqlkel = "SELECT jenis_koperasi FROM data_koperasi";
									$querykel = mysqli_query($conn, $sqlkel);	
									$rowkel = mysqli_fetch_array($querykel);

										if($rowkel['jenis_koperasi']=='Konsumen'){
											$ceklis1='checked'; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
										}elseif($rowkel['jenis_koperasi']=='Jasa'){
											$ceklis1=''; $ceklis2='checked'; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='';
										}elseif($rowkel['jenis_koperasi']=='Simpan Pinjam'){
											$ceklis1=''; $ceklis2=''; $ceklis3='checked';$ceklis4='';$ceklis5='';$ceklis6='';
										}elseif($rowkel['jenis_koperasi']=='Pemasaran'){
											$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='checked';$ceklis5='';$ceklis6='';
										}elseif($rowkel['jenis_koperasi']=='Produsen'){
											$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='checked';$ceklis6='';
										}elseif($rowkel['jenis_koperasi']=='Lainnya'){
											$ceklis1=''; $ceklis2=''; $ceklis3='';$ceklis4='';$ceklis5='';$ceklis6='checked';
										}

									echo '<option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis1.'>Konsumen</option>
										  <option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis2.'> Jasa</option>	
										  <option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis3.'> Simpan Pinjam</option>
										  <option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis4.'> Pemasaran</option>
										  <option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis5.'> Produsen</option>
										  <option value="'.$rowkel["jenis_koperasi"].'" '.$ceklis6.'> Lainnya</option>

									'; ?>								  
								</select>
								</div>
								<button class="btn btn-primary" type="submit">Filter</button>
							</div> 
							</form>	
							</center>
							<div class="clearfix"> </div>


							<h5>&nbsp;</h5>
							<h3>Keterangan Bobot Kriteria</h3>
							<div class="col-lg-12" style="width: 100%; overflow-x: auto;  ">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>KOPERASI</strong></td>
										<td align="center"><strong>JENIS KOPERASI</strong></td>
                                        <td align="center"><strong>KEAKTIFAN </td>
                                        <td align="center"><strong>JUMLAH ANGGOTA</td>
                                        <td align="center"><strong>MODAL SENDIRI</td>
										<td align="center"><strong>ASSET</td>	
										<td align="center"><strong>VOLUME USAHA</td>
										<td align="center"><strong>SISA HASIL USAHA</td>
										<td align="center"><strong>PRODUKTIFITAS (%)</td>	
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$filter = $_GET['filidkop'];		
								$sql = "SELECT * FROM wp  ";										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{
									$sqla = "SELECT id_koperasi,nama_koperasi,jenis_koperasi FROM data_koperasi WHERE id_koperasi='$row[id_koperasi]'";
									$querya = mysqli_query($conn, $sqla);
									$rowa = mysqli_fetch_array($querya);
									?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$rowa['nama_koperasi']?></td>		
										<td align="center"><?=$rowa['jenis_koperasi']?></td>							
                                        <td align="center"><?php 
										if  ($row['keaktifan'] == 'aktif')  {
											echo 'Berpengaruh';
										}
										if ($row['keaktifan'] == 'tidak aktif') {
											echo 'Tidak Berpengaruh';
										}										
										?></td>
                                        <td align="center">
										<?php 
										if ($row['jumlah_anggota'] < 1) {
											echo 'Sangat Rendah';
										}
										if (($row['jumlah_anggota'] >= 1) && ($row['jumlah_anggota'] <= 5)) {
											echo 'Rendah';
										}									
										if (($row['jumlah_anggota'] >= 5) && ($row['jumlah_anggota'] <= 10)) {
											echo 'Sedang';
										}									
										if (($row['jumlah_anggota'] >= 10) && ($row['jumlah_anggota'] <= 20)) {
											echo 'Tinggi';
										}									
										if  ($row['jumlah_anggota'] > 20) {
											echo 'Sangat Tinggi';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row['modal_sendiri'] < 12035000) {
											echo 'Sangat Rendah';
										}
										if (($row['modal_sendiri'] >= 12035000) && ($row['modal_sendiri'] <= 100000000)) {
											echo 'Rendah';
										}									
										if (($row['modal_sendiri'] >= 100000000) && ($row['modal_sendiri'] <= 700000000)) {
											echo 'Sedang';
										}									
										if (($row['modal_sendiri'] >= 700000000) && ($row['modal_sendiri'] <= 1000000000)) {
											echo 'Tinggi';
										}									
										if  ($row['modal_sendiri'] > 1000000000) {
											echo 'Sangat Tinggi';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row['asset'] < 29640600) {
											echo 'Sangat Rendah';
										}
										if (($row['asset'] >= 29640600) && ($row['asset'] <= 117000000)) {
											echo 'Rendah';
										}									
										if (($row['asset'] >= 117000000) && ($row['asset'] <= 720000000)) {
											echo 'Sedang';
										}									
										if (($row['asset'] >= 720000000) && ($row['asset'] <= 1500000000)) {
											echo 'Tinggi';
										}									
										if  ($row['asset'] > 1500000000) {
											echo 'Sangat Tinggi';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row['omset'] < 15200000) {
											echo 'Sangat Rendah';
										}
										if (($row['omset'] >= 15200000) && ($row['omset'] <= 103000000)) {
											echo 'Rendah';
										}									
										if (($row['omset'] >= 103000000) && ($row['omset'] <= 710000000)) {
											echo 'Sedang';
										}									
										if (($row['omset'] >= 710000000) && ($row['omset'] <= 1100000000)) {
											echo 'Tinggi';
										}									
										if  ($row['omset'] > 1100000000) {
											echo 'Sangat Tinggi';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row['shu'] < 3801000) {
											echo 'Sangat Rendah';
										}
										if (($row['shu'] >= 3801000) && ($row['shu'] <= 10000000)) {
											echo 'Rendah';
										}									
										if (($row['shu'] >= 10000000) && ($row['shu'] <= 40000000)) {
											echo 'Sedang';
										}									
										if (($row['shu'] >= 40000000) && ($row['shu'] <= 100000000)) {
											echo 'Tinggi';
										}									
										if  ($row['shu'] > 100000000) {
											echo 'Sangat Tinggi';
										}	
										?></td>	
                                		 <td align="center">
										<?php 
										if ($row['produktifitas'] <= 3) {
											echo 'Sangat Rendah';
										}
										if (($row['produktifitas'] > 3) && ($row['produktifitas'] <= 8)) {
											echo 'Rendah';
										}									
										if (($row['produktifitas'] >= 9) && ($row['produktifitas'] <= 14)) {
											echo 'Sedang';
										}									
										if (($row['produktifitas'] >= 15) && ($row['produktifitas'] <= 20)) {
											echo 'Tinggi';
										}									
										if  ($row['produktifitas'] > 20) {
											echo 'Sangat Tinggi';
										}	
										?></td>											
										
                                        <td align="center">
										<a href="#" class="open_modal" id="<?=$row['id_wp'];?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>  
                                        <a href="#" onclick="confirm_modal('lib/wp/delete_wp.php?&del=<?= md5($row['id_wp']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>						
                            </table>
							</div>
							<br>	
							<h3>Hasil Pembobotan</h3>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>KOPERASI</strong></td>
                                        <td align="center"><strong>KEAKTIFAN </td>
                                        <td align="center"><strong>JUMLAH ANGGOTA</td>
                                        <td align="center"><strong>MODAL SENDIRI</td>
										<td align="center"><strong>ASSET</td>	
										<td align="center"><strong>VOLUME USAHA</td>
										<td align="center"><strong>SISA HASIL USAHA</td>
										<td align="center"><strong>PRODUKTIFITAS (%)</td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql1 = "SELECT * FROM wp ";										
								$query1 = mysqli_query($conn, $sql1);								
								$no1=1;
							 	while ($row1 = mysqli_fetch_array($query1))						
								{
									$sqlb = "SELECT id_koperasi,nama_koperasi FROM data_koperasi WHERE id_koperasi='$row1[id_koperasi]'";
									$queryb = mysqli_query($conn, $sqlb);
									$rowb = mysqli_fetch_array($queryb);
									?>
                                    <tr>
										<td align="center"><?=$no1;?></td>
                                        <td align="center"><?=$rowb['nama_koperasi']?></td>
                                        <td align="center"><?php 
										if  ($row1['keaktifan'] == 'aktif')  {
											echo '5';
										}
										if ($row1['keaktifan'] == 'tidak aktif') {
											echo '0';
										}										
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['jumlah_anggota'] < 1) {
											echo '1';
										}
										if (($row1['jumlah_anggota'] >= 1) && ($row1['jumlah_anggota'] <= 5)) {
											echo '2';
										}									
										if (($row1['jumlah_anggota'] >= 5) && ($row1['jumlah_anggota'] <= 10)) {
											echo '3';
										}									
										if (($row1['jumlah_anggota'] >= 10) && ($row1['jumlah_anggota'] <= 20)) {
											echo '4';
										}									
										if  ($row1['jumlah_anggota'] > 20) {
											echo '5';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['modal_sendiri'] < 12035000) {
											echo '1';
										}
										if (($row1['modal_sendiri'] >= 12035000) && ($row1['modal_sendiri'] <= 100000000)) {
											echo '2';
										}									
										if (($row1['modal_sendiri'] >= 100000000) && ($row1['modal_sendiri'] <= 700000000)) {
											echo '3';
										}									
										if (($row1['modal_sendiri'] >= 700000000) && ($row1['modal_sendiri'] <= 1000000000)) {
											echo '4';
										}									
										if  ($row1['modal_sendiri'] > 1000000000) {
											echo '5';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['asset'] < 29640600) {
											echo '1';
										}
										if (($row1['asset'] >= 29640600) && ($row1['asset'] <= 117000000)) {
											echo '2';
										}									
										if (($row1['asset'] >= 117000000) && ($row1['asset'] <= 720000000)) {
											echo '3';
										}									
										if (($row1['asset'] >= 720000000) && ($row1['asset'] <= 1500000000)) {
											echo '4';
										}									
										if  ($row1['asset'] > 1500000000) {
											echo '5';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['omset'] < 15200000) {
											echo '1';
										}
										if (($row1['omset'] >= 15200000) && ($row1['omset'] <= 103000000)) {
											echo '2';
										}									
										if (($row1['omset'] >= 103000000) && ($row1['omset'] <= 710000000)) {
											echo '3';
										}									
										if (($row1['omset'] >= 710000000) && ($row1['omset'] <= 1100000000)) {
											echo '4';
										}									
										if  ($row1['omset'] > 1100000000) {
											echo '5';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['shu'] < 3801000) {
											echo '1';
										}
										if (($row1['shu'] >= 3801000) && ($row1['shu'] <= 10000000)) {
											echo '2';
										}									
										if (($row1['shu'] >= 10000000) && ($row1['shu'] <= 40000000)) {
											echo '3';
										}									
										if (($row1['shu'] >= 40000000) && ($row1['shu'] <= 100000000)) {
											echo '4';
										}									
										if  ($row1['shu'] > 100000000) {
											echo '5';
										}	
										?></td>	
                                		 <td align="center">
										<?php 
										if ($row1['produktifitas'] <= 3) {
											echo '1';
										}
										if (($row1['produktifitas'] > 3) && ($row1['produktifitas'] <= 8)) {
											echo '2';
										}									
										if (($row1['produktifitas'] >= 9) && ($row1['produktifitas'] <= 14)) {
											echo '3';
										}									
										if (($row1['produktifitas'] >= 15) && ($row1['produktifitas'] <= 20)) {
											echo '4';
										}									
										if  ($row1['produktifitas'] > 20) {
											echo '5';
										}	
										?></td>			
                                    </tr>
                                <?php $no1++;
								}?>
                                </tbody>						
                            </table>
							 <div class="clearfix"> </div>
							<h3>Kriteria + Pembobotan</h3>
							 <div class="col-lg-12" style="width: 100%; overflow-x: auto;  ">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>KOPERASI</strong></td>
                                        <td align="center"><strong>KEAKTIFAN </td>
                                        <td align="center"><strong>JUMLAH ANGGOTA</td>
                                        <td align="center"><strong>MODAL SENDIRI</td>
										<td align="center"><strong>ASSET</td>	
										<td align="center"><strong>VOLUME USAHA</td>
										<td align="center"><strong>SISA HASIL USAHA</td>
										<td align="center"><strong>PRODUKTIFITAS (%)</td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql1 = "SELECT * FROM wp ";										
								$query1 = mysqli_query($conn, $sql1);								
								$no1=1;
							 	while ($row1 = mysqli_fetch_array($query1))						
								{
									$mo = 5/29;
									$om = 5/29;
									$as	= 5/29;
									$pr = 4/29;
									$sh = 4/29;
									$ke = 3/29;
									$te = 3/29;										
									$sqlb = "SELECT id_koperasi,nama_koperasi FROM data_koperasi WHERE id_koperasi='$row1[id_koperasi]'";
									$queryb = mysqli_query($conn, $sqlb);
									$rowb = mysqli_fetch_array($queryb);
									?>
                                    <tr>
										<td align="center"><?=$no1;?></td>
                                        <td align="center"><?=$rowb['nama_koperasi']?></td>
                                        <td align="center"><?php 
										if  ($row1['keaktifan'] == 'aktif')  {
											echo '5 x '.$ke.' ';
										}
										if ($row1['keaktifan'] == 'tidak aktif') {
											echo '0 x '.$ke.'';
										}										
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['jumlah_anggota'] < 1) {
											echo '1 x '.$te.' ';
										}
										if (($row1['jumlah_anggota'] >= 1) && ($row1['jumlah_anggota'] <= 5)) {
											echo '2 x '.$te.' ';
										}									
										if (($row1['jumlah_anggota'] >= 5) && ($row1['jumlah_anggota'] <= 10)) {
											echo '3 x '.$te.' ';
										}									
										if (($row1['jumlah_anggota'] >= 10) && ($row1['jumlah_anggota'] <= 20)) {
											echo '4 x '.$te.' ';
										}									
										if  ($row1['jumlah_anggota'] > 20) {
											echo '5 x '.$te.' ';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['modal_sendiri'] < 12035000) {
											echo '1 x '.$mo.' ';
										}
										if (($row1['modal_sendiri'] >= 12035000) && ($row1['modal_sendiri'] <= 100000000)) {
											echo '2 x '.$mo.' ';
										}									
										if (($row1['modal_sendiri'] >= 100000000) && ($row1['modal_sendiri'] <= 700000000)) {
											echo '3 x '.$mo.' ';
										}									
										if (($row1['modal_sendiri'] >= 700000000) && ($row1['modal_sendiri'] <= 1000000000)) {
											echo '4 x '.$mo.' ';
										}									
										if  ($row1['modal_sendiri'] > 1000000000) {
											echo '5 x '.$mo.' ';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['asset'] < 29640600) {
											echo '1 x '.$as.' ';
										}
										if (($row1['asset'] >= 29640600) && ($row1['asset'] <= 117000000)) {
											echo '2 x '.$as.' ';
										}									
										if (($row1['asset'] >= 117000000) && ($row1['asset'] <= 720000000)) {
											echo '3 x '.$as.' ';
										}									
										if (($row1['asset'] >= 720000000) && ($row1['asset'] <= 1500000000)) {
											echo '4 x '.$as.' ';
										}									
										if  ($row1['asset'] > 1500000000) {
											echo '5 x '.$as.' ';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['omset'] < 15200000) {
											echo '1 x '.$om.' ';
										}
										if (($row1['omset'] >= 15200000) && ($row1['omset'] <= 103000000)) {
											echo '2 x '.$om.' ';
										}									
										if (($row1['omset'] >= 103000000) && ($row1['omset'] <= 710000000)) {
											echo '3 x '.$om.' ';
										}									
										if (($row1['omset'] >= 710000000) && ($row1['omset'] <= 1100000000)) {
											echo '4 x '.$om.' ';
										}									
										if  ($row1['omset'] > 1100000000) {
											echo '5 x '.$om.' ';
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row1['shu'] < 3801000) {
											echo '1 x '.$sh.' ';
										}
										if (($row1['shu'] >= 3801000) && ($row1['shu'] <= 10000000)) {
											echo '2 x '.$sh.' ';
										}									
										if (($row1['shu'] >= 10000000) && ($row1['shu'] <= 40000000)) {
											echo '3 x '.$sh.' ';
										}									
										if (($row1['shu'] >= 40000000) && ($row1['shu'] <= 100000000)) {
											echo '4 x '.$sh.' ';
										}									
										if  ($row1['shu'] > 100000000) {
											echo '5 x '.$sh.' ';
										}	
										?></td>	
                                		 <td align="center">
										<?php 
										if ($row1['produktifitas'] <= 3) {
											echo '1 x '.$pr.' ';
										}
										if (($row1['produktifitas'] > 3) && ($row1['produktifitas'] <= 8)) {
											echo '2 x '.$pr.' ';
										}									
										if (($row1['produktifitas'] >= 9) && ($row1['produktifitas'] <= 14)) {
											echo '3 x '.$pr.' ';
										}									
										if (($row1['produktifitas'] >= 15) && ($row1['produktifitas'] <= 20)) {
											echo '4 x '.$pr.' ';
										}									
										if  ($row1['produktifitas'] > 20) {
											echo '5 x '.$pr.' ';
										}	
										?></td>			
                                    </tr>
                                <?php $no1++;
								}?>
                                </tbody>						
                            </table>
							</div>
							<br>	 
							<h3>Preverensi (Vi) & Vektor (Si)</h3>
                             <div class="col-lg-12" style="width: 100%; overflow-x: auto;  ">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example5">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>KOPERASI</strong></td>
                                        <td align="center"><strong>KEAKTIFAN </td>
                                        <td align="center"><strong>JUMLAH ANGGOTA</td>
                                        <td align="center"><strong>MODAL SENDIRI</td>
										<td align="center"><strong>ASSET</td>	
										<td align="center"><strong>VOLUME USAHA</td>
										<td align="center"><strong>SISA HASIL USAHA</td>
										<td align="center"><strong>PRODUKTIFITAS (%)</td>
										<td align="center"><strong>Si</td>
										<td align="center"><strong>Vi</td>	
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql2 = "SELECT * FROM wp ";										
								$query2 = mysqli_query($conn, $sql2);								
								$no2=1;
							 	while ($row2 = mysqli_fetch_array($query2))						
								{
									$mo = 5/29;
									$om = 5/29;
									$as	= 5/29;
									$pr = 4/29;
									$sh = 4/29;
									$ke = 3/29;
									$te = 3/29;										
									$sqlc = "SELECT id_koperasi,nama_koperasi FROM data_koperasi WHERE id_koperasi='$row2[id_koperasi]'";
									$queryc = mysqli_query($conn, $sqlc);
									$rowc = mysqli_fetch_array($queryc);
									?>
                                    <tr>
										<td align="center"><?=$no2;?></td>
                                        <td align="center"><?=$rowc['nama_koperasi']?></td>
                                        <td align="center"><?php 
										if  ($row2['keaktifan'] == 'aktif')  {
											echo $aktif = pow(5,-$ke);
										}
										if ($row2['keaktifan'] == 'tidak aktif') {
											echo $aktif = pow(0,-$ke);
										}										
										?></td>
                                        <td align="center">
										<?php 
										if ($row2['jumlah_anggota'] < 1) {
											echo $jumang = pow(1,-$te);
										}
										if (($row2['jumlah_anggota'] >= 1) && ($row2['jumlah_anggota'] <= 5)) {
											echo $jumang = pow(2,-$te);
										}									
										if (($row2['jumlah_anggota'] >= 5) && ($row2['jumlah_anggota'] <= 10)) {
											echo $jumang = pow(3,-$te);
										}									
										if (($row2['jumlah_anggota'] >= 10) && ($row2['jumlah_anggota'] <= 20)) {
											echo $jumang = pow(4,-$te);
										}									
										if  ($row2['jumlah_anggota'] > 20) {
											echo $jumang = pow(5,-$te);
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row2['modal_sendiri'] < 12035000) {
											echo $modsen = pow(1,$mo);
										}
										if (($row2['modal_sendiri'] >= 12035000) && ($row2['modal_sendiri'] <= 100000000)) {
											echo $modsen = pow(2,$mo);
										}									
										if (($row2['modal_sendiri'] >= 100000000) && ($row2['modal_sendiri'] <= 700000000)) {
											echo $modsen = pow(3,$mo);
										}									
										if (($row2['modal_sendiri'] >= 700000000) && ($row2['modal_sendiri'] <= 1000000000)) {
											echo $modsen = pow(4,$mo);
										}									
										if  ($row2['modal_sendiri'] > 1000000000) {
											echo $modsen = pow(5,$mo);
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row2['asset'] < 29640600) {
											echo $asset = pow(1,$as);
										}
										if (($row2['asset'] >= 29640600) && ($row2['asset'] <= 117000000)) {
											echo $asset = pow(2,$as);
										}									
										if (($row2['asset'] >= 117000000) && ($row2['asset'] <= 720000000)) {
											echo $asset = pow(3,$as);
										}									
										if (($row2['asset'] >= 720000000) && ($row2['asset'] <= 1500000000)) {
											echo $asset = pow(4,$as);
										}									
										if  ($row2['asset'] > 1500000000) {
											echo $asset = pow(5,$as);
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row2['omset'] < 15200000) {
											echo $omset = pow(1,$om);
										}
										if (($row2['omset'] >= 15200000) && ($row2['omset'] <= 103000000)) {
											echo $omset =pow(2,$om);
										}									
										if (($row2['omset'] >= 103000000) && ($row2['omset'] <= 710000000)) {
											echo $omset =pow(3,$om);
										}									
										if (($row2['omset'] >= 710000000) && ($row2['omset'] <= 1100000000)) {
											echo $omset =pow(4,$om);
										}									
										if  ($row2['omset'] > 1100000000) {
											echo $omset =pow(5,$om);
										}	
										?></td>
                                        <td align="center">
										<?php 
										if ($row2['shu'] < 3801000) {
											echo $shu = pow(1,$sh);
										}
										if (($row2['shu'] >= 3801000) && ($row2['shu'] <= 10000000)) {
											echo $shu = pow(2,$sh);
										}									
										if (($row2['shu'] >= 10000000) && ($row2['shu'] <= 40000000)) {
											echo $shu = pow(3,$sh);
										}									
										if (($row2['shu'] >= 40000000) && ($row2['shu'] <= 100000000)) {
											echo $shu = pow(4,$sh);
										}									
										if  ($row2['shu'] > 100000000) {
											echo $shu = pow(5,$sh);
										}	
										?></td>	
                                		 <td align="center">
										<?php 
										if ($row2['produktifitas'] <= 3) {
											echo $prod = pow(1,$pr);
										}
										if (($row2['produktifitas'] > 3) && ($row2['produktifitas'] <= 8)) {
											echo $prod = pow(2,$pr);
										}									
										if (($row2['produktifitas'] >= 9) && ($row2['produktifitas'] <= 14)) {
											echo $prod = pow(3,$pr);
										}									
										if (($row2['produktifitas'] >= 15) && ($row2['produktifitas'] <= 20)) {
											echo $prod = pow(4,$pr);
										}									
										if  ($row2['produktifitas'] > 20) {
											echo $prod = pow(5,$pr);
										}	
										?></td>	
                                		 <td align="center">
										<?php 
										$hasilSi = $aktif * $jumang * $modsen * $asset * $omset * $shu * $prod;
										echo $hasilSi;
										?></td>
                                		 <td align="center">
										<?php 
										$us      = mysqli_query($conn,"SELECT SUM(Si) as tambah FROM wp");
										$rowz    = mysqli_fetch_array($us);
										$Vi      = $hasilSi/$rowz['tambah'];
										echo $Vi;
										?></td>										
                                    </tr>
                                <?php $no2++;
								}?>
                                </tbody>						
                            </table>
                            </div>
							<br>
							<h3>RANKING</h3>
                             <div class="col-lg-12" style="width: 100%; overflow-x: auto;  ">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example6">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA KOPERASI</strong></td>
										<td align="center"><strong>ALAMAT KOPERASI</strong></td>
										<td align="center"><strong>JENIS KOPERASI</strong></td>
                                        <td align="center"><strong>RANGKING </td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql2 = "SELECT * FROM wp WHERE Si= (SELECT MAX(Si) FROM wp)";										
								$query2 = mysqli_query($conn, $sql2);								
								$no2=1;
							 	while ($row2 = mysqli_fetch_array($query2))						
								{
									$mo = 5/29;
									$om = 5/29;
									$as	= 5/29;
									$pr = 4/29;
									$sh = 4/29;
									$ke = 3/29;
									$te = 3/29;										
									$sqlc = "SELECT * FROM data_koperasi WHERE id_koperasi='$row2[id_koperasi]'";
									$queryc = mysqli_query($conn, $sqlc);
									$rowc = mysqli_fetch_array($queryc);
									?>
                                    <tr>
										<td align="center"><?=$no2;?></td>
                                        <td align="center"><?=$rowc['nama_koperasi']?></td>
										<td align="center"><?=$rowc['alamat_koperasi']?></td>
										<td align="center"><?=$rowc['jenis_koperasi']?></td>
                                        <?php 
										if  ($row2['keaktifan'] == 'aktif')  {
											 $aktif = pow(5,-$ke);
										}
										if ($row2['keaktifan'] == 'tidak aktif') {
											 $aktif = pow(0,-$ke);
										}
										if ($row2['jumlah_anggota'] < 1) {
											 $jumang = pow(1,-$te);
										}
										if (($row2['jumlah_anggota'] >= 1) && ($row2['jumlah_anggota'] <= 5)) {
											 $jumang = pow(2,-$te);
										}									
										if (($row2['jumlah_anggota'] >= 5) && ($row2['jumlah_anggota'] <= 10)) {
											 $jumang = pow(3,-$te);
										}									
										if (($row2['jumlah_anggota'] >= 10) && ($row2['jumlah_anggota'] <= 20)) {
											 $jumang = pow(4,-$te);
										}									
										if  ($row2['jumlah_anggota'] > 20) {
											 $jumang = pow(5,-$te);
										}	
										if ($row2['modal_sendiri'] < 12035000) {
											 $modsen = pow(1,$mo);
										}
										if (($row2['modal_sendiri'] >= 12035000) && ($row2['modal_sendiri'] <= 100000000)) {
											 $modsen = pow(2,$mo);
										}									
										if (($row2['modal_sendiri'] >= 100000000) && ($row2['modal_sendiri'] <= 700000000)) {
											 $modsen = pow(3,$mo);
										}									
										if (($row2['modal_sendiri'] >= 700000000) && ($row2['modal_sendiri'] <= 1000000000)) {
											 $modsen = pow(4,$mo);
										}									
										if  ($row2['modal_sendiri'] > 1000000000) {
											 $modsen = pow(5,$mo);
										}
										if ($row2['asset'] < 29640600) {
											 $asset = pow(1,$as);
										}
										if (($row2['asset'] >= 29640600) && ($row2['asset'] <= 117000000)) {
											 $asset = pow(2,$as);
										}									
										if (($row2['asset'] >= 117000000) && ($row2['asset'] <= 720000000)) {
											 $asset = pow(3,$as);
										}									
										if (($row2['asset'] >= 720000000) && ($row2['asset'] <= 1500000000)) {
											 $asset = pow(4,$as);
										}									
										if  ($row2['asset'] > 1500000000) {
											 $asset = pow(5,$as);
										}
										if ($row2['omset'] < 15200000) {
											 $omset = pow(1,$om);
										}
										if (($row2['omset'] >= 15200000) && ($row2['omset'] <= 103000000)) {
											 $omset =pow(2,$om);
										}									
										if (($row2['omset'] >= 103000000) && ($row2['omset'] <= 710000000)) {
											 $omset =pow(3,$om);
										}									
										if (($row2['omset'] >= 710000000) && ($row2['omset'] <= 1100000000)) {
											 $omset =pow(4,$om);
										}									
										if  ($row2['omset'] > 1100000000) {
											 $omset =pow(5,$om);
										}
										if ($row2['shu'] < 3801000) {
											 $shu = pow(1,$sh);
										}
										if (($row2['shu'] >= 3801000) && ($row2['shu'] <= 10000000)) {
											 $shu = pow(2,$sh);
										}									
										if (($row2['shu'] >= 10000000) && ($row2['shu'] <= 40000000)) {
											$shu = pow(3,$sh);
										}									
										if (($row2['shu'] >= 40000000) && ($row2['shu'] <= 100000000)) {
											 $shu = pow(4,$sh);
										}									
										if  ($row2['shu'] > 100000000) {
											 $shu = pow(5,$sh);
										}	
										if ($row2['produktifitas'] <= 3) {
											 $prod = pow(1,$pr);
										}
										if (($row2['produktifitas'] > 3) && ($row2['produktifitas'] <= 8)) {
											 $prod = pow(2,$pr);
										}									
										if (($row2['produktifitas'] >= 9) && ($row2['produktifitas'] <= 14)) {
											 $prod = pow(3,$pr);
										}									
										if (($row2['produktifitas'] >= 15) && ($row2['produktifitas'] <= 20)) {
											 $prod = pow(4,$pr);
										}									
										if  ($row2['produktifitas'] > 20) {
											 $prod = pow(5,$pr);
										}
										$hasilSi = $aktif * $jumang * $modsen * $asset * $omset * $shu * $prod;
										?></td>
                                		 <td align="center">
										<?php 
										$us      = mysqli_query($conn,"SELECT * FROM wp WHERE Si= (SELECT MAX(Si) FROM wp)");
										$rowz    = mysqli_fetch_array($us);
//										for ($i=1; $i < $rowz; $i++){
//											$rangking = $rowz[$i];
//										}
										echo '1';
										?></td>										
                                    </tr>
                                <?php $no2++;
								}?>
                                </tbody>						
                            </table>
                            </div>                           