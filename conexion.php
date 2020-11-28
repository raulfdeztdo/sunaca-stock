<?php
/***********CONEXION CON LA BBDD*/
$servername = "localhost";
$database = "sunaca";
$username = "raulfdeztdo";
$password = "cD10710498/";
// Crear conexion
$conn = mysqli_connect($servername, $username, $password, $database);
// Comprobar conexion
if (!$conn) {
      die("Error al conectar con la Base de datos: " . mysqli_connect_error());
}

echo "<br>Conectado correctamente con la Base de datos!";

?>
