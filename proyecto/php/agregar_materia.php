<?php
include 'config.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);

    if (empty($nombre)) {
        $mensaje = "⚠️ El nombre no puede estar vacío.";
    } else {
        try {
            $sql = "INSERT INTO Materia (nombre) VALUES (:nombre)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if ($stmt->execute()) {
                $mensaje = "✅ Materia agregada exitosamente.";
            } else {
                $mensaje = "❌ Error al agregar la materia.";
            }
        } catch (PDOException $e) {
            $mensaje = "⚠️ Error en la base de datos: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Materia</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(to right, #e0c3fc, #8ec5fc);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .card {
      background-color: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      width: 400px;
      text-align: center;
    }

    h2 {
      color: #2c3e50;
      margin-bottom: 20px;
    }

    label {
      display: block;
      text-align: left;
      margin-top: 15px;
      font-weight: bold;
      color: #333;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 20px;
      background-color: #9b59b6;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      width: 100%;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #8e44ad;
    }

    .mensaje {
      margin-bottom: 15px;
      padding: 10px;
      color: #155724;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      border-radius: 5px;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>📘 Registro de Materia</h2>

    <?php if (!empty($mensaje)): ?>
      <div class="mensaje <?= strpos($mensaje, '❌') !== false || strpos($mensaje, '⚠️') !== false ? 'error' : '' ?>">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <label for="nombre">Nombre del curso:</label>
      <input type="text" name="nombre" id="nombre" required>

      <button type="submit">Registrar Materia</button>
    </form>
  </div>
</body>
</html>

