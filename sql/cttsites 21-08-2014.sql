-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2014 a las 05:05:08
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cttsite`
--
CREATE DATABASE IF NOT EXISTS `cttsite` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cttsite`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cttoptions`
--

CREATE TABLE IF NOT EXISTS `cttoptions` (
  `idcttOptions` int(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` int(11) DEFAULT NULL,
  `idOpcion` int(11) DEFAULT NULL,
  `value` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcttOptions`),
  KEY `fk_cttOptions_usuario1_idx` (`usuario_idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `cttoptions`
--

INSERT INTO `cttoptions` (`idcttOptions`, `idGrupo`, `idOpcion`, `value`, `type`, `usuario_idusuario`) VALUES
(1, 1, 2, 'jonathan', NULL, 1),
(2, 1, 1, '18693713', NULL, 1),
(3, 1, 1, '137134', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ctt_grupos_opciones`
--

CREATE TABLE IF NOT EXISTS `ctt_grupos_opciones` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ctt_grupos_opciones`
--

INSERT INTO `ctt_grupos_opciones` (`id_grupo`, `desc_grupo`) VALUES
(1, 'Personal'),
(3, 'Laboral');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `ctt_opciones`
--

INSERT INTO `ctt_opciones` (`idctt_opciones`, `id_grupo`, `id_opcion`, `desc_opcion`, `data_type`) VALUES
(1, 1, 1, 'DNI', 'integer'),
(2, 1, 2, 'Nombre', 'string'),
(3, 1, 3, 'Apellido', 'string'),
(17, 3, 3, 'Telefono', 'string'),
(19, 3, 5, 'Cargo', 'string'),
(20, 3, 6, 'Sueldo', 'string');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `ctt_usuarios_sesiones`
--

INSERT INTO `ctt_usuarios_sesiones` (`idctt_usuarios_sesiones`, `idusuario_sesion`, `idmaquina_sesion`, `idsesion_sesion`, `estado_sesion`, `tms_alta_sesion`, `so_sesion`, `navegador_sesion`, `fecha_sesion`) VALUES
(1, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-14 20:23:14'),
(2, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-19 20:32:15'),
(3, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-19 23:19:37'),
(4, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-19 23:45:53'),
(5, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-20 03:05:09'),
(6, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-20 14:03:05'),
(7, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-20 18:36:48'),
(8, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-20 19:54:04'),
(9, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 00:42:09'),
(10, 1, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 01:19:16'),
(11, 2, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 03:43:40'),
(12, 2, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 03:49:03'),
(13, 2, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 03:51:42'),
(14, 2, NULL, NULL, NULL, NULL, 'Windows NT', 'Google Chrome', '2014-08-21 03:57:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nick_usuario` varchar(45) NOT NULL,
  `clave_usuario` varchar(45) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `idioma_usuario` varchar(45) DEFAULT NULL,
  `pais_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  `codigo_olvido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nick_usuario_UNIQUE` (`nick_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nick_usuario`, `clave_usuario`, `nombre_usuario`, `idioma_usuario`, `pais_usuario`, `email_usuario`, `enabled`, `hash`, `codigo_olvido`) VALUES
(1, 'miguelcar18', '2ABPC15ObUSCs', 'Miguel  Carmona', 'Español', 'Venezuela', 'miguelcar18@gmail.com', 1, '2AvKNjTGvSQ0I', NULL),
(2, 'jonathan.araul', '2A/ajQe0Ba6DE', NULL, NULL, NULL, 'jonathan.araul@gmail.com', 1, '2Av1JOZ4VnoA6', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cttoptions`
--
ALTER TABLE `cttoptions`
  ADD CONSTRAINT `fk_cttOptions_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ctt_opciones`
--
ALTER TABLE `ctt_opciones`
  ADD CONSTRAINT `fk_ctt_opciones_ctt_grupos_opciones` FOREIGN KEY (`id_grupo`) REFERENCES `ctt_grupos_opciones` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
