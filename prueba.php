<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio de Arbitro</title>
<style>
  /* Estilos para el contenedor */
  body, html {
    height: 100%;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-image: url('resources/fondo_inicio.jpg'); /* URL de la imagen de fondo */
    background-size: cover; /* Cubre todo el fondo sin perder las proporciones */
    background-position: center; /* Centra la imagen en el fondo */
    font-family: Arial, sans-serif;
  }
  .container {
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8); /* Ligeramente transparente para mejor legibilidad */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 90%; /* Ajusta al tamaño de pantalla más pequeño */
    max-width: 500px; /* Máximo ancho del contenedor */
  }
  h1 {
    color: #333;
  }
  p {
    color: #666;
  }
  button {
    background-color: #4caf50;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
  }
  button:hover {
    background-color: #45a049;
  }
  input[type="text"],
  input[type="password"] {
    padding: 10px;
    margin: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: calc(100% - 22px); /* Ajusta el ancho al padding y bordes */
  }
</style>
</head>
<body>

<!-- Contenedor que centra el contenido -->
<div class="container">

  <!-- Contenido a centrar -->
  <h1>Bienvenido al inicio de sesión</h1>
  <p>¿Ya tienes una cuenta o deseas crear una?</p>
  
  <button onclick="window.location.href='http://localhost/ProyectosHTML/registro.html'">Crear cuenta</button>
  <br><br>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="usuario">Usuario:</label><br>
    <input type="text" id="usuario" name="usuario" required><br>
    <label for="contrasena">Contraseña:</label><br>
    <input type="password" id="contrasena" name="contrasena" required><br><br>
    <button type="submit">Iniciar sesión</button>
    <button onclick="window.location.href='SelectLoginTorneoTech.php'">Regresar</button>
  </form>

</div> <!-- Fin del contenedor -->

</body>
</html>
