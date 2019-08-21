<a href="lib/pengurus_koperasi/print_pengurus.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>

<!--<a href="#" class="open_modal1 btn btn-primary pull-right" data-target="#ModalImp" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Import Data</a> -->

<a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA</strong></td>
                                        <td align="center"><strong>No.KOP</strong></td>
                                        <td align="center"><strong>EMAIL</strong></td>
                                        <td align="center"><strong>ALAMAT</strong></td>
<!--                                        <td align="center"><strong>No. TELP</strong></td>-->
                                        <td align="center"><strong>TTL</strong></td>
                                        <td align="center"><strong>JENIS KELAMIN</strong></td>
<!--                                        <td align="center"><strong>STATUS AKUN</strong></td>-->
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = 'SELECT * FROM pengurus';										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                	<?php
										if($row['jenis_kelamin']=='L'){
											$jen = 'Laki-Laki';
										}
										if($row['jenis_kelamin']!='L'){
											$jen = 'Perempuan';
										}
										
									?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_pengurus']?></td>
                                        <td align="center"><?=$row['no_ktp']?></td>
                                        <td align="center"><?=$row['email_pengurus']?></td>
                                        <td align="center"><?=$row['alamat']?></td>
<!--                                        <td align="center">?=$row['no_telp']?></td>-->
                                        <td align="center"><?=$row['tempat_lahir']?>, <?=$row['tanggal_lahir']?></td>
                                        <td align="center"><?=$jen?></td>
                                        <?php
											$sqla = "SELECT id_user, status	FROM user WHERE id_user='$row[id_user]'";										
											$querya = mysqli_query($conn, $sqla);
											$rowa = mysqli_fetch_array($querya);
											
											if($rowa['status']=='Aktif'){
											}
											if($rowa['status']!='Nonaktif'){
											}						
										?>
<!--                                        <td align="center">?=$rowa['status'];?></td>                                        -->
                                        <td align="center">
                                        <a href="#" class="open_modall" id="<?=$row['id_pengurus'];?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
											
										<a href="#" class="open_modal" id="<?=$row['id_pengurus'];?>"><button type="button" class="btn btn-warning btn-sm" title="Details"><i class="fa fa-eye"></i></button></a>
											
                                        <a href="#" onclick="confirm_modal('lib/pengurus_koperasi/delete_pengurus.php?&del=<?= md5($row['id_pengurus']);?>&del2=<?= md5($row['id_user']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>