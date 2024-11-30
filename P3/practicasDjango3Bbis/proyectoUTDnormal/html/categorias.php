
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: sesion.php');
    exit();
}

include 'conexion.php';

$sql = "SELECT nombre, descripcion, fecha, imagen FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | Proyecto UTD</title>
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
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="articulos.php">Artículos</a></li>
            <li><a href="categorias.php">Categorías</a></li>
            <li><a href="cerrarsesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Categorías</h1>
            <hr>
            <h2>Listado</h2>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="categoria" style="display: flex; align-items: center;">
                        <?php if (!empty($row['img'])): ?>
                            <img src="<?php echo htmlspecialchars($row['img']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" style="max-width: 100px; height: auto; margin-right: 15px;">
                        <?php endif; ?>
                        <div>
                            <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
                            <p>Descripción: <?php echo htmlspecialchars($row['descripcion']); ?></p>
                            <p><?php echo date('d \d\e F \d\e Y \a \l\a\s H:i', strtotime($row['fecha'])); ?></p>
                        </div>
                    </div>
                    <hr>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay categorías disponibles.</p>
            <?php endif; ?>
        </div>
    </section>
    <footer>
        <p>Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>
<?php
$conn->close();
?>

