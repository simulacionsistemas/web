<?php
include 'config.php';

$estudiantes = $pdo->query("SELECT * FROM Estudiante")->fetchAll();
$materias = $pdo->query("SELECT * FROM Materia")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $estudiante_id = $_POST['estudiante_id'];
    $materia_codigo = $_POST['materia_codigo'];
    $fecha_inscripcion = $_POST['fecha_inscripcion'];

    try {
        $sql = "INSERT INTO Inscripcion (estudiante_id, materia_codigo, fecha_inscripcion)
                VALUES (:estudiante_id, :materia_codigo, :fecha_inscripcion)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':estudiante_id', $estudiante_id);
        $stmt->bindParam(':materia_codigo', $materia_codigo);
        $stmt->bindParam(':fecha_inscripcion', $fecha_inscripcion);

        if ($stmt->execute()) {
            echo "<script>alert('Estudiante inscrito correctamente.'); window.location.href='../html/inscribir_estudiante.html';</script>";
        } else {
            echo "<script>alert('Error al inscribir al estudiante.');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

