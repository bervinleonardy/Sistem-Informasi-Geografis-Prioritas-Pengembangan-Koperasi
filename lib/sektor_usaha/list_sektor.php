	<a href="lib/sektor_usaha/print_sektor.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>

<!--	<a href="#" class="open_modal1 btn btn-primary pull-right" data-target="#ModalImp" data-toggle="modal" data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Import Data</a> -->

    <a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA SEKTOR</strong></td>
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>

                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = 'SELECT id_sektor, nama_sektor 
										FROM sektor_usaha';										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_sektor']?></td>
                                        <td align="center">
										<a href="#" class="open_modal" id="<?=$row['id_sektor'];?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a> | 
                                        <a href="#" onclick="confirm_modal('lib/sektor_usaha/delete_sektor.php?&del=<?= md5($row['id_sektor']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>
