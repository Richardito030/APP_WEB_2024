<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Comprobar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Limitar el tamaño del archivo
    if ($_FILES["imagen"]["size"] > 500000) {
        echo "Lo siento, el archivo es muy grande.";
        $uploadOk = 0;
    }

    // Permitir solo ciertos formatos
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Intentar subir archivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subido.";

            // Insertar artículo en la base de datos con la ruta de la imagen
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $categoria_id = $_POST['categoria_id'];
            $fecha = date('Y-m-d H:i:s');

            $sql = "INSERT INTO articulos (nombre, descripcion, categoria_id, fecha, img) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssiss", $nombre, $descripcion, $categoria_id, $fecha, $target_file);
            $stmt->execute();
            echo "Artículo añadido exitosamente.";
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>

<form action="agregar_articulo.php" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre del artículo:</label>
    <input type="text" name="nombre" required>
    <br>
    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea>
    <br>
    <label for="categoria_id">Categoría:</label>
    <select name="categoria_id">
        <!-- Aquí debes cargar las categorías de la base de datos -->
        <?php
        $sql = "SELECT * FROM categorias";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
        }
        ?>
    </select>
    <br>
    <label for="imagen">Subir imagen:</label>
    <input type="file" name="imagen" required>
    <br>
    <button type="submit">Agregar artículo</button>
</form>
