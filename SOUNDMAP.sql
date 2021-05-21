-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2017 a las 14:52:39
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SOUNDMAP`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sitios`
--

CREATE TABLE `tbl_sitios` (
  `id` int(11) NOT NULL,
  `id_usr_fk` int(11) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longuitud` double DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `audio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_sitios`
--

INSERT INTO `tbl_sitios` (`id`, `id_usr_fk`, `latitud`, `longuitud`, `foto`, `nombre`, `direccion`, `descripcion`, `audio`) VALUES
(100, 4, 42.34224094898066, -3.6943389984101027, 'foto1.png', 'aaa', 'lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'demo1.mp3'),
(101, 4, 42.35213776805158, -3.6857736110687256, '101~vena1.jpg', 'Rio Vena', 'C\\Francisco de Vitoria', 'Puente sobre el río Vena a la altura de la C\\Francisco de Vitoria a las 8:00 am.\nGrabador Huawei P8 lite.', '101~vena1.mp3'),
(102, 4, 42.3444433333, -3.6943389980101013, '102~avdPaz.jpg', 'Avda La Paz', 'Avda La Paz cruze C\\ de Morco', 'Coches y motos y también alguna furgoneta alrededor de  la 13:30.\nGrabadora Zoom H2.', '102~trafic.mp3'),
(103, 4, 42.35423093820958, -3.649005889892578, '103~tren.jpg', 'Parking', 'C\\Alcalde Martí­n Cobos', 'Debajo del puente de la C\\Alcalde Martín Cobos, pasa el tren de mercancías entre las 18:00 y 18:40. Grabadora Zoom H2.', '103~tren.mp3'),
(104, 4, 42.341131620644845, -3.702220916748047, '104~plazaMayor.jpg', 'Plaza Mayor', 'Plaza Mayor', 'Tarde lluviosa, nadie en las calles. Buen día para los patos. Grabadora: Zoom H2', '104~lluvia1.mp3'),
(105, 4, 42.34176206799846, -3.6998391151428223, '105~cSantander.jpg', 'C\\ Santander', 'C\\ Santander', 'Un paseo por el centro muy temprano, la calle casi vacÃ­a. Grabadora: Huawei P8 Lite', '105~trafic1.mp3'),
(106, 4, 42.342971399002344, -3.668489456176758, '106~plantio.jpg', 'Paseo de la Quinta', 'Plantio', 'El paseo de la quinta a la altura del plantÃ­o.\n29/05/2017 - 12:10h.\nequipo: Sony MDR  Mic: ECM800', '106~plantio.mp3'),
(108, 4, 42.3632371174439, -3.7102890014648438, '108~camion1.jpg', 'Industria', 'C\\Alfoz de Bricia', 'Limpiadora de agua a presión en un polígono industrial entorno a la 10:15 am. Grabador: Huawey P8 Lite', '108~industria1.mp3'),
(109, 4, 42.35261349466339, -3.6603140830993652, '109~pentasa3.jpg', 'Pentasa III', 'C\\ Juan Ramón Jimenez', 'Conjunto de naves industriales donde se realizan diferentes negocios. En este caso el sonido de una ebanistería.\nGrabado: Sony MDR ECM800', '109~sierra1.mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(45) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `salt` varchar(22) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nick`, `pass`, `email`, `salt`) VALUES
(3, 'ccc', '$2y$10$LCTF293z880q5ouAzb29Veifsv0Urrrmo2lXc.uJnavJLVdj/z15C', 'ccc@ccc.com', 'LCTF293z880q5ouAzb29Vs'),
(4, 'gsun', '$2y$10$6S2UzQRcbHAe83nms7pXgeE6YUzH7/uCla0vTL2waYGR3ipbhbLN2', 'admin@admin.com', '6S2UzQRcbHAe83nms7pXgj');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_sitios`
--
ALTER TABLE `tbl_sitios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usr_fk` (`id_usr_fk`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_sitios`
--
ALTER TABLE `tbl_sitios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_sitios`
--
ALTER TABLE `tbl_sitios`
  ADD CONSTRAINT `tbl_sitios_ibfk_1` FOREIGN KEY (`id_usr_fk`) REFERENCES `tbl_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
