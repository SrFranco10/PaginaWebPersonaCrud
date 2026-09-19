<?php
require_once 'conexion.php';
$id = $_GET['id'] ??'';

if (empty($id)) {  
    header("Location: index.php?mensaje=ID no especificado&tipo=error");
    exit;
}

try {
    $sql = "DELETE FROM personas WHERE id= :id";
    $stmt = $conexion->prepare($sql);
    $resultado = $stmt->execute([':id' => $id]);
    if ($resultado) {  
        header("Location: index.php?mensaje=Persona Eliminada Correctamente &tipo=exito");
    } else {
        header("Location: index.php?mensaje=No se pudo eliminar el cliente&tipo=error");
    }
    exit;
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        header("Location: index.php?mensaje=No se puede eliminar: el cliente tiene registros asociados&tipo=error");
    }else {
        header("Location: index.php?mensaje= Error al eliminar: ". urlencode($e->getMessage()) . "&tipo=error");
    }
    exit;

}
?>