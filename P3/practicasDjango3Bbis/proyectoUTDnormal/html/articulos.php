<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: sesion.php');
    exit();
}

include 'conexion.php';


$sql = "SELECT articulos.nombre AS articulo_nombre, articulos.descripcion AS articulo_descripcion, categorias.nombre AS categoria_nombre, articulos.fecha FROM articulos LEFT JOIN categorias ON articulos.categoria_id = categorias.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | Proyecto UTD</title>
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
            <h1>Artículos</h1>
            <hr>
            <h2>Listado</h2>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="articulo">
    <h3><?php echo htmlspecialchars($row['articulo_nombre']); ?></h3>
    <p>Descripción: <?php echo htmlspecialchars($row['articulo_descripcion']); ?></p>
    <?php if (!empty($row['imagen'])): ?>
        <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="<?php echo htmlspecialchars($row['articulo_nombre']); ?>" style="max-width: 200px; height: auto;">
    <?php endif; ?>
    <p>Categorías: <?php echo htmlspecialchars($row['categoria_nombre']); ?></p>
    <p><?php echo date('d \\d\\e F \\d\\e Y \\a \\l\\a\\s H:i', strtotime($row['fecha'])); ?></p>
</div>
<hr>

                <?php endwhile; ?>
            <?php else: ?>
                <p>No hay artículos disponibles.</p>
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