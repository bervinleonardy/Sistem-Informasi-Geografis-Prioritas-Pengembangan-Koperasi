<?php 
session_start();
$error_reporting = E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT);
error_reporting($error_reporting);
$time_server   = date( 'O' ) / 100;
$time_offset = TIME_OFFSET - $time_server;
setlocale (LC_TIME, TIME_LOCALE);

$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'dbkoperasi'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$listdata = "SELECT id_koperasi, nama_koperasi,jenis_koperasi,bentuk_koperasi, id_user, alamat_koperasi, id_kelurahan, kode_kecamatan, email, no_telp, latitude, longitude, id_sektor, tgl_daftar,foto1 FROM data_koperasi";
$query = mysqli_query($conn, $listdata);
while($data= mysqli_fetch_array($query)){
	$sqlb = "SELECT id_user, id_sektor, nama_user AS namus, nama_sektor AS namsek
			FROM user, sektor_usaha WHERE id_user='$data[id_user]' AND id_sektor='$data[id_sektor]'";										
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
		"sktr"=>$rowb['namsek'],
		"almt"=>$data['alamat_koperasi'],
		"eml"=>$data['email'],
		"tlp"=>$data['no_telp'],
		"gam"=>$data['foto1']
	);	
}

echo (json_encode($array_data));

?>
