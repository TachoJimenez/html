<?php
// Conexión a la base de datos (modifica estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "jimenez2002";
$dbname = "grupito";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el correo por GET
if (isset($_GET['correo'])) {
    // Obtener el correo del GET
    $correo = $_GET['correo'];

    // Consultar la tabla de profesores
    $sql = "SELECT * FROM profesores WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // El correo pertenece a un profesor
        echo "profesor";
    } else {
        // Consultar la tabla de alumnos
        $sql = "SELECT * FROM alumnos WHERE correo = '$correo'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El correo pertenece a un alumno
            echo "alumno";
        } else {
            // El correo no se encontró en ninguna tabla
            echo "error";
        }
    }
} else {
    // No se proporcionó un correo
    echo "error";
}

// Cerrar conexión
$conn->close();
?>
