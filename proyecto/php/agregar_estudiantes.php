<?php
include 'config.php';

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $curso = trim($_POST['curso']);

    if (empty($nombre) || empty($curso)) {
        $mensaje = "Por favor, complete todos los campos.";
    } else {
        try {
            $sql = "INSERT INTO Estudiante (nombre, curso) VALUES (:nombre, :curso)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':curso', $curso);

            if ($stmt->execute()) {
                $mensaje = "✅ Estudiante registrado correctamente.";
            } else {
                $mensaje = "❌ Error al registrar el estudiante.";
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
  <title>Registro de Estudiante</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: linear-gradient(to right, #a1c4fd, #c2e9fb);
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
      background-color: #3498db;
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
      background-color: #2980b9;
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
    <h2>📘 Registro de Estudiante</h2>

    <?php if (!empty($mensaje)): ?>
      <div class="mensaje <?= strpos($mensaje, '❌') !== false || strpos($mensaje, '⚠️') !== false ? 'error' : '' ?>">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" id="nombre" required>

      <label for="curso">Curso:</label>
      <input type="text" name="curso" id="curso" required>

      <button type="submit">Registrar Estudiante</button>
    </form>
  </div>
</body>
</html>

