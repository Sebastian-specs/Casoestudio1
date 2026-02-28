<?php
session_start();

// Evitar acceso directo sin POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
  header("Location: solicitud.php");
  exit;
}

// Capturar y limpiar
$nombre = trim($_POST["nombre"] ?? "");
$departamento = trim($_POST["departamento"] ?? "");
$tipo = trim($_POST["tipo"] ?? "");
$descripcion = trim($_POST["descripcion"] ?? "");
$prioridad = trim($_POST["prioridad"] ?? "");

// Validación PHP (por si JS falla)
$errores = [];

if ($nombre === "") $errores[] = "El nombre es obligatorio.";
if ($departamento === "") $errores[] = "El departamento es obligatorio.";
if ($tipo === "") $errores[] = "El tipo de problema es obligatorio.";
if (strlen($descripcion) < 20) $errores[] = "La descripción debe tener mínimo 20 caracteres.";
if ($prioridad === "") $errores[] = "La prioridad es obligatoria.";

if (count($errores) > 0) {
  $_SESSION["errores"] = $errores;
  header("Location: solicitud.php");
  exit;
}

// Arreglo asociativo de la solicitud
$solicitud = [
  "nombre" => $nombre,
  "departamento" => $departamento,
  "tipo" => $tipo,
  "descripcion" => $descripcion,
  "prioridad" => $prioridad,
  "fecha" => date("Y-m-d H:i:s")
];

// Guardar temporalmente en sesión (lista)
if (!isset($_SESSION["solicitudes"])) {
  $_SESSION["solicitudes"] = [];
}
$_SESSION["solicitudes"][] = $solicitud;

// Crear sesión usuario (requerido)
$_SESSION["usuario"] = $nombre;

// Mensaje de confirmación
$_SESSION["msg_ok"] = "Solicitud registrada correctamente";

header("Location: ver.php");
exit;