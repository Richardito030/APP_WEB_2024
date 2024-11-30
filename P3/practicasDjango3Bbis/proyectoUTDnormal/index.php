
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Proyecto UTD</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (!isset($_SESSION['username'])): ?>
                <li><a href="html/sesion.php">Inicio Sesión</a></li>
                <li><a href="html/registro.php">Registro</a></li>
            <?php else: ?>
                <li><a href="html/acercade.php">Acerca de</a></li>
                <li><a href="html/mision.php">Misión</a></li>
                <li><a href="html/vision.php">Visión</a></li>
                <li><a href="html/articulos.php">Artículos</a></li>
                <li><a href="html/categorias.php">Categorias</a></li>
                <li><a href="html/cerrarsesion.php">Cerrar Sesión</a></li>
               
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Inicio</h1>
            <hr>
            <?php if (isset($_SESSION['username'])): ?>
                <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
            <?php else: ?>
                <p>.:: ¡Bienvenido a mi página de Inicio! ::.</p>
            <?php endif; ?>
       </div>
    </section>
    <footer>
        <p>Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
