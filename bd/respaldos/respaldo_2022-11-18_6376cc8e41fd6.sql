SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `login_2019`
--




CREATE TABLE `colonias` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la colonia',
  `nombre` varchar(100) DEFAULT NULL COMMENT 'Nombre de la colonia',
  `cp` varchar(100) DEFAULT NULL COMMENT 'Codigo postal',
  `municipio` varchar(30) DEFAULT NULL COMMENT 'Identificador del municipio',
  `estado` varchar(30) DEFAULT NULL COMMENT 'Identificador del estado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO colonias VALUES
("4","Morelos","62398","Jiutepec","Morelos"),
("6","Centro","62393","Jiutepec","Morelos"),
("7","Centro","62398","Cuernavaca","Morelos"),
("8","El empleado","62399","Cuernavaca","Morelos"),
("9","Otilio Montaño","62391","Jiutepec","Morelos");
 
 


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del usuario',
  `usuario` varchar(100) DEFAULT NULL COMMENT 'Nombre del usuario',
  `telefono` varchar(20) DEFAULT NULL COMMENT 'Telefono del usuario',
  `mail` varchar(100) DEFAULT NULL COMMENT 'Correo del usuario',
  `rol` varchar(50) DEFAULT NULL COMMENT 'Actividades que realizara el usuario',
  `id_usuario_superior` int(11) DEFAULT NULL COMMENT 'Identificador del Jefe del usuario',
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;


INSERT INTO usuarios VALUES
("2","Jhony","7775657722","colab@mail.com","Coordinador","","fe01ce2a7fbac8fafaed7c982a04e229"),
("3","Juan","7775657723","demo@mail.com","Censador","","demo"),
("10","Ronaldo","7775674557","vrick_derck@hotmail.com","Censador","","827ccb0eea8a706c4c34a16891f84e7b"),
("11","Rodrigo","7774565888","cbro172663@upemor.edu.mx","Censador","","bfd59291e825b5f2bbf1eb76569f8fe7"),
("12","Abner","7774561010","abner@mail.com","Coordinador","","d41d8cd98f00b204e9800998ecf8427e");
 
 


CREATE TABLE `viviendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la vivienda',
  `direccion` varchar(100) DEFAULT NULL COMMENT 'De que es esta hecho el piso de la vivienda',
  `cuartos` int(11) DEFAULT NULL COMMENT 'Cuartos con los que cuenta la vivienda',
  `banos` int(11) DEFAULT NULL COMMENT 'Ba?os con los que cuenta la vivienda',
  `agua` varchar(11) DEFAULT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `luz` varchar(11) DEFAULT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `internet` varchar(5) DEFAULT NULL COMMENT 'Servicios con los que cuenta la vivienda',
  `televisores` int(11) DEFAULT NULL COMMENT 'Televisores con los que cuenta la vivienda',
  `material_techo` varchar(100) DEFAULT NULL COMMENT 'Material del que esta hecho el techo de la vivienda',
  `material_piso` varchar(100) DEFAULT NULL COMMENT 'De que es esta hecho el piso de la vivienda',
  `tipo_vivienda` varchar(100) DEFAULT NULL COMMENT 'Tipo de vivienda',
  `metros_cuadrados` int(11) DEFAULT NULL COMMENT 'Area de la vivienda',
  `habitantes` varchar(100) DEFAULT NULL COMMENT 'Personas que habitan en la vivienda',
  `jardin` varchar(11) DEFAULT NULL COMMENT 'Si cuenta con jardin la vivienda',
  `id_colonias` int(11) DEFAULT NULL COMMENT 'Identificador de la colonia a la que pertenece la vivienda',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO viviendas VALUES
("1","And 128 #24","2","1","SI","SI","SI","1","CEMENTO","CEMENTO","","20","5","NO",""),
("2","Fco. Marquez #22","2","1","SI","SI","SI","1","CEMENTO","LOZA","CASA","30","5","SI",""),
("3","And 107 #102","2","1","SI","SI","SI","1","CEMENTO","CEMENTO","CASA","20","5","NO",""),
("4","Benito Juarez #130","4","2","SI","SI","SI","1","CEMENTO","CEMENTO","CASA","40","5","NO",""),
("5","Plan de Ayala #41","2","1","SI","SI","SI","1","CEMENTO","LOZA","CASA","20","5","NO",""),
("6","Calzada de los reyes #32","3","2","SI","SI","SI","1","CEMENTO","LOZA","CASA","40","5","SI",""),
("8","Miguel Aleman #33","2","1","SI","SI","SI","1","CEMENTO","CEMENTO","CASA","20","5","SI","");
 
 

 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;