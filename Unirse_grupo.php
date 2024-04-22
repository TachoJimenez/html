<?php
// Verificar si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha recibido el ID del grupo
    if (isset($_POST["grupo_id"])) {
        // Obtener el ID del grupo desde la solicitud POST
        $grupo_id = $_POST["grupo_id"];
        
        // Aquí puedes agregar la lógica para unir al alumno al grupo utilizando el $grupo_id
        
        // Por ejemplo, podrías ejecutar una consulta SQL para actualizar la tabla de alumnos
        // y agregar el ID del grupo al que el alumno se ha unido.
        
        // Ejemplo de conexión a la base de datos (ajusta los valores según tu configuración)
        $mysqli = new mysqli("localhost", "root", "jimenez2002", "grupito");
        
        // Verificar la conexión
        if($mysqli->connect_error) {
            die("Error en la conexión: " . $mysqli->connect_error);
        }
        
        // Ejemplo de consulta SQL para actualizar la tabla de alumnos
        $sql = "UPDATE alumnos SET grupo_id = $grupo_id WHERE id = {ID_DEL_ALUMNO}";
        
        // Ejecutar la consulta
        if ($mysqli->query($sql) === TRUE) {
            // La actualización fue exitosa
            echo json_encode(array("success" => true));
        } else {
            // La actualización falló
            echo json_encode(array("success" => false, "message" => "Error al intentar unir al alumno al grupo."));
        }
        
        // Cerrar la conexión
        $mysqli->close();
    } else {
        // Si no se recibió el ID del grupo en la solicitud POST
        echo json_encode(array("success" => false, "message" => "No se recibió el ID del grupo."));
    }
} else {
    // Si la solicitud no es de tipo POST
    echo json_encode(array("success" => false, "message" => "Solicitud no válida."));
}
?>
