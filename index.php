<?php
if (!isset($_GET['view'])) {
    $_GET['view'] = 'index';
}

?> 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="container">
            <h1 class="text-center">Sistema de Gestión de Usuarios</h1>
        </div>
    </div>

    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link <?php echo ($_GET['view'] == 'index') ? 'active' : ''; ?>" href="index.php">
                    <i class="fas fa-home"></i> Inicio
                </a>
            </li>
            <!-- to do: que solo puedan acceder a esto los admins -->
            <li class="nav-item">
                <a class="nav-link <?php echo ($_GET['view'] == 'usuario') ? 'active' : ''; ?>" href="index.php?view=usuario">
                    <i class="fas fa-users"></i> Usuarios
                </a>
            </li>
        </ul>
        
        <div class="content fade-in">
            <?php require_once 'controller/view.php'; ?>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p class="text-center mb-0">&copy; <?php echo date('Y'); ?> Sistema de Gestión de Usuarios - NoLit - Todos los derechos reservados</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>