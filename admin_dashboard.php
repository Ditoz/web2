<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
</head>
<body>
    <h1>Bienvenido, Administrador</h1>
    <p>Aquí puedes gestionar usuarios, buses, rutas, etc.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
