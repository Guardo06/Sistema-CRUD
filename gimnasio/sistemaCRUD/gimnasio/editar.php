<?php
include("conexion.php");

$id = $_GET['id'];
$error = "";

if ($_POST) {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

    if (empty($nombre) || empty($edad) || empty($peso) || empty($tipo) || empty($estado)) {
        $error = "Todos los campos son obligatorios";
    } elseif (!is_numeric($edad) || $edad <= 0) {
        $error = "Edad inválida";
    } elseif (!is_numeric($peso) || $peso <= 0) {
        $error = "Peso inválido";
    } else {

        $sql = "UPDATE miembros SET
                nombre= '$nombre',
                edad= '$edad',
                peso= '$peso',
                tipo_membresia= '$tipo',
                estado= '$estado'
                WHERE id= $id";

        $conexion->query($sql);
        header("Location:index.php");
    }
}

$resultado = $conexion->query("SELECT * FROM miembros WHERE id=$id");
$fila = $resultado->fetch_assoc();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Editar Miembro</h2>

    <?php if ($error != "") { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="mb-2">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $fila['nombre']; ?>" required>
        </div>

        <div class="mb-2">
            <label>Edad</label>
            <input type="number" name="edad" class="form-control" value="<?php echo $fila['edad']; ?>" required>
        </div>

        <div class="mb-2">
            <label>Peso</label>
            <input type="text" name="peso" class="form-control" value="<?php echo $fila['peso']; ?>" required>
        </div>

        <div class="mb-2">
            <label>Tipo</label>
            <input type="text" name="tipo" class="form-control" value="<?php echo $fila['tipo_membresia']; ?>" required>
        </div>

        <div class="mb-2">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" value="<?php echo $fila['estado']; ?>" required>
        </div>

        <button type="submit" class="btn btn-warning">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>