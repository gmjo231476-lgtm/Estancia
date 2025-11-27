-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2025 a las 02:00:52
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `repositorios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `correo`, `pass`) VALUES
(3, 'Carlos', 'Ramírez', 'Torres', 'carlosr', 'carlos.ramirez@example.com', '$2y$10$QvJmIwm8rosEpraYXDcn7eAveShyVPfPhNw83.Vn1BiTaM.y9H/O6'),
(5, 'Tadeo  And', 'Morales', 'Soto', 'tade', 'tadeo@gmail.com', '$2y$10$UB8WXoWHQVtpP73cxYmCwOEJVqYBEoiCHc/Hq02k3M7V7r5KXeThy'),
(6, 'Angeles', 'Morales', 'soto', 'Angeles', 'Angi@mail.com', '$2y$10$TqKXgk1n.yTeRYPjaNZqIeF.jYM/3nbb255dKYnvNeme5lIoV2NEK'),
(8, 'Ernesto', 'Lopez', 'Perez', 'Ernesto', 'ernes@gmail.com', '$2y$10$Z0e4DrCBfZKHGyxyYpddTOEc4tw7lwvBV25/VRCfX9gSdR.h2mNkC'),
(9, 'Julio', 'Méndez', 'Soto', 'jmendez', 'julio.mendez@example.com', 'Jms#445'),
(10, 'Patricia', 'Luna', 'García', 'pluna', 'patricia.luna@example.com', 'Plg$909'),
(11, 'Marco', 'Cruz', 'Ortega', 'mcruz', 'marco.cruz@example.com', 'McO_102'),
(12, 'Sandra', 'Núñez', 'Flores', 'snunez', 'sandra.nunez@example.com', 'SnF2025*'),
(13, 'Héctor', 'Vega', 'Ríos', 'hvega', 'hector.vega@example.com', 'HvR!390');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idAlumno` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `correo`, `pass`, `genero`) VALUES
(4, 'Cintya', 'Fernandez', 'Sanche', 'Cintya', 'cintya@gmail.com', '$2y$10$DSGt4fNDdiLT4koRZtOM0eJS3D2qP9f1zxUMxUPgBFYR67lN3fUx2', 'Femenino'),
(6, 'Maria', 'morales', 'soto', 'Maria', 'nose@gmail.com', '$2y$10$r2tEdi/YE3PRb.f7cOKpa.JfZIZO.eL9ce0eBL9NGrNq5OxoKZUwO', 'Femenino'),
(11, 'Laura', 'Benitez', 'Alvarado', 'Laura', 'balo201234@upemor.edu.mx', '$2y$10$tvxwBDJNJsRhS8VPLxjY0uRL5tKpDy2zTHb5NSfJlyh673zvknCsO', 'Femenino'),
(12, 'Luis', 'Gómez', 'Ramírez', 'lgomez', 'luis.gomez@example.com', 'Lgrm2024$', 'Masculino'),
(13, 'Ana', 'López', 'Martínez', 'alopez', 'ana.lopez@example.com', 'Alopez#81', 'Femenino'),
(14, 'Carlos', 'Hernández', 'Soto', 'chernandez', 'carlos.hz@example.com', 'Chs!9043', 'Masculino'),
(15, 'María', 'Torres', 'García', 'mtorres', 'maria.torres@example.com', 'MTg*1452', 'Femenino'),
(16, 'Pedro', 'Vargas', 'Nava', 'pvargas', 'pedro.vargas@example.com', 'PvN@2981', 'Masculino'),
(17, 'Elena', 'Ruiz', 'Castro', 'eruiz', 'elena.ruiz@example.com', 'Erc2025&', 'Femenino'),
(18, 'Diego', 'Flores', 'Cano', 'dflores', 'diego.flores@example.com', 'DfC-5521', 'Otro'),
(19, 'Lucía', 'Ramos', 'Mejía', 'lramos', 'lucia.ramos@example.com', 'Lrm!9090', 'Otro'),
(20, 'Jorge', 'Santos', 'Reyes', 'jsantos', 'jorge.santos@example.com', 'JsR334*', 'Masculino'),
(21, 'Paola', 'Ortiz', 'Luna', 'portiz', 'paola.ortiz@example.com', 'Pol-8812', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `puntuacion` tinyint(4) NOT NULL CHECK (`puntuacion` between 1 and 5),
  `comentario` text DEFAULT NULL,
  `idMaterial` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `descripcion`) VALUES
