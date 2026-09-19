<?php

require_once("conexion.php");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
    header("Location: index.php");
    exit;
}

$idOriginal = trim($_POST["id_original"]??'');
$nombre = trim($_POST["nombre"]??'');
$direccion = trim($_POST["direccion"]??'');
$telefono = trim($_POST["telefono"]??'');

if(empty($nombre)|| empty($direccion)|| empty($telefono)){
    header('Location: formularioEditar.php?id=' .urlencode($idOriginal) . "&mensaje=Todos los campos son obligatorios$tipo=error");
    exit;
}

try{
    $sql = "UPDATE personas
            SET nombre= :nombre, direccion = :direccion, telefono= :telefono
            WHERE id= :id";
            $stmt = $conexion->prepare($sql);
            $resultado = $stmt->execute([
                ':nombre' => $nombre,
                ':direccion'=> $direccion,
                ':telefono'=> $telefono,
                ':id' => $idOriginal
            ]);
            if($resultado){ 
                header('Location: index.php?mensaje=Persona Actualizado Correctamente&tipo=exito');
            }else{
                header('Location: formularioEditar.php?id= ' .urldecode($idOriginal) . "&mensaje=No se pudo actualizar la persona&tipo=error");
}
exit;
}catch(PDOException $e){
    header("Location: formularioEditar.php?id=".urldecode($idOriginal) . "&mensaje=Error al Actualizar" . urldecode($e->getMessage()) . "&tipo=error");
    exit;
}
?>