<?php
include("conexion.php");

// Muestra el mensaje si viene de registrar.php
if(isset($_GET['msg'])) { ?>
    <div style="color: green; font-weight: bold;">
        Miembro registrado correctamente
    </div>
<?php }

$resultado = $conexion->query("SELECT * FROM miembros");
?>

<h2>Lista de Miembros</h2>

<a href="registrar.php"> + Nuevo miembro</a>

<table border="1" style="width: 100%; text-align: left; border-collapse: collapse;">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Edad</th>
    <th>Peso</th>
    <th>Tipo</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>

<?php while ($fila = $resultado->fetch_assoc()) { ?>
<tr>
    <td><?php echo $fila['id']; ?></td>
    <td><?php echo $fila['nombre']; ?></td>
    <td><?php echo $fila['edad']; ?></td>
    <td><?php echo $fila['peso']; ?></td>
    <td><?php echo $fila['tipo_membresia']; ?></td>
    <td><?php echo $fila['estado']; ?></td>
    <td>
        <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
        <a href="eliminar.php?id=<?php echo $fila['id']; ?>" 
        onclick="return confirm('¿Seguro?')">
        Eliminar
        </a>
    </td>
</tr>
<?php } ?>
</table>