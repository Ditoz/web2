<?php
session_start();
require 'conexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        $error = "⚠️ Por favor, completa todos los campos.";
    } else {
        try {
            if (!isset($conn) || $conn->connect_error) {
                throw new Exception("❌ Error de conexión a la base de datos.");
            }

            $check_stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ?");
            if (!$check_stmt) {
                throw new Exception("❌ Error en la consulta: " . $conn->error);
            }

            $check_stmt->bind_param("s", $username);
            $check_stmt->execute();
            $check_stmt->store_result();

            if ($check_stmt->num_rows > 0) {
                $error = "⚠️ El usuario ya existe. Intenta con otro nombre.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Asignar rol automáticamente
                $role = ($username === 'admin') ? 'admin' : 'usuario';
                
                $stmt = $conn->prepare("INSERT INTO usuarios (username, password, role) VALUES (?, ?, ?)");
                
                if (!$stmt) {
                    throw new Exception("❌ Error en la consulta: " . $conn->error);
                }

                $stmt->bind_param("sss", $username, $hashed_password, $role);
                
                if ($stmt->execute()) {
                    $_SESSION['success'] = "✅ Usuario registrado con éxito. Inicia sesión.";
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "❌ Error al registrar usuario.";
                }
                $stmt->close();
            }
            $check_stmt->close();
        } catch (Exception $e) {
            $error = "❌ Error en la base de datos: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Buses Comerciales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="register-container">
    <div class="register-box">
        <div class="icon">
            <img src="img/user-icon.png" alt="User Icon">
        </div>
        <h2>Registro de Usuario</h2>
        <?php if (isset($error)) echo "<p class='error-msg'>" . htmlspecialchars($error) . "</p>"; ?>
        <form method="POST" action="register.php">
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Usuario" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn-register">REGISTRARSE</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</div>

</body>
</html>