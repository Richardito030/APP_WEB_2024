<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="sesion.php">Inicio Sesión</a></li>
            <li><a href="registro.php">Registro</a></li>
        </ul>
    </nav>
    <section id="content">
<div class="box">
            <h1>Registro</h1>
            <form action="procesar_registro.php" method="post">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br>
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" id="confirm_password" name="confirm_password" required><br>
                <input type="submit" value="Registrar">
            </form>
       </div>
    </section>
    <footer>
        <p>Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            event.preventDefault(); // Evita el envío del formulario
        }
    });
</script>
</body>
</html>
```