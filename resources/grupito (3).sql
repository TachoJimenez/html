-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2023 a las 13:58:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `num_control` int(8) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido_pat` varchar(50) NOT NULL,
  `apellido_mat` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `num_cel` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `semestre` int(2) DEFAULT NULL,
  `carrera` varchar(50) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`num_control`, `nombre`, `apellido_pat`, `apellido_mat`, `fecha_nac`, `num_cel`, `correo`, `password`, `semestre`, `carrera`, `id_grupo`) VALUES
(20161238, 'Eric Moises', 'Leon', 'Cruz', '2002-04-29', '9511587696', '20161238@itoaxaca.edu.mx', 'Chivascampeon1.', 1, 'Ingeniería Civil', 991),
(22229922, 'Juan', 'Perez', 'Perez', '2001-01-12', '2828289909', '222222@itoaxaca.edu.mx', 'Cacahuates1.', 3, 'Ingeniería en Sistemas Computacionales', 991),
(23131231, 'Anastacio', 'Gallegos', 'jimenez', '2002-05-01', '9711774129', 'tacho@itoaxaca.edu.mx', 'TangayComotacho2002.-', 6, 'Ingeniería en Sistemas Computacionales', 991),
(41234124, 'Anastacio', 'Gallegos', 'jimenez', '2002-05-01', '9711774129', 'tacho@itoaxaca.edu.mx', 'TangayComotacho2002.-', 6, 'Ingeniería en Sistemas Computacionales', 991);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_grupos`
--

CREATE TABLE `alumnos_grupos` (
  `num_control` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos_grupos`
--

INSERT INTO `alumnos_grupos` (`num_control`, `id_grupo`) VALUES
(41234124, 990),
(41234124, 991);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amistad`
--

CREATE TABLE `amistad` (
  `id_amistad` int(11) NOT NULL,
  `num_control_alumno1` int(8) DEFAULT NULL,
  `num_control_alumno2` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(8) NOT NULL,
  `nombre_grupo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cant_integrantes` int(11) DEFAULT NULL,
  `estado` varchar(15) DEFAULT 'activo',
  `cedulaProfesional` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`, `descripcion`, `cant_integrantes`, `estado`, `cedulaProfesional`) VALUES
(990, 'Top. avanzados de programacion', 'Prueba de nuestra propia materia', 0, 'Activo', 28287628),
(991, 'Top. avanzados de programacion', 'Prueba de nuestra propia materia', 0, 'Activo', 28287628);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `cedulaProfesional` int(8) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(30) DEFAULT NULL,
  `apellidoMaterno` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `num_cel` varchar(10) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `departamento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`cedulaProfesional`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fecha_nac`, `num_cel`, `correo`, `password`, `departamento`) VALUES
(11231435, 'juanito', 'perez', 'perez', '1992-09-15', '9983329491', 'juanitooo@itoaxaca.edu.mx', 'Changos1.', 'Sistemas'),
(28287628, 'Maricarmen Monserrat', 'Velasquez', 'Hernández', '1990-05-12', '9527772812', 'mont.vel@itoaxaca.edu.mx', 'Hola123.', 'sistemas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`num_control`);

--
-- Indices de la tabla `alumnos_grupos`
--
ALTER TABLE `alumnos_grupos`
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `num_control` (`num_control`);

--
-- Indices de la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD PRIMARY KEY (`id_amistad`),
  ADD KEY `num_control_alumno1` (`num_control_alumno1`),
  ADD KEY `num_control_alumno2` (`num_control_alumno2`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `cedulaProfesional` (`cedulaProfesional`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`cedulaProfesional`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amistad`
--
ALTER TABLE `amistad`
  MODIFY `id_amistad` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_grupos`
--
ALTER TABLE `alumnos_grupos`
  ADD CONSTRAINT `alumnos_grupos_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `alumnos_grupos_ibfk_2` FOREIGN KEY (`num_control`) REFERENCES `alumnos` (`num_control`);

--
-- Filtros para la tabla `amistad`
--
ALTER TABLE `amistad`
  ADD CONSTRAINT `amistad_ibfk_1` FOREIGN KEY (`num_control_alumno1`) REFERENCES `alumnos` (`num_control`),
  ADD CONSTRAINT `amistad_ibfk_2` FOREIGN KEY (`num_control_alumno2`) REFERENCES `alumnos` (`num_control`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`cedulaProfesional`) REFERENCES `profesores` (`cedulaProfesional`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
