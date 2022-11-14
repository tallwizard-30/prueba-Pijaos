-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 04:43:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-pijaos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_hospitalaria`
--

CREATE TABLE `gestion_hospitalaria` (
  `Id_hospitalizacion` int(11) NOT NULL,
  `Tipo_Doc_Paciente` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `No_Doc_Paciente` int(100) NOT NULL,
  `Cod_Hospital` int(100) NOT NULL,
  `Fecha_Ingreso` datetime DEFAULT NULL,
  `Fecha_Salida` datetime DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `Fecha_Creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitales`
--

CREATE TABLE `hospitales` (
  `Cod_Hospital` int(11) NOT NULL,
  `Nombre` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `hospitales`
--

INSERT INTO `hospitales` (`Cod_Hospital`, `Nombre`) VALUES
(123, 'pijaos sede chaparral'),
(456, 'pijaos sede principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `tipo_documento` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `NO_DOCUENTO` int(11) NOT NULL,
  `nombres` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fec_nacimiento` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `tipo_documento`, `NO_DOCUENTO`, `nombres`, `apellidos`, `fec_nacimiento`, `email`) VALUES
(9, 'TI', 12121, 'ASDAS', 'ASDSADA', '2022-11-24', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gestion_hospitalaria`
--
ALTER TABLE `gestion_hospitalaria`
  ADD PRIMARY KEY (`Id_hospitalizacion`),
  ADD KEY `No_Doc_Paciente` (`No_Doc_Paciente`,`Cod_Hospital`),
  ADD KEY `gestion_hospitalaria_ibfk_1` (`Cod_Hospital`);

--
-- Indices de la tabla `hospitales`
--
ALTER TABLE `hospitales`
  ADD PRIMARY KEY (`Cod_Hospital`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`NO_DOCUENTO`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gestion_hospitalaria`
--
ALTER TABLE `gestion_hospitalaria`
  MODIFY `Id_hospitalizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12345694;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestion_hospitalaria`
--
ALTER TABLE `gestion_hospitalaria`
  ADD CONSTRAINT `gestion_hospitalaria_ibfk_1` FOREIGN KEY (`Cod_Hospital`) REFERENCES `hospitales` (`Cod_Hospital`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gestion_hospitalaria_ibfk_2` FOREIGN KEY (`No_Doc_Paciente`) REFERENCES `pacientes` (`NO_DOCUENTO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
