-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-05-2014 a las 10:26:35
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `puppies_db`
--
CREATE DATABASE IF NOT EXISTS `puppies_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `puppies_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `denom_articulo` varchar(100) NOT NULL,
  `notas_articulo` varchar(255) DEFAULT NULL,
  `stock_articulo` decimal(4,2) NOT NULL DEFAULT '0.00',
  `prcompra_articulo` decimal(4,2) NOT NULL,
  `prventa_articulo` decimal(4,2) NOT NULL,
  `iva_articulo` int(11) NOT NULL,
  `activo_articulo` tinyint(1) NOT NULL DEFAULT '1',
  `id_proveedor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `fk_articles_providers1_idx` (`id_proveedor`),
  KEY `fk_articles_categories1_idx` (`id_categoria`),
  KEY `fk_articulos_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `denom_articulo`, `notas_articulo`, `stock_articulo`, `prcompra_articulo`, `prventa_articulo`, `iva_articulo`, `activo_articulo`, `id_proveedor`, `id_categoria`, `id_usuario`) VALUES
(1, 'Saco 5kg. comida', NULL, '10.00', '8.20', '15.75', 21, 1, 2, 1, 2),
(2, 'Saco 10kg. comida', NULL, '7.00', '12.20', '20.75', 21, 1, 2, 1, 3),
(3, 'Saco 15kg. comida', NULL, '2.00', '15.25', '24.50', 21, 1, 2, 1, 2),
(4, 'Comedero Acero 20cm.', NULL, '3.00', '8.20', '15.75', 21, 1, 1, 6, 1),
(5, 'Chubasquero Cuadros Talla S', NULL, '1.00', '25.15', '32.95', 21, 1, 3, 10, 4),
(9, 'pepsicola', 'notas', '10.00', '99.99', '99.99', 21, 1, 2, 1, 2),
(10, 'dasdasd', '', '22.00', '22.00', '22.00', 22, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `denom_categoria` varchar(45) DEFAULT NULL,
  `desc_categoria` varchar(255) DEFAULT NULL,
  `activo_categoria` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `denom_categoria`, `desc_categoria`, `activo_categoria`) VALUES
(1, 'Alimentación', 'Alimentación seca o conserva', 1),
(2, 'Suplementos Nutritivos', 'Suplementos nutritivos', 1),
(3, 'Golosinas y snacks', 'Golosinas y snacks', 1),
(4, 'Salud', 'Todo tipo de productos de salud', 1),
(5, 'Higiene y belleza', 'Productos de higiene y belleza', 1),
(6, 'Accesorios', 'Todo tipo de accesorios', 1),
(7, 'Transporte', 'Productos para el transporte', 1),
(8, 'Juguetes', 'Juguetes para mascotas', 1),
(9, 'Adiestramiento', 'Todo tipo de accesorios para el adiestramiento', 1),
(10, 'Ropa', 'Todo tipo de ropa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE IF NOT EXISTS `citas` (
  `id_cita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `categoria_cita` enum('plq','grd','rcg') DEFAULT NULL COMMENT 'plq=peluqueria\ngrd=guarderia',
  `notas_cita` text,
  `id_mascota` int(11) NOT NULL,
  PRIMARY KEY (`id_cita`),
  KEY `fk_hairdressers_appointments_pets1_idx` (`id_mascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nif_cliente` varchar(10) NOT NULL,
  `nombre_cliente` varchar(45) NOT NULL,
  `apellidos_cliente` varchar(100) NOT NULL,
  `fnac_cliente` date DEFAULT NULL,
  `falta_cliente` date NOT NULL,
  `sexo_cliente` enum('m','f') NOT NULL,
  `direccion_cliente` varchar(100) DEFAULT NULL,
  `localidad_cliente` varchar(5) DEFAULT NULL,
  `tfno1_cliente` varchar(25) DEFAULT NULL,
  `tfno2_cliente` varchar(25) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `mailing_cliente` tinyint(1) DEFAULT '0',
  `notas_cliente` text,
  `activo_cliente` tinyint(1) NOT NULL DEFAULT '1',
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_clientes_localidades1_idx` (`localidad_cliente`),
  KEY `fk_clientes_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nif_cliente`, `nombre_cliente`, `apellidos_cliente`, `fnac_cliente`, `falta_cliente`, `sexo_cliente`, `direccion_cliente`, `localidad_cliente`, `tfno1_cliente`, `tfno2_cliente`, `email_cliente`, `mailing_cliente`, `notas_cliente`, `activo_cliente`, `id_usuario`) VALUES
