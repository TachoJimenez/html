<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "jimenez2002";
$dbname = "grupito";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    echo json_encode(['error' => $conn->connect_error]);
    exit;
}

$sql = "SELECT id_grupo, nombre_grupo, descripcion, estado, cedulaProfesional FROM grupos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $grupos = [];
    while($row = $result->fetch_assoc()) {
        $grupos[] = $row;
    }
    echo json_encode($grupos);
} else {
    echo json_encode([]);
}

$conn->close();
?>