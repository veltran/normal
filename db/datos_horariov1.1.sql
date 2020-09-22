-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2020 a las 19:59:41
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `es_idx` (`id_carrera`),
  ADD KEY `cursa_idx` (`id_semestre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- Restricciones para tablas volcadas
--

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
