<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: sesion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visión | Proyecto UTD</title>
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
            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="sesion.php">Inicio Sesión</a></li>
                <li><a href="registro.php">Registro</a></li>
            <?php else: ?>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Visión</h1>
            <p>Convertirnos en líderes de referencia en nuestro sector, reconocidos por nuestra capacidad para innovar, adaptarnos y superar las expectativas de nuestros clientes.</p>
       </div>
    </section>
    <footer>
        <p>Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>