(1, 'Matemáticas', 'Materiales relacionados con álgebra, geometría, cálculo y otras ramas de las matemáticas.'),
(2, 'Ciencias Naturales', 'Documentos sobre biología, química, física y ciencias del medio ambiente.'),
(3, 'Programación', 'Material de programación (códigos)'),
(4, 'Valor', 'Valores que se aplican en UPEMOR'),
(15, 'Física', 'Material sobre mecánica, electricidad y óptica'),
(16, 'Redes', 'Recursos sobre comunicación de datos y protocolos'),
(17, 'Base de Datos', 'Guías y prácticas SQL y modelado'),
(18, 'Electrónica', 'Componentes, diagramas y prácticas'),
(19, 'IA', 'Material sobre inteligencia artificial y machine learning'),
(20, 'Sistemas Operativos', 'Conceptos y prácticas de SO'),
(21, 'Programación Web', 'HTML, CSS, JS y frameworks'),
(22, 'Ciberseguridad', 'Recursos de auditoría, ataques y defensa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fechaPublicacion` date NOT NULL,
  `materia` varchar(256) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `tipo` varchar(256) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `estado` varchar(256) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idMaterial`, `titulo`, `descripcion`, `fechaPublicacion`, `materia`, `cuatrimestre`, `tipo`, `archivo`, `estado`, `idCategoria`) VALUES
(2, 'prueba', 'mal estado del libro', '2025-11-04', 'quuimica', 1, 'pdf', 'uploads/LuisLang_JuanGonzalez_JoseLabra_MariaMorales_Factibilidad01.docx.pdf', 'rechazado', 1),
(3, 'prueba', 'Matematicas basicas para la profra', '2025-11-04', 'wrewr', 1, 'pdf', 'uploads/4D_EI_Morales_María.docx', 'aprobado', 1),
(4, 'libro', 'libro de mate', '2025-11-20', 'programacion', 5, 'docx', 'uploads/portada.docx', 'pendiente', 1),
(5, 'libro1', 'Matematicas basicas para la profra', '2025-11-01', 'mate', 6, 'docx', 'uploads/portada (1).docx', 'pendiente', 1),
(6, 'libro1', 'Matematicas basicas para la profra', '2025-11-01', 'mate', 6, 'docx', 'uploads/portada (1).docx', 'pendiente', 1),
(7, 'Introduccion a Programacion', 'Documento PDF que contiene los fundamentos básicos de programación estructurada.', '2025-11-18', 'Programación I', 1, 'PDF', 'uploads/Programacion_1.pdf', 'rechazado', 1),
(8, 'Guía de Álgebra', 'Documento PDF con ejercicios y ejemplos de álgebra básica', '2025-11-22', 'Algebra', 3, 'pdf', 'uploads/EP03_D_JuanGonzalez_MariaMorales.pdf', 'pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `numeroEmpleado` varchar(50) NOT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `nombre`, `apellidoP`, `apellidoM`, `usuario`, `numeroEmpleado`, `especialidad`, `correo`, `pass`) VALUES
(1, 'Maria', 'Mweq', 'soto', 'Maria', '12345', 'progra', 'nose@gmail.com', '$2y$10$VicpOBeFlzt9LgJcXfgqK.cgvdK4lDP415LbLIEN2UpYI9/5/gOzm'),
(2, 'Mateo', 'Morales', 'Soto', 'Mateo', '12789', 'Algebra', 'mate@gmail.com', '$2y$10$O/Y1ITJxd56x4zR8RlrjweA8wePwoovfOwFjLOdDPuKhtBqFq5r9y'),
(4, 'Juan', 'Gonzalez', 'Martinez', 'Juan', '162', 'Matemáticas', 'juan@upemor.edu.mx', '$2y$10$aiLjbiG4B1XqIji5g.gd8.4AS7x0p6kT3M9iwZxFkrfYZxdoYriuu'),
(5, 'Irma', 'Hernandez', 'Gervacio', 'Irma', '123456', 'Electricidad', 'ir23098@upemor.edu.mx', '$2y$10$BZsqAMbvGyQsRI8k7ozTGOPq.tgE5Lr0Grym4970q868BLleayj1O'),
(6, 'Roberto', 'Cano', 'Medina', 'rcano', '1001', 'Matemáticas', 'roberto.cano@example.com', 'Rcm$2025'),
(7, 'Laura', 'Gómez', 'Sosa', 'lgomezp', '1002', 'Programación', 'laura.gomez@example.com', 'LGs!742'),
(8, 'Francisco', 'Ríos', 'Trujillo', 'frios', '1003', 'Base de Datos', 'francisco.rios@example.com', 'FrT%920'),
(9, 'Beatriz', 'Reyes', 'Hernández', 'breyes', '1004', 'Redes', 'beatriz.reyes@example.com', 'BrH834#'),
(10, 'Miguel', 'Pérez', 'Loera', 'mperez', '1005', 'IA', 'miguel.perez@example.com', 'MpL*667'),
(11, 'Silvia', 'Castañeda', 'Mora', 'scastaneda', '1006', 'Física', 'silvia.mora@example.com', 'ScM_552'),
(12, 'Omar', 'Ramírez', 'Solís', 'oramirez', '1007', 'Electrónica', 'omar.ramirez@example.com', 'OrS002!'),
(13, 'Daniela', 'Juárez', 'Ruiz', 'djuarez', '1008', 'Programación Web', 'daniela.juarez@example.com', 'DjR**91'),
(14, 'Ricardo', 'Mena', 'Sánchez', 'rmena', '1009', 'Álgebra', 'ricardo.mena@example.com', 'RmS312_'),
(15, 'Sofía', 'Arias', 'Torres', 'sarias', '1010', 'Sistemas Operativos', 'sofia.arias@example.com', 'SaT!567');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `idMaterial` (`idMaterial`),
  ADD KEY `idAlumno` (`idAlumno`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `nombreCategoria` (`nombreCategoria`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idMaterial`) REFERENCES `material` (`idMaterial`),
  ADD CONSTRAINT `calificacion_ibfk_2` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
