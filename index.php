<?php 
session_start();
//include untuk koneksi ke database
include_once 'include/lib_inc.php';
//i dont know (expired document)
$error_reporting = E_ALL & ~(E_NOTICE | E_DEPRECATED | E_STRICT);
error_reporting($error_reporting);
$time_server   = date( 'O' ) / 100;
$time_offset = TIME_OFFSET - $time_server;
setlocale (LC_TIME, TIME_LOCALE);

//Untuk Get Session ke admin
	if(($_SESSION["kopsign"]==true AND $_GET["koperasi"]!="") OR ($_SESSION["kopsign"]!=true && $_GET["koperasi"]!=base64_encode("rumahku") && $_GET["koperasi"]!="admin")) {
	  include_once "content/home.php";
	} 
	if($_SESSION["kopsign"]==true AND ($_GET["koperasi"]=="" OR $_GET["koperasi"]=="admin")) {
	  include_once "content/index.php";
	}
	?>		

	
    