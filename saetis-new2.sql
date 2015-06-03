-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 01:40 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `saetis`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_AD` varchar(45) NOT NULL,
  `APELLIDOS_AD` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`NOMBRE_U`, `NOMBRES_AD`, `APELLIDOS_AD`) VALUES
('Admin1', 'Ivan', 'Morales'),
('Admin2', 'Administrador ', 'Administrador'),
('Admin3', 'Admin3 ', 'Admin3');

-- --------------------------------------------------------

--
-- Table structure for table `aplicacion`
--

CREATE TABLE `aplicacion` (
  `APLICACION_A` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asesor`
--

CREATE TABLE `asesor` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_A` varchar(50) NOT NULL,
  `APELLIDOS_A` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Dumping data for table `asesor`
--

INSERT INTO `asesor` (`NOMBRE_U`, `NOMBRES_A`, `APELLIDOS_A`) VALUES
('Asesor', 'Asesor', 'Asesor'),
('Asesoraso', 'Asesoraso', 'Asesoraso'),
('Juan', 'Juan', 'Perez'),
('LeticiaB', 'Leticia', 'Blanco Coca'),
('Rodrigo', 'Rodrigo', 'Rivera');

-- --------------------------------------------------------

--
-- Table structure for table `asignacion`
--

CREATE TABLE `asignacion` (
  `ID_R` int(11) NOT NULL,
  `EMISOR_A` varchar(30) NOT NULL,
  `RECEPTOR_A` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `ID_R` int(11) NOT NULL,
  `CODIGO_SOCIO_A` int(11) NOT NULL,
  `ASISTENCIA_A` tinyint(1) NOT NULL,
  `LICENCIA_A` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`ID_R`, `CODIGO_SOCIO_A`, `ASISTENCIA_A`, `LICENCIA_A`) VALUES
(58, 17, 1, 0),
(58, 19, 0, 0),
(58, 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia_semanal`
--

CREATE TABLE `asistencia_semanal` (
  `ID_AS` int(11) NOT NULL,
  `ID_R` int(11) NOT NULL,
  `GRUPO_AS` varchar(25) NOT NULL,
  `CODIGO_SOCIO_AS` int(11) NOT NULL,
  `ASISTENCIA_AS` tinyint(1) NOT NULL,
  `LICENCIA_AS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_C` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `ID_N` int(11) NOT NULL,
  `COMENTARIO` text NOT NULL,
  `FECHA_C` datetime NOT NULL,
  `AUTOR_C` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`ID_C`, `NOMBRE_U`, `ID_N`, `COMENTARIO`, `FECHA_C`, `AUTOR_C`) VALUES
(1, 'FreeValue', 1, 'comentario 1<p><br></p>', '2015-04-22 00:06:03', 'Nuevo123'),
(2, 'FreeValue', 1, 'No saben escribir "posteado"???', '2015-04-22 18:32:30', 'LeticiaB'),
(3, 'FreeValue', 1, 'si pos loco, unas pipocs<p><br></p>', '2015-05-22 19:32:57', 'LeticiaB');

-- --------------------------------------------------------

--
-- Table structure for table `criteriocalificacion`
--

