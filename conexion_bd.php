<?php
// Habilitar informes de errores para MySQL (modo desarrollo)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host = "localhost";  // No es necesario ":3306" a menos que uses otro puerto
$usuario = "root";
$clave = ""; // Si cambiaste la clave en MySQL, ponla aquí
$bd = "usuario"; // Asegúrate de que la base de datos existe

try {
    // Crear conexión con MySQLi
    $conn = new mysqli($host, $usuario, $clave, $bd);

    // Establecer codificación de caracteres UTF-8
    $conn->set_charset("utf8");

} catch (Exception $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>
