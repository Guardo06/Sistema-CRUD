<?php
include("conexion.php");

// ESTA PARTE PROCESA LOS DATOS CUANDO LE DAS AL BOTÓN "GUARDAR"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

    if (empty($nombre) || empty($edad) || empty($peso) || empty($tipo) || empty($estado)) {
        echo "<div style='color:red'>Todos los campos son obligatorios</div>";
    } else {
        // Usamos los nombres de columnas de tu base de datos
        $sql ="INSERT INTO miembros (nombre, edad, peso, tipo_membresia, estado)
                VALUES('$nombre', '$edad', '$peso','$tipo', '$estado')";

        if ($conexion->query($sql)) {
            // Si todo sale bien, vuelve al index y avisa que se guardó
            header("Location: index.php?msg=1");
            exit();
        } else {
            echo "Error: " . $conexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Miembro</title>
</head>
<body>
    <h2>Registrar Nuevo Miembro</h2>

    <form action="registrar.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Edad:</label><br>
        <input type="number" name="edad" required><br><br>

        <label>Peso:</label><br>
        <input type="text" name="peso" required><br><br>

        <label>Tipo de Membresía:</label><br>
        <select name="tipo">
            <option value="oro">Oro</option>
            <option value="plata">Plata</option>
        </select><br><br>

        <label>Estado:</label><br>
        <input type="text" name="estado" value="inscrito" required><br><br>

        <button type="submit">Guardar Miembro</button>
        <a href="index.php">Cancelar y volver</a>
    </form>
</body>
</html>