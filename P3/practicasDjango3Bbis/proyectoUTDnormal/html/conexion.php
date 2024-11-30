<?php
$servername = "localhost";
$username = "root";
$password = ""; // Si la contraseña de MySQL está vacía
$dbname = "registro_usuarios"; // Nombre de la base de datos para el registro de usuarios

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>