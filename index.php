<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TechSolutions CR - Soporte</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-dark text-white p-3">
  <div class="container">
    <h1 class="h4 m-0">Sistema de Solicitudes de Soporte - TechSolutions CR</h1>
  </div>
</header>

<nav class="bg-light border-bottom">
  <div class="container py-2 d-flex gap-2">
    <a class="btn btn-outline-primary btn-sm" href="index.php">Inicio</a>
    <a class="btn btn-outline-primary btn-sm" href="solicitud.php">Nueva Solicitud</a>
    <a class="btn btn-outline-primary btn-sm" href="ver.php">Ver Solicitudes</a>
  </div>
</nav>

<main class="container py-4">
  <?php if (!empty($_SESSION['usuario'])): ?>
    <div class="alert alert-success">
      Sesión activa: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>
    </div>
  <?php else: ?>
    <div class="alert alert-info">
      No hay sesión activa. Registra una solicitud para crearla.
    </div>
  <?php endif; ?>

  <div class="row g-3">
    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="h5">¿Qué hace el sistema?</h2>
          <p class="mb-0">
            Permite registrar solicitudes de soporte técnico y verlas en una tabla.
          </p>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div class="card">
        <div class="card-body">
          <h2 class="h5">Accesos rápidos</h2>
          <div class="d-grid gap-2">
            <a class="btn btn-primary" href="solicitud.php">Crear solicitud</a>
            <a class="btn btn-secondary" href="ver.php">Ver solicitudes</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="text-center text-muted py-3 border-top">
  <small>SC-502 - Caso Práctico 1</small>
</footer>
</body>
</html>