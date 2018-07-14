# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Base de datos: yapues
# Tiempo de Generación: 2018-07-14 01:58:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Volcado de tabla regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`region_id`, `region_name`)
VALUES
	(1,'Región Metropolitana'),
	(2,'XV Arica & Parinacota'),
	(3,'I Tarapacá'),
	(4,'II Antofagasta'),
	(5,'III Atacama'),
	(6,'IV Coquimbo'),
	(7,'V Valparaíso'),
	(8,'VI O\'Higgins'),
	(9,'VII Maule'),
	(10,'VIII Biobío'),
	(11,'IX Araucanía'),
	(12,'XIV Los Ríos'),
	(13,'X Los Lagos'),
	(14,'XI Aisén'),
	(15,'XII Magallanes & Antártica');

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla towns
# ------------------------------------------------------------

DROP TABLE IF EXISTS `towns`;

CREATE TABLE `towns` (
  `town_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `town_name` varchar(100) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`town_id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `towns_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`region_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `towns` WRITE;
/*!40000 ALTER TABLE `towns` DISABLE KEYS */;

INSERT INTO `towns` (`town_id`, `town_name`, `region_id`)
VALUES
	(1,'Alhué',1),
	(2,'Buin',1),
	(3,'Calera de Tango',1),
	(4,'Cerrillos',1),
	(5,'Cerro Navia',1),
	(6,'Colina',1),
	(7,'Conchalí',1),
	(8,'Curacaví',1),
	(9,'El Bosque',1),
	(10,'El Monte',1),
	(11,'Estación Central',1),
	(12,'Huechuraba',1),
	(13,'Independencia',1),
	(14,'Isla de Maipo',1),
	(15,'La Cisterna',1),
	(16,'La Florida',1),
	(17,'La Granja',1),
	(18,'La Pintana',1),
	(19,'La Reina',1),
	(20,'Lampa',1),
	(21,'Las Condes',1),
	(22,'Lo Barnechea',1),
	(23,'Lo Espejo',1),
	(24,'Macul',1),
	(25,'Maipú',1),
	(26,'Maria Pinto',1),
	(27,'Melipilla',1),
	(28,'Ñuñoa',1),
	(29,'Padre Hurtado',1),
	(30,'Paine',1),
	(31,'Pedro Aguirre Cerda',1),
	(32,'Peñaflor',1),
	(33,'Peñalolen',1),
	(34,'Pirque',1),
	(35,'Providencia',1),
	(36,'Pudahuel',1),
	(37,'Puente Alto',1),
	(38,'Qulicura',1),
	(39,'Quinta Normal',1),
	(40,'Recoleta',1),
	(41,'Renca',1),
	(42,'San Bernardo',1),
	(43,'San Joaquin',1),
	(44,'San José de Maipo',1),
	(45,'San Miguel',1),
	(46,'San Pedro',1),
	(47,'San Ramón',1),
	(48,'Santiago',1),
	(49,'Talagante',1),
	(50,'Tiltil',1),
	(51,'Vitacura',1),
	(52,'Arica',2),
	(53,'Camarones',2),
	(54,'General lagos',2),
	(55,'Putre',2),
	(56,'Alto Hospicio',3),
	(57,'Camiña',3),
	(58,'Colchane',3),
	(59,'Huara',3),
	(60,'Iquique',3),
	(61,'Pica',3),
	(62,'Pozo Almonte',3),
	(63,'Anrofagasta',4),
	(64,'Calama',4),
	(65,'Maria Elena',4),
	(66,'Mejillones',4),
	(67,'Ollagüe',4),
	(68,'San Pedro de Atacama',4),
	(69,'Sierra Gorda',4),
	(70,'Taltal',4),
	(71,'Tocopilla',4),
	(72,'Alto del Carmen',5),
	(73,'Caldera',5),
	(74,'Chañaral',5),
	(75,'Copiapó',5),
	(76,'Diego de Almagro',5),
	(77,'Freirina',5),
	(78,'Huasco',5),
	(79,'Tierra Amarilla',5),
	(80,'Vallenar',5),
	(81,'Andacollo',6),
	(82,'Canela',6),
	(83,'Combarbalá',6),
	(84,'Coquimbo',6),
	(85,'Illapel',6),
	(86,'La Higuera',6),
	(87,'La Serena',6),
	(88,'Los Vilos',6),
	(89,'Monte Patria',6),
	(90,'Ovalle',6),
	(91,'Paiguano',6),
	(92,'Punitaqui',6),
	(93,'Río Hurtado',6),
	(94,'Salamanca',6),
	(95,'Vicuña',6),
	(96,'Algarrobo',7),
	(97,'Cabildo',7),
	(98,'Calera',7),
	(99,'Calle Larga',7),
	(100,'Cartagena',7),
	(101,'Casanueva',7),
	(102,'Catemu',7),
	(103,'Concón',7),
	(104,'El Quisco',7),
	(105,'El Tabo',7),
	(106,'Hijuelas',7),
	(107,'Isla de Pascua',7),
	(108,'Juan Fernández',7),
	(109,'La Cruz',7),
	(110,'La Ligua',7),
	(111,'Limache',7),
	(112,'Llaillay',7),
	(113,'Los Andes',7),
	(114,'Nogales',7),
	(115,'Olmué',7),
	(116,'Panquehue',7),
	(117,'Papudo',7),
	(118,'Petorca',7),
	(119,'Puchuncaví',7),
	(120,'Putaendo',7),
	(121,'Quillota',7),
	(122,'Quilpué',7),
	(123,'Quintero',7),
	(124,'Rinconada',7),
	(125,'San Antonio',7),
	(126,'San Esteban',7),
	(127,'San Felipe',7),
	(128,'Santa María',7),
	(129,'Santo Domingo',7),
	(130,'Valparaíso',7),
	(131,'Villa Alemana',7),
	(132,'Viña del Mar',7),
	(133,'Zapallar',7),
	(134,'Chépica',8),
	(135,'Chimbarongo',8),
	(136,'Codegua',8),
	(137,'Coinco',8),
	(138,'Coltauco',8),
	(139,'Doñihue',8),
	(140,'Graneros',8),
	(141,'La Estrella',8),
	(142,'Las Cabras',8),
	(143,'Litueche',8),
	(144,'Lolol',8),
	(145,'Machalí',8),
	(146,'Malloa',8),
	(147,'Marchihue',8),
	(148,'Mostazal',8),
	(149,'Nancahua',8),
	(150,'Navidad',8),
	(151,'Olivar',8),
	(152,'Palmilla',8),
	(153,'Paredones',8),
	(154,'Peralillo',8),
	(155,'Peumo',8),
	(156,'Pichidehua',8),
	(157,'Pichilemu',8),
	(158,'Placilla',8),
	(159,'Pumanque',8),
	(160,'Quinta de Tilcoco',8),
	(161,'Rancahua',8),
	(162,'Rengo',8),
	(163,'Requínoa',8),
	(164,'San Fernando',8),
	(165,'San Vicente',8),
	(166,'Santa Cruz',8),
	(167,'Cauquenes',9),
	(168,'Chango',9),
	(169,'Colbún',9),
	(170,'Constitución',9),
	(171,'Curepto',9),
	(172,'Curicó',9),
	(173,'Empedrado',9),
	(174,'Hualañé',9),
	(175,'Licantén',9),
	(176,'Linares',9),
	(177,'Longaví',9),
	(178,'Maule',9),
	(179,'Molina',9),
	(180,'Parral',9),
	(181,'Pelarmo',9),
	(182,'Pelluhue',9),
	(183,'Pencahue',9),
	(184,'Rauco',9),
	(185,'Retiro',9),
	(186,'Rio Claro',9),
	(187,'Romeral',9),
	(188,'Sagrada Familia',9),
	(189,'San Clemente',9),
	(190,'San Javier',9),
	(191,'San Rafael',9),
	(192,'Talca',9),
	(193,'Teno',9),
	(194,'Vichuquén',9),
	(195,'Villa Alegre',9),
	(196,'Yerbas Buenas',9),
	(197,'Alto Bío-Bío',10),
	(198,'Antuco',10),
	(199,'Arauco',10),
	(200,'Bulnes',10),
	(201,'Cabrero',10),
	(202,'Cañete',10),
	(203,'Chiguayante',10),
	(204,'Chillán',10),
	(205,'Chillán Viejo',10),
	(206,'Cobquecura',10),
	(207,'Coelemu',10),
	(208,'Coihueco',10),
	(209,'Concepción',10),
	(210,'Contulmo',10),
	(211,'Coronel',10),
	(212,'Curanilahue',10),
	(213,'El Carmen',10),
	(214,'Florida',10),
	(215,'Hualpén',10),
	(216,'Hualqui',10),
	(217,'Laja',10),
	(218,'Lebu',10),
	(219,'Los Alamos',10),
	(220,'Los Ángeles',10),
	(221,'Lota',10),
	(222,'Mulchén',10),
	(223,'Nacimiento',10),
	(224,'Negrete',10),
	(225,'Ninhue',10),
	(226,'Pemuco',10),
	(227,'Penco',10),
	(228,'Pinto',10),
	(229,'Portezuelo',10),
	(230,'Quillaco',10),
	(231,'Quilleco',10),
	(232,'Quillón',10),
	(233,'Quirihue',10),
	(234,'Ránquil',10),
	(235,'San Carlos',10),
	(236,'San Fabián',10),
	(237,'San Ignacio',10),
	(238,'San Nicolás',10),
	(239,'San Pedro de la Paz',10),
	(240,'San Rosendo',10),
	(241,'Santa Bárbara',10),
	(242,'Santa Juana',10),
	(243,'Talcahuano',10),
	(244,'Tirúa',10),
	(245,'Tomé',10),
	(246,'Treguaco',10),
	(247,'Tucapel',10),
	(248,'Yumbél',10),
	(249,'Yungay',10),
	(250,'Angol',11),
	(251,'Carahue',11),
	(252,'Cholchol',11),
	(253,'Collipulli',11),
	(254,'Cunco',11),
	(255,'Curacautín',11),
	(256,'Curarrehue',11),
	(257,'Ercilla',11),
	(258,'Freire',11),
	(259,'Galvarino',11),
	(260,'Gorbea',11),
	(261,'Lautaro',11),
	(262,'Loncoche',11),
	(263,'Lonquimay',11),
	(264,'Los Sauces',11),
	(265,'Lumaco',11),
	(266,'Melipeuco',11),
	(267,'Nueva Imperial',11),
	(268,'Padre las Casas',11),
	(269,'Perquenco',11),
	(270,'Pitrufquén',11),
	(271,'Pucón',11),
	(272,'Purén',11),
	(273,'Renaico',11),
	(274,'Saavedra',11),
	(275,'Temuco',11),
	(276,'Teodoro Schmidt',11),
	(277,'Toltén',11),
	(278,'Traiguén',11),
	(279,'Victoria',11),
	(280,'Vilcún',11),
	(281,'Villarrica',11),
	(282,'Corral',12),
	(283,'Futrono',12),
	(284,'La Unión',12),
	(285,'Lago Ranco',12),
	(286,'Lanco',12),
	(287,'Los Lagos',12),
	(288,'Máfil',12),
	(289,'Mariquina',12),
	(290,'Paillaco',12),
	(291,'Panguipullo',12),
	(292,'Río Bueno',12),
	(293,'Valdivia',12),
	(294,'Ancud',13),
	(295,'Calbuco',13),
	(296,'Castro',13),
	(297,'Chaitén',13),
	(298,'Chonchoi',13),
	(299,'Cochamó',13),
	(300,'Curaco de Veléz',13),
	(301,'Dalcahue',13),
	(302,'Fresia',13),
	(303,'Frutillar',13),
	(304,'Futaleufú',13),
	(305,'Hualaihué',13),
	(306,'Llanquihue',13),
	(307,'Los Muermos',13),
	(308,'Maullín',13),
	(309,'Osorno',13),
	(310,'Palena',13),
	(311,'Puerto Montt',13),
	(312,'Puerto Octay',13),
	(313,'Puerto Varas',13),
	(314,'Puqueldón',13),
	(315,'Purranque',13),
	(316,'Puyehue',13),
	(317,'Queilén',13),
	(318,'Quellón',13),
	(319,'Quemchi',13),
	(320,'Quincao',13),
	(321,'Río Negro',13),
	(322,'San Juan de la Costa',13),
	(323,'San Pablo',13),
	(324,'Aysen',14),
	(325,'Chile Chico',14),
	(326,'Cisnes',14),
	(327,'Cochrane',14),
	(328,'Coihaique',14),
	(329,'Guaitecas',14),
	(330,'Lago Verde',14),
	(331,'O\'Higgins',14),
	(332,'Río Ibañez',14),
	(333,'Tortel',14),
	(334,'Antártica',15),
	(335,'Cabo de Hornos',15),
	(336,'Laguna Blanca',15),
	(337,'Natales',15),
	(338,'Porvenir',15),
	(339,'Primavera',15),
	(340,'Punta Arenas',15),
	(341,'Río Verde',15),
	(342,'San Gregorio',15),
	(343,'Timaukel',15),
	(344,'Torres del Paine',15);

/*!40000 ALTER TABLE `towns` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
