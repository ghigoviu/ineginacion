-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_2019`
--

create database login_2019;
use login_2019;

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `colonias` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador de la colonia',
  `nombre` varchar(100)  COMMENT 'Nombre de la colonia',
  `cp` varchar(100)  COMMENT 'Codigo postal',
  `municipio` varchar(30)  COMMENT 'Identificador del municipio',
  `estado` varchar(30)  COMMENT 'Identificador del estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador del usuario',
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del usuario',
  `telefono` varchar(20)  COMMENT 'Telefono del usuario',
  `mail` varchar(100)  COMMENT 'Correo del usuario',
  `rol` varchar(50)  COMMENT 'Actividades que realizara el usuario',
  `id_usuario_superior` int(11) COMMENT 'Identificador del Jefe del usuario',
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `viviendas` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT COMMENT 'Identificador de la vivienda',
  `direccion` varchar(100) COMMENT 'De que es esta hecho el piso de la vivienda',
  `cuartos` int(11) COMMENT 'Cuartos con los que cuenta la vivienda',
  `banos` int(11) COMMENT 'Baños con los que cuenta la vivienda',
  `agua` varchar(11) COMMENT 'Servicios con los que cuenta la vivienda',
  `luz` varchar(11) COMMENT 'Servicios con los que cuenta la vivienda',
  `internet` varchar(5) COMMENT 'Servicios con los que cuenta la vivienda',
  `televisores` int(11) COMMENT 'Televisores con los que cuenta la vivienda',
  `material_techo` varchar(100) COMMENT 'Material del que esta hecho el techo de la vivienda',
  `material_piso` varchar(100) COMMENT 'De que es esta hecho el piso de la vivienda',
  `tipo_vivienda` varchar(100) COMMENT 'Tipo de vivienda',
  `metros_cuadrados` int(11) COMMENT 'Area de la vivienda',
  `habitantes` varchar(100) COMMENT 'Personas que habitan en la vivienda',
  `jardin` varchar(11) COMMENT 'Si cuenta con jardin la vivienda',
  `id_colonias` int(11) COMMENT 'Identificador de la colonia a la que pertenece la vivienda',
  FOREIGN KEY (`id_colonias`) REFERENCES `colonias`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--  
-- Volcado de datos para la tabla `usuarios`
--    

INSERT INTO `usuarios` (`usuario`, `telefono`, `mail`, `rol`, `password`) VALUES
('admin', '7775657721', 'admin@mail.com',  'Coordinador', '827ccb0eea8a706c4c34a16891f84e7b'),
('demo', '7775657722', 'colab@mail.com',  'Censador', 'fe01ce2a7fbac8fafaed7c982a04e229');

--
-- Volcado de datos para la tabla `colonias`
-- 

INSERT INTO `colonias` (`nombre`, `cp`, `municipio`, `estado`) VALUES
('Morelos', '62398', 'Jiutepec',  'Morelos'),
('Otilio Montano', '62394', 'Jiutepec',  'Morelos'),
('Centro',  '62392', 'Jiutepec',  'Morelos'),
('Centro',  '62398', 'Cuernavaca',  'Morelos'),
('El empleado',  '62399', 'Cuernavaca',  'Morelos');

--
-- Volcado de datos para la tabla `viviendas`
-- 

--
-- Volcado de datos para la tabla `viviendas`
-- 

INSERT INTO `viviendas` (`direccion`, `cuartos`, `banos`, `agua`, `luz`, `internet`, `televisores`, 
  `material_techo`, `material_piso`, `tipo_vivienda`, `metros_cuadrados`, `habitantes`, `jardin`, `id_colonias`) VALUES
('And 127 #24', 2, 1,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'CEMENTO', 'CASA', 20, 5, 'NO', 4),
('Fco. Marquez #22', 2, 1,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'LOZA', 'CASA', 30, 5, 'SI', 6),
('And 107 #102', 2, 1,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'CEMENTO', 'CASA', 20, 5, 'NO', 8),
('Benito Juarez #130', 4, 2,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'CEMENTO', 'CASA', 40, 5, 'NO', 9),
('Plan de Ayala #41', 2, 1,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'LOZA', 'CASA',20, 5, 'NO', 4),
('Calzada de los reyes #32', 3, 2,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'LOZA', 'CASA', 40, 5, 'SI', 6),
('Degollado #88', 1, 1,  'SI', 'SI', 'SI', 1, 'LAMINA', 'CEMENTO', 'CASA', 10, 5, 'NO', 8),
('Miguel Aleman #33', 2, 1,  'SI', 'SI', 'SI', 1, 'CEMENTO', 'CEMENTO', 'CASA', 20, 5, 'SI', 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
