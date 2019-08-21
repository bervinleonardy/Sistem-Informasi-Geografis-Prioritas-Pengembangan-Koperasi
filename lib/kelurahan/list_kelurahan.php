	<a href="lib/kelurahan/print_kelurahan.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>

<!--	<a href="#" class="open_modal1 btn btn-primary pull-right" data-target="#ModalImp" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Import Data</a> -->

    <a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a> 
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA KELURAHAN</strong></td>
                                        <td align="center"><strong>KECAMATAN</strong></td>
                                        <td align="center"><strong>KODE POS</strong></td>
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>

                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = 'SELECT id_kelurahan, nama_kelurahan, kode_kecamatan, kode_pos FROM kelurahan';										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_kelurahan']?></td>
                                        <?php
											$sqla = "SELECT kode_kecamatan, nama_kecamatan 
													FROM kecamatan WHERE kode_kecamatan='$row[kode_kecamatan]'";										
											$querya = mysqli_query($conn, $sqla);
											$rowa = mysqli_fetch_array($querya);						
											?>
                                        <td align="center"><?=$rowa['nama_kecamatan']?></td>
                                        <td align="center"><?=$row['kode_pos']?></td>
                                        <td align="center">
											
										<a href="#" class="open_modal" id="<?=$row['id_kelurahan'];?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a> | 
											
                                        <a href="#" onclick="confirm_modal('lib/kelurahan/delete_kelurahan.php?&del=<?= md5($row['id_kelurahan']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>
