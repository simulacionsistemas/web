<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nombre = $_POST['nombre'];
  $sql = "INSERT INTO Materia (nombre) VALUES (:nombre)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':nombre', $nombre);
  if ($stmt->execute()) {
    echo "<p class='mensaje exito'>Materia agregada exitosamente.</p>";
  } else {
    echo "<p class='mensaje error'>Error al agregar la materia.</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Cursos</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f4f6f8;
    }

    .contenedor {
      width: 100%;
      max-width: 450px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .logo {
      width: 100%;
      max-width: 300px;
      margin: 0 auto 20px;
    }

    h3 {
      color: #333;
      margin-top: 10px;
    }

    form {
      margin-top: 15px;
      text-align: left;
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
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    .mensaje {
      font-weight: bold;
      margin-bottom: 20px;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
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

  <div class="contenedor">
    <img src="logo.png" alt="Logo SJB" class="logo">
    <h3>Registro de cursos</h3>
    <form method="POST" action="agregar_materia.php">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" required>

      <input type="submit" value="Agregar Materia">
    </form>
  </div>

</body>
</html>
