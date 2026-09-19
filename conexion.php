<?php
$servidor = "127.0.0.1";
$puerto = "3306";
$baseDatos = "personas";
$usuario = "root";
$contrasena = "";
$charset = "utf8";

try {
    // Crear conexión PDO
    $dsn = "mysql:host=$servidor;port=$puerto;dbname=$baseDatos;charset=$charset";
    $conexion = new PDO($dsn, $usuario, $contrasena);
    
    // Configurar modo de error: lanzar excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar modo de.fetch: devolver arrays asociativos
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Desactivar emulación de prepares (usar prepares nativos)
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
} catch (PDOException $e) {
    // Si hay error, mostrar mensaje y detener ejecución
    die("Error de conexión: " . $e->getMessage());
}
?>
