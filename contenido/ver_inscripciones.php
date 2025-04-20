<?php
include 'config.php';
 $sql = "SELECT e.nombre AS estudiante, m.nombre AS materia, i.fecha_inscripcion 
  FROM Inscripcion i
  JOIN Estudiante e ON i.estudiante_id = e.ID
  JOIN Materia m ON i.materia_codigo = m.codigo";
$inscripciones = $pdo->query($sql)->fetchAll();
 echo "<table border='1'>
  <tr>
 <th>Estudiante</th>
<th>Materia</th>
  <th>Fecha de Inscripción</th>
  </tr>";
foreach ($inscripciones as $inscripcion) {
  echo "<tr>
  <td>{$inscripcion['estudiante']}</td>
  <td>{$inscripcion['materia']}</td>
  <td>{$inscripcion['fecha_inscripcion']}</td>
  </tr>";
}
echo "</table>";
?>
