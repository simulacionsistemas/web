<?php
include 'config.php';

$sql = "SELECT e.nombre AS estudiante, m.nombre AS materia, i.fecha_inscripcion
        FROM Inscripcion i
        JOIN Estudiante e ON i.estudiante_id = e.ID
        JOIN Materia m ON i.materia_codigo = m.codigo";
$inscripciones = $pdo->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ver Inscripciones</title>
  <link rel="stylesheet" href="../css/ver_inscripciones.css">
</head>
<body>
  <main>
    <div class="card">
      <h2>📋 Lista de Inscripciones</h2>
      <table>
        <thead>
          <tr>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Fecha de Inscripción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($inscripciones as $inscripcion): ?>
            <tr>
              <td><?= htmlspecialchars($inscripcion['estudiante']) ?></td>
              <td><?= htmlspecialchars($inscripcion['materia']) ?></td>
              <td><?= htmlspecialchars($inscripcion['fecha_inscripcion']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>

