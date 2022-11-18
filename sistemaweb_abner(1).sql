-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2022 a las 21:53:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE `colonias` (
  `id_Colonia` int(11) NOT NULL COMMENT 'Identificador de la colonia',
  `Nombre` varchar(100) NOT NULL COMMENT 'Nombre de la colonia',
  `CP` varchar(100) NOT NULL COMMENT 'Codigo postal',
  `id_municipio` int(11) NOT NULL COMMENT 'Identificador del municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`id_Colonia`, `Nombre`, `CP`, `id_municipio`) VALUES
(1, 'Porvenir', '62577', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `idEstados` int(11) NOT NULL COMMENT 'identificador del estado',
  `Nombre` varchar(100) NOT NULL COMMENT 'nombre del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`idEstados`, `Nombre`) VALUES
(1, 'Morelos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE `folios` (
  `id_PK` int(11) NOT NULL COMMENT 'identificador del folio',
  `Id_vivienda` int(11) NOT NULL COMMENT 'Identificador de la vivienda',
  `id_usuario` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `id_residente` int(11) NOT NULL COMMENT 'Identificador del residente',
  `Fecha_de_reportes` date NOT NULL COMMENT 'Fecha del dia que se realizo el reporte'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `folios`
--

INSERT INTO `folios` (`id_PK`, `Id_vivienda`, `id_usuario`, `id_residente`, `Fecha_de_reportes`) VALUES
(1, 1, 1, 1, '2022-10-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `idMunicipios` int(11) NOT NULL COMMENT 'Identificador del municipio',
  `Nombre` varchar(100) NOT NULL COMMENT 'Nombre del municipio',
  `id_estados` int(11) NOT NULL COMMENT 'Identificador del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`idMunicipios`, `Nombre`, `id_estados`) VALUES
(1, 'Jiutepec', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residente`
--

CREATE TABLE `residente` (
  `ID_RESIDENTE` int(11) NOT NULL COMMENT 'Identificador del residente',
  `Nombre` varchar(100) NOT NULL COMMENT 'nombre del residente',
  `FechaNacimiento` date NOT NULL COMMENT 'fecha de nacimiento del residente',
  `Correo` varchar(100) NOT NULL COMMENT 'Correo del residente',
  `Telefono` varchar(100) NOT NULL COMMENT 'telefono del residente',
  `id_vivienda` varchar(100) NOT NULL COMMENT 'identificador de la vivienda del residente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `residente`
--

INSERT INTO `residente` (`ID_RESIDENTE`, `Nombre`, `FechaNacimiento`, `Correo`, `Telefono`, `id_vivienda`) VALUES
(1, 'abdal', '1992-03-20', 'nfhjfhdhdhdh', '44455', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_Roles` int(11) NOT NULL COMMENT 'identificador del rol',
  `Descripcion` varchar(100) NOT NULL COMMENT 'Descripcion del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_Roles`, `Descripcion`) VALUES
(1, 'DAR DE ALTA USUARIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL COMMENT 'Identificador del usuario',
  `Nombre` varchar(100) NOT NULL COMMENT 'Nombre del usuario',
  `Telefono` varchar(100) NOT NULL COMMENT 'Telefono del usuario',
  `Correo` varchar(100) NOT NULL COMMENT 'Correo del usuario',
  `id_Roles` int(11) NOT NULL COMMENT 'Actividades que realizara el usuario',
  `id_usuario_superior` int(11) NOT NULL COMMENT 'Identificador del Jefe del usuario',
  `id_contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `Nombre`, `Telefono`, `Correo`, `id_Roles`, `id_usuario_superior`, `id_contraseña`) VALUES
(1, 'Abner', '7777', 'abnerkk', 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

CREATE TABLE `viviendas` (
  `id_Viviendas` int(11) NOT NULL COMMENT 'identificador de la vivienda',
  `Cuartos` int(11) NOT NULL COMMENT 'Cuartos con los que cuenta la vivienda',
  `Baños` int(11) NOT NULL COMMENT 'Baños con los que cuenta la vivienda',
  `Agua` tinyint(1) NOT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `Luz` tinyint(1) NOT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `Internet` tinyint(1) NOT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `Televisores` int(11) NOT NULL COMMENT 'Televisores con los que cuenta la vivienda',
  `Material del techo` varchar(100) NOT NULL COMMENT 'Material del que esta hecho el techo de la vivienda',
  `Material del piso` varchar(100) NOT NULL COMMENT 'De que es esta hecho el piso de la vivienda',
  `Tipo` varchar(100) NOT NULL COMMENT 'Tipo de vivienda',
  `Metros_cuadrados` int(11) NOT NULL COMMENT 'Area de la vivienda',
  `habitantes` varchar(100) NOT NULL COMMENT 'Personas que habitan en la vivienda',
  `Jardin` int(11) NOT NULL COMMENT 'Si cuenta con jardin la vivienda',
  `id_colonias` int(11) NOT NULL COMMENT 'identificador de la colonia a la que pertenece la vivienda'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`id_Viviendas`, `Cuartos`, `Baños`, `Agua`, `Luz`, `Internet`, `Televisores`, `Material del techo`, `Material del piso`, `Tipo`, `Metros_cuadrados`, `habitantes`, `Jardin`, `id_colonias`) VALUES
(1, 4, 4, 1, 1, 1, 2, 'Loza', 'Tierra', 'Casa', 100, '4', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD PRIMARY KEY (`id_Colonia`),
  ADD KEY `colonias_FK` (`id_municipio`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`idEstados`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
  ADD PRIMARY KEY (`id_PK`),
  ADD KEY `folios_FK` (`id_usuario`),
  ADD KEY `folios_FK_1` (`Id_vivienda`),
  ADD KEY `folios_FK_2` (`id_residente`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`idMunicipios`),
  ADD KEY `municipios_FK` (`id_estados`);

--
-- Indices de la tabla `residente`
--
ALTER TABLE `residente`
  ADD PRIMARY KEY (`ID_RESIDENTE`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_Roles`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `usuario_FK` (`id_Roles`);

--
-- Indices de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD PRIMARY KEY (`id_Viviendas`),
  ADD KEY `viviendas_FK` (`id_colonias`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colonias`
--
ALTER TABLE `colonias`
  MODIFY `id_Colonia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la colonia', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `idEstados` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del estado', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `folios`
--
ALTER TABLE `folios`
  MODIFY `id_PK` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del folio', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `idMunicipios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del municipio', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `residente`
--
ALTER TABLE `residente`
  MODIFY `ID_RESIDENTE` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del residente', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_Roles` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador del rol', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del usuario', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  MODIFY `id_Viviendas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la vivienda', AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colonias`
--
ALTER TABLE `colonias`
  ADD CONSTRAINT `colonias_FK` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`idMunicipios`);

--
-- Filtros para la tabla `folios`
--
ALTER TABLE `folios`
  ADD CONSTRAINT `folios_FK` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `folios_FK_1` FOREIGN KEY (`Id_vivienda`) REFERENCES `viviendas` (`id_Viviendas`),
  ADD CONSTRAINT `folios_FK_2` FOREIGN KEY (`id_residente`) REFERENCES `residente` (`ID_RESIDENTE`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_FK` FOREIGN KEY (`id_estados`) REFERENCES `estados` (`idEstados`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_FK` FOREIGN KEY (`id_Roles`) REFERENCES `roles` (`id_Roles`);

--
-- Filtros para la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD CONSTRAINT `viviendas_FK` FOREIGN KEY (`id_colonias`) REFERENCES `colonias` (`id_Colonia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
