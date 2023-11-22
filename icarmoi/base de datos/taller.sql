-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2018 a las 04:10:35
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `choque`
--

CREATE TABLE `choque` (
  `id` int(11) NOT NULL,
  `choque_code` varchar(100) NOT NULL,
  `fecha_choque` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `nombre_ter` varchar(255) NOT NULL,
  `dni_ter` varchar(20) NOT NULL,
  `registro_ter` date NOT NULL,
  `domicilio_ter` varchar(255) NOT NULL,
  `localidad_ter` varchar(255) NOT NULL,
  `patente_ter` varchar(30) NOT NULL,
  `marca_modelo_ter` varchar(255) NOT NULL,
  `color_ter` varchar(255) NOT NULL,
  `seguro_ter` varchar(255) NOT NULL,
  `poliza_ter` varchar(50) NOT NULL,
  `telefono_ter` varchar(50) NOT NULL,
  `celular_ter` varchar(50) NOT NULL,
  `fecha_carga` datetime NOT NULL,
  `foto1` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `foto3` varchar(255) NOT NULL,
  `foto4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `choque`
--

INSERT INTO `choque` (`id`, `choque_code`, `fecha_choque`, `idvehiculo`, `idempleado`, `descripcion`, `nombre_ter`, `dni_ter`, `registro_ter`, `domicilio_ter`, `localidad_ter`, `patente_ter`, `marca_modelo_ter`, `color_ter`, `seguro_ter`, `poliza_ter`, `telefono_ter`, `celular_ter`, `fecha_carga`, `foto1`, `foto2`, `foto3`, `foto4`) VALUES
(1, '1', '2018-06-06', 1, 2, 'faros no funcionan', 'rayan', '432334', '2018-07-08', 'av san juan', 'colchester', '233', 'hyundai', 'black', '2332', '0054', '233445', '233', '2018-06-25 03:48:22', 'view/resources/images/1529891341_asus.jpg', 'view/resources/images/1529891352_cabezas.jpg', 'view/resources/images/1529891346_cerdo2.jpg', 'view/resources/images/1529891357_dejare este momo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `dni` varchar(80) DEFAULT NULL,
  `actividad_economica` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `dni`, `actividad_economica`, `email`, `telefono`, `imagen`) VALUES
(1, 'sistemasenoferta tutos', '', '', '', '', 'your_logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `registro` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `kind` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `dni`, `imagen`, `nombre`, `apellido`, `username`, `email`, `password`, `domicilio`, `localidad`, `telefono`, `celular`, `registro`, `status`, `kind`, `created_at`) VALUES
(1, '543434', 'view/resources/images/1529887825_user.png', 'sistemasenoferta', 'tutos', 'admin', 'admin@admin.com', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'AV SAN ANDRES', 'colchester', '9544534', '923344534', '1', 1, 0, '0000-00-00 00:00:00'),
(2, '456576', 'view/resources/images/default.png', 'Richard', 'Stallman', 'sistemasenoferta', 'sistemasenoferta@gmail.com', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'av san juan', 'silcon valley', '323445', '932344565', '3', 1, 0, '2018-06-25 03:44:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_permisos`
--

CREATE TABLE `empleado_permisos` (
  `idempleado_permiso` int(11) NOT NULL,
  `idempleado` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado_permisos`
--

INSERT INTO `empleado_permisos` (`idempleado_permiso`, `idempleado`, `idpermiso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 2, 1),
(13, 2, 2),
(14, 2, 3),
(15, 2, 4),
(16, 2, 5),
(17, 2, 6),
(18, 2, 7),
(19, 2, 8),
(20, 2, 9),
(21, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `cuit`, `estado`, `fecha_carga`) VALUES
(1, 'ibm 2', '133', 1, '2018-06-25 03:45:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'Dashboard'),
(2, 'Empleados'),
(3, 'Taller'),
(4, 'Seguro'),
(5, 'Empresa'),
(6, 'Sector'),
(7, 'Vehiculo'),
(8, 'Tarjeta'),
(9, 'Reparaciones'),
(10, 'Choque'),
(11, 'Configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id` int(11) NOT NULL,
  `fecha_repa` date NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `idtaller` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id`, `fecha_repa`, `descripcion`, `idvehiculo`, `idtaller`, `fecha_carga`) VALUES
(1, '2018-07-10', 'faros fallando', 1, 1, '2018-06-25 03:48:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`, `idempresa`, `fecha_carga`) VALUES
(1, 'informatica', 1, '2018-06-25 03:46:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro`
--

CREATE TABLE `seguro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `poliza` varchar(25) NOT NULL,
  `vencimiento` date NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguro`
--

INSERT INTO `seguro` (`id`, `nombre`, `poliza`, `vencimiento`, `fecha_carga`) VALUES
(1, 'informatica', '12', '2018-06-27', '2018-06-25 03:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cuit` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id`, `nombre`, `cuit`, `direccion`, `localidad`, `telefono`, `celular`, `estado`, `fecha_carga`) VALUES
(1, 'electronica', '22', 'av san andres', 'sillcon valley', '324354', '943546534', 1, '2018-06-25 03:45:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `vencimiento` date NOT NULL,
  `idvehiculo` int(11) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id`, `numero`, `vencimiento`, `idvehiculo`, `fecha_carga`) VALUES
(1, 'vcx346', '2018-07-10', 1, '2018-06-25 03:47:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `vehiculo_code` varchar(100) NOT NULL,
  `patente` varchar(40) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `nro_chasis` varchar(30) NOT NULL,
  `nro_motor` varchar(30) NOT NULL,
  `vto_vtv` date NOT NULL,
  `idseguro` int(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_carga` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `vehiculo_code`, `patente`, `marca`, `modelo`, `nro_chasis`, `nro_motor`, `vto_vtv`, `idseguro`, `color`, `estado`, `imagen`, `fecha_carga`) VALUES
(1, '1', '1231', 'hyundai', '21332', 'xcdds23', 'xvcvrerx3', '2018-06-30', 1, 'black', 1, 'view/resources/images/1529891236_ahorcado.jpg', '2018-06-25 03:46:37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `choque`
--
ALTER TABLE `choque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD PRIMARY KEY (`idempleado_permiso`),
  ADD KEY `idempleado` (`idempleado`),
  ADD KEY `idpermiso` (`idpermiso`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `choque`
--
ALTER TABLE `choque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  MODIFY `idempleado_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `seguro`
--
ALTER TABLE `seguro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado_permisos`
--
ALTER TABLE `empleado_permisos`
  ADD CONSTRAINT `empleado_permisos_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `empleado_permisos_ibfk_2` FOREIGN KEY (`idpermiso`) REFERENCES `permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
