CREATE DATABASE  IF NOT EXISTS `cttsite` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cttsite`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctt_usuarios_sesiones`
--

LOCK TABLES `ctt_usuarios_sesiones` WRITE;
/*!40000 ALTER TABLE `ctt_usuarios_sesiones` DISABLE KEYS */;
INSERT INTO `ctt_usuarios_sesiones` VALUES (1,1,NULL,NULL,NULL,NULL,'Windows NT','Google Chrome','2014-08-14 20:23:14');
/*!40000 ALTER TABLE `ctt_usuarios_sesiones` ENABLE KEYS */;
UNLOCK TABLES;

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
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `idioma_usuario` varchar(45) DEFAULT NULL,
  `pais_usuario` varchar(45) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `enabled` int(11) NOT NULL,
  `hash` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nick_usuario_UNIQUE` (`nick_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'miguelcar18','2ABPC15ObUSCs','Miguel  Carmona','Español','Venezuela','miguelcar18@gmail.com',1,'2AvKNjTGvSQ0I');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-14 16:04:43
