<?php
session_start();
include 'conexion.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verificar si las contraseñas coinciden
    if ($password !== $confirm_password) {
        echo "<p>Las contraseñas no coinciden. <a href='registro.php'>Intentar de nuevo</a></p>";
        exit();
    }

    // Verificar si el nombre de usuario ya existe
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nombre_usuario = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p>El nombre de usuario ya está en uso. <a href='registro.php'>Intentar con otro nombre de usuario</a></p>";
        exit();
    }

    // Cifrar la contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo usuario en la base de datos
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        // Registro exitoso, redirigir a la página de inicio de sesión
        echo "<p>Registro exitoso. <a href='sesion.php'>Iniciar sesión</a></p>";
    } else {
        echo "<p>Error al registrar el usuario. <a href='registro.php'>Intentar de nuevo</a></p>";
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: registro.php');
    exit();
}
?>
