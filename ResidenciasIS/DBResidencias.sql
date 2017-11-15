-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: residencias
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `aceptacion`
--

DROP TABLE IF EXISTS `aceptacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aceptacion` (
  `idAceptacion` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `idConvenio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAceptacion`),
  KEY `fk_Aceptacion_1_idx` (`Matricula`),
  KEY `fk_Aceptacion_2_idx` (`idProyecto`),
  KEY `fk_Aceptacion_3_idx` (`idEmpresa`),
  KEY `fk_Aceptacion_4_idx` (`idAsesorExterno`),
  KEY `fk_Aceptacion_5_idx` (`idAsesorInterno`),
  KEY `fk_Aceptacion_6_idx` (`idConvenio`),
  CONSTRAINT `fk_Aceptacion_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aceptacion_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aceptacion_3` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aceptacion_4` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aceptacion_5` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aceptacion_6` FOREIGN KEY (`idConvenio`) REFERENCES `convenio` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aceptacion`
--

LOCK TABLES `aceptacion` WRITE;
/*!40000 ALTER TABLE `aceptacion` DISABLE KEYS */;
INSERT INTO `aceptacion` VALUES (1,14211483,1,1,1,2,1);
/*!40000 ALTER TABLE `aceptacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `Matricula` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApellidoPa` varchar(45) DEFAULT NULL,
  `ApellidoMa` varchar(45) DEFAULT NULL,
  `Direccion` varchar(65) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL,
  `Sexo` varchar(10) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `estado_residencia` varchar(6) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  PRIMARY KEY (`Matricula`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (14211423,'Rigoberto','Torres','Gonzales','ribera del bosquesxdxdxd','6641705161','rigoberto.reyes16@tectijuana.edu.mx',6,'Masculino',20,'false',NULL,NULL,1),(14211451,'Jose Manuel','Marquez',' Enriques','Enrique segobiano','6641721637','josemar16@gmail.com',12,'Masculino',20,'True','Reynaldo','2017-11-06',1),(14211483,'Alexis Eduardo','Silva','Bautista','Priv. Hda. Fuentes del pez 22456 2','6643192448','alexiseduardo2008@hotmail.com',6,'Masculino',20,'False','Reynaldo','2017-11-07',1),(14211498,'German','LaFerte','Mon','la morita','6643456723','germanlf@gmail.com',7,'Masculino',20,'false',NULL,NULL,1),(15210517,'Mariana','Rodriguez','Gamboa','La postal','664897585','Mariana.Rodriguez@gmail.com',10,'Femenino',20,'false',NULL,NULL,1),(15210518,'Francisco','Guillen','Salazar','Florido','664897856','Francisco@gmail.com',10,'Masculino',21,'false',NULL,NULL,1),(15210519,'Jose ','Ortiz','Valenzuela','Otay','664589758','isc.valdez@gmail.com',13,'Masculino',21,'True','Reynaldo','2017-11-09',2),(15210520,'Melody','Ulloa','Marquez','Florido','6648121825','Melody@gmail.com',10,'Femenino',21,'false',NULL,NULL,2),(15210521,'Claudia','Medellin','Fonseca','Playas Tijuana','665987858','Claudia@gmail.com',10,'Femenino',21,'false',NULL,NULL,2),(15210522,'Brenda','Salcido','Mejia','Primera seccion','664546545','Brenda@gmail.com',11,'Femenino',21,'True','Reynaldo','2017-11-09',2),(15210528,'Cristian Nicolas','Hernandez','hernandez','Tijuana','664486123','isc.cristian@gmail.com',12,'Masculino',21,'True','Reynaldo','2017-11-09',2),(15210537,'Adrian','Medina','Guido','Otay','6616131','adrian@gmail.com',13,'',20,'True','Reynaldo','2017-11-07',2);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asesorexterno`
--

DROP TABLE IF EXISTS `asesorexterno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesorexterno` (
  `idAsesorExterno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApellidoPa` varchar(45) DEFAULT NULL,
  `ApellidoMa` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAsesorExterno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesorexterno`
--

LOCK TABLES `asesorexterno` WRITE;
/*!40000 ALTER TABLE `asesorexterno` DISABLE KEYS */;
INSERT INTO `asesorexterno` VALUES (1,'Cristian','Arenas','Campis','Av. telecomunicaciones :v','6646642334','estenoesuncorreofeik@gmail.com'),(2,'Maria ','Concepcion','Martinez','calzada tecnologico aveda','6640023454','maria@gmail.com');
/*!40000 ALTER TABLE `asesorexterno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asesorinterno`
--

DROP TABLE IF EXISTS `asesorinterno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesorinterno` (
  `idAsesorInterno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApellidoPa` varchar(45) DEFAULT NULL,
  `ApellidoMa` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAsesorInterno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesorinterno`
--

LOCK TABLES `asesorinterno` WRITE;
/*!40000 ALTER TABLE `asesorinterno` DISABLE KEYS */;
INSERT INTO `asesorinterno` VALUES (1,'Maria Concepcion','Ibarra',':V','Av. Lenguajes de programacion','6646642323','estenoesuncorreofeik2@gmail.com'),(2,'Alain','Cervantes','Ahumada','cerro de las abejas','6644901719','alain@gmail.com'),(3,'Luz','Cortez','Galvan','Otay','66458548','luzCortez@gmail.com'),(4,'Liz ','Perez','Torres','hhfnjbdgdj','6642129384','liz@gmail.com');
/*!40000 ALTER TABLE `asesorinterno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Ing. Sistemas Computacionales'),(2,'Ing. Aeronautica');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `confirmacion`
--

DROP TABLE IF EXISTS `confirmacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `confirmacion` (
  `idConfirmacion` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConfirmacion`),
  KEY `fk_Confirmacion_1_idx` (`Matricula`),
  KEY `fk_Confirmacion_2_idx` (`idCarrera`),
  KEY `fk_Confirmacion_3_idx` (`idPeriodo`),
  CONSTRAINT `fk_Confirmacion_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Confirmacion_2` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Confirmacion_3` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `confirmacion`
--

LOCK TABLES `confirmacion` WRITE;
/*!40000 ALTER TABLE `confirmacion` DISABLE KEYS */;
INSERT INTO `confirmacion` VALUES (1,14211483,1,2);
/*!40000 ALTER TABLE `confirmacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenio`
--

DROP TABLE IF EXISTS `convenio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenio` (
  `idConvenio` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` text,
  `idEmpresa` int(11) DEFAULT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  PRIMARY KEY (`idConvenio`),
  KEY `fk_Convenio_1_idx` (`idEmpresa`),
  KEY `fk_Convenio_2_idx` (`Matricula`),
  KEY `fk_Convenio_3_idx` (`idAsesorExterno`),
  CONSTRAINT `fk_Convenio_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Convenio_2` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Convenio_3` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenio`
--

LOCK TABLES `convenio` WRITE;
/*!40000 ALTER TABLE `convenio` DISABLE KEYS */;
INSERT INTO `convenio` VALUES (1,'convenio con el tec',1,14211483,1),(2,'El convenio de rigito xdxd',1,14211423,1);
/*!40000 ALTER TABLE `convenio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallesalumno`
--

DROP TABLE IF EXISTS `detallesalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallesalumno` (
  `idDetallesAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  `idConvenio` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `idSolicitud` int(11) DEFAULT NULL,
  `idConfirmacion` int(11) DEFAULT NULL,
  `idPresentacion` int(11) DEFAULT NULL,
  `idAceptacion` int(11) DEFAULT NULL,
  `idDictamen` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetallesAlumno`),
  KEY `fk_DetallesAlumno_1_idx` (`Matricula`),
  KEY `fk_DetallesAlumno_2_idx` (`idProyecto`),
  KEY `fk_DetallesAlumno_3_idx` (`idEmpresa`),
  KEY `fk_DetallesAlumno_4_idx` (`idCarrera`),
  KEY `fk_DetallesAlumno_5_idx` (`idPeriodo`),
  KEY `fk_DetallesAlumno_6_idx` (`idConvenio`),
  KEY `fk_DetallesAlumno_7_idx` (`idAsesorExterno`),
  KEY `fk_DetallesAlumno_8_idx` (`idAsesorInterno`),
  KEY `fk_DetallesAlumno_9_idx` (`idSolicitud`),
  KEY `fk_DetallesAlumno_10_idx` (`idConfirmacion`),
  KEY `fk_DetallesAlumno_11_idx` (`idPresentacion`),
  KEY `fk_DetallesAlumno_12_idx` (`idAceptacion`),
  KEY `fk_DetallesAlumno_13_idx` (`idDictamen`),
  CONSTRAINT `fk_DetallesAlumno_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_10` FOREIGN KEY (`idConfirmacion`) REFERENCES `confirmacion` (`idConfirmacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_11` FOREIGN KEY (`idPresentacion`) REFERENCES `presentacion` (`idPresentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_12` FOREIGN KEY (`idAceptacion`) REFERENCES `aceptacion` (`idAceptacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_13` FOREIGN KEY (`idDictamen`) REFERENCES `dictamen` (`idDictamen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_3` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_4` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_5` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_6` FOREIGN KEY (`idConvenio`) REFERENCES `convenio` (`idConvenio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_7` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_8` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetallesAlumno_9` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallesalumno`
--

LOCK TABLES `detallesalumno` WRITE;
/*!40000 ALTER TABLE `detallesalumno` DISABLE KEYS */;
INSERT INTO `detallesalumno` VALUES (1,14211483,1,1,1,1,1,1,1,1,1,1,1,1),(2,14211451,1,1,1,1,1,1,1,NULL,NULL,NULL,NULL,NULL),(3,14211451,NULL,NULL,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,14211498,NULL,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `detallesalumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dictamen`
--

DROP TABLE IF EXISTS `dictamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dictamen` (
  `idDictamen` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `InformeFinal` text,
  `EvaluacionExterna` text,
  `Calificacion` decimal(10,0) DEFAULT NULL,
  `CartaFinal` text,
  PRIMARY KEY (`idDictamen`),
  KEY `fk_Dictamen_1_idx` (`Matricula`),
  KEY `fk_Dictamen_2_idx` (`idProyecto`),
  KEY `fk_Dictamen_3_idx` (`idEmpresa`),
  KEY `fk_Dictamen_4_idx` (`idAsesorExterno`),
  KEY `fk_Dictamen_5_idx` (`idAsesorInterno`),
  CONSTRAINT `fk_Dictamen_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dictamen_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dictamen_3` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dictamen_4` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dictamen_5` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dictamen`
--

LOCK TABLES `dictamen` WRITE;
/*!40000 ALTER TABLE `dictamen` DISABLE KEYS */;
INSERT INTO `dictamen` VALUES (1,14211483,1,1,1,1,'yes i do :v','pues fine(bien en ingles)',10,'pues lo hizo bien el shavo ');
/*!40000 ALTER TABLE `dictamen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edo_proyecto_externo`
--

DROP TABLE IF EXISTS `edo_proyecto_externo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edo_proyecto_externo` (
  `idProyecto` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `aceptado_interno` varchar(10) DEFAULT 'no',
  `aceptado_externo` varchar(10) DEFAULT 'no',
  `aceptado_coord` varchar(10) DEFAULT 'no',
  KEY `idAsesorInterno` (`idAsesorInterno`),
  KEY `idAsesorExterno` (`idAsesorExterno`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `edo_proyecto_externo_ibfk_1` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`),
  CONSTRAINT `edo_proyecto_externo_ibfk_2` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`),
  CONSTRAINT `edo_proyecto_externo_ibfk_3` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edo_proyecto_externo`
--

LOCK TABLES `edo_proyecto_externo` WRITE;
/*!40000 ALTER TABLE `edo_proyecto_externo` DISABLE KEYS */;
/*!40000 ALTER TABLE `edo_proyecto_externo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edo_proyecto_interno`
--

DROP TABLE IF EXISTS `edo_proyecto_interno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edo_proyecto_interno` (
  `idProyecto` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `aceptado_asesor` varchar(10) DEFAULT 'no',
  `aceptado_coord` varchar(10) DEFAULT 'no',
  KEY `idAsesorInterno` (`idAsesorInterno`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `edo_proyecto_interno_ibfk_1` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`),
  CONSTRAINT `edo_proyecto_interno_ibfk_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edo_proyecto_interno`
--

LOCK TABLES `edo_proyecto_interno` WRITE;
/*!40000 ALTER TABLE `edo_proyecto_interno` DISABLE KEYS */;
INSERT INTO `edo_proyecto_interno` VALUES (1521052817,1,'no','no');
/*!40000 ALTER TABLE `edo_proyecto_interno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `RFC` varchar(45) DEFAULT NULL,
  `Sector` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `RepresentanteLegal` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'Instituto Tecnologico de Tijuana','TEC DE TIJUANA','Educacional','6501182','itt@tectijuana.edu.mx','Av. Calzada Tecnologico','Tecnologica','Maria Concepcion Ibarra Magiz'),(2,'Maya','1235asdfgf','Financiero','6501282','maya@industries.com','enrique segobiano','Tecnologica','Manuel Ricardo Valdez Ruelas');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros`
--

DROP TABLE IF EXISTS `maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maestros` (
  `matricula` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `ApellidoPa` varchar(45) DEFAULT NULL,
  `ApellidoMa` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `idPeriodo` int(11) NOT NULL AUTO_INCREMENT,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  PRIMARY KEY (`idPeriodo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
INSERT INTO `periodo` VALUES (1,'2011-01-10','2017-06-04'),(2,'2011-01-10','2017-06-16'),(3,'2017-01-02','2017-06-16');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentacion` (
  `idPresentacion` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idPresentacion`),
  KEY `fk_Presentacion_1_idx` (`Matricula`),
  KEY `fk_Presentacion_2_idx` (`idCarrera`),
  KEY `fk_Presentacion_3_idx` (`idPeriodo`),
  KEY `fk_Presentacion_4_idx` (`idProyecto`),
  CONSTRAINT `fk_Presentacion_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Presentacion_2` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Presentacion_3` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Presentacion_4` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (1,14211483,1,1,1,'2017-05-27');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFinal` date DEFAULT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `Matricula` (`Matricula`),
  CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Residencias','2017-04-07','2017-06-01',NULL,NULL),(2,'Innova Web','2017-05-01','2017-05-01',NULL,NULL),(3,'Biblioteca','2017-05-27','2017-05-03',NULL,NULL),(4,'Sistema de turorias','2017-04-07','2017-06-01',NULL,NULL);
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `idProyecto` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `FechaFinal` date DEFAULT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `Tipo` varchar(50) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProyecto`),
  KEY `Matricula` (`Matricula`),
  CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1521052817,'Mi residencia','0001-12-01','2018-01-01',15210528,'Interno','Reynaldo');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reporte`
--

DROP TABLE IF EXISTS `reporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idProyecto` int(11) DEFAULT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`idReporte`),
  KEY `fk_Reporte_1_idx` (`Matricula`),
  KEY `fk_Reporte_2_idx` (`idProyecto`),
  KEY `fk_Reporte_3_idx` (`idEmpresa`),
  KEY `fk_Reporte_4_idx` (`idAsesorExterno`),
  KEY `fk_Reporte_5_idx` (`idAsesorInterno`),
  CONSTRAINT `fk_Reporte_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_2` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_3` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_4` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reporte_5` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reporte`
--

LOCK TABLES `reporte` WRITE;
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
INSERT INTO `reporte` VALUES (1,14211451,1,1,1,1,'2017-05-29','ninguna'),(2,14211451,1,1,1,1,'2017-05-29','entrega excelente y a tiempo');
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento_externo`
--

DROP TABLE IF EXISTS `seguimiento_externo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimiento_externo` (
  `idProyecto` int(11) DEFAULT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `idAsesorExterno` int(11) DEFAULT NULL,
  `url_entrega_1` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_1` date DEFAULT NULL,
  `edo_entrega_1` varchar(15) DEFAULT 'No entregado',
  `url_entrega_2` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_2` date DEFAULT NULL,
  `edo_entrega_2` varchar(15) DEFAULT 'No entregado',
  `url_entrega_3` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_3` date DEFAULT NULL,
  `edo_entrega_3` varchar(15) DEFAULT 'No entregado',
  KEY `idAsesorInterno` (`idAsesorInterno`),
  KEY `idAsesorExterno` (`idAsesorExterno`),
  KEY `Matricula` (`Matricula`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `seguimiento_externo_ibfk_1` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`),
  CONSTRAINT `seguimiento_externo_ibfk_2` FOREIGN KEY (`idAsesorExterno`) REFERENCES `asesorexterno` (`idAsesorExterno`),
  CONSTRAINT `seguimiento_externo_ibfk_3` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`),
  CONSTRAINT `seguimiento_externo_ibfk_4` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento_externo`
--

LOCK TABLES `seguimiento_externo` WRITE;
/*!40000 ALTER TABLE `seguimiento_externo` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento_externo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguimiento_interno`
--

DROP TABLE IF EXISTS `seguimiento_interno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguimiento_interno` (
  `idProyecto` int(11) DEFAULT NULL,
  `Matricula` int(11) DEFAULT NULL,
  `idAsesorInterno` int(11) DEFAULT NULL,
  `url_entrega_1` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_1` date DEFAULT NULL,
  `edo_entrega_1` varchar(15) DEFAULT 'No entregado',
  `url_entrega_2` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_2` date DEFAULT NULL,
  `edo_entrega_2` varchar(15) DEFAULT 'No entregado',
  `url_entrega_3` varchar(400) DEFAULT 'No entregado',
  `fecha_entrega_3` date DEFAULT NULL,
  `edo_entrega_3` varchar(15) DEFAULT 'No entregado',
  KEY `idAsesorInterno` (`idAsesorInterno`),
  KEY `Matricula` (`Matricula`),
  KEY `idProyecto` (`idProyecto`),
  CONSTRAINT `seguimiento_interno_ibfk_1` FOREIGN KEY (`idAsesorInterno`) REFERENCES `asesorinterno` (`idAsesorInterno`),
  CONSTRAINT `seguimiento_interno_ibfk_2` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`),
  CONSTRAINT `seguimiento_interno_ibfk_3` FOREIGN KEY (`idProyecto`) REFERENCES `proyectos` (`idProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguimiento_interno`
--

LOCK TABLES `seguimiento_interno` WRITE;
/*!40000 ALTER TABLE `seguimiento_interno` DISABLE KEYS */;
INSERT INTO `seguimiento_interno` VALUES (1521052817,15210528,1,'No entregado',NULL,'No entregado','No entregado',NULL,'No entregado','No entregado',NULL,'No entregado');
/*!40000 ALTER TABLE `seguimiento_interno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `idSolicitud` int(10) NOT NULL AUTO_INCREMENT,
  `Matricula` int(11) DEFAULT NULL,
  `idCarrera` int(11) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `fk_Solicitud_1_idx` (`Matricula`),
  KEY `fk_Solicitud_2_idx` (`idPeriodo`),
  KEY `fk_Solicitud_3_idx` (`idCarrera`),
  CONSTRAINT `fk_Solicitud_1` FOREIGN KEY (`Matricula`) REFERENCES `alumno` (`Matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Solicitud_2` FOREIGN KEY (`idPeriodo`) REFERENCES `periodo` (`idPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Solicitud_3` FOREIGN KEY (`idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
INSERT INTO `solicitud` VALUES (1,14211483,1,1),(2,14211423,1,2),(4,14211498,1,1);
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(50) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Reynaldo','cacahuates','isc.cristian.hernandez@gmail.com');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-14 19:27:02
