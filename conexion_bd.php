<?php
// Archivo de conexión a la base de datos

class ConexionBD {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contrasena = "jimenez2002";
    private $basededatos = "grupito";
    private $conexion;

    // Método para conectar a la base de datos
    public function conectar() {
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basededatos);
        // Verificar si la conexión se realizó correctamente
        if ($this->conexion->connect_error) {
            die("Error al conectar con la base de datos: " . $this->conexion->connect_error);
        }
    }

    // Método para obtener la conexión
    public function obtenerConexion() {
        return $this->conexion;
    }

    // Método para cerrar la conexión
    public function cerrarConexion() {
        // Verificar si la conexión está establecida antes de intentar cerrarla
        if ($this->conexion) {
            $this->conexion->close();
        }
    }

    // Método para ejecutar consultas SQL
    public function query($sql) {
        // Verificar si la conexión está establecida
        if ($this->conexion) {
            // Ejecutar la consulta SQL
            return $this->conexion->query($sql);
        } else {
            // Manejar el caso en que la conexión no esté establecida
            return false;
        }
    }
}
?>
