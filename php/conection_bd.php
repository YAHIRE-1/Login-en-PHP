<?php
// Configuración de la conexión a la base de datos
$servername = "localhost"; // Cambia esto si tu base de datos no está en localhost
$username = "root";  // Tu usuario de MySQL
$password = "";  // Tu contraseña de MySQL
$dbname = "new's_login";  // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn) {
    echo'Conexion exitosa.';
} else {
    echo'Conexion fallida.';
}

?>
