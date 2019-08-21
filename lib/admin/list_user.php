<a href="lib/admin/print_user.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</a>
<a href="#" class="btn btn-info pull-right" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Tambah Data</a>
    <h5>&nbsp;</h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <td align="center"><strong>No.</strong></td>
                                        <td align="center"><strong>NAMA</strong></td>
                                        <td align="center"><strong>FOTO</strong></td>
                                        <td align="center"><strong>EMAIL</strong></td>
                                        <td align="center"><strong>No. TELP</strong></td>
                                        <td align="center"><strong>NIP</strong></td>
                                        <td align="center"><strong><i class="fa fa-gear"></i></strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
								$sql = "SELECT id_user, nama_user, foto_user, email, no_telp, NIP, password, tipe_user
										FROM user WHERE tipe_user = 'Staf Seksi' OR tipe_user = 'Kasie' OR tipe_user = 'Staf Data' ";										
								$query = mysqli_query($conn, $sql);								
								$no=1;
							 	while ($row = mysqli_fetch_array($query))						
								{?>
                                    <tr>
										<td align="center"><?=$no;?></td>
                                        <td align="center"><?=$row['nama_user']?></td>
                                        <td align="center"><img src="content/images/user/<?=$row['foto_user']?>" style="width:50px; height:50px;"></td>
                                        <td align="center"><?=$row['email']?></td>
                                        <td align="center"><?=$row['no_telp']?></td>
                                        <td align="center"><?=$row['NIP']?></td>                                        
                                        <td align="center">
										<a href="#" class="open_modal" id="<?=$row['id_user'];?>"><button type="button" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></button></a> | 
                                        <a href="#" onclick="confirm_modal('lib/admin/delete_user.php?&del=<?= md5($row['id_user']);?>');"><button type="button" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
                                    </tr>
                                <?php $no++;
								}?>
                                </tbody>
                            </table>