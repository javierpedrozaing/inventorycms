<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=UTF-8');

$mysqli = new mysqli("localhost", "root", "", "mydb");
mysqli_set_charset($mysqli,"utf8");
/* comprobar la conexión */
		if ($mysqli->connect_errno) {
		    printf("Falló la conexión: %s\n", $mysqli->connect_error);
		    exit();
		}

		if ($mysqli) {			
			$sql = "SELECT * FROM flores
			INNER JOIN agenda ON flores.id = agenda.flores_id 
			INNER JOIN imagen ON flores.imagen_id = imagen.id ";
			$flores = $mysqli->query($sql);		
			

		}else{
		die('No pudo conectarse: ' . mysqli_error());
		}

?>