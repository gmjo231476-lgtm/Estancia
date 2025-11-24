SET FOREIGN_KEY_CHECKS = 0;



DROP TABLE IF EXISTS `administrador`;


CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO administrador VALUES("2","Laura","Gómez","Hernández","laurag","laura.gomez@example.com","$2y$10$LHX6dJygJNF1Bc.3JwI0kO.H2RzMSoRd101tkVv0bNlLu3v...3NS");
INSERT INTO administrador VALUES("3","Carlos","Ramírez","Torres","carlosr","carlos.ramirez@example.com","$2y$10$QvJmIwm8rosEpraYXDcn7eAveShyVPfPhNw83.Vn1BiTaM.y9H/O6");





DROP TABLE IF EXISTS `alumno`;


CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAlumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO alumno VALUES("1","Rinii","Morales","Gonzalez","Rinii","nose@gmail.com","$2y$10$s3A0nl7OvcipbNfZFeltL.1XPoBY/BXBgww5jq2NgQOL/eGz3T28.","Femenino");
INSERT INTO alumno VALUES("2","Rinii","Morales","Gonzalez","Rinii","nose@gmail.com","$2y$10$XAftFmIJvzK00zo0xFa43u5diq5v3AwnsakjxdXx2ClXFeCepPTgm","Femenino");
INSERT INTO alumno VALUES("3","Rinii","Morales","Gonzalez","Rinii","nose@gmail.com","$2y$10$jdh/22aMgeIYKFFKSUlKiuf5Avj8hTKu/Pnpc30tBjRLPkV0qAMNW","Femenino");





DROP TABLE IF EXISTS `categoria`;


CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCategoria` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `nombreCategoria` (`nombreCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categoria VALUES("1","Matemáticas","Materiales relacionados con álgebra, geometría, cálculo y otras ramas de las matemáticas.");
INSERT INTO categoria VALUES("2","Ciencias Naturales","Documentos sobre biología, química, física y ciencias del medio ambiente.");





DROP TABLE IF EXISTS `material`;


CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fechaPublicacion` date NOT NULL,
  `materia` varchar(256) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `tipo` varchar(256) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `estado` varchar(256) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idMaterial`),
  KEY `idCategoria` (`idCategoria`),
  CONSTRAINT `material_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO material VALUES("2","prueba","mal estado del libro","2025-11-04","quuimica","1","pdf","uploads/LuisLang_JuanGonzalez_JoseLabra_MariaMorales_Factibilidad01.docx.pdf","inactivo","1");





DROP TABLE IF EXISTS `profesor`;


CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `numeroEmpleado` varchar(50) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProfesor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO profesor VALUES("1","Maria","Mweq","soto","Maria","12345","progra","nose@gmail.com","$2y$10$VicpOBeFlzt9LgJcXfgqK.cgvdK4lDP415LbLIEN2UpYI9/5/gOzm");



SET FOREIGN_KEY_CHECKS = 1;
