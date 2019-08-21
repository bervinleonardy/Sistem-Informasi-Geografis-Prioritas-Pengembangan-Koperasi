<a href="lib/data_usaha/print_usaha.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>
<a href="?hal=<?= md5('datusbar')?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA USAHA</strong></td>
                                        <td align="center"><strong>PEMILIK</strong></td>
                                        <td align="center"><strong>ALAMAT</strong></td>
                                        <td align="center"><strong>EMAIL</strong></td>
                                        <td align="center"><strong>No. TELP</strong></td>
                                        <td align="center"><strong>SKALA</strong></td>
                                        <td align="center"><strong>SEKTOR USAHA</strong></td>
                                        <td align="center"><strong>TANGGAL DAFTAR</strong></td>
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = "SELECT id_usaha, nama_usaha, id_user, produk_utama, alamat_usaha, id_kelurahan, kode_kecamatan, email, no_telp, latitude, longitude, skala, id_sektor, tgl_daftar FROM data_usaha WHERE id_user='$_SESSION[user]'";										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_usaha']?></td>
                                        <?php
											$sqla = "SELECT id_user, nama_user FROM user WHERE id_user='$row[id_user]'";										
											$querya = mysqli_query($conn, $sqla);								
											$rowa = mysqli_fetch_array($querya);						
										?>
                                        <td align="center"><?=$rowa['nama_user']?></td>                                        <?php
											$sqlb = "SELECT id_kelurahan, kode_kecamatan, nama_kelurahan AS namkel, nama_kecamatan AS namkec, kode_pos 
													FROM kelurahan, kecamatan WHERE id_kelurahan='$row[id_kelurahan]' AND kode_kecamatan='$row[kode_kecamatan]'";										
											$queryb = mysqli_query($conn, $sqlb);								
											$rowb = mysqli_fetch_array($queryb);						
										?>
                                        <td align="center"><?=$row['alamat_usaha']?> Kel. <?=$rowb['namkel']?> Kec. <?=$rowb['namkec']?> Kota.  Bandung <?=$rowb['kode_pos']?> </td>
                                        <td align="center"><?=$row['email']?></td>
                                        <td align="center"><?=$row['no_telp']?></td>
                                        <td align="center"><?=$row['skala']?></td>
                                        <?php
											$sqlc = "SELECT id_sektor, nama_sektor FROM sektor_usaha WHERE id_sektor='$row[id_sektor]'";										
											$queryc = mysqli_query($conn, $sqlc);								
											$rowc = mysqli_fetch_array($queryc);						
										?>
                                        <td align="center"><?=$rowc['nama_sektor']?></td>
                                        <td align="center"><?=$row['tgl_daftar']?></td>                                         
                                        <td align="center">
										<a href="?hal=<?= md5('datusbar').'&edit='.md5($row['id_usaha'])?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a>
                                        <a href="#" class="open_modal" id="<?=$row['id_usaha'];?>"><button type="button" class="btn btn-warning btn-sm" title="Details"><i class="fa fa-eye"></i></button></a>
                                        <a href="#" onclick="confirm_modal('lib/data_usaha/delete_usaha.php?&del=<?= md5($row['id_usaha']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>