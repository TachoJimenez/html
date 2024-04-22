<?php
// Archivo para verificar el tipo de usuario (profesor o alumno) y autenticar

include 'conexion_bd.php'; // Incluye el archivo de conexión a la base de datos.

// Obtiene el correo y la contraseña del usuario desde la solicitud GET
$correo = $_GET['correo'];
$password = $_GET['password']; // Asegúrate de enviar esto desde el cliente

// Crea una instancia de la clase ConexionBD.
$conexionBD = new ConexionBD();

// Conecta a la base de datos.
$conexionBD->conectar();

// Prepara la consulta SQL para evitar inyección SQL
$stmt = $conexionBD->obtenerConexion()->prepare("SELECT tipo_usuario, password FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Verifica la contraseña
    if (password_verify($password, $row['password'])) {
        // Contraseña correcta
        echo $row['tipo_usuario']; // 'profesor' o 'alumno'
    } else {
        // Contraseña incorrecta
        echo 'invalido';
    }
} else {
    // No se encontró el usuario
    echo 'invalido';
}

// Cierra la sentencia y la conexión
$stmt->close();
$conexionBD->cerrarConexion();
?>