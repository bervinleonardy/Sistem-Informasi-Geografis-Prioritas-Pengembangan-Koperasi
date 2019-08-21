<?php

switch ($_GET['hal']) {						
	case md5("dash"):
		$redirect="dashboard.php";
		break;	
	
	case md5("perusahaan"):
		$redirect="data_koperasi.php";
		break;
		
	case md5("pengurus"):
		$redirect="pengurus.php";
		break;
	
	case md5("sektor"):
		$redirect="sektor_usaha.php";
		break;
		
	case md5("kecamatan"):
		$redirect="kecamatan.php";
		break;
		
	case md5("kelurahan"):
		$redirect="kelurahan.php";
		break;
		
	case md5("pengguna"):
		$redirect="user.php";
		break;
		
	case md5("datusbar"):
		$redirect="new_usaha.php";
		break;
		
	case md5("lisdatak"):
		$redirect="data_koperasi_pe.php";
		break;
	
	case md5("dashak"):
		$redirect="dashboard_pe.php";
		break;

	case md5("wp"):
		$redirect="wp.php";
		break;		
		
	default:
		$redirect= "dashboard.php";				
	break;
	
					
}
			
include_once "$redirect";
?>