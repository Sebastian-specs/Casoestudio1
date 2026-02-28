<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nueva Solicitud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <script>
    function validarFormulario(e) {
      const nombre = document.getElementById("nombre").value.trim();
      const depto = document.getElementById("departamento").value.trim();
      const tipo = document.querySelector('input[name="tipo"]:checked');
      const desc = document.getElementById("descripcion").value.trim();
      const prioridad = document.getElementById("prioridad").value.trim();

      let errores = [];

      if (nombre === "") errores.push("El nombre es obligatorio.");
      if (depto === "") errores.push("Seleccione un departamento.");
      if (!tipo) errores.push("Seleccione el tipo de problema.");
      if (desc.length < 20) errores.push("La descripción debe tener mínimo 20 caracteres.");
      if (prioridad === "") errores.push("Seleccione una prioridad.");

      const cont = document.getElementById("alertas");
      cont.innerHTML = "";

      if (errores.length > 0) {
        e.preventDefault();
        cont.innerHTML = `
          <div class="alert alert-danger">
            <strong>Corrige esto:</strong>
            <ul class="mb-0">${errores.map(x => `<li>${x}</li>`).join("")}</ul>
          </div>
        `;
        return false;
      }
      return true;
    }
  </script>
</head>
<body>

<header class="bg-dark text-white p-3">
  <div class="container">
    <h1 class="h4 m-0">Nueva Solicitud</h1>
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
  <div id="alertas"></div>

  <form class="card p-3" method="POST" action="procesar.php" onsubmit="validarFormulario(event)">
    <div class="row g-3">
      <div class="col-12 col-md-6">
        <label class="form-label">Nombre del colaborador</label>
        <input class="form-control" type="text" id="nombre" name="nombre" required>
      </div>

      <div class="col-12 col-md-6">
        <label class="form-label">Departamento</label>
        <select class="form-select" id="departamento" name="departamento" required>
          <option value="">-- Seleccione --</option>
          <option>TI</option>
          <option>RRHH</option>
          <option>Finanzas</option>
          <option>Operaciones</option>
        </select>
      </div>

      <div class="col-12">
        <label class="form-label">Tipo de problema</label>
        <div class="d-flex gap-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="hardware" value="Hardware">
            <label class="form-check-label" for="hardware">Hardware</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="software" value="Software">
            <label class="form-check-label" for="software">Software</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="tipo" id="red" value="Red">
            <label class="form-check-label" for="red">Red</label>
          </div>
        </div>
      </div>

      <div class="col-12">
        <label class="form-label">Descripción del problema</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
        <div class="form-text">Mínimo 20 caracteres.</div>
      </div>

      <div class="col-12 col-md-6">
        <label class="form-label">Prioridad</label>
        <select class="form-select" id="prioridad" name="prioridad" required>
          <option value="">-- Seleccione --</option>
          <option>Alta</option>
          <option>Media</option>
          <option>Baja</option>
        </select>
      </div>

      <div class="col-12 d-flex gap-2">
        <button class="btn btn-success" type="submit">Enviar Solicitud</button>
        <a class="btn btn-secondary" href="index.php">Cancelar</a>
      </div>
    </div>
  </form>
</main>
</body>
</html>