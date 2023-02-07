-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: tuamigo_db
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activo`
--

DROP TABLE IF EXISTS `activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activo` (
  `idactivo` int unsigned NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'no corriente',
  PRIMARY KEY (`idactivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `analisit_cual`
--

DROP TABLE IF EXISTS `analisit_cual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `analisit_cual` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `tipogarantia` int NOT NULL,
  `cargafamiliar` int NOT NULL,
  `riesgoedadmax` int NOT NULL,
  `antecedentescred` int NOT NULL,
  `recorpagoult` int NOT NULL,
  `niveldesarr` int NOT NULL,
  `tiempo_neg` int NOT NULL,
  `control_ingegre` int NOT NULL,
  `vent_totdec` int NOT NULL,
  `compsubsector` int NOT NULL,
  `totunidfamiliar` int NOT NULL,
  `totunidempresa` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `analisit_cual_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `asesor_finan`
--

DROP TABLE IF EXISTS `asesor_finan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asesor_finan` (
  `idasesor` char(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idasesor`),
  KEY `dni` (`dni`),
  CONSTRAINT `asesor_finan_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `asesorsaldo`
--

DROP TABLE IF EXISTS `asesorsaldo`;
/*!50001 DROP VIEW IF EXISTS `asesorsaldo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `asesorsaldo` AS SELECT 
 1 AS `codusuario`,
 1 AS `dni`,
 1 AS `saldo`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `aval`
--

DROP TABLE IF EXISTS `aval`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aval` (
  `codcliente` int(6) unsigned zerofill NOT NULL,
  `dniaval` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codcliente`),
  KEY `dniaval` (`dniaval`),
  CONSTRAINT `aval_ibfk_1` FOREIGN KEY (`dniaval`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `aval_ibfk_2` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`codcliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `balance`
--

DROP TABLE IF EXISTS `balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `balance` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `total_activo` decimal(7,2) NOT NULL,
  `total_pasivo` decimal(7,2) NOT NULL,
  `patrimonio` decimal(7,2) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  KEY `idsolicitud` (`idsolicitud`),
  CONSTRAINT `balance_ibfk_2` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bancos` (
  `id` int(6) unsigned zerofill NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `tipo` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `saldo` decimal(8,2) NOT NULL,
  `codvaucher` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `entidad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caja` (
  `idreg` int(6) unsigned zerofill NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `tipo` varchar(7) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'INGRESO',
  `saldo` decimal(8,2) NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `agencia` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'HUANUCO',
  PRIMARY KEY (`idreg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cierrecaja`
--

DROP TABLE IF EXISTS `cierrecaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cierrecaja` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `idusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `observacion` varchar(140) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `cierrecaja_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`codusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `codcliente` int(6) unsigned zerofill NOT NULL,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'INSCRITO' COMMENT 'INSCRITO, SOLICITADO, ACTIVO, INACTIVO',
  `fecha_registro` datetime NOT NULL,
  `idusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codcliente`),
  KEY `dni` (`dni`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `clienteahorros`
--

DROP TABLE IF EXISTS `clienteahorros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienteahorros` (
  `codigoca` int(6) unsigned zerofill NOT NULL,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  PRIMARY KEY (`codigoca`),
  KEY `dni` (`dni`),
  CONSTRAINT `clienteahorros_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clienteahorros_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!50001 DROP VIEW IF EXISTS `clientes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `clientes` AS SELECT 
 1 AS `codcliente`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `ruc`,
 1 AS `fecha_nac`,
 1 AS `sexo`,
 1 AS `estadocivil`,
 1 AS `grado_instr`,
 1 AS `nacionalidad`,
 1 AS `distrito_nac`,
 1 AS `distrito_domic`,
 1 AS `tipotrabajador`,
 1 AS `ocupacion`,
 1 AS `institucion_lab`,
 1 AS `email`,
 1 AS `tipovia`,
 1 AS `nombrevia`,
 1 AS `nro`,
 1 AS `interior`,
 1 AS `celular`,
 1 AS `mz`,
 1 AS `lote`,
 1 AS `tipozona`,
 1 AS `nombrezona`,
 1 AS `referencia`,
 1 AS `estado`,
 1 AS `fecha_registro`,
 1 AS `tipovivienda`,
 1 AS `idusuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `conyugue`
--

DROP TABLE IF EXISTS `conyugue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conyugue` (
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dniconyugue` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dni`),
  KEY `dniconyugue` (`dniconyugue`),
  CONSTRAINT `conyugue_ibfk_2` FOREIGN KEY (`dniconyugue`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuentaahorros`
--

DROP TABLE IF EXISTS `cuentaahorros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentaahorros` (
  `codigo` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codigoca` int(6) unsigned zerofill NOT NULL,
  `plazo` int NOT NULL,
  `tipoplazo` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `totaldias` int NOT NULL,
  `frecuencia` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuotas` int NOT NULL,
  `fecha_registro` date NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `fechainicio` date NOT NULL,
  `descripcion` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipoahorros` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigoca` (`codigoca`),
  CONSTRAINT `cuentaahorros_ibfk_1` FOREIGN KEY (`codigoca`) REFERENCES `clienteahorros` (`codigoca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuotapago`
--

DROP TABLE IF EXISTS `cuotapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotapago` (
  `iddesembolso` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuota` int(2) unsigned zerofill NOT NULL,
  `fecha_prog` date NOT NULL,
  `nombredia` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cuota` decimal(6,1) NOT NULL,
  `saldo` decimal(6,1) NOT NULL,
  PRIMARY KEY (`iddesembolso`,`nrocuota`),
  CONSTRAINT `cuotapago_ibfk_1` FOREIGN KEY (`iddesembolso`) REFERENCES `desembolso` (`iddesembolso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cuotapagoahorro`
--

DROP TABLE IF EXISTS `cuotapagoahorro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuotapagoahorro` (
  `codigocuentaa` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuota` int NOT NULL,
  `fecha` date NOT NULL,
  `nombredia` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigocuentaa`,`nrocuota`),
  CONSTRAINT `cuotapagoahorro_ibfk_1` FOREIGN KEY (`codigocuentaa`) REFERENCES `cuentaahorros` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamento` (
  `iddepartamento` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `desembolso`
--

DROP TABLE IF EXISTS `desembolso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desembolso` (
  `iddesembolso` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `monto` decimal(8,2) NOT NULL,
  `interes` decimal(5,2) NOT NULL,
  `plazo` int NOT NULL,
  `unidplazo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion_dom` varchar(140) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion_neg` varchar(140) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(8,1) NOT NULL,
  PRIMARY KEY (`iddesembolso`),
  KEY `idsolicitud` (`idsolicitud`),
  CONSTRAINT `desembolso_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `det_activo`
--

DROP TABLE IF EXISTS `det_activo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_activo` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idactivo` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idactivo` (`idactivo`),
  CONSTRAINT `det_activo_ibfk_1` FOREIGN KEY (`idactivo`) REFERENCES `activo` (`idactivo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `det_balance`
--

DROP TABLE IF EXISTS `det_balance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_balance` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `activocaja` decimal(7,2) DEFAULT NULL,
  `activobancos` decimal(7,2) DEFAULT NULL,
  `activoctascobrar` decimal(7,2) DEFAULT NULL,
  `activoinventarios` decimal(7,2) DEFAULT NULL,
  `pasivodeudaprove` decimal(7,2) DEFAULT NULL,
  `pasivodeudaent` decimal(7,2) DEFAULT NULL,
  `pasivodeudaemprender` decimal(7,2) DEFAULT NULL,
  `activomueble` decimal(7,2) DEFAULT NULL,
  `activootrosact` decimal(7,2) DEFAULT NULL,
  `activodepre` decimal(7,2) DEFAULT NULL,
  `pasivolargop` decimal(7,2) DEFAULT NULL,
  `otrascuentaspagar` decimal(7,2) DEFAULT NULL,
  `totalacorriente` decimal(7,2) DEFAULT NULL,
  `totalpcorriente` decimal(7,2) DEFAULT NULL,
  `totalancorriente` decimal(7,2) DEFAULT NULL,
  `totalpncorriente` decimal(7,2) DEFAULT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `det_balance_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `balance` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `det_perdiganan`
--

DROP TABLE IF EXISTS `det_perdiganan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_perdiganan` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `nroproducto` int NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `unidadmedida` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `preciounit` decimal(8,2) NOT NULL DEFAULT '0.00',
  `primaprincipal` decimal(8,2) NOT NULL DEFAULT '0.00',
  `primasecundaria` decimal(8,2) NOT NULL DEFAULT '0.00',
  `primacomplement` decimal(8,2) NOT NULL DEFAULT '0.00',
  `matprima` decimal(8,2) NOT NULL DEFAULT '0.00',
  `manoobra1` decimal(8,2) NOT NULL DEFAULT '0.00',
  `manoobra2` decimal(8,2) NOT NULL DEFAULT '0.00',
  `manoobra` decimal(8,2) NOT NULL DEFAULT '0.00',
  `costoprimounit` decimal(8,2) NOT NULL DEFAULT '0.00',
  `prodmensual` decimal(8,2) NOT NULL DEFAULT '0.00',
  `ventastotales` decimal(8,2) NOT NULL DEFAULT '0.00',
  `totcostoprimo` decimal(8,2) NOT NULL DEFAULT '0.00',
  `margenventas` decimal(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`idsolicitud`,`nroproducto`),
  CONSTRAINT `det_perdiganan_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `perdidas_ganancias` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detalle_inventariobg`
--

DROP TABLE IF EXISTS `detalle_inventariobg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_inventariobg` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `inv_materiales` decimal(5,2) NOT NULL,
  `inv_prodproc` decimal(5,2) NOT NULL,
  `inv_prodtermi` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `detalle_inventariobg_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `deuda_entidadfinan`
--

DROP TABLE IF EXISTS `deuda_entidadfinan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deuda_entidadfinan` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `desc_entidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deuda_entidadfinan_ibfk_1` (`idsolicitud`),
  CONSTRAINT `deuda_entidadfinan_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `distrito` (
  `iddistrito` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idprovincia` int(3) unsigned zerofill NOT NULL,
  PRIMARY KEY (`iddistrito`),
  KEY `idprovincia` (`idprovincia`),
  CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`)
) ENGINE=InnoDB AUTO_INCREMENT=1861 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluacion` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'ACEPTADO, RECHAZADO, REDUCIDO',
  `fechahora` datetime NOT NULL,
  `comentario` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tasainteres` decimal(4,2) DEFAULT '9.00',
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `evaluacion_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `feriados`
--

DROP TABLE IF EXISTS `feriados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feriados` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `garantia`
--

DROP TABLE IF EXISTS `garantia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `garantia` (
  `idgarantia` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valorgarantia` decimal(5,2) NOT NULL,
  PRIMARY KEY (`idgarantia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gastosfamiliares`
--

DROP TABLE IF EXISTS `gastosfamiliares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gastosfamiliares` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `alimentacion` decimal(6,2) NOT NULL,
  `alquileres` decimal(6,2) NOT NULL,
  `educacion` decimal(6,2) NOT NULL,
  `servicios` decimal(6,2) NOT NULL,
  `transporte` decimal(6,2) NOT NULL,
  `salud` decimal(6,2) NOT NULL,
  `otros` decimal(6,1) NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `gastosfamiliares_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gastosnegocio`
--

DROP TABLE IF EXISTS `gastosnegocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gastosnegocio` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `alquiler` decimal(6,2) DEFAULT '0.00',
  `servicios` decimal(6,2) DEFAULT '0.00',
  `personal` decimal(6,2) DEFAULT '0.00',
  `sunat` decimal(6,2) DEFAULT '0.00',
  `transporte` decimal(6,2) DEFAULT '0.00',
  `gastosfinancieros` decimal(6,2) DEFAULT '0.00',
  `otros` decimal(6,2) DEFAULT '0.00',
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `gastosnegocio_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ipspublicas`
--

DROP TABLE IF EXISTS `ipspublicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ipspublicas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `agencia` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardex` (
  `id` int(7) unsigned zerofill NOT NULL,
  `iddesembolso` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora_reg` datetime NOT NULL,
  `montopagado` decimal(7,2) NOT NULL,
  `idusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`,`iddesembolso`),
  KEY `iddesembolso` (`iddesembolso`),
  CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`iddesembolso`) REFERENCES `desembolso` (`iddesembolso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kardexpagocuotasca`
--

DROP TABLE IF EXISTS `kardexpagocuotasca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardexpagocuotasca` (
  `codigo` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuota` int NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montopagado` decimal(7,2) NOT NULL,
  PRIMARY KEY (`codigo`,`nrocuota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mora`
--

DROP TABLE IF EXISTS `mora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mora` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `costodiario` decimal(4,2) NOT NULL,
  `montoinicial` decimal(8,2) NOT NULL,
  `montofinal` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mueble_cliente`
--

DROP TABLE IF EXISTS `mueble_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mueble_cliente` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_cliente` (`idsolicitud`),
  CONSTRAINT `mueble_cliente_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2076 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `negocio`
--

DROP TABLE IF EXISTS `negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `negocio` (
  `idnegocio` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `codcliente` int(6) unsigned zerofill NOT NULL,
  `razonsocial` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO TIENE',
  `ruc` char(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'NO TIENE',
  `tel_cel` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `actividad` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad_espec` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `inicio_actividad` date DEFAULT NULL,
  `distrito_neg` int(4) unsigned zerofill NOT NULL DEFAULT '0831',
  `tipovia` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombrevia` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S/N',
  `Nro` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S/N',
  `interior` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S/N',
  `mz` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S/N',
  `lote` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'S/N',
  `tipozona` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombrezona` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `referencia` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `condicionvi` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idnegocio`),
  KEY `codcliente` (`codcliente`),
  CONSTRAINT `negocio_ibfk_1` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`codcliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `observacion`
--

DROP TABLE IF EXISTS `observacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `observacion` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `idusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'OBSERVADO' COMMENT 'Resuelto Observado',
  PRIMARY KEY (`id`),
  KEY `idsolicitud` (`idsolicitud`),
  CONSTRAINT `observacion_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `operaciones`
--

DROP TABLE IF EXISTS `operaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `operaciones` (
  `id` char(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `operaciones_ibfk_1` (`dni`),
  CONSTRAINT `operaciones_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `persona` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `iddesembolso` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuota` int(2) unsigned zerofill NOT NULL,
  `fecha_reg` date NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `moradias` int NOT NULL DEFAULT '0',
  `montopagado` decimal(6,2) NOT NULL,
  PRIMARY KEY (`iddesembolso`,`nrocuota`),
  KEY `codusuario` (`codusuario`),
  CONSTRAINT `cccc` FOREIGN KEY (`iddesembolso`, `nrocuota`) REFERENCES `cuotapago` (`iddesembolso`, `nrocuota`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`codusuario`) REFERENCES `usuario` (`codusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagoasesorc`
--

DROP TABLE IF EXISTS `pagoasesorc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagoasesorc` (
  `id` int(7) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idcaja` int(6) unsigned zerofill NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(7,2) NOT NULL,
  `saldo` decimal(7,2) NOT NULL,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'INGRESO',
  PRIMARY KEY (`id`),
  KEY `codusuario` (`codusuario`),
  KEY `dfgdfg` (`idcaja`),
  CONSTRAINT `dfgdfg` FOREIGN KEY (`idcaja`) REFERENCES `caja` (`idreg`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pagoasesorc_ibfk_2` FOREIGN KEY (`codusuario`) REFERENCES `usuario` (`codusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7813 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagocuotaahorro`
--

DROP TABLE IF EXISTS `pagocuotaahorro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagocuotaahorro` (
  `codigo` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nrocuota` int NOT NULL,
  `fecha_reg` date NOT NULL,
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `montopagado` decimal(6,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`codigo`,`nrocuota`),
  CONSTRAINT `pagocuotaahorro_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `cuentaahorros` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagomora`
--

DROP TABLE IF EXISTS `pagomora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagomora` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `iddesembolso` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `diasmora` int NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `fechahora_reg` datetime NOT NULL,
  `estado` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`),
  KEY `iddesembolso` (`iddesembolso`),
  CONSTRAINT `pagomora_ibfk_1` FOREIGN KEY (`iddesembolso`) REFERENCES `desembolso` (`iddesembolso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=496 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pasivo`
--

DROP TABLE IF EXISTS `pasivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasivo` (
  `idpasivo` int unsigned NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'NO CORRIENTE',
  PRIMARY KEY (`idpasivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `perd_ganangral`
--

DROP TABLE IF EXISTS `perd_ganangral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perd_ganangral` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `ventas` decimal(7,2) NOT NULL DEFAULT '0.00',
  `costo` decimal(7,2) NOT NULL DEFAULT '0.00',
  `utilidad` decimal(7,2) NOT NULL DEFAULT '0.00',
  `costonegocio` decimal(7,2) NOT NULL DEFAULT '0.00',
  `utiloperativa` decimal(7,2) NOT NULL DEFAULT '0.00',
  `otrosing` decimal(7,2) NOT NULL DEFAULT '0.00',
  `otrosegr` decimal(7,2) NOT NULL DEFAULT '0.00',
  `gast_fam` decimal(7,2) NOT NULL DEFAULT '0.00',
  `utilidadneta` decimal(7,2) NOT NULL DEFAULT '0.00',
  `utilnetdiaria` decimal(7,2) NOT NULL DEFAULT '0.00' COMMENT 'PUEDE SER SEMANAL DEPENDE SOLICITUD',
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `perd_ganangral_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `perdidas_ganancias`
--

DROP TABLE IF EXISTS `perdidas_ganancias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perdidas_ganancias` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `tot_ing_mensual` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tot_cosprimo_m` decimal(8,2) NOT NULL DEFAULT '0.00',
  `margen_tot` decimal(8,2) NOT NULL DEFAULT '0.00',
  `ventas_cred` decimal(8,2) NOT NULL DEFAULT '0.00',
  `irrecuperable` decimal(8,2) NOT NULL DEFAULT '0.00',
  `cantproductos` int NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `perdidas_ganancias_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `distrito_nac` int(4) unsigned zerofill NOT NULL DEFAULT '0831',
  `celular` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ruc` char(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `estadocivil` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `distrito_domic` int(4) unsigned zerofill NOT NULL DEFAULT '0831',
  `grado_instr` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `profesion` varchar(90) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacionalidad` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'PERUANO',
  `tipovia` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombrevia` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nro` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'S/N',
  `interior` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'S/N',
  `mz` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'S/N',
  `lote` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'S/N',
  `tipozona` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombrezona` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `referencia` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipotrabajador` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'DEPENDIENTE',
  `ocupacion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'NINGUNO',
  `institucion_lab` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT 'NINGUNO',
  `tipovivienda` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'familiar propia alquilada otros',
  PRIMARY KEY (`dni`),
  KEY `distrito_nac` (`distrito_nac`),
  KEY `distrito_domic` (`distrito_domic`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`distrito_nac`) REFERENCES `distrito` (`iddistrito`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`distrito_domic`) REFERENCES `distrito` (`iddistrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prenda`
--

DROP TABLE IF EXISTS `prenda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prenda` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `descripcion` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `valorsoles` decimal(6,2) NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `prenda_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `propuestacred`
--

DROP TABLE IF EXISTS `propuestacred`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propuestacred` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL,
  `unidad_familiar` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `experiencia_cred` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `destino_prest` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `referencias` varchar(600) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idsolicitud`),
  CONSTRAINT `propuestacred_ibfk_1` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitud` (`idsolicitud`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provincia` (
  `idprovincia` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `iddepartamento` int(2) unsigned zerofill NOT NULL,
  PRIMARY KEY (`idprovincia`),
  KEY `iddepartamento` (`iddepartamento`),
  CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `reportegeneral`
--

DROP TABLE IF EXISTS `reportegeneral`;
/*!50001 DROP VIEW IF EXISTS `reportegeneral`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `reportegeneral` AS SELECT 
 1 AS `idsolicitud`,
 1 AS `direccion_dom`,
 1 AS `iddesembolso`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `cantplazo`,
 1 AS `estado`,
 1 AS `capital`,
 1 AS `interes`,
 1 AS `mora`,
 1 AS `totalpagado`,
 1 AS `tasa`,
 1 AS `cuotacapital`,
 1 AS `cuotareal`,
 1 AS `cuotainteres`,
 1 AS `cantcuotaspagados`,
 1 AS `capitalpagado`,
 1 AS `interespagado`,
 1 AS `saldocapital`,
 1 AS `saldointeres`,
 1 AS `costomora`,
 1 AS `pagomora`,
 1 AS `fecha_hora`,
 1 AS `idasesor`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud` (
  `idsolicitud` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `codcliente` int(6) unsigned zerofill NOT NULL COMMENT 'titular',
  `fecha` date NOT NULL,
  `idasesor` char(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` decimal(7,2) DEFAULT NULL,
  `producto` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Capital de trabajo, Activo Fijo, Tramnsporte, Consumo',
  `tipoplazo` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'diario o semanal',
  `cantplazo` int DEFAULT NULL,
  `codagencia` int DEFAULT '1' COMMENT 'cod agencia',
  `medioorigen` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'como se capto al cliente, promcion de campo, visito, referido',
  `estado` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'PENDIENTE' COMMENT 'PENDIENTE(APROBADO ES VIGENTE, RECHAZADO)FINALIZADO',
  PRIMARY KEY (`idsolicitud`),
  KEY `idasesor` (`idasesor`),
  KEY `codcliente` (`codcliente`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`codcliente`) REFERENCES `cliente` (`codcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`idasesor`) REFERENCES `asesor_finan` (`idasesor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=746 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo_user`
--

DROP TABLE IF EXISTS `tipo_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_user` (
  `idtipouser` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipouser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `codusuario` char(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(21) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(2) unsigned zerofill NOT NULL,
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT 'ACTIVO',
  PRIMARY KEY (`codusuario`),
  KEY `tipo` (`tipo`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_user` (`idtipouser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `vist_distprovdep`
--

DROP TABLE IF EXISTS `vist_distprovdep`;
/*!50001 DROP VIEW IF EXISTS `vist_distprovdep`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vist_distprovdep` AS SELECT 
 1 AS `iddistrito`,
 1 AS `distrito`,
 1 AS `idprovincia`,
 1 AS `provincia`,
 1 AS `iddepartamento`,
 1 AS `departamento`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_asesor`
--

DROP TABLE IF EXISTS `vista_asesor`;
/*!50001 DROP VIEW IF EXISTS `vista_asesor`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_asesor` AS SELECT 
 1 AS `idasesor`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `fecha_nac`,
 1 AS `distrito_nac`,
 1 AS `celular`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `ruc`,
 1 AS `estadocivil`,
 1 AS `distrito_domic`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistaaval`
--

DROP TABLE IF EXISTS `vistaaval`;
/*!50001 DROP VIEW IF EXISTS `vistaaval`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistaaval` AS SELECT 
 1 AS `codcliente`,
 1 AS `dniaval`,
 1 AS `apellidos`,
 1 AS `nombres`,
 1 AS `apenom`,
 1 AS `fecha_nac`,
 1 AS `distrito_nac`,
 1 AS `distritonombre_nac`,
 1 AS `idprovincia_nac`,
 1 AS `provincianombre_nac`,
 1 AS `iddepartamento_nac`,
 1 AS `departamentonombre_nac`,
 1 AS `celular`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `ruc`,
 1 AS `estadocivil`,
 1 AS `distrito_domic`,
 1 AS `distritonombre_domic`,
 1 AS `idprovincia_domic`,
 1 AS `provincianombre_domic`,
 1 AS `iddepartamento_domic`,
 1 AS `departamentonombre_domic`,
 1 AS `grado_instr`,
 1 AS `profesion`,
 1 AS `nacionalidad`,
 1 AS `tipovia`,
 1 AS `nombrevia`,
 1 AS `Nro`,
 1 AS `interior`,
 1 AS `mz`,
 1 AS `lote`,
 1 AS `tipozona`,
 1 AS `nombrezona`,
 1 AS `referencia`,
 1 AS `tipotrabajador`,
 1 AS `ocupacion`,
 1 AS `institucion_lab`,
 1 AS `tipovivienda`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistacajasegresosingresos`
--

DROP TABLE IF EXISTS `vistacajasegresosingresos`;
/*!50001 DROP VIEW IF EXISTS `vistacajasegresosingresos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistacajasegresosingresos` AS SELECT 
 1 AS `idreg`,
 1 AS `fecha_hora`,
 1 AS `codusuario`,
 1 AS `cantidad`,
 1 AS `tipo`,
 1 AS `saldo`,
 1 AS `descripcion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistaclienteahorros`
--

DROP TABLE IF EXISTS `vistaclienteahorros`;
/*!50001 DROP VIEW IF EXISTS `vistaclienteahorros`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistaclienteahorros` AS SELECT 
 1 AS `codigoca`,
 1 AS `estado`,
 1 AS `fecha_reg`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `fecha_nac`,
 1 AS `distritonombre_nac`,
 1 AS `provincianombre_nac`,
 1 AS `departamentonombre_nac`,
 1 AS `celular`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `distritonombre_domic`,
 1 AS `provincianombre_domic`,
 1 AS `departamentonombre_domic`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistaconyugue`
--

DROP TABLE IF EXISTS `vistaconyugue`;
/*!50001 DROP VIEW IF EXISTS `vistaconyugue`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistaconyugue` AS SELECT 
 1 AS `dni`,
 1 AS `dniconyugue`,
 1 AS `apellidos`,
 1 AS `nombres`,
 1 AS `apenom`,
 1 AS `fecha_nac`,
 1 AS `distrito_nac`,
 1 AS `distritonombre_nac`,
 1 AS `idprovincia_nac`,
 1 AS `provincianombre_nac`,
 1 AS `iddepartamento_nac`,
 1 AS `departamentonombre_nac`,
 1 AS `celular`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `ruc`,
 1 AS `estadocivil`,
 1 AS `distrito_domic`,
 1 AS `distritonombre_domic`,
 1 AS `idprovincia_domic`,
 1 AS `provincianombre_domic`,
 1 AS `iddepartamento_domic`,
 1 AS `departamentonombre_domic`,
 1 AS `grado_instr`,
 1 AS `profesion`,
 1 AS `nacionalidad`,
 1 AS `tipovia`,
 1 AS `nombrevia`,
 1 AS `Nro`,
 1 AS `interior`,
 1 AS `mz`,
 1 AS `lote`,
 1 AS `tipozona`,
 1 AS `nombrezona`,
 1 AS `referencia`,
 1 AS `tipotrabajador`,
 1 AS `ocupacion`,
 1 AS `institucion_lab`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistacuentaahorros`
--

DROP TABLE IF EXISTS `vistacuentaahorros`;
/*!50001 DROP VIEW IF EXISTS `vistacuentaahorros`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistacuentaahorros` AS SELECT 
 1 AS `codigo`,
 1 AS `codigoca`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `plazo`,
 1 AS `tipoplazo`,
 1 AS `totaldias`,
 1 AS `frecuencia`,
 1 AS `nrocuotas`,
 1 AS `fecha_registro`,
 1 AS `monto`,
 1 AS `fechainicio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistacuotaspago`
--

DROP TABLE IF EXISTS `vistacuotaspago`;
/*!50001 DROP VIEW IF EXISTS `vistacuotaspago`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistacuotaspago` AS SELECT 
 1 AS `iddesembolso`,
 1 AS `nrocuota`,
 1 AS `fecha_prog`,
 1 AS `nombredia`,
 1 AS `cuota`,
 1 AS `saldo`,
 1 AS `estado`,
 1 AS `fechapago`,
 1 AS `mora`,
 1 AS `montopagado`,
 1 AS `usuario`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistadesembolsossinpagos`
--

DROP TABLE IF EXISTS `vistadesembolsossinpagos`;
/*!50001 DROP VIEW IF EXISTS `vistadesembolsossinpagos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistadesembolsossinpagos` AS SELECT 
 1 AS `iddesembolso`,
 1 AS `fecha_hora`,
 1 AS `idsolicitud`,
 1 AS `monto`,
 1 AS `interes`,
 1 AS `plazo`,
 1 AS `unidplazo`,
 1 AS `total`,
 1 AS `apenom`,
 1 AS `tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistakardexpagos`
--

DROP TABLE IF EXISTS `vistakardexpagos`;
/*!50001 DROP VIEW IF EXISTS `vistakardexpagos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistakardexpagos` AS SELECT 
 1 AS `iddesembolso`,
 1 AS `idsolicitud`,
 1 AS `fecha_hora_reg`,
 1 AS `montopagado`,
 1 AS `idusuario`,
 1 AS `codcliente`,
 1 AS `idasesor`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `totalpagado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistakardexpagos2`
--

DROP TABLE IF EXISTS `vistakardexpagos2`;
/*!50001 DROP VIEW IF EXISTS `vistakardexpagos2`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistakardexpagos2` AS SELECT 
 1 AS `idkardex`,
 1 AS `iddesembolso`,
 1 AS `idsolicitud`,
 1 AS `fecha_hora_reg`,
 1 AS `montopagado`,
 1 AS `idusuario`,
 1 AS `codcliente`,
 1 AS `idasesor`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `totalpagado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistanegocio`
--

DROP TABLE IF EXISTS `vistanegocio`;
/*!50001 DROP VIEW IF EXISTS `vistanegocio`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistanegocio` AS SELECT 
 1 AS `idnegocio`,
 1 AS `codcliente`,
 1 AS `razonsocial`,
 1 AS `ruc`,
 1 AS `tel_cel`,
 1 AS `actividad`,
 1 AS `actividad_espec`,
 1 AS `inicio_actividad`,
 1 AS `distrito_neg`,
 1 AS `distrito`,
 1 AS `provincia`,
 1 AS `departamento`,
 1 AS `tipovia`,
 1 AS `nombrevia`,
 1 AS `Nro`,
 1 AS `interior`,
 1 AS `mz`,
 1 AS `lote`,
 1 AS `tipozona`,
 1 AS `nombrezona`,
 1 AS `referencia`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapagadosahorros`
--

DROP TABLE IF EXISTS `vistapagadosahorros`;
/*!50001 DROP VIEW IF EXISTS `vistapagadosahorros`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapagadosahorros` AS SELECT 
 1 AS `codigocuentaa`,
 1 AS `nrocuota`,
 1 AS `fecha`,
 1 AS `nombredia`,
 1 AS `codigoca`,
 1 AS `monto`,
 1 AS `nrocuotapagado`,
 1 AS `fechapagado`,
 1 AS `codusuario`,
 1 AS `montopagado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapagos`
--

DROP TABLE IF EXISTS `vistapagos`;
/*!50001 DROP VIEW IF EXISTS `vistapagos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapagos` AS SELECT 
 1 AS `iddesembolso`,
 1 AS `nrocuota`,
 1 AS `fecha_prog`,
 1 AS `nombredia`,
 1 AS `cuota`,
 1 AS `saldooriginal`,
 1 AS `fechapagado`,
 1 AS `montopagado`,
 1 AS `moradias`,
 1 AS `codusuario`,
 1 AS `resta`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapagospordesembolso`
--

DROP TABLE IF EXISTS `vistapagospordesembolso`;
/*!50001 DROP VIEW IF EXISTS `vistapagospordesembolso`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapagospordesembolso` AS SELECT 
 1 AS `iddesembolso`,
 1 AS `idsolicitud`,
 1 AS `total`,
 1 AS `totalpagado`,
 1 AS `saldo`,
 1 AS `moradias`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapagosporusuario`
--

DROP TABLE IF EXISTS `vistapagosporusuario`;
/*!50001 DROP VIEW IF EXISTS `vistapagosporusuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapagosporusuario` AS SELECT 
 1 AS `codusuario`,
 1 AS `monto`,
 1 AS `fecha_reg`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapagosusuariohoy`
--

DROP TABLE IF EXISTS `vistapagosusuariohoy`;
/*!50001 DROP VIEW IF EXISTS `vistapagosusuariohoy`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapagosusuariohoy` AS SELECT 
 1 AS `codusuario`,
 1 AS `dni`,
 1 AS `monto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistapersona`
--

DROP TABLE IF EXISTS `vistapersona`;
/*!50001 DROP VIEW IF EXISTS `vistapersona`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistapersona` AS SELECT 
 1 AS `dni`,
 1 AS `apellidos`,
 1 AS `nombres`,
 1 AS `fecha_nac`,
 1 AS `distrito_nac`,
 1 AS `distritonombre_nac`,
 1 AS `idprovincia_nac`,
 1 AS `provincianombre_nac`,
 1 AS `iddepartamento_nac`,
 1 AS `departamentonombre_nac`,
 1 AS `celular`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `ruc`,
 1 AS `estadocivil`,
 1 AS `distrito_domic`,
 1 AS `distritonombre_domic`,
 1 AS `idprovincia_domic`,
 1 AS `provincianombre_domic`,
 1 AS `iddepartamento_domic`,
 1 AS `departamentonombre_domic`,
 1 AS `grado_instr`,
 1 AS `profesion`,
 1 AS `nacionalidad`,
 1 AS `tipovia`,
 1 AS `nombrevia`,
 1 AS `Nro`,
 1 AS `interior`,
 1 AS `mz`,
 1 AS `lote`,
 1 AS `tipozona`,
 1 AS `nombrezona`,
 1 AS `referencia`,
 1 AS `tipotrabajador`,
 1 AS `ocupacion`,
 1 AS `institucion_lab`,
 1 AS `tipovivienda`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistasolicitdesembolsados`
--

DROP TABLE IF EXISTS `vistasolicitdesembolsados`;
/*!50001 DROP VIEW IF EXISTS `vistasolicitdesembolsados`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistasolicitdesembolsados` AS SELECT 
 1 AS `idsolicitud`,
 1 AS `codcliente`,
 1 AS `fecha`,
 1 AS `idasesor`,
 1 AS `estado`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `tipo`,
 1 AS `tipoplazo`,
 1 AS `iddesembolso`,
 1 AS `fecha_hora`,
 1 AS `monto`,
 1 AS `interes`,
 1 AS `plazo`,
 1 AS `unidplazo`,
 1 AS `direccion_dom`,
 1 AS `direccion_neg`,
 1 AS `total`,
 1 AS `totalpagado`,
 1 AS `moradias`,
 1 AS `pagomora`,
 1 AS `porc`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistasolicitud`
--

DROP TABLE IF EXISTS `vistasolicitud`;
/*!50001 DROP VIEW IF EXISTS `vistasolicitud`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistasolicitud` AS SELECT 
 1 AS `idsolicitud`,
 1 AS `codcliente`,
 1 AS `fecha`,
 1 AS `idasesor`,
 1 AS `tipo`,
 1 AS `monto`,
 1 AS `producto`,
 1 AS `tipoplazo`,
 1 AS `cantplazo`,
 1 AS `medioorigen`,
 1 AS `estado`,
 1 AS `dni`,
 1 AS `apenom`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistasolicitudesadesembolsar`
--

DROP TABLE IF EXISTS `vistasolicitudesadesembolsar`;
/*!50001 DROP VIEW IF EXISTS `vistasolicitudesadesembolsar`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistasolicitudesadesembolsar` AS SELECT 
 1 AS `idsolicitud`,
 1 AS `codcliente`,
 1 AS `fecha`,
 1 AS `idasesor`,
 1 AS `tipo`,
 1 AS `monto`,
 1 AS `producto`,
 1 AS `tipoplazo`,
 1 AS `cantplazo`,
 1 AS `medioorigen`,
 1 AS `estado`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `tasainteres`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vistausuario`
--

DROP TABLE IF EXISTS `vistausuario`;
/*!50001 DROP VIEW IF EXISTS `vistausuario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vistausuario` AS SELECT 
 1 AS `codusuario`,
 1 AS `tipo`,
 1 AS `dni`,
 1 AS `apenom`,
 1 AS `fecha_nac`,
 1 AS `sexo`,
 1 AS `email`,
 1 AS `estadocivil`,
 1 AS `celular`,
 1 AS `nacionalidad`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'tuamigo_db'
--

--
-- Dumping routines for database 'tuamigo_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `cargaranalcual_solant` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cargaranalcual_solant`(	IN codsolicitudanterior INT(6), IN codsolicitudactual INT(6))
BEGIN
IF EXISTS(SELECT * FROM analisit_cual WHERE idsolicitud=codsolicitudactual)
THEN
	SET @tg=(SELECT tipogarantia FROM analisit_cual WHERE idsolicitud = 156);
	SET @cf=(SELECT cargafamiliar FROM analisit_cual WHERE idsolicitud = 156);	
	SET @rem= (SELECT riesgoedadmax FROM analisit_cual WHERE idsolicitud = 156);
	SET @ac=(SELECT antecedentescred FROM analisit_cual WHERE idsolicitud = 156);
	SET @rup=(SELECT recorpagoult FROM analisit_cual WHERE idsolicitud = 156);
	SET @nd=(SELECT niveldesarr FROM analisit_cual WHERE idsolicitud = 156);
	SET @tn=(SELECT tiempo_neg FROM analisit_cual WHERE idsolicitud = 156);
	SET @cing=(SELECT control_ingegre FROM analisit_cual WHERE idsolicitud = 156);
	SET @vt=(SELECT vent_totdec FROM analisit_cual WHERE idsolicitud = 156);
	SET @cs=(SELECT compsubsector FROM analisit_cual WHERE idsolicitud = 156);
	SET @tuf=(SELECT totunidfamiliar FROM analisit_cual WHERE idsolicitud = 156);
	SET @tue=(SELECT totunidempresa FROM analisit_cual WHERE idsolicitud = 156);
	SET @tot=(SELECT total FROM analisit_cual WHERE idsolicitud = 156);
	UPDATE analisit_cual
	SET tipogarantia = @tg, 
	cargafamiliar=@cf, 
	riesgoedadmax=@rem, 
	antecedentescred=@ac, 
	recorpagoult=@rup, 
	niveldesarr=@nd, 
	tiempo_neg=@tn, 
	control_ingegre=@cing, 
	vent_totdec=@vt, 
	compsubsector=@cs, 
	totunidfamiliar=@tuf, 
	totunidempresa=@tue, 
	total=@tot
	WHERE idsolicitud=168;
ELSE
	INSERT INTO analisit_cual 
	SELECT codsolicitudactual, tipogarantia, cargafamiliar, riesgoedadmax, antecedentescred, recorpagoult, niveldesarr, tiempo_neg, control_ingegre, vent_totdec, compsubsector, totunidfamiliar, totunidempresa, total 
	FROM analisit_cual WHERE idsolicitud = codsolicitudanterior;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cargarbalance_solant` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarbalance_solant`(	IN codsolicitudanterior INT(6), IN codsolicitudactual INT(6))
BEGIN
IF EXISTS(SELECT * FROM balance WHERE idsolicitud=codsolicitudactual)
THEN
	DELETE FROM balance WHERE idsolicitud=codsolicitudactual;
	DELETE FROM detalle_inventariobg WHERE idsolicitud=codsolicitudactual;
	DELETE FROM mueble_cliente WHERE idsolicitud=codsolicitudactual;
	DELETE FROM deuda_entidadfinan WHERE idsolicitud=codsolicitudactual;
END IF;
	INSERT INTO balance 
	SELECT codsolicitudactual, total_activo, total_pasivo, patrimonio, fecha FROM balance WHERE idsolicitud=codsolicitudanterior;
	INSERT INTO det_balance
	SELECT codsolicitudactual, `activocaja`,`activobancos`,`activoctascobrar`,`activoinventarios`,`pasivodeudaprove`,
	`pasivodeudaent`,`pasivodeudaemprender`,`activomueble`,`activootrosact`,`activodepre`,`pasivolargop`,`otrascuentaspagar`,
	`totalacorriente`,`totalpcorriente`,`totalancorriente`,`totalpncorriente` FROM det_balance WHERE idsolicitud=codsolicitudanterior;
	
	INSERT INTO `detalle_inventariobg`
	SELECT codsolicitudactual, `inv_materiales`,`inv_prodproc`,`inv_prodtermi` FROM `detalle_inventariobg` WHERE idsolicitud=codsolicitudanterior;
	
	INSERT INTO mueble_cliente (idsolicitud, descripcion, cantidad)
	SELECT codsolicitudactual, `descripcion`,`cantidad` FROM mueble_cliente WHERE idsolicitud=codsolicitudanterior;	
	
	INSERT INTO `deuda_entidadfinan` (idsolicitud, desc_entidad, cantidad)
	SELECT codsolicitudactual, `desc_entidad`,`cantidad` FROM deuda_entidadfinan WHERE idsolicitud=codsolicitudanterior;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cargarperdgan_solant` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarperdgan_solant`(	IN codsolicitudanterior INT(6), IN codsolicitudactual INT(6))
BEGIN
IF EXISTS(SELECT * FROM perd_ganangral WHERE idsolicitud=codsolicitudactual)
THEN
	DELETE FROM perd_ganangral WHERE idsolicitud=codsolicitudactual;
	DELETE FROM perdidas_ganancias WHERE idsolicitud=codsolicitudactual;
	DELETE FROM gastosnegocio WHERE idsolicitud=codsolicitudactual;
	DELETE FROM gastosfamiliares WHERE idsolicitud=codsolicitudactual;
END IF;
	INSERT INTO perd_ganangral 
	SELECT codsolicitudactual,`ventas`,`costo`,`utilidad`,`costonegocio`,`utiloperativa`,`otrosing`,`otrosegr`,`gast_fam`,`utilidadneta`,`utilnetdiaria`
	FROM perd_ganangral WHERE idsolicitud=codsolicitudanterior;
	
	
	INSERT INTO perdidas_ganancias
	SELECT codsolicitudactual,`tot_ing_mensual`,`tot_cosprimo_m`,`margen_tot`,`ventas_cred`,`irrecuperable`,`cantproductos` FROM perdidas_ganancias WHERE idsolicitud=codsolicitudanterior;
	
	INSERT INTO det_perdiganan
	SELECT codsolicitudactual,`nroproducto`,`descripcion`,`unidadmedida`,`preciounit`,`primaprincipal`,`primasecundaria`,
	`primacomplement`,`matprima`,`manoobra1`,`manoobra2`,`manoobra`,`costoprimounit`,`prodmensual`,
	`ventastotales`,`totcostoprimo`,`margenventas` FROM det_perdiganan WHERE idsolicitud=codsolicitudanterior;
	
	INSERT INTO gastosnegocio
	SELECT codsolicitudactual,`alquiler`,`servicios`,`personal`,`sunat`,`transporte`,`gastosfinancieros`,`otros` FROM gastosnegocio WHERE idsolicitud=codsolicitudanterior;	
	
	INSERT INTO gastosfamiliares
	SELECT codsolicitudactual, `alimentacion`,`alquileres`,`educacion`,`servicios`,`transporte`,`salud`,`otros` FROM gastosfamiliares WHERE idsolicitud=codsolicitudanterior;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `cargarpropuesta_solant` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarpropuesta_solant`(IN codsolicitudanterior INT(6), IN codsolicitudactual INT(6))
BEGIN
IF EXISTS(SELECT * FROM propuestacred WHERE idsolicitud=codsolicitudactual)
THEN
	DELETE FROM propuestacred WHERE idsolicitud=codsolicitudactual;
END IF;
	INSERT INTO propuestacred 
	SELECT codsolicitudactual,`unidad_familiar`,`experiencia_cred`,`destino_prest`,`referencias`
	FROM propuestacred WHERE idsolicitud=codsolicitudanterior;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `asesorsaldo`
--

/*!50001 DROP VIEW IF EXISTS `asesorsaldo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `asesorsaldo` AS select `usuario`.`codusuario` AS `codusuario`,`usuario`.`dni` AS `dni`,(select `pagoasesorc`.`saldo` from `pagoasesorc` where (`pagoasesorc`.`codusuario` = `usuario`.`codusuario`) order by `pagoasesorc`.`id` desc limit 1) AS `saldo` from `usuario` where (`usuario`.`tipo` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `clientes`
--

/*!50001 DROP VIEW IF EXISTS `clientes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `clientes` AS select `cliente`.`codcliente` AS `codcliente`,`cliente`.`dni` AS `dni`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `apenom`,`persona`.`ruc` AS `ruc`,`persona`.`fecha_nac` AS `fecha_nac`,`persona`.`sexo` AS `sexo`,`persona`.`estadocivil` AS `estadocivil`,`persona`.`grado_instr` AS `grado_instr`,`persona`.`nacionalidad` AS `nacionalidad`,`persona`.`distrito_nac` AS `distrito_nac`,`persona`.`distrito_domic` AS `distrito_domic`,`persona`.`tipotrabajador` AS `tipotrabajador`,`persona`.`ocupacion` AS `ocupacion`,`persona`.`institucion_lab` AS `institucion_lab`,`persona`.`email` AS `email`,`persona`.`tipovia` AS `tipovia`,`persona`.`nombrevia` AS `nombrevia`,`persona`.`Nro` AS `nro`,`persona`.`interior` AS `interior`,`persona`.`celular` AS `celular`,`persona`.`mz` AS `mz`,`persona`.`lote` AS `lote`,`persona`.`tipozona` AS `tipozona`,`persona`.`nombrezona` AS `nombrezona`,`persona`.`referencia` AS `referencia`,`cliente`.`estado` AS `estado`,`cliente`.`fecha_registro` AS `fecha_registro`,`persona`.`tipovivienda` AS `tipovivienda`,`cliente`.`idusuario` AS `idusuario` from (`cliente` join `persona` on((`cliente`.`dni` = `persona`.`dni`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reportegeneral`
--

/*!50001 DROP VIEW IF EXISTS `reportegeneral`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reportegeneral` AS select `vistasolicitud`.`idsolicitud` AS `idsolicitud`,`desembolso`.`direccion_dom` AS `direccion_dom`,`desembolso`.`iddesembolso` AS `iddesembolso`,`vistasolicitud`.`dni` AS `dni`,`vistasolicitud`.`apenom` AS `apenom`,`vistasolicitud`.`cantplazo` AS `cantplazo`,`vistasolicitud`.`estado` AS `estado`,`vistasolicitud`.`monto` AS `capital`,(`desembolso`.`total` - `vistasolicitud`.`monto`) AS `interes`,`vistapagospordesembolso`.`moradias` AS `mora`,`vistapagospordesembolso`.`totalpagado` AS `totalpagado`,`desembolso`.`interes` AS `tasa`,(`vistasolicitud`.`monto` / `vistasolicitud`.`cantplazo`) AS `cuotacapital`,(`desembolso`.`total` / `vistasolicitud`.`cantplazo`) AS `cuotareal`,((`desembolso`.`total` - `vistasolicitud`.`monto`) / `vistasolicitud`.`cantplazo`) AS `cuotainteres`,(`vistapagospordesembolso`.`totalpagado` / (`desembolso`.`total` / `vistasolicitud`.`cantplazo`)) AS `cantcuotaspagados`,((`vistasolicitud`.`monto` / `vistasolicitud`.`cantplazo`) * (`vistapagospordesembolso`.`totalpagado` / (`desembolso`.`total` / `vistasolicitud`.`cantplazo`))) AS `capitalpagado`,(((`desembolso`.`total` - `vistasolicitud`.`monto`) / `vistasolicitud`.`cantplazo`) * (`vistapagospordesembolso`.`totalpagado` / (`desembolso`.`total` / `vistasolicitud`.`cantplazo`))) AS `interespagado`,(`vistasolicitud`.`monto` - coalesce(((`vistasolicitud`.`monto` / `vistasolicitud`.`cantplazo`) * (`vistapagospordesembolso`.`totalpagado` / (`desembolso`.`total` / `vistasolicitud`.`cantplazo`))),0)) AS `saldocapital`,((`desembolso`.`total` - `vistasolicitud`.`monto`) - coalesce((((`desembolso`.`total` - `vistasolicitud`.`monto`) / `vistasolicitud`.`cantplazo`) * (`vistapagospordesembolso`.`totalpagado` / (`desembolso`.`total` / `vistasolicitud`.`cantplazo`))),0)) AS `saldointeres`,(select `mora`.`costodiario` from `mora` where ((`mora`.`montoinicial` <= `vistasolicitud`.`monto`) and (`mora`.`montofinal` >= `vistasolicitud`.`monto`)) limit 1) AS `costomora`,(select sum(`pagomora`.`diasmora`) from `pagomora` where ((`pagomora`.`iddesembolso` = `desembolso`.`iddesembolso`) and (`pagomora`.`estado` = 'SI'))) AS `pagomora`,`desembolso`.`fecha_hora` AS `fecha_hora`,`vistasolicitud`.`idasesor` AS `idasesor` from ((`vistasolicitud` join `desembolso` on((`vistasolicitud`.`idsolicitud` = `desembolso`.`idsolicitud`))) left join `vistapagospordesembolso` on((`desembolso`.`iddesembolso` = `vistapagospordesembolso`.`iddesembolso`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vist_distprovdep`
--

/*!50001 DROP VIEW IF EXISTS `vist_distprovdep`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vist_distprovdep` AS select `distrito`.`iddistrito` AS `iddistrito`,`distrito`.`nombre` AS `distrito`,`provincia`.`idprovincia` AS `idprovincia`,`provincia`.`nombre` AS `provincia`,`departamento`.`iddepartamento` AS `iddepartamento`,`departamento`.`nombre` AS `departamento` from ((`distrito` join `provincia` on((`distrito`.`idprovincia` = `provincia`.`idprovincia`))) join `departamento` on((`provincia`.`iddepartamento` = `departamento`.`iddepartamento`))) order by `departamento`.`nombre`,`provincia`.`nombre`,`distrito`.`nombre` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_asesor`
--

/*!50001 DROP VIEW IF EXISTS `vista_asesor`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_asesor` AS select `asesor_finan`.`idasesor` AS `idasesor`,`persona`.`dni` AS `dni`,concat(`persona`.`apellidos`,' ',`persona`.`nombres`) AS `apenom`,`persona`.`fecha_nac` AS `fecha_nac`,`persona`.`distrito_nac` AS `distrito_nac`,`persona`.`celular` AS `celular`,`persona`.`sexo` AS `sexo`,`persona`.`email` AS `email`,`persona`.`ruc` AS `ruc`,`persona`.`estadocivil` AS `estadocivil`,`persona`.`distrito_domic` AS `distrito_domic` from (`asesor_finan` join `persona` on((`asesor_finan`.`dni` = `persona`.`dni`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistaaval`
--

/*!50001 DROP VIEW IF EXISTS `vistaaval`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistaaval` AS select `aval`.`codcliente` AS `codcliente`,`aval`.`dniaval` AS `dniaval`,`vistapersona`.`apellidos` AS `apellidos`,`vistapersona`.`nombres` AS `nombres`,concat(`vistapersona`.`apellidos`,' ',`vistapersona`.`nombres`) AS `apenom`,`vistapersona`.`fecha_nac` AS `fecha_nac`,`vistapersona`.`distrito_nac` AS `distrito_nac`,`vistapersona`.`distritonombre_nac` AS `distritonombre_nac`,`vistapersona`.`idprovincia_nac` AS `idprovincia_nac`,`vistapersona`.`provincianombre_nac` AS `provincianombre_nac`,`vistapersona`.`iddepartamento_nac` AS `iddepartamento_nac`,`vistapersona`.`departamentonombre_nac` AS `departamentonombre_nac`,`vistapersona`.`celular` AS `celular`,`vistapersona`.`sexo` AS `sexo`,`vistapersona`.`email` AS `email`,`vistapersona`.`ruc` AS `ruc`,`vistapersona`.`estadocivil` AS `estadocivil`,`vistapersona`.`distrito_domic` AS `distrito_domic`,`vistapersona`.`distritonombre_domic` AS `distritonombre_domic`,`vistapersona`.`idprovincia_domic` AS `idprovincia_domic`,`vistapersona`.`provincianombre_domic` AS `provincianombre_domic`,`vistapersona`.`iddepartamento_domic` AS `iddepartamento_domic`,`vistapersona`.`departamentonombre_domic` AS `departamentonombre_domic`,`vistapersona`.`grado_instr` AS `grado_instr`,`vistapersona`.`profesion` AS `profesion`,`vistapersona`.`nacionalidad` AS `nacionalidad`,`vistapersona`.`tipovia` AS `tipovia`,`vistapersona`.`nombrevia` AS `nombrevia`,`vistapersona`.`Nro` AS `Nro`,`vistapersona`.`interior` AS `interior`,`vistapersona`.`mz` AS `mz`,`vistapersona`.`lote` AS `lote`,`vistapersona`.`tipozona` AS `tipozona`,`vistapersona`.`nombrezona` AS `nombrezona`,`vistapersona`.`referencia` AS `referencia`,`vistapersona`.`tipotrabajador` AS `tipotrabajador`,`vistapersona`.`ocupacion` AS `ocupacion`,`vistapersona`.`institucion_lab` AS `institucion_lab`,`vistapersona`.`tipovivienda` AS `tipovivienda` from (`aval` join `vistapersona` on((`aval`.`dniaval` = `vistapersona`.`dni`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistacajasegresosingresos`
--

/*!50001 DROP VIEW IF EXISTS `vistacajasegresosingresos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistacajasegresosingresos` AS select `caja`.`idreg` AS `idreg`,`caja`.`fecha_hora` AS `fecha_hora`,`caja`.`codusuario` AS `codusuario`,`caja`.`cantidad` AS `cantidad`,`caja`.`tipo` AS `tipo`,`caja`.`saldo` AS `saldo`,`caja`.`descripcion` AS `descripcion` from `caja` where ((not((`caja`.`descripcion` like 'PAGO CUOTAS%'))) and (not((`caja`.`descripcion` like 'Pago de %'))) and (not((`caja`.`descripcion` like 'DESEMBOLSO ID%')))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistaclienteahorros`
--

/*!50001 DROP VIEW IF EXISTS `vistaclienteahorros`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistaclienteahorros` AS select `ca`.`codigoca` AS `codigoca`,`ca`.`estado` AS `estado`,`ca`.`fecha_reg` AS `fecha_reg`,`vp`.`dni` AS `dni`,concat(`vp`.`apellidos`,', ',`vp`.`nombres`) AS `apenom`,`vp`.`fecha_nac` AS `fecha_nac`,`vp`.`distritonombre_nac` AS `distritonombre_nac`,`vp`.`provincianombre_nac` AS `provincianombre_nac`,`vp`.`departamentonombre_nac` AS `departamentonombre_nac`,`vp`.`celular` AS `celular`,`vp`.`sexo` AS `sexo`,`vp`.`email` AS `email`,`vp`.`distritonombre_domic` AS `distritonombre_domic`,`vp`.`provincianombre_domic` AS `provincianombre_domic`,`vp`.`departamentonombre_domic` AS `departamentonombre_domic` from (`clienteahorros` `ca` join `vistapersona` `vp` on((`ca`.`dni` = `vp`.`dni`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistaconyugue`
--

/*!50001 DROP VIEW IF EXISTS `vistaconyugue`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistaconyugue` AS select `conyugue`.`dni` AS `dni`,`conyugue`.`dniconyugue` AS `dniconyugue`,`vistapersona`.`apellidos` AS `apellidos`,`vistapersona`.`nombres` AS `nombres`,concat(`vistapersona`.`apellidos`,', ',`vistapersona`.`nombres`) AS `apenom`,`vistapersona`.`fecha_nac` AS `fecha_nac`,`vistapersona`.`distrito_nac` AS `distrito_nac`,`vistapersona`.`distritonombre_nac` AS `distritonombre_nac`,`vistapersona`.`idprovincia_nac` AS `idprovincia_nac`,`vistapersona`.`provincianombre_nac` AS `provincianombre_nac`,`vistapersona`.`iddepartamento_nac` AS `iddepartamento_nac`,`vistapersona`.`departamentonombre_nac` AS `departamentonombre_nac`,`vistapersona`.`celular` AS `celular`,`vistapersona`.`sexo` AS `sexo`,`vistapersona`.`email` AS `email`,`vistapersona`.`ruc` AS `ruc`,`vistapersona`.`estadocivil` AS `estadocivil`,`vistapersona`.`distrito_domic` AS `distrito_domic`,`vistapersona`.`distritonombre_domic` AS `distritonombre_domic`,`vistapersona`.`idprovincia_domic` AS `idprovincia_domic`,`vistapersona`.`provincianombre_domic` AS `provincianombre_domic`,`vistapersona`.`iddepartamento_domic` AS `iddepartamento_domic`,`vistapersona`.`departamentonombre_domic` AS `departamentonombre_domic`,`vistapersona`.`grado_instr` AS `grado_instr`,`vistapersona`.`profesion` AS `profesion`,`vistapersona`.`nacionalidad` AS `nacionalidad`,`vistapersona`.`tipovia` AS `tipovia`,`vistapersona`.`nombrevia` AS `nombrevia`,`vistapersona`.`Nro` AS `Nro`,`vistapersona`.`interior` AS `interior`,`vistapersona`.`mz` AS `mz`,`vistapersona`.`lote` AS `lote`,`vistapersona`.`tipozona` AS `tipozona`,`vistapersona`.`nombrezona` AS `nombrezona`,`vistapersona`.`referencia` AS `referencia`,`vistapersona`.`tipotrabajador` AS `tipotrabajador`,`vistapersona`.`ocupacion` AS `ocupacion`,`vistapersona`.`institucion_lab` AS `institucion_lab` from (`conyugue` join `vistapersona` on((`conyugue`.`dniconyugue` = `vistapersona`.`dni`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistacuentaahorros`
--

/*!50001 DROP VIEW IF EXISTS `vistacuentaahorros`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistacuentaahorros` AS select `ca`.`codigo` AS `codigo`,`ca`.`codigoca` AS `codigoca`,`vc`.`dni` AS `dni`,`vc`.`apenom` AS `apenom`,`ca`.`plazo` AS `plazo`,`ca`.`tipoplazo` AS `tipoplazo`,`ca`.`totaldias` AS `totaldias`,`ca`.`frecuencia` AS `frecuencia`,`ca`.`nrocuotas` AS `nrocuotas`,`ca`.`fecha_registro` AS `fecha_registro`,`ca`.`monto` AS `monto`,`ca`.`fechainicio` AS `fechainicio` from (`cuentaahorros` `ca` join `vistaclienteahorros` `vc` on((`ca`.`codigoca` = `vc`.`codigoca`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistacuotaspago`
--

/*!50001 DROP VIEW IF EXISTS `vistacuotaspago`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistacuotaspago` AS select `cp`.`iddesembolso` AS `iddesembolso`,`cp`.`nrocuota` AS `nrocuota`,`cp`.`fecha_prog` AS `fecha_prog`,`cp`.`nombredia` AS `nombredia`,`cp`.`cuota` AS `cuota`,`cp`.`saldo` AS `saldo`,(select count(0) from `pago` where ((`pago`.`iddesembolso` = `cp`.`iddesembolso`) and (`pago`.`nrocuota` = `cp`.`nrocuota`))) AS `estado`,(select `pago`.`fecha_reg` from `pago` where ((`pago`.`iddesembolso` = `cp`.`iddesembolso`) and (`pago`.`nrocuota` = `cp`.`nrocuota`))) AS `fechapago`,(select `pago`.`moradias` from `pago` where ((`pago`.`iddesembolso` = `cp`.`iddesembolso`) and (`pago`.`nrocuota` = `cp`.`nrocuota`))) AS `mora`,(select `pago`.`montopagado` from `pago` where ((`pago`.`iddesembolso` = `cp`.`iddesembolso`) and (`pago`.`nrocuota` = `cp`.`nrocuota`))) AS `montopagado`,(select `pago`.`codusuario` from `pago` where ((`pago`.`iddesembolso` = `cp`.`iddesembolso`) and (`pago`.`nrocuota` = `cp`.`nrocuota`))) AS `usuario` from `cuotapago` `cp` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistadesembolsossinpagos`
--

/*!50001 DROP VIEW IF EXISTS `vistadesembolsossinpagos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistadesembolsossinpagos` AS select `d`.`iddesembolso` AS `iddesembolso`,`d`.`fecha_hora` AS `fecha_hora`,`d`.`idsolicitud` AS `idsolicitud`,`d`.`monto` AS `monto`,`d`.`interes` AS `interes`,`d`.`plazo` AS `plazo`,`d`.`unidplazo` AS `unidplazo`,`d`.`total` AS `total`,`v`.`apenom` AS `apenom`,`v`.`tipo` AS `tipo` from (`desembolso` `d` join `vistasolicitud` `v` on((`d`.`idsolicitud` = `v`.`idsolicitud`))) where exists(select `p`.`iddesembolso` from `pago` `p` where (`p`.`iddesembolso` = `d`.`iddesembolso`)) is false */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistakardexpagos`
--

/*!50001 DROP VIEW IF EXISTS `vistakardexpagos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistakardexpagos` AS select `vistasolicitdesembolsados`.`iddesembolso` AS `iddesembolso`,`vistasolicitdesembolsados`.`idsolicitud` AS `idsolicitud`,`kardex`.`fecha_hora_reg` AS `fecha_hora_reg`,`kardex`.`montopagado` AS `montopagado`,`kardex`.`idusuario` AS `idusuario`,`vistasolicitdesembolsados`.`codcliente` AS `codcliente`,`vistasolicitdesembolsados`.`idasesor` AS `idasesor`,`vistasolicitdesembolsados`.`dni` AS `dni`,`vistasolicitdesembolsados`.`apenom` AS `apenom`,`vistasolicitdesembolsados`.`totalpagado` AS `totalpagado` from (`kardex` join `vistasolicitdesembolsados` on((`kardex`.`iddesembolso` = `vistasolicitdesembolsados`.`iddesembolso`))) where (cast(`kardex`.`fecha_hora_reg` as date) like cast(curdate() as date)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistakardexpagos2`
--

/*!50001 DROP VIEW IF EXISTS `vistakardexpagos2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistakardexpagos2` AS select `kardex`.`id` AS `idkardex`,`vistasolicitdesembolsados`.`iddesembolso` AS `iddesembolso`,`vistasolicitdesembolsados`.`idsolicitud` AS `idsolicitud`,`kardex`.`fecha_hora_reg` AS `fecha_hora_reg`,`kardex`.`montopagado` AS `montopagado`,`kardex`.`idusuario` AS `idusuario`,`vistasolicitdesembolsados`.`codcliente` AS `codcliente`,`vistasolicitdesembolsados`.`idasesor` AS `idasesor`,`vistasolicitdesembolsados`.`dni` AS `dni`,`vistasolicitdesembolsados`.`apenom` AS `apenom`,`vistasolicitdesembolsados`.`totalpagado` AS `totalpagado` from (`kardex` join `vistasolicitdesembolsados` on((`kardex`.`iddesembolso` = `vistasolicitdesembolsados`.`iddesembolso`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistanegocio`
--

/*!50001 DROP VIEW IF EXISTS `vistanegocio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistanegocio` AS select `negocio`.`idnegocio` AS `idnegocio`,`negocio`.`codcliente` AS `codcliente`,`negocio`.`razonsocial` AS `razonsocial`,`negocio`.`ruc` AS `ruc`,`negocio`.`tel_cel` AS `tel_cel`,`negocio`.`actividad` AS `actividad`,`negocio`.`actividad_espec` AS `actividad_espec`,`negocio`.`inicio_actividad` AS `inicio_actividad`,`negocio`.`distrito_neg` AS `distrito_neg`,`vist_distprovdep`.`distrito` AS `distrito`,`vist_distprovdep`.`provincia` AS `provincia`,`vist_distprovdep`.`departamento` AS `departamento`,`negocio`.`tipovia` AS `tipovia`,`negocio`.`nombrevia` AS `nombrevia`,`negocio`.`Nro` AS `Nro`,`negocio`.`interior` AS `interior`,`negocio`.`mz` AS `mz`,`negocio`.`lote` AS `lote`,`negocio`.`tipozona` AS `tipozona`,`negocio`.`nombrezona` AS `nombrezona`,`negocio`.`referencia` AS `referencia` from (`negocio` join `vist_distprovdep` on((`negocio`.`distrito_neg` = `vist_distprovdep`.`iddistrito`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapagadosahorros`
--

/*!50001 DROP VIEW IF EXISTS `vistapagadosahorros`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapagadosahorros` AS select `cuotapagoahorro`.`codigocuentaa` AS `codigocuentaa`,`cuotapagoahorro`.`nrocuota` AS `nrocuota`,`cuotapagoahorro`.`fecha` AS `fecha`,`cuotapagoahorro`.`nombredia` AS `nombredia`,`cuentaahorros`.`codigoca` AS `codigoca`,`cuentaahorros`.`monto` AS `monto`,`pagocuotaahorro`.`nrocuota` AS `nrocuotapagado`,`pagocuotaahorro`.`fecha_reg` AS `fechapagado`,`pagocuotaahorro`.`codusuario` AS `codusuario`,`pagocuotaahorro`.`montopagado` AS `montopagado` from ((`cuotapagoahorro` join `cuentaahorros` on((`cuotapagoahorro`.`codigocuentaa` = `cuentaahorros`.`codigo`))) left join `pagocuotaahorro` on(((`cuotapagoahorro`.`codigocuentaa` = `pagocuotaahorro`.`codigo`) and (`cuotapagoahorro`.`nrocuota` = `pagocuotaahorro`.`nrocuota`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapagos`
--

/*!50001 DROP VIEW IF EXISTS `vistapagos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapagos` AS select `cuotapago`.`iddesembolso` AS `iddesembolso`,`cuotapago`.`nrocuota` AS `nrocuota`,`cuotapago`.`fecha_prog` AS `fecha_prog`,`cuotapago`.`nombredia` AS `nombredia`,`cuotapago`.`cuota` AS `cuota`,`cuotapago`.`saldo` AS `saldooriginal`,`pago`.`fecha_reg` AS `fechapagado`,`pago`.`montopagado` AS `montopagado`,`pago`.`moradias` AS `moradias`,`pago`.`codusuario` AS `codusuario`,(`cuotapago`.`cuota` - coalesce(`pago`.`montopagado`,0)) AS `resta` from (`cuotapago` left join `pago` on(((`cuotapago`.`iddesembolso` = `pago`.`iddesembolso`) and (`cuotapago`.`nrocuota` = `pago`.`nrocuota`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapagospordesembolso`
--

/*!50001 DROP VIEW IF EXISTS `vistapagospordesembolso`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapagospordesembolso` AS select `pago`.`iddesembolso` AS `iddesembolso`,`desembolso`.`idsolicitud` AS `idsolicitud`,`desembolso`.`total` AS `total`,sum(`pago`.`montopagado`) AS `totalpagado`,(`desembolso`.`total` - sum(`pago`.`montopagado`)) AS `saldo`,sum(`pago`.`moradias`) AS `moradias` from (`pago` join `desembolso` on((`pago`.`iddesembolso` = `desembolso`.`iddesembolso`))) group by `pago`.`iddesembolso` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapagosporusuario`
--

/*!50001 DROP VIEW IF EXISTS `vistapagosporusuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapagosporusuario` AS select `pago`.`codusuario` AS `codusuario`,sum(`pago`.`montopagado`) AS `monto`,`pago`.`fecha_reg` AS `fecha_reg` from `pago` group by `pago`.`fecha_reg`,`pago`.`codusuario` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapagosusuariohoy`
--

/*!50001 DROP VIEW IF EXISTS `vistapagosusuariohoy`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapagosusuariohoy` AS select `usuario`.`codusuario` AS `codusuario`,`usuario`.`dni` AS `dni`,(select `vistapagosporusuario`.`monto` from `vistapagosporusuario` where ((`vistapagosporusuario`.`fecha_reg` = curdate()) and (`usuario`.`codusuario` = `vistapagosporusuario`.`codusuario`))) AS `monto` from `usuario` where (`usuario`.`tipo` <> 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistapersona`
--

/*!50001 DROP VIEW IF EXISTS `vistapersona`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistapersona` AS select `persona`.`dni` AS `dni`,`persona`.`apellidos` AS `apellidos`,`persona`.`nombres` AS `nombres`,`persona`.`fecha_nac` AS `fecha_nac`,`persona`.`distrito_nac` AS `distrito_nac`,`vd1`.`distrito` AS `distritonombre_nac`,`vd1`.`idprovincia` AS `idprovincia_nac`,`vd1`.`provincia` AS `provincianombre_nac`,`vd1`.`iddepartamento` AS `iddepartamento_nac`,`vd1`.`departamento` AS `departamentonombre_nac`,`persona`.`celular` AS `celular`,`persona`.`sexo` AS `sexo`,`persona`.`email` AS `email`,`persona`.`ruc` AS `ruc`,`persona`.`estadocivil` AS `estadocivil`,`persona`.`distrito_domic` AS `distrito_domic`,`vd2`.`distrito` AS `distritonombre_domic`,`vd2`.`idprovincia` AS `idprovincia_domic`,`vd2`.`provincia` AS `provincianombre_domic`,`vd2`.`iddepartamento` AS `iddepartamento_domic`,`vd2`.`departamento` AS `departamentonombre_domic`,`persona`.`grado_instr` AS `grado_instr`,`persona`.`profesion` AS `profesion`,`persona`.`nacionalidad` AS `nacionalidad`,`persona`.`tipovia` AS `tipovia`,`persona`.`nombrevia` AS `nombrevia`,`persona`.`Nro` AS `Nro`,`persona`.`interior` AS `interior`,`persona`.`mz` AS `mz`,`persona`.`lote` AS `lote`,`persona`.`tipozona` AS `tipozona`,`persona`.`nombrezona` AS `nombrezona`,`persona`.`referencia` AS `referencia`,`persona`.`tipotrabajador` AS `tipotrabajador`,`persona`.`ocupacion` AS `ocupacion`,`persona`.`institucion_lab` AS `institucion_lab`,`persona`.`tipovivienda` AS `tipovivienda` from ((`persona` join `vist_distprovdep` `vd1` on((`persona`.`distrito_nac` = `vd1`.`iddistrito`))) join `vist_distprovdep` `vd2` on((`persona`.`distrito_domic` = `vd2`.`iddistrito`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistasolicitdesembolsados`
--

/*!50001 DROP VIEW IF EXISTS `vistasolicitdesembolsados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistasolicitdesembolsados` AS select `vistasolicitud`.`idsolicitud` AS `idsolicitud`,`vistasolicitud`.`codcliente` AS `codcliente`,`vistasolicitud`.`fecha` AS `fecha`,`vistasolicitud`.`idasesor` AS `idasesor`,`vistasolicitud`.`estado` AS `estado`,`vistasolicitud`.`dni` AS `dni`,`vistasolicitud`.`apenom` AS `apenom`,`vistasolicitud`.`tipo` AS `tipo`,`vistasolicitud`.`tipoplazo` AS `tipoplazo`,`desembolso`.`iddesembolso` AS `iddesembolso`,`desembolso`.`fecha_hora` AS `fecha_hora`,`desembolso`.`monto` AS `monto`,`desembolso`.`interes` AS `interes`,`desembolso`.`plazo` AS `plazo`,`desembolso`.`unidplazo` AS `unidplazo`,`desembolso`.`direccion_dom` AS `direccion_dom`,`desembolso`.`direccion_neg` AS `direccion_neg`,`desembolso`.`total` AS `total`,`vistapagospordesembolso`.`totalpagado` AS `totalpagado`,(select sum(`pago`.`moradias`) from `pago` where (`pago`.`iddesembolso` = `desembolso`.`iddesembolso`)) AS `moradias`,(select sum(`pagomora`.`diasmora`) from `pagomora` where ((`pagomora`.`iddesembolso` = `desembolso`.`iddesembolso`) and (`pagomora`.`estado` = 'SI'))) AS `pagomora`,((select sum(`pago`.`moradias`) from `pago` where (`pago`.`iddesembolso` = `desembolso`.`iddesembolso`)) / `desembolso`.`plazo`) AS `porc` from ((`vistasolicitud` join `desembolso` on((`vistasolicitud`.`idsolicitud` = `desembolso`.`idsolicitud`))) left join `vistapagospordesembolso` on((`desembolso`.`iddesembolso` = `vistapagospordesembolso`.`iddesembolso`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistasolicitud`
--

/*!50001 DROP VIEW IF EXISTS `vistasolicitud`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistasolicitud` AS select `solicitud`.`idsolicitud` AS `idsolicitud`,`solicitud`.`codcliente` AS `codcliente`,`solicitud`.`fecha` AS `fecha`,`solicitud`.`idasesor` AS `idasesor`,`solicitud`.`tipo` AS `tipo`,`solicitud`.`monto` AS `monto`,`solicitud`.`producto` AS `producto`,`solicitud`.`tipoplazo` AS `tipoplazo`,`solicitud`.`cantplazo` AS `cantplazo`,`solicitud`.`medioorigen` AS `medioorigen`,`solicitud`.`estado` AS `estado`,`clientes`.`dni` AS `dni`,`clientes`.`apenom` AS `apenom` from (`solicitud` join `clientes` on((`solicitud`.`codcliente` = `clientes`.`codcliente`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistasolicitudesadesembolsar`
--

/*!50001 DROP VIEW IF EXISTS `vistasolicitudesadesembolsar`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistasolicitudesadesembolsar` AS select `vistasolicitud`.`idsolicitud` AS `idsolicitud`,`vistasolicitud`.`codcliente` AS `codcliente`,`vistasolicitud`.`fecha` AS `fecha`,`vistasolicitud`.`idasesor` AS `idasesor`,`vistasolicitud`.`tipo` AS `tipo`,`vistasolicitud`.`monto` AS `monto`,`vistasolicitud`.`producto` AS `producto`,`vistasolicitud`.`tipoplazo` AS `tipoplazo`,`vistasolicitud`.`cantplazo` AS `cantplazo`,`vistasolicitud`.`medioorigen` AS `medioorigen`,`vistasolicitud`.`estado` AS `estado`,`vistasolicitud`.`dni` AS `dni`,`vistasolicitud`.`apenom` AS `apenom`,`evaluacion`.`tasainteres` AS `tasainteres` from (`vistasolicitud` join `evaluacion` on((`vistasolicitud`.`idsolicitud` = `evaluacion`.`idsolicitud`))) where ((`vistasolicitud`.`estado` = 'APROBADO') and exists(select `desembolso`.`idsolicitud` from `desembolso` where (`desembolso`.`idsolicitud` = `vistasolicitud`.`idsolicitud`)) is false) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vistausuario`
--

/*!50001 DROP VIEW IF EXISTS `vistausuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vistausuario` AS select `usuario`.`codusuario` AS `codusuario`,`usuario`.`tipo` AS `tipo`,`usuario`.`dni` AS `dni`,concat(`persona`.`apellidos`,', ',`persona`.`nombres`) AS `apenom`,`persona`.`fecha_nac` AS `fecha_nac`,`persona`.`sexo` AS `sexo`,`persona`.`email` AS `email`,`persona`.`estadocivil` AS `estadocivil`,`persona`.`celular` AS `celular`,`persona`.`nacionalidad` AS `nacionalidad` from (`usuario` join `persona`) where (`usuario`.`dni` = `persona`.`dni`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-07 11:06:16
