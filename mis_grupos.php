<?php
// Obtener el número de control del alumno desde la solicitud GET
$num_control = $_GET['num_control'];

// Establecer la conexión a la base de datos (debes completar con tus propios datos de conexión)
$servername = "localhost";
$username = "root";
$password = "jimenez2002";
$dbname = "grupito";

// Crear conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los grupos a los que está unido el alumno
$sql = "SELECT g.* FROM grupos g INNER JOIN alumnos_grupos ag ON g.id_grupo = ag.id_grupo WHERE ag.num_control = '$num_control'";
$result = $conexion->query($sql);

$grupos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grupos[] = $row;
    }
}

// Devolver los grupos en formato JSON
echo json_encode($grupos);

// Cerrar la conexión
$conexion->close();
?>
