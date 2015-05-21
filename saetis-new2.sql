-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2015 at 06:14 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `saetis`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=8192;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`ID_R`, `NOMBRE_U`, `TIPO_T`, `ESTADO_E`, `NOMBRE_R`, `FECHA_R`, `HORA_R`) VALUES
(55, 'LeticiaB', 'documento requerido', 'Habilitado', 'Parte R', '2015-03-06', '02:53:30'),
(56, 'FreeValue', 'documento subido', 'habilitado', 'Parte R', '2015-03-06', '02:02:55'),
(57, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-03-06', '07:07:56'),
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
(75, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de Slow Code', '2015-04-22', '06:06:02'),
(76, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 1', '2015-04-22', '00:39:36'),
(77, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 2', '2015-04-22', '00:39:36'),
(78, 'Nuevo123', 'actividad planificacion', 'en proceso', 'Actividad 3', '2015-04-22', '00:39:36'),
(79, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 1', '2015-04-22', '00:54:42'),
(80, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 2', '2015-04-22', '00:54:42'),
(81, 'Nuevo123', 'pago planificacion', 'en proceso', 'Actividad 3', '2015-04-22', '00:54:42'),
(83, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de FreeValue', '2015-04-23', '02:02:44'),
(87, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de Slow Code', '2015-05-06', '01:01:55'),
(96, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de Slow Code', '2015-05-14', '02:02:00'),
(97, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de Slow Code', '2015-05-14', '02:02:06'),
(98, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de Slow Code', '2015-05-15', '23:23:06'),
(99, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de Slow Code', '2015-05-15', '23:23:10'),
(100, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de FreeValue', '2015-05-19', '22:22:21'),
(101, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-05-19', '22:22:22'),
(103, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-05-20', '02:02:03'),
(104, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-05-20', '02:02:27'),
(112, 'LeticiaB', 'publicaciones', 'Habilitado', 'Orden de Cambio de FreeValue', '2015-05-21', '05:05:41'),
(113, 'LeticiaB', 'publicaciones', 'Habilitado', 'Notificacion de Conformidad de FreeValue', '2015-05-21', '05:05:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_R`) USING BTREE,
  ADD KEY `FK_ESTADO__REGISTRO` (`ESTADO_E`) USING BTREE,
  ADD KEY `FK_TIPO__REGISTRO` (`TIPO_T`) USING BTREE,
  ADD KEY `FK_USUARIO_REGISTRO` (`NOMBRE_U`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_R` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=114;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_ESTADO__REGISTRO` FOREIGN KEY (`ESTADO_E`) REFERENCES `estado` (`ESTADO_E`),
  ADD CONSTRAINT `FK_TIPO__REGISTRO` FOREIGN KEY (`TIPO_T`) REFERENCES `tipo` (`TIPO_T`),
  ADD CONSTRAINT `FK_USUARIO_REGISTRO` FOREIGN KEY (`NOMBRE_U`) REFERENCES `usuario` (`NOMBRE_U`);
