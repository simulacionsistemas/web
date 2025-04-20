<?php
include 'config.php';
$estudiantes = $pdo->query("SELECT * FROM Estudiante")->fetchAll();
$materias = $pdo->query("SELECT * FROM Materia")->fetchAll();
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $estudiante_id = $_POST['estudiante_id'];
  $materia_codigo = $_POST['materia_codigo'];
  $fecha_inscripcion = $_POST['fecha_inscripcion'];
  $sql = "INSERT INTO Inscripcion (estudiante_id, materia_codigo, fecha_inscripcion) VALUES (:estudiante_id, :materia_codigo, :fecha_inscripcion)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':estudiante_id', $estudiante_id);
  $stmt->bindParam(':materia_codigo', $materia_codigo);
  $stmt->bindParam(':fecha_inscripcion', $fecha_inscripcion);
  if ($stmt->execute()) {
  echo "Estudiante inscrito exitosamente.";
 } else {
  echo "Error al inscribir al estudiante.";
  }
}
?>
 <form method="POST" action="inscribir_estudiante.php">
 Estudiante: 
  <select name="estudiante_id">
  <?php foreach ($estudiantes as $estudiante) { ?>
  <option value="<?php echo $estudiante['ID']; ?>"><?php echo $estudiante['nombre']; ?></option>
 <?php } ?>
  </select><br>
 Materia: 
  <select name="materia_codigo">
  <?php foreach ($materias as $materia) { ?>
  <option value="<?php echo $materia['codigo']; ?>"><?php echo $materia['nombre']; ?></option>
  <?php } ?>
  </select><br>
 Fecha de Inscripción: <input type="date" name="fecha_inscripcion" required><br>
 <input type="submit" value="Inscribir Estudiante">
</form>
