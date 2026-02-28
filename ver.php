<?php
session_start();

$solicitudes = $_SESSION["solicitudes"] ?? [];
$msg_ok = $_SESSION["msg_ok"] ?? "";
unset($_SESSION["msg_ok"]);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ver Solicitudes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-dark text-white p-3">
  <div class="container">
    <h1 class="h4 m-0">Solicitudes Registradas</h1>
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
  <?php if ($msg_ok): ?>
    <div class="alert alert-success"><?php echo htmlspecialchars($msg_ok); ?></div>
  <?php endif; ?>

  <?php if (empty($solicitudes)): ?>
    <div class="alert alert-warning">No hay solicitudes registradas todavía.</div>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
          <tr>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Tipo</th>
            <th>Prioridad</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($solicitudes as $s): ?>
            <tr>
              <td><?php echo htmlspecialchars($s["fecha"]); ?></td>
              <td><?php echo htmlspecialchars($s["nombre"]); ?></td>
              <td><?php echo htmlspecialchars($s["departamento"]); ?></td>
              <td><?php echo htmlspecialchars($s["tipo"]); ?></td>
              <td><?php echo htmlspecialchars($s["prioridad"]); ?></td>
              <td><?php echo htmlspecialchars($s["descripcion"]); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</main>
</body>
</html>