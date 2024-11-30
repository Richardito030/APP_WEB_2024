<?php
session_start();
include 'conexion.php'; // Incluye la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica que $conn esté abierto y no sea null
    if ($conn) {
        // Consulta segura usando prepared statements
        $stmt = $conn->prepare("SELECT nombre_usuario, contrasena FROM usuarios WHERE nombre_usuario = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Comparación de contraseña
            // Usa password_verify si la contraseña está cifrada
            if (password_verify($password, $row['contrasena'])) {
                $_SESSION['username'] = $row['nombre_usuario'];
                header('Location: ../index.php');
                exit();
            } 
            // Si la contraseña está en texto plano, usa comparación directa
            else if ($password === $row['contrasena']) {
                $_SESSION['username'] = $row['nombre_usuario'];
                header('Location: ../index.php');
                exit();
            } else {
                echo "<p>Contraseña incorrecta. <a href='sesion.php'>Intentar de nuevo</a></p>";
            }
        } else {
            echo "<p>Usuario no encontrado. <a href='sesion.php'>Intentar de nuevo</a></p>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<p>Error en la conexión a la base de datos.</p>";
    }
} else {
    header('Location: sesion.php');
    exit();
}
?>
