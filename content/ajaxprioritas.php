<?php 
$error_reporting = E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT);
error_reporting($error_reporting);
$time_server   = date( 'O' ) / 100;
$time_offset = TIME_OFFSET - $time_server;
setlocale (LC_TIME, TIME_LOCALE);

include_once '../include/lib_inc.php';
	$sql2 = "SELECT * FROM wp WHERE Si= (SELECT MAX(Si) FROM wp)";					
	$query2 = mysqli_query($conn, $sql2);	
	while ($row2 = mysqli_fetch_array($query2))						
	{			
$listdata = "SELECT * FROM data_koperasi WHERE id_koperasi='$row2[id_koperasi]'";
$query = mysqli_query($conn, $listdata);
while($data= mysqli_fetch_array($query)){
	$sqlb = "SELECT a.id_pengurus, b.id_sektor,d.id_kelurahan, a.nama_pengurus AS namus, b.nama_sektor AS namsek, d.nama_kelurahan AS kelurahan
			FROM pengurus a, sektor_usaha b, kelurahan d WHERE a.id_pengurus='$data[id_pengurus]' AND b.id_sektor='$data[id_sektor]' AND d.id_kelurahan='$data[id_kelurahan]' ";										
	$queryb = mysqli_query($conn, $sqlb);								
	$rowb = mysqli_fetch_array($queryb);
		
	$array_data[] = array(
		"id"=>$data['id_koperasi'],
		"nama"=>$data['nama_koperasi'],
		"pengurus"=>$rowb['namus'],
		"lnt"=>$data['latitude'],
		"lng"=>$data['longitude'],
		"benkop"=>$data['bentuk_koperasi'],
		"jenkop"=>$data['jenis_koperasi'],
		"kelkop"=>$data['kel_koperasi'],
		"sktr"=>$rowb['namsek'],
		"almt"=>$data['alamat_koperasi'],
		"kel"=>$rowb['kelurahan'],
		"gam"=>$data['foto1']
	);	
	}
}
//header('Content-Type: application/json');
echo (json_encode($array_data));

?>
