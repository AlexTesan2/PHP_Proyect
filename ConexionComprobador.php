<?php
echo "conectando a database";
//$mysqli = mysqli_connect("192.168.1.122", "user1", "contrasena", "pokemon1");
$mysqli = mysqli_connect("172.17.0.3", "root", "4444", "pokemondb");
echo "funciona1";

if (!$mysqli) {
	echo "Error: No se pudo conectar a MySQL. \n" . PHP_EOL;
	echo "Error de depuración:" . mysqli_connect_errno() . "\n" . PHP_EOL;
	exit;
}else{
    echo "SI2\n". PHP_EOL;
}
?>