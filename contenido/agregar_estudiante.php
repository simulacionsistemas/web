<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $nombre = $_POST['nombre'];
	$curso = $_POST['curso'];
	$sql = "INSERT INTO Estudiante (nombre, curso) VALUES (:nombre, :curso)";
 $stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombre);
 $stmt->bindParam(':curso', $curso);
if ($stmt->execute()) {
 echo "Estudiante agregado exitosamente.";
 } else {
 echo "Error al agregar el estudiante.";
 }
}
?>

</form>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Estudiantes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f6f8;
      padding: 30px;
	  text-align: center;
    }

    h3 {
      color: #333;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      max-width: 400px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      margin-top: 15px;
      background-color: #007BFF;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    .mensaje {
      font-weight: bold;
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
      max-width: 400px;
    }

    .mensaje.exito {
      color: #155724;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
    }

    .mensaje.error {
      color: #721c24;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>

<h3>Registro de Estudiantes</h3>
<form method="POST" action="agregar_estudiante.php">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" id="nombre" required>

  <label for="curso">Curso:</label>
  <input type="text" name="curso" id="curso" required>

  <input type="submit" value="Agregar Estudiante">
</form>

</body>
</html>