-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-08-2020 a las 18:02:28
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `horario_normal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_bloque_h`
--

DROP TABLE IF EXISTS `asigna_bloque_h`;
CREATE TABLE IF NOT EXISTS `asigna_bloque_h` (
  `id_asigna_bh` int(11) NOT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `id_bloque_h` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asigna_bh`),
  KEY `o_idx` (`id_dia`),
  KEY `u_idx` (`id_bloque_h`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna_bloque_h`
--

INSERT INTO `asigna_bloque_h` (`id_asigna_bh`, `id_dia`, `id_bloque_h`) VALUES
(200, 1, 40),
(201, 1, 41),
(202, 1, 42),
(203, 1, 43),
(204, 1, 44),
(205, 1, 45),
(206, 1, 46),
(207, 1, 47),
(208, 1, 48),
(209, 1, 49),
(210, 2, 40),
(211, 2, 41),
(212, 2, 42),
(213, 2, 43),
(214, 2, 44),
(215, 2, 45),
(216, 2, 46),
(217, 2, 47),
(218, 2, 48),
(219, 2, 49),
(220, 3, 40),
(221, 3, 41),
(222, 3, 42),
(223, 3, 43),
(224, 3, 44),
(225, 3, 45),
(226, 3, 46),
(227, 3, 47),
(228, 3, 48),
(229, 3, 49),
(230, 4, 40),
(231, 4, 41),
(232, 4, 42),
(233, 4, 43),
(234, 4, 44),
(235, 4, 45),
(236, 4, 46),
(237, 4, 47),
(238, 4, 48),
(239, 4, 49),
(240, 5, 40),
(241, 5, 41),
(242, 5, 42),
(243, 5, 43),
(244, 5, 44),
(245, 5, 45),
(246, 5, 46),
(247, 5, 47),
(248, 5, 48),
(249, 5, 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_horario`
--

DROP TABLE IF EXISTS `asigna_horario`;
CREATE TABLE IF NOT EXISTS `asigna_horario` (
  `id_asigna_h` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asigna_h`),
  KEY `carrera_idx` (`id_carrera`),
  KEY `semestre_idx` (`id_semestre`),
  KEY `periodo` (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna_horario`
--

INSERT INTO `asigna_horario` (`id_asigna_h`, `id_periodo`, `id_carrera`, `id_semestre`) VALUES
(135, 80, 31, 11),
(136, 81, 31, 11),
(137, 80, 32, 11),
(138, 80, 32, 12),
(139, 80, 31, 12),
(140, 80, 31, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_materias`
--

DROP TABLE IF EXISTS `asigna_materias`;
CREATE TABLE IF NOT EXISTS `asigna_materias` (
  `id_asigna_m` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_asigna_p` int(11) DEFAULT NULL,
  `id_asigna_h` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asigna_m`),
  KEY `materia_idx` (`id_materia`),
  KEY `docente_idx` (`id_docente`),
  KEY `pertenece_p` (`id_asigna_p`),
  KEY `sesion` (`id_asigna_h`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna_materias`
--

INSERT INTO `asigna_materias` (`id_asigna_m`, `id_materia`, `id_docente`, `id_asigna_p`, `id_asigna_h`) VALUES
(77, 302, 512, NULL, 136),
(78, 300, 507, NULL, 136),
(79, 351, 507, NULL, 138),
(80, 307, 507, NULL, 139),
(81, 305, 507, NULL, 135),
(82, 305, 507, NULL, 135),
(83, 344, 507, NULL, 137),
(84, 345, 512, NULL, 137),
(85, 300, 507, NULL, 135),
(86, 300, 507, NULL, 135);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_plantillas`
--

DROP TABLE IF EXISTS `asigna_plantillas`;
CREATE TABLE IF NOT EXISTS `asigna_plantillas` (
  `id_asigna_p` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) DEFAULT NULL,
  `id_plantilla` int(11) DEFAULT NULL,
  `id_asigna_h` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asigna_p`),
  KEY `necesita_idx` (`id_docente`),
  KEY `as_h_idx` (`id_asigna_h`),
  KEY `plantillas` (`id_plantilla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id_aulas` int(11) NOT NULL,
  `des_aula` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_aulas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aulas`, `des_aula`) VALUES
(21, 'Aula 1'),
(22, 'Aula 2'),
(23, 'Aula 3'),
(24, 'Aula 4	'),
(25, 'Aula 5	'),
(26, 'Aula 6	'),
(27, 'Aula 7	'),
(28, 'Aula 8	'),
(29, 'Aula 9	'),
(30, 'Aula 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques_h`
--

DROP TABLE IF EXISTS `bloques_h`;
CREATE TABLE IF NOT EXISTS `bloques_h` (
  `id_bloque_h` int(11) NOT NULL,
  `h_inicio` varchar(45) DEFAULT NULL,
  `h_final` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_bloque_h`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bloques_h`
--

INSERT INTO `bloques_h` (`id_bloque_h`, `h_inicio`, `h_final`) VALUES
(40, '	07:00', '	08:00'),
(41, '	08:00', '	09:00'),
(42, '	09:00', '	10:00'),
(43, '	10:00', '	11:00'),
(44, '	11:00', '	12:00'),
(45, '	12:00', '	13:00'),
(46, '	13:00', '	14:00'),
(47, '	14:00', '	15:00'),
(48, '	15:00', '	16:00'),
(49, '	16:00', '	17:00'),
(50, '	17:00', '	18:00'),
(51, '	18:00', '	19:00'),
(52, '	19:00', '	20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nom_carrera` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nom_carrera`) VALUES
(31, 'Licenciatura en Educación Primaria-2018	'),
(32, 'Licenciatura en Enseñanza y Aprendizaje de la Química en Educación Secundaria'),
(33, 'Licenciatura en Enseñanza y Aprendizaje de la Biología en Educación Secundaria	');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `des_cat` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `des_cat`) VALUES
(60, 'Profesor horas clase base'),
(61, 'Pedagogo \"A\" Base C.C.P.'),
(62, 'Plaza formación Inglés \"C\"'),
(63, 'Subdirector administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

DROP TABLE IF EXISTS `dias`;
CREATE TABLE IF NOT EXISTS `dias` (
  `id_dia` int(11) NOT NULL AUTO_INCREMENT,
  `des_dia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_dia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `des_dia`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Mercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado'),
(7, 'Domingo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

DROP TABLE IF EXISTS `docentes`;
CREATE TABLE IF NOT EXISTS `docentes` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nom_docente` varchar(45) DEFAULT NULL,
  `ap_paterno` varchar(45) DEFAULT NULL,
  `ap_materno` varchar(45) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `tot_horas_clase` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_docente`),
  KEY `id_cat_idx` (`id_cat`),
  KEY `esta_idx` (`id_estado`),
  KEY `pertenece_idx` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=514 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nom_docente`, `ap_paterno`, `ap_materno`, `id_perfil`, `id_cat`, `tot_horas_clase`, `id_estado`) VALUES
(500, ' MTRO. Laura Veronica', ' Quirroga ', ' Rojas', 103, 60, 0, 10),
(501, '	MTRO Romero 	', '      Rivera 	', '	Serrano	', 102, 60, 20, 9),
(502, '	LIC. Jesus 	', '	Mondragon 	', '	Rebollar', 104, 60, 0, 9),
(503, '	ISC. Aldo	', '	Villa franca 	', '	Jimenez', 100, 61, 0, 9),
(504, '	LIC. Angel 	', '	Guadarrama	', '	 Valdez', 100, 61, 0, 9),
(505, 'Lic. Elvia', 'Velazquez ', 'Farjado', 102, 61, 0, 9),
(506, 'MTRA. Liliana Patricia', 'Pedraza', 'Mendoza', 100, 60, 0, 10),
(507, 'ISC Juan Carlos ', 'GarduÃ±o ', 'Miralrio', 101, 60, 0, 9),
(508, 'M en ISC Mariana Carolyn', 'Cruz', 'Mendoza', 101, 61, 0, 9),
(509, 'Lic. Carlos ', 'MatÃ­as ', 'DomÃ­nguez', 102, 61, 0, 9),
(510, 'Mtra. Emma Yolanda', 'CortÃ©s ', 'Soto', 107, 62, 0, 9),
(511, 'Julio Cesar', 'GonzÃ¡lez ', 'Urbina', 107, 60, 0, 9),
(512, 'Isc Misael', 'Lopez', 'Vargas', 100, 60, 0, 9),
(513, 'Isc Misael', 'Lopez', 'Vargas', 100, 60, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `des_estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `des_estado`) VALUES
(9, 'Activo'),
(10, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL,
  `des_grupo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `des_grupo`) VALUES
(260, '101'),
(261, '201');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

DROP TABLE IF EXISTS `horarios`;
CREATE TABLE IF NOT EXISTS `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_asigna_m` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_asigna_bh` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_horario`),
  KEY `a_idx` (`id_asigna_m`),
  KEY `e_idx` (`id_aula`),
  KEY `i_idx` (`id_asigna_bh`),
  KEY `as_idx` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `id_asigna_m`, `id_aula`, `id_asigna_bh`, `id_grupo`) VALUES
(71, 82, 21, 204, 260),
(72, 82, 21, 205, 260),
(73, 82, 21, 206, 260),
(77, 82, 21, 208, 260),
(78, 77, 21, 209, 260),
(83, 78, 21, 214, 260),
(84, 78, 21, 215, 260),
(86, 82, 21, 218, 260),
(89, 81, 21, 217, 260),
(94, 82, 21, 220, 260),
(95, 82, 21, 244, 260),
(97, 82, 21, 239, 260),
(98, 81, 21, 227, 260),
(99, 77, 21, 200, 260),
(102, 77, 21, 201, 260),
(103, 78, 21, 211, 260),
(104, 78, 21, 212, 260),
(105, 81, 21, 213, 260),
(106, 82, 21, 210, 260);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_docentes`
--

DROP TABLE IF EXISTS `horario_docentes`;
CREATE TABLE IF NOT EXISTS `horario_docentes` (
  `id_horario_docente` int(11) NOT NULL,
  `id_horario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_horario_docente`),
  KEY `horadoc_idx` (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_grupos`
--

DROP TABLE IF EXISTS `horario_grupos`;
CREATE TABLE IF NOT EXISTS `horario_grupos` (
  `id_horario_grupo` int(11) NOT NULL,
  `id_horario_docente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_horario_grupo`),
  KEY `hace_idx` (`id_horario_docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_materia` varchar(120) DEFAULT NULL,
  `tot_horas` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `es_idx` (`id_carrera`),
  KEY `cursa_idx` (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=443 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nom_materia`, `tot_horas`, `id_semestre`, `id_carrera`) VALUES
(300, '	Desarrollo y aprendisaje', 20, 11, 31),
(301, '	El sujeto y su formacion Profecional', 20, 11, 31),
(302, '	Lenguaje y comunicación	', 20, 11, 31),
(303, '	Aritmetica numeros naturales	', 20, 11, 31),
(304, '	Introduccion a la naturaleza de la ciencia', 20, 11, 31),
(305, '	Herramientas para la observacion y analisis de la practica educativa	', 20, 11, 31),
(306, 'Inglés. inicio de la comunicación basica ', 6, 11, 31),
(307, 'PlaneaciÃ³n y evaluaciÃ³n de la enseÃ±anza y el aprendizaje ', 6, 12, 31),
(308, 'PrÃ¡cticas sociales del lenguaje.', 6, 12, 31),
(309, 'AritmÃ©tica. NÃºmeros decimales y fracciones.', 6, 12, 31),
(310, 'Estudio del medio ambiente y la naturaleza.', 6, 12, 31),
(311, 'ObservaciÃ³n y anÃ¡lisis de prÃ¡cticas y contextos escolares.', 4, 12, 31),
(312, 'InglÃ©s. Desarrollo de conversaciones elementales.', 6, 12, 31),
(313, 'EducaciÃ³n Socioemocional.', 4, 13, 31),
(314, 'Desarrollo de competencia lectora.', 6, 13, 31),
(315, 'Ãlgebra', 6, 13, 31),
(316, 'GeografÃ­a.', 6, 13, 31),
(317, 'IniciaciÃ³n al trabajo docente.', 6, 13, 31),
(318, 'InglÃ©s. Intercambio de informaciÃ³n e ideas.', 6, 13, 31),
(319, 'AtenciÃ³n a la diversidad   ', 4, 14, 31),
(320, 'Modelos pedagÃ³gicos.', 4, 14, 31),
(321, 'ProducciÃ³n de textos escritos.', 6, 14, 31),
(322, 'GeometrÃ­a.', 6, 14, 31),
(323, 'Historia.', 4, 14, 31),
(324, 'Estrategias de trabajo docente.', 6, 14, 31),
(325, 'InglÃ©s. Fortalecimiento de la confianza en la conversaciÃ³n.', 6, 14, 31),
(326, 'EducaciÃ³n Inclusiva.', 4, 15, 31),
(327, 'Herramientas bÃ¡sicas para la investigaciÃ³n educativa.', 4, 15, 31),
(328, 'Literatura.', 6, 15, 31),
(329, 'Probabilidad y estadÃ­stica.', 6, 15, 31),
(330, 'Estrategias para la enseÃ±anza de la historia.', 4, 15, 31),
(331, 'InnovaciÃ³n y trabajo docente.', 6, 15, 31),
(332, 'InglÃ©s. Hacia nuevas perspectivas globales.', 6, 15, 31),
(333, 'Bases legales y normativas de la educaciÃ³n bÃ¡sica.', 4, 16, 31),
(334, 'Estrategias para el desarrollo socioemocional.', 6, 16, 31),
(335, 'MÃºsica, expresiÃ³n corporal y danza.', 4, 16, 31),
(336, 'FormaciÃ³n cÃ­vica y Ã©tica.', 6, 16, 31),
(337, 'Trabajo docente y proyectos de mejora escolar.', 6, 16, 31),
(338, 'InglÃ©s. Convertirse en comunicadores independientes.', 6, 16, 31),
(339, 'GestiÃ³n educativa centrada en la mejora del aprendizaje.', 4, 17, 31),
(340, 'Teatro y artes visuales.', 4, 17, 31),
(341, 'EducaciÃ³n FÃ­sica.', 6, 17, 31),
(342, 'Aprendizaje en el Servicio.', 6, 17, 31),
(343, 'Aprendizaje en el Servicio.', 20, 18, 31),
(344, 'Desarrollo en la adolecencia', 4, 11, 32),
(345, 'Problemas socioeconÃ³micos y polÃ­ticos de MÃ©xico', 4, 11, 32),
(346, 'QuÃ­mica en la historia', 6, 11, 32),
(347, 'Nociones bÃ¡sicas de QuÃ­mica ', 6, 11, 32),
(348, 'QuÃ­mica: una ciencia fÃ¡tica', 5, 11, 32),
(349, 'Herramientas para la observaciÃ³n y anÃ¡lisis de la escuela y comunidad ', 4, 11, 32),
(350, 'InglÃ©s. Inicio de la comunicaciÃ³n bÃ¡sica', 6, 11, 32),
(351, 'Desarrollo socioemocional y aprendizaje', 4, 12, 32),
(352, 'TeorÃ­as y modelos de aprendizaje', 4, 12, 32),
(353, 'FilosofÃ­a y epistemoogia de la ciencia', 4, 12, 32),
(354, 'Estrucura y propiedades', 4, 12, 32),
(355, 'QuÃ­mica experimental', 6, 12, 32),
(356, 'InstrucciÃ³n al anÃ¡lisis instrumental', 4, 12, 32),
(357, 'Observacion y anÃ¡lisis de la cultura escolar.', 4, 12, 32),
(358, 'InglÃ©s. Desarrollo de conversaciones elementales.', 6, 12, 32),
(359, 'PlaneaciÃ³n y evaluaciÃ³n ', 6, 13, 32),
(360, 'La tecnologÃ­a en la enseÃ±anza de la QuÃ­mica', 4, 13, 32),
(361, 'Enlace quÃ­mico ', 4, 13, 32),
(362, 'Reacciones quÃ­micas              ', 6, 13, 32),
(363, 'IntroducciÃ³n a los mÃ©todos espectrofotomÃ©tricos.', 4, 13, 32),
(364, 'PrÃ¡ctica docente en el aula', 6, 13, 32),
(365, 'InglÃ©s. Intercambio de informaciÃ³n e ideas                         ', 6, 13, 32),
(366, 'Neurociencia en la adolescencia                   ', 4, 14, 32),
(367, 'GestiÃ³n del centro educativo', 4, 14, 32),
(368, 'MetodologÃ­a de la enseÃ±anza de la QuÃ­mica', 4, 14, 32),
(369, 'MatemÃ¡ticas aplicadas a la QuÃ­mica', 4, 14, 32),
(370, 'Equilibrio quÃ­mico', 4, 14, 32),
(371, 'MÃ©todos Ã³pticos', 4, 14, 32),
(372, 'Estrategias de trabajo docente', 6, 14, 32),
(373, 'InglÃ©s. Fortalecimiento de la confianza en la conversaciÃ³n', 6, 14, 32),
(374, 'EducaciÃ³n inclusiva', 4, 15, 32),
(375, 'MetodologÃ­a de la investigaciÃ³n', 4, 15, 32),
(376, 'Cambio conceptual en la enseÃ±anza de la QuÃ­mica', 4, 15, 32),
(377, 'FisicoquÃ­mica', 4, 15, 32),
(378, 'AnÃ¡lisis quÃ­mico', 4, 15, 32),
(379, 'MÃ©todos electromÃ©tricos', 4, 15, 32),
(380, 'InnovaciÃ³n para la docencia', 6, 15, 32),
(381, 'InglÃ©s. Hacia nuevas perspectivas globales                  ', 6, 15, 32),
(382, 'Fundamentos de la educaciÃ³n', 4, 16, 32),
(383, 'Pensamiento pedagÃ³gico', 4, 16, 32),
(384, 'Modelizar y contextualizar la QuÃ­mica', 4, 16, 32),
(385, 'EstadÃ­stica ', 4, 16, 32),
(386, 'QuÃ­mica orgÃ¡nica', 4, 16, 32),
(387, 'MÃ©todos cromatogrÃ¡ficos', 4, 16, 32),
(388, 'Proyectos de intervenciÃ³n docente', 6, 16, 32),
(389, 'InglÃ©s. Convertirse en comunicadores independientes', 6, 16, 32),
(390, 'Retos actuales de la educaciÃ³n en MÃ©xico', 4, 17, 32),
(391, 'InstrumentaciÃ³n bÃ¡sica ', 6, 17, 32),
(392, 'QuÃ­mica y sustentabilidad', 5, 17, 32),
(393, 'CinÃ©tica quÃ­mica', 4, 17, 32),
(394, 'IntroducciÃ³n a la bioquÃ­mica', 4, 17, 32),
(395, 'PrÃ¡ctica profesional y vida escolar', 6, 17, 32),
(396, 'Aprendizaje en el Servicio', 20, 18, 32),
(397, 'El sujeto y su formaciÃ³n profesional como docente', 5, 11, 33),
(398, 'Historia de la educaciÃ³n en MÃ©xico ', 4, 11, 33),
(399, 'Panorama actual de la educaciÃ³n bÃ¡sica en MÃ©xico ', 4, 11, 33),
(400, 'AritmÃ©tica: su aprendizaje y enseÃ±anza ', 6, 11, 33),
(401, 'Desarrollo fÃ­sico y salud ', 4, 11, 33),
(402, 'Las TIC en la educaciÃ³n', 4, 11, 33),
(403, 'ObservaciÃ³n y anÃ¡lisis de la prÃ¡ctica educativa', 6, 11, 33),
(404, 'PlaneaciÃ³n educativa ', 4, 12, 33),
(405, 'Bases psicolÃ³gicas del aprendizaje', 4, 12, 33),
(406, 'PrÃ¡cticas sociales del lenguaje ', 6, 12, 33),
(407, 'Ãlgebra: su aprendizaje y enseÃ±anza ', 6, 12, 33),
(408, 'Acercamiento a las ciencias naturales en la primaria', 6, 12, 33),
(409, 'La tecnologÃ­a informÃ¡tica aplicada a los centros escolares ', 4, 12, 33),
(410, 'ObservaciÃ³n y anÃ¡lisis de la prÃ¡ctica escolar ', 6, 12, 33),
(411, 'AdecuaciÃ³n curricular ', 4, 13, 33),
(412, 'Ambientes de aprendizaje   ', 4, 13, 33),
(413, 'EducaciÃ³n histÃ³rica en el aula ', 4, 13, 33),
(414, 'Procesos de alfabetizaciÃ³n inicial ', 6, 13, 33),
(415, 'GeometrÃ­a: su aprendizaje y enseÃ±anza ', 6, 13, 33),
(416, 'Ciencias naturales ', 6, 13, 33),
(417, 'InglÃ©s A1 ', 4, 13, 33),
(418, 'IniciaciÃ³n al trabajo docente ', 6, 13, 33),
(419, 'TeorÃ­a pedagÃ³gica', 4, 14, 33),
(420, 'EvaluaciÃ³n para el aprendizaje ', 4, 14, 33),
(421, 'EducaciÃ³n histÃ³rica en diversos contextos ', 4, 14, 33),
(422, 'Estrategias didÃ¡cticas con propÃ³sitos comunicativos ', 6, 14, 33),
(423, 'Procesamiento de informaciÃ³n estadÃ­stica ', 6, 14, 33),
(424, 'Optativo', 4, 14, 33),
(425, 'InglÃ©s A2 ', 4, 14, 33),
(426, 'Estrategias de trabajo docente ', 6, 14, 33),
(427, 'Herramientas bÃ¡sicas para la investigaciÃ³n educativa', 4, 15, 33),
(428, 'AtenciÃ³n a la diversidad', 4, 15, 33),
(429, 'EducaciÃ³n fÃ­sica', 4, 15, 33),
(430, 'ProducciÃ³n de textos escritos ', 6, 15, 33),
(431, 'EducaciÃ³n artÃ­stica (mÃºsica, expresiÃ³n corporal y danza) ', 4, 15, 33),
(432, 'Optativo ', 4, 15, 33),
(433, 'InglÃ©s B1-', 4, 15, 33),
(434, 'Trabajo docente e innovaciÃ³n ', 6, 16, 33),
(435, 'FilosofÃ­a de la educaciÃ³n', 4, 16, 33),
(436, 'Diagnostico e intervenciÃ³n socioeducativa', 4, 16, 33),
(437, 'FormaciÃ³n cÃ­vica y Ã©tica ', 4, 16, 33),
(438, 'EducaciÃ³n geogrÃ¡fica ', 4, 16, 33),
(439, 'EducaciÃ³n artÃ­stica (artes visuales y teatro) ', 4, 16, 33),
(440, 'Optativo ', 4, 16, 33),
(441, 'InglÃ©s B1 ', 4, 16, 33),
(442, 'Proyectos de intervenciÃ³n socioeducativa ', 6, 16, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `des_perfil` varchar(200) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `des_perfil`) VALUES
(100, 'Ingeniero en Sistemas Computacionales'),
(101, 'Licenciado en Administracion'),
(102, 'Ingeniero industrial'),
(103, 'Licenciado en Lenguas'),
(104, 'Licenciado en Turismo'),
(105, 'Ingeniro mecanico'),
(106, 'Maestro de inglés'),
(107, 'Maestria en educacaion secundaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE IF NOT EXISTS `periodos` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `des_periodo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `des_periodo`) VALUES
(80, 'Septiembre 2020-Febrero 2021'),
(81, 'Marzo 2021- Agosto 2021'),
(82, 'Septiembre 2021-Enero 2022');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

DROP TABLE IF EXISTS `plantillas`;
CREATE TABLE IF NOT EXISTS `plantillas` (
  `id_plantilla` int(11) NOT NULL AUTO_INCREMENT,
  `des_plantilla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_plantilla`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plantillas`
--

INSERT INTO `plantillas` (`id_plantilla`, `des_plantilla`) VALUES
(14, 'Plantilla 1'),
(15, 'Plantilla 2'),
(16, 'Plantilla 3'),
(33, 'Plantilla 4'),
(51, 'Plantilla 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

DROP TABLE IF EXISTS `semestres`;
CREATE TABLE IF NOT EXISTS `semestres` (
  `id_semestre` int(11) NOT NULL AUTO_INCREMENT,
  `des_semestre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `des_semestre`) VALUES
(11, '1Â° Semestre'),
(12, '2Â° Semestre'),
(13, '3Â° Semestre'),
(14, '4Â° Semestre'),
(15, '5Â° Semestre'),
(16, '6Â° Semestre'),
(17, '7Â° Semestre'),
(18, '8Â° Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `passwor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `usuario`, `passwor`) VALUES
(14, 'Jacinto', '$2y$10$ae9OudbNfHCSRbCE0ERdWeZyugqQOL2p2ZtpRde9XmU5H78Fla8aa'),
(13, 'aldo', '$2y$10$J.iF0DkgFY2fe2BlwlQ2nuUf33x59xJLvoInMtf5t7.dzZB0i4LT2'),
(11, 'uriel', '$2y$10$71rTE2YASuq7FBYQ4ttzcucPXRvQ9i3YnPnl.X8FIwqOMaricA/cq'),
(12, 'aldo', '$2y$10$rH21tTb8eVDEAGDgwxg6SeE2zndQF.9cHN94.gvfTqfZnomIhgdee'),
(10, 'uriel', '$2y$10$NgThC0fx7/HP7GoHdUjgb.Ay30fswNis863fm8adYrBeoZJTnvt8K'),
(15, 'jose', '$2y$10$nbiTm.qalwKDY/53THTtueoiSgwjKSAVnFfXgH.qQsn65FxRhURXO'),
(16, 'uriel', '$2y$10$IExuYOFUDIiruVwQJugWHujItwYIEDytXzbrZ0MZsO0SwCAmA/xga'),
(17, 'u', '$2y$10$9B6.1Vy/DRaE/Hrl0XUJpeW3MoJlCovJ3FUWkaSB9P/oP4SoboTtm'),
(18, 'Admin', '$2y$10$NytGvG/3gjr/agpb85P14OWhMg7kuqFxibH97DRqQE.kcagBI27Aq');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asigna_bloque_h`
--
ALTER TABLE `asigna_bloque_h`
  ADD CONSTRAINT `o` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `u` FOREIGN KEY (`id_bloque_h`) REFERENCES `bloques_h` (`id_bloque_h`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asigna_horario`
--
ALTER TABLE `asigna_horario`
  ADD CONSTRAINT `carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id_periodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `semestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asigna_materias`
--
ALTER TABLE `asigna_materias`
  ADD CONSTRAINT `docente` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `materia` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pertenece_p` FOREIGN KEY (`id_asigna_p`) REFERENCES `asigna_plantillas` (`id_asigna_p`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sesion` FOREIGN KEY (`id_asigna_h`) REFERENCES `asigna_horario` (`id_asigna_h`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asigna_plantillas`
--
ALTER TABLE `asigna_plantillas`
  ADD CONSTRAINT `horarrio_p` FOREIGN KEY (`id_asigna_h`) REFERENCES `asigna_horario` (`id_asigna_h`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `necesita` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `plantillas` FOREIGN KEY (`id_plantilla`) REFERENCES `plantillas` (`id_plantilla`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `esta` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pertenece` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tiene` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `a` FOREIGN KEY (`id_asigna_m`) REFERENCES `asigna_materias` (`id_asigna_m`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `as` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `e` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id_aulas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `i` FOREIGN KEY (`id_asigna_bh`) REFERENCES `asigna_bloque_h` (`id_asigna_bh`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_docentes`
--
ALTER TABLE `horario_docentes`
  ADD CONSTRAINT `horadoc` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_grupos`
--
ALTER TABLE `horario_grupos`
  ADD CONSTRAINT `hace` FOREIGN KEY (`id_horario_docente`) REFERENCES `horarios` (`id_horario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `cursa` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `es` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
