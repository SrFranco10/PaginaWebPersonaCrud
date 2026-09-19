
<?php

require_once("conexion.php");

$id = $_GET['id'] ?? '';

if (empty($id)) {
    header("Location: index.php?mensaje=ID no especificado&tipo=error");
    exit;
}

$sql = "SELECT * FROM personas WHERE id = :id";

$stmt = $conexion->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

$persona = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$persona) {
    header("Location: index.php?mensaje=Persona no encontrada&tipo=error");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Persona</title>

</head>

<body>

    <h1>EDITAR PERSONA</h1>

    <hr style="border: 0; border-top: 2px solid black;">

    <!-- Enviar los datos mediante POST a editar.php -->
    <form action="editar.php" method="POST" class="formulario">

        <div class="campo">

            <label>ID</label>

            <input type="text"
                   value="<?= htmlspecialchars($persona['id']) ?>"
                   disabled>

            <!-- El ID sí se envía mediante POST -->
            <input type="hidden"
                   name="id_original"
                   value="<?= htmlspecialchars($persona['id']) ?>">

        </div>


        <div class="campo">

            <label>Nombre</label>

            <input type="text"
                   name="nombre"
                   value="<?= htmlspecialchars($persona['nombre']) ?>"
                   required>

        </div>


        <div class="campo">

            <label>Direccion</label>

            <input type="text"
                   name="direccion"
                   value="<?= htmlspecialchars($persona['direccion']) ?>"
                   required>

        </div>


        <div class="campo">

            <label>Telefono</label>

            <input type="text"
                   name="telefono"
                   value="<?= htmlspecialchars($persona['telefono']) ?>"
                   required>

        </div>


        <div class="acciones">

            <button type="submit" class="btn-actualizar">
                Actualizar
            </button>

            <a href="index.php" class="btn-cancelar">
                Cancelar
            </a>

        </div>

    </form>

</body>

</html>


<style>

    h1 {
        text-align: center;
    }

    .formulario {
        width: 500px;
        margin: 30px auto;
        padding: 25px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .campo {
        margin-bottom: 18px;
    }

    .campo label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
    }

    .campo input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .acciones {
        margin-top: 20px;
        text-align: center;
    }

    .btn-actualizar {
        background-color: green;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .btn-cancelar {
        background-color: grey;
        color: white;
        padding: 8px 15px;
        margin-left: 10px;
        border-radius: 3px;
        text-decoration: none;
    }

</style>

