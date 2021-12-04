-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2021 a las 04:31:13
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `workflow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `Id` int(11) NOT NULL,
  `CodFlujo` varchar(3) DEFAULT NULL,
  `CodProceso` varchar(3) DEFAULT NULL,
  `DesProceso` varchar(200) NOT NULL,
  `CodProcesoSiguiente` varchar(3) DEFAULT NULL,
  `Estado` int(2) DEFAULT NULL,
  `Rol` varchar(2) DEFAULT NULL,
  `Pantalla` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`Id`, `CodFlujo`, `CodProceso`, `DesProceso`, `CodProcesoSiguiente`, `Estado`, `Rol`, `Pantalla`) VALUES
(1, 'F1', 'P1', 'Averiguando', 'P2', 1, 'u', 'averigua.inc.php'),
(2, 'F1', 'P2', 'Registrando candidatos', 'P3', 1, 'u', 'registra.inc.php'),
(3, 'F1', 'P3', 'Registrando frente', 'P4', 1, 'u', 'presenta.inc.php'),
(4, 'F1', 'P4', 'Pendiente de verificación', NULL, 2, 'a', 'revisa.inc.php'),
(5, 'F1', 'P5', 'Aceptado', 'P7', 0, 'a', 'agrega.inc.php'),
(6, 'F1', 'P6', 'Denegado', NULL, 0, 'a', 'error.inc.php'),
(7, 'F1', 'P7', 'Esperando Pago', 'P8', 0, 'u', 'pago.inc.php'),
(8, 'F1', 'P8', 'Trámite Pagado', NULL, 2, 'u', 'fin.inc.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujocondicional`
--

CREATE TABLE `flujocondicional` (
  `CodFlujo` varchar(3) DEFAULT NULL,
  `CodProceso` varchar(3) DEFAULT NULL,
  `Si` varchar(3) DEFAULT NULL,
  `No` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `flujocondicional`
--

INSERT INTO `flujocondicional` (`CodFlujo`, `CodProceso`, `Si`, `No`) VALUES
('F1', 'P4', 'P5', 'P6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frente`
--

CREATE TABLE `frente` (
  `IdFrente` int(11) NOT NULL,
  `IdUs` int(11) DEFAULT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Siglas` varchar(10) DEFAULT NULL,
  `Puestos` varchar(200) DEFAULT '{ "Presidente", "VicePresidente", "Secretario" }',
  `Candidatos` varchar(200) DEFAULT NULL,
  `CI` varchar(200) DEFAULT NULL,
  `Ru` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `frente`
--

INSERT INTO `frente` (`IdFrente`, `IdUs`, `Nombre`, `Siglas`, `Puestos`, `Candidatos`, `CI`, `Ru`) VALUES
(8, 1, 'Centro de estudiantes', 'CDE', '{ \"Presidente\", \"VicePresidente\", \"Secretario\" }', '[\"Carlos\",\"Veronica\",\"Barney\"]', '[\"714584\",\"4696268\",\"7878451\"]', '[\"1587545\",\"9796235\",\"1248784\"]'),
(9, 3, 'El Que Va Ganar', 'EQVG', '{ \"Presidente\", \"VicePresidente\", \"Secretario\" }', '[\"Eduardo\",\"Edgar\",\"Mauricio\"]', '[\"5465465\",\"665456\",\"6545645\"]', '[\"513213213\",\"6545456\",\"3223123\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `IdTramite` int(11) NOT NULL,
  `CodFlujo` varchar(3) DEFAULT NULL,
  `CodProceso` varchar(3) DEFAULT NULL,
  `DesProceso` varchar(200) DEFAULT NULL,
  `Startuser` varchar(20) DEFAULT NULL,
  `Currentuser` varchar(20) DEFAULT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1,
  `Comentario` varchar(200) DEFAULT NULL,
  `FechaIni` timestamp(1) NULL DEFAULT current_timestamp(1),
  `FechaFin` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`IdTramite`, `CodFlujo`, `CodProceso`, `DesProceso`, `Startuser`, `Currentuser`, `Estado`, `Comentario`, `FechaIni`, `FechaFin`) VALUES
(74, 'F1', 'P8', 'Trámite Pagado', 'Carlos', 'Carlos', 2, 'Todo está correcto', '2021-12-02 22:14:41.8', '2021-12-04 03:29:15.0'),
(75, 'F1', 'P8', 'Trámite Pagado', 'Eduardo', 'Eduardo', 2, '', '2021-12-02 22:20:08.4', '2021-12-03 11:31:45.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUser` int(11) NOT NULL,
  `User` varchar(22) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL,
  `Rol` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUser`, `User`, `Contrasena`, `Rol`) VALUES
(1, 'Carlos', '12345678', 'po'),
(2, 'Marta', '12345678', 'co'),
(3, 'Eduardo', '12345678', 'po'),
(4, 'Moises', '12345678', 'po');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `flujo`
--
ALTER TABLE `flujo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `frente`
--
ALTER TABLE `frente`
  ADD PRIMARY KEY (`IdFrente`);

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`IdTramite`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `flujo`
--
ALTER TABLE `flujo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `frente`
--
ALTER TABLE `frente`
  MODIFY `IdFrente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `IdTramite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