(1, '01234567P', 'Julián', 'López Gutiérrez', '1977-10-21', '2014-04-01', 'm', 'Calle Los Gladiolos, 7 Bajo A', '28000', '600600600', NULL, 'julian.lopez@email.com', 1, NULL, 1, 4),
(2, '51500259S', 'María Teresa', 'Jiménez Sánchez', '1969-06-06', '2014-04-01', 'f', 'Avenida de la Libertad, 33 7ºC', '28924', '635956266', NULL, 'mtjimenez@email.com', 1, 'Esto son notas', 1, 4),
(3, '25636985L', 'Ana María', 'Satrústegui Bilbao', '1980-01-06', '2014-04-01', 'f', 'Paseo de la Ermita, 28 1ºA', '28223', '952632563', NULL, 'anasatrustregui@email.com', 1, NULL, 1, 4),
(4, '12565200M', 'Jaime', 'Monzón Camino', '1977-07-25', '2014-04-01', 'm', 'Calle San Chinarro, 27 Bajo A', '28921', '915636235', NULL, 'jaime.monzon@email.com', 0, NULL, 1, 4),
(5, '74584002L', 'Carlos Alberto', 'Alpande Morais', '1959-10-30', '2014-04-01', 'm', 'Calle Cuesta Abajo, 11 3A', '28911', '623562985', NULL, 'calpande@email.com', 1, 'Esto son notas.', 1, 4),
(6, '01242063D', 'José María', 'del Olmo Sánchez', '1972-02-25', '2014-04-01', 'm', 'Avenida Cuesta de Enero, 31 3D DCHA.', '28222', '700251458', '916125263', NULL, 0, NULL, 1, 4),
(7, '15296585F', 'María Vistoria', 'Madrid Gutiérrez', '1965-05-15', '2014-04-01', 'f', 'Calle Rio Alberche, 7 3A', '28019', '625635859', NULL, 'mv.madrid@email.com', 1, 'Esto son notas.', 1, 4),
(8, '18475625N', 'Celia', 'Monje Alarcón', '1977-03-21', '2014-04-01', 'f', 'Carretera a Alcobendas, km. 7 Bajo', '28231', '914567898', NULL, 'celia.monje@email.com', 1, NULL, 1, 4),
(9, '85263255X', 'Cristina', 'Polo López', '1958-04-20', '2014-04-01', 'f', 'Paseo de los Limones, 33 1B', '28700', '916195689', NULL, NULL, 0, NULL, 1, 4),
(10, '45695284T', 'Manuel', 'Sevilla García', '1977-10-21', '2014-04-01', 'm', 'Calle del Palomar, 10 4-4', '28925', '723563859', NULL, 'msevilla@email.com', 1, NULL, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_factura` date NOT NULL,
  `fpago_factura` set('ef','tc','pg','cr','vd') NOT NULL COMMENT 'FPAGO (ef=efectivo, tc=tarjeta credito, pg=pagare/talon, cr=credito, vd=vale descuento)',
  `fvencimiento_factura` date DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_invoices_customers1_idx` (`id_cliente`),
  KEY `fk_facturas_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_facturas`
--

CREATE TABLE IF NOT EXISTS `lineas_facturas` (
  `articulos_id_articulo` int(11) NOT NULL,
  `facturas_id_factura` int(11) NOT NULL,
  `ctad_articulo` decimal(3,2) NOT NULL DEFAULT '1.00',
  `precio_articulo` decimal(3,2) NOT NULL,
  `descuento_linea` decimal(2,0) NOT NULL DEFAULT '0',
  PRIMARY KEY (`articulos_id_articulo`,`facturas_id_factura`),
  KEY `fk_articles_has_invoices_invoices1_idx` (`facturas_id_factura`),
  KEY `fk_articles_has_invoices_articles1_idx` (`articulos_id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `cpostal_localidad` varchar(5) NOT NULL,
  `nombre_localidad` varchar(100) NOT NULL,
  `provincia_localidad` varchar(100) NOT NULL,
  PRIMARY KEY (`cpostal_localidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `localidades`
--

INSERT INTO `localidades` (`cpostal_localidad`, `nombre_localidad`, `provincia_localidad`) VALUES
('28000', 'Madrid', 'MADRID'),
('28019', 'Boadilla del Monte', 'MADRID'),
('28023', 'Pozuelo de Alarcón', 'MADRID'),
('28100', 'Alcobendas', 'MADRID'),
('28108', 'Alcobendas', 'MADRID'),
('28109', 'Alcobendas', 'MADRID'),
('28220', 'Majadahonda', 'MADRID'),
('28221', 'Majadahonda', 'MADRID'),
('28222', 'Majadahonda', 'MADRID'),
('28223', 'Pozuelo de Alarcón', 'MADRID'),
('28230', 'Las Rozas', 'MADRID'),
('28231', 'Las Rozas', 'MADRID'),
('28232', 'Las Rozas', 'MADRID'),
('28290', 'Las Rozas', 'MADRID'),
('28700', 'San Sebastián de los Reyes', 'MADRID'),
('28701', 'San Sebastián de los Reyes', 'MADRID'),
('28702', 'San Sebastián de los Reyes', 'MADRID'),
('28703', 'San Sebastián de los Reyes', 'MADRID'),
('28900', 'Getafe', 'MADRID'),
('28901', 'Getafe', 'MADRID'),
('28902', 'Getafe', 'MADRID'),
('28903', 'Getafe', 'MADRID'),
('28904', 'Getafe', 'MADRID'),
('28905', 'Getafe', 'MADRID'),
('28906', 'Getafe', 'MADRID'),
('28907', 'Getafe', 'MADRID'),
('28908', 'Getafe', 'MADRID'),
('28909', 'Getafe', 'MADRID'),
('28910', 'Leganés', 'MADRID'),
('28911', 'Leganés', 'MADRID'),
('28912', 'Leganés', 'MADRID'),
('28913', 'Leganés', 'MADRID'),
('28914', 'Leganés', 'MADRID'),
('28915', 'Leganés', 'MADRID'),
('28916', 'Leganés', 'MADRID'),
('28917', 'Leganés', 'MADRID'),
('28918', 'Leganés', 'MADRID'),
('28919', 'Leganés', 'MADRID'),
('28920', 'Alcorcón', 'MADRID'),
('28921', 'Alcorcón', 'MADRID'),
('28922', 'Alcorcón', 'MADRID'),
('28923', 'Alcorcón', 'MADRID'),
('28924', 'Alcorcón', 'MADRID'),
('28925', 'Alcorcón', 'MADRID'),
('28930', 'Móstoles', 'MADRID'),
('28931', 'Móstoles', 'MADRID'),
('28932', 'Móstoles', 'MADRID'),
('28933', 'Móstoles', 'MADRID'),
('28934', 'Móstoles', 'MADRID'),
('28935', 'Móstoles', 'MADRID'),
('28936', 'Móstoles', 'MADRID'),
('28937', 'Móstoles', 'MADRID'),
('28938', 'Móstoles', 'MADRID'),
('28940', 'Fuenlabrada', 'MADRID'),
('28941', 'Fuenlabrada', 'MADRID'),
('28942', 'Fuenlabrada', 'MADRID'),
('28943', 'Fuenlabrada', 'MADRID'),
('28944', 'Fuenlabrada', 'MADRID'),
('28945', 'Fuenlabrada', 'MADRID'),
('28946', 'Fuenlabrada', 'MADRID'),
('28947', 'Fuenlabrada', 'MADRID');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE IF NOT EXISTS `mascotas` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mascota` varchar(45) NOT NULL,
  `raza_mascota` varchar(45) NOT NULL,
  `chip_mascota` varchar(45) NOT NULL,
  `fnac_mascota` date NOT NULL,
  `peso_mascota` int(11) DEFAULT NULL,
  `genero_mascota` enum('macho','hembra') NOT NULL,
  `notas_mascota` text,
  `librovac_mascota` tinyint(1) DEFAULT NULL,
  `foto_mascota` varchar(100) DEFAULT NULL,
  `activo_mascota` tinyint(1) NOT NULL DEFAULT '1',
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_mascota`),
  KEY `fk_mascotas_clientes1_idx` (`id_cliente`),
  KEY `fk_mascotas_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id_mascota`, `nombre_mascota`, `raza_mascota`, `chip_mascota`, `fnac_mascota`, `peso_mascota`, `genero_mascota`, `notas_mascota`, `librovac_mascota`, `foto_mascota`, `activo_mascota`, `id_cliente`, `id_usuario`) VALUES
(1, 'Yacky', 'Mestizo', 'ABF7894526', '2008-06-01', 10, 'macho', 'Alergico a las alergias ...', 1, 'foto01.jpg', 1, 1, 4),
(2, 'Princess', 'Caniche', 'EGF4526398', '2010-03-01', 4, 'hembra', 'Alergico a las alergias ...', 1, 'foto01.jpg', 5, 1, 4),
(3, 'Canela', 'Boxer', 'GGF0125221', '2003-10-01', 15, 'hembra', NULL, 1, 'foto01.jpg', 1, 1, 4),
(4, 'Sherlock', 'Pointer', 'CDC0023665', '2010-03-01', 10, 'macho', 'Un verdadero detective.', 1, 'foto01.jpg', 3, 1, 4),
(5, 'Guacamole', 'Bulldog Francés', 'FFD7451236', '2008-12-01', 9, 'macho', 'Le encanta el guacamole ...', 0, 'foto01.jpg', 4, 1, 4),
(6, 'Diana', 'Akita', 'RET1002533', '2011-06-01', 9, 'hembra', 'Alergico a las alergias ...', 1, 'foto01.jpg', 9, 1, 4),
(7, 'Bond', 'Carlino', 'ASD4568523', '2006-01-01', 8, 'macho', 'Alergico a las alergias ...', 1, 'foto01.jpg', 3, 1, 4),
(8, 'Vertigo', 'Pastor Australiano', 'XXX2342344', '2007-03-01', 18, 'macho', 'Más rapido que el trueno ...', 0, 'foto01.jpg', 8, 1, 4),
(9, 'Princesa', 'Collie', 'AED5698523', '2010-09-01', 7, 'hembra', NULL, 1, 'foto01.jpg', 6, 1, 4),
(10, 'Cafeto', 'Labrador', 'ABF7894526', '2008-06-01', 10, 'macho', 'Alergico a las alergias ...', 1, 'foto01.jpg', 4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles_usuario`
--

CREATE TABLE IF NOT EXISTS `perfiles_usuario` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(25) NOT NULL,
  `desc_perfil` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `perfiles_usuario`
--

INSERT INTO `perfiles_usuario` (`id_perfil`, `nombre_perfil`, `desc_perfil`) VALUES
(1, 'admin', 'Usuarios administradores con control total.'),
(2, 'user', 'Usuario general de la aplicacion.'),
(3, 'guest', 'Usuario invitado con un minimo de privilegios.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(100) NOT NULL,
  `nif_proveedor` varchar(10) NOT NULL,
  `direccion_proveedor` varchar(45) DEFAULT NULL,
  `localidad_proveedor` varchar(5) NOT NULL,
  `tfno1_proveedor` varchar(13) NOT NULL,
  `tfno2_proveedor` varchar(13) DEFAULT NULL,
  `fax_proveedor` varchar(13) DEFAULT NULL,
  `email_proveedor` varchar(45) DEFAULT NULL,
  `web_proveedor` varchar(45) DEFAULT NULL,
  `contacto_proveedor` varchar(100) DEFAULT NULL,
  `activo_proveedor` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_proveedor`),
  KEY `fk_proveedores_localidades1_idx` (`localidad_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `nif_proveedor`, `direccion_proveedor`, `localidad_proveedor`, `tfno1_proveedor`, `tfno2_proveedor`, `fax_proveedor`, `email_proveedor`, `web_proveedor`, `contacto_proveedor`, `activo_proveedor`) VALUES
(1, 'Miscota S.L.', 'B83234567', 'Calle Perdigones 7', '28922', '914567899', NULL, NULL, 'miscota@miscota.es', 'http://www.miscota.es', 'José Mª Vilches', 1),
(2, 'Dimac S.L.', 'B82678215', 'Calle Lirios 27', '28223', '915692536', NULL, '912563987', 'dimasc@dimac.es', 'http://www.dimac.es', 'Ana García', 1),
(3, 'Grupo Asis S.L.', 'B80564832', 'Avda. Arcentales, 33 2º', '28000', '910256885', '635652995', NULL, 'pedidos@grupoasis.com', 'http://www.grupoasis.com', 'Marta Merino', 1),
(4, 'Arquivet S.L.', 'B84526932', 'Paseo de las Rejas, 41', '28700', '914567899', NULL, NULL, 'arquivet@arquivet.es', 'http://www.arquivet.es', 'Manuel Manzano', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(25) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `pwd_usuario` varchar(45) NOT NULL,
  `falta_usuario` date NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `activo_usuario` tinyint(1) NOT NULL DEFAULT '1',
  `nintentos_usuario` int(11) NOT NULL DEFAULT '0' COMMENT 'Llevaremos un registro de los intentos de acceso del usuario para bloquearle la cuenta si mas de 3 intentos incorrectos.',
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_perfiles_usuario_idx` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre_usuario`, `pwd_usuario`, `falta_usuario`, `id_perfil`, `activo_usuario`, `nintentos_usuario`) VALUES
(1, 'belen@belen.com', 'Belen Larrubia', '3beb46aaf0b84145ea72813eecab4a2ba3372905', '2014-04-01', 1, 1, 0),
(2, 'sandra@sandra.com', 'Sandra Alarcon', 'cad1524360e58851cd0ae1e82b75ff5283474667', '2014-04-01', 1, 1, 0),
(3, 'david@david.com', 'David Rodriguez', 'aa743a0aaec8f7d7a1f01442503957f4d7a2d634', '2014-04-01', 1, 1, 0),
(4, 'user@user.com', 'Usuario', '12dea96fec20593566ab75692c9949596833adc9', '2014-04-01', 2, 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articles_categories1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_providers1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articulos_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_hairdressers_appointments_pets1` FOREIGN KEY (`id_mascota`) REFERENCES `mascotas` (`id_mascota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customers_cities1` FOREIGN KEY (`localidad_cliente`) REFERENCES `localidades` (`cpostal_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoices_customers1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lineas_facturas`
--
ALTER TABLE `lineas_facturas`
  ADD CONSTRAINT `fk_articles_has_invoices_articles1` FOREIGN KEY (`articulos_id_articulo`) REFERENCES `articulos` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articles_has_invoices_invoices1` FOREIGN KEY (`facturas_id_factura`) REFERENCES `facturas` (`id_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `fk_mascotas_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mascotas_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `fk_proveedores_localidades1` FOREIGN KEY (`localidad_proveedor`) REFERENCES `localidades` (`cpostal_localidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_perfiles_usuario` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles_usuario` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
