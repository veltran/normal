-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 18:49:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `asigna_bloque_h` (
  `id_asigna_bh` int(11) NOT NULL,
  `id_dia` int(11) DEFAULT NULL,
  `id_bloque_h` int(11) DEFAULT NULL
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

CREATE TABLE `asigna_horario` (
  `id_asigna_h` int(11) NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna_horario`
--

INSERT INTO `asigna_horario` (`id_asigna_h`, `id_periodo`, `id_carrera`, `id_semestre`) VALUES
(135, 80, 31, 11),
(136, 81, 31, 11),
(137, 80, 32, 11),
(138, 80, 32, 12),
(139, 80, 31, 12),
(140, 80, 31, 18),
(141, 80, 32, 15),
(143, 80, 33, 12),
(144, 80, 33, 13),
(145, 80, 31, 13),
(146, 80, 31, 15),
(147, 80, 33, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_materias`
--

CREATE TABLE `asigna_materias` (
  `id_asigna_m` int(11) NOT NULL,
  `id_materia` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_asigna_p` int(11) DEFAULT NULL,
  `id_asigna_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asigna_materias`
--

INSERT INTO `asigna_materias` (`id_asigna_m`, `id_materia`, `id_docente`, `id_asigna_p`, `id_asigna_h`) VALUES
(35, 300, 507, NULL, 135),
(37, 301, 512, NULL, 135),
(39, 302, 513, NULL, 135),
(40, 303, 503, NULL, 135),
(41, 304, 511, NULL, 135),
(42, 305, 504, NULL, 135),
(43, 306, 504, NULL, 135),
(44, 344, 507, NULL, 137),
(46, 345, 512, NULL, 137),
(47, 307, 507, NULL, 139),
(48, 308, 512, NULL, 139),
(50, 310, 503, NULL, 139),
(51, 309, 513, NULL, 139),
(52, 311, 511, NULL, 139),
(53, 312, 504, NULL, 139);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_plantillas`
--

CREATE TABLE `asigna_plantillas` (
  `id_asigna_p` int(11) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `id_plantilla` int(11) DEFAULT NULL,
  `id_asigna_h` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aulas` int(11) NOT NULL,
  `des_aula` varchar(45) DEFAULT NULL
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

CREATE TABLE `bloques_h` (
  `id_bloque_h` int(11) NOT NULL,
  `h_inicio` varchar(45) DEFAULT NULL,
  `h_final` varchar(45) DEFAULT NULL
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

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nom_carrera` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `des_cat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `des_dia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `nom_docente` varchar(45) DEFAULT NULL,
  `ap_paterno` varchar(45) DEFAULT NULL,
  `ap_materno` varchar(45) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `tot_horas_clase` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nom_docente`, `ap_paterno`, `ap_materno`, `id_perfil`, `id_cat`, `tot_horas_clase`, `id_estado`) VALUES
(500, ' MTRO. Laura Veronica', ' Quirroga ', ' Rojas', 103, 60, 0, 10),
(501, '	MTRO Romero 	', '      Rivera 	', '	Serrano	', 102, 60, 20, 9),
(502, '	Lic. Jesus 	', '	Mondragon 	', '	Rebollar', 101, 60, 20, 9),
(503, '	ISC. Aldo	', '	Villa franca 	', '	Jimenez', 100, 61, 0, 9),
(504, '	LIC. Angel 	', '	Guadarrama	', '	 Valdez', 100, 61, 0, 9),
(505, 'Lic. Elvia', 'Velazquez ', 'Farjado', 102, 61, 0, 9),
(506, 'MTRA. Liliana Patricia', 'Pedraza', 'Mendoza', 100, 60, 0, 10),
(507, 'ISC Juan Carlos ', 'GarduÃ±o ', 'Miralrio', 101, 60, 0, 9),
(508, 'M en ISC Mariana Carolyn', 'Cruz', 'Mendoza', 101, 61, 0, 9),
(509, 'Lic. Carlos ', 'Matí­as ', 'Domínguez', 102, 61, 0, 9),
(510, 'Mtra. Emma Yolanda', 'Cortés ', 'Soto', 107, 62, 0, 9),
(511, 'Julio Cesar', 'González ', 'Urbina', 107, 60, 0, 9),
(512, 'Isc Misael', 'Lopez', 'Vargas', 100, 60, 0, 9),
(513, 'Isc Misael', 'Lopez', 'Vargas', 100, 60, 0, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `des_estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `des_grupo` varchar(45) DEFAULT NULL
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

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `id_asigna_m` int(11) DEFAULT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_asigna_bh` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `id_asigna_m`, `id_aula`, `id_asigna_bh`, `id_grupo`) VALUES
(71, 35, 21, 200, 260),
(72, 35, 21, 201, 260),
(73, 37, 21, 210, 260),
(74, 37, 21, 211, 260),
(75, 35, 21, 212, 260),
(76, 35, 21, 213, 260),
(77, 37, 21, 202, 260),
(78, 37, 21, 203, 260),
(79, 40, 21, 220, 260),
(80, 40, 21, 221, 260),
(81, 41, 21, 230, 260),
(82, 41, 21, 231, 260),
(83, 41, 21, 224, 260),
(85, 43, 21, 240, 260),
(86, 43, 21, 241, 260),
(87, 43, 21, 222, 260),
(88, 43, 21, 223, 260),
(90, 41, 21, 225, 260),
(91, 46, 21, 200, 260),
(112, 47, 21, 203, 260),
(113, 47, 21, 202, 260);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_docentes`
--

CREATE TABLE `horario_docentes` (
  `id_horario_docente` int(11) NOT NULL,
  `id_horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_grupos`
--

CREATE TABLE `horario_grupos` (
  `id_horario_grupo` int(11) NOT NULL,
  `id_horario_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nom_materia` varchar(120) DEFAULT NULL,
  `tot_horas` int(11) DEFAULT NULL,
  `id_semestre` int(11) DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nom_materia`, `tot_horas`, `id_semestre`, `id_carrera`) VALUES
(300, '	Desarrollo y aprendisaje', 20, 11, 31),
(301, 'El sujeto y su formación Profesional', 20, 11, 31),
(302, 'Lenguaje y comunicación	', 20, 11, 31),
(303, '	Aritmética números naturales	', 20, 11, 31),
(304, '	Introducción a la naturaleza de la ciencia', 20, 11, 31),
(305, '	Herramientas para la observación y análisis de la practica educativa	', 20, 11, 31),
(306, 'Inglés. inicio de la comunicación básica ', 6, 11, 31),
(307, 'Planeación y evaluación de la enseñanza y el aprendizaje.', 6, 12, 31),
(308, 'Practicas sociales del lenguaje.', 6, 12, 31),
(309, 'Aritmética Números decimales y fracciones.', 6, 12, 31),
(310, 'Estudio del medio ambiente y la naturaleza.', 6, 12, 31),
(311, 'Observación y análisis de practicas y contextos escolares.', 4, 12, 31),
(312, 'Ingles. Desarrollo de conversaciones elementales.', 6, 12, 31),
(313, 'Educación Socio emocional.', 4, 13, 31),
(314, 'Desarrollo de competencia lectora.', 6, 13, 31),
(315, 'Álgebra', 6, 13, 31),
(316, 'Geografía.', 6, 13, 31),
(317, 'Iniciación al trabajo docente.', 6, 13, 31),
(318, 'Inglés. Intercambio de información e ideas.', 6, 13, 31),
(319, 'Atención a la diversidad   ', 4, 14, 31),
(320, 'Modelos pedagógicos.', 4, 14, 31),
(321, 'Producción de textos escritos.', 6, 14, 31),
(322, 'Geometría.', 6, 14, 31),
(323, 'Historia.', 4, 14, 31),
(324, '', 6, 14, 31),
(325, 'Inglés. Fortalecimiento de la confianza en la conversación.', 6, 14, 31),
(326, 'Educación Inclusiva.', 4, 15, 31),
(327, 'Herramientas básicas para la investigación educativa.', 4, 15, 31),
(328, 'Literatura.', 6, 15, 31),
(329, 'Probabilidad y estadí­stica.', 6, 15, 31),
(330, 'Estrategias para la enseñanza de la historia.', 4, 15, 31),
(331, 'Innovación y trabajo docente.', 6, 15, 31),
(332, 'Inglés. Hacia nuevas perspectivas globales.', 6, 15, 31),
(333, 'Bases legales y normativas de la educación básica.', 4, 16, 31),
(334, 'Estrategias para el desarrollo socioemocional.', 6, 16, 31),
(335, 'Música, expresión corporal y danza.', 4, 16, 31),
(336, 'Formación cívica y ética.', 6, 16, 31),
(337, 'Trabajo docente y proyectos de mejora escolar.', 6, 16, 31),
(338, 'Inglés. Convertirse en comunicadores independientes.', 6, 16, 31),
(339, 'Gestión educativa centrada en la mejora del aprendizaje.', 4, 17, 31),
(340, 'Teatro y artes visuales.', 4, 17, 31),
(341, 'Educación física.', 6, 17, 31),
(342, 'Aprendizaje en el Servicio.', 6, 17, 31),
(343, 'Aprendizaje en el Servicio.', 20, 18, 31),
(344, 'Desarrollo en la adolecencia', 4, 11, 32),
(345, 'Problemas socioeconómicos y políticos de México', 4, 11, 32),
(346, 'Química en la historia', 6, 11, 32),
(347, 'Nociones básicas de Química ', 6, 11, 32),
(348, 'Química: una ciencia fática', 5, 11, 32),
(349, '', 4, 11, 32),
(350, 'Inglés. Inicio de la comunicación básica', 6, 11, 32),
(351, 'Desarrollo socioemocional y aprendizaje', 4, 12, 32),
(352, 'Teorías y modelos de aprendizaje', 4, 12, 32),
(353, 'Filosofía y epistemología de la ciencia', 4, 12, 32),
(354, 'Estrucura y propiedades', 4, 12, 32),
(355, 'Química experimental', 6, 12, 32),
(356, 'Instrucción al análisis instrumental', 4, 12, 32),
(357, 'Observación y análisis de la cultura escolar.', 4, 12, 32),
(358, 'Inglés. Desarrollo de conversaciones elementales.', 6, 12, 32),
(359, 'Planeación y evaluación ', 6, 13, 32),
(360, 'La tecnología en la enseñanza de la Química', 4, 13, 32),
(361, 'Enlace quí­mico ', 4, 13, 32),
(362, 'Reacciones químicas              ', 6, 13, 32),
(363, 'Introducción a los métodos espectrofotométricos.', 4, 13, 32),
(364, 'Práctica docente en el aula', 6, 13, 32),
(365, 'Inglés. Intercambio de información e ideas                         ', 6, 13, 32),
(366, 'Neurociencia en la adolescencia                   ', 4, 14, 32),
(367, 'Gestión del centro educativo', 4, 14, 32),
(368, 'Metodología de la enseñanza de la Química', 4, 14, 32),
(369, 'Matemáticas aplicadas a la Química', 4, 14, 32),
(370, 'Equilibrio químico', 4, 14, 32),
(371, 'Métodos ópticos', 4, 14, 32),
(372, 'Estrategias de trabajo docente', 6, 14, 32),
(373, 'Inglés. Fortalecimiento de la confianza en la conversación', 6, 14, 32),
(374, 'Educación inclusiva', 4, 15, 32),
(375, 'Metodología de la investigación', 4, 15, 32),
(376, 'Cambio conceptual en la enseñanza de la Química', 4, 15, 32),
(377, 'Fisicoquímica', 4, 15, 32),
(378, 'Análisis químico', 4, 15, 32),
(379, 'Métodos electrométricos', 4, 15, 32),
(380, 'Innovación para la docencia', 6, 15, 32),
(381, 'Inglés. Hacia nuevas perspectivas globales                  ', 6, 15, 32),
(382, 'Fundamentos de la educación', 4, 16, 32),
(383, 'Pensamiento pedagógico', 4, 16, 32),
(384, 'Modelizar y contextualizar la Química', 4, 16, 32),
(385, 'Estadística ', 4, 16, 32),
(386, 'Química orgánica', 4, 16, 32),
(387, 'Métodos cromatográficos', 4, 16, 32),
(388, 'Proyectos de intervención docente', 6, 16, 32),
(389, 'Inglés. Convertirse en comunicadores independientes', 6, 16, 32),
(390, 'Retos actuales de la educación en México', 4, 17, 32),
(391, 'Instrumentación básica ', 6, 17, 32),
(392, 'Química y sustentabilidad', 5, 17, 32),
(393, 'Cinética química', 4, 17, 32),
(394, 'Introducción a la bioquí­mica', 4, 17, 32),
(395, 'Práctica profesional y vida escolar', 6, 17, 32),
(396, 'Aprendizaje en el Servicio', 20, 18, 32),
(397, 'El sujeto y su formación profesional como docente', 5, 11, 33),
(398, 'Historia de la educación en México ', 4, 11, 33),
(399, 'Panorama actual de la educación básica en México ', 4, 11, 33),
(400, 'Aritmética: su aprendizaje y enseñanza ', 6, 11, 33),
(401, 'Desarrollo físico y salud ', 4, 11, 33),
(402, 'Las TIC en la educación', 4, 11, 33),
(403, 'Observación y análisis de la práctica educativa', 6, 11, 33),
(404, 'Planeación educativa ', 4, 12, 33),
(405, 'Bases psicológicas del aprendizaje', 4, 12, 33),
(406, 'Prácticas sociales del lenguaje ', 6, 12, 33),
(407, 'Álgebra: su aprendizaje y enseñanza ', 6, 12, 33),
(408, 'Acercamiento a las ciencias naturales en la primaria', 6, 12, 33),
(409, 'La tecnología informática aplicada a los centros escolares ', 4, 12, 33),
(410, 'Observación y análisis de la práctica escolar ', 6, 12, 33),
(411, 'Adecuación curricular ', 4, 13, 33),
(412, 'Ambientes de aprendizaje   ', 4, 13, 33),
(413, 'Educación histórica en el aula ', 4, 13, 33),
(414, 'Procesos de alfabetización inicial ', 6, 13, 33),
(415, 'Geometría: su aprendizaje y enseñanza ', 6, 13, 33),
(416, 'Ciencias naturales ', 6, 13, 33),
(417, 'Inglés A1 ', 4, 13, 33),
(418, 'Iniciación al trabajo docente ', 6, 13, 33),
(419, 'Teorí­a pedagógica', 4, 14, 33),
(420, 'Evaluación para el aprendizaje ', 4, 14, 33),
(421, 'Educación histórica en diversos contextos ', 4, 14, 33),
(422, 'Estrategias didácticas con propósitos comunicativos ', 6, 14, 33),
(423, 'Procesamiento de información estadística ', 6, 14, 33),
(424, 'Optativo', 4, 14, 33),
(425, 'Inglés A2 ', 4, 14, 33),
(426, 'Estrategias de trabajo docente ', 6, 14, 33),
(427, 'Herramientas básicas para la investigación educativa', 4, 15, 33),
(428, 'Atención a la diversidad', 4, 15, 33),
(429, 'Educación física', 4, 15, 33),
(430, 'Producción de textos escritos ', 6, 15, 33),
(431, 'Educación artística (música, expresión corporal y danza) ', 4, 15, 33),
(432, 'Optativo ', 4, 15, 33),
(433, 'Inglés B1-', 4, 15, 33),
(434, 'Trabajo docente e innovación ', 6, 16, 33),
(435, 'Filosofía de la educación', 4, 16, 33),
(436, 'Diagnostico e intervención socioeducativa', 4, 16, 33),
(437, 'Formación cívica y ética ', 4, 16, 33),
(438, 'Educación geográfica ', 4, 16, 33),
(439, 'Educación artística (artes visuales y teatro) ', 4, 16, 33),
(440, 'Optativo ', 4, 16, 33),
(441, 'Inglés B1 ', 4, 16, 33),
(442, 'Proyectos de intervención socioeducativa ', 6, 16, 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `des_perfil` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `des_periodo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `plantillas` (
  `id_plantilla` int(11) NOT NULL,
  `des_plantilla` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `semestres` (
  `id_semestre` int(11) NOT NULL,
  `des_semestre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `des_semestre`) VALUES
(11, '1° Semestre'),
(12, '2° Semestre'),
(13, '3° Semestre'),
(14, '4° Semestre'),
(15, '5° Semestre'),
(16, '6° Semestre'),
(17, '7° Semestre'),
(18, '8° Semestre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `passwor` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asigna_bloque_h`
--
ALTER TABLE `asigna_bloque_h`
  ADD PRIMARY KEY (`id_asigna_bh`),
  ADD KEY `o_idx` (`id_dia`),
  ADD KEY `u_idx` (`id_bloque_h`);

--
-- Indices de la tabla `asigna_horario`
--
ALTER TABLE `asigna_horario`
  ADD PRIMARY KEY (`id_asigna_h`),
  ADD KEY `carrera_idx` (`id_carrera`),
  ADD KEY `semestre_idx` (`id_semestre`),
  ADD KEY `periodo` (`id_periodo`);

--
-- Indices de la tabla `asigna_materias`
--
ALTER TABLE `asigna_materias`
  ADD PRIMARY KEY (`id_asigna_m`),
  ADD KEY `materia_idx` (`id_materia`),
  ADD KEY `docente_idx` (`id_docente`),
  ADD KEY `pertenece_p` (`id_asigna_p`),
  ADD KEY `sesion` (`id_asigna_h`);

--
-- Indices de la tabla `asigna_plantillas`
--
ALTER TABLE `asigna_plantillas`
  ADD PRIMARY KEY (`id_asigna_p`),
  ADD KEY `necesita_idx` (`id_docente`),
  ADD KEY `as_h_idx` (`id_asigna_h`),
  ADD KEY `plantillas` (`id_plantilla`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aulas`);

--
-- Indices de la tabla `bloques_h`
--
ALTER TABLE `bloques_h`
  ADD PRIMARY KEY (`id_bloque_h`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_cat_idx` (`id_cat`),
  ADD KEY `esta_idx` (`id_estado`),
  ADD KEY `pertenece_idx` (`id_perfil`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `a_idx` (`id_asigna_m`),
  ADD KEY `e_idx` (`id_aula`),
  ADD KEY `i_idx` (`id_asigna_bh`),
  ADD KEY `as_idx` (`id_grupo`);

--
-- Indices de la tabla `horario_docentes`
--
ALTER TABLE `horario_docentes`
  ADD PRIMARY KEY (`id_horario_docente`),
  ADD KEY `horadoc_idx` (`id_horario`);

--
-- Indices de la tabla `horario_grupos`
--
ALTER TABLE `horario_grupos`
  ADD PRIMARY KEY (`id_horario_grupo`),
  ADD KEY `hace_idx` (`id_horario_docente`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `es_idx` (`id_carrera`),
  ADD KEY `cursa_idx` (`id_semestre`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id_plantilla`);

--
-- Indices de la tabla `semestres`
--
ALTER TABLE `semestres`
  ADD PRIMARY KEY (`id_semestre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asigna_horario`
--
ALTER TABLE `asigna_horario`
  MODIFY `id_asigna_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT de la tabla `asigna_materias`
--
ALTER TABLE `asigna_materias`
  MODIFY `id_asigna_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `asigna_plantillas`
--
ALTER TABLE `asigna_plantillas`
  MODIFY `id_asigna_p` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id_plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `semestres`
--
ALTER TABLE `semestres`
  MODIFY `id_semestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