CREATE TABLE `criteriocalificacion` (
  `ID_CRITERIO_C` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CRITERIO_C` varchar(45) NOT NULL,
  `TIPO_CRITERIO` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criteriocalificacion`
--

INSERT INTO `criteriocalificacion` (`ID_CRITERIO_C`, `NOMBRE_U`, `NOMBRE_CRITERIO_C`, `TIPO_CRITERIO`) VALUES
(5, 'LeticiaB', 'PUNTAJE', 4),
(6, 'Rodrigo', 'PUNTAJE', 4),
(7, 'Juan', 'PUNTAJE', 4),
(10, 'Asesor', 'PUNTAJE', 4),
(11, 'Asesoraso', 'PUNTAJE', 4);

-- --------------------------------------------------------

--
-- Table structure for table `criterio_evaluacion`
--

CREATE TABLE `criterio_evaluacion` (
  `ID_CRITERIO_E` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CRITERIO_E` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `descripcion`
--

CREATE TABLE `descripcion` (
  `ID_R` int(11) NOT NULL,
  `DESCRIPCION_D` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `descripcion`
--

INSERT INTO `descripcion` (`ID_R`, `DESCRIPCION_D`) VALUES
(55, 'Descripcion'),
(67, 'jajajajaj'),
(69, 'dfjakjflasldsjfakljdsl'),
(70, 'Necesito este documento'),
(72, 'Pasar Documentos'),
(82, 'Contrato'),
(84, 'Contrato'),
(85, 'Orden de Cambio'),
(86, 'Orden de Cambio'),
(88, 'Contrato'),
(89, 'Contrato'),
(91, 'Contrato'),
(102, 'Contrato'),
(110, 'Contrato'),
(111, 'Contrato'),
(113, 'Notificacion de Conformidad'),
(117, 'Orden de Cambio'),
(124, 'Orden de Cambio'),
(132, 'Notificacion de Conformidad');

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

CREATE TABLE `documento` (
  `ID_D` int(11) NOT NULL,
  `ID_R` int(11) NOT NULL,
  `TAMANIO_D` int(11) NOT NULL,
  `RUTA_D` varchar(100) NOT NULL,
  `VISUALIZABLE_D` tinyint(1) NOT NULL,
  `DESCARGABLE_D` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

INSERT INTO `documento` (`ID_D`, `ID_R`, `TAMANIO_D`, `RUTA_D`, `VISUALIZABLE_D`, `DESCARGABLE_D`) VALUES
(13, 56, 399400, '/Repositorio/FreeValue/InscripcionesyMatriculasPasos-TODOS_2014-08-12_10-22.pdf', 1, 1),
(17, 69, 1024, 'http://bittle.cs.umss.edu.bo/Repositorio/asesor/20140419_152042.jpg', 0, 0),
(18, 71, 91161, '/Repositorio/FreeValue/Screen Shot 2015-04-13 at 9.29.18 AM.png', 1, 1),
(19, 73, 136573, '/Repositorio/Nuevo123/Articulo Agil RiveraOrtegaRodrigoDavid.pdf', 1, 1),
(20, 74, 123719, '/Repositorio/Nuevo123/CronogramaInvierno4-2014yGestion2-2014v5_2014-07-09_09-43.pdf', 1, 1),
(46, 113, 1024, '../Repositorio/FreeValue/NC/NotificacionConformidad.pdf', 0, 0),
(50, 117, 1024, '../Repositorio/Nuevo123/OC/OrdenCambio.pdf', 0, 0),
(57, 124, 1024, '../Repositorio/FreeValue/OC/OrdenCambio.pdf', 0, 0),
(64, 132, 1024, '../Repositorio/Nuevo123/NC/NotificacionConformidad.pdf', 0, 0),
(79, 157, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(80, 158, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(81, 159, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(82, 160, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(83, 161, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(84, 162, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(85, 163, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1),
(87, 165, 60250, '/Repositorio/asesor/LeticiaB/Para Crys', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documento_r`
--

CREATE TABLE `documento_r` (
  `ID_R` int(11) NOT NULL,
  `CODIGO_P` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento_r`
--

INSERT INTO `documento_r` (`ID_R`, `CODIGO_P`) VALUES
(55, 3),
(67, 5),
(70, 3),
(72, 5),
(130, 7);

-- --------------------------------------------------------

--
-- Table structure for table `entrega`
--

CREATE TABLE `entrega` (
  `ID_R` int(11) NOT NULL,
  `ENTREGABLE_P` varchar(30) NOT NULL,
  `ENTREGADO_P` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entrega`
--

INSERT INTO `entrega` (`ID_R`, `ENTREGABLE_P`, `ENTREGADO_P`) VALUES
(62, 'Documentacion', 0),
(63, 'Documentacion', 0),
(63, 'Software', 0),
(64, 'Documentacion', 0),
(64, 'Software', 0),
(65, 'Manuales', 0),
(79, 'Entregable', 0),
(79, 'Entregable 2', 0),
(79, 'Entregable 3', 1),
(80, 'Entregable 5', 0),
(80, 'Entregable 6', 0),
(81, 'Entregable', 0),
(81, 'Entregable 2', 0),
(81, 'Entregable 3', 0),
(81, 'Entregable 4', 0),
(81, 'Entregable 5', 0),
(81, 'Entregable 6', 0),
(81, 'Entregable 7', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entregable`
--

CREATE TABLE `entregable` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ENTREGABLE_E` char(30) NOT NULL,
  `DESCRIPCION_E` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entregable`
--

INSERT INTO `entregable` (`NOMBRE_U`, `ENTREGABLE_E`, `DESCRIPCION_E`) VALUES
('FreeValue', 'Documentacion', 'Diagramas uml'),
('FreeValue', 'Manuales', 'Instalacion'),
('FreeValue', 'Software', 'Sw'),
('Nuevo123', 'Entregable', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 2', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 3', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 4', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 5', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 6', 'CD\nDocumentacion'),
('Nuevo123', 'Entregable 7', 'CD\nDocumentacion');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `ESTADO_E` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`ESTADO_E`) VALUES
('asistencia registrada'),
('Deshabilitado'),
('en proceso'),
('Habilitado'),
('planificacion registrada'),
('registrar costo total proyecto'),
('registrar entregables'),
('registrar plan pagos'),
('registrar planificacion'),
('seguimiento registrado');

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion`
--

CREATE TABLE `evaluacion` (
  `ID_R` int(11) NOT NULL,
  `ID_E` bigint(20) unsigned NOT NULL,
  `NOTA_E` int(11) NOT NULL,
  `PORCENTAJE` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluacion`
--

INSERT INTO `evaluacion` (`ID_R`, `ID_E`, `NOTA_E`, `PORCENTAJE`) VALUES
(76, 1, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `fecha_realizacion`
--

CREATE TABLE `fecha_realizacion` (
  `ID_R` int(11) NOT NULL,
  `FECHA_FR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fecha_realizacion`
--

INSERT INTO `fecha_realizacion` (`ID_R`, `FECHA_FR`) VALUES
(58, '2015-02-12'),
(59, '2015-02-26'),
(60, '2015-03-11'),
(61, '2015-03-21'),
(62, '0000-00-00'),
(63, '0000-00-00'),
(64, '0000-00-00'),
(65, '0000-00-00'),
(76, '2015-01-05'),
(77, '2012-12-20'),
(78, '2014-02-28'),
(79, '0000-00-00'),
(80, '0000-00-00'),
(81, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `ID_FORM` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_FORM` varchar(45) NOT NULL,
  `ESTADO_FORM` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_crit_e`
--

CREATE TABLE `form_crit_e` (
  `ID_FORM_CRIT_E` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL,
  `ID_CRITERIO_E` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `from_crit_c`
--

CREATE TABLE `from_crit_c` (
  `ID_FORM_CRIT_C` int(11) NOT NULL,
  `ID_CRITERIO_C` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gestion`
--

CREATE TABLE `gestion` (
  `ID_G` int(11) NOT NULL,
  `NOM_G` varchar(45) NOT NULL,
  `FECHA_INICIO_G` date NOT NULL,
  `FECHA_FIN_G` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `gestion`
--

INSERT INTO `gestion` (`ID_G`, `NOM_G`, `FECHA_INICIO_G`, `FECHA_FIN_G`) VALUES
(1, 'I/2015', '2015-01-01', '2015-06-30'),
(2, '2', '2015-04-06', '2015-06-10'),
(3, 'imposible', '2015-05-03', '2015-04-02'),
(4, 'Gestion No Valida', '2015-04-23', '2015-03-04'),
(8, 'toma chris', '2092-12-22', '2099-12-13'),
(9, 'prueba', '2015-05-21', '2015-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `grupo_empresa`
--

CREATE TABLE `grupo_empresa` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRE_CORTO_GE` char(50) NOT NULL,
  `NOMBRE_LARGO_GE` varchar(50) NOT NULL,
  `DIRECCION_GE` varchar(50) NOT NULL,
  `REPRESENTANTE_LEGAL_GE` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Dumping data for table `grupo_empresa`
--

INSERT INTO `grupo_empresa` (`NOMBRE_U`, `NOMBRE_CORTO_GE`, `NOMBRE_LARGO_GE`, `DIRECCION_GE`, `REPRESENTANTE_LEGAL_GE`) VALUES
('FreeValue', 'FreeValue', 'FreeValue SRL', 'Calle Jordan', 'Oscar Gamboa Acho'),
('GE', 'GE', 'GE', 'GE', 'GE GE'),
('loco', 'loco', 'loco', 'loco', 'loco loco'),
('No Representante', 'No Representante', 'No Representante', 'No Representante', 'Socio 3 Socio 3'),
('Nuevo123', 'Slow Code', 'Slow Code SRL', 'Dario Montano', 'Rodrigo Rivera'),
('Test', 'Test', 'Test', 'Test', 'TestR TestR');

-- --------------------------------------------------------

--
-- Table structure for table `indicador`
--

CREATE TABLE `indicador` (
  `ID_INDICADOR` int(11) NOT NULL,
  `ID_CRITERIO_C` int(11) NOT NULL,
  `NOMBRE_INDICADOR` varchar(45) NOT NULL,
  `PUNTAJE_INDICADOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion`
--

CREATE TABLE `inscripcion` (
  `NOMBRE_UA` varchar(50) NOT NULL,
  `NOMBRE_UGE` varchar(50) NOT NULL,
  `ESTADO_INSCRIPCION` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=4096;

--
-- Dumping data for table `inscripcion`
--

INSERT INTO `inscripcion` (`NOMBRE_UA`, `NOMBRE_UGE`, `ESTADO_INSCRIPCION`) VALUES
('Juan', 'GE', 'Habilitado'),
('LeticiaB', 'FreeValue', 'Deshabilitado'),
('LeticiaB', 'loco', 'Habilitado'),
('LeticiaB', 'No Representante', 'Deshabilitado'),
('LeticiaB', 'Nuevo123', 'Habilitado'),
('Rodrigo', 'Test', 'Deshabilitado');

-- --------------------------------------------------------

--
-- Table structure for table `inscripcion_proyecto`
--

CREATE TABLE `inscripcion_proyecto` (
  `CODIGO_P` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `ESTADO_CONTRATO` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inscripcion_proyecto`
--

INSERT INTO `inscripcion_proyecto` (`CODIGO_P`, `NOMBRE_U`, `ESTADO_CONTRATO`) VALUES
(3, 'FreeValue', 'Firmado'),
(5, 'Nuevo123', 'Firmado'),
(7, 'GE', 'Sin Firmar'),
(7, 'loco', 'Sin Firmar');

-- --------------------------------------------------------

--
-- Table structure for table `lista_ge`
--

CREATE TABLE `lista_ge` (
  `NOMBRE_CORTO` varchar(100) NOT NULL,
  `NOMBRE_LARGO` varchar(100) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `REPRESENTANTE_LEGAL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lista_ge`
--

INSERT INTO `lista_ge` (`NOMBRE_CORTO`, `NOMBRE_LARGO`, `DIRECCION`, `REPRESENTANTE_LEGAL`) VALUES
('FreeValue', 'FreeValue SRL', 'Calle Jordan', NULL),
('Oasis', 'Oasis SRL', 'Calle Jordan', NULL),
('Slow Code', 'Slow Code SRL', 'Dario Montano', NULL),
('Galletas', 'Galletas SRL', 'c/ Mabel', NULL),
('', '', '', NULL),
('NuevoSRL', 'NuevoSRL', 'NuevoSRL', NULL),
('GE', 'GE', 'GE', NULL),
('loco', 'loco', 'loco', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mensaje`
--

CREATE TABLE `mensaje` (
  `ID_R` int(11) NOT NULL,
  `ASUNTO_M` varchar(30) NOT NULL,
  `MENSAJE_M` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nom_menu` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `ID_N` int(11) NOT NULL,
  `ID_FORM` int(50) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `CALIF_N` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_final`
--

CREATE TABLE `nota_final` (
  `ID_NF` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOTA_F` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `ID_N` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `TITULO` text NOT NULL,
  `FECHA_N` datetime NOT NULL,
  `VIEWS` int(11) NOT NULL,
  `TEXTO` text NOT NULL,
  `POSTEADO` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`ID_N`, `NOMBRE_U`, `TITULO`, `FECHA_N`, `VIEWS`, `TEXTO`, `POSTEADO`) VALUES
(1, 'FreeValue', 'Foro1', '2015-04-21 17:53:39', 11, 'foro 1<p><br></p>', 'FreeValue');

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `ID_R` int(11) NOT NULL,
  `MONTO_P` decimal(10,0) NOT NULL,
  `PORCENTAJE_DEL_TOTAL_P` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pago`
--

INSERT INTO `pago` (`ID_R`, `MONTO_P`, `PORCENTAJE_DEL_TOTAL_P`) VALUES
(62, '25000', 25),
(63, '35000', 35),
(64, '30000', 30),
(65, '10000', 10),
(79, '1800000000', 90),
(80, '100000000', 5),
(81, '100000000', 5);

-- --------------------------------------------------------

--
-- Table structure for table `periodo`
--

CREATE TABLE `periodo` (
  `ID_R` int(11) NOT NULL,
  `fecha_p` date NOT NULL,
  `hora_p` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodo`
--

INSERT INTO `periodo` (`ID_R`, `fecha_p`, `hora_p`) VALUES
(69, '2015-04-09', '00:00:00'),
(113, '2015-05-21', '05:05:42'),
(117, '2015-05-21', '07:07:37'),
(124, '2015-05-21', '14:14:23'),
(132, '2015-05-28', '00:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `ROL_R` varchar(50) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `menu_id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `planificacion`
--

CREATE TABLE `planificacion` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `FECHA_INICIO_P` date NOT NULL,
  `FECHA_FIN_P` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planificacion`
--

INSERT INTO `planificacion` (`NOMBRE_U`, `ESTADO_E`, `FECHA_INICIO_P`, `FECHA_FIN_P`) VALUES
('FreeValue', 'planificacion registrada', '2014-12-12', '2020-12-12'),
('GE', 'registrar planificacion', '2014-12-12', '2020-12-12'),
('loco', 'registrar planificacion', '2014-12-12', '2020-12-12'),
('Nuevo123', 'planificacion registrada', '2014-12-12', '2020-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `plazo`
--

CREATE TABLE `plazo` (
  `ID_R` int(11) NOT NULL,
  `FECHA_INICIO_PL` date NOT NULL,
  `FECHA_FIN_PL` date NOT NULL,
  `HORA_INICIO_PL` time NOT NULL,
  `HORA_FIN_PL` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `plazo`
--

INSERT INTO `plazo` (`ID_R`, `FECHA_INICIO_PL`, `FECHA_FIN_PL`, `HORA_INICIO_PL`, `HORA_FIN_PL`) VALUES
(55, '2015-02-12', '2015-03-20', '12:12:00', '12:12:00'),
(67, '2015-03-07', '2015-06-11', '17:59:00', '05:06:00'),
(70, '2015-04-19', '2015-04-24', '12:59:00', '00:00:00'),
(72, '2015-04-20', '2015-06-30', '22:10:00', '22:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `precio`
--

CREATE TABLE `precio` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `PRECIO_P` decimal(10,0) NOT NULL,
  `PORCENTAJE_A` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precio`
--

INSERT INTO `precio` (`NOMBRE_U`, `PRECIO_P`, `PORCENTAJE_A`) VALUES
('FreeValue', '100000', 79),
('Nuevo123', '2000000000', 140);

-- --------------------------------------------------------

--
-- Table structure for table `proyecto`
--

CREATE TABLE `proyecto` (
  `CODIGO_P` int(11) NOT NULL,
  `ID_G` int(11) NOT NULL,
  `NOMBRE_P` varchar(50) NOT NULL,
  `DESCRIPCION_P` varchar(200) NOT NULL,
  `CONVOCATORIA` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `proyecto`
--

INSERT INTO `proyecto` (`CODIGO_P`, `ID_G`, `NOMBRE_P`, `DESCRIPCION_P`, `CONVOCATORIA`) VALUES
(3, 1, 'Proyecto 1', 'Sistema de apoyo a la empresa TIS', 'CPETIS2015'),
(4, 1, 'Poryecto1', 'Hola como estas', 'PETIS27052015'),
(5, 1, 'Tesis sobre la materia de Observatorio 3', 'es', 'adadad'),
(6, 1, 'Proyecto Meli', 'Meli Sonsa', 'Meli sonsa si se puede'),
(7, 1, 'Proyecto X', 'Proyecto X', 'Proyecto X');

-- --------------------------------------------------------

--
-- Table structure for table `puntaje`
--

CREATE TABLE `puntaje` (
  `PUNTAJE_ID` int(11) NOT NULL,
  `ID_FORM` int(11) NOT NULL,
  `PUNTAJE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `puntaje_ge`
--

CREATE TABLE `puntaje_ge` (
  `ID_PGE` int(50) NOT NULL,
  `ID_N` int(50) NOT NULL,
  `NUM_CE` int(50) NOT NULL,
  `CALIFICACION` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receptor`
--

CREATE TABLE `receptor` (
  `ID_R` int(11) NOT NULL,
  `RECEPTOR_R` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receptor`
--

INSERT INTO `receptor` (`ID_R`, `RECEPTOR_R`) VALUES
(69, 'PUBLICO'),
(113, 'FreeValue SRL'),
(117, 'Slow Code SRL'),
(124, 'FreeValue SRL'),
(132, 'Slow Code SRL');

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `ID_R` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `TIPO_T` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `NOMBRE_R` varchar(50) NOT NULL,
  `FECHA_R` date NOT NULL,
  `HORA_R` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`ID_R`, `NOMBRE_U`, `TIPO_T`, `ESTADO_E`, `NOMBRE_R`, `FECHA_R`, `HORA_R`) VALUES
(55, 'LeticiaB', 'documento requerido', 'Habilitado', 'Parte R', '2015-03-06', '02:53:30'),
(56, 'FreeValue', 'documento subido', 'habilitado', 'Parte R', '2015-03-06', '02:02:55'),
(58, 'FreeValue', 'actividad planificacion', 'en proceso', 'Sprint 0', '2015-03-06', '02:57:17'),
(59, 'FreeValue', 'actividad planificacion', 'en proceso', 'Sprint 1', '2015-03-06', '02:57:17'),
(60, 'FreeValue', 'actividad planificacion', 'en proceso', 'Sprint 2', '2015-03-06', '02:57:17'),
(61, 'FreeValue', 'actividad planificacion', 'en proceso', 'Sprint 3', '2015-03-06', '02:57:17'),
(62, 'FreeValue', 'pago planificacion', 'en proceso', 'Sprint 0', '2015-03-06', '02:58:54'),
(63, 'FreeValue', 'pago planificacion', 'en proceso', 'Sprint 1', '2015-03-06', '02:58:54'),
(64, 'FreeValue', 'pago planificacion', 'en proceso', 'Sprint 2', '2015-03-06', '02:58:54'),
(65, 'FreeValue', 'pago planificacion', 'en proceso', 'Sprint 3', '2015-03-06', '02:58:55'),
(67, 'LeticiaB', 'documento requerido', 'Habilitado', 'documento requerido', '2015-04-08', '18:30:06'),
(69, 'Juan', 'publicaciones', 'Habilitado', 'publico', '2015-04-09', '06:06:06'),
(70, 'LeticiaB', 'documento requerido', 'Habilitado', 'Documento requerido uno', '2015-04-21', '18:07:42'),
(71, 'FreeValue', 'documento subido', 'habilitado', 'Documento requerido uno', '2015-04-21', '18:18:09'),
(72, 'LeticiaB', 'documento requerido', 'Habilitado', 'Documento Observatorio', '2015-04-21', '23:25:56'),
(73, 'Nuevo123', 'documento subido', 'habilitado', 'Documento Observatorio', '2015-04-21', '23:23:27'),
(74, 'Nuevo123', 'documento subido', 'habilitado', 'documento requerido', '2015-04-21', '23:23:43'),
(76, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 1', '2015-04-22', '00:39:36'),
(77, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 2', '2015-04-22', '00:39:36'),
(78, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 3', '2015-04-22', '00:39:36'),
(79, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 1', '2015-04-22', '00:54:42'),
(80, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 2', '2015-04-22', '00:54:42'),
(81, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 3', '2015-04-22', '00:54:42'),
(113, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-05-21', '05:05:42'),
(117, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de Slow Code', '2015-05-21', '07:07:37'),
(124, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de FreeValue', '2015-05-21', '14:14:23'),
(132, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de Slow Code', '2015-05-28', '00:00:23'),
(157, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 157', '2015-06-01', '14:14:31'),
(158, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 158', '2015-06-01', '14:14:32'),
(159, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 159', '2015-06-01', '14:14:33'),
(160, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 160', '2015-06-01', '14:14:33'),
(161, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 161', '2015-06-01', '14:14:33'),
(162, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 162', '2015-06-01', '14:14:33'),
(163, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 163', '2015-06-01', '14:14:34'),
(165, 'LeticiaB', 'documento subido', 'habilitado', 'Documento 165', '2015-06-01', '14:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `reporte`
--

CREATE TABLE `reporte` (
  `ID_R` int(11) NOT NULL,
  `ROL_RR` varchar(50) NOT NULL,
  `ACTIVIDAD_R` varchar(100) NOT NULL,
  `HECHO_R` tinyint(1) NOT NULL,
  `RESULTADO_R` varchar(200) NOT NULL,
  `CONCLUSION_R` varchar(200) NOT NULL,
  `OBSERVACION_R` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `ROL_R` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`ROL_R`) VALUES
('administrador'),
('asesor'),
('grupoEmpresa'),
('rol1'),
('rol2'),
('rolAparentementeInservible');

-- --------------------------------------------------------

--
-- Table structure for table `rol_aplicacion`
--

CREATE TABLE `rol_aplicacion` (
  `ROL_R` varchar(50) NOT NULL,
  `APLICACION_A` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rol_reporte`
--

CREATE TABLE `rol_reporte` (
  `ROL_RR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol_reporte`
--

INSERT INTO `rol_reporte` (`ROL_RR`) VALUES
('asesor'),
('cliente'),
('jefe de proyecto');

-- --------------------------------------------------------

--
-- Table structure for table `rol_url`
--

CREATE TABLE `rol_url` (
  `id` int(11) NOT NULL,
  `idUrl` int(11) NOT NULL,
  `idRol` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol_url`
--

INSERT INTO `rol_url` (`id`, `idUrl`, `idRol`) VALUES
(1, 1, 'grupoEmpresa'),
(2, 2, 'grupoEmpresa'),
(3, 3, 'grupoEmpresa'),
(4, 4, 'grupoEmpresa'),
(5, 5, 'grupoEmpresa'),
(6, 6, 'grupoEmpresa'),
(7, 7, 'grupoEmpresa'),
(8, 8, 'grupoEmpresa'),
(9, 9, 'grupoEmpresa'),
(10, 10, 'grupoEmpresa'),
(11, 11, 'grupoEmpresa'),
(12, 12, 'administrador'),
(13, 13, 'administrador'),
(14, 14, 'administrador'),
(15, 15, 'administrador'),
(16, 16, 'administrador'),
(17, 17, 'administrador'),
(18, 18, 'administrador'),
(19, 19, 'administrador'),
(20, 20, 'administrador'),
(21, 21, 'administrador'),
(22, 22, 'administrador'),
(23, 23, 'administrador'),
(24, 24, 'administrador'),
(25, 11, 'administrador'),
(26, 25, 'asesor'),
(27, 26, 'asesor'),
(28, 27, 'asesor'),
(29, 28, 'asesor'),
(30, 29, 'asesor'),
(31, 30, 'asesor'),
(32, 31, 'asesor'),
(33, 32, 'asesor'),
(34, 33, 'asesor'),
(35, 34, 'asesor'),
(36, 35, 'asesor'),
(37, 36, 'asesor'),
(38, 37, 'asesor'),
(39, 38, 'asesor'),
(40, 39, 'asesor'),
(41, 40, 'asesor'),
(42, 41, 'asesor'),
(43, 42, 'asesor'),
(44, 43, 'asesor'),
(45, 44, 'asesor'),
(46, 45, 'asesor'),
(47, 46, 'asesor'),
(48, 47, 'asesor'),
(49, 11, 'asesor'),
(50, 48, 'asesor'),
(51, 49, 'asesor'),
(52, 50, 'administrador'),
(53, 51, 'asesor'),
(54, 52, 'asesor');

-- --------------------------------------------------------

--
-- Table structure for table `seguimiento`
--

CREATE TABLE `seguimiento` (
  `ID_S` int(5) NOT NULL,
  `ID_R` int(11) NOT NULL,
  `ROL_S` varchar(50) NOT NULL,
  `GRUPO_S` varchar(20) NOT NULL,
  `ACTIVIDAD_S` varchar(100) NOT NULL,
  `HECHO_S` tinyint(1) NOT NULL,
  `RESULTADO_S` varchar(200) NOT NULL,
  `CONCLUSION_S` varchar(200) NOT NULL,
  `OBSERVACION_S` varchar(200) NOT NULL,
  `FECHA_S` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sesion`
--

CREATE TABLE `sesion` (
  `ID_S` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `FECHA_S` date NOT NULL,
  `HORA_S` time NOT NULL,
  `IP_S` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesion`
--

INSERT INTO `sesion` (`ID_S`, `NOMBRE_U`, `FECHA_S`, `HORA_S`, `IP_S`) VALUES
(163, 'Admin1', '2015-05-30', '01:10:24', '::1'),
(164, 'LeticiaB', '2015-06-01', '03:37:48', '::1'),
(165, 'LeticiaB', '2015-06-01', '03:38:04', '::1'),
(166, 'LeticiaB', '2015-06-01', '03:39:35', '::1'),
(167, 'GE', '2015-06-01', '05:14:40', '::1'),
(168, 'LeticiaB', '2015-06-01', '05:16:47', '::1'),
(169, 'LeticiaB', '2015-06-01', '05:16:56', '::1'),
(170, 'LeticiaB', '2015-06-01', '06:27:31', '::1'),
(171, 'Admin1', '2015-06-01', '07:36:27', '::1'),
(172, 'Admin1', '2015-06-01', '07:36:39', '::1'),
(173, 'Admin1', '2015-06-01', '07:36:51', '::1'),
(174, 'LeticiaB', '2015-06-01', '07:37:08', '::1'),
(175, 'LeticiaB', '2015-06-01', '07:37:20', '::1'),
(176, 'Nuevo123', '2015-06-01', '08:21:08', '::1'),
(177, 'GE', '2015-06-01', '08:23:36', '::1'),
(178, 'GE', '2015-06-01', '08:23:54', '::1'),
(179, 'loco', '2015-06-01', '08:24:31', '::1'),
(180, 'GE', '2015-06-01', '08:25:04', '::1'),
(181, 'LeticiaB', '2015-06-01', '08:31:26', '::1'),
(182, 'Nuevo123', '2015-06-01', '08:51:03', '::1'),
(183, 'GE', '2015-06-01', '11:07:28', '::1'),
(184, 'No Representante', '2015-06-01', '11:08:04', '::1'),
(185, 'LeticiaB', '2015-06-02', '06:44:18', '::1'),
(186, 'LeticiaB', '2015-06-02', '06:46:36', '::1'),
(187, 'LeticiaB', '2015-06-02', '08:15:55', '::1'),
(188, 'FreeValue', '2015-06-03', '12:06:20', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `socio`
--

CREATE TABLE `socio` (
  `CODIGO_S` int(11) NOT NULL,
  `NOMBRE_U` varchar(50) NOT NULL,
  `NOMBRES_S` varchar(50) NOT NULL,
  `APELLIDOS_S` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=819;

--
-- Dumping data for table `socio`
--

INSERT INTO `socio` (`CODIGO_S`, `NOMBRE_U`, `NOMBRES_S`, `APELLIDOS_S`) VALUES
(17, 'FreeValue', 'Oscar', 'Gamboa Acho'),
(19, 'FreeValue', 'Valeri', 'Crespo Gutierrez'),
(20, 'FreeValue', 'Ruddy', 'Marquina Escobar'),
(21, 'FreeValue', 'Juan', 'Perez'),
(22, 'FreeValue', 'Nombre', 'Apellido'),
(23, 'FreeValue', 'Nombre', 'Apellido'),
(25, 'Nuevo123', 'Santiago', 'Quiroga'),
(30, 'Nuevo123', 'Melisa', 'Carballo'),
(31, 'Nuevo123', 'Cristhian', 'Lima'),
(33, 'Nuevo123', 'Rodrigo', 'Rivera'),
(37, 'Nuevo123', '', ''),
(38, 'Test', 'Test', 'Test'),
(39, 'Test', 'Test', 'Test'),
(40, 'Test', 'Test', 'Test'),
(41, 'Test', 'TestR', 'TestR'),
(42, 'Test', 'Test', 'TestR'),
(43, 'GE', 'GE', 'GE'),
(44, 'GE', '', ''),
(45, 'GE', '', ''),
(46, 'loco', 'loco', 'loco'),
(47, 'loco', 'loco', 'loco'),
(48, 'loco', 'loco', 'loco'),
(49, 'loco', 'loco', 'loco'),
(50, 'No Representante', 'Socio 1', 'Socio 2'),
(51, 'No Representante', 'Socio 2', 'Socio 1'),
(52, 'No Representante', 'Socio 3', 'Socio 3');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `TIPO_T` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`TIPO_T`) VALUES
('actividad planificacion'),
('asistencia'),
('Contrato'),
('criterio evaluacion'),
('documento requerido'),
('documento subido'),
('notificacion de conformidad'),
('Orden de Cambio'),
('pago planificacion'),
('publicaciones'),
('seguimiento');

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `nombreUrl` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `nombreUrl`, `descripcion`) VALUES
(1, 'inicio_grupo_empresa.php', 'principal'),
(2, 'SubirDocumento.php', ''),
(3, 'publicacion_grupo.php', ''),
(4, 'AnadirSocio.php', ''),
(5, 'AnadirRL.php', ''),
(6, 'seleccionar_asesor.php', ''),
(7, 'InscripcionGEProyecto.php', ''),
(8, 'historia_actividades.php', ''),
(9, 'lista-de-noticias-grupo.php', ''),
(10, 'ModificarGrupoEmpresa.php', ''),
(11, 'unlog.php', ''),
(12, 'principal.php', 'principal'),
(13, 'modificar_administrador.php', ''),
(14, 'registro_administrador.php', ''),
(15, 'lista_usuarios.php', ''),
(16, 'asignar_permisos.php', ''),
(17, 'lista_grupoEmpresa.php', ''),
(18, 'ListaGrupoEmpresas.php', ''),
(19, 'lista_administradores.php', ''),
(20, 'lista_asesores.php', ''),
(21, 'add_roles.php', ''),
(22, 'add_gestion.php', ''),
(23, 'bitacora_ingreso.php', ''),
(24, 'enviar_mail.php', ''),
(25, 'inicio_asesor.php', 'principal'),
(26, 'AdministrarGrupoEmpresa.php', ''),
(27, 'documentos_generados.php', ''),
(28, 'lista_doc_subidos.php', ''),
(29, 'documentos_recibidos.php', ''),
(30, 'InscripcionProyecto.php', ''),
(31, 'subirarchivoasesor.php', ''),
(32, 'RegistrarDocumentosRequeridos.php', ''),
(33, 'ConfigurarFechasRecepcion.php', ''),
(34, 'Publicar_Asesor.php', ''),
(35, 'ordenDeCambio.php', ''),
(36, 'notificacion_conformidad.php', ''),
(37, 'contrato.php', ''),
(38, 'lista_evaluacion.php', ''),
(39, 'CrearModalidadEvaluacion.php', ''),
(40, 'CrearModalidadCalificacion.php', ''),
(41, 'EliminarCriterioCalificacion.php', ''),
(42, 'CrearFormulario.php', ''),
(43, 'SeleccionarFormulario.php', ''),
(44, 'EliminarFormulario.php', ''),
(45, 'EvaluarGrupoEmpresa.php', ''),
(46, 'EvaluacionGeneral.php', ''),
(47, 'publicaciones.php', ''),
(48, 'modficar_asesor.php', ''),
(49, 'lista-de-noticias.php', ''),
(50, 'enviarCorreoAdministrador.php', ''),
(51, 'modificar_asesor.php', ''),
(52, 'ConfiguracionFechasRecepcion.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ESTADO_E` varchar(50) NOT NULL,
  `PASSWORD_U` varchar(50) NOT NULL,
  `TELEFONO_U` varchar(8) NOT NULL,
  `CORREO_ELECTRONICO_U` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=2048;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`NOMBRE_U`, `ESTADO_E`, `PASSWORD_U`, `TELEFONO_U`, `CORREO_ELECTRONICO_U`) VALUES
('Admin1', 'Habilitado', 'Admin1*123', '4444444', 'adm.saetis@cualquieraCosa.com'),
('Admin2', 'Habilitado', 'Admin2*123', '4000000', 'Admin1@Admin1.Admin1'),
('Admin3', 'Habilitado', 'Admin3', 'Admin3', 'Admin3'),
('Asesor', 'Deshabilitado', 'Asesor*123', '4000000', 'Asesor@Asesor.Asesor'),
('Asesoraso', 'Deshabilitado', 'Asesoraso*123', '4000000', 'Asesoraso@Asesoraso.Asesoraso'),
('FreeValue', 'Habilitado', 'GrupoEmpresa*123', '4329092', 'free@value.com'),
('GE', 'Habilitado', 'GE', 'GE', 'GE'),
('Juan', 'Habilitado', 'Juan123*', '4251675', 'rivera.rodrigo08@gmail.com'),
('LeticiaB', 'Habilitado', 'Leticia*123', '4444532', 'leticia.blanco@gmail.com'),
('loco', 'Habilitado', 'loco', 'loco', 'loco'),
('No Representante', 'Habilitado', 'No Representante', 'No Repre', 'No Representante'),
('Nuevo123', 'Habilitado', 'GrupoEmpresa*123', '4251675', 'slow.code.srl.tis@gmail.com'),
('Rodrigo', 'Habilitado', 'Rodrigo*123', '4251675', 'rivera.rodrigo08@gmail.com'),
('Test', 'Habilitado', 'Test', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `NOMBRE_U` varchar(50) NOT NULL,
  `ROL_R` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_rol`
--

INSERT INTO `usuario_rol` (`NOMBRE_U`, `ROL_R`) VALUES
('Admin1', 'administrador'),
('Admin2', 'administrador'),
('Admin3', 'administrador'),
('Asesor', 'asesor'),
('Asesoraso', 'asesor'),
('Juan', 'asesor'),
('LeticiaB', 'asesor'),
('FreeValue', 'grupoEmpresa'),
('GE', 'grupoEmpresa'),
('loco', 'grupoEmpresa'),
('No Representante', 'grupoEmpresa'),
('Nuevo123', 'grupoEmpresa'),
('Test', 'grupoEmpresa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`NOMBRE_U`);

--
-- Indexes for table `aplicacion`
--
ALTER TABLE `aplicacion`
  ADD PRIMARY KEY (`APLICACION_A`) USING BTREE;

--
-- Indexes for table `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`ID_R`,`CODIGO_SOCIO_A`) USING BTREE;

--
-- Indexes for table `asistencia_semanal`
--
ALTER TABLE `asistencia_semanal`
  ADD PRIMARY KEY (`ID_AS`) USING BTREE,
  ADD KEY `FK_REGISTRO__ASISTENCIA_SEMANAL` (`ID_R`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_C`,`NOMBRE_U`,`ID_N`),
  ADD KEY `fk_comentarios_noticias1_idx` (`ID_N`,`NOMBRE_U`);

--
-- Indexes for table `criteriocalificacion`
--
ALTER TABLE `criteriocalificacion`
  ADD PRIMARY KEY (`ID_CRITERIO_C`,`NOMBRE_U`),
  ADD KEY `fk_criterioCalificacion_asesor1_idx` (`NOMBRE_U`);

--
-- Indexes for table `criterio_evaluacion`
--
ALTER TABLE `criterio_evaluacion`
  ADD PRIMARY KEY (`ID_CRITERIO_E`,`NOMBRE_U`),
  ADD KEY `fk_criterio_evaluacion_asesor1_idx` (`NOMBRE_U`);

--
-- Indexes for table `descripcion`
--
ALTER TABLE `descripcion`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`ID_D`) USING BTREE,
  ADD KEY `FK_REGISTRO_DOCUMENTO` (`ID_R`) USING BTREE;

--
-- Indexes for table `documento_r`
--
ALTER TABLE `documento_r`
  ADD PRIMARY KEY (`ID_R`);

--
-- Indexes for table `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`ID_R`,`ENTREGABLE_P`) USING BTREE;

--
-- Indexes for table `entregable`
--
ALTER TABLE `entregable`
  ADD PRIMARY KEY (`NOMBRE_U`,`ENTREGABLE_E`) USING BTREE;

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ESTADO_E`) USING BTREE;

--
-- Indexes for table `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`ID_R`,`ID_E`) USING BTREE,
  ADD UNIQUE KEY `ID_E` (`ID_E`);

--
-- Indexes for table `fecha_realizacion`
--
ALTER TABLE `fecha_realizacion`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`ID_FORM`,`NOMBRE_U`),
  ADD KEY `fk_formulario_asesor1_idx` (`NOMBRE_U`);

--
-- Indexes for table `form_crit_e`
--
ALTER TABLE `form_crit_e`
  ADD PRIMARY KEY (`ID_FORM_CRIT_E`),
  ADD KEY `fk_formulario_has_criterio_evaluacion_criterio_evaluacion1_idx` (`ID_CRITERIO_E`),
  ADD KEY `fk_formulario_has_criterio_evaluacion_formulario1_idx` (`ID_FORM`);

--
-- Indexes for table `from_crit_c`
--
ALTER TABLE `from_crit_c`
  ADD PRIMARY KEY (`ID_FORM_CRIT_C`),
  ADD KEY `fk_criterioCalificacion_has_formulario_formulario1_idx` (`ID_FORM`),
  ADD KEY `fk_criterioCalificacion_has_formulario_criterioCalificacion_idx` (`ID_CRITERIO_C`);

--
-- Indexes for table `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`ID_G`) USING BTREE;

--
-- Indexes for table `grupo_empresa`
--
ALTER TABLE `grupo_empresa`
  ADD PRIMARY KEY (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `indicador`
--
ALTER TABLE `indicador`
  ADD PRIMARY KEY (`ID_INDICADOR`,`ID_CRITERIO_C`),
  ADD KEY `fk_indicador_criterioCalificacion1_idx` (`ID_CRITERIO_C`);

--
-- Indexes for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`NOMBRE_UA`,`NOMBRE_UGE`) USING BTREE,
  ADD KEY `FK_ASESOR__INSCRIPCION` (`NOMBRE_UA`) USING BTREE,
  ADD KEY `FK_GRUPO_EMPRESA__INSCRIPCION` (`NOMBRE_UGE`);

--
-- Indexes for table `inscripcion_proyecto`
--
ALTER TABLE `inscripcion_proyecto`
  ADD PRIMARY KEY (`CODIGO_P`,`NOMBRE_U`),
  ADD KEY `fk_inscripcion_proyecto_proyecto1_idx` (`CODIGO_P`),
  ADD KEY `fk_inscripcion_proyecto_grupo_empresa1_idx` (`NOMBRE_U`);

--
-- Indexes for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`ID_N`,`NOMBRE_U`),
  ADD KEY `fk_nota_grupo_empresa1_idx` (`NOMBRE_U`),
  ADD KEY `fk_nota_formulario_idx` (`ID_FORM`);

--
-- Indexes for table `nota_final`
--
ALTER TABLE `nota_final`
  ADD PRIMARY KEY (`ID_NF`,`NOMBRE_U`),
  ADD KEY `fk_nota_final_grupo_empresa1_idx` (`NOMBRE_U`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID_N`,`NOMBRE_U`),
  ADD KEY `fk_noticias_usuario1_idx` (`NOMBRE_U`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`ID_R`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `fk_rol_has_menu_rol1_idx` (`ROL_R`),
  ADD KEY `fk_permisos_menu1_idx` (`menu_id_menu`);

--
-- Indexes for table `planificacion`
--
ALTER TABLE `planificacion`
  ADD PRIMARY KEY (`NOMBRE_U`) USING BTREE,
  ADD KEY `FK_ESTADO__PLANIFICACION` (`ESTADO_E`) USING BTREE;

--
-- Indexes for table `plazo`
--
ALTER TABLE `plazo`
  ADD PRIMARY KEY (`ID_R`) USING BTREE;

--
-- Indexes for table `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`CODIGO_P`,`ID_G`) USING BTREE,
  ADD KEY `fk_proyecto_gestion1_idx` (`ID_G`);

--
-- Indexes for table `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`PUNTAJE_ID`,`ID_FORM`),
  ADD KEY `fk_puntaje_formulario1_idx` (`ID_FORM`);

--
-- Indexes for table `puntaje_ge`
--
ALTER TABLE `puntaje_ge`
  ADD PRIMARY KEY (`ID_PGE`),
  ADD KEY `fk_ PUNTAJE_GE_nota_idx` (`ID_N`);

--
-- Indexes for table `receptor`
--
ALTER TABLE `receptor`
  ADD PRIMARY KEY (`ID_R`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_R`) USING BTREE,
  ADD KEY `FK_ESTADO__REGISTRO` (`ESTADO_E`) USING BTREE,
  ADD KEY `FK_TIPO__REGISTRO` (`TIPO_T`) USING BTREE,
  ADD KEY `FK_USUARIO_REGISTRO` (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`ID_R`,`ROL_RR`) USING BTREE,
  ADD KEY `FK_ROL_REPORTE__REPORTE` (`ROL_RR`) USING BTREE;

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ROL_R`) USING BTREE;

--
-- Indexes for table `rol_aplicacion`
--
ALTER TABLE `rol_aplicacion`
  ADD PRIMARY KEY (`ROL_R`,`APLICACION_A`) USING BTREE,
  ADD KEY `FK_APLICACION__ROL_APLICACION` (`APLICACION_A`) USING BTREE;

--
-- Indexes for table `rol_reporte`
--
ALTER TABLE `rol_reporte`
  ADD PRIMARY KEY (`ROL_RR`) USING BTREE;

--
-- Indexes for table `rol_url`
--
ALTER TABLE `rol_url`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_RolUrl_Rol` (`idRol`),
  ADD KEY `fk_RolUrl` (`idUrl`);

--
-- Indexes for table `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`ID_S`) USING BTREE,
  ADD KEY `FK_ROL_REPORTE__REPORTE` (`ROL_S`) USING BTREE,
  ADD KEY `FK_REGISTRO__SEGUIMIENTO` (`ID_R`);

--
-- Indexes for table `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`ID_S`) USING BTREE,
  ADD KEY `FK_USUARIO_SESION` (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `socio`
--
ALTER TABLE `socio`
  ADD PRIMARY KEY (`CODIGO_S`) USING BTREE,
  ADD KEY `FK_GRUPO_EMPRESA__SOCIO` (`NOMBRE_U`) USING BTREE;

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`TIPO_T`) USING BTREE;

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NOMBRE_U`) USING BTREE,
  ADD KEY `FK_ESTADO__USUARIO` (`ESTADO_E`) USING BTREE;

--
-- Indexes for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`NOMBRE_U`,`ROL_R`) USING BTREE,
  ADD KEY `FK_ROL__USUARIO_ROL` (`ROL_R`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asistencia_semanal`
--
ALTER TABLE `asistencia_semanal`
  MODIFY `ID_AS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_C` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `criteriocalificacion`
--
ALTER TABLE `criteriocalificacion`
  MODIFY `ID_CRITERIO_C` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `criterio_evaluacion`
--
ALTER TABLE `criterio_evaluacion`
  MODIFY `ID_CRITERIO_E` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `ID_D` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `documento_r`
--
ALTER TABLE `documento_r`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `ID_E` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `ID_FORM` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_crit_e`
--
ALTER TABLE `form_crit_e`
  MODIFY `ID_FORM_CRIT_E` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `from_crit_c`
--
ALTER TABLE `from_crit_c`
  MODIFY `ID_FORM_CRIT_C` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gestion`
--
ALTER TABLE `gestion`
  MODIFY `ID_G` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `indicador`
--
ALTER TABLE `indicador`
  MODIFY `ID_INDICADOR` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `ID_N` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota_final`
--
ALTER TABLE `nota_final`
  MODIFY `ID_NF` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID_N` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `CODIGO_P` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `puntaje`
--
ALTER TABLE `puntaje`
  MODIFY `PUNTAJE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `puntaje_ge`
--
ALTER TABLE `puntaje_ge`
  MODIFY `ID_PGE` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `rol_url`
--
ALTER TABLE `rol_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `ID_S` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sesion`
--
ALTER TABLE `sesion`
  MODIFY `ID_S` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `socio`
--
ALTER TABLE `socio`
  MODIFY `CODIGO_S` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_usuario1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asesor`
--
ALTER TABLE `asesor`
  ADD CONSTRAINT `FK_USUARIO__ASESOR` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Constraints for table `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `FK_REGISTRO__ASIGNACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_REGISTRO__ASISTENCIA` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `asistencia_semanal`
--
ALTER TABLE `asistencia_semanal`
  ADD CONSTRAINT `FK_REGISTRO__ASISTENCIA_SEMANAL` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_comentarios_noticias1` FOREIGN KEY (`ID_N`, `NOMBRE_U`) REFERENCES `noticias` (`ID_N`, `NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `criteriocalificacion`
--
ALTER TABLE `criteriocalificacion`
  ADD CONSTRAINT `fk_criterioCalificacion_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `criterio_evaluacion`
--
ALTER TABLE `criterio_evaluacion`
  ADD CONSTRAINT `fk_criterio_evaluacion_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `FK_REGISTRO_DOCUMENTO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `FK_REGISTRO__PRESENTACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `entregable`
--
ALTER TABLE `entregable`
  ADD CONSTRAINT `FK_PLANIFICACION__ENTREGABLE` FOREIGN KEY (`NOMBRE_U`) REFERENCES `planificacion` (`NOMBRE_U`);

--
-- Constraints for table `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `FK_REGISTRO__EVALUACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `fecha_realizacion`
--
ALTER TABLE `fecha_realizacion`
  ADD CONSTRAINT `FK_REGISTRO__FECHA_REALIZACION` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `fk_formulario_asesor1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `asesor` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form_crit_e`
--
ALTER TABLE `form_crit_e`
  ADD CONSTRAINT `fk_formulario_has_criterio_evaluacion_criterio_evaluacion1` FOREIGN KEY (`ID_CRITERIO_E`) REFERENCES `criterio_evaluacion` (`ID_CRITERIO_E`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_formulario_has_criterio_evaluacion_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `from_crit_c`
--
ALTER TABLE `from_crit_c`
  ADD CONSTRAINT `fk_criterioCalificacion_has_formulario_criterioCalificacion1` FOREIGN KEY (`ID_CRITERIO_C`) REFERENCES `criteriocalificacion` (`ID_CRITERIO_C`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_criterioCalificacion_has_formulario_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grupo_empresa`
--
ALTER TABLE `grupo_empresa`
  ADD CONSTRAINT `FK_USUARIO__GRUPO_EMPRESA` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Constraints for table `indicador`
--
ALTER TABLE `indicador`
  ADD CONSTRAINT `fk_indicador_criterioCalificacion1` FOREIGN KEY (`ID_CRITERIO_C`) REFERENCES `criteriocalificacion` (`ID_CRITERIO_C`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `FK_ASESOR__INSCRIPCION` FOREIGN KEY (`NOMBRE_UA`) REFERENCES `asesor` (`NOMBRE_U`),
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__INSCRIPCION` FOREIGN KEY (`NOMBRE_UGE`) REFERENCES `grupo_empresa` (`NOMBRE_U`);

--
-- Constraints for table `inscripcion_proyecto`
--
ALTER TABLE `inscripcion_proyecto`
  ADD CONSTRAINT `fk_inscripcion_proyecto_grupo_empresa1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscripcion_proyecto_proyecto1` FOREIGN KEY (`CODIGO_P`) REFERENCES `proyecto` (`CODIGO_P`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `FK_REGISTRO__MENSAJE` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_formulario` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_grupo_empresa1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nota_final`
--
ALTER TABLE `nota_final`
  ADD CONSTRAINT `fk_nota_final_grupo_empresa1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_usuario1` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_REGISTRO__PAGO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `periodo`
--
ALTER TABLE `periodo`
  ADD CONSTRAINT `fk_periodo_registro1` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_menu1` FOREIGN KEY (`menu_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_menu` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `planificacion`
--
ALTER TABLE `planificacion`
  ADD CONSTRAINT `FK_ESTADO__PLANIFICACION` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`),
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__PLANIFICACION` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`);

--
-- Constraints for table `plazo`
--
ALTER TABLE `plazo`
  ADD CONSTRAINT `FK_REGISTRO__PLAZO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`);

--
-- Constraints for table `precio`
--
ALTER TABLE `precio`
  ADD CONSTRAINT `FK_PLANIFICACION__PRECIO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `planificacion` (`NOMBRE_U`);

--
-- Constraints for table `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_proyecto_gestion1` FOREIGN KEY (`ID_G`) REFERENCES `gestion` (`ID_G`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `puntaje`
--
ALTER TABLE `puntaje`
  ADD CONSTRAINT `fk_puntaje_formulario1` FOREIGN KEY (`ID_FORM`) REFERENCES `formulario` (`ID_FORM`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `puntaje_ge`
--
ALTER TABLE `puntaje_ge`
  ADD CONSTRAINT `fk_PUNTAJE_GE_nota` FOREIGN KEY (`ID_N`) REFERENCES `nota` (`ID_N`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receptor`
--
ALTER TABLE `receptor`
  ADD CONSTRAINT `fk_receptor_registro1` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_ESTADO__REGISTRO` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`),
  ADD CONSTRAINT `FK_TIPO__REGISTRO` FOREIGN KEY (`TIPO_T`) REFERENCES `tipo` (`TIPO_T`),
  ADD CONSTRAINT `FK_USUARIO_REGISTRO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Constraints for table `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_REGISTRO__REPORTE` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`),
  ADD CONSTRAINT `FK_ROL_REPORTE__REPORTE` FOREIGN KEY (`ROL_RR`) REFERENCES `rol_reporte` (`ROL_RR`);

--
-- Constraints for table `rol_aplicacion`
--
ALTER TABLE `rol_aplicacion`
  ADD CONSTRAINT `FK_APLICACION__ROL_APLICACION` FOREIGN KEY (`APLICACION_A`) REFERENCES `aplicacion` (`APLICACION_A`),
  ADD CONSTRAINT `FK_ROL__ROL_APLICACION` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`);

--
-- Constraints for table `rol_url`
--
ALTER TABLE `rol_url`
  ADD CONSTRAINT `fk_RolUrl` FOREIGN KEY (`idUrl`) REFERENCES `url` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RolUrl_Rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`ROL_R`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Rol_Url` FOREIGN KEY (`idUrl`) REFERENCES `url` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `FK_REGISTRO__SEGUIMIENTO` FOREIGN KEY (`ID_R`) REFERENCES `registro` (`ID_R`),
  ADD CONSTRAINT `FK_ROL_REPORTE__SEGUIMIENTO` FOREIGN KEY (`ROL_S`) REFERENCES `rol_reporte` (`ROL_RR`);

--
-- Constraints for table `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `FK_USUARIO_SESION` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

--
-- Constraints for table `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `FK_GRUPO_EMPRESA__SOCIO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `grupo_empresa` (`NOMBRE_U`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_ESTADO__USUARIO` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`);

--
-- Constraints for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `FK_ROL__USUARIO_ROL` FOREIGN KEY (`ROL_R`) REFERENCES `rol` (`ROL_R`),
  ADD CONSTRAINT `FK_USUARIO__USUARIO_ROL` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);

DELETE FROM `socio`;

ALTER TABLE `socio`
  ADD `GESTION` int(11) NOT NULL;
ALTER TABLE `socio`
  ADD KEY `FK_SOCIO_GESTION` (`GESTION`); 
ALTER TABLE `socio`
  ADD CONSTRAINT `FK_SOCIO_GESTION` FOREIGN KEY (`GESTION`) REFERENCES `gestion` (`ID_G`) ON DELETE NO ACTION ON UPDATE NO ACTION;