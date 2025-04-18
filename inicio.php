<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Obtener el nombre del usuario
$usuario = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio - Buses Comerciales</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .carousel-item img {
            object-fit: cover;
            height: 75vh;
        }
        .jumbotron {
            background: linear-gradient(to right, #007bff, #00d4ff);
            color: white;
        }
    </style>
</head>
<body>
    
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Página</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Servicios</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
                    <li class="nav-item">
                        <a class="nav-link text-warning">👤 <?php echo htmlspecialchars($usuario); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Carrusel -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/bus.png" class="d-block w-100" alt="Imagen 1">
                <div class="carousel-caption">
                    <h3>Bienvenido, <?php echo htmlspecialchars($usuario); ?> 🎉</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/bus_1.png" class="d-block w-100" alt="Imagen 2">
                <div class="carousel-caption">
                    <h3>Servicios de Calidad</h3>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    
    <!-- Jumbotron -->
    <div class="jumbotron text-center py-5">
        <h1>Descubre más con nosotros</h1>
        <p>Servicios personalizados para ti.</p>
        <a class="btn btn-light btn-lg" href="#" role="button">Ver más</a>
    </div>
    
    <!-- Formulario -->
    <div class="container py-5">
        <h3>Contacto</h3>
        <form>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Nombre">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Apellido">
                </div>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
    
    <!-- Pie de página -->
    <footer class="bg-dark text-light text-center py-3 mt-4">
        <p>&copy; 2025 Mi Página. Todos los derechos reservados.</p>
    </footer>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
