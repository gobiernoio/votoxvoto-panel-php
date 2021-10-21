<?php


if ($_SERVER['SERVER_NAME'] == "localhost") {
	$servidor_mysql = "localhost";
	$usuario_mysql = "root";
	$password_mysql = "";
	$base_mysql = "panel_votoxvoto";
	//echo "Conectando desde localhost";
}
else {
	$servidor_mysql = "localhost";
	$usuario_mysql = "revistg4_alberto";
	$password_mysql = "meganI0605";
	$base_mysql = "revistg4_nezapp";
	//echo "Conectando desde servidor";
}



$con = mysql_connect($servidor_mysql, $usuario_mysql, $password_mysql)
or die("no se pudo conectar con el servidor");

mysql_select_db($base_mysql, $con)
or die("No se pudo conectar a la base de datos");
?>