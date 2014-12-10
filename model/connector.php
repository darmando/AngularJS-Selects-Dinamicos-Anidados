<?php
//Área de conexión a base de datos
function getConnection() {

	/*$dbhost="redmkt.com.mx";
	$dbuser="u129844_root";
	$dbpass="Guidored01";
	$dbname="u1298844_gastosv2";*/
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="bebidas";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh -> exec("set names utf8");
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}
?>

