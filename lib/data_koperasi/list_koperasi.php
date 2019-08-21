<a href="lib/data_koperasi/print_koperasi.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>

<!--<a href="#" class="open_modal1 btn btn-primary pull-right" data-target="#ModalImp" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Import Data</a> -->

<a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
<!--                                        <td align="center"><strong>No.</strong></td>-->
										<td align="center"><strong>ID Koperasi</strong></td>
                                        <td align="center"><strong>NAMA KOPERASI</strong></td>
                                        <td align="center"><strong>PENGURUS</strong></td>
                                        <td align="center"><strong>ALAMAT</strong></td>
<!--
                                        <td align="center"><strong>EMAIL</strong></td>
                                        <td align="center"><strong>No. TELP</strong></td>
-->
                                        <td align="center"><strong>JENIS KOPERASI</strong></td>
										<td align="center"><strong>KELOMPOK KOPERASI</strong></td>
										<td align="center"><strong>BENTUK KOPERASI</strong></td>
                                        <td align="center"><strong>SEKTOR USAHA</strong></td>
<!--                                        <td align="center"><strong>TANGGAL DAFTAR</strong></td>-->
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = 'SELECT id_koperasi,nama_koperasi,jenis_koperasi,id_pengurus,kel_koperasi,alamat_koperasi,bentuk_koperasi,id_kelurahan,id_sektor FROM data_koperasi';										
								$query = mysqli_query($conn, $sql);								
								//$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
<!--										<td align="center">?=$no;?></td>-->
										<td align="center"><?=$row['id_koperasi']?></td>
                                        <td align="center"><?=$row['nama_koperasi']?></td>
                                        <?php
											$sqla = "SELECT id_pengurus, nama_pengurus FROM pengurus WHERE id_pengurus='$row[id_pengurus]'";										
											$querya = mysqli_query($conn, $sqla);								
											$rowa = mysqli_fetch_array($querya);						
										?>
                                        <td align="center"><?=$rowa['nama_pengurus']?></td>                     <?php
											$sqlb = "SELECT id_kelurahan,kode_kecamatan,nama_kelurahan,kode_pos FROM kelurahan WHERE id_kelurahan='$row[id_kelurahan]' ";										
											$queryb = mysqli_query($conn, $sqlb);								
											while ($rowb = mysqli_fetch_array($queryb)){
										?>
										<?php
											$sqlc = "SELECT kode_kecamatan,nama_kecamatan FROM kecamatan WHERE kode_kecamatan='$rowb[kode_kecamatan]' ";										
											$queryc = mysqli_query($conn, $sqlc);								
											$rowc = mysqli_fetch_array($queryc);
											?>										
                                        <td align="center"><?=$row['alamat_koperasi']?> Kel. <?=$rowb['nama_kelurahan']?> Kec.<?=$rowc['nama_kecamatan']?>  Kota.  Bandung <?=$rowb['kode_pos']?> </td>

                                        <td align="center"><?=$row['jenis_koperasi']?></td>
										<td align="center">Kop.<?=$row['kel_koperasi']?></td>
										<td align="center"><?=$row['bentuk_koperasi']?></td>
                                        <?php
											$sqld = "SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$row[id_sektor]'";										
											$queryd = mysqli_query($conn, $sqld);								
											$rowd = mysqli_fetch_array($queryd);						
										?>
                                        <td align="center"><?=$rowd['nama_sektor']?></td>

                                        <td align="center">
										<a href="?hal=<?= md5('datusbar').'&edit='.md5($row['id_koperasi'])?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
											
                                        <a href="#" class="open_modal" id="<?=$row['id_koperasi'];?>"><button type="button" class="btn btn-warning btn-sm" title="Details"><i class="fa fa-eye"></i></button></a>
											
                                        <a href="#" onclick="confirm_modal('lib/data_koperasi/delete_koperasi.php?&del=<?= md5($row['id_koperasi']);?>&del2=<?= md5($row['id_wp']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php //$no++;
								}}?>
                                </tbody>
                            </table>