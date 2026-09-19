<?php

require_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nombre = trim($_POST["nombre"] ?? '');
$direccion = trim($_POST["direccion"] ?? '');
$telefono = trim($_POST["telefono"] ?? '');

if (empty($nombre) || empty($direccion) || empty($telefono)) {
    header("Location: formularioRegistro.php?mensaje=Todos los campos son obligatorios&tipo=error");
    exit;
}

try {

    $sql = "INSERT INTO personas (nombre, direccion, telefono)
            VALUES (:nombre, :direccion, :telefono)";

    $stmt = $conexion->prepare($sql);

    $resultado = $stmt->execute([
        ':nombre' => $nombre,
        ':direccion' => $direccion,
        ':telefono' => $telefono
    ]);

    if ($resultado) {
        header("Location: index.php?mensaje=Persona registrada correctamente&tipo=exito");
    } else {
        header("Location: formularioRegistro.php?mensaje=No se pudo registrar la persona&tipo=error");
    }

    exit;

} catch (PDOException $e) {

    header("Location: formularioRegistro.php?mensaje=Error al registrar: " . urlencode($e->getMessage()) . "&tipo=error");
    exit;
}

?>

