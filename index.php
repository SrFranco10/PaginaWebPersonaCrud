<?php
include("conexion.php");
$mensaje = $_GET['mensaje'] ?? '';
$tipo = $_GET['tipo'] ?? '';

$sql = "SELECT * FROM Personas";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>
</head>
<body>
    <h1>REGISTROS DE PERSONAS</h1>
        <a href="FormularioRegistrar.php" class=btn-registro>Registrar Persona</a>
    <hr style="border: 0; border-top: 2px solid black;">

    <table class="tabla">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($resultado)) : ?>
                <tr>
                    <td colspan="5" style="text-align:center;"> no hay personas registradas</td>
                </tr>
            <?php else : ?>
                <?php foreach ($resultado as $resultado) : ?>
                    <tr>
                        <td><?= htmlspecialchars($resultado['id'])?></td>
                        <td><?= htmlspecialchars($resultado['nombre'])?></td>
                        <td><?= htmlspecialchars($resultado['direccion'])?></td>
                        <td><?= htmlspecialchars($resultado['telefono'])?></td>
                        <td class="acciones">
                            <a href="formularioEditar.php?id=<?= urlencode($resultado['id']) ?>"class="btn-editar">Editar</a>
                            <a href="eliminar.php?id=<?= urlencode($resultado['id']) ?>"class="btn-eliminar" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
        </tbody>
    </table>

</body>
</html>

<style>
    h1{
        text-align: center;
    }

    .tabla{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td{
         padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
    }
    th{
         background-color: grey;
            color: white;
    }

    .tabla td {
    border-right: 1px solid #ddd;
    
    }
    .acciones {
    white-space: nowrap;
    }

    .btn-editar{
        background-color: blue;
        color: white;
        padding: 5px 10px;

    }

    .btn-eliminar{
        background-color: red;
        color: white;
        padding: 5px 10px;

    }
     .btn-registro{
        background-color: green;
        color: white;
        padding: 5px 10px;
        

    }

    a {
    text-decoration: none;
    }   
</style>
