-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-08-2014 a las 03:28:37
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cttsite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctt_grupos_opciones`
--

CREATE TABLE IF NOT EXISTS `ctt_grupos_opciones` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ctt_grupos_opciones`
--

INSERT INTO `ctt_grupos_opciones` (`id_grupo`, `desc_grupo`) VALUES
(1, 'Personal'),
(2, 'Laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctt_opciones`
--

CREATE TABLE IF NOT EXISTS `ctt_opciones` (
  `idctt_opciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_opcion` int(11) DEFAULT NULL,
  `desc_opcion` varchar(45) DEFAULT NULL,
  `data_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idctt_opciones`),
  KEY `fk_ctt_opciones_ctt_grupos_opciones_idx` (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `ctt_opciones`
--

INSERT INTO `ctt_opciones` (`idctt_opciones`, `id_grupo`, `id_opcion`, `desc_opcion`, `data_type`) VALUES
(1, 1, 1, 'DNI', 'integer'),
(2, 1, 2, 'Nombre', 'string'),
(3, 1, 3, 'Apellido', 'string'),
(17, 2, 4, 'Telefono', 'string'),
(19, 2, 5, 'Cargo', 'string'),
(20, 2, 6, 'Sueldo', 'string');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctt_options_values`
--

CREATE TABLE IF NOT EXISTS `ctt_options_values` (
  `idcttOptions` int(11) NOT NULL AUTO_INCREMENT,
  `idOpcion` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcttOptions`),
  KEY `fk_cttOptions_usuario1_idx` (`usuario_idusuario`),
  KEY `fk_ctt_options_values_ctt_opciones1_idx` (`idOpcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `ctt_options_values`
--

INSERT INTO `ctt_options_values` (`idcttOptions`, `idOpcion`, `value`, `type`, `usuario_idusuario`) VALUES
(7, 2, 'Elly', 'string', 10),
(8, 3, 'Estaba', 'string', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctt_usuarios_sesiones`
--

CREATE TABLE IF NOT EXISTS `ctt_usuarios_sesiones` (
  `idctt_usuarios_sesiones` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario_sesion` int(11) DEFAULT NULL,
  `idmaquina_sesion` int(11) DEFAULT NULL,
  `idsesion_sesion` int(11) DEFAULT NULL,
  `estado_sesion` varchar(45) DEFAULT NULL,
  `tms_alta_sesion` varchar(45) DEFAULT NULL,
  `so_sesion` varchar(45) DEFAULT NULL,
  `navegador_sesion` varchar(45) DEFAULT NULL,
  `fecha_sesion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idctt_usuarios_sesiones`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ctt_usuarios_sesiones`
--

INSERT INTO `ctt_usuarios_sesiones` (`idctt_usuarios_sesiones`, `idusuario_sesion`, `idmaquina_sesion`, `idsesion_sesion`, `estado_sesion`, `tms_alta_sesion`, `so_sesion`, `navegador_sesion`, `fecha_sesion`) VALUES
(1, 10, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-26 20:40:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nick_usuario` varchar(45) NOT NULL,
  `clave_usuario` varchar(45) NOT NULL,
  `idioma_usuario` varchar(45) DEFAULT NULL,
  `pais_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `codigo_olvido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nick_usuario_UNIQUE` (`nick_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nick_usuario`, `clave_usuario`, `idioma_usuario`, `pais_usuario`, `email_usuario`, `enabled`, `hash`, `codigo_olvido`) VALUES
(2, 'jonathan.araul', '2A/ajQe0Ba6DE', '1', '1', 'jonathan.araul@gmail.com', 1, '2Av1JOZ4VnoA6', NULL),
(3, 'miguelcar18', '2ABPC15ObUSCs', '1', '1', 'miguelcar18@gmail.com', 1, '2AvKNjTGvSQ0I', ''),
(9, 'elly', '2A7Hi64kFN.5w', '1', '1', 'elly.estaba@gmail.com', 0, '2AmBlolElS31Y', NULL),
(10, 'ellyemperatriz', '2A7Hi64kFN.5w', '1', '1', 'elly.estaba@gmail.com', 1, '2A1xD93qh0DiQ', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ctt_opciones`
--
ALTER TABLE `ctt_opciones`
  ADD CONSTRAINT `fk_ctt_opciones_ctt_grupos_opciones` FOREIGN KEY (`id_grupo`) REFERENCES `ctt_grupos_opciones` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ctt_options_values`
--
ALTER TABLE `ctt_options_values`
  ADD CONSTRAINT `fk_cttOptions_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ctt_options_values_ctt_opciones1` FOREIGN KEY (`idOpcion`) REFERENCES `ctt_opciones` (`idctt_opciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
