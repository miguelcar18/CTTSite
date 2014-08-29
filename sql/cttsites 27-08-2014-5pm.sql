
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: cttsite
-- ------------------------------------------------------
-- Server version	5.6.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ctt_grupos_opciones`
--

DROP TABLE IF EXISTS `ctt_grupos_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctt_grupos_opciones` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `desc_grupo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctt_grupos_opciones`
--

LOCK TABLES `ctt_grupos_opciones` WRITE;
/*!40000 ALTER TABLE `ctt_grupos_opciones` DISABLE KEYS */;
INSERT INTO `ctt_grupos_opciones` VALUES (1,'Personal'),(2,'Laboral');
/*!40000 ALTER TABLE `ctt_grupos_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctt_opciones`
--

DROP TABLE IF EXISTS `ctt_opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctt_opciones` (
  `idctt_opciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `id_opcion` int(11) DEFAULT NULL,
  `desc_opcion` varchar(45) DEFAULT NULL,
  `data_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idctt_opciones`),
  KEY `fk_ctt_opciones_ctt_grupos_opciones_idx` (`id_grupo`),
  CONSTRAINT `fk_ctt_opciones_ctt_grupos_opciones` FOREIGN KEY (`id_grupo`) REFERENCES `ctt_grupos_opciones` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctt_opciones`
--

LOCK TABLES `ctt_opciones` WRITE;
/*!40000 ALTER TABLE `ctt_opciones` DISABLE KEYS */;
INSERT INTO `ctt_opciones` VALUES (1,1,1,'DNI','integer'),(2,1,2,'Nombre','string'),(3,1,3,'Apellido','string'),(17,2,4,'Telefono','string'),(19,2,5,'Cargo','string'),(20,2,6,'Sueldo','string');
/*!40000 ALTER TABLE `ctt_opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctt_options_values`
--

DROP TABLE IF EXISTS `ctt_options_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctt_options_values` (
  `idcttOptions` int(11) NOT NULL AUTO_INCREMENT,
  `idOpcion` int(11) NOT NULL,
  `value` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcttOptions`),
  KEY `fk_cttOptions_usuario1_idx` (`usuario_idusuario`),
  KEY `fk_ctt_options_values_ctt_opciones1_idx` (`idOpcion`),
  CONSTRAINT `fk_cttOptions_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ctt_options_values_ctt_opciones1` FOREIGN KEY (`idOpcion`) REFERENCES `ctt_opciones` (`idctt_opciones`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctt_options_values`
--


--
-- Table structure for table `ctt_usuarios_sesiones`
--

DROP TABLE IF EXISTS `ctt_usuarios_sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctt_usuarios_sesiones` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctt_usuarios_sesiones`
--

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-27 17:23:40
