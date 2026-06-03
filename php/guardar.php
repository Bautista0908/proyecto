<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// CAMBIÁ ESTOS DATOS POR LOS TUYOS
$host     = "localhost";
$usuario  = "root";
$password = "";
$base     = "proyecto utu";

$conn = new mysqli($host, $usuario, $password, $base);

if ($conn->connect_error) {
  echo json_encode(["ok" => false, "error" => "No se pudo conectar a la base de datos"]);
  exit;
}

$nombre      = $conn->real_escape_string($_POST['nombre']);
$apellido    = $conn->real_escape_string($_POST['apellido']);
$email       = $conn->real_escape_string($_POST['email']);
$telefono    = $conn->real_escape_string($_POST['telefono']);
$puesto      = $conn->real_escape_string($_POST['puesto']);
$turno       = $conn->real_escape_string($_POST['turno']);
$experiencia = $conn->real_escape_string($_POST['experiencia']);
$mensaje     = $conn->real_escape_string($_POST['mensaje']);

$sql = "INSERT INTO postulaciones 
        (nombre, apellido, email, telefono, puesto, turno, experiencia, mensaje)
        VALUES 
        ('$nombre','$apellido','$email','$telefono','$puesto','$turno','$experiencia','$mensaje')";

if ($conn->query($sql)) {
  echo json_encode(["ok" => true]);
} else {
  echo json_encode(["ok" => false, "error" => $conn->error]);
}

$conn->close();
?>