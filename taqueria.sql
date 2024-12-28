-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2023 a las 08:05:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taqueria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora_pedido`
--

CREATE TABLE `bitacora_pedido` (
  `id_bpedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `hora_pedido` time NOT NULL,
  `hora_entrega` time NOT NULL,
  `pedido` text NOT NULL,
  `costo_total` float DEFAULT NULL,
  `comentario_general` text NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora_pedido`
--

INSERT INTO `bitacora_pedido` (`id_bpedido`, `fecha_pedido`, `hora_pedido`, `hora_entrega`, `pedido`, `costo_total`, `comentario_general`, `id_cliente`, `id_sucursal`, `direccion`) VALUES
(19, '2023-06-01', '00:26:06', '19:22:22', '5 Taco de Chorizo 4 Taco de pastor ', NULL, 'sin verdura', 1, 1, 'P. de La Juventud 504-int 1, Centro, Cortazar, Guanajuato, Mexico'),
(20, '2023-06-01', '16:29:35', '19:22:24', '3 Taco de Costilla de cerdo 5 Taco de pastor 5 Taco de Chorizo ', NULL, 'Extra salsa', 1, 2, 'Camino del maÅ•quÃ©s, Monclova, Chiapas, Mexico'),
(21, '2023-06-01', '16:29:35', '19:39:34', '3 Taco de Costilla de cerdo 5 Taco de pastor 5 Taco de Chorizo ', NULL, 'Extra salsa', 1, 2, 'Camino del maÅ•quÃ©s, Monclova, Chiapas, Mexico'),
(22, '2023-06-02', '00:26:06', '03:07:04', '5 Taco de Chorizo 4 Taco de pastor ', NULL, 'sin verdura', 1, 1, 'P. de La Juventud 504-int 1, Centro, Cortazar, Guanajuato, Mexico'),
(23, '2023-06-02', '03:07:25', '03:09:34', '4 Taco de Chorizo 4 Taco de Chorizo ', NULL, 'Extra salsa', 1, 2, 'P. de La Juventud 504-int 1, Centro, Cortazar, Guanajuato, Mexico'),
(24, '2023-06-02', '03:10:26', '03:27:49', '3 Taco de Chorizo 7 Taco de pastor ', 80, 'Extra cilantro', 1, 2, 'Camino del maÅ•quÃ©s, Monclova, Chiapas, Mexico'),
(25, '2023-06-02', '03:28:23', '03:31:27', '5 Taco de pastor 3 Taco de Costilla de cerdo ', 67, 'Sin salsa', 1, 5, 'Camino del maÅ•quÃ©s, Monclova, Chiapas, Mexico'),
(28, '2023-06-02', '21:18:35', '21:20:43', '5 Taco de Costilla de cerdo 1 Agua de Horchata ', 70, 'Sin salsa', 7, 2, 'Camino de los huacales, Amozoc, Puebla, Mexico'),
(29, '2023-06-03', '06:13:40', '06:17:19', '3 Taco de Chorizo 1 Agua de Horchata ', 49, '', 1, 1, 'P. de La Juventud 504-int 1, Centro, Cortazar, Guanajuato, Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`, `id_estado`) VALUES
(1001, 'Aguascalientes', 1),
(1002, 'Asientos', 1),
(1003, 'Calvillo', 1),
(1004, 'Cosío', 1),
(1005, 'Jesús María', 1),
(1006, 'Pabellón de Arteaga', 1),
(1007, 'Rincón de Romos', 1),
(1008, 'San José de Gracia', 1),
(1009, 'Tepezalá', 1),
(1010, 'El Llano', 1),
(1011, 'San Francisco de los Romo', 1),
(2001, 'Ensenada', 2),
(2002, 'Mexicali', 2),
(2003, 'Tecate', 2),
(2004, 'Tijuana', 2),
(2005, 'Playas de Rosarito', 2),
(3001, 'Comondú', 3),
(3002, 'Mulegé', 3),
(3003, 'La Paz', 3),
(3008, 'Los Cabos', 3),
(3009, 'Loreto', 3),
(4001, 'Calkiní', 4),
(4002, 'Campeche', 4),
(4003, 'Carmen', 4),
(4004, 'Champotón', 4),
(4005, 'Hecelchakán', 4),
(4006, 'Hopelchén', 4),
(4007, 'Palizada', 4),
(4008, 'Tenabo', 4),
(4009, 'Escárcega', 4),
(4010, 'Calakmul', 4),
(4011, 'Candelaria', 4),
(5001, 'Abasolo', 5),
(5002, 'Acuña', 5),
(5003, 'Allende', 5),
(5004, 'Arteaga', 5),
(5005, 'Candela', 5),
(5006, 'Castaños', 5),
(5007, 'Cuatro Ciénegas', 5),
(5008, 'Escobedo', 5),
(5009, 'Francisco I. Madero', 5),
(5010, 'Frontera', 5),
(5011, 'General Cepeda', 5),
(5012, 'Guerrero', 5),
(5013, 'Hidalgo', 5),
(5014, 'Jiménez', 5),
(5015, 'Juárez', 5),
(5016, 'Lamadrid', 5),
(5017, 'Matamoros', 5),
(5018, 'Monclova', 5),
(5019, 'Morelos', 5),
(5020, 'Múzquiz', 5),
(5021, 'Nadadores', 5),
(5022, 'Nava', 5),
(5023, 'Ocampo', 5),
(5024, 'Parras', 5),
(5025, 'Piedras Negras', 5),
(5026, 'Progreso', 5),
(5027, 'Ramos Arizpe', 5),
(5028, 'Sabinas', 5),
(5029, 'Sacramento', 5),
(5030, 'Saltillo', 5),
(5031, 'San Buenaventura', 5),
(5032, 'San Juan de Sabinas', 5),
(5033, 'San Pedro', 5),
(5034, 'Sierra Mojada', 5),
(5035, 'Torreón', 5),
(5036, 'Viesca', 5),
(5037, 'Villa Unión', 5),
(5038, 'Zaragoza', 5),
(6001, 'Armería', 6),
(6002, 'Colima', 6),
(6003, 'Comala', 6),
(6004, 'Coquimatlán', 6),
(6005, 'Cuauhtémoc', 6),
(6006, 'Ixtlahuacán', 6),
(6007, 'Manzanillo', 6),
(6008, 'Minatitlán', 6),
(6009, 'Tecomán', 6),
(6010, 'Villa de Álvarez', 6),
(7001, 'Acacoyagua', 7),
(7002, 'Acala', 7),
(7003, 'Acapetahua', 7),
(7004, 'Altamirano', 7),
(7005, 'Amatán', 7),
(7006, 'Amatenango de la Frontera', 7),
(7007, 'Amatenango del Valle', 7),
(7008, 'Angel Albino Corzo', 7),
(7009, 'Arriaga', 7),
(7010, 'Bejucal de Ocampo', 7),
(7011, 'Bella Vista', 7),
(7012, 'Berriozábal', 7),
(7013, 'Bochil', 7),
(7014, 'El Bosque', 7),
(7015, 'Cacahoatán', 7),
(7016, 'Catazajá', 7),
(7017, 'Cintalapa', 7),
(7018, 'Coapilla', 7),
(7019, 'Comitán de Domínguez', 7),
(7020, 'La Concordia', 7),
(7021, 'Copainalá', 7),
(7022, 'Chalchihuitán', 7),
(7023, 'Chamula', 7),
(7024, 'Chanal', 7),
(7025, 'Chapultenango', 7),
(7026, 'Chenalhó', 7),
(7027, 'Chiapa de Corzo', 7),
(7028, 'Chiapilla', 7),
(7029, 'Chicoasén', 7),
(7030, 'Chicomuselo', 7),
(7031, 'Chilón', 7),
(7032, 'Escuintla', 7),
(7033, 'Francisco León', 7),
(7034, 'Frontera Comalapa', 7),
(7035, 'Frontera Hidalgo', 7),
(7036, 'La Grandeza', 7),
(7037, 'Huehuetán', 7),
(7038, 'Huixtán', 7),
(7039, 'Huitiupán', 7),
(7040, 'Huixtla', 7),
(7041, 'La Independencia', 7),
(7042, 'Ixhuatán', 7),
(7043, 'Ixtacomitán', 7),
(7044, 'Ixtapa', 7),
(7045, 'Ixtapangajoya', 7),
(7046, 'Jiquipilas', 7),
(7047, 'Jitotol', 7),
(7048, 'Juárez', 7),
(7049, 'Larráinzar', 7),
(7050, 'La Libertad', 7),
(7051, 'Mapastepec', 7),
(7052, 'Las Margaritas', 7),
(7053, 'Mazapa de Madero', 7),
(7054, 'Mazatán', 7),
(7055, 'Metapa', 7),
(7056, 'Mitontic', 7),
(7057, 'Motozintla', 7),
(7058, 'Nicolás Ruíz', 7),
(7059, 'Ocosingo', 7),
(7060, 'Ocotepec', 7),
(7061, 'Ocozocoautla de Espinosa', 7),
(7062, 'Ostuacán', 7),
(7063, 'Osumacinta', 7),
(7064, 'Oxchuc', 7),
(7065, 'Palenque', 7),
(7066, 'Pantelhó', 7),
(7067, 'Pantepec', 7),
(7068, 'Pichucalco', 7),
(7069, 'Pijijiapan', 7),
(7070, 'El Porvenir', 7),
(7071, 'Villa Comaltitlán', 7),
(7072, 'Pueblo Nuevo Solistahuacán', 7),
(7073, 'Rayón', 7),
(7074, 'Reforma', 7),
(7075, 'Las Rosas', 7),
(7076, 'Sabanilla', 7),
(7077, 'Salto de Agua', 7),
(7078, 'San Cristóbal de las Casas', 7),
(7079, 'San Fernando', 7),
(7080, 'Siltepec', 7),
(7081, 'Simojovel', 7),
(7082, 'Sitalá', 7),
(7083, 'Socoltenango', 7),
(7084, 'Solosuchiapa', 7),
(7085, 'Soyaló', 7),
(7086, 'Suchiapa', 7),
(7087, 'Suchiate', 7),
(7088, 'Sunuapa', 7),
(7089, 'Tapachula', 7),
(7090, 'Tapalapa', 7),
(7091, 'Tapilula', 7),
(7092, 'Tecpatán', 7),
(7093, 'Tenejapa', 7),
(7094, 'Teopisca', 7),
(7096, 'Tila', 7),
(7097, 'Tonalá', 7),
(7098, 'Totolapa', 7),
(7099, 'La Trinitaria', 7),
(7100, 'Tumbalá', 7),
(7101, 'Tuxtla Gutiérrez', 7),
(7102, 'Tuxtla Chico', 7),
(7103, 'Tuzantán', 7),
(7104, 'Tzimol', 7),
(7105, 'Unión Juárez', 7),
(7106, 'Venustiano Carranza', 7),
(7107, 'Villa Corzo', 7),
(7108, 'Villaflores', 7),
(7109, 'Yajalón', 7),
(7110, 'San Lucas', 7),
(7111, 'Zinacantán', 7),
(7112, 'San Juan Cancuc', 7),
(7113, 'Aldama', 7),
(7114, 'Benemérito de las Américas', 7),
(7115, 'Maravilla Tenejapa', 7),
(7116, 'Marqués de Comillas', 7),
(7117, 'Montecristo de Guerrero', 7),
(7118, 'San Andrés Duraznal', 7),
(7119, 'Santiago el Pinar', 7),
(7120, 'Capitán Luis Ángel Vidal', 7),
(7121, 'Rincón Chamula San Pedro', 7),
(7122, 'El Parral', 7),
(7123, 'Emiliano Zapata', 7),
(7124, 'Mezcalapa', 7),
(8001, 'Ahumada', 8),
(8002, 'Aldama', 8),
(8003, 'Allende', 8),
(8004, 'Aquiles Serdán', 8),
(8005, 'Ascensión', 8),
(8006, 'Bachíniva', 8),
(8007, 'Balleza', 8),
(8008, 'Batopilas de Manuel Gómez Morín', 8),
(8009, 'Bocoyna', 8),
(8010, 'Buenaventura', 8),
(8011, 'Camargo', 8),
(8012, 'Carichí', 8),
(8013, 'Casas Grandes', 8),
(8014, 'Coronado', 8),
(8015, 'Coyame del Sotol', 8),
(8016, 'La Cruz', 8),
(8017, 'Cuauhtémoc', 8),
(8018, 'Cusihuiriachi', 8),
(8019, 'Chihuahua', 8),
(8020, 'Chínipas', 8),
(8021, 'Delicias', 8),
(8022, 'Dr. Belisario Domínguez', 8),
(8023, 'Galeana', 8),
(8024, 'Santa Isabel', 8),
(8025, 'Gómez Farías', 8),
(8026, 'Gran Morelos', 8),
(8027, 'Guachochi', 8),
(8028, 'Guadalupe', 8),
(8029, 'Guadalupe y Calvo', 8),
(8030, 'Guazapares', 8),
(8031, 'Guerrero', 8),
(8032, 'Hidalgo del Parral', 8),
(8033, 'Huejotitán', 8),
(8034, 'Ignacio Zaragoza', 8),
(8035, 'Janos', 8),
(8036, 'Jiménez', 8),
(8037, 'Juárez', 8),
(8038, 'Julimes', 8),
(8039, 'López', 8),
(8040, 'Madera', 8),
(8041, 'Maguarichi', 8),
(8042, 'Manuel Benavides', 8),
(8043, 'Matachí', 8),
(8044, 'Matamoros', 8),
(8045, 'Meoqui', 8),
(8046, 'Morelos', 8),
(8047, 'Moris', 8),
(8048, 'Namiquipa', 8),
(8049, 'Nonoava', 8),
(8050, 'Nuevo Casas Grandes', 8),
(8051, 'Ocampo', 8),
(8052, 'Ojinaga', 8),
(8053, 'Praxedis G. Guerrero', 8),
(8054, 'Riva Palacio', 8),
(8055, 'Rosales', 8),
(8056, 'Rosario', 8),
(8057, 'San Francisco de Borja', 8),
(8058, 'San Francisco de Conchos', 8),
(8059, 'San Francisco del Oro', 8),
(8060, 'Santa Bárbara', 8),
(8061, 'Satevó', 8),
(8062, 'Saucillo', 8),
(8063, 'Temósachic', 8),
(8064, 'El Tule', 8),
(8065, 'Urique', 8),
(8066, 'Uruachi', 8),
(8067, 'Valle de Zaragoza', 8),
(9002, 'Azcapotzalco', 9),
(9003, 'Coyoacán', 9),
(9004, 'Cuajimalpa de Morelos', 9),
(9005, 'Gustavo A. Madero', 9),
(9006, 'Iztacalco', 9),
(9007, 'Iztapalapa', 9),
(9008, 'La Magdalena Contreras', 9),
(9009, 'Milpa Alta', 9),
(9010, 'Álvaro Obregón', 9),
(9011, 'Tláhuac', 9),
(9012, 'Tlalpan', 9),
(9013, 'Xochimilco', 9),
(9014, 'Benito Juárez', 9),
(9015, 'Cuauhtémoc', 9),
(9016, 'Miguel Hidalgo', 9),
(9017, 'Venustiano Carranza', 9),
(10001, 'Canatlán', 10),
(10002, 'Canelas', 10),
(10003, 'Coneto de Comonfort', 10),
(10004, 'Cuencamé', 10),
(10005, 'Durango', 10),
(10006, 'General Simón Bolívar', 10),
(10007, 'Gómez Palacio', 10),
(10008, 'Guadalupe Victoria', 10),
(10009, 'Guanaceví', 10),
(10010, 'Hidalgo', 10),
(10011, 'Indé', 10),
(10012, 'Lerdo', 10),
(10013, 'Mapimí', 10),
(10014, 'Mezquital', 10),
(10015, 'Nazas', 10),
(10016, 'Nombre de Dios', 10),
(10017, 'Ocampo', 10),
(10018, 'El Oro', 10),
(10019, 'Otáez', 10),
(10020, 'Pánuco de Coronado', 10),
(10021, 'Peñón Blanco', 10),
(10022, 'Poanas', 10),
(10023, 'Pueblo Nuevo', 10),
(10024, 'Rodeo', 10),
(10025, 'San Bernardo', 10),
(10026, 'San Dimas', 10),
(10027, 'San Juan de Guadalupe', 10),
(10028, 'San Juan del Río', 10),
(10029, 'San Luis del Cordero', 10),
(10030, 'San Pedro del Gallo', 10),
(10031, 'Santa Clara', 10),
(10032, 'Santiago Papasquiaro', 10),
(10033, 'Súchil', 10),
(10034, 'Tamazula', 10),
(10035, 'Tepehuanes', 10),
(10036, 'Tlahualilo', 10),
(10037, 'Topia', 10),
(10038, 'Vicente Guerrero', 10),
(10039, 'Nuevo Ideal', 10),
(11001, 'Abasolo', 11),
(11002, 'Acámbaro', 11),
(11003, 'San Miguel de Allende', 11),
(11004, 'Apaseo el Alto', 11),
(11005, 'Apaseo el Grande', 11),
(11006, 'Atarjea', 11),
(11007, 'Celaya', 11),
(11008, 'Manuel Doblado', 11),
(11009, 'Comonfort', 11),
(11010, 'Coroneo', 11),
(11011, 'Cortazar', 11),
(11012, 'Cuerámaro', 11),
(11013, 'Doctor Mora', 11),
(11014, 'Dolores Hidalgo Cuna de la Independencia Nacional', 11),
(11015, 'Guanajuato', 11),
(11016, 'Huanímaro', 11),
(11017, 'Irapuato', 11),
(11018, 'Jaral del Progreso', 11),
(11019, 'Jerécuaro', 11),
(11020, 'León', 11),
(11021, 'Moroleón', 11),
(11022, 'Ocampo', 11),
(11023, 'Pénjamo', 11),
(11024, 'Pueblo Nuevo', 11),
(11025, 'Purísima del Rincón', 11),
(11026, 'Romita', 11),
(11027, 'Salamanca', 11),
(11028, 'Salvatierra', 11),
(11029, 'San Diego de la Unión', 11),
(11030, 'San Felipe', 11),
(11031, 'San Francisco del Rincón', 11),
(11032, 'San José Iturbide', 11),
(11033, 'San Luis de la Paz', 11),
(11034, 'Santa Catarina', 11),
(11035, 'Santa Cruz de Juventino Rosas', 11),
(11036, 'Santiago Maravatío', 11),
(11037, 'Silao de la Victoria', 11),
(11038, 'Tarandacuao', 11),
(11039, 'Tarimoro', 11),
(11040, 'Tierra Blanca', 11),
(11041, 'Uriangato', 11),
(11042, 'Valle de Santiago', 11),
(11043, 'Victoria', 11),
(11044, 'Villagrán', 11),
(11045, 'Xichú', 11),
(11046, 'Yuriria', 11),
(12001, 'Acapulco de Juárez', 12),
(12002, 'Ahuacuotzingo', 12),
(12003, 'Ajuchitlán del Progreso', 12),
(12004, 'Alcozauca de Guerrero', 12),
(12005, 'Alpoyeca', 12),
(12006, 'Apaxtla', 12),
(12007, 'Arcelia', 12),
(12008, 'Atenango del Río', 12),
(12009, 'Atlamajalcingo del Monte', 12),
(12010, 'Atlixtac', 12),
(12011, 'Atoyac de Álvarez', 12),
(12012, 'Ayutla de los Libres', 12),
(12013, 'Azoyú', 12),
(12014, 'Benito Juárez', 12),
(12015, 'Buenavista de Cuéllar', 12),
(12016, 'Coahuayutla de José María Izazaga', 12),
(12017, 'Cocula', 12),
(12018, 'Copala', 12),
(12019, 'Copalillo', 12),
(12020, 'Copanatoyac', 12),
(12021, 'Coyuca de Benítez', 12),
(12022, 'Coyuca de Catalán', 12),
(12023, 'Cuajinicuilapa', 12),
(12024, 'Cualác', 12),
(12025, 'Cuautepec', 12),
(12026, 'Cuetzala del Progreso', 12),
(12027, 'Cutzamala de Pinzón', 12),
(12028, 'Chilapa de Álvarez', 12),
(12029, 'Chilpancingo de los Bravo', 12),
(12030, 'Florencio Villarreal', 12),
(12031, 'General Canuto A. Neri', 12),
(12032, 'General Heliodoro Castillo', 12),
(12033, 'Huamuxtitlán', 12),
(12034, 'Huitzuco de los Figueroa', 12),
(12035, 'Iguala de la Independencia', 12),
(12036, 'Igualapa', 12),
(12037, 'Ixcateopan de Cuauhtémoc', 12),
(12038, 'Zihuatanejo de Azueta', 12),
(12039, 'Juan R. Escudero', 12),
(12040, 'Leonardo Bravo', 12),
(12041, 'Malinaltepec', 12),
(12042, 'Mártir de Cuilapan', 12),
(12043, 'Metlatónoc', 12),
(12044, 'Mochitlán', 12),
(12045, 'Olinalá', 12),
(12046, 'Ometepec', 12),
(12047, 'Pedro Ascencio Alquisiras', 12),
(12048, 'Petatlán', 12),
(12049, 'Pilcaya', 12),
(12050, 'Pungarabato', 12),
(12051, 'Quechultenango', 12),
(12052, 'San Luis Acatlán', 12),
(12053, 'San Marcos', 12),
(12054, 'San Miguel Totolapan', 12),
(12055, 'Taxco de Alarcón', 12),
(12056, 'Tecoanapa', 12),
(12057, 'Técpan de Galeana', 12),
(12058, 'Teloloapan', 12),
(12059, 'Tepecoacuilco de Trujano', 12),
(12060, 'Tetipac', 12),
(12061, 'Tixtla de Guerrero', 12),
(12062, 'Tlacoachistlahuaca', 12),
(12063, 'Tlacoapa', 12),
(12064, 'Tlalchapa', 12),
(12065, 'Tlalixtaquilla de Maldonado', 12),
(12066, 'Tlapa de Comonfort', 12),
(12067, 'Tlapehuala', 12),
(12068, 'La Unión de Isidoro Montes de Oca', 12),
(12069, 'Xalpatláhuac', 12),
(12070, 'Xochihuehuetlán', 12),
(12071, 'Xochistlahuaca', 12),
(12072, 'Zapotitlán Tablas', 12),
(12073, 'Zirándaro', 12),
(12074, 'Zitlala', 12),
(12075, 'Eduardo Neri', 12),
(12076, 'Acatepec', 12),
(12077, 'Marquelia', 12),
(12078, 'Cochoapa el Grande', 12),
(12079, 'José Joaquín de Herrera', 12),
(12080, 'Juchitán', 12),
(12081, 'Iliatenco', 12),
(13001, 'Acatlán', 13),
(13002, 'Acaxochitlán', 13),
(13003, 'Actopan', 13),
(13004, 'Agua Blanca de Iturbide', 13),
(13005, 'Ajacuba', 13),
(13006, 'Alfajayucan', 13),
(13007, 'Almoloya', 13),
(13008, 'Apan', 13),
(13009, 'El Arenal', 13),
(13010, 'Atitalaquia', 13),
(13011, 'Atlapexco', 13),
(13012, 'Atotonilco el Grande', 13),
(13013, 'Atotonilco de Tula', 13),
(13014, 'Calnali', 13),
(13015, 'Cardonal', 13),
(13016, 'Cuautepec de Hinojosa', 13),
(13017, 'Chapantongo', 13),
(13018, 'Chapulhuacán', 13),
(13019, 'Chilcuautla', 13),
(13020, 'Eloxochitlán', 13),
(13021, 'Emiliano Zapata', 13),
(13022, 'Epazoyucan', 13),
(13023, 'Francisco I. Madero', 13),
(13024, 'Huasca de Ocampo', 13),
(13025, 'Huautla', 13),
(13026, 'Huazalingo', 13),
(13027, 'Huehuetla', 13),
(13028, 'Huejutla de Reyes', 13),
(13029, 'Huichapan', 13),
(13030, 'Ixmiquilpan', 13),
(13031, 'Jacala de Ledezma', 13),
(13032, 'Jaltocán', 13),
(13033, 'Juárez Hidalgo', 13),
(13034, 'Lolotla', 13),
(13035, 'Metepec', 13),
(13036, 'San Agustín Metzquititlán', 13),
(13037, 'Metztitlán', 13),
(13038, 'Mineral del Chico', 13),
(13039, 'Mineral del Monte', 13),
(13040, 'La Misión', 13),
(13041, 'Mixquiahuala de Juárez', 13),
(13042, 'Molango de Escamilla', 13),
(13043, 'Nicolás Flores', 13),
(13044, 'Nopala de Villagrán', 13),
(13045, 'Omitlán de Juárez', 13),
(13046, 'San Felipe Orizatlán', 13),
(13047, 'Pacula', 13),
(13048, 'Pachuca de Soto', 13),
(13049, 'Pisaflores', 13),
(13050, 'Progreso de Obregón', 13),
(13051, 'Mineral de la Reforma', 13),
(13052, 'San Agustín Tlaxiaca', 13),
(13053, 'San Bartolo Tutotepec', 13),
(13054, 'San Salvador', 13),
(13055, 'Santiago de Anaya', 13),
(13056, 'Santiago Tulantepec de Lugo Guerrero', 13),
(13057, 'Singuilucan', 13),
(13058, 'Tasquillo', 13),
(13059, 'Tecozautla', 13),
(13060, 'Tenango de Doria', 13),
(13061, 'Tepeapulco', 13),
(13062, 'Tepehuacán de Guerrero', 13),
(13063, 'Tepeji del Río de Ocampo', 13),
(13064, 'Tepetitlán', 13),
(13065, 'Tetepango', 13),
(13066, 'Villa de Tezontepec', 13),
(13067, 'Tezontepec de Aldama', 13),
(13068, 'Tianguistengo', 13),
(13069, 'Tizayuca', 13),
(13070, 'Tlahuelilpan', 13),
(13071, 'Tlahuiltepa', 13),
(13072, 'Tlanalapa', 13),
(13073, 'Tlanchinol', 13),
(13074, 'Tlaxcoapan', 13),
(13075, 'Tolcayuca', 13),
(13076, 'Tula de Allende', 13),
(13077, 'Tulancingo de Bravo', 13),
(13078, 'Xochiatipan', 13),
(13079, 'Xochicoatlán', 13),
(13080, 'Yahualica', 13),
(13081, 'Zacualtipán de Ángeles', 13),
(13082, 'Zapotlán de Juárez', 13),
(13083, 'Zempoala', 13),
(13084, 'Zimapán', 13),
(14001, 'Acatic', 14),
(14002, 'Acatlán de Juárez', 14),
(14003, 'Ahualulco de Mercado', 14),
(14004, 'Amacueca', 14),
(14005, 'Amatitán', 14),
(14006, 'Ameca', 14),
(14007, 'San Juanito de Escobedo', 14),
(14008, 'Arandas', 14),
(14009, 'El Arenal', 14),
(14010, 'Atemajac de Brizuela', 14),
(14011, 'Atengo', 14),
(14012, 'Atenguillo', 14),
(14013, 'Atotonilco el Alto', 14),
(14014, 'Atoyac', 14),
(14015, 'Autlán de Navarro', 14),
(14016, 'Ayotlán', 14),
(14017, 'Ayutla', 14),
(14018, 'La Barca', 14),
(14019, 'Bolaños', 14),
(14020, 'Cabo Corrientes', 14),
(14021, 'Casimiro Castillo', 14),
(14022, 'Cihuatlán', 14),
(14023, 'Zapotlán el Grande', 14),
(14024, 'Cocula', 14),
(14025, 'Colotlán', 14),
(14026, 'Concepción de Buenos Aires', 14),
(14027, 'Cuautitlán de García Barragán', 14),
(14028, 'Cuautla', 14),
(14029, 'Cuquío', 14),
(14030, 'Chapala', 14),
(14031, 'Chimaltitán', 14),
(14032, 'Chiquilistlán', 14),
(14033, 'Degollado', 14),
(14034, 'Ejutla', 14),
(14035, 'Encarnación de Díaz', 14),
(14036, 'Etzatlán', 14),
(14037, 'El Grullo', 14),
(14038, 'Guachinango', 14),
(14039, 'Guadalajara', 14),
(14040, 'Hostotipaquillo', 14),
(14041, 'Huejúcar', 14),
(14042, 'Huejuquilla el Alto', 14),
(14043, 'La Huerta', 14),
(14044, 'Ixtlahuacán de los Membrillos', 14),
(14045, 'Ixtlahuacán del Río', 14),
(14046, 'Jalostotitlán', 14),
(14047, 'Jamay', 14),
(14048, 'Jesús María', 14),
(14049, 'Jilotlán de los Dolores', 14),
(14050, 'Jocotepec', 14),
(14051, 'Juanacatlán', 14),
(14052, 'Juchitlán', 14),
(14053, 'Lagos de Moreno', 14),
(14054, 'El Limón', 14),
(14055, 'Magdalena', 14),
(14056, 'Santa María del Oro', 14),
(14057, 'La Manzanilla de la Paz', 14),
(14058, 'Mascota', 14),
(14059, 'Mazamitla', 14),
(14060, 'Mexticacán', 14),
(14061, 'Mezquitic', 14),
(14062, 'Mixtlán', 14),
(14063, 'Ocotlán', 14),
(14064, 'Ojuelos de Jalisco', 14),
(14065, 'Pihuamo', 14),
(14066, 'Poncitlán', 14),
(14067, 'Puerto Vallarta', 14),
(14068, 'Villa Purificación', 14),
(14069, 'Quitupan', 14),
(14070, 'El Salto', 14),
(14071, 'San Cristóbal de la Barranca', 14),
(14072, 'San Diego de Alejandría', 14),
(14073, 'San Juan de los Lagos', 14),
(14074, 'San Julián', 14),
(14075, 'San Marcos', 14),
(14076, 'San Martín de Bolaños', 14),
(14077, 'San Martín Hidalgo', 14),
(14078, 'San Miguel el Alto', 14),
(14079, 'Gómez Farías', 14),
(14080, 'San Sebastián del Oeste', 14),
(14081, 'Santa María de los Ángeles', 14),
(14082, 'Sayula', 14),
(14083, 'Tala', 14),
(14084, 'Talpa de Allende', 14),
(14085, 'Tamazula de Gordiano', 14),
(14086, 'Tapalpa', 14),
(14087, 'Tecalitlán', 14),
(14088, 'Tecolotlán', 14),
(14089, 'Techaluta de Montenegro', 14),
(14090, 'Tenamaxtlán', 14),
(14091, 'Teocaltiche', 14),
(14092, 'Teocuitatlán de Corona', 14),
(14093, 'Tepatitlán de Morelos', 14),
(14094, 'Tequila', 14),
(14095, 'Teuchitlán', 14),
(14096, 'Tizapán el Alto', 14),
(14097, 'Tlajomulco de Zúñiga', 14),
(14098, 'San Pedro Tlaquepaque', 14),
(14099, 'Tolimán', 14),
(14100, 'Tomatlán', 14),
(14101, 'Tonalá', 14),
(14102, 'Tonaya', 14),
(14103, 'Tonila', 14),
(14104, 'Totatiche', 14),
(14105, 'Tototlán', 14),
(14106, 'Tuxcacuesco', 14),
(14107, 'Tuxcueca', 14),
(14108, 'Tuxpan', 14),
(14109, 'Unión de San Antonio', 14),
(14110, 'Unión de Tula', 14),
(14111, 'Valle de Guadalupe', 14),
(14112, 'Valle de Juárez', 14),
(14113, 'San Gabriel', 14),
(14114, 'Villa Corona', 14),
(14115, 'Villa Guerrero', 14),
(14116, 'Villa Hidalgo', 14),
(14117, 'Cañadas de Obregón', 14),
(14118, 'Yahualica de González Gallo', 14),
(14119, 'Zacoalco de Torres', 14),
(14120, 'Zapopan', 14),
(14121, 'Zapotiltic', 14),
(14122, 'Zapotitlán de Vadillo', 14),
(14123, 'Zapotlán del Rey', 14),
(14124, 'Zapotlanejo', 14),
(14125, 'San Ignacio Cerro Gordo', 14),
(15001, 'Acambay de Ruíz Castañeda', 15),
(15002, 'Acolman', 15),
(15003, 'Aculco', 15),
(15004, 'Almoloya de Alquisiras', 15),
(15005, 'Almoloya de Juárez', 15),
(15006, 'Almoloya del Río', 15),
(15007, 'Amanalco', 15),
(15008, 'Amatepec', 15),
(15009, 'Amecameca', 15),
(15010, 'Apaxco', 15),
(15011, 'Atenco', 15),
(15012, 'Atizapán', 15),
(15013, 'Atizapán de Zaragoza', 15),
(15014, 'Atlacomulco', 15),
(15015, 'Atlautla', 15),
(15016, 'Axapusco', 15),
(15017, 'Ayapango', 15),
(15018, 'Calimaya', 15),
(15019, 'Capulhuac', 15),
(15020, 'Coacalco de Berriozábal', 15),
(15021, 'Coatepec Harinas', 15),
(15022, 'Cocotitlán', 15),
(15023, 'Coyotepec', 15),
(15024, 'Cuautitlán', 15),
(15025, 'Chalco', 15),
(15026, 'Chapa de Mota', 15),
(15027, 'Chapultepec', 15),
(15028, 'Chiautla', 15),
(15029, 'Chicoloapan', 15),
(15030, 'Chiconcuac', 15),
(15031, 'Chimalhuacán', 15),
(15032, 'Donato Guerra', 15),
(15033, 'Ecatepec de Morelos', 15),
(15034, 'Ecatzingo', 15),
(15035, 'Huehuetoca', 15),
(15036, 'Hueypoxtla', 15),
(15037, 'Huixquilucan', 15),
(15038, 'Isidro Fabela', 15),
(15039, 'Ixtapaluca', 15),
(15040, 'Ixtapan de la Sal', 15),
(15041, 'Ixtapan del Oro', 15),
(15042, 'Ixtlahuaca', 15),
(15043, 'Xalatlaco', 15),
(15044, 'Jaltenco', 15),
(15045, 'Jilotepec', 15),
(15046, 'Jilotzingo', 15),
(15047, 'Jiquipilco', 15),
(15048, 'Jocotitlán', 15),
(15049, 'Joquicingo', 15),
(15050, 'Juchitepec', 15),
(15051, 'Lerma', 15),
(15052, 'Malinalco', 15),
(15053, 'Melchor Ocampo', 15),
(15054, 'Metepec', 15),
(15055, 'Mexicaltzingo', 15),
(15056, 'Morelos', 15),
(15057, 'Naucalpan de Juárez', 15),
(15058, 'Nezahualcóyotl', 15),
(15059, 'Nextlalpan', 15),
(15060, 'Nicolás Romero', 15),
(15061, 'Nopaltepec', 15),
(15062, 'Ocoyoacac', 15),
(15063, 'Ocuilan', 15),
(15064, 'El Oro', 15),
(15065, 'Otumba', 15),
(15066, 'Otzoloapan', 15),
(15067, 'Otzolotepec', 15),
(15068, 'Ozumba', 15),
(15069, 'Papalotla', 15),
(15070, 'La Paz', 15),
(15071, 'Polotitlán', 15),
(15072, 'Rayón', 15),
(15073, 'San Antonio la Isla', 15),
(15074, 'San Felipe del Progreso', 15),
(15075, 'San Martín de las Pirámides', 15),
(15076, 'San Mateo Atenco', 15),
(15077, 'San Simón de Guerrero', 15),
(15078, 'Santo Tomás', 15),
(15079, 'Soyaniquilpan de Juárez', 15),
(15080, 'Sultepec', 15),
(15081, 'Tecámac', 15),
(15082, 'Tejupilco', 15),
(15083, 'Temamatla', 15),
(15084, 'Temascalapa', 15),
(15085, 'Temascalcingo', 15),
(15086, 'Temascaltepec', 15),
(15087, 'Temoaya', 15),
(15088, 'Tenancingo', 15),
(15089, 'Tenango del Aire', 15),
(15090, 'Tenango del Valle', 15),
(15091, 'Teoloyucan', 15),
(15092, 'Teotihuacán', 15),
(15093, 'Tepetlaoxtoc', 15),
(15094, 'Tepetlixpa', 15),
(15095, 'Tepotzotlán', 15),
(15096, 'Tequixquiac', 15),
(15097, 'Texcaltitlán', 15),
(15098, 'Texcalyacac', 15),
(15099, 'Texcoco', 15),
(15100, 'Tezoyuca', 15),
(15101, 'Tianguistenco', 15),
(15102, 'Timilpan', 15),
(15103, 'Tlalmanalco', 15),
(15104, 'Tlalnepantla de Baz', 15),
(15105, 'Tlatlaya', 15),
(15106, 'Toluca', 15),
(15107, 'Tonatico', 15),
(15108, 'Tultepec', 15),
(15109, 'Tultitlán', 15),
(15110, 'Valle de Bravo', 15),
(15111, 'Villa de Allende', 15),
(15112, 'Villa del Carbón', 15),
(15113, 'Villa Guerrero', 15),
(15114, 'Villa Victoria', 15),
(15115, 'Xonacatlán', 15),
(15116, 'Zacazonapan', 15),
(15117, 'Zacualpan', 15),
(15118, 'Zinacantepec', 15),
(15119, 'Zumpahuacán', 15),
(15120, 'Zumpango', 15),
(15121, 'Cuautitlán Izcalli', 15),
(15122, 'Valle de Chalco Solidaridad', 15),
(15123, 'Luvianos', 15),
(15124, 'San José del Rincón', 15),
(15125, 'Tonanitla', 15),
(16001, 'Acuitzio', 16),
(16002, 'Aguililla', 16),
(16003, 'Álvaro Obregón', 16),
(16004, 'Angamacutiro', 16),
(16005, 'Angangueo', 16),
(16006, 'Apatzingán', 16),
(16007, 'Aporo', 16),
(16008, 'Aquila', 16),
(16009, 'Ario', 16),
(16010, 'Arteaga', 16),
(16011, 'Briseñas', 16),
(16012, 'Buenavista', 16),
(16013, 'Carácuaro', 16),
(16014, 'Coahuayana', 16),
(16015, 'Coalcomán de Vázquez Pallares', 16),
(16016, 'Coeneo', 16),
(16017, 'Contepec', 16),
(16018, 'Copándaro', 16),
(16019, 'Cotija', 16),
(16020, 'Cuitzeo', 16),
(16021, 'Charapan', 16),
(16022, 'Charo', 16),
(16023, 'Chavinda', 16),
(16024, 'Cherán', 16),
(16025, 'Chilchota', 16),
(16026, 'Chinicuila', 16),
(16027, 'Chucándiro', 16),
(16028, 'Churintzio', 16),
(16029, 'Churumuco', 16),
(16030, 'Ecuandureo', 16),
(16031, 'Epitacio Huerta', 16),
(16032, 'Erongarícuaro', 16),
(16033, 'Gabriel Zamora', 16),
(16034, 'Hidalgo', 16),
(16035, 'La Huacana', 16),
(16036, 'Huandacareo', 16),
(16037, 'Huaniqueo', 16),
(16038, 'Huetamo', 16),
(16039, 'Huiramba', 16),
(16040, 'Indaparapeo', 16),
(16041, 'Irimbo', 16),
(16042, 'Ixtlán', 16),
(16043, 'Jacona', 16),
(16044, 'Jiménez', 16),
(16045, 'Jiquilpan', 16),
(16046, 'Juárez', 16),
(16047, 'Jungapeo', 16),
(16048, 'Lagunillas', 16),
(16049, 'Madero', 16),
(16050, 'Maravatío', 16),
(16051, 'Marcos Castellanos', 16),
(16052, 'Lázaro Cárdenas', 16),
(16053, 'Morelia', 16),
(16054, 'Morelos', 16),
(16055, 'Múgica', 16),
(16056, 'Nahuatzen', 16),
(16057, 'Nocupétaro', 16),
(16058, 'Nuevo Parangaricutiro', 16),
(16059, 'Nuevo Urecho', 16),
(16060, 'Numarán', 16),
(16061, 'Ocampo', 16),
(16062, 'Pajacuarán', 16),
(16063, 'Panindícuaro', 16),
(16064, 'Parácuaro', 16),
(16065, 'Paracho', 16),
(16066, 'Pátzcuaro', 16),
(16067, 'Penjamillo', 16),
(16068, 'Peribán', 16),
(16069, 'La Piedad', 16),
(16070, 'Purépero', 16),
(16071, 'Puruándiro', 16),
(16072, 'Queréndaro', 16),
(16073, 'Quiroga', 16),
(16074, 'Cojumatlán de Régules', 16),
(16075, 'Los Reyes', 16),
(16076, 'Sahuayo', 16),
(16077, 'San Lucas', 16),
(16078, 'Santa Ana Maya', 16),
(16079, 'Salvador Escalante', 16),
(16080, 'Senguio', 16),
(16081, 'Susupuato', 16),
(16082, 'Tacámbaro', 16),
(16083, 'Tancítaro', 16),
(16084, 'Tangamandapio', 16),
(16085, 'Tangancícuaro', 16),
(16086, 'Tanhuato', 16),
(16087, 'Taretan', 16),
(16088, 'Tarímbaro', 16),
(16089, 'Tepalcatepec', 16),
(16090, 'Tingambato', 16),
(16091, 'Tingüindín', 16),
(16092, 'Tiquicheo de Nicolás Romero', 16),
(16093, 'Tlalpujahua', 16),
(16094, 'Tlazazalca', 16),
(16095, 'Tocumbo', 16),
(16096, 'Tumbiscatío', 16),
(16097, 'Turicato', 16),
(16098, 'Tuxpan', 16),
(16099, 'Tuzantla', 16),
(16100, 'Tzintzuntzan', 16),
(16101, 'Tzitzio', 16),
(16102, 'Uruapan', 16),
(16103, 'Venustiano Carranza', 16),
(16104, 'Villamar', 16),
(16105, 'Vista Hermosa', 16),
(16106, 'Yurécuaro', 16),
(16107, 'Zacapu', 16),
(16108, 'Zamora', 16),
(16109, 'Zináparo', 16),
(16110, 'Zinapécuaro', 16),
(16111, 'Ziracuaretiro', 16),
(16112, 'Zitácuaro', 16),
(16113, 'José Sixto Verduzco', 16),
(17001, 'Amacuzac', 17),
(17002, 'Atlatlahucan', 17),
(17003, 'Axochiapan', 17),
(17004, 'Ayala', 17),
(17005, 'Coatlán del Río', 17),
(17006, 'Cuautla', 17),
(17007, 'Cuernavaca', 17),
(17008, 'Emiliano Zapata', 17),
(17009, 'Huitzilac', 17),
(17010, 'Jantetelco', 17),
(17011, 'Jiutepec', 17),
(17012, 'Jojutla', 17),
(17013, 'Jonacatepec de Leandro Valle', 17),
(17014, 'Mazatepec', 17),
(17015, 'Miacatlán', 17),
(17016, 'Ocuituco', 17),
(17017, 'Puente de Ixtla', 17),
(17018, 'Temixco', 17),
(17019, 'Tepalcingo', 17),
(17020, 'Tepoztlán', 17),
(17021, 'Tetecala', 17),
(17022, 'Tetela del Volcán', 17),
(17023, 'Tlalnepantla', 17),
(17024, 'Tlaltizapán de Zapata', 17),
(17025, 'Tlaquiltenango', 17),
(17026, 'Tlayacapan', 17),
(17027, 'Totolapan', 17),
(17028, 'Xochitepec', 17),
(17029, 'Yautepec', 17),
(17030, 'Yecapixtla', 17),
(17031, 'Zacatepec', 17),
(17032, 'Zacualpan de Amilpas', 17),
(17033, 'Temoac', 17),
(17034, 'Coatetelco', 17),
(17035, 'Xoxocotla', 17),
(18001, 'Acaponeta', 18),
(18002, 'Ahuacatlán', 18),
(18003, 'Amatlán de Cañas', 18),
(18004, 'Compostela', 18),
(18005, 'Huajicori', 18),
(18006, 'Ixtlán del Río', 18),
(18007, 'Jala', 18),
(18008, 'Xalisco', 18),
(18009, 'Del Nayar', 18),
(18010, 'Rosamorada', 18),
(18011, 'Ruíz', 18),
(18012, 'San Blas', 18),
(18013, 'San Pedro Lagunillas', 18),
(18014, 'Santa María del Oro', 18),
(18015, 'Santiago Ixcuintla', 18),
(18016, 'Tecuala', 18),
(18017, 'Tepic', 18),
(18018, 'Tuxpan', 18),
(18019, 'La Yesca', 18),
(18020, 'Bahía de Banderas', 18),
(19001, 'Abasolo', 19),
(19002, 'Agualeguas', 19),
(19003, 'Los Aldamas', 19),
(19004, 'Allende', 19),
(19005, 'Anáhuac', 19),
(19006, 'Apodaca', 19),
(19007, 'Aramberri', 19),
(19008, 'Bustamante', 19),
(19009, 'Cadereyta Jiménez', 19),
(19010, 'El Carmen', 19),
(19011, 'Cerralvo', 19),
(19012, 'Ciénega de Flores', 19),
(19013, 'China', 19),
(19014, 'Doctor Arroyo', 19),
(19015, 'Doctor Coss', 19),
(19016, 'Doctor González', 19),
(19017, 'Galeana', 19),
(19018, 'García', 19),
(19019, 'San Pedro Garza García', 19),
(19020, 'General Bravo', 19),
(19021, 'General Escobedo', 19),
(19022, 'General Terán', 19),
(19023, 'General Treviño', 19),
(19024, 'General Zaragoza', 19),
(19025, 'General Zuazua', 19),
(19026, 'Guadalupe', 19),
(19027, 'Los Herreras', 19),
(19028, 'Higueras', 19),
(19029, 'Hualahuises', 19),
(19030, 'Iturbide', 19),
(19031, 'Juárez', 19),
(19032, 'Lampazos de Naranjo', 19),
(19033, 'Linares', 19),
(19034, 'Marín', 19),
(19035, 'Melchor Ocampo', 19),
(19036, 'Mier y Noriega', 19),
(19037, 'Mina', 19),
(19038, 'Montemorelos', 19),
(19039, 'Monterrey', 19),
(19040, 'Parás', 19),
(19041, 'Pesquería', 19),
(19042, 'Los Ramones', 19),
(19043, 'Rayones', 19),
(19044, 'Sabinas Hidalgo', 19),
(19045, 'Salinas Victoria', 19),
(19046, 'San Nicolás de los Garza', 19),
(19047, 'Hidalgo', 19),
(19048, 'Santa Catarina', 19),
(19049, 'Santiago', 19),
(19050, 'Vallecillo', 19),
(19051, 'Villaldama', 19),
(20001, 'Abejones', 20),
(20002, 'Acatlán de Pérez Figueroa', 20),
(20003, 'Asunción Cacalotepec', 20),
(20004, 'Asunción Cuyotepeji', 20),
(20005, 'Asunción Ixtaltepec', 20),
(20006, 'Asunción Nochixtlán', 20),
(20007, 'Asunción Ocotlán', 20),
(20008, 'Asunción Tlacolulita', 20),
(20009, 'Ayotzintepec', 20),
(20010, 'El Barrio de la Soledad', 20),
(20011, 'Calihualá', 20),
(20012, 'Candelaria Loxicha', 20),
(20013, 'Ciénega de Zimatlán', 20),
(20014, 'Ciudad Ixtepec', 20),
(20015, 'Coatecas Altas', 20),
(20016, 'Coicoyán de las Flores', 20),
(20017, 'La Compañía', 20),
(20018, 'Concepción Buenavista', 20),
(20019, 'Concepción Pápalo', 20),
(20020, 'Constancia del Rosario', 20),
(20021, 'Cosolapa', 20),
(20022, 'Cosoltepec', 20),
(20023, 'Cuilápam de Guerrero', 20),
(20024, 'Cuyamecalco Villa de Zaragoza', 20),
(20025, 'Chahuites', 20),
(20026, 'Chalcatongo de Hidalgo', 20),
(20027, 'Chiquihuitlán de Benito Juárez', 20),
(20028, 'Heroica Ciudad de Ejutla de Crespo', 20),
(20029, 'Eloxochitlán de Flores Magón', 20),
(20030, 'El Espinal', 20),
(20031, 'Tamazulápam del Espíritu Santo', 20),
(20032, 'Fresnillo de Trujano', 20),
(20033, 'Guadalupe Etla', 20),
(20034, 'Guadalupe de Ramírez', 20),
(20035, 'Guelatao de Juárez', 20),
(20036, 'Guevea de Humboldt', 20),
(20037, 'Mesones Hidalgo', 20),
(20038, 'Villa Hidalgo', 20),
(20039, 'Heroica Ciudad de Huajuapan de León', 20),
(20040, 'Huautepec', 20),
(20041, 'Huautla de Jiménez', 20),
(20042, 'Ixtlán de Juárez', 20),
(20043, 'Heroica Ciudad de Juchitán de Zaragoza', 20),
(20044, 'Loma Bonita', 20),
(20045, 'Magdalena Apasco', 20),
(20046, 'Magdalena Jaltepec', 20),
(20047, 'Santa Magdalena Jicotlán', 20),
(20048, 'Magdalena Mixtepec', 20),
(20049, 'Magdalena Ocotlán', 20),
(20050, 'Magdalena Peñasco', 20),
(20051, 'Magdalena Teitipac', 20),
(20052, 'Magdalena Tequisistlán', 20),
(20053, 'Magdalena Tlacotepec', 20),
(20054, 'Magdalena Zahuatlán', 20),
(20055, 'Mariscala de Juárez', 20),
(20056, 'Mártires de Tacubaya', 20),
(20057, 'Matías Romero Avendaño', 20),
(20058, 'Mazatlán Villa de Flores', 20),
(20059, 'Miahuatlán de Porfirio Díaz', 20),
(20060, 'Mixistlán de la Reforma', 20),
(20061, 'Monjas', 20),
(20062, 'Natividad', 20),
(20063, 'Nazareno Etla', 20),
(20064, 'Nejapa de Madero', 20),
(20065, 'Ixpantepec Nieves', 20),
(20066, 'Santiago Niltepec', 20),
(20067, 'Oaxaca de Juárez', 20),
(20068, 'Ocotlán de Morelos', 20),
(20069, 'La Pe', 20),
(20070, 'Pinotepa de Don Luis', 20),
(20071, 'Pluma Hidalgo', 20),
(20072, 'San José del Progreso', 20),
(20073, 'Putla Villa de Guerrero', 20),
(20074, 'Santa Catarina Quioquitani', 20),
(20075, 'Reforma de Pineda', 20),
(20076, 'La Reforma', 20),
(20077, 'Reyes Etla', 20),
(20078, 'Rojas de Cuauhtémoc', 20),
(20079, 'Salina Cruz', 20),
(20080, 'San Agustín Amatengo', 20),
(20081, 'San Agustín Atenango', 20),
(20082, 'San Agustín Chayuco', 20),
(20083, 'San Agustín de las Juntas', 20),
(20084, 'San Agustín Etla', 20),
(20085, 'San Agustín Loxicha', 20),
(20086, 'San Agustín Tlacotepec', 20),
(20087, 'San Agustín Yatareni', 20),
(20088, 'San Andrés Cabecera Nueva', 20),
(20089, 'San Andrés Dinicuiti', 20),
(20090, 'San Andrés Huaxpaltepec', 20),
(20091, 'San Andrés Huayápam', 20),
(20092, 'San Andrés Ixtlahuaca', 20),
(20093, 'San Andrés Lagunas', 20),
(20094, 'San Andrés Nuxiño', 20),
(20095, 'San Andrés Paxtlán', 20),
(20096, 'San Andrés Sinaxtla', 20),
(20097, 'San Andrés Solaga', 20),
(20098, 'San Andrés Teotilálpam', 20),
(20099, 'San Andrés Tepetlapa', 20),
(20100, 'San Andrés Yaá', 20),
(20101, 'San Andrés Zabache', 20),
(20102, 'San Andrés Zautla', 20),
(20103, 'San Antonino Castillo Velasco', 20),
(20104, 'San Antonino el Alto', 20),
(20105, 'San Antonino Monte Verde', 20),
(20106, 'San Antonio Acutla', 20),
(20107, 'San Antonio de la Cal', 20),
(20108, 'San Antonio Huitepec', 20),
(20109, 'San Antonio Nanahuatípam', 20),
(20110, 'San Antonio Sinicahua', 20),
(20111, 'San Antonio Tepetlapa', 20),
(20112, 'San Baltazar Chichicápam', 20),
(20113, 'San Baltazar Loxicha', 20),
(20114, 'San Baltazar Yatzachi el Bajo', 20),
(20115, 'San Bartolo Coyotepec', 20),
(20116, 'San Bartolomé Ayautla', 20),
(20117, 'San Bartolomé Loxicha', 20),
(20118, 'San Bartolomé Quialana', 20),
(20119, 'San Bartolomé Yucuañe', 20),
(20120, 'San Bartolomé Zoogocho', 20),
(20121, 'San Bartolo Soyaltepec', 20),
(20122, 'San Bartolo Yautepec', 20),
(20123, 'San Bernardo Mixtepec', 20),
(20124, 'San Blas Atempa', 20),
(20125, 'San Carlos Yautepec', 20),
(20126, 'San Cristóbal Amatlán', 20),
(20127, 'San Cristóbal Amoltepec', 20),
(20128, 'San Cristóbal Lachirioag', 20),
(20129, 'San Cristóbal Suchixtlahuaca', 20),
(20130, 'San Dionisio del Mar', 20),
(20131, 'San Dionisio Ocotepec', 20),
(20132, 'San Dionisio Ocotlán', 20),
(20133, 'San Esteban Atatlahuca', 20),
(20134, 'San Felipe Jalapa de Díaz', 20),
(20135, 'San Felipe Tejalápam', 20),
(20136, 'San Felipe Usila', 20),
(20137, 'San Francisco Cahuacuá', 20),
(20138, 'San Francisco Cajonos', 20),
(20139, 'San Francisco Chapulapa', 20),
(20140, 'San Francisco Chindúa', 20),
(20141, 'San Francisco del Mar', 20),
(20142, 'San Francisco Huehuetlán', 20),
(20143, 'San Francisco Ixhuatán', 20),
(20144, 'San Francisco Jaltepetongo', 20),
(20145, 'San Francisco Lachigoló', 20),
(20146, 'San Francisco Logueche', 20),
(20147, 'San Francisco Nuxaño', 20),
(20148, 'San Francisco Ozolotepec', 20),
(20149, 'San Francisco Sola', 20),
(20150, 'San Francisco Telixtlahuaca', 20),
(20151, 'San Francisco Teopan', 20),
(20152, 'San Francisco Tlapancingo', 20),
(20153, 'San Gabriel Mixtepec', 20),
(20154, 'San Ildefonso Amatlán', 20),
(20155, 'San Ildefonso Sola', 20),
(20156, 'San Ildefonso Villa Alta', 20),
(20157, 'San Jacinto Amilpas', 20),
(20158, 'San Jacinto Tlacotepec', 20),
(20159, 'San Jerónimo Coatlán', 20),
(20160, 'San Jerónimo Silacayoapilla', 20),
(20161, 'San Jerónimo Sosola', 20),
(20162, 'San Jerónimo Taviche', 20),
(20163, 'San Jerónimo Tecóatl', 20),
(20164, 'San Jorge Nuchita', 20),
(20165, 'San José Ayuquila', 20),
(20166, 'San José Chiltepec', 20),
(20167, 'San José del Peñasco', 20),
(20168, 'San José Estancia Grande', 20),
(20169, 'San José Independencia', 20),
(20170, 'San José Lachiguiri', 20),
(20171, 'San José Tenango', 20),
(20172, 'San Juan Achiutla', 20),
(20173, 'San Juan Atepec', 20),
(20174, 'Ánimas Trujano', 20),
(20175, 'San Juan Bautista Atatlahuca', 20),
(20176, 'San Juan Bautista Coixtlahuaca', 20),
(20177, 'San Juan Bautista Cuicatlán', 20),
(20178, 'San Juan Bautista Guelache', 20),
(20179, 'San Juan Bautista Jayacatlán', 20),
(20180, 'San Juan Bautista Lo de Soto', 20),
(20181, 'San Juan Bautista Suchitepec', 20),
(20182, 'San Juan Bautista Tlacoatzintepec', 20),
(20183, 'San Juan Bautista Tlachichilco', 20),
(20184, 'San Juan Bautista Tuxtepec', 20),
(20185, 'San Juan Cacahuatepec', 20),
(20186, 'San Juan Cieneguilla', 20),
(20187, 'San Juan Coatzóspam', 20),
(20188, 'San Juan Colorado', 20),
(20189, 'San Juan Comaltepec', 20),
(20190, 'San Juan Cotzocón', 20),
(20191, 'San Juan Chicomezúchil', 20),
(20192, 'San Juan Chilateca', 20),
(20193, 'San Juan del Estado', 20),
(20194, 'San Juan del Río', 20),
(20195, 'San Juan Diuxi', 20),
(20196, 'San Juan Evangelista Analco', 20),
(20197, 'San Juan Guelavía', 20),
(20198, 'San Juan Guichicovi', 20),
(20199, 'San Juan Ihualtepec', 20),
(20200, 'San Juan Juquila Mixes', 20),
(20201, 'San Juan Juquila Vijanos', 20),
(20202, 'San Juan Lachao', 20),
(20203, 'San Juan Lachigalla', 20),
(20204, 'San Juan Lajarcia', 20),
(20205, 'San Juan Lalana', 20),
(20206, 'San Juan de los Cués', 20),
(20207, 'San Juan Mazatlán', 20),
(20208, 'San Juan Mixtepec -Dto. 08 -', 20),
(20209, 'San Juan Mixtepec -Dto. 26 -', 20),
(20210, 'San Juan Ñumí', 20),
(20211, 'San Juan Ozolotepec', 20),
(20212, 'San Juan Petlapa', 20),
(20213, 'San Juan Quiahije', 20),
(20214, 'San Juan Quiotepec', 20),
(20215, 'San Juan Sayultepec', 20),
(20216, 'San Juan Tabaá', 20),
(20217, 'San Juan Tamazola', 20),
(20218, 'San Juan Teita', 20),
(20219, 'San Juan Teitipac', 20),
(20220, 'San Juan Tepeuxila', 20),
(20221, 'San Juan Teposcolula', 20),
(20222, 'San Juan Yaeé', 20),
(20223, 'San Juan Yatzona', 20),
(20224, 'San Juan Yucuita', 20),
(20225, 'San Lorenzo', 20),
(20226, 'San Lorenzo Albarradas', 20),
(20227, 'San Lorenzo Cacaotepec', 20),
(20228, 'San Lorenzo Cuaunecuiltitla', 20),
(20229, 'San Lorenzo Texmelúcan', 20),
(20230, 'San Lorenzo Victoria', 20),
(20231, 'San Lucas Camotlán', 20),
(20232, 'San Lucas Ojitlán', 20),
(20233, 'San Lucas Quiaviní', 20),
(20234, 'San Lucas Zoquiápam', 20),
(20235, 'San Luis Amatlán', 20),
(20236, 'San Marcial Ozolotepec', 20),
(20237, 'San Marcos Arteaga', 20),
(20238, 'San Martín de los Cansecos', 20),
(20239, 'San Martín Huamelúlpam', 20),
(20240, 'San Martín Itunyoso', 20),
(20241, 'San Martín Lachilá', 20),
(20242, 'San Martín Peras', 20),
(20243, 'San Martín Tilcajete', 20),
(20244, 'San Martín Toxpalan', 20),
(20245, 'San Martín Zacatepec', 20),
(20246, 'San Mateo Cajonos', 20),
(20247, 'Capulálpam de Méndez', 20),
(20248, 'San Mateo del Mar', 20),
(20249, 'San Mateo Yoloxochitlán', 20),
(20250, 'San Mateo Etlatongo', 20),
(20251, 'San Mateo Nejápam', 20),
(20252, 'San Mateo Peñasco', 20),
(20253, 'San Mateo Piñas', 20),
(20254, 'San Mateo Río Hondo', 20),
(20255, 'San Mateo Sindihui', 20),
(20256, 'San Mateo Tlapiltepec', 20),
(20257, 'San Melchor Betaza', 20),
(20258, 'San Miguel Achiutla', 20),
(20259, 'San Miguel Ahuehuetitlán', 20),
(20260, 'San Miguel Aloápam', 20),
(20261, 'San Miguel Amatitlán', 20),
(20262, 'San Miguel Amatlán', 20),
(20263, 'San Miguel Coatlán', 20),
(20264, 'San Miguel Chicahua', 20),
(20265, 'San Miguel Chimalapa', 20),
(20266, 'San Miguel del Puerto', 20),
(20267, 'San Miguel del Río', 20),
(20268, 'San Miguel Ejutla', 20),
(20269, 'San Miguel el Grande', 20),
(20270, 'San Miguel Huautla', 20),
(20271, 'San Miguel Mixtepec', 20),
(20272, 'San Miguel Panixtlahuaca', 20),
(20273, 'San Miguel Peras', 20),
(20274, 'San Miguel Piedras', 20),
(20275, 'San Miguel Quetzaltepec', 20),
(20276, 'San Miguel Santa Flor', 20),
(20277, 'Villa Sola de Vega', 20),
(20278, 'San Miguel Soyaltepec', 20),
(20279, 'San Miguel Suchixtepec', 20),
(20280, 'Villa Talea de Castro', 20),
(20281, 'San Miguel Tecomatlán', 20),
(20282, 'San Miguel Tenango', 20),
(20283, 'San Miguel Tequixtepec', 20),
(20284, 'San Miguel Tilquiápam', 20),
(20285, 'San Miguel Tlacamama', 20),
(20286, 'San Miguel Tlacotepec', 20),
(20287, 'San Miguel Tulancingo', 20),
(20288, 'San Miguel Yotao', 20),
(20289, 'San Nicolás', 20),
(20290, 'San Nicolás Hidalgo', 20),
(20291, 'San Pablo Coatlán', 20),
(20292, 'San Pablo Cuatro Venados', 20),
(20293, 'San Pablo Etla', 20),
(20294, 'San Pablo Huitzo', 20),
(20295, 'San Pablo Huixtepec', 20),
(20296, 'San Pablo Macuiltianguis', 20),
(20297, 'San Pablo Tijaltepec', 20),
(20298, 'San Pablo Villa de Mitla', 20),
(20299, 'San Pablo Yaganiza', 20),
(20300, 'San Pedro Amuzgos', 20),
(20301, 'San Pedro Apóstol', 20),
(20302, 'San Pedro Atoyac', 20),
(20303, 'San Pedro Cajonos', 20),
(20304, 'San Pedro Coxcaltepec Cántaros', 20),
(20305, 'San Pedro Comitancillo', 20),
(20306, 'San Pedro el Alto', 20),
(20307, 'San Pedro Huamelula', 20),
(20308, 'San Pedro Huilotepec', 20),
(20309, 'San Pedro Ixcatlán', 20),
(20310, 'San Pedro Ixtlahuaca', 20),
(20311, 'San Pedro Jaltepetongo', 20),
(20312, 'San Pedro Jicayán', 20),
(20313, 'San Pedro Jocotipac', 20),
(20314, 'San Pedro Juchatengo', 20),
(20315, 'San Pedro Mártir', 20),
(20316, 'San Pedro Mártir Quiechapa', 20),
(20317, 'San Pedro Mártir Yucuxaco', 20),
(20318, 'San Pedro Mixtepec -Dto. 22 -', 20),
(20319, 'San Pedro Mixtepec -Dto. 26 -', 20),
(20320, 'San Pedro Molinos', 20),
(20321, 'San Pedro Nopala', 20),
(20322, 'San Pedro Ocopetatillo', 20),
(20323, 'San Pedro Ocotepec', 20),
(20324, 'San Pedro Pochutla', 20),
(20325, 'San Pedro Quiatoni', 20),
(20326, 'San Pedro Sochiápam', 20),
(20327, 'San Pedro Tapanatepec', 20),
(20328, 'San Pedro Taviche', 20),
(20329, 'San Pedro Teozacoalco', 20),
(20330, 'San Pedro Teutila', 20),
(20331, 'San Pedro Tidaá', 20),
(20332, 'San Pedro Topiltepec', 20),
(20333, 'San Pedro Totolápam', 20),
(20334, 'Villa de Tututepec', 20),
(20335, 'San Pedro Yaneri', 20),
(20336, 'San Pedro Yólox', 20),
(20337, 'San Pedro y San Pablo Ayutla', 20),
(20338, 'Villa de Etla', 20),
(20339, 'San Pedro y San Pablo Teposcolula', 20),
(20340, 'San Pedro y San Pablo Tequixtepec', 20),
(20341, 'San Pedro Yucunama', 20),
(20342, 'San Raymundo Jalpan', 20),
(20343, 'San Sebastián Abasolo', 20),
(20344, 'San Sebastián Coatlán', 20),
(20345, 'San Sebastián Ixcapa', 20),
(20346, 'San Sebastián Nicananduta', 20),
(20347, 'San Sebastián Río Hondo', 20),
(20348, 'San Sebastián Tecomaxtlahuaca', 20),
(20349, 'San Sebastián Teitipac', 20),
(20350, 'San Sebastián Tutla', 20),
(20351, 'San Simón Almolongas', 20),
(20352, 'San Simón Zahuatlán', 20),
(20353, 'Santa Ana', 20),
(20354, 'Santa Ana Ateixtlahuaca', 20),
(20355, 'Santa Ana Cuauhtémoc', 20),
(20356, 'Santa Ana del Valle', 20),
(20357, 'Santa Ana Tavela', 20),
(20358, 'Santa Ana Tlapacoyan', 20),
(20359, 'Santa Ana Yareni', 20),
(20360, 'Santa Ana Zegache', 20),
(20361, 'Santa Catalina Quierí', 20),
(20362, 'Santa Catarina Cuixtla', 20),
(20363, 'Santa Catarina Ixtepeji', 20),
(20364, 'Santa Catarina Juquila', 20),
(20365, 'Santa Catarina Lachatao', 20),
(20366, 'Santa Catarina Loxicha', 20),
(20367, 'Santa Catarina Mechoacán', 20),
(20368, 'Santa Catarina Minas', 20),
(20369, 'Santa Catarina Quiané', 20),
(20370, 'Santa Catarina Tayata', 20),
(20371, 'Santa Catarina Ticuá', 20),
(20372, 'Santa Catarina Yosonotú', 20),
(20373, 'Santa Catarina Zapoquila', 20),
(20374, 'Santa Cruz Acatepec', 20),
(20375, 'Santa Cruz Amilpas', 20),
(20376, 'Santa Cruz de Bravo', 20),
(20377, 'Santa Cruz Itundujia', 20),
(20378, 'Santa Cruz Mixtepec', 20),
(20379, 'Santa Cruz Nundaco', 20),
(20380, 'Santa Cruz Papalutla', 20),
(20381, 'Santa Cruz Tacache de Mina', 20),
(20382, 'Santa Cruz Tacahua', 20),
(20383, 'Santa Cruz Tayata', 20),
(20384, 'Santa Cruz Xitla', 20),
(20385, 'Santa Cruz Xoxocotlán', 20),
(20386, 'Santa Cruz Zenzontepec', 20),
(20387, 'Santa Gertrudis', 20),
(20388, 'Santa Inés del Monte', 20),
(20389, 'Santa Inés Yatzeche', 20),
(20390, 'Santa Lucía del Camino', 20),
(20391, 'Santa Lucía Miahuatlán', 20),
(20392, 'Santa Lucía Monteverde', 20),
(20393, 'Santa Lucía Ocotlán', 20),
(20394, 'Santa María Alotepec', 20),
(20395, 'Santa María Apazco', 20),
(20396, 'Santa María la Asunción', 20),
(20397, 'Heroica Ciudad de Tlaxiaco', 20),
(20398, 'Ayoquezco de Aldama', 20),
(20399, 'Santa María Atzompa', 20),
(20400, 'Santa María Camotlán', 20),
(20401, 'Santa María Colotepec', 20),
(20402, 'Santa María Cortijo', 20),
(20403, 'Santa María Coyotepec', 20),
(20404, 'Santa María Chachoápam', 20),
(20405, 'Villa de Chilapa de Díaz', 20),
(20406, 'Santa María Chilchotla', 20),
(20407, 'Santa María Chimalapa', 20),
(20408, 'Santa María del Rosario', 20),
(20409, 'Santa María del Tule', 20),
(20410, 'Santa María Ecatepec', 20),
(20411, 'Santa María Guelacé', 20),
(20412, 'Santa María Guienagati', 20),
(20413, 'Santa María Huatulco', 20),
(20414, 'Santa María Huazolotitlán', 20),
(20415, 'Santa María Ipalapa', 20),
(20416, 'Santa María Ixcatlán', 20),
(20417, 'Santa María Jacatepec', 20),
(20418, 'Santa María Jalapa del Marqués', 20),
(20419, 'Santa María Jaltianguis', 20),
(20420, 'Santa María Lachixío', 20),
(20421, 'Santa María Mixtequilla', 20),
(20422, 'Santa María Nativitas', 20),
(20423, 'Santa María Nduayaco', 20),
(20424, 'Santa María Ozolotepec', 20),
(20425, 'Santa María Pápalo', 20),
(20426, 'Santa María Peñoles', 20),
(20427, 'Santa María Petapa', 20),
(20428, 'Santa María Quiegolani', 20),
(20429, 'Santa María Sola', 20),
(20430, 'Santa María Tataltepec', 20),
(20431, 'Santa María Tecomavaca', 20),
(20432, 'Santa María Temaxcalapa', 20),
(20433, 'Santa María Temaxcaltepec', 20),
(20434, 'Santa María Teopoxco', 20),
(20435, 'Santa María Tepantlali', 20),
(20436, 'Santa María Texcatitlán', 20),
(20437, 'Santa María Tlahuitoltepec', 20),
(20438, 'Santa María Tlalixtac', 20),
(20439, 'Santa María Tonameca', 20),
(20440, 'Santa María Totolapilla', 20),
(20441, 'Santa María Xadani', 20),
(20442, 'Santa María Yalina', 20),
(20443, 'Santa María Yavesía', 20),
(20444, 'Santa María Yolotepec', 20),
(20445, 'Santa María Yosoyúa', 20),
(20446, 'Santa María Yucuhiti', 20),
(20447, 'Santa María Zacatepec', 20),
(20448, 'Santa María Zaniza', 20),
(20449, 'Santa María Zoquitlán', 20),
(20450, 'Santiago Amoltepec', 20),
(20451, 'Santiago Apoala', 20),
(20452, 'Santiago Apóstol', 20),
(20453, 'Santiago Astata', 20),
(20454, 'Santiago Atitlán', 20),
(20455, 'Santiago Ayuquililla', 20),
(20456, 'Santiago Cacaloxtepec', 20),
(20457, 'Santiago Camotlán', 20),
(20458, 'Santiago Comaltepec', 20),
(20459, 'Santiago Chazumba', 20),
(20460, 'Santiago Choápam', 20),
(20461, 'Santiago del Río', 20),
(20462, 'Santiago Huajolotitlán', 20),
(20463, 'Santiago Huauclilla', 20),
(20464, 'Santiago Ihuitlán Plumas', 20),
(20465, 'Santiago Ixcuintepec', 20),
(20466, 'Santiago Ixtayutla', 20),
(20467, 'Santiago Jamiltepec', 20),
(20468, 'Santiago Jocotepec', 20),
(20469, 'Santiago Juxtlahuaca', 20),
(20470, 'Santiago Lachiguiri', 20),
(20471, 'Santiago Lalopa', 20),
(20472, 'Santiago Laollaga', 20),
(20473, 'Santiago Laxopa', 20),
(20474, 'Santiago Llano Grande', 20),
(20475, 'Santiago Matatlán', 20),
(20476, 'Santiago Miltepec', 20),
(20477, 'Santiago Minas', 20),
(20478, 'Santiago Nacaltepec', 20),
(20479, 'Santiago Nejapilla', 20),
(20480, 'Santiago Nundiche', 20),
(20481, 'Santiago Nuyoó', 20),
(20482, 'Santiago Pinotepa Nacional', 20),
(20483, 'Santiago Suchilquitongo', 20),
(20484, 'Santiago Tamazola', 20),
(20485, 'Santiago Tapextla', 20),
(20486, 'Villa Tejúpam de la Unión', 20),
(20487, 'Santiago Tenango', 20),
(20488, 'Santiago Tepetlapa', 20),
(20489, 'Santiago Tetepec', 20),
(20490, 'Santiago Texcalcingo', 20),
(20491, 'Santiago Textitlán', 20),
(20492, 'Santiago Tilantongo', 20),
(20493, 'Santiago Tillo', 20),
(20494, 'Santiago Tlazoyaltepec', 20),
(20495, 'Santiago Xanica', 20),
(20496, 'Santiago Xiacuí', 20),
(20497, 'Santiago Yaitepec', 20),
(20498, 'Santiago Yaveo', 20),
(20499, 'Santiago Yolomécatl', 20),
(20500, 'Santiago Yosondúa', 20),
(20501, 'Santiago Yucuyachi', 20),
(20502, 'Santiago Zacatepec', 20),
(20503, 'Santiago Zoochila', 20),
(20504, 'Nuevo Zoquiápam', 20),
(20505, 'Santo Domingo Ingenio', 20),
(20506, 'Santo Domingo Albarradas', 20),
(20507, 'Santo Domingo Armenta', 20),
(20508, 'Santo Domingo Chihuitán', 20),
(20509, 'Santo Domingo de Morelos', 20),
(20510, 'Santo Domingo Ixcatlán', 20),
(20511, 'Santo Domingo Nuxaá', 20),
(20512, 'Santo Domingo Ozolotepec', 20),
(20513, 'Santo Domingo Petapa', 20),
(20514, 'Santo Domingo Roayaga', 20),
(20515, 'Santo Domingo Tehuantepec', 20),
(20516, 'Santo Domingo Teojomulco', 20),
(20517, 'Santo Domingo Tepuxtepec', 20),
(20518, 'Santo Domingo Tlatayápam', 20),
(20519, 'Santo Domingo Tomaltepec', 20),
(20520, 'Santo Domingo Tonalá', 20),
(20521, 'Santo Domingo Tonaltepec', 20),
(20522, 'Santo Domingo Xagacía', 20),
(20523, 'Santo Domingo Yanhuitlán', 20),
(20524, 'Santo Domingo Yodohino', 20),
(20525, 'Santo Domingo Zanatepec', 20),
(20526, 'Santos Reyes Nopala', 20),
(20527, 'Santos Reyes Pápalo', 20),
(20528, 'Santos Reyes Tepejillo', 20),
(20529, 'Santos Reyes Yucuná', 20),
(20530, 'Santo Tomás Jalieza', 20),
(20531, 'Santo Tomás Mazaltepec', 20),
(20532, 'Santo Tomás Ocotepec', 20),
(20533, 'Santo Tomás Tamazulapan', 20),
(20534, 'San Vicente Coatlán', 20),
(20535, 'San Vicente Lachixío', 20),
(20536, 'San Vicente Nuñú', 20),
(20537, 'Silacayoápam', 20),
(20538, 'Sitio de Xitlapehua', 20),
(20539, 'Soledad Etla', 20),
(20540, 'Villa de Tamazulápam del Progreso', 20),
(20541, 'Tanetze de Zaragoza', 20),
(20542, 'Taniche', 20),
(20543, 'Tataltepec de Valdés', 20),
(20544, 'Teococuilco de Marcos Pérez', 20),
(20545, 'Teotitlán de Flores Magón', 20),
(20546, 'Teotitlán del Valle', 20),
(20547, 'Teotongo', 20),
(20548, 'Tepelmeme Villa de Morelos', 20),
(20549, 'Tezoatlán de Segura y Luna', 20),
(20550, 'San Jerónimo Tlacochahuaya', 20),
(20551, 'Tlacolula de Matamoros', 20),
(20552, 'Tlacotepec Plumas', 20),
(20553, 'Tlalixtac de Cabrera', 20),
(20554, 'Totontepec Villa de Morelos', 20),
(20555, 'Trinidad Zaachila', 20),
(20556, 'La Trinidad Vista Hermosa', 20),
(20557, 'Unión Hidalgo', 20),
(20558, 'Valerio Trujano', 20),
(20559, 'San Juan Bautista Valle Nacional', 20),
(20560, 'Villa Díaz Ordaz', 20),
(20561, 'Yaxe', 20),
(20562, 'Magdalena Yodocono de Porfirio Díaz', 20),
(20563, 'Yogana', 20),
(20564, 'Yutanduchi de Guerrero', 20),
(20565, 'Villa de Zaachila', 20),
(20566, 'San Mateo Yucutindoo', 20),
(20567, 'Zapotitlán Lagunas', 20),
(20568, 'Zapotitlán Palmas', 20),
(20569, 'Santa Inés de Zaragoza', 20),
(20570, 'Zimatlán de Álvarez', 20),
(21001, 'Acajete', 21),
(21002, 'Acateno', 21),
(21003, 'Acatlán', 21),
(21004, 'Acatzingo', 21),
(21005, 'Acteopan', 21),
(21006, 'Ahuacatlán', 21),
(21007, 'Ahuatlán', 21),
(21008, 'Ahuazotepec', 21),
(21009, 'Ahuehuetitla', 21),
(21010, 'Ajalpan', 21),
(21011, 'Albino Zertuche', 21),
(21012, 'Aljojuca', 21),
(21013, 'Altepexi', 21),
(21014, 'Amixtlán', 21),
(21015, 'Amozoc', 21),
(21016, 'Aquixtla', 21),
(21017, 'Atempan', 21),
(21018, 'Atexcal', 21),
(21019, 'Atlixco', 21),
(21020, 'Atoyatempan', 21),
(21021, 'Atzala', 21),
(21022, 'Atzitzihuacán', 21),
(21023, 'Atzitzintla', 21),
(21024, 'Axutla', 21),
(21025, 'Ayotoxco de Guerrero', 21),
(21026, 'Calpan', 21),
(21027, 'Caltepec', 21),
(21028, 'Camocuautla', 21),
(21029, 'Caxhuacan', 21),
(21030, 'Coatepec', 21),
(21031, 'Coatzingo', 21),
(21032, 'Cohetzala', 21),
(21033, 'Cohuecan', 21),
(21034, 'Coronango', 21),
(21035, 'Coxcatlán', 21),
(21036, 'Coyomeapan', 21),
(21037, 'Coyotepec', 21),
(21038, 'Cuapiaxtla de Madero', 21),
(21039, 'Cuautempan', 21),
(21040, 'Cuautinchán', 21),
(21041, 'Cuautlancingo', 21),
(21042, 'Cuayuca de Andrade', 21),
(21043, 'Cuetzalan del Progreso', 21),
(21044, 'Cuyoaco', 21),
(21045, 'Chalchicomula de Sesma', 21),
(21046, 'Chapulco', 21),
(21047, 'Chiautla', 21),
(21048, 'Chiautzingo', 21),
(21049, 'Chiconcuautla', 21),
(21050, 'Chichiquila', 21),
(21051, 'Chietla', 21),
(21052, 'Chigmecatitlán', 21),
(21053, 'Chignahuapan', 21),
(21054, 'Chignautla', 21),
(21055, 'Chila', 21),
(21056, 'Chila de la Sal', 21),
(21057, 'Honey', 21),
(21058, 'Chilchotla', 21),
(21059, 'Chinantla', 21),
(21060, 'Domingo Arenas', 21),
(21061, 'Eloxochitlán', 21),
(21062, 'Epatlán', 21),
(21063, 'Esperanza', 21),
(21064, 'Francisco Z. Mena', 21),
(21065, 'General Felipe Ángeles', 21),
(21066, 'Guadalupe', 21),
(21067, 'Guadalupe Victoria', 21),
(21068, 'Hermenegildo Galeana', 21),
(21069, 'Huaquechula', 21),
(21070, 'Huatlatlauca', 21),
(21071, 'Huauchinango', 21),
(21072, 'Huehuetla', 21),
(21073, 'Huehuetlán el Chico', 21),
(21074, 'Huejotzingo', 21),
(21075, 'Hueyapan', 21),
(21076, 'Hueytamalco', 21),
(21077, 'Hueytlalpan', 21),
(21078, 'Huitzilan de Serdán', 21),
(21079, 'Huitziltepec', 21),
(21080, 'Atlequizayan', 21),
(21081, 'Ixcamilpa de Guerrero', 21),
(21082, 'Ixcaquixtla', 21),
(21083, 'Ixtacamaxtitlán', 21),
(21084, 'Ixtepec', 21),
(21085, 'Izúcar de Matamoros', 21),
(21086, 'Jalpan', 21),
(21087, 'Jolalpan', 21),
(21088, 'Jonotla', 21),
(21089, 'Jopala', 21),
(21090, 'Juan C. Bonilla', 21),
(21091, 'Juan Galindo', 21),
(21092, 'Juan N. Méndez', 21),
(21093, 'Lafragua', 21),
(21094, 'Libres', 21),
(21095, 'La Magdalena Tlatlauquitepec', 21),
(21096, 'Mazapiltepec de Juárez', 21),
(21097, 'Mixtla', 21),
(21098, 'Molcaxac', 21),
(21099, 'Cañada Morelos', 21),
(21100, 'Naupan', 21),
(21101, 'Nauzontla', 21),
(21102, 'Nealtican', 21),
(21103, 'Nicolás Bravo', 21),
(21104, 'Nopalucan', 21),
(21105, 'Ocotepec', 21),
(21106, 'Ocoyucan', 21),
(21107, 'Olintla', 21),
(21108, 'Oriental', 21),
(21109, 'Pahuatlán', 21),
(21110, 'Palmar de Bravo', 21),
(21111, 'Pantepec', 21),
(21112, 'Petlalcingo', 21),
(21113, 'Piaxtla', 21),
(21114, 'Puebla', 21),
(21115, 'Quecholac', 21),
(21116, 'Quimixtlán', 21),
(21117, 'Rafael Lara Grajales', 21),
(21118, 'Los Reyes de Juárez', 21),
(21119, 'San Andrés Cholula', 21),
(21120, 'San Antonio Cañada', 21),
(21121, 'San Diego la Mesa Tochimiltzingo', 21),
(21122, 'San Felipe Teotlalcingo', 21),
(21123, 'San Felipe Tepatlán', 21),
(21124, 'San Gabriel Chilac', 21),
(21125, 'San Gregorio Atzompa', 21),
(21126, 'San Jerónimo Tecuanipan', 21),
(21127, 'San Jerónimo Xayacatlán', 21),
(21128, 'San José Chiapa', 21),
(21129, 'San José Miahuatlán', 21),
(21130, 'San Juan Atenco', 21),
(21131, 'San Juan Atzompa', 21),
(21132, 'San Martín Texmelucan', 21),
(21133, 'San Martín Totoltepec', 21),
(21134, 'San Matías Tlalancaleca', 21),
(21135, 'San Miguel Ixitlán', 21),
(21136, 'San Miguel Xoxtla', 21),
(21137, 'San Nicolás Buenos Aires', 21),
(21138, 'San Nicolás de los Ranchos', 21),
(21139, 'San Pablo Anicano', 21),
(21140, 'San Pedro Cholula', 21),
(21141, 'San Pedro Yeloixtlahuaca', 21);
INSERT INTO `ciudad` (`id_ciudad`, `ciudad`, `id_estado`) VALUES
(21142, 'San Salvador el Seco', 21),
(21143, 'San Salvador el Verde', 21),
(21144, 'San Salvador Huixcolotla', 21),
(21145, 'San Sebastián Tlacotepec', 21),
(21146, 'Santa Catarina Tlaltempan', 21),
(21147, 'Santa Inés Ahuatempan', 21),
(21148, 'Santa Isabel Cholula', 21),
(21149, 'Santiago Miahuatlán', 21),
(21150, 'Huehuetlán el Grande', 21),
(21151, 'Santo Tomás Hueyotlipan', 21),
(21152, 'Soltepec', 21),
(21153, 'Tecali de Herrera', 21),
(21154, 'Tecamachalco', 21),
(21155, 'Tecomatlán', 21),
(21156, 'Tehuacán', 21),
(21157, 'Tehuitzingo', 21),
(21158, 'Tenampulco', 21),
(21159, 'Teopantlán', 21),
(21160, 'Teotlalco', 21),
(21161, 'Tepanco de López', 21),
(21162, 'Tepango de Rodríguez', 21),
(21163, 'Tepatlaxco de Hidalgo', 21),
(21164, 'Tepeaca', 21),
(21165, 'Tepemaxalco', 21),
(21166, 'Tepeojuma', 21),
(21167, 'Tepetzintla', 21),
(21168, 'Tepexco', 21),
(21169, 'Tepexi de Rodríguez', 21),
(21170, 'Tepeyahualco', 21),
(21171, 'Tepeyahualco de Cuauhtémoc', 21),
(21172, 'Tetela de Ocampo', 21),
(21173, 'Teteles de Avila Castillo', 21),
(21174, 'Teziutlán', 21),
(21175, 'Tianguismanalco', 21),
(21176, 'Tilapa', 21),
(21177, 'Tlacotepec de Benito Juárez', 21),
(21178, 'Tlacuilotepec', 21),
(21179, 'Tlachichuca', 21),
(21180, 'Tlahuapan', 21),
(21181, 'Tlaltenango', 21),
(21182, 'Tlanepantla', 21),
(21183, 'Tlaola', 21),
(21184, 'Tlapacoya', 21),
(21185, 'Tlapanalá', 21),
(21186, 'Tlatlauquitepec', 21),
(21187, 'Tlaxco', 21),
(21188, 'Tochimilco', 21),
(21189, 'Tochtepec', 21),
(21190, 'Totoltepec de Guerrero', 21),
(21191, 'Tulcingo', 21),
(21192, 'Tuzamapan de Galeana', 21),
(21193, 'Tzicatlacoyan', 21),
(21194, 'Venustiano Carranza', 21),
(21195, 'Vicente Guerrero', 21),
(21196, 'Xayacatlán de Bravo', 21),
(21197, 'Xicotepec', 21),
(21198, 'Xicotlán', 21),
(21199, 'Xiutetelco', 21),
(21200, 'Xochiapulco', 21),
(21201, 'Xochiltepec', 21),
(21202, 'Xochitlán de Vicente Suárez', 21),
(21203, 'Xochitlán Todos Santos', 21),
(21204, 'Yaonáhuac', 21),
(21205, 'Yehualtepec', 21),
(21206, 'Zacapala', 21),
(21207, 'Zacapoaxtla', 21),
(21208, 'Zacatlán', 21),
(21209, 'Zapotitlán', 21),
(21210, 'Zapotitlán de Méndez', 21),
(21211, 'Zaragoza', 21),
(21212, 'Zautla', 21),
(21213, 'Zihuateutla', 21),
(21214, 'Zinacatepec', 21),
(21215, 'Zongozotla', 21),
(21216, 'Zoquiapan', 21),
(21217, 'Zoquitlán', 21),
(22001, 'Amealco de Bonfil', 22),
(22002, 'Pinal de Amoles', 22),
(22003, 'Arroyo Seco', 22),
(22004, 'Cadereyta de Montes', 22),
(22005, 'Colón', 22),
(22006, 'Corregidora', 22),
(22007, 'Ezequiel Montes', 22),
(22008, 'Huimilpan', 22),
(22009, 'Jalpan de Serra', 22),
(22010, 'Landa de Matamoros', 22),
(22011, 'El Marqués', 22),
(22012, 'Pedro Escobedo', 22),
(22013, 'Peñamiller', 22),
(22014, 'Querétaro', 22),
(22015, 'San Joaquín', 22),
(22016, 'San Juan del Río', 22),
(22017, 'Tequisquiapan', 22),
(22018, 'Tolimán', 22),
(23001, 'Cozumel', 23),
(23002, 'Felipe Carrillo Puerto', 23),
(23003, 'Isla Mujeres', 23),
(23004, 'Othón P. Blanco', 23),
(23005, 'Benito Juárez', 23),
(23006, 'José María Morelos', 23),
(23007, 'Lázaro Cárdenas', 23),
(23008, 'Solidaridad', 23),
(23009, 'Tulum', 23),
(23010, 'Bacalar', 23),
(23011, 'Puerto Morelos', 23),
(24001, 'Ahualulco', 24),
(24002, 'Alaquines', 24),
(24003, 'Aquismón', 24),
(24004, 'Armadillo de los Infante', 24),
(24005, 'Cárdenas', 24),
(24006, 'Catorce', 24),
(24007, 'Cedral', 24),
(24008, 'Cerritos', 24),
(24009, 'Cerro de San Pedro', 24),
(24010, 'Ciudad del Maíz', 24),
(24011, 'Ciudad Fernández', 24),
(24012, 'Tancanhuitz', 24),
(24013, 'Ciudad Valles', 24),
(24014, 'Coxcatlán', 24),
(24015, 'Charcas', 24),
(24016, 'Ebano', 24),
(24017, 'Guadalcázar', 24),
(24018, 'Huehuetlán', 24),
(24019, 'Lagunillas', 24),
(24020, 'Matehuala', 24),
(24021, 'Mexquitic de Carmona', 24),
(24022, 'Moctezuma', 24),
(24023, 'Rayón', 24),
(24024, 'Rioverde', 24),
(24025, 'Salinas', 24),
(24026, 'San Antonio', 24),
(24027, 'San Ciro de Acosta', 24),
(24028, 'San Luis Potosí', 24),
(24029, 'San Martín Chalchicuautla', 24),
(24030, 'San Nicolás Tolentino', 24),
(24031, 'Santa Catarina', 24),
(24032, 'Santa María del Río', 24),
(24033, 'Santo Domingo', 24),
(24034, 'San Vicente Tancuayalab', 24),
(24035, 'Soledad de Graciano Sánchez', 24),
(24036, 'Tamasopo', 24),
(24037, 'Tamazunchale', 24),
(24038, 'Tampacán', 24),
(24039, 'Tampamolón Corona', 24),
(24040, 'Tamuín', 24),
(24041, 'Tanlajás', 24),
(24042, 'Tanquián de Escobedo', 24),
(24043, 'Tierra Nueva', 24),
(24044, 'Vanegas', 24),
(24045, 'Venado', 24),
(24046, 'Villa de Arriaga', 24),
(24047, 'Villa de Guadalupe', 24),
(24048, 'Villa de la Paz', 24),
(24049, 'Villa de Ramos', 24),
(24050, 'Villa de Reyes', 24),
(24051, 'Villa Hidalgo', 24),
(24052, 'Villa Juárez', 24),
(24053, 'Axtla de Terrazas', 24),
(24054, 'Xilitla', 24),
(24055, 'Zaragoza', 24),
(24056, 'Villa de Arista', 24),
(24057, 'Matlapa', 24),
(24058, 'El Naranjo', 24),
(25001, 'Ahome', 25),
(25002, 'Angostura', 25),
(25003, 'Badiraguato', 25),
(25004, 'Concordia', 25),
(25005, 'Cosalá', 25),
(25006, 'Culiacán', 25),
(25007, 'Choix', 25),
(25008, 'Elota', 25),
(25009, 'Escuinapa', 25),
(25010, 'El Fuerte', 25),
(25011, 'Guasave', 25),
(25012, 'Mazatlán', 25),
(25013, 'Mocorito', 25),
(25014, 'Rosario', 25),
(25015, 'Salvador Alvarado', 25),
(25016, 'San Ignacio', 25),
(25017, 'Sinaloa', 25),
(25018, 'Navolato', 25),
(26001, 'Aconchi', 26),
(26002, 'Agua Prieta', 26),
(26003, 'Alamos', 26),
(26004, 'Altar', 26),
(26005, 'Arivechi', 26),
(26006, 'Arizpe', 26),
(26007, 'Atil', 26),
(26008, 'Bacadéhuachi', 26),
(26009, 'Bacanora', 26),
(26010, 'Bacerac', 26),
(26011, 'Bacoachi', 26),
(26012, 'Bácum', 26),
(26013, 'Banámichi', 26),
(26014, 'Baviácora', 26),
(26015, 'Bavispe', 26),
(26016, 'Benjamín Hill', 26),
(26017, 'Caborca', 26),
(26018, 'Cajeme', 26),
(26019, 'Cananea', 26),
(26020, 'Carbó', 26),
(26021, 'La Colorada', 26),
(26022, 'Cucurpe', 26),
(26023, 'Cumpas', 26),
(26024, 'Divisaderos', 26),
(26025, 'Empalme', 26),
(26026, 'Etchojoa', 26),
(26027, 'Fronteras', 26),
(26028, 'Granados', 26),
(26029, 'Guaymas', 26),
(26030, 'Hermosillo', 26),
(26031, 'Huachinera', 26),
(26032, 'Huásabas', 26),
(26033, 'Huatabampo', 26),
(26034, 'Huépac', 26),
(26035, 'Imuris', 26),
(26036, 'Magdalena', 26),
(26037, 'Mazatán', 26),
(26038, 'Moctezuma', 26),
(26039, 'Naco', 26),
(26040, 'Nácori Chico', 26),
(26041, 'Nacozari de García', 26),
(26042, 'Navojoa', 26),
(26043, 'Nogales', 26),
(26044, 'Onavas', 26),
(26045, 'Opodepe', 26),
(26046, 'Oquitoa', 26),
(26047, 'Pitiquito', 26),
(26048, 'Puerto Peñasco', 26),
(26049, 'Quiriego', 26),
(26050, 'Rayón', 26),
(26051, 'Rosario', 26),
(26052, 'Sahuaripa', 26),
(26053, 'San Felipe de Jesús', 26),
(26054, 'San Javier', 26),
(26055, 'San Luis Río Colorado', 26),
(26056, 'San Miguel de Horcasitas', 26),
(26057, 'San Pedro de la Cueva', 26),
(26058, 'Santa Ana', 26),
(26059, 'Santa Cruz', 26),
(26060, 'Sáric', 26),
(26061, 'Soyopa', 26),
(26062, 'Suaqui Grande', 26),
(26063, 'Tepache', 26),
(26064, 'Trincheras', 26),
(26065, 'Tubutama', 26),
(26066, 'Ures', 26),
(26067, 'Villa Hidalgo', 26),
(26068, 'Villa Pesqueira', 26),
(26069, 'Yécora', 26),
(26070, 'General Plutarco Elías Calles', 26),
(26071, 'Benito Juárez', 26),
(26072, 'San Ignacio Río Muerto', 26),
(27001, 'Balancán', 27),
(27002, 'Cárdenas', 27),
(27003, 'Centla', 27),
(27004, 'Centro', 27),
(27005, 'Comalcalco', 27),
(27006, 'Cunduacán', 27),
(27007, 'Emiliano Zapata', 27),
(27008, 'Huimanguillo', 27),
(27009, 'Jalapa', 27),
(27010, 'Jalpa de Méndez', 27),
(27011, 'Jonuta', 27),
(27012, 'Macuspana', 27),
(27013, 'Nacajuca', 27),
(27014, 'Paraíso', 27),
(27015, 'Tacotalpa', 27),
(27016, 'Teapa', 27),
(27017, 'Tenosique', 27),
(28001, 'Abasolo', 28),
(28002, 'Aldama', 28),
(28003, 'Altamira', 28),
(28004, 'Antiguo Morelos', 28),
(28005, 'Burgos', 28),
(28006, 'Bustamante', 28),
(28007, 'Camargo', 28),
(28008, 'Casas', 28),
(28009, 'Ciudad Madero', 28),
(28010, 'Cruillas', 28),
(28011, 'Gómez Farías', 28),
(28012, 'González', 28),
(28013, 'Güémez', 28),
(28014, 'Guerrero', 28),
(28015, 'Gustavo Díaz Ordaz', 28),
(28016, 'Hidalgo', 28),
(28017, 'Jaumave', 28),
(28018, 'Jiménez', 28),
(28019, 'Llera', 28),
(28020, 'Mainero', 28),
(28021, 'El Mante', 28),
(28022, 'Matamoros', 28),
(28023, 'Méndez', 28),
(28024, 'Mier', 28),
(28025, 'Miguel Alemán', 28),
(28026, 'Miquihuana', 28),
(28027, 'Nuevo Laredo', 28),
(28028, 'Nuevo Morelos', 28),
(28029, 'Ocampo', 28),
(28030, 'Padilla', 28),
(28031, 'Palmillas', 28),
(28032, 'Reynosa', 28),
(28033, 'Río Bravo', 28),
(28034, 'San Carlos', 28),
(28035, 'San Fernando', 28),
(28036, 'San Nicolás', 28),
(28037, 'Soto la Marina', 28),
(28038, 'Tampico', 28),
(28039, 'Tula', 28),
(28040, 'Valle Hermoso', 28),
(28041, 'Victoria', 28),
(28042, 'Villagrán', 28),
(28043, 'Xicoténcatl', 28),
(29001, 'Amaxac de Guerrero', 29),
(29002, 'Apetatitlán de Antonio Carvajal', 29),
(29003, 'Atlangatepec', 29),
(29004, 'Atltzayanca', 29),
(29005, 'Apizaco', 29),
(29006, 'Calpulalpan', 29),
(29007, 'El Carmen Tequexquitla', 29),
(29008, 'Cuapiaxtla', 29),
(29009, 'Cuaxomulco', 29),
(29010, 'Chiautempan', 29),
(29011, 'Muñoz de Domingo Arenas', 29),
(29012, 'Españita', 29),
(29013, 'Huamantla', 29),
(29014, 'Hueyotlipan', 29),
(29015, 'Ixtacuixtla de Mariano Matamoros', 29),
(29016, 'Ixtenco', 29),
(29017, 'Mazatecochco de José María Morelos', 29),
(29018, 'Contla de Juan Cuamatzi', 29),
(29019, 'Tepetitla de Lardizábal', 29),
(29020, 'Sanctórum de Lázaro Cárdenas', 29),
(29021, 'Nanacamilpa de Mariano Arista', 29),
(29022, 'Acuamanala de Miguel Hidalgo', 29),
(29023, 'Natívitas', 29),
(29024, 'Panotla', 29),
(29025, 'San Pablo del Monte', 29),
(29026, 'Santa Cruz Tlaxcala', 29),
(29027, 'Tenancingo', 29),
(29028, 'Teolocholco', 29),
(29029, 'Tepeyanco', 29),
(29030, 'Terrenate', 29),
(29031, 'Tetla de la Solidaridad', 29),
(29032, 'Tetlatlahuca', 29),
(29033, 'Tlaxcala', 29),
(29034, 'Tlaxco', 29),
(29035, 'Tocatlán', 29),
(29036, 'Totolac', 29),
(29037, 'Ziltlaltépec de Trinidad Sánchez Santos', 29),
(29038, 'Tzompantepec', 29),
(29039, 'Xaloztoc', 29),
(29040, 'Xaltocan', 29),
(29041, 'Papalotla de Xicohténcatl', 29),
(29042, 'Xicohtzinco', 29),
(29043, 'Yauhquemehcan', 29),
(29044, 'Zacatelco', 29),
(29045, 'Benito Juárez', 29),
(29046, 'Emiliano Zapata', 29),
(29047, 'Lázaro Cárdenas', 29),
(29048, 'La Magdalena Tlaltelulco', 29),
(29049, 'San Damián Texóloc', 29),
(29050, 'San Francisco Tetlanohcan', 29),
(29051, 'San Jerónimo Zacualpan', 29),
(29052, 'San José Teacalco', 29),
(29053, 'San Juan Huactzinco', 29),
(29054, 'San Lorenzo Axocomanitla', 29),
(29055, 'San Lucas Tecopilco', 29),
(29056, 'Santa Ana Nopalucan', 29),
(29057, 'Santa Apolonia Teacalco', 29),
(29058, 'Santa Catarina Ayometla', 29),
(29059, 'Santa Cruz Quilehtla', 29),
(29060, 'Santa Isabel Xiloxoxtla', 29),
(30001, 'Acajete', 30),
(30002, 'Acatlán', 30),
(30003, 'Acayucan', 30),
(30004, 'Actopan', 30),
(30005, 'Acula', 30),
(30006, 'Acultzingo', 30),
(30007, 'Camarón de Tejeda', 30),
(30008, 'Alpatláhuac', 30),
(30009, 'Alto Lucero de Gutiérrez Barrios', 30),
(30010, 'Altotonga', 30),
(30011, 'Alvarado', 30),
(30012, 'Amatitlán', 30),
(30013, 'Naranjos Amatlán', 30),
(30014, 'Amatlán de los Reyes', 30),
(30015, 'Angel R. Cabada', 30),
(30016, 'La Antigua', 30),
(30017, 'Apazapan', 30),
(30018, 'Aquila', 30),
(30019, 'Astacinga', 30),
(30020, 'Atlahuilco', 30),
(30021, 'Atoyac', 30),
(30022, 'Atzacan', 30),
(30023, 'Atzalan', 30),
(30024, 'Tlaltetela', 30),
(30025, 'Ayahualulco', 30),
(30026, 'Banderilla', 30),
(30027, 'Benito Juárez', 30),
(30028, 'Boca del Río', 30),
(30029, 'Calcahualco', 30),
(30030, 'Camerino Z. Mendoza', 30),
(30031, 'Carrillo Puerto', 30),
(30032, 'Catemaco', 30),
(30033, 'Cazones de Herrera', 30),
(30034, 'Cerro Azul', 30),
(30035, 'Citlaltépetl', 30),
(30036, 'Coacoatzintla', 30),
(30037, 'Coahuitlán', 30),
(30038, 'Coatepec', 30),
(30039, 'Coatzacoalcos', 30),
(30040, 'Coatzintla', 30),
(30041, 'Coetzala', 30),
(30042, 'Colipa', 30),
(30043, 'Comapa', 30),
(30044, 'Córdoba', 30),
(30045, 'Cosamaloapan de Carpio', 30),
(30046, 'Cosautlán de Carvajal', 30),
(30047, 'Coscomatepec', 30),
(30048, 'Cosoleacaque', 30),
(30049, 'Cotaxtla', 30),
(30050, 'Coxquihui', 30),
(30051, 'Coyutla', 30),
(30052, 'Cuichapa', 30),
(30053, 'Cuitláhuac', 30),
(30054, 'Chacaltianguis', 30),
(30055, 'Chalma', 30),
(30056, 'Chiconamel', 30),
(30057, 'Chiconquiaco', 30),
(30058, 'Chicontepec', 30),
(30059, 'Chinameca', 30),
(30060, 'Chinampa de Gorostiza', 30),
(30061, 'Las Choapas', 30),
(30062, 'Chocamán', 30),
(30063, 'Chontla', 30),
(30064, 'Chumatlán', 30),
(30065, 'Emiliano Zapata', 30),
(30066, 'Espinal', 30),
(30067, 'Filomeno Mata', 30),
(30068, 'Fortín', 30),
(30069, 'Gutiérrez Zamora', 30),
(30070, 'Hidalgotitlán', 30),
(30071, 'Huatusco', 30),
(30072, 'Huayacocotla', 30),
(30073, 'Hueyapan de Ocampo', 30),
(30074, 'Huiloapan de Cuauhtémoc', 30),
(30075, 'Ignacio de la Llave', 30),
(30076, 'Ilamatlán', 30),
(30077, 'Isla', 30),
(30078, 'Ixcatepec', 30),
(30079, 'Ixhuacán de los Reyes', 30),
(30080, 'Ixhuatlán del Café', 30),
(30081, 'Ixhuatlancillo', 30),
(30082, 'Ixhuatlán del Sureste', 30),
(30083, 'Ixhuatlán de Madero', 30),
(30084, 'Ixmatlahuacan', 30),
(30085, 'Ixtaczoquitlán', 30),
(30086, 'Jalacingo', 30),
(30087, 'Xalapa', 30),
(30088, 'Jalcomulco', 30),
(30089, 'Jáltipan', 30),
(30090, 'Jamapa', 30),
(30091, 'Jesús Carranza', 30),
(30092, 'Xico', 30),
(30093, 'Jilotepec', 30),
(30094, 'Juan Rodríguez Clara', 30),
(30095, 'Juchique de Ferrer', 30),
(30096, 'Landero y Coss', 30),
(30097, 'Lerdo de Tejada', 30),
(30098, 'Magdalena', 30),
(30099, 'Maltrata', 30),
(30100, 'Manlio Fabio Altamirano', 30),
(30101, 'Mariano Escobedo', 30),
(30102, 'Martínez de la Torre', 30),
(30103, 'Mecatlán', 30),
(30104, 'Mecayapan', 30),
(30105, 'Medellín de Bravo', 30),
(30106, 'Miahuatlán', 30),
(30107, 'Las Minas', 30),
(30108, 'Minatitlán', 30),
(30109, 'Misantla', 30),
(30110, 'Mixtla de Altamirano', 30),
(30111, 'Moloacán', 30),
(30112, 'Naolinco', 30),
(30113, 'Naranjal', 30),
(30114, 'Nautla', 30),
(30115, 'Nogales', 30),
(30116, 'Oluta', 30),
(30117, 'Omealca', 30),
(30118, 'Orizaba', 30),
(30119, 'Otatitlán', 30),
(30120, 'Oteapan', 30),
(30121, 'Ozuluama de Mascareñas', 30),
(30122, 'Pajapan', 30),
(30123, 'Pánuco', 30),
(30124, 'Papantla', 30),
(30125, 'Paso del Macho', 30),
(30126, 'Paso de Ovejas', 30),
(30127, 'La Perla', 30),
(30128, 'Perote', 30),
(30129, 'Platón Sánchez', 30),
(30130, 'Playa Vicente', 30),
(30131, 'Poza Rica de Hidalgo', 30),
(30132, 'Las Vigas de Ramírez', 30),
(30133, 'Pueblo Viejo', 30),
(30134, 'Puente Nacional', 30),
(30135, 'Rafael Delgado', 30),
(30136, 'Rafael Lucio', 30),
(30137, 'Los Reyes', 30),
(30138, 'Río Blanco', 30),
(30139, 'Saltabarranca', 30),
(30140, 'San Andrés Tenejapan', 30),
(30141, 'San Andrés Tuxtla', 30),
(30142, 'San Juan Evangelista', 30),
(30143, 'Santiago Tuxtla', 30),
(30144, 'Sayula de Alemán', 30),
(30145, 'Soconusco', 30),
(30146, 'Sochiapa', 30),
(30147, 'Soledad Atzompa', 30),
(30148, 'Soledad de Doblado', 30),
(30149, 'Soteapan', 30),
(30150, 'Tamalín', 30),
(30151, 'Tamiahua', 30),
(30152, 'Tampico Alto', 30),
(30153, 'Tancoco', 30),
(30154, 'Tantima', 30),
(30155, 'Tantoyuca', 30),
(30156, 'Tatatila', 30),
(30157, 'Castillo de Teayo', 30),
(30158, 'Tecolutla', 30),
(30159, 'Tehuipango', 30),
(30160, 'Álamo Temapache', 30),
(30161, 'Tempoal', 30),
(30162, 'Tenampa', 30),
(30163, 'Tenochtitlán', 30),
(30164, 'Teocelo', 30),
(30165, 'Tepatlaxco', 30),
(30166, 'Tepetlán', 30),
(30167, 'Tepetzintla', 30),
(30168, 'Tequila', 30),
(30169, 'José Azueta', 30),
(30170, 'Texcatepec', 30),
(30171, 'Texhuacán', 30),
(30172, 'Texistepec', 30),
(30173, 'Tezonapa', 30),
(30174, 'Tierra Blanca', 30),
(30175, 'Tihuatlán', 30),
(30176, 'Tlacojalpan', 30),
(30177, 'Tlacolulan', 30),
(30178, 'Tlacotalpan', 30),
(30179, 'Tlacotepec de Mejía', 30),
(30180, 'Tlachichilco', 30),
(30181, 'Tlalixcoyan', 30),
(30182, 'Tlalnelhuayocan', 30),
(30183, 'Tlapacoyan', 30),
(30184, 'Tlaquilpa', 30),
(30185, 'Tlilapan', 30),
(30186, 'Tomatlán', 30),
(30187, 'Tonayán', 30),
(30188, 'Totutla', 30),
(30189, 'Tuxpan', 30),
(30190, 'Tuxtilla', 30),
(30191, 'Ursulo Galván', 30),
(30192, 'Vega de Alatorre', 30),
(30193, 'Veracruz', 30),
(30194, 'Villa Aldama', 30),
(30195, 'Xoxocotla', 30),
(30196, 'Yanga', 30),
(30197, 'Yecuatla', 30),
(30198, 'Zacualpan', 30),
(30199, 'Zaragoza', 30),
(30200, 'Zentla', 30),
(30201, 'Zongolica', 30),
(30202, 'Zontecomatlán de López y Fuentes', 30),
(30203, 'Zozocolco de Hidalgo', 30),
(30204, 'Agua Dulce', 30),
(30205, 'El Higo', 30),
(30206, 'Nanchital de Lázaro Cárdenas del Río', 30),
(30207, 'Tres Valles', 30),
(30208, 'Carlos A. Carrillo', 30),
(30209, 'Tatahuicapan de Juárez', 30),
(30210, 'Uxpanapa', 30),
(30211, 'San Rafael', 30),
(30212, 'Santiago Sochiapan', 30),
(31001, 'Abalá', 31),
(31002, 'Acanceh', 31),
(31003, 'Akil', 31),
(31004, 'Baca', 31),
(31005, 'Bokobá', 31),
(31006, 'Buctzotz', 31),
(31007, 'Cacalchén', 31),
(31008, 'Calotmul', 31),
(31009, 'Cansahcab', 31),
(31010, 'Cantamayec', 31),
(31011, 'Celestún', 31),
(31012, 'Cenotillo', 31),
(31013, 'Conkal', 31),
(31014, 'Cuncunul', 31),
(31015, 'Cuzamá', 31),
(31016, 'Chacsinkín', 31),
(31017, 'Chankom', 31),
(31018, 'Chapab', 31),
(31019, 'Chemax', 31),
(31020, 'Chicxulub Pueblo', 31),
(31021, 'Chichimilá', 31),
(31022, 'Chikindzonot', 31),
(31023, 'Chocholá', 31),
(31024, 'Chumayel', 31),
(31025, 'Dzán', 31),
(31026, 'Dzemul', 31),
(31027, 'Dzidzantún', 31),
(31028, 'Dzilam de Bravo', 31),
(31029, 'Dzilam González', 31),
(31030, 'Dzitás', 31),
(31031, 'Dzoncauich', 31),
(31032, 'Espita', 31),
(31033, 'Halachó', 31),
(31034, 'Hocabá', 31),
(31035, 'Hoctún', 31),
(31036, 'Homún', 31),
(31037, 'Huhí', 31),
(31038, 'Hunucmá', 31),
(31039, 'Ixil', 31),
(31040, 'Izamal', 31),
(31041, 'Kanasín', 31),
(31042, 'Kantunil', 31),
(31043, 'Kaua', 31),
(31044, 'Kinchil', 31),
(31045, 'Kopomá', 31),
(31046, 'Mama', 31),
(31047, 'Maní', 31),
(31048, 'Maxcanú', 31),
(31049, 'Mayapán', 31),
(31050, 'Mérida', 31),
(31051, 'Mocochá', 31),
(31052, 'Motul', 31),
(31053, 'Muna', 31),
(31054, 'Muxupip', 31),
(31055, 'Opichén', 31),
(31056, 'Oxkutzcab', 31),
(31057, 'Panabá', 31),
(31058, 'Peto', 31),
(31059, 'Progreso', 31),
(31060, 'Quintana Roo', 31),
(31061, 'Río Lagartos', 31),
(31062, 'Sacalum', 31),
(31063, 'Samahil', 31),
(31064, 'Sanahcat', 31),
(31065, 'San Felipe', 31),
(31066, 'Santa Elena', 31),
(31067, 'Seyé', 31),
(31068, 'Sinanché', 31),
(31069, 'Sotuta', 31),
(31070, 'Sucilá', 31),
(31071, 'Sudzal', 31),
(31072, 'Suma', 31),
(31073, 'Tahdziú', 31),
(31074, 'Tahmek', 31),
(31075, 'Teabo', 31),
(31076, 'Tecoh', 31),
(31077, 'Tekal de Venegas', 31),
(31078, 'Tekantó', 31),
(31079, 'Tekax', 31),
(31080, 'Tekit', 31),
(31081, 'Tekom', 31),
(31082, 'Telchac Pueblo', 31),
(31083, 'Telchac Puerto', 31),
(31084, 'Temax', 31),
(31085, 'Temozón', 31),
(31086, 'Tepakán', 31),
(31087, 'Tetiz', 31),
(31088, 'Teya', 31),
(31089, 'Ticul', 31),
(31090, 'Timucuy', 31),
(31091, 'Tinum', 31),
(31092, 'Tixcacalcupul', 31),
(31093, 'Tixkokob', 31),
(31094, 'Tixmehuac', 31),
(31095, 'Tixpéhual', 31),
(31096, 'Tizimín', 31),
(31097, 'Tunkás', 31),
(31098, 'Tzucacab', 31),
(31099, 'Uayma', 31),
(31100, 'Ucú', 31),
(31101, 'Umán', 31),
(31102, 'Valladolid', 31),
(31103, 'Xocchel', 31),
(31104, 'Yaxcabá', 31),
(31105, 'Yaxkukul', 31),
(31106, 'Yobaín', 31),
(32001, 'Apozol', 32),
(32002, 'Apulco', 32),
(32003, 'Atolinga', 32),
(32004, 'Benito Juárez', 32),
(32005, 'Calera', 32),
(32006, 'Cañitas de Felipe Pescador', 32),
(32007, 'Concepción del Oro', 32),
(32008, 'Cuauhtémoc', 32),
(32009, 'Chalchihuites', 32),
(32010, 'Fresnillo', 32),
(32011, 'Trinidad García de la Cadena', 32),
(32012, 'Genaro Codina', 32),
(32013, 'General Enrique Estrada', 32),
(32014, 'General Francisco R. Murguía', 32),
(32015, 'El Plateado de Joaquín Amaro', 32),
(32016, 'General Pánfilo Natera', 32),
(32017, 'Guadalupe', 32),
(32018, 'Huanusco', 32),
(32019, 'Jalpa', 32),
(32020, 'Jerez', 32),
(32021, 'Jiménez del Teul', 32),
(32022, 'Juan Aldama', 32),
(32023, 'Juchipila', 32),
(32024, 'Loreto', 32),
(32025, 'Luis Moya', 32),
(32026, 'Mazapil', 32),
(32027, 'Melchor Ocampo', 32),
(32028, 'Mezquital del Oro', 32),
(32029, 'Miguel Auza', 32),
(32030, 'Momax', 32),
(32031, 'Monte Escobedo', 32),
(32032, 'Morelos', 32),
(32033, 'Moyahua de Estrada', 32),
(32034, 'Nochistlán de Mejía', 32),
(32035, 'Noria de Ángeles', 32),
(32036, 'Ojocaliente', 32),
(32037, 'Pánuco', 32),
(32038, 'Pinos', 32),
(32039, 'Río Grande', 32),
(32040, 'Sain Alto', 32),
(32041, 'El Salvador', 32),
(32042, 'Sombrerete', 32),
(32043, 'Susticacán', 32),
(32044, 'Tabasco', 32),
(32045, 'Tepechitlán', 32),
(32046, 'Tepetongo', 32),
(32047, 'Teúl de González Ortega', 32),
(32048, 'Tlaltenango de Sánchez Román', 32),
(32049, 'Valparaíso', 32),
(32050, 'Vetagrande', 32),
(32051, 'Villa de Cos', 32),
(32052, 'Villa García', 32),
(32053, 'Villa González Ortega', 32),
(32054, 'Villa Hidalgo', 32),
(32055, 'Villanueva', 32),
(32056, 'Zacatecas', 32),
(32057, 'Trancoso', 32),
(32058, 'Santa María de la Paz', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `segundo_nombre` varchar(20) DEFAULT NULL,
  `primer_apellido` varchar(20) DEFAULT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `imagen_perfil` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `id_genero`, `fecha_registro`, `imagen_perfil`, `id_usuario`) VALUES
(1, 'Quetzali', '', 'Ramirez', '', '1995-04-18', 1, NULL, '../images/accounts/quetzalramirez.png', 2),
(7, 'Christina', '', 'Ramirez', '', '2002-01-01', 1, NULL, '../images/accounts/ChristinaRamires05:4.png', 4),
(11, 'Elvir', 'lol', 'Foregin', 'Ess', '2023-05-11', 6, '2023-05-30', 'images/ElviraForegin06:33:3.png', 25),
(13, 'ken', 'L', 'Wright', '', '2023-05-04', 3, '2023-05-30', 'images/kenWright06:39:43_PM.png', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo_sucursal`
--

CREATE TABLE `correo_sucursal` (
  `id_sucurcorreo` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `correo_sucursal`
--

INSERT INTO `correo_sucursal` (`id_sucurcorreo`, `id_sucursal`, `correo`) VALUES
(10, 1, 'juana@gmail.com'),
(12, 1, 'juane@gmail.com'),
(13, 5, 'juawn@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`, `id_pais`) VALUES
(1, 'Aguascalientes', 1),
(2, 'Baja California', 1),
(3, 'Baja California Sur', 1),
(4, 'Campeche', 1),
(5, 'Chiapas', 1),
(6, 'Chihuahua', 1),
(7, 'Coahuila', 1),
(8, 'Colima', 1),
(9, 'Ciudad de México', 1),
(10, 'Durango', 1),
(11, 'Guanajuato', 1),
(12, 'Estado de México', 1),
(13, 'Guerrero', 1),
(14, 'Hidalgo', 1),
(15, 'Jalisco', 1),
(16, 'Michoacán', 1),
(17, 'Morelos', 1),
(18, 'Nayarit', 1),
(19, 'Nuevo León', 1),
(20, 'Oaxaca', 1),
(21, 'Puebla', 1),
(22, 'Querétaro', 1),
(23, 'Quintana Roo', 1),
(24, 'San Luis Potosí', 1),
(25, 'Sinaloa', 1),
(26, 'Sonora', 1),
(27, 'Tabasco', 1),
(28, 'Tamaulipas', 1),
(29, 'Tlaxcala', 1),
(30, 'Veracruz', 1),
(31, 'Yucatán', 1),
(32, 'Zacatecas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id_estatus` int(11) NOT NULL,
  `estatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id_estatus`, `estatus`) VALUES
(1, 'Pedido'),
(2, 'En preparación'),
(3, 'En envío'),
(4, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Femenino'),
(2, 'No binario'),
(3, 'Masculino'),
(6, 'Genero fluido'),
(7, 'Bigenero'),
(8, 'Agenero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente_principal`
--

CREATE TABLE `ingrediente_principal` (
  `id_ingprinc` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingrediente_principal`
--

INSERT INTO `ingrediente_principal` (`id_ingprinc`, `nombre`) VALUES
(1, 'Tortilla de maÃ­z'),
(2, 'Bolillo'),
(3, 'Tortilla de harina'),
(5, 'Agua carbonatada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente_secundario`
--

CREATE TABLE `ingrediente_secundario` (
  `id_ingsec` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingrediente_secundario`
--

INSERT INTO `ingrediente_secundario` (`id_ingsec`, `nombre`) VALUES
(1, 'Pastor de cerdo'),
(2, 'Chorizo'),
(3, 'Costilla de cerdo'),
(4, 'Cabeza de cerdo'),
(6, 'Horchata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip_sucursal`
--

CREATE TABLE `ip_sucursal` (
  `id_ipsucursal` int(11) NOT NULL,
  `id_ingprinc` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ip_sucursal`
--

INSERT INTO `ip_sucursal` (`id_ipsucursal`, `id_ingprinc`, `id_sucursal`, `cantidad`) VALUES
(1, 1, 1, 650),
(2, 2, 1, 30),
(3, 3, 1, 40),
(6, 2, 2, 51);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `is_sucursal`
--

CREATE TABLE `is_sucursal` (
  `id_issucursal` int(11) NOT NULL,
  `id_ingsec` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `is_sucursal`
--

INSERT INTO `is_sucursal` (`id_issucursal`, `id_ingsec`, `id_sucursal`, `cantidad`) VALUES
(1, 1, 1, 12),
(3, 2, 2, 50),
(4, 1, 2, 30),
(5, 4, 2, 50),
(6, 2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pais`) VALUES
(1, 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `hora_pedido` time NOT NULL,
  `comentario_general` text NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `costo_total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `segundo_nombre` varchar(20) NOT NULL,
  `primer_apellido` varchar(20) NOT NULL,
  `segundo_apellido` varchar(20) NOT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `CURP` varchar(18) NOT NULL,
  `imagen_perfil` longblob DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_genero`, `fecha_nacimiento`, `fecha_contratacion`, `RFC`, `CURP`, `imagen_perfil`, `id_usuario`, `id_sucursal`, `id_ciudad`) VALUES
(1, 'Kw', 'Admin', 'Es', 'Eli', 6, '2002-09-14', '2023-04-01', 'EAEM020914496', 'EAEM020914HGTSLGA8', 0x646174613a696d6167652f6a7065673b6261736536342c2f396a2f34414151536b5a4a5267414241514141415141424141442f3277424441414d4341674d4341674d4441774d4541774d45425167464251514542516f484277594944416f4d4441734b4377734e44684951445134524467734c4542595145524d55465255564441385847425955474249554652542f3277424441514d454241554542516b4642516b554451734e464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642542f7741415243414566415634444152454141684542417845422f38514148774141415155424151454241514541414141414141414141414543417751464267634943516f4c2f3851417452414141674544417749454177554642415141414146394151494441415152425249684d5545474531466842794a7846444b426b61454949304b78775256533066416b4d324a7967676b4b4668635947526f6c4a69636f4b536f304e5459334f446b3651305246526b644953557054564656575631685a576d4e6b5a575a6e61476c7163335231646e643465587144684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754869342b546c3575666f3665727838765030396662332b506e362f38514148774541417745424151454241514542415141414141414141414543417751464267634943516f4c2f385141745245414167454342415144424163464241514141514a3341414543417845454253457842684a425551646863524d694d6f454946454b526f62484243534d7a55764156596e4c524368596b4e4f456c3852635947526f6d4a7967704b6a55324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c36676f4f456859614869496d4b6b704f556c5a61586d4a6d616f714f6b7061616e714b6d7173724f3074626133754c6d367773504578636248794d6e4b3074505531646258324e6e613475506b3565626e364f6e7138765030396662332b506e362f396f4144414d4241414952417845415077446532462b6d4342586d2b326a3342706c753030532f314c2f6a31736269355038413079685a2f7743517071725466326871445a707866443378504b6f322b48745559656f73704d662b673166746161366a634a49734a384c2f414259354a486833557678746d4838785356616e33446b6b537866434878664c30304b362f77434262562f6d616674366663667332583466675634306d782f784a696d6537334d492f77445a3650724650754c6b614c796673372b4d5a7366364a62526e2f62756b2f706d6c395a703979765a2b5a5a692f5a74385774393436656e316e592f79576c395a706a56507a4c6b58374d486969546c7233536f78377a53482b55644c367a45726b58566c324c396c62584a43424c72476d782f37676b622b677050465237427952376d68622f736e5868483733784862722f75576a4e2f4e68532b73726f6735596d6a482b794e47772b667853342f334e50412f6e4a51385435465767586f5032524e504f4e2f695337503841753261442f77426d4e54396166524374464768442b794a6f58486d613771542b367047763944552f574a64454875646939442b79503458422b6655395866365378442f326e532b735641356f396935442b7956344c6a494c3347735334374e644b41667951556533714d4f5a6445614558374c6e674f4d594e6e6579483161396b2f6f525136745475484e35466850325a76682b7658534a6d2f337279622f34716c37536f2b6f2b646f6e6a2f5a752b48796638774e6a396279662f414f4c716c4b723344326a4c555837506667434c475044305a782f65754a6a2f414f7a316f7661667a423757527157667764384657503841712f44576e742f31326938332f7742437a56726e58326d4c32732b35666a2b4733684f4673782b476449512b6f7359682f774379316435763754483761702f4d7a6b766970726e68543458654832756d3062537674307759573044573061676b444c4d7878776938456e36415a4a465371633672736d7a6e71346d6356724a6e35632f4844342b54654a504546366d6c755959354a4d765043676938776a6762565847786364464834354e657136536f78535a7a4a79714b35355150464f70516e6439706d6433484a336c763530766239422b7a59316646463234626463797649656f4a36436e3763714e4e645456303647383143497a4d7a4a4831334d534d6a32716c585a6f34704851574e344e506a4142417879584a3656684b70636c71367357354e666c6d58624849724b656f62475361536d4b79526630347a3731646e424248516331747a637973544b3765684e7256764d6b417649484f3864565055436b744871516c64324e6a7750384145692b30363668757265366b733771467369574e73636a766975714c69315a37484c586f637a757a33485476326a74635a646c394a62366f546a6d65505977487356786a3871345a5561622b4851556561476950572f687438664c4b346b6a686c6d625472707541305758553864786a424858747836566e4b6b3275342b617a50665041667843683852366a6336633830447446476a775378507545362f7845665134474b584a37756830517157646d7a75717a4f734b414367416f414b414367416f414b4143674435335646484f306339362f4f2f6153376c4e73332f4359426e6d794f41425858686d35534b556e59366c417244474b39564969374a4555487457716946325032444934716c4561596f5564636356584b56646a6c4147636971354175504141475057697a43342b6d6c3346636b6a786b63553743356d5470696d6b4f354f683766725473467964446e676436646775573475514d696977584c43644b45686f576d4d4b414372534a484164363253415774414371734252317a5737507735704e7a71562f4b496253335175376e6e38414f353971647236457432567a3879663270506a54652b4c74623143417965564c4e2b376451774968677878434d642b63736637334853765368434e4f4e7a6c533570616e7938625346537a716f6b6475756135716c5a7a5a30714e746978465a73364c386970375a724331797a52734e4f743435452f3562535a2b36414d43694b6439536479665674523874784368427831774f6c6162454e4f356c506377684761346e58492f674271626a3565354a61366e615a44785262767161576f2b56574f70306657345549796f7776624e62707461475674624858516549744d6d56593771484b4d4f5778754172524a795768446b3476593458583437505174524d3971574d44484b7232465a755457356f2f664e4c52764571334a562b774857737564334d6e41376a7731347469686c514c387a5a2f765972716a4a744745346370377438507669504b2b74574d7364326c6e64784f504c636e62764f4f2b547a6e475078716f717a4d5a5230507337774c34376938583662484b384a74726a487a4c31584f534d4276586a7031726d6c437a304f716c577670493675736a734367416f414b414367416f414b414367443531443756354a47612f4e674f69384a48496e59394d675a72304d4972746a5778314348614f7465776b496b5673394f6c617134447831716b41344e6e746d7445574f42774f4b5943356f734139542b564145695578574a6f386e763070324757556f416e6a36696d42626a5048705153547030706f614855574b75464b775843744549634f6c617851433172594170374166482f37617678332f414f455a30794852374f54624f784d777a30344f456248666f782b67483936756a44302b655632637335747579507a6c314456626e5672755761646d6b4d6a4669376e4a79546b6d74717375694643504b51686b682b624f6134626d784b4c6c354468515144305070564a6a4c7258796146594e4a773037634c6e726e3172524476304f517539546b7663675337446e6c56366d733278376a594969374b4e34326e3778504a7a564665707551527242486c463345447053757836462b30754a465950744830417130327a4a6e5961545062334549475135377165434b36493647446b5a486932426f6f53455a6a483358486232724f70717a616e6178692b48375761512f4b2f7967644b3533457478544f74307448553765566c7a786d743452646a4361766f644e6136316357573148485431373131525674546e6c4378394766416a34367a2b4758386e613135706a6747613333667659795034342f70366478524f455a727a4f4e725736507476776834717350474f68323270366263706457307935447078673977523249394458444b4c69375350536f7a35306264536441554146414251415541464142514238346279612f4f52584f71384a4b55736e593947666a5066697656776b644c73753268304373546d765473535342766c474478544165724850584657686a316b474b317346682b66664e46684467314e415048536d4249686f4173526e4178327067544b33536e595a596a4a474b424675467363487452594379446763553744754c7a696e594c695a4e494c696735716b4e456c626f59566141772f476d74572b67654764537672715a626531743764355a706e3649674850343434487669697a6b3146476335637175666a3938622f41422f65664562787871577358624d52504b536b5a5033454843722b436743765864714e506c57357a307665647a7a6153356a676a494933453942586e755231585258696b5168705a526852304765395a7958596d354d32704b43757759483669703243356b3676647a616a4f716c7471714f333961714c58555a556868696758646e4c5a396148715671546938685138767a3241464775776173314e5031525a53705a68737a6a4c6359712b554864485557455675367250627a695567344978576b5961584d7053376d764d346969456769324d657532726a6f6a477a5a4266517961685a6c30637373592b39366531633952752b68744264475136426253674d356a59397374786d6b726c505451377a524a5330506c3346736a446f41772f5850617568616e504b54766f6131377055643762346a415848494a35496f664d4a5375724d7964417662765174553832482f57784849586f4741504972614c7563383457315239636673332f46533330692f744a566c4d576b616e4c35463741787a396d6e36493537447343654151775061726e53626a5a2f49786a506b6e7a66656659366e4934727a6a3130377136466f47464142514155414641425142383246712f4f674f7a38504b49394e6a3745354e65316856614a66513156357276334a5a49723752696d6b496b535467316f6b4e43712b526e3372515a4b7036356f4a4869697744317174414a555049703241734a2b64414579304157454f50725142626847547a51426258376f6f41646a4e554d54427057454f4178567044512b746b4d4b734435532f62312b4b4b3644344e74764364744f567564517863585155382b55702b52543746786e2f674876586268492b2b366a36484e57642f64507a563153624a5a324a4a626e6e765371793570584c68486c527a30686153556c73597a57445131356c61367539386e6c70314236314e6a546c495249514343574a7a79425532437844356339797856506b334872337854566d576c334c423077425172534166513961726d534271784e4648466267626c44416334497a526443624c4d567461366754744a516a6e432f345574525875644e6f576e474a736f666c506356736d37574d7078757a6f59744d7537706975435931376a76536b37446a464543334d756c7139754d446365654b68366f7078737a543076565073724b726c64336f6554567753324d7058756266326f53715a725734324f4238305435326e38442f537472637044736156687173754149346a39572b366168744968774a53576b6e426b4352796b3862523170526c32427862577032646a644e3466696831794e6336646541323137627838656f446578427a672f384178566436714a36484e55703879356c756a37392b42586a52664733773630363561597a58647150736c777a484a4c706a424a37355571326665754f76446c6c6675623461643179766f656731796e614641425141554146414251423830673549723839413772537a74302b4831324376626f4b30555730583162675632704543377550657251446733617445696b505275447a5447534c49636330694351535a2b6c4145696e482f414e6571514530625a70675449334e41466c446b6461414c455a365541576f6d3578362b6c41467444545169595651776f414b704941725a41424f42546273422b555837575078432f774345352b4c6d75336355336d5773637874344d486a79342f6b5848313237762b4247765369765a3056356e4b76656b3266504f707a5a354a353643755675357559737370556e6b6668553342616c4d595a79636e50656c6331314a565445474f6373633548556973334c5564695a5846724479666d374448536a63725572757330792b5a797837303770413057597265634a755253793963476a6d456f694e61584e6e4b4a30425450384a707161544b35624858614671624c4b6d34486177355833725a56466251786c4737505350446c79582b514468685850556e64584c6a46334f553179413256396379746b73446852364770396f6d6a6477755a396c5038415949586454756d626c6e5038685638396d6372695535664546786233414a664a50765769714e6b63747a7550445869754f3652595a4346596a6a41342f4f6e7569483770316b714c50436b6d63465477525354615a4c314f392b4679776130756f3644714369574334694d7366504f52674e6a334844442f414861336b3234715336476366636c354d39762f41474c6645632b672b4c2f4558677938507a68544b707a77586a6248483144452f5252585a5658744b4b6c324d724b6e5756746d66595665556569464142514155414641425142387967376e41497a6d767a35626c48653276795738594841414846665130563770525a57546e4e6270616d59395a4f446d7153416347352b7462496f65473470696248427142456f6248664971624153724a324e4e41574562307067544b336567437847535251425952717177467146736b5541586f794d5a36304153673037426534366e594172524a6f567771686d4c34323174664458672f573957635a57797370726b6a31324957782b6c4f31326b544a32522b4c586943366134764a705a43575a6d4a4a4e656e69486179527a306b636c66486353527a6a69754f357663794a6c336341636e71616934305377327363667a534563384155704d3257316946357a6354375558355277434b6d3974536f77624e6a5474436c76796f4f634831465a53714a47384b5466513679773848424635544e63737179657031526f4a626f366253764255636f473951416179645a32304e505949314c6a346651544b414146505934725032342f59397a4675664172324c6b7143366a6e69743456726d55714a31586872537046436e62675934346f6e4f3567716237462f5776417776597a4a734f346e4a4f4d3143714d313557594d6e7736326a6857322b7672577674684b6b75787a48696a3464793255586e525a636463487257744f736d37436e51393351342b3065577a754d62734f7036644b3759797673655a4a61325a36353458315037627077443838636e304e62637439546d75376e576542745362537646576c334a62437063716a6e2f595937572f3864593172485a6f7a717038743065793654654c34482f615930505572646d4d4e3148455a674478687377742f494774734c506e7079677a4f713236635a396a3779484942726861737a7669376f4b6b6f4b414367416f414b41506d4f332b65346a555a79534258774556714e486578746851427a58304e4e6536696d39535545567569575044437446473468775944746d727356636b456e66745149654778514965487a51424a47324f76656743314777492b6c4145385a7070415745596d6d425a5130774c4d62594e414679422b6e4e416d576b4e4e4d53483952566f6f4f6170616b68564452356e2b306e6376622f424c7859496951386c6a496e4870744a623941522b4e5642326d685474592f483357334f5468766d5065753673377949684648503358436741664e5847376c4e464b53303874743875517631714755696c3578764c774b67796f375539747a564854614a346649594f795a4a4e637457646b64394b467a763947307055554141592b6c655a4b5a3655493252314e705a424647467a697347376d6c6a647449796b5949586d6c635778665677362f64777770415477774c4c777941316f726f6c71357136647043496e79714150515676637a746251316f72565a506c5963394b4e424930344e4568386f466b5850765763726f64726e4c2b4b2f44364e62797341724b65324b6945327047696a64487a58347073545961764d46414133647139716e4c6d567a77385454355a472f34483150374f4752687877635a3631366366687365644a616e644b4e7371736a3751666d52765130346645544c574a367434347650734e2f344131454f664d61305a6d6248494b7170485031503961764461565a496d55623047666f6c7074306c39593239776e4b54527249763049794b776d724e6d744a336769775269737a59536b4155414641425142387836647a65776764324666427757714c4f346a50466651306e614b416d44347259686a672b52576b58594277624236315944306249786e696b565965483439616469523466504136307241544b314767453863684742525943306a5a794b64674c4b4e7854417352746e474b414c5562635541573453446730457374786e4e4345536a7057695256786130576849565734376e4c2f41424e38502f384143552b42745a30725a76463362535245443355342f5846532f6461596e71666937346a747a46636863597877654b37366931757959765135363956684c774d344853756177726d5a644f30796b636d705a615a3058684877774c6c7737446975577055355565685270382b72505262505249376451716a6f4b387172567673657a434353304e6532737a446768632b31634c6b327a6f36574e5378424a414b347a5639436248513253413859705749735757737563714f4b3153455762655059777a307139514e367941386f6b636e30716c646b50557377717864574b3450705769544d7a6f62654d54784c3568492b6c544c5171397a4f316a54376161426f306c4c4848546a4e633733756252736a3576384169316f44616666724a734b376966384147765777302b5a57505078554c7135784f6a4f59726c5344383261394e4d384e6f3950733553624b4d7437632b6c617865706b316f6575612f624456394e2b48384435327070387a79657551716634437270532f657959513170744836432b426b387277646f61376934577968415a75704777594a39367a6d37734b43744247376b476f4f6762556746414251415541664d576c63366a435039724e6644306c65534c4f3056384e587651566b41384f6335363175684d6b56754d315a492f5076564959394770675044554346426f416d69665048616b42596a6270544174785030394b414c4b476d425a6a6242474b4c41576f326f734262684e466953354763344f65614c45736d55317245567832367148634e314e61426348554f68423542464a366a335078782b4e76684a76436e7848313753574243327437496963592b546353702f37354972304a6539546a4979535a3566645168593548626e5041726c62736969746f326c796172654c46474d6a7561786c4f794f696e446e5a36316f7568445437594a6a427831727871315279646b653553676f36473762577138567879567a714c3056767550417a5570574b544c74724171754377704d647a5968525641493446433059476c456953526a466233495a4f6c71436d434b75356d577251434e6741636a326f544132625562697245444e62706b744735425979794a6c506c423663305361366b70454e786f3649435849335679794e307a79333476384168644c7277394e644b6d444377503448762f4c3836337730725473794b71556f4d384674374c7962754d415a4a4e652f796e7a4c756a74784a4a436c73474856634d5065694c664d53303748752f6775774f74654a59564a6279644c306f5271572f3536794d646f502f416635567654566b33334f5a753062483643615a612f59644f7472664f664b69564d2f5159724f6535305531614b525a7144554b414367416f414b41506d5451734e71555a36375154394f4d56385651563547694f744443766569744c45746b67626d74554b3439584a4f65613053454f56386b354e4e41534b78786d71486f504464635543484b787057416c56714c415759337a696d425a6a63666c51426252736a496f4173527363673079533347356f466375524d41614c4157596e7963696977726c74546e41373153454f776130734667785259427736554d704835622f74667461617a3865646168733256516a424a355635334f4d6b2f6b43422b46647366636f70736d6d6e4f5453506e50784461766258445171647971324133514775586d544e335461646a707668376f30746e4a4a635856764a48457741535972386850706e706d76507844307445374d505a4f7a4f35754c6d4e46344934394b38717a76716576485935752f38594e6173566a34493730657a624d7056556968612f454b34743567547a6e6b3771745547795062493653772b496c706375716c777248387670554f684a462b3169646259613744636864726973584678334e597a544e327876564f4d484e56466a356b7a615334517742756c5863656846464d556b716b476830746e64512b55705a77703731584d51326b62646e3472307468354c79694a3136737a41443836577249396f6b55626e7856704c58586c704d5a6a303344377635302b535436452b31695a5078496a676e384361744c47775a5245726a2f7674614b617455526f704b5557664c31777532396a326e6e4f51612b6869323944353257353174735271577357384b384b7a4266706b347a2b744f433164794873665958374d76675758576453763957614d765a334e38705a3247423555412b584831596b666858577664696b636a3936566b66594147425742324c5951697061474a53414b414367416f412b592f44655776693351424d666a6b563864686c655a5a3153506e507458757045456974576951447732617043754c6e464e44484978786a4f42563344596c55385543755342754b51584a55626a6d674c6b385279525146797a47656159584c63625a4146495261516e4170694c4d544872564943334731444a4c554c633072735263694f514f394e444a686d74514678373078324d62786a72582f434e2b474e5331497276467443306841394237647a364431705775374365695079782b4d756d33326a2b4e496a716d52714f7051472f6e4c4167373548636b632f537436307230374c5a472b48584c4f783570347074454e6a446e47396a586d78657033316b6b6a306e346161752b6b654849346235566d74337a745567456f75652f715059316c4f5562324d6f3032316448502f4142453171477738515257326b775147475346584a5145376d4a5963444f423048474b554b636169757a534e57636447596874626873476437644a4479562b7a6f32507849704f4b54304b62624772705545704a6b46713550584e74475035437332326a4f30697650345773774336527871543251737635595038415374497962427866514c43786e73354162656559593939777133536a4e6245336c453637522f45743141336c7a59664870312f4b734a34577939303649566535326d6d654a45755556575035313537684b4c50515672626a7453316557444a525430343471306d784e6e4b616e346831795a776b456851656e412f6e585443432b3063733362595854724f2f754844336d7034483930636a2b6c644e6f725a484e76757a73394830754571766c336f6b6b48384a6b556b6e365531643942704a6453393477316c644f38423676615437743873577863644d6c685758736d35706f32707974644d2b666f4a586137456b75565548432b39657a4661486a5354556a30763463654872727848726c726132384c7a5846314b73555370314a4a41482b6661744951366b796c5a585031432b476667614434662b467254544973463055475172307a314948746b6b2f69615570585a464f4674576462754654633344496f75413270414b414367416f412b5a664459494d72646a69766b384c485735544f6953544a49723255535442754b317541344838364148627170414f56767a717241537135413961414a46626969784e69565430394b615145364e6a7052594c45386234785473425a6a66427057455849584a4e4f7746714e385572456c714f585059352b6c4f776931472f50464a717746324b5442356f51584c534e785769594a6a38315a647968726d6e7071756d79327369686b6b77437037344f63666d4b547675684d2f4e5839756a53376e53766977743655434936724843716e4b68555643503159313051744b6b30796f61537565463672494e5175725a564249774f42586c3263557a766b334f7833646a6262624b4f4d44674b4142586d4f57747a30597853526c36766f666d61687030327a356a497962762b414d332f7374644e4765364d716b45374742346c745a6f4859676e62585264534a3562497a626157654f7a61534f465864526e615153545663695a6e7a45566c34717564546c4d4173597a6a377a7170473065357a533968597a6c557362336879364d3936304c59794f635674474c496235692f3477303547304b3475646f57574861565963645741782b7462327367534f54384836317136366c47723345333259484133386765777a575571555a617348556e4661486f67533631645a627535753768624a4473574b4f516f4849366b34376471354a776a543057356446797136737a58314333303664435946434d33796b6a63667a4e4f45577a65535350532f437a57392f5a687a6273734b67627068446c567a3079514f4b33634845773530656b2b4866434e6c667a51704c59326435444a67695177716576766975576453533052584b6d6450346e2b4550682b545470477334354e4f6d43486d47544d5a502b306a5a4750706973345969664d68797070492b61622f41456579754c692b733772547264626d4465424c456e6c345a63383448484f4b39794c3054504f6c6f3748316c2b786438483174725a5047643546686472785749506671725038412b6841665531744e38736556484e38552f4a483172584d6441554146414251415541464142514238302b48754c566a36742f5156383168566f5562434e6a767a587170456b735a4a50584331514567593570674b58785670584663656a316468584a564e494c6b674e41584a59327856415745664971514a34794b614557496e796670363157674631434133422f576b42616a62316f735357596e78306f324663737876786e765151575970446b657453434c55556a487456327542615535716b556878354a3631517a34582f77434369476778797a615a71516a326d46596f415165435838316a2b507943756969766461457057646a3547384c3259757064782b625a314e656258664c6339436c377a75643762634b46786a487258697663395a6243616775477348786b4a6372754a3947566b4836754b307037736d5330754a712f687a376247654d3572524e6f53647a6b376a777463576a6c6b50422f437466615747306d69742f5a6430537968514d39654b326a4e794d5a5530614f69615562433544736d43657078585247566a4677472b4c4e54532b6544523763655a4e4e4b753952324135352f512f6857764d72584d2b5233736568654576684a5a3635704c327a4f79536c634356663457505131353071757430656c474b537353614e345a6b74764238576e584b3575594a4a6f70765a784b344e52556e7a53544d34302b527449357134384b436151525452754556737179397136495461496e4735362f344a30694b33384f4e594b514c6374766664315a73442f41666c5738716c3363356f306c466e656546326b736f6b74347a6c554f4634364430726c7151353363744b78316c387a7670463576362b524a312f335457436879744670383268386846627a7842346b67744c574e355a39516e34433957334e7776466653304958315a343961536a632f556a774c345a693848654474483057494c747362574f456c52674d7758356d2f45355034316a56664e4e736d6c704533617a4e516f414b414367416f414b414367443573305264756e786e317966314e665034575075334b5a6f4b7777613946496b6b56716f6a596b5668696d6e5942664d7966617445774a4650725769416d42347853614165477a5541537133464d43654e79414b6472675745626e725279675749786735363057466446754b514446466d467933452b657648317169585a6c68473663304d6a5a6c6d4a2b6359704a444c4b506a7052796b6c754a38396161426c794e7874417854476d544c5452716a34712f344b4665666557326836666271586e754c6858414137496a6a722f32307273772b6c7a4f313266496e674f4578573977482f7742617368556a3078586c5931616e7030646a7264775871635634625770364564526c3369347458694c4562754152314236672f67634772686f7a5671354c707669794a46574455694c5334484736546848397733543844585a62716a4e726c4c3139354e78474a4932563150526c4f52555330476d6a4f6a7441376b2f796f6932776b6b5a6669585659394774695849456d4d4976646a374374557852534d3777646f44777a76714632436279666e422f67584f63665539367a6e567637714c6a5431757a36482b477a716b36714d46575876555256305539445231665349374c785265526c417476663475596d7878356d4173692f58674e2f7749315356315a6b53657a4d6d3930464935636f6f4972534a4c314c656e70354337635941727052697a7376445342634d66587161484a496878755850482b70547234664f6d6165444a716d715a746264464f4341522b3862364263382b3471594a546c35442b464e6d4c2b796c384b4a4a7669684a716d71577a434c54495a4a4c5973506c61554f715a2f41466950777233655a527036645477617676314f552b33414d44466362647a705373464959554146414251415541464142514238346165766c3263513666494d31347548587549624c41623871374357534273436d534f5531514337686d6d674a466b774f745863435a4a435233474b6534457174527973435a50306f73424d687833706754496339366f4331475467564a4c52595275314f354b4c554d7662306f426c754b51476d5157456242704d614c5562557846714e36594675422b635a34703641576732527851576d6350385150686870336a6134687672714e5875725a543552635a414f47782b70483556616b3437426532702b632f6a6634593376776b3864587569336742382b4a62714a6c366253537048317970724c46523970446e5232307032566a4a7548324a6d7641636454303662754d694f3845486a307048535376614c4f75436f5a54314247516170536132417044777447506e74345667636447694a512f706974347a6233446c58555a506f6d704247433339326750554335664838363054534a664b632b6e682b4b31314e5a4a413038774f517a484a2f4f6c4b656d673477573532576b4c756d554e387131785736733252367834455a5575686c73497959485066497858585431304d7075783366696a5430313752346f2f5065316d5351537858455a77794f755144394f546b656c5132366372676c7a4a706e6d382f6948564c4b5177584e7646657370783530442b575748727450412f427136344f44314f61554a78324c6c6c726b30374462706c3254364b596a2f7743314b743876637966503152314f6c366c723069434f30304a4932505357387530436a334b706b316a4c6b33624772396a7576426e684b6147376d315856726f5832717648355964563278514a314b527232476570504a71465654664c4661464f476e4d7a364e38456548726651394473776b4378334269486d4d42795365546d765a767059384e4a4f546b6446556d6f55414641425141554146414251415541664e384446494931352b565150307279614b3931445a4b725a78585569475342715968323667414a3536347257494567617273424a472f4f446d67437772635541544933496f416d5676664e53424d6a4431716b674c434e5667536f324b43537a453535356f4558495a4f4f4b6c6f6c6f7452795a70456c6d462b525373506374787656434c5554344e4d5a6352383835717241574230397145556a77623971623461616234673847336d756d335674567349476147586f5651594c44334741655066696c665377344f7a50684736687a482f756d7647714b307248745532565357526756354659574f754f70703273684b6a6a44656c533062574e5332796341392b77706f646b7862346d4b42754d2b6c6133756a4e784f547372694558737a5367466732414b7a62736a5a52304a376a574937655841425830347247375963703646384e3951572f76594158776f494a4f65326133673348566b4e644433654f437875394e574e4a565a324f31517a67626d4855443171485676754369306550616e592f5a4e65764c4e7953595a6e514539774352564a365852704a485261487061376c6248464e794d476568614870353349773656445a4e6a303377686f7954333972433662316c6362312f3252796630427270773865615a7a34683873476530526f493056523041774d313754504653736831496f4b414367416f414b414367416f414b41506d386e4a7a324e6558532b464573554e697568434a51774e5575774158347070414b7079613053416c4456514467314f7745795334393664674c4b4e7750353057416b5675394b774579766b6a696d6c5943796a35464d435a57356f45546f324b42466d4b5469676c6c714b54705537434c6362394b596931464b4b414c55623830786246714b586e336f487557316e47334a3448632b6c467577484b2b4d7459384d367070563159583275615a414a454d62435738695567487277576f616b746246645438334e63736870313563323679527a4347526f2f4d6a62636a375352754237673479443731352b496a37317a314b54756a436162442f4148654b34655539474768504863376362657451307a6f334e4b7775695a564a624651786c2b3975593555324138696a6d48593472553448736270726d4a664d587570713733566934757878304f6d2f326a72556b364a4a46504b784f4d6e41796136556c5968367339792b46756a76454173386d7a726e485775657032456b7a645477784c4634724e354265337a526f32356b6d6c334b33734f426755525335577247313749324e54734a58752f744a4a5a32624c4d54795436304a574d327a732f44734759464f4f745a766379625233756870683033594356424e2b683631384f33747064566d2f65782b636b5079526b6a63515479515062474d2b3965746734364f52356d4c6c736a304f76524f414b414367416f414b414367416f414b414367443570513843764f676c796f6c6b6761746b68447733767856674c31706750483171674841354171674837716f43525770675478536254313630415749354d3041536f2b61414a5666464f774668487852596c3645795365394d525a69664830704d4757556b785259677378532f4c553741576f32394b4754716933464c5168585a786678722b4b712f43483466336d767262726533516b5333746f4862434e4b326346694f63414b547831786974616450326b31454c6e3577664644396f3378743851627955367472317a4a624534466e4135697431486f49314f50784f5437313653396e5330696a5a49386c76504646795778356a45665771574962364657505550426d762f414e732b4749764d597450426d4679657648336630494834563835696e616f32656a5336456c7a636d4f5172323961382b31395430496a62572b7a4e747157753576466d736c78355979446734724f534e436e63363446626738316e465848646b4d74314c655238436d3159647937345930627a4e5251754143446b566f705747646e6f647a4e44346a534e52694e6a733975332b46446a6458457a30794f47574d626768487278557252454e334b3939714d56764771792f4a7a3370584a4f6a384f5853794a386836566933714b7832476e586a5a4364565042623070495452346838562f696864575078504d576c583874704e704b4a46484c44495659506a4c344939324950307236334c6f4b4e4f375735347550313050722f41505a352b4e55587859384e474b3864463136795543355652675371656b67483645646a3745563159696a79506d6a737a793656572f757933505736346a724367416f414b414367416f414b41436744356e42365677516a5a41507a6974554a6f6344774b7578497561615144773250656e5941387a6a32716b684467352b7458594c6a316638412f565643757964487a525964795a47494e466775576b62336f48636c56715a4a4d726b4155413953654e7339654b435377724143676f736f32514b6b67735253375739715946794b55486f6158714a3746714e68537351664e3337642b715042384f644373464879584f6f4e4b782f3635786b41662b5250307273777139357358552f4f7a56454c753359557061746e516a4461457135794d2b6c5473576a66384236374a704e394a412f7978584848505a75332b483431775969484f726e62523373647663336e6d4e754a4f4f764665624632305057534832632b36565376667256545768736a706f4c547a3766666e6a46636a6b427858696637566258774d4241526634635a7a5852545361473739437061613971544d454d5956633973306e54544e4530645870333271635279444b4d4f6335724e30306a537832326c706533414373347a3359396169776e6271645a6f396a72646d3679573938595975344a33416a30326e69706472616b7335487864724f75323369566864754a725754486c757142636533464f4d45343647636b65742f44653845316d4e35797855456d734a6145574f683176785861654476442b6f36726479723556764758434d324e37444f3152376b34483431725367366b31464350694d654d333176784863336373706161655a70585a2b354a79545832744b504a4652506e6357377962507172396b665735597669726f58325352746c7a356b557167384d686a596b483856422b7131325356365475654e39704e48364656346250565155686851415541464142514155414641487a4944794b3431734b3475376e474b30534334384f4f5057713146754c6e6e36315168633151436875447a5259423237465541355735716b674c455a787856574a614a3162464943574f546278514a6f736873554375544b314e4645717948363078574c43535572437553704a6a705373497378767577656c4a61415872596b3936474976784555785750502f4149392f43722f68626e772b75644c674b7071647533326d79642b46387741676f543244416b5a3748423756725371716e4b3746313050797538555755756936746432567a453846784249305573546a4449366b686c493951515258565567743062725935743542764c41386a31726d642b7053646d5a6c316576464b6a6f666d5835686e74574d7454614d724d374c51664566397051717a746739474876586d7a676f79505970506e567a6f624f39554d4144786e72574d6c6f627273645a44715a466d455534493669754a78647a5a47526545586b6e497a6e3172534e346d6c68396c70717132356741506574484c516978304e744f6949456a566a332b55567a796b32614b364f6b30534b346b6c44434a386539576f4d546d6b656c61504537776f4370484865735a526479564a4d71654a2f43333972694c43664d684a716f766c464c556e30434674467453726e424861737057624a506e33396f5034736a564e514f67326c7876747265512b646a6f306e2b41354835313732416f3871397049354d5455396e477835424c627659704865786b7368507a59375637657034456e7a6e762f77437a7038587066682f346d737461687334723653425832777a6b6853575571546b6444677458645a54703276593836564e71535a397036562b334e3462756d52627a514e527468305977794a4c672f51376134486848306b64697148707668503841614a38412b4d5a5668744e6569744c6c686b5133344d422b6d572b556e32424e59537739534f7469314f4a365048496b3061764777644747565a546b45656f726e6161334c7663645347464142514155414641487a4476415046636b554a6935796130524975374657412f725453414d357172414f4464715943716141486738566f674a566b785657426b36766e464669435a487853416e6a6c783179614173544c4944306f46735449786f47546f787878514250486e6a4e4172584c4d65654b435131547842702f6872544a64513153386873624b4c3738307a62564874376e32484e4672364964745435762b4a6e376255476d7953576e684b795638444176373954796656592f5433592f77444161366f59622b646c5758552b612f482f414f30443476384147506d79616a7239374d736e2f4c4a4a5448457630524d4b507972614b705130534e553145384c3158576e6c756e6152695859354c45386d6e556d7041725365686e795871747435786e30726b6b726a735a74302b34734d6b444e59574e55756f6d6a6179644c75766d6245544875617771552b625537714d3748655765727151727163716551527a58453159362b6578312b6b6176486349427535726d6b7247305a63327874514b7235357961776372476d7070526f4e716a714b68795a534e6a5345486d6b62616b6f37767731634b733452314248723656737047546a63394a3075326a414234714a534a74596d3165376730793361575447346a414872574c6b564658506e3334302f46372f684764506b74375677756f33436e59427a35612b70397a322f50307a3034656a37575633734f704f4e4b4e2b70386433657253586c2f4a4c4a49586b6469574a4e66527233565a4869565a6531315a337668505556754c51323977676b6a63626348304e64634a6e444a6375714f34384e3261615348386955734f7750384e64536d7248504e6d37706d72624a4e6a484a7a3171755935323748517858683245357a6d6c7a4e44544f333843664844785638506e582b79646175596f522f77417530726562436658354779507836314d75576678497453747365382b442f7742754b367a4644723269775859794130396b3569624872744f51542b4972423465457668646a58326a52373934472b4f58672f7743494779505474555343386334466e6559696c4a3967546876774a726d6e516c44553055307a7671357a514b4143674435644463567a4954486a363471306d534f44443171724d42642b4469715143467566617141554d4f2f4657412f64696b41344e56494354666a365651456b636d4b596d6977736d656e576d496d5673314e674a34657446684d747869674331454f4b516d52366c7246686f566c4a65616a6477324e72474d744c4f34526631362f515562364945654d654e5032755044756a4361445162655456726c6546754a67593441665848336d2f4966577434304a5057576870796e7935385250697072766a362b61363162554875755435636633593478364b6f344838363646793031614b4a57683550713934586b7953535253632b594739544b7662306d41444a724332756f397a6d6278316b4c442b4c316f6b796b72474a4e6376627963355a616e63303349704c7735445a487257657853304b303742687542354e4a6f325446735045632b6c4f464a4c6f4f784e633836647a654d394c4861364a3475696b5550452b4748564d3179537073336a4e72593776517646695854414d784248584e637336566a726a5654334f303037556b75434d4d446b6356794f4e747a6f545231576b754938454e7a5759376e5557643074756f6345413961584d5364425a2b4e6b746b42655256487154555862437835333856666a6661364e455138717933374c2b3474686e356639707136614e43565353535133556a545632664a2f697278586465494c32347562715a705a7053575a6d4f5458306b4b4b70726c696a784b3035564a584f65734c527269584c4435632f6e5768793373642f7743483757626371494f7078576b5666593535486632634a30323063482f574f636c7331337853534f6158637257313656756335787a307a564d6e64485a324e7948673535347a54735172464f35756d544f44575452566954546235784d43574e5375784c737a7066375a6b746f777975796b6568716d32685850532f68392b306e3430384c474743323179616530516a46746566766b7836664e794239434b6c7145743061786b3066556677692f616a732f476d70526150346774344e4b31476269473469592b524b6637767a637166544a494e63383646317a557a525662626e7651494979446b5678485275664c595070584d694278634159493572574e32414275505372734175374e4d417a7a5657414161594477777a7a514135546b63315364674a41654b734352577851424f6a343655456c71493768514b39697a4874586b6e3630444f54385566476a776c3450334a63366f6c336367482f527248457a3548596b48412f4530314755746b5679733857385a2f7463616e4e7668385032554f6d78394250634154532f584833522b5272574e4a4c57544b3562486850697a346936783471752f744771616c6358736f34567035436475657748514436567370776870464259346d34314f5175337a484239617a6c55754669732b6f4e74594675445375724373633571562b504e494a787a30724a7a524469376d666433774d66503459714f5944427570647650473671766333334d3661564a57493448314e495a6c58496b696b4c49666c50616b5659704e7152527972413864794b5464783741747a4649754e776238616a51704d66457a7779626f696565347053614e4c324e33532f456c78444b7175485666377736317a79676d56476f726e6f6e682f78327351414533486f33577553644d374956443044512f48496c5168376d425376507a7941663172676c53647a746a4f364e43382b496c6e43724354564946474f516a686a2b6c5a2b77624735704848654a2f69723545624c70387a533866363835474437412f77413637364f4776717a6c71566f7057523435712b747a5839784a4e4a49306a6b3533453137564f4b6a7365584f6f323957557265384d7a6e614e7a48765731376d53624f6b3053316c6d5a53352b57737045795a3650346673566a5a5352303572616c4673357079756a59314f626245666d3639425865394563336f632f466437626b6658725765725a705a324f2b304f3456725946733449725535704e334b47717a65584d65654161796b2b35764855585472734f6367385a7145784f794c3933716536456f5735484e456e6f5462714c6f477046726749577a6b314564536d6a72704e59613131434844453944577348793741313770363334622f6150386265443751572b6e61735a37586141734638676d574d64747050492b6d635535526850644247545350596c4e65416b6459344846617041475456674f7a7854415464544663554e785657474c754862705259427974787a516b424944787a30716b424b6e4a4655425951452f345541635a38566669355a2f43335462646e674635714e30473869334c6256436a4757593963633434366e4e615167356b323173664d666a623433654976476f644c6d2f614f3050533074695934683951443833346b31756f7867744453316a7a7158566d6c5967755237436f356e6370334b6b6c30635a4a7a55743346715a7431636251574a50745536435a6b7a585757507a553745616c53347643734a62494c4469706568535a7a6c2f6545793965656c5a74437532564a4a77335538394d3144304e464570584471774942495072516d576c59796268666d4c4b6374375653656f726f6f795875306b4d4d2b3570737263686b676a75734e302f725763674b55316d304567614d644f6f37552b67376c745a6a4e6146312b53524f6f465337434b4c583077624b7361686f6d354d75717977783767783366577063536c4a6f6c73395a6d4734752b526e504a714f524854477449337243394d2f47384c6b63552b524d62714d3146685932374257335a484b745854424a484e4b546b5a41307435636f773235505775677a304e4c544e45454c4a30436970656737726f6448596f74744b59347a76592b677a697035584a3647637a74394a38794b4c63777a78586f3034714b4f4b576f616c636559754f3161734563347372433949795341656c59733357717364376f45325942795436413161324f576173526133494e784a347857636a5345724972364c4e687941654d566e477a334c2b494e57752f496c42424f66536f71464b4976682f55676c386e5038565a556e72596d567a71395476636178474e33474152585372454e653563366237516649684a366263437062314d6f4e6f2b7641667a72797248654c6e4e4e414c6d7143775a716857416e4e4d4c43377141734a6d6e594c4477614c444a347a6b6330774c4d59365651454f733635592b47744a75645331476357396e627275647a31396742334a504146556b3237494e6a345a2b4e2f78546b2b4a58697462345169317462654c374e627871535473444d325750636b7432343656364368374f4675724955627535776b46336a417a584b3262456331304479514b6a55437339364d5a7a2b464678584d6a5574534f776857363856616944324d7037334135504236696f65354770444c63677031344e514f4b314d61366366694f395332624c516f47342b3936696f754e6b44534538394d3961474971585949497765443370616a73555a6c535848474757714574444e6e6b6b4859714165767255617365355a6875664f56686a70307a52594c4434312b7a76754f43726a423570574c555662557a62753345546c4634485556506f54596746724e494f4779673471726f4c467530306b6c73755351447744533059315a4731426f5573366c34354758484977613155417557624558646e62334d737378614f4c674164796170527349725165494c7136634a48416335786d71315a4c5230656b616466366977387955786f656f5771554c6b75794f3630765355735542786b6a2b49313351676b6a6e6c4a6d326b75794d6a4855657462704a6d656c696c4f32565063314c52435a6978715776536338317953646d62493762516e4b52444a39754b365531597871436131304c5a35394b6965694842476259544343517344387837567a4a6d6a3047613163435942675347364773357651714f70513071364d4e796a45353535785745486152566a736461754e747a59584734346b51444a48702f7744727272756c754b4f734c4d36373757483079326b7a67486a4e5861357a4c632b7a56626e31727945646735584f4478566f423261704141595a504e4d4144557741505259414438303741534c6d6d425a683655774a5a727547777470626d346c5343336851764a4c49634b69675a4a4a394b4e3967506b6a34392f4764664846386c6a703750486f396f54356174775a6e37794566546744734d2b7465684350736f336537424b3534427156324e7848632b6c533558422b5256673144644765784277616c495331456c767477394b556f39696a506e76794152315051316e5a6f44487562316e62615365744e76516469704a63426d77542b486573376a51736b345345416a41393668736f796275557578326a49626f545364792b585170527a4b54686d4937635644314d3774614d6375776b386b7232356f4b525575546745592f4369344e6f6f2b5975346e763036305846635978444462303436314a53506f44344b6644445434644f68316a5672534f367537685138455579426c695139446738626a3139686976507847495550645450537739432f764d394238592f4254773534337353713230656c58774837753773347768422f32314741772f58304e637450457954386a6f6e52556b6544366c2b7a76347354565a625157634c4e47755575544c74696d476634435231396a6a486576576a4f456c6535774f6c4b39724846363334473133776c632b5471326d54324933454b374c6c48502b79342b552f676131355661365a6d3474614d726e54372b33743175354c4f346974584f466e6546676a4832596a427052562b70466b612b6858425a6e33355934342b7464556472474c57704f496674756c587679386958474d6653725348635454624f47325562735a3638554f7945376e613643597055776e4172656d30595462527576384175554b354248555630727a4d4c33474c494a443664716567335a43537146556a7451376f6e715954664c65636a324754584850566d2f545137505169766b6a6e384b32684c53786d31636b317064342f5872546c714a4b32686a784d6f634167716657756671616f69314e41454f44675936316e55576c304e4744444f595a5142787a584b74476161486136726565646f46704d4275654f514c783242422f77466274334f654f6a614f733053372b31364c4342315539505469746d3945594c526e3234726b44363135746a74484279426a50464f7744672b4150616d6b4b343366676e746d7273467738302f584e4667754b474a3655786a3066504a6f416e6a4a7067573465777032412b572f3268666a51646575706442306d662f69565737346c6c513858456750582f414851656e7231394b39436c5335467a793344632b633776556a4b37456b6b6a7161715435686d56647a62314f4f63566a62556d7869747142536431504f6653706261476d45393774414179523630755a6c4f35526c756d79636e673149342b5a6d54336733484236646a5573485a6a466e777759383536594e4a3253476b537979686f67546e3342724a6268637a5a354278673446614d726d75565755626a6759724a37686134346b45597a676454554347734177493644326f4b4b45714b5a79464a596d6b32497332756c5333424a6a696b6b566575784332507971626c78567a36682b4876694f4c554e44737a6b4b30635378737654617967416a48345634574a70754d726e306c4b4b6345306568324f714c67644b35453743614e36316c687530437667716565613761637a475562466256644e6e6a674c52715a6f68796476556655663172725462324d724a765572365063517a7159334f355736712f494939785335705265706f365562486c33784e2f5a3157627a395938494973637047365853787772657069394433326e38505376536f3468533932523574576931716a7754526f4a4c6150566f4c6c575751636c474743434d35347276563063584c71596c316674477877655478696f6b374435547066435770736a6f4332514f434b756e4a4a6d636c6651376557356a6b69335a347275356b30633756694f322b5939634436316d7478574c6479726555514d6b3436317339566367785a625968786b3548586d755753314e49396a70394366616842354a707858596956793371455a454f6676652f70576a54484855784855676a484a726e62737a546f5258456d59434d627672555364304b2f59357534634a4b4f6f4765636d75573652727564626f6430627651727932484a32376744337763316f7459334d34783935334f6938466167457333526d36656c613778526e4f4f75683935413472695273325042474b596832374e4d4275366e59424d307968794d53635a7851424c47434d55774c6b6135706765502f74432f46706643756c50346630325944564c754d2f614a46504d455a483366393576304831466456436e7a506d6c736774632b50645676326c4a4f6631726f633278704e484d586c3535546b6e4f546d7062417079616b57546c2f7741425754592b6868586c7a7475315a636b5a714c6a56695a35734b435344554e687156726936326a4a474b64674d7161364d68595550594230444677434430724e6a314a586d4b672f4d4748745351696e4b32574f5079725455434d7377475478366d6c6f566351796c514d633537314c69747939794f53546b59503469737241574e463073367a724e6e5a786b683535416d2f3841756a7566797a5553664b726c78687a7578396d2b4437577830625337657a744956743752467773612f77417a366b397a337277617461584e6535376b4d504743324a764548676144556e4e39596b5739396a4a494f466c396a2f6a546a50326e75794b556e423257787a45476f79574e77626535566f70564f4756686a465a546f754f714f6c576c716a70394e31556f5639445755485a673449362f544c2f63464f374b6e765866426e4e4f4250656548376655574d384a3869347a6e656f34592b34372f5774336157356b704f47784c594734737633567a4877654249764b6d70556262436b31493450346966427530385a58736d7161656b64707242584576474575522f74656a66375866763631364643753137737a677130723748787a3471385058766872566271773147316b74727542796b6b626a42422f7150636347753258633537454f695867686c556734724e584d6d72733653505779364d706650627258584757686d344768703273593271546b725671534d5a527362696175726f46592f6a566337526d6b79546646503062486f61584e6370614770706a474d63444a486631707864684d324a534c6933327165656c5875434f5975524c625841445a49394b776b7453304568456b523963564d6c6f4a4b3270792b70776e7a7951633831353752757047373451757a4864474a734258473031554737574d354c564d7661624d746c655855494f417248484e614b62526c5562766f666f77442b5872574e6a594132545645324846765367424d38307773473430783669727a514d7451676e36554375595078483866576e7736384b334770547372584c5a6a7449542f79306c78782b41366e32487657314b4471537367333250677678523473757462314b35764c325a3537695a326b6432354a4a4f6331364d6d6f726c513170756331507142626a504e63747933715a642f4c35694841714a5337454c546335326539434d564753395a6c70334d793775764e6e517141704a7041587a4c756a4a5a766d3942545174536a4a4f57556a697147726c4a7a6838446b314d72476a5679335a6b736f3577765449724e45424a6b62754b61656f694a686b6a484f653961746f57344f426b5a3450666d6f4b315241366c6e36486a7653624b49706d4362756734716241532b45664559306a7852593344726d4b4f583577427a7450422f6e58505669334670485651616a4e4e6e3170706d724b7345625273476a594171775055486f612b656e473731506f4975364f75306a58416471357950725572514847355071384e6c7161713073534f36394749352b6e3072645658737a4c6b61324b45646b6759424141506274576153755664395459734c5a347867456c6574644369446b6442706477384c6857352b7462484f326d64464545755577514344566f79614c56747061786e4936477445376d5475655166744a2f42622f684e6644376135706b5737574c434c353431484e78434d6b6a2f65587150555a48595633554a72345a6454435554346c4e6c4c617a73647055644f4f31645849346e4b3758464e32794d4e325154787a5331496439692f59586271646f3439614c6b755063327938706a58416334364531533570624762516c6c71456c744b4e32534d2f4e54616e4864416b6d647a6f3933396f5562654e777a7a57304a3349614c67314c37484e682b464a725335456f36453979715861475257423436436f62516f71326a4d6f626c4a566c786756672b357131324d48574967636b645432726a6c6f556b4a6f55786a756b5a75716e6e46454c52593371644e71454b78616938694443796f4736643671563761437372483649353470456f4e776f754d5574547346677a5441584f615945696330434c496b5333686557566c696a52537a4f78774641475353614c4d523856664844346d796550504646784a43352f7332337a4461526e2b356e6c767178352f496471396145505a51383255704b316a78665570537a5a33597a32726e6b37673359786d7679726b4563657459745847694b3575504d624f654b5668575a7a2b744e73546667416a306f73576b63394a71437954526e4a417155576133327064696a6e316f51624665356d41586a67316f6749466c4b6b664e7a6d706c613437334e533342566542783731685a3346596775704e6a4d54305051567048516a6c495575563341594f4f356f656f577357496772485072363153525352457a72457a45384832704e444d5456623335795132434b6d7762487166374e766844544e663143393158564955753437566c6967696d415a6435475378423634474d66552b316566694b72677249394c44556c55315a37397265672f5956382b776a4451645443763841443950384b3874535539397a31457558517a4e4e315942672b666c485564445579686f61785a306c6a71533359424463653963363931366d7a6a6f61676b4362534772716a59356d6d61316e714156526b674774626d625270513333546756535a6b306a58302f5547474f667a70334659364732314137527a576b575a79526a2b4c50694c5a6545724c7a72723535477949345549334f6638506575716e4631485a47647535354c592b442f4149636647532f2b78334f6c782b46645875582f414864395a7966753259396d55385a7a37443669767061536b6f612b386a794b306f30322b55354c785a2b773134773076564a6f59626e545873687a4865547a2b576a44366373443759724f564f6a4b504d6d2f513534317275316a423072396e7252644375572f345376787870396b6b665748542f3373682f45382f77446a70726a35716358657a5a3057715330535051644438542f424c774c61624c62777864654d4c364e766c7564556d7847662b415a786a2f674664554b39546c744330522f565a4e2b2f4d6738582b4c725034782f4450785462324f68324f6c79364a35576f57647459523746574d45724c2b53746e74574c6937715464376a35495535636b65703452345a76336a6b434d654363636e7057616c7975786c4f4e6e59364858454451423838343669726e74636a596f364c7242544d546e4b673838316970584a617673624a5153457350756e306f614a586d6339726c755558636f4a353656684a584e6b7a49302b627972674e6b386e7057625669624e486f6b614c64574e732b417843344a7253393043305076334a3961793143346f4a376d71524c314862736a727a564657473769534d5656686b716e4e46674a34686e745657437834542b306a3858597243776d384c36624d47754a41426653496675447235656658706e387657757968537637306753567a35477564586153647954314a7135314e624d4774544d3143634d6d54676e6f4b7762366a534f64767044626e504a4236597155796b69474455673646574259397a36557972464c55357430444b526e746e48616b7862484772634347373267634139505773626a75624d747744454d416739364c6779716231544946595a4236477445777554325938795657436b43706b786d73725a5447374f4b4932476972634f4376427752326f6273497178335565634567447543617a31485974783365303547414d5653624c304b6c3163685351754d6e706b30376b4e57647a6e626f6c33626351526e67306d7775656f2f417678594e47754a72426e324a492f6d4b50664744586d596d446c716572684b69696d6a365a306e5856754956563279443372794a7861656836396c4a584d7258744f6a57344d31743875523834485131634a747130684a574d5454645a62543767787554744a7744546c47364e564c6f64564271706c326c47353769703230457a6230322f774237444f446d71356a6e6b6a65676d32395457747a426c2b4336326b59616e63646958552f464d4f6936664e645855766c51784b574a7a79665965396252314679335a38302b4c2f48567a346d316953366d63674534535050434c324172324b4b554e6a79363954586c5778426f327647337567517a4b6655477651703133485938795375376e302f384a2f6a396258756c6a7778343148396f364c4f766c4c6454664d38507075505571446a423672394f4b365a51556c37536e6f7a4e783175747a352f2f41476b6668504c38506646766d57387a58656a33704d316e6339517945384450714f4b79616a566a7a4c526e664371327454794b4e48424a4c6e6d754a7437436c4f35374a2b7a66714545486a7550544c7473324f723273326e7a7133526c6463676655736f483431305139366c4a6474546b6c4a71615a3578726d69542b4766453137595471556b743533695a636431596a2b6c59796a64334e716a4f695543373030676a4a417a564e33566a47397a6a4c6951324e316b5a4a4a36567a76526d715230326a366d4a6f7770497765314f2f526d556c5a6b6d72576a4e626c676344722b465130434f585565524f5378474d2b6c59747068716a30507772644353774950504f514b7045536b30666665374a71433741446e4e6149465955453539615a51716b2b74554973786a4942706f4469506a4a38512f38416858336847535743514a7164325444612b7138664d2b50596671525852537038387649443469317a555876326c6c65526e6469537a4f535354366b3131546e3051574f4d314279435376473330726b6c71376a526e4c7157343462505848506570614774434b356b457362593542376e745670637052683352466c4c757a6c44536c49306230495a37767a6f53415166553570655a444f5464322f74444f4f2b6343736d4d757a5842473047546e48556a464e494c454b4d6b736f5541622b7550576d77624e2b786a4d5551776f36354e5342596156497752304a3756567776596f334d6d3953447966723071755853354364337159307478746c7a79423035725059305a5a6536444b4e76444564442f4f6c635256655a78754c637230703645334b637968686e4a7a36446d6f5a51756d33317a70392f424c41474d775962414f705054465a79315270546b3479756a367230432f7672477a672b33784747526c4162484b3537383135565343756651776d374b35307133706d674a445a42726d63545a4f3568334553537a6e6a445a37316f674e4b79426a775354774d5570464b567444617372337935507663483172473974787655366d3076424a457042423435713149356e48556b6e3144374d68636e6756664d68705830504766697038516d3153362f733242383238527935422b3833702b46656c686f61637a4f5845314f526371505046766551527a586671654b39574d5739654f516b636477617461624547356f336957573359626e7a7a774b336a556358636c6e716c3938546262785a384c3576433271516d616542316d30363759354e757749334966396b6a4e62536b6d314f507a496a75655079614c4e41325847634837793944584f3171564c51322f434e2f4a6f6d74576c374267543230795478352f764b775966714b3638505a7a732b706b39543066397048514942347769317130584e7272467046656f34365a4b3450346e476678714a77355531324e2f696a7a486e4f6a3341775938386444584c63784d3378527059413831415344317857556c314e4975357a2b6e585a676c7753526739367a75376730647459336b642f614d43323434774f316258566a4e747259352f556266797067414f4f7561354a524c567a6f2f43392f35556249547a6a4e4359575450304d4c633030514f5676797177484b63553942324a59774d31576779723468385236663453306962557453754674376149647a387a74325652334a2f7a78564b4c6b374970616e784a385950696e63655050454d31354c2b36746f2f33647662673532494f3266553953662f414b3165696d7163655662696130504d626a5578734a446665726d6b376a676a48764c6e63534d67344f616770717a755a46396b786b67416a74375537434b63656f47414d72727555565464696f3276635a4e4b6c325163375636344a724757724b646d5a6c34686a584b4b4e703643713145315935655754463034417a7a575445537a54377359794f33576934616d726f316d7276356a6a383670735a73435259302b555956546a6970515873567062674b526739653536566f6b4c6d7675554a4a32584a77754477546d68746f52556b5865567763456a6d733979726c647753426c2f6d4846495968684a4337696565314461524e67654d45685536447657593068326d796e54395a744a35414753475a58497a6e4f43445762527048346a3639384e6549744e38566151757771323965523647764b6d37537366524c33316446595276706433354279304c4835577075306b5646637062754c5554674f6e577054735663687472703443566b5449395252754b35655352584755626d733267755874503164342f6c4c5941375557734c646d46385276486f306a545442452b32366d4746412f6858757872536e46795a4d354b6d7273384d6d76424b3559746b357a6b6e72587377646c593853636e4a334574627371357a6c732f6c57317a6e75576b78506b386e32713052754e4c4e4766765934365a7a51324a6f314c432b5a4f514151446e6b3058374547785a36717a4e7951777a3371755947614564692b70616a46396a4b6f635a49396133706646644532567454315434714c50642f42587756657971664d735a4c69776b596a3342515a2f7742314b3378457665625855716c617a5350454c4b2b327a4444455a394b38336d49355732626f6e5339674d5a493448577155723642737a693966303832387a4f6a4e7761776e63752b6c795851395738686c4734354855657454476f53376e565343472f67334c39377269687536424d72615954424c494d415a724f3169726f2f52774e6d72526b50553856614b512b507231796165685246712b73576e682f53727255722b5a594c5332517953534e32413744314a3641566156335a43506a4c34766646363538653633492b356f6450684a57327438384b767166566a3350346471373144326173747a524c6c523433716c3735687944786e46594f375a4e395445754c746c594471767236554972586f56353539773344504935787a5365673758334b2f32685343767231426f62754c596f334d4b535a436e6764633043573568335530746e4e73584258307855575a6f794e64534d6d566b584b34362b6c436c62636777376a48326737635936566e4b77376c7542554571672f6478795736436b674e5733314b4a5753455947427751657446796273767a7937553667413961307344566a506c6150617a644e764744307033734a46475667774f47474f76417162334c524735624f567a3077416154515745324f7047654354697047533752386f4236647a304e4a323667536c796d414642593936543043397a4f6d2b2b7848385836564459376e592f442f78314a345a766c696152764a506335774b355a303039543163505874377250646b3858572b7151784d4758646975546c7365687a6f7657757471507666543271484669353079774c32473566355267314e7244357269516c34354d3577765832704d6479767248694732306d326c754a5351454862756651564f72646b527a5750444e6438527a3674716331314d5164353439683246656e547032504d7231584a6c434c55317a75474354304664534f506d52594535444e7466484833665771324579574337495544425838635670637856376c6862764c63676e50656d325537453658686962726764393361705331494e4f7975734d7274304134507256324530397a7276434d6a51584832686a6774794f65677272702b36694a625750517452764a764558685639466c6e5957625369634a6e67534145427365754352546e372b354e4f5849654c366e6154364271543238716a4b6b674850336832727a354b7a73644637366f6b7472357967626f4d3868654b69396958472b7066756f5266776473342f4f6d32547363684e356c724f5642326a50476177635331467333394d314c596755484f4f657458466b4e4b4f7072785843466932427a36476c646d61647a3946386b59787a5354754d6d6a4f514b305767495757366a73344a4a7057325249437a4e6a4f414f703471726c72566e79312b305438593476467951614c6f306b71366262755a4a7047585a353867366364647138396570505467563647485353636e75456f754c31506e432b765357624f576365744b636e63643944466e314137535175426e6d73393957467a4d6d314153456c574b6b5562476e5159743472746a2b4c464331447a4b3868594575562b5564546d7265773251745076556b44696f6578445253764373694d537634306246704e6d44634a31497a77656c597931473055544c2b2f7a6a5031724f354a626b7555574841586b6a7253765945564c6552765055676b485057684f37485933764f4d73574834474f6f72556d78585a7770326e4a497766616d4c59556c6e4f34642b776f7356596b6a5659334149794254617369486f4c63655847696c7334626b5561443149794542524e3263664d654f745133714b347957353562504150483070324b4b4c734644454e752f44465976635a43353442445a5072554e47694f6f3848654c5a724f366973704e306b556a4251633872574c6863374b56523335576530366135753431596b6734726e61737a714e697a4c527479632b6c5134334e49747259305a4a696b4a59357833465a754b4e65625335342f3851764652753730326162684646796663317453677432637461705a574f466c31446376663861377232504c6248655a6944636e435a3739525454597245396e63486556664c4d4d484a71307535445270573977585a6a6a4942364772756756307830747874516b5a4876365644656f53477065747655415a4239614f61776b6a66303235575879315a666c7a32713453754e7532683374697978776f557a7437437535534f576273644661587869326254676a6f5061714d327271374d6678643463754e576c5739516f5556506d556e6e465a7a6a665936614c584c716368465a6c41634d535053754755645462516d575234354d4b53564137314674444361735a4771786b735758355361587158427472517a6265364d636742596c75395a61334c53557444714c4b3444786a48484870563647556f704d2f2f32513d3d, 1, 1, 11007);
INSERT INTO `personal` (`id_personal`, `nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_genero`, `fecha_nacimiento`, `fecha_contratacion`, `RFC`, `CURP`, `imagen_perfil`, `id_usuario`, `id_sucursal`, `id_ciudad`) VALUES
(3, 'Miguel', '', 'Escamilla', 'Elias', 2, '2002-09-14', '2023-05-04', 'EAEM020914441', 'EAEM020914HGTSLGA1', 0x646174613a696d6167652f6a7065673b6261736536342c2f396a2f34414151536b5a4a5267414241514141415141424141442f3467485953554e445831425354305a4a544555414151454141414849414141414141517741414274626e5279556b64434946685a576941414141414141414141414141414141426859334e77414141414141414141414141414141414141414141414141414141414141414141414141415141413974594141514141414144544c5141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141416c6b5a584e6a41414141384141414143527957466c6141414142464141414142526e57466c61414141424b4141414142526957466c614141414250414141414252336448423041414142554141414142527956464a44414141425a4141414143686e56464a44414141425a4141414143686956464a44414141425a4141414143686a63484a30414141426a414141414478746248566a4141414141414141414145414141414d5a57355655774141414167414141416341484d415567424841454a5957566f6741414141414141416236494141446a31414141446b46685a5769414141414141414142696d5141417434554141426a6157466c6149414141414141414143536741414150684141417473395957566f6741414141414141413974594141514141414144544c584268636d45414141414141415141414141435a6d594141504b6e4141414e5751414145394141414170624141414141414141414142746248566a4141414141414141414145414141414d5a5735565577414141434141414141634145634162774276414763416241426c414341415351427541474d414c674167414449414d4141784144622f3277424441414d4341674d4341674d4441774d4541774d45425167464251514542516f484277594944416f4d4441734b4377734e44684951445134524467734c4542595145524d55465255564441385847425955474249554652542f3277424441514d454241554542516b4642516b554451734e464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642542f7741415243414566415634444153494141684542417845422f38514148514141415155424151454241414141414141414141414142514d45426763494167454a41502f45414567514141454441774d4342414d4642515548416755464141454341775141425245474569457851516354555745696359454946444b526f52556a51724842556d4a79677445574a444f536f724c77346645585131526a776c4e7a6f3750442f3851414777454141674d424151454141414141414141414141414141674d42424155414277622f78414177455141434167454541514d4442414147417741414141414241674152417751534954464242524e5246434a68426a4a786b52556a6761477877554c5234662f61414177444151414345514d52414438412b70777232767748485446666a56494348504d416976534b2f4156796f6a474d3059346e54687a424f4b5a4f494142566a417a33703855664278672f4f6d7a72666276514d62376a6c496a516a734477427a6a70534b6b6b676b634870546c355a614253546b6e3070736f6e486f66576b2f6d4d7677496b344d416e7436303257415343656f3434375537587a6b4538303149504f65636436457866507a45466a615353632f7053532b52394b57574f63593578534c6967414f6566536c317a4a3569424a505867562b55536b4657632f53764850785978384e4e35306b5249713346396867445055314733784a36456a6d7439584d3662746a6a6863434869676e49414b6b6a6f434165704a3641316876785538534839515846786c4b7769497a6b49536e4f4663444b69543171596661543855334a6c336574635a2f65343270534864692f685351634b4838303439416637565a306d796c754957567559526a4a397a5769696532746e73797362633847493343554134736e6c4a37353630416b6c54726d383549485432705a79534a4b79565a4352334e4d3569314f444b66675a4874676d6f49726d4d354e434a507a33417453477a38522f694970756c6865344b4b38412f694872583555684979556a424856527073374f63635874336263644644765142654f4a4c4c5a7364776b4468473147455a395479615a75764a5173704b5372746d6d367047785a5344356e487a704a365170304465346c412f57676451315833494259524a39524163786a4f65334e4a353270425153465935474f39497553554d4f4b4b6371487253446b77627773484765744552774a774a4e686f344331475475786a642b4a564c2b6546344a7a7830356f6348386b6b4b362b6c4a4755746c5842362b74444f424e776f32393561314447426e6e4e644f7542374254384f427a6a765450373868316b453443696574657057704f546e676471416552434a4a576a48544531316c5a556a414a34506334715436666a6d616c49573868424f65534f4255505a506d48493645354f4b6b6471644c63586667676b347a5862746f3667714279593857314a6a795367674570556565315756345a616d58476d742b5776433034326e305543436b2f6d4b727836357275696b7475724f784877685841346f6c4664526248325652584144754250504f6161706f55594c646354364f6150314b31663748466b4e6b65577047354f527a7a3148304a492b6c475858634b47446b6e746a725762764137587133323157594c786c515779414d3745713563566e6f416e41507a56562f326d5569364d7453326a755a576e4450586c49343359507163343973566e5a45327352346c6e477849356a6d656f68685754685047616a73735a574146634472556875412f634b33634531484a504b6878575a6d4e6d61654439706a5a784854484e4973704a64534436307137676a30493954584c4a3353555a48476172315a6c6739536153644e776231455239386a4a66533338534e325469732b617a51714a4b6c4d6741655774536344747a576e49434e72434d632f435072576666463232474a71576267454230656150722f774347726e51715673524a7347556e6658437a4d624f446a47666e51686a576c77436c655332684a4277464b546b342b74485a37486e3356704b75426a72512b526145322b5573747437677335786d72474e51514e306e4b752f6747666c6549567a4d64535332326c51364c32354e42313332526570537955424a514f5342314e505a6c76646362775570516c58475161546857314d4a6e484f3558556e76544156552f614973495648632b76413572386343764f52303572776a6a6d74674b5a6a54306d755659786b63313466773856356b4a34373537305a366b314f4e357a774279654b5257345373416e675632346f68584a4f63553263574172494a4a50616b4d5159514d5466497956446b644f6c4e566e656b4b4761576577515645664d55333359794f6e387157654a4d384b75353446496e4a4935775053756e4841634a787a6e6e464a4b586b4831705a467a756535366f705563436d3667422b494375314b474152783630696f626a676e496f4f6f51356e4b3141353478373157766a5072357251656a376a6456715356734a434755453872655543454a782b7039736d72486b4c43576c456e47426e4e59672b3172346770753272574c413234524374704c7a363933436e564a41786a2b366b5948756f315a777276656a314635474946435a7631426370457134505079486c4c64655758467256334a366d674e787567562b3742477739713876743445795974306a616c5279414477505156486e46656135755078484f635a71367873334671745542437a54356b4c4367436c705050547254656463513873744d6a635236385577666e4c536c5341536b6567365532544e444b4d4a344a36715055307345434741504d637943576d67584d46665449706f382b66784b2f41423961352f614f395a57456c574f6750536d547a36336c7147304450384f4b6a71345146696676326e6c5a536a417878383661534a6132314571586b6b38436e544e764c684a4363713769755a6c72556c476366462f4b6b457877532b594f636c4b7a797272325061755370616c44494e63536f7932466a494a554f4478586d3561426c4a3644303631305751626e377a4368594f53426e6e4270667a6c50704b4644636e5034753470716737747954385366583372704b5358434571782f654861704850554862584d644d4c492b4847354947516355723532526b7139735577447272653734687446666b5345714a433845396836567746643979534b504d4d783351705357305a48417a55672b38705a6153326c594253426d6f6a426c687077715679414b6674545576464a5679547941442b6c417773696343564679514964796e435641353936634252595768616c6e3346416f307770644a49357a7854392b364b56744a415632786a70556b6331444666457544776f7637386938735736476c317954634439327768654d704f43552b773479665947742b3666742f374f744d5a7061397a6955424f514d4470774d6577342b6c664f627751754a744f716f4678514370316835437765774737422f4d48483172365357354b5678553938446a492f4b71326f346f776b6f45694e3769646a52425439616a63735a63353664716b3978436a484f636b696f32367734382f7361615534736a384b41542f414372477932544e62542f746f52673767344f4f6c666f353353455948385854317043367a493973542f764c715753422b4658346a39427a546a777976396d314e72574441616d486343584d67416771543851546e4f4d385570415759436167304f6f4f4a736d776741584c726857434e466a732f655a4c6a4475304b55303631732b59427a576476487957323566524d516a796f373753464e6f4a47556a474d4833344a2b74613431526149393774424b6c454c325a5134446a4761792f346f654638693752485936487930744a4a51736a49482f705638342f496e7a2b6d7a674d64307a624a5566764f39417955394d656c4d726c4e55344f556b6e474f4b58753971756d6b357934397859556c734b4b5553414d6f56386a51715863456b44484b536574527459476a4c344b7479496d6c65355133357a5568303570325a714b55343348613878534562696b7143654d676454383669346d4a786c536869756d7452765258634d4b5742742f677a6d6e346c42634178475777706f7a3637377470726c626736476b504f4a494250586e46666c76626878317832726375356b4244467830486f4b536479446c573035506674584955526e4a36317934346c597a366471427a4a71707958546b707a7761614f484b79635978585470414f64326651306774597056664d67314f4672796f35503555677337636338556f70525343615363644254782b564c4a6e524e53776b6d6b6c4b336e6b312b576f6763396134427a30422b64527a49426e42566a6a32704a6268504866464b4f45717a7a7a544e613146583463596f4349566d4d4e535849514c4e4a66794e7947796f62756d63635a3973347a375a7235662b4c756f55584c554d357844696e664f635574616c3953632f7743674666534c78556465526f44554c375a49553162704b67456a6e2f684b503838563870745479584a457831616a6c533146527a37316530366b4b5445505249456a307478536e73456a61663070427833594354334846657572425630776f65744e2f6a6356673449484970684d36764d62754f4b33487156483036556d366e435356714b694f6e745269412b7842334f4c327156676a61426b554d6e4c532f492b41376563304645636d4674754a4d706364556b4a42786e74556c744e674c357970415554304e4a324f416c306a4a7766657242744e754c4c4841423571766b61757070616645704d6a4a3079426a41476662696d3573494a503774524a4e5470625357787a676d6d62694153557047446d71624f664530426958346b466d616453376b347942336f513770734b4243415467393673685563636a41487278545a6476412b494a4761574d6a4363644f72654a574d7577754d4a4b5570362b6c434a554e635251436952673961754a3233496561334b546b6a7078554f3148594374776c4b6348486270567063776c584c70396f346b4353464f7256685050714b365532577944674848636574534e76547a71474e323347523961625472497044593270474f7566576d48494a56396f31666d42504d327043516b5a427a7961634e53634b35362f4c705842686c7461675535393654576f4d676c5148703037565063515649454d73766e627579546b6436664e757138744f526b45396143524a4932444849484754524437324670536764523655512b3775525653356642794156334e6f6e61454f754d703435555033673766496e394b2b6c4672677554586f38526c4257367451516a48382f6c334e664e6e774163442b716f6a546d4341504d397745715353666f4d6d766f78345061746b335a362b616b61515532694752466151427976346774785835425048763756587a6a6b43507859575a58792b466c735762777a687830686479496d75357a3559794768394f2f77426550616f52396f694f592b685835466a6d66647056734a65584759567453746f634f49774f4f414d34396a55327465706e4a4f73703046546d5542732b5437347766355a72504d792b5370482b30554635315330504f50626b714f51417249503836573671566f4364704d375938793550677a4f39397562637261387a6842635677414d684b7570476157384f4e544f3250566473754b563556486b4a5772622f4142444f4350794e516d646366754b465233466243726e41363775687065304f716a4e4e7151562b5742774f756672576350747956506345487659747048596e31423039646d35554d49556f4c53526c4150517049794b6a2b72624b303853575067556f5a77726f6168506866715264313050594a3457517063644b4f656f4b636f352f35616848697234786170303171304d4f495961746e4b6f2b57515134674871566463394d6a746d72595732376e687a3664686d644234677258656e497a737032444d626258357953646877632f7744747856416173384835305751484c5435693253655756454448794a7878566c2b4d657276396f3948786454573978556554456b4274784b46666779426e6e767a732f4f712b506a444c656269757263336f414353534d3539632b396333514d763439506b396f5a5650482f634451504361617370564f6b4273486c5357786b2f6e2f774339536d7a364569325971557767754f7147464c63495563656e745132382b4c72307839714c62494b6650652b4546655479657741705756645a746e6262626b7671564c574e37704234423942375544485a7a494f444b79376e366e30715543446e4f666176456c654267386568726c787a6172412f443836354c705047534b334a51714b68346a7030374775464c7963476b3936516e4a3450547230726a66732b4963676a72516e6e694b50504d39645078453549785344787a6e4250307277754168527a7837306d7065426b39715762455850485662756338436b56484a36635636705850464a3773446e696b7768633550776e424f666e584331376542786e30723162695467644361516357536b67413471444f6e6a7173705633397151576f6d756c4b326f497046524a50703631454c7a4974346e796b5276442f55626a70415a627430686268395147315a5439656e31723553616a5156507177536532523756394c2f744e504f78764266556e6c4c326c7844545752364b65526e394d6a36313879372f4b54357a7577352b4c6a484e6147446a475445505a6170475a4b334e7841786e7637553357376c41436658745264476e4a6b794b5a5151536b354f4231494874517a616947377464535172734451335a687368555752484e747437613168626a6d46486f6b49794b355862584679314a4978673845436e6b46447a2b41797641567752557374476a33334e72716c4538354f3668646742554c477245673145394d576851566e42424136314d6d6b426c414277434b637762616d4b336a41794f4f445835396f357955676567716737453869624f496265497866436c636b594270692b6f416b41483530396b37676b41395251315a55463765687175576c31667a4f6a74497a3039612f4b4741517247635677306b3579526e324e644f4b336734474d64364578687678455372424949786a76544f5a455174414a4752334e50516e4b654f6f366975585544793862633435715046694233424259536e41494241474f61625077454c79536c4f434d4155534730676e424a50544272684b666947526e3250616b626d426b375256534d79394e6877376b6a703763554776656e7778444b77426b565a686144765163653370515455304a4b59437942324e574d5752726f79732b4e5370465370574779556b42574d6672524b494e2f4955437249464d7362464537666842375554684d46616b71474d5a3756724c315a6d4b772b367064336758464c4678666d444b33473277776a48637542512f5049483531394e764376546a576e76422b465a427445702b4b3458316363764c7a75422b522b482f4c57492f7337364a6a772f444f64664a6261485a4b317264594248784d3766685366717049492b5876577a725866584c6138593775457151353571457150524b6a7a382b515439617235564c6453786b63727077692b545a6b50752f6a505a6443616d737a303253702b57366c6e6532304d3742744356465a2f50676330476d78307038544c3148527930367461683768514247507a465a772b315647663039347446625a78456c6779576c5a78674b55442f50503531652f6870632f327a66644c546e2f694c39716163633363376c4a5155352b757a396169675644532f7164436d6c302b4c4d6876634a6d6e786974796262346a7a72656a4461323553307053443147374f50353030646b6f67734a2b4d705552794d384530382b304a4f6261385a74554274593831756172615037497a314835314350326d48634c636343696e6b425236316b3569323441543250524738474e76774a7558374e64392f6150686a354338466357537049776578536c512f6d615a65506435736c77744c55462b596c7134734c44726648596a42535432427944394255472b795a71417532362f52796f424f396c774a48485a5150394b65654f336875356432484c31625a506c5442674f526e44384c7077414e702f685048666a725670687a63386d31754d59765563696e356b4c6c524a4a30704f747a4b53386d57326c5345416a6c5149492f6c566274365275386435534837612b686b6e2b77536b653945394d587534616555555345424b67722f687544676653706a4431637a65564f4b635768477a6a5a35674a504861716d5232456467314178343278456347563762376772546c356166517748484753514e34365a47443965745448536c6e4f75726a4b646c76467443455a4154314a7950303630426e79476272636e764b514155712b4841357853545a636a71554b59724276754d6f5a647746417a366a71576541426a6a72586958636454794b515734526a67344663377565446b47766f5a6b4334733439384a50584a704c3779556b6a6b59726b6b6741646a33704a7a425542323952555549426f3852594f644f4f445361315a5351435350656b53536b44754237317756355436476c477a46314f31456a706d6b6e48446a48663272785375446b37665555687641796e7237306f6963652b4a3236704a485042704662354841786a327238746535494742307042617344323936676945507a505675484753667a70465476487a394b2f4c554350616b5154757a585470452f4661796a5575697038426164794671624b67653444695366307a58796e7661417a49576c424b514663626a79526d76725a71686130574b34655742763841757a68546e31326e483631386a74553552634842794d4567697275412f7743573053545469546d334b43344559492f43576b343763594651665574745575344c634363415a4873616d4f6b5a4358724179346f68616d6b2b586e35486a394d554b7637776d50454e3443652b61516e4c4554597a41653247714339503253524275454e3565315564302f697a6e627856795255747378304a786a413656414956686e7561662b39746b4b4c494b6b6f7879514f745062647178616d304277446a676e4e4c7933566942677239724353396145754f4441787a6d6d387767456632523655486c616e625a5a3450784830375648356d74464652536b625431335a2f705659456d57574955387731495668536a6b2f576b4674456a497953653471506f3156752b4a30675a3764714f775a374d6c704377527a514d706c675a524f6d3244786a4f4b38645a4b41667a702b6c784369416a414874583535434f77796167347a55495a625045457256684177634b7a7a54645957557177636a33703749625476366465314e6c4d345468497a396170734745634447613274685344383831326b4a32415a3267636b6e76585567464b6944303656344570567453633448474d55424e5274467559386a414f4a43683048474b59616d51503254494a547a744a484646594d634b4f414d4139364836302f63575352782b4642507971306c476a4b7a3938536b564b4333466f4f51416f6b6b5649644b515862704e5a69744a4a4b6c41416a3337314757535550456b465734315a76685a4158476664754b73375743454a39636b482b6c612f53325a6b36664132707a4445673559314e37365430622b774e42575731714f7950356a545953534e7979684b6a67343635556e6469724275307861725062626d672f477a2b34644866307a2b6d6672575250444858467975477537496d52496466435a6a61554e754c4b734a4b6743426b2b684e612b6b516649564f747a764c556e3938316e31492b4c39525364316935726575656d3550544878346e50596d612f7462736f6e77745033665a765368316352785150516b626b2f77416c315950684932347a44304b43434672747a626544313555762b6968565a2b506c794b374244735330376e7045734c414135415143442b71682b74585a59594b62504f7372485157324b6c72492f77447474592f6d6e4e64306c2f7a4b656f7a4f644868784e344a715979385958697678523159345867745837546b45633837664d55522b59714a4b66386c4448776b714a4f376430417157654d4d52787678456b6b7143475a546148734564535537547a38306e3836435776526d6f645333426c693232655863464c49776c6868536752376e4742564c49704c44696576384170326247756978757a654a666e325570716b366775444f34624859752f59443149576e6e396176447849754b473753686a50787156753639682f373152506735706e555868647136552f667257714930595262536c546943516f6c4a775146482b794f745348574f7356334753586e48416c4a2f436a4f52394b586b634141547a7a3158474d6e71545a554e7278416439746b575977706278416377634b5477525547694b52416b715168774c55443142707864372b7555384144684763484234716651377a594657644554377177343374414755495675397a337a33716d4f4674706d734154526b667346315a69764f4f474f3074315977564563342b644e4c744c62572b53416c7345394b39756b526870533173487930486f6b6471696a726a7a547977745a497a785841312b325258452b71796e536f597a5868643938556d6f37515344333442704d754a587877505776716570693878783534326b704f6663306b703467455a42563178535266536b676452325072584333526b59786d68595144465650424935362b6d4b542b3866443851786e7361525537795342787854645a35775467476b3951504e474f31504a354f654d3477615355345034636365744e314c32353534704d7662666c5147527749345736447a6e703655697465376f4f4b544b73396961354a796e4a7a58534a32534f33616b79636e6b306d70335a375677484e78487036304e54675a78636d413948576a41554644427a7858797338574e4f75574b2f58566c316f73726a79513057794f52384f612b717267383543686e4178574150746461655446314c714b633041564c755453656e5165526d72756d626b72387844634735542b6848306d77545773387064336a32796b44482f5454574c474d32656b41457033594939612f654837536a613773356a6a65306c4f50553738314c4c4a624543516c776a6e716155314b7a5457512b3469413953555152393167746f514d66443071473365334e5256757570624933456e43523039716e61554a4c51786d68463369446e62676e767856555a4b612f4574736f50416c5858533577497368624833685739424b54786e6e50504e446e7a466e4e427875547439435267476c6a5a47574e58764e766a7a4747314234672f7741524f434166716173567a5761504b513245464b523849774f4b736a477244695a32544a6b42706863714e324b367449325049576b6569714876334336774666753935534f66674a366653724d314a656f375a614c30567062612b72696d776366492b7452615a49746335315349725467576b5a33746b345030502b6c4d4f45715078452b2b447752556257507846635a49524b795055357a2b6c54614a71527151684f46673571744a4e6f456b373239716e4539456b595035313745572f4163516c304c614839376e3961714f6f6c33437842356c714c6d7064546b633134773846636a705564675846506c6a446e4947634876586b6d3874783045715541443731514b6b7a5756314333447a6a794846464b6c43767956747042414947443171763532745578316255664565314d4661346b714f556f4b73386b70715267596d78456e554b6f6c74573659306c66436838714865494c6766736a695775564f34527838382f77424b72356e55737435594f564953546e70317162365331473548754675754d713343345149636c43336d6e4238436b394e705062504f443634707548437865705779616766756866517632554e56367467525a30614c7438344277423151536b4a50544f6657696d70394779764332564a7354366d484a455a594b6c4e5a35433068514f50584278583044304a656248716a536b47375752784a74307441555056745841556c5137464f4d45446a6a6a6973462b4e4e316c366b316e6372676c70356c6d544c636353705354304a776e746a6849464f66497a45705654364c3949346b314f7539334951416f342f6d574a396b4852714e55654b4d4a2b554347594f5a717478344f7a4733356645552f537468654c46735241684e796f7271504e6256755474567950554771652b77356f523250702b393339384951586c706873754b49424941436c2f544f7a396174447866665441684a6153734f6c524a566735785541454544346c623956617a366e314d6f445951564d743676625931523476614d677177452f655050586b636b46594a542f2f414248383675727a5642323476486f303237795055676766317250562f6a7657627874307266504d5639316b50747371474f454b4373455a397773482f6d7136622f714e5556683249674953485635576f645467303968396f715947704e6a456f4e3866397a396f6652646d75743856506d32364e4d6d78323972546b68734f6242757a6b41384135505872556e756d706f756c626b342b6f4a6464515067624a2b4548332b58705666322f557a396c5a666361634c4b6e426a654479423756413954617253727a434843745a50556e6e334e5563755541304933456d522f336b31346844584f74567a707369533476632b3664796c4163452b336f4b724b34585632557457565948576d397975797054684b6c486154324e43485a7261546772353659724e636269444e496363434c54486c4b516f413839654b487433575a456351476c2f434f6f56307852365070756464594833686c7474445a47554b655551462f6b447837302f74306131365759596675374c546b6f6e6b7435576b6649484835347a546743527a456b5864647a783932592f415a644a44615649436942333437554938344b7a754f2f77422b6c577a716e51633355576e59563073735a3954726f79754b3574516c434d48346a3648494847653956504c68794c5972795a6b5a624476556857442b6f346f48545a7742417346415a39554337744f447a3663306d58674d3454376a4e4a42334b635a372b6c497156673139504d636d4b6c3761654f3353754136437272676e734b624c634b6a676e387134446d46656e7658486d52484b6e64783634396853626a6f376444363033332f45546a327a3630684c6c694c4857366f35536b5a4f4f615162697a555276656f72645949796e726a4f5a6873675a4b336c5941465652645074506161694d506d47784d6d5074714b554e6c76596c65503474335048363153766a6a726c5771396154676d51704e7669454d734936444b52385249396478554b717472557a4d4a53304c506d4252794645357854686a554437753446466a784e6536452b30684131546332344e7768433176757143454f70634b326c4b5059385a48362f4f7267532b466a726d766e4e47314447444b3969314957526e4b656f2b745837396e7278676c5843356f7346796d50792f4e622f414e31573835754955426b70796565526b2f536b3546486179787373564e4e4f4c4854494e492b5964707a6e4e4a687a634166617643734c4a397157446372474c427a676a3871794839735054456c466d75317a56677450795758734a36676762422b664a2b6c6131432b66577138385a74422f2f4544544b37594d4172555356455a3644494835376679702b4a7472416d4c59574a383966445a624a73467961557243784953764766346476483667314e6f494358754d4a424870554f586f652f65474f71336264654953343763685161446968684a495677523876692f57706368774278504978366968314932736669612b6e4b7369773079736a3463557a6e702b41383769654b566265342f6e545763396c4f4230716b4b496c30634756374a686954653773366e7276516b483077676356796d4d707842474d596f6c486241314663474648486d68447942366a4746667254392b4347786c4366714b646258784a324c556a4c36556c68544d6c6e7a6d7a7a6859794b48736c4d4e707845534f6c472f71516e6e38366b335665786151613761674a4a2b4641363536565a5849784653753246447a584d69467674617a494c71787836653945586f6a447a4c69586b4174342b49483071512f73784a2b492f434f2b4b6875713771504f4553494370616a732b455a4a4e5633356269505251427a49524775723973577443464261515477764a41703039645032696c4257316b6b6441654b6b3747696b706742547a594479786c524937304d73567148337551466f4f3573376359786970594965496b726b51646352693561326f36476c764d747468584f53633051695764695132586d4a4449534f7555724744373866796f724f746f655168743547345a796e6d6e38466c4349676962456f624849536e2b644f7451744356696a58454c64702b544b61334e73787061447a7736556e386c41566166684e714730614d6675454c56566d6b6d795434796d483152326b75375363594f5165426a64304f6337546a696f6c706933674e6b4a4a42427856332b4245566c4f756d4653454964446a44724b5572534641486275334433776b6a2f4e56634d464a714c7a4c39706b6438475046475a34663375393666746a78752b6e626c35726356355343416c306768743153546a626b59436766623071343739622f474e4b674a316d617655484949596368527051786a7074534e772b6c5a7438664c6f776645684b745032704e6d63386b623259545a517053677058786c4b65417262747a6a4839614f572f786331315976755362627153354944544345717a4a57744a574267384b4a465839324e674863437a38785746382b6d4a4748722b4a6f5672785531373463615a4b6e4e49735769334257646e334235744b6c6e72684f345a50485964717132583971366665353634747a303256754b56775965394b7638416b56757966725855547843313171397074335574335371476a2f684e75786d2f4e507166773844396630727464336a52797243677466384161504e55387566446a34717a2b4a6f34743261327a494f66376e756f6f546d74493174655a387933426d55334d50336876437874422b4862324a7a52753758356c6e4c7269397a67372b6c51363461744b416471396f48664e513637616d58495573427a4b534d59724a4f6374784c7134464242715358554f73317233684c6e48706d6f4c637279743965377a435431774b457a4a77326b425754365577383978776b3870554f425347484d74374234684236594d37636b6b6a4a4e45745057754a4f63666e5843514762624835645756594b6c597945703954554e6d4f7a4a63687532323970543977655545684b6577782b6e7a7152547446796d7a62744d776c75584b39533162314a436947326963456e487067456c52374474785676476d343252473438537377334e582f714f745058464d69397a72795856322b79526c7132746c78574f4d6255347a3852787a6a6e6e696c4e4d756e584f7233377a504162744e75556b705337776e6a6b4139753235587a4872516a5865674a4f6e626e62744e7758354631754a486e5074742f4332676b4447415478786b6b6e7342546255734334615a746b4b78505351586e6c6561754f786e414b75426b395648676364506e31707737426d6a6c7834584e346a79776f6667664d30686f44784b6c616958656e46535734476c724f6a346e735955386f35786c5870775467592f684651473536336b616d66666b32364246627436486968446c774a796f3965416e676359714633435a63394e3653746d6e5a6d49694a4c686c7261622f45733577504d50746b636633616b696256486d32794842666e716c4e4d4942544874445a57456b386c536c414b79546b2b6e5775634b4673396d5573756b775946442b44312f70352f6b7a3656715741635a36397761354c75526e49394b5155736463594e4a4b554d35505374634366476d4c4b5742375a704a61776f5a7a7853586d594874565a2b4e33692b333458324e6f5232305033655946434d32732f4332423163554f3442364475666c554253786f51474e636d574e4d7563614133756b764e786b4b364b655745412f556d7173386564572f637447706b5732616c394f387057596a344a52384a4955536e734d657663566b71366173757570376b394f7555312b34536e4f5374355737482b483048734b39656c75523950465735534676626b4b534d674649786e3539767970705549653549566e57344c784a76573862796f672f4773397965394d48644c6645504d65337142343755617346306173396e564a6b4e4b633835785834636341635a2f6e5354756f5770486d534757397753636b45565662493234314e44446853723877424974626b5a78525475786a70696e2b6d4c732f5a6278436e783339723064314c69665967672f3070614a715a75652f7358444247634568664a2b6d4b46366b7471725a636d43786e79586b62774d2b2f4e5372626a5267354d6530376c6e3042384f4e6174363030704175594b513436332b3953415145754468512b5751616c5358675659486571462b7a5666343837525553453263505179704377546c522b494b7a6a302b4c48302b64586546676745484271765645695563713031523376414a3666537679734c4942464e4e2b4363666b6139456a614f6c454a574d72377875384e346e6942703779584542456d4f664e5a6432354b5341655071655072574d315269303455386a4855563941376b444a695049474e793045416e706b69734e617374537254714734517345475049635a502b565248394b6c6a75576a4c656d4e4e554366656731685065765851536c5750776e7037562b2b3741764449366436396455707433626a4b657456677454613471424c745a6a4f533236303671504c5a4a4c547165635a36676a75445177334b664279695848553445386561306479566654714b6c2f6b70576b4b42326a755454642b4f3076497746476e71666d4365504d6a4561375248316b6831473464553767535070316f70476d7365574639414f7078317279585a6d4a525348476b482f456e4e4d6a7032334e71556f736f4b2f37574b594149466b786c71665541616a716a7868356a37774b456f623555633863656c4e394e6156584663544c6e447a4a4247556f362b583965356f70613455534e4a4c6a624b556e3143616b436d51343056704f4269756367435052655263467a49365332526a6967455347327a654a36436b414c4461305a366b6263483951616b556b6a48726a754f3952752b534677376e446d49535649324b6263534f75337150794f667a71734635343879793470593666742f556c4f3748544e632f73386f7772684950464f6f743869796d77664d43654f696867303962635964526c4b77515436314e487156754248466c5a3867412b395870345332316d32516e4e537a48417a45684631525766374f77412f586b2f4d3446556c444b4731626c4b776b4872327251336862703652722b7832754734777150704f45727a5a436c6a4275543237647353502f77424d45386e75514238673230445a6d62716d754739422b456b66574676752b713739484c64323143727a47416f5a4d614e6a4453647651355341546e714e76513152392f736a476a37354e68724c5a564664573253673547556b6a6a5050617475492b46764134783278574a2f47794d372f414c65332f626b4a2b2b76666c754a2f7256664a6b59673131423066334d515a4735757246754b49516667375550647671314464762f4b676271464e4a4f3742487230704653764c62796b415a2b7455714a376d355157505a6c3257366f67353663696869354b69705279523663306b747772484a35464a44637076595534555478555553654933673952525377705839343149644936616b336d59683131705168494f564c574d425a2f736a31397a327239704c537231326c494c67506c42514a39366e64356a7a5076304b7a5771562b7a6c686854376a7145416b4942326741664f72754c456233504b6d544d4e33744a4662487043466272784a6e744d67534a47304b563642494141486f4f425531674c74656c48484c71714d5076556c78706861304434316b6b49534d6e6f42782b56562f646b334b32326933785a3931577a4b5534516f7745457653556a736e676254676a4e4e4c5a4b6e7a37645a34386836557473366751306b53316854766c6f3532714f65787135334b66744f333346754a503553343837556c7864544238683734415a5253503379647648505534394b6173614e743662363764767536584a37754235716a6e594d59776b64754b677570745354724c4a31552f47654b566d6178456249475333384878454431357037707655452b33585a5564556d34546f533471336439775a556c546130676e676b4467345035306f4c63734e677a624e364757486450444f78616a5331507555565438686c736f51504e55684f4f534151434d386b30776a57363232314968526d34386370472f795562556e48544f4f763171507a376e71694e6f4b32366d4e37632b4e7843567757323070625767714935774f54782b526f573962726c4c385335346a334662546f677056744b4d3451563541362b7650317269742f615949785a57514b37384366516c5338456a36664b6b46755a4a47654458696c5a5058414e496c7a4741546b647a576e4d6671656c3747526e3235724d48326e6f4b4c35722b7a786e58777848627434573835676e616e7a584f333531704e39594b6953656179357261597a6650477256635757356c444d64746c73453945427476634239566b2f5530784456743843634639786c552f4d6954466e3031445a33783543464e70345536745a5054316f52725a64746d3256616f456f4f474f685249536770474d636b5a412f536a67746d6e7266624a304a633075726457416a6566695638517a67675937667056616136636273724b3456766357343234423861315a504f6367342b6e353155417472426d6f394b6e496b67304b69506664474f7858454e75757475725365636b4138704a2f38375564744c4f6e744d327952466d4e754b4d6e4b6667547541474d5a4f5456532b48656f54595a38794f7451784d435570352f6a422b482b5a465444554e7a6b4b513058466f55553867624b35314f387266635a684b6b4172486474736149636b79576b4a576a50776b6f786b646a7a5466574e7a74385a43557a542b2f4c5255793241636b396a6b64732f7741715567616d6b6553532b704b32386359474d565765724c79712b61696664504951664c624862596b6b412f586b2f5769786f58656a3467356d474d564e41665a6c7537364c36787355557471577043794f6e6c37536f3776624f3342397a5777576c6c53556e6a424857734d2f5a7238785775476e764f5532687470514b51724346354b51456e395350634374745133516c6848586b5632566472544a7963674e4871335057764e34363534707370334a726b76344f632f536c566372474f6c72344f6359724b486a7261446274665842774461334c32796b342f764434763841714371314375547837316e6e787a756b573858324f6c6a6176377530576c4f6a2b493773342b5179667a6f6c387875477739695641684a33355070327238726170523442464f464e344a505448616d6b68784b556c57506d4b55527a4e6a644f43377a6a674a483630692b34685049474d306b7647526739523046634f48636f635a78373149424550754a4f724f77713647686b6a684f564b2f45514d30535868585166536b35544b48454148743078326f2f4d594342483749694e776b35516e646a7253666e496352747a6a50465257637159464834316c74507058544c72374b454c4b6c4c62396338697532456d5750746832345167303046425177665130466b784550427057436470357a3656322f6455374d7155546a2b4775574a4370434f57746d656e4f616c6b726b5353316a6d4b5057574d3867667567435231373067315a477838495574497a3257614c6f64334e6a497a6756346b684a7a3079656c437a47566d51655974702f536a567a754d614f68727a70447a69576d77736b6a636f3448487a497266476e37557a59375244674d4a435759724b576b674441776b59724c66326672557a50313543636b46492b3774755347304b2f69554267666c753366356131616877416461526b4a49436d596d7150335549384b7955344857736c65504c374e703172645758456e6534704c775552314330672f7a795070577241364d5a2f5771592b305a345a506177744c4e357472536e626a41515575736f4756504d396542334b546b343943665371355864774a4f6b634a6b2b377a4d6d544a57355243634b4858474b624c6255734a483876536a316c30764f7674315a67776f713545747857314c61423852507636416479656c472f47447739663849744f3271584c6d4e794c6a5064576e79476b3551304570424a33483852796f44706a353133734d5342387a62624f67346b47544257367643454658505539714c5779314e736e43306559386541534f6c474e4632392b3432474e4c6451564f76626a75783147634138664b724830686f514c58357a7152366b5935717a6a77424f544b65625546527469576a72434c5a617774534d4c554d2f4b6b37766f3652654a374e79687a6e62624d6162557a3572624963436b453577515436352f503246566c3970472f54724671694244695348576d4651556b6f625755352f654f4139506b4b71427655567755504c584b6543436e6b465a356f324e473573615030624e6d78726e4431756d724776444a683946735239396d496b7731754c532b685943335376384148753450583236564e592f6833616262626f6a66335a532f757271704c4b6e4846457063566e4b6963386e6e766d71542b79764863764f7558336e435674786f69334d715554676c53556a2b5a72544e385745685342326f323642755a58714335644a6c396774646639797262746f433258524e7961324c62584e6444376a695635556c7759776f5a394d44696c374e6f4f636c5476332b2b5372696c786b73746f55306c744459506370422b4a587563564a3247793437794f54785750376a7253387862724c645a6d504e6f44362b454c4b654e787830507970424e57626c33307a54366a3144636950565458562f384f6d6b2b483047772b6538687548735548676a346c625354794436353961687372534e306331433764376263476f7a72724357466f656133444135795079394b7a62636462585661314c457155566b67483938726e39616c666835726d2f7a4a4430644e346d705168737143664e4a413541372f4f70576e627561656630625536524e3563482f414f7a36627156337a30375577755678597455522b584b6453784761547563635830534d3954554354396f445254774376326f366b4831694f38667055483856764869464e7354747430327445746374436d35456839736f53326739516b4b4179546b386e7057716d4d73657038537a625675533358506a33706a54467164656a584b4e644a7048377150476333416e31556f634a4836316b4f36654930713436786b616d6c62567653316c4c795778684f306f4363416649443871443361305470422f346b636f48597945446e383659327a5337733951626c335344624936565a5570627956715079415038794b65794b6f496e49314d484d6c317a6e757a664b6b4d50454e4a4f354148624e517a5539785849644b6e4d456f364543724b2b3761525a4b5175374a6349474332687767483377426e39613652704f77616c5a5735444c447a414f315a52753366496e676a35315341326b47754a61664f4757675a536d6c6f36356d6f57314b345132664e4f665147706e66706a36634e6f536c6142305070556b754f6a344e6c5a436d596f626262567955666949397a314e436f74724e7964554570563565534f65744d59623659524b5a397032794e4f33435559366b6b684b434f67714c6f334357564562695469724c75476a3348556870707452576f345342314a713366436237464637316b346934616953375a72594350674342353777362f446b3453506335396761646951416b786562554275355833684a4d6e577552446a785757564f75756c31766531764b6e4141516b632f7742327475327068356364746f4955343445387051436f30707044374c326774494f734f73784a73695979506763666d4b796e2f6b3269724d646952725a443875504853793242776c4a372f50716168384f38324a5279617464744153424e325759387367734b6239334274785372316a5445536b767637564871416e4f42524f58634847504e4a4f516b456e4e43703033377a48415034756f4f614a644f42334b54616c6a31494c34694358446a4c2b364b4b345247466c49796f657566622f77316d7655633076546c4b56324e61666d33515231725a654735446e43442f51315350694c6f4a4c7a36356c714179636c63596576397a2f543876536c76702f4b792f704e5942396a2f414e79734a5a2b44654231394b474f6b754e714f6542546f754b61635777386c53466f4f436c5977523745553064535572574f6961716c506d626174477163657561516b536b4e67352b4565707052396155675936314862753870376332327234756c4c492b4a5a4275453270615846666a4235707970616943635a465265506131746f4b79366f4f64734775584a317959554546307154325046514575484a47764b754e6f4644705469576e6b7367634768364a63306a64764b3864526d6b565433317242576b4b4b65357067526847674152354c5a7773464b633035616349786c5050714b4671754c365646524846654b757368784b53454241376a726d6849505a6b486953474d4e777a6b4548304e503472426563536e6a69686472334f4e4a557272697242305a3464583757364a72646a5a61564959613362333137454a556337526e4855345048745367685a716c624c6c43725a4d6c6e67745a486d4e61577534685a4b5033794e6748415235536756482f4d514b306f4a4f33766e355657586735704b366152306c48695836437546656d3175706538336b72535843556c4b75696b344948427878553955357449782b64426c42335638544764743533516f6d5475474d38563335774f50616843586a54472f616e6861617454397875556c4d6149776e4b3346666f42366b396853514365424171347465626a7033526a4d69377a31516258356e446b7061456f573465754d67626c48323572482f326f664557332b4930697a79374b34394974304e4c724955343255626c6b6771494858474e765830507051583751506a4f33346833566a376d32354868526b46744346756274784a79564544674538634430484e447642714248315370753079306835742b61687661656f43676763652f5838717634385278415a47376c6e47615063304e6f62523649397174305170422b374d4e746b34366b4a47542b64574137436174304568494353425874687468686c3161686a484a39383068714f58694d764278785547494c4632737a4850326b70426c6549495365664b694e704278366c5376354556564f504c43564250785a4857724a386558557138524a5256385731686b592f7741672f77426172356b4e79565942556b44676436707658467a322f774247774136584778367161722b78395a2f75746e314264466f4837785455644b6833787555722f7554567533742f7a4370513656432f733657345754776b6a4b55724b70636835374f4d635a43422f77426e36314b5a712f4e56684a354a7177652b4a356436772f7561374b5238312f553674724a38726552673966577349536e53716336327052324b586b6c505a4f656c66514e6c735272593476417a735565666c587a336b4955586e563435494765324b725a44775a394e2b6b774c7a4e2f45536b4f4c5737684a50417a7a566765456356453636534f5367666431456e4f4f6479617231586c41354a776f384535365662333266497a636e55557850437749524f5038364b52676f76784e2f774256794e375458414975736a65564b635675396433464e5a4d31626d4d754b4b7575536561544b686e63652f616b7a44564b6353686f4b577053734a53426c5250734b2b787678504576455153386f4b33447230474b6577346b75344c513077687839357851536874744f564b4a37416574614e38472f73533337575462467731613637706d314b4157686e59444c652f796e6841507165666174636146384764456546446156574379744764304d2b53664e665072685247452f774355436f4c4147435474356d4d4c4839697a7853764d426955624f7a4653366b4b446371573268784950716b6e495074317132664454374765734e50496c4975647774554e44355156464c716e564a774432536e4866317256703145674265315253665130325666564b5153464171485368653246455259796b47784b576e665a412b39736c74657145626a77635175502b2b70667044374b6d694e5051556f756a5337334d36726364634c545a2f77414b456e492b705030715a70766e6e3433384f6a6e424e4b6d2b4b794170585431464b564b3467746b62756672543459364a3038704334476e7263773832647948464d2b59744a48634657546d6a55783978545379303448434f774f4b417533356b494a6542782f6154316f63342f774365676d464a4f35584f4d674b706f414572735761637a395379345331492b49415a783755446b617a64536a39346f6a4854696e73325a4953434832764d34786c53616a7339707556765355374d2f77426d6a34696a484b3956784a375a387a344373594a7a363855336b6c636843664a6453734159344e52433651585947464a35526a6a46425536676b516c4b43566b65754f7454742b494838795758753276507371436d7951726a6a317174376b5a45586568784b6a6a6a6b63314c496576334e7548387148627651362b616a6858595a55324e34366b5679324f434a4643565a714b787872714e363059644852784a776f66362f4931577434694f32325574745a796e73724855566331315961632b4e6c5233487144554d763175626e734b6265526a4849574f786f48786a49507a4c32445574694f316a596c634f4a4375633859706b3743536669534f66576e30324b396258314e7235546e6739694b54436b724f556b59366465395a4c7156344d2b7078754841494d614a6255723454786a72545758464b6874424f6576536a41556b6e703836385768436a6e48464a49506957775a466e54496a444777715432794b614751346b38746b2b3153353170745935786b48696d6a736473723553423730304f523344553341635a70536c465367546e7436553458463371536b436942516b4867594861704c705852636a554477556c42544853666a634934482b6e2f6e57674635476f514d6d526361376d696569394e5362394b5377794145703557346f66436765702f3072564f674937476b644d2f63347634682b3863634b634678667166707838674b684e677373537a57354445524b63636233414d626a2f6f4b6c4d5a31534746344f51553478566b49414a387a6e31427a4768314c673039717750736f446d4d4563356f6d3745736b31737058436162576f6a3934796e596f66556631716d39503364546259516f6e69704c4631437055674e6c576344492b564b5a4f5a534f34645365503651737a43556a392b536f5a33716435487977503569732f6661483842395a36366c52453657645a7546746261502b37767945734b533453636b3769417249774d386444307131342b70797555454f4c41534d63657448376666304a655078414a5061755546473343637554496e4d2b57657566435057576a4a726a4638734e7767424b746f6363595635616a2f64582b46587a424e532f374b45523966693362344c79643743743779682f656251706144394350317236634f3346436d676c7849573073594b5638705030714c766548576c4a6c2b61764d617a784c6665475571536958455a53305346444233424f41726739534d2b3957546e4242444c476a4d534b6b567542536c506c7034376d6f4a7156344c53554131617479304c63306f6b505279314d514f514545685a482b452f79424e5531653346726c465054424971685575347943626d546648644a54346954456a6b46706e2f38417254554668744b42436b38444f4b735878356a4c6238516e77526e2f4148646f2b2f34422f70554668766f59553376546c42504237307031757245393139474a2b6951672b4a7458773041682b47476e32535141592b2f2f414a6c4b562f493056534e376737383048306b6f52394832466c4b516c4b594c4141486239326d6a734273725875567a7a52486b7a7876574e763144742b542f414d776a65485246734d747a6467496a724a2b6954574248547444765159347857374e637666643948336c77667751583141593947315667756332454c5558435538637048544861713259304a39742b6c4642544b782f45595071436e5155704f4f6d5456372f5a585a55692b334e3072486d434a747951634162306e2f7a3556524c716c4b515649417830487257672f737172537166655848452f416d4f326e746a4f342f36476b3450336b675459396261744b355838527634546543656f50467936434e6132557351327a2b2f7545684b677930506367636e3041726333684c396d2f5276684448544f5a6154657236426c56796d4942556858667930644544387a373159746d467230336232725062596a454f45796e6133486a6f43554a482b76756561487933565248466c65433065514f3166594b4c6e6970634c7749346e337335494b2f687a515679374632556c4b546b633470744d662b4e52484b54336f517a4a50375463536f6e41542b4870697571756f6d37687436636b357a2f4f6d4569364c6a70796c653549392b61457a4c7147317177637039756c44584c695a42436b48346356784d3443486b6169533672424247503476656e6a4e314568475153464433714a495158566a614f542b744759724b6b684957436e4863643667437a4950554975536c4f486c57514433706f7559704b7957795545644d47755a49554277654f35394b514b6367416335376969716f716f37476f4a624b4d4b506d4a4872584b7275792f6e7a477875376b55304d55727a3348576b2f756965763871696849716670775a6c59394d64366946353034705257347a6c57655436564c566f42546a61423242394b515738686f424b6c626837314e6b514b6c5653346a73556b4b5352316f5334466f63424f66635662452b46446e676734415631776356444c76596848556f6f4f5165314547696976784974495047553844306f644f59447163704f466e76525756435730726b307763515279656c48775a41745a45726a5a6f30356861586b684c6d4d4251484971445854546b794275636153585544735078592b565737495951364353416148533449326341484872536d786868794a6378616c3858375a544b376755634b334a50644a484e6470754b534d41357177626c5934633845504d7043757849352b686f4d356f4b437457554f754939675151507a716d644c38545a782b704a58334370475050546851335a48387153552f754141487a4971574a30424743736565363444324a412f7052474a704e7146744c61536c5136456e4a6f507057386d502f414d53782b4a47724e59704d39314b6c4e71517a6e385368676e3543726e734d5970674d784747773030326b416848487a507a4e52474e41655963485048725668326d38774973644366494b546a346a6e4e454d515164544c7a3670733535366a6c6c776f556c6f41684b526a4647574846416a41344978544a712b573365466c6f5a5066464f30616c684e4a2b4672672b2b63554a48346c6135374543326e56446277442b6c484936314b4f34446e46425039716f774f51304d2b3946494f6f5963676770427a304f526a4643515a784d365a65574a4753534f6355704b7644735137736b6b4476546e4d643565553442493755316e32354c716543445154716b6e307071396d34522f756a36676c5763746b2b7670526c4e7a573048464a4a79465977616f5a357952595a366743556a646b47724b302f715a463567442f414f6f53506a42505833715753755a4e4471576c5a3731356a515353447838523936686572644257793854583563544c452f4a5755352b42776e6b354236452b6f34706a627232594530386b495042534b4b5033524a75695542524b5674676b2f582f32704a57756f33475344784d462f614453332f384146473841685a56484c54426148773432744a7a3875633156636b49552b32326b7153427a7a79613362342b65427358784468794c335a6d5131715a7047355363445a4e536b5932713946344741652b4144366a43377474652f61536d567038746158464a556a4743446e474d647153554a49496e74666f76714f444a6f5074504b69694a732f54624b6b327133736b4649616a4e494b66516841427155776b457241412b4938554e744d4c7957674d59785232417873567578794f6c4455386f797475646a416e696153316f44555368676b514852672b3653503631684f354e4c447a3254776b6461322f347979437a345a61685550786d4e74424871564a47503172446b6c49383534465331376c453550623271706d41387a3062394b6e5a70386a48356a574f30566f4f466b483037347252483256476b415839584a4144494a504a3533592f6b617a6d486e47316f62534537786b456b6356706a374c4c4b546137343455705438624b63343634437a2f5839613746664d732b75354164493548342f77435a75645533612b705a58676b397145337a564a53797468623337776370474f6f6f644a6d4b54443877484b67655255577537626b6f74764252486f665432723676387a7865716b38744e784d694f464c47554563356f63334f512f6435616b38674e45342b6f464d494d307837526a636479526a4a4e44744f7a76506d58516b37664c516c4a4a397a2f77436c544f4973385261652b464b4b6677676e6d75326d456f61534277534b42544a763369636c744b757173564b625461584a7271636768505368726d5464516e597261584641712f4d39685257533679306467413437312b6b79577258444c53446c66664857686b514f5448314c497767445074523141753473347835696b6e6477613857323230447a2b56667053773254675a6f584b63576858422f462f44553142354d4a4b6b634b323448474b624b6b4e4d704a576533616d755846522f7734502f72534c6941342b6d4b6c53584a6a69564b5a6a4a554e7938446b2b77397a7855534b767165584b39323631513150537041596142774e334a55665144756172712f2b4c6c7368757062626853315a4f517052516e492f4d31496276344c33652f796c53353934694e424f536c4b4572556c705066475150546b6b39716852384b6d626863535735547371327466434a435542426658334b4d35776b65764f615178596e375a743658446f6c78377453787634456275654c6b497154765a6c49423447554a5031344f614e784c7731666d464f77354b48306a47514d685363394d6738696f33642f43674d794846706e7374526b4a33426367454b534f633578787836386653676c337569344d413237544c457463636e456d364961566c30343641676643422f35334a68433930304c56594e4336714e4b5475507a4a446562314274306774544a6b646830444a5136366c4a2f496d677a3270724e6a48375369714a374a6453663556574f71324a524459573234584663674b42334b392b6148615974373833556b434d34676c4c6a79664d51744f50674279726a2f4344512b36626f43582f4150416361346a6b624b4c41757064446a5741536d6d543653416477362b6c436466366f4f6b725553797050333137345755714752775275555237412f6d52564d33505639796e50716b5079586956395332737054386741654b63636856624d78744236546c39536372693441387937586d32316e427837553158623230676b3535373153544f70726c486438786d624a516b6b662f4d55522b58536a6433385362693762304d73705379397449646b4449343746505461662f426975544d476c76572f703756614c61535151545573394c47772f43633437476c554f4b79415166626973396d2b54356257524d6b4b535479664f562f725842754578346b69512b736b344244696953667a356f573141426f5338763659314733637a675452615a4b564544714b634e754473525647326655382b44425647595573536e566c5469334d6c5461514d41633944315031703745764e377a7a63704a41374631527a2b74433255655a53776568616a50754b455544562f4d756f4f5949776f34727074386a7655575a765334476a6f4c79316832664b6455684a644a4a4b6479687536397668483146425a39336e323574626f6d4f4c4f4f4d684f4d2f6c536d79416479686a394f7a5a4332332f77415a61634e7379566a4b7344705267526f634a6151753652343771686b4a66645367712b514a716d72587165586348776c3162684b7a6b49437a7441506f50536c35546b3234795835456877726562506c6a63536341653359557073766443583139496346413744377065624d6d52475343666951526b4c5363676a317a52654864473330414c4f445548384872697164624a795a435152356f536b4832534353506e75483556505075734e374b5332454b37464a785541324f524d765069396e4b324d47366a4b2f32704e796871553241703149796b31456254633337524b7968536d3144673866363159624d417466384e6534644d5a71503667307970786170444b434639534f75615972416347495a5352487775596d427551332b4257416f442b4658635553544c4c73686c777156774e68473774314839616846735739426649576b2b5765464a50464845766d4f3641546c422b494b50635573725535547a784c486a33426147575855484248565a4e564234302f5a776736722b38613173796845756a4c7158707358622b376b70424735512f7371376e313537396244546347334c4a45414f564c6432674164686e2f536a6c3476694974716857646e41656b4b42647a6a6b64365154744e6a7561476b314754547476786d7058374d66616a4a48633830366254676764666c524b2f776d6f4b3074523543483071484f3066675070535463524d646a63736a5051696b4e3869482b544b7a3864354833667779764239664b547a2f41507570724538686578524f346b6e6f534b3250396f75554565473831494a77342b306e6a76676c582f346973667945627a6c4a4a534f657646553870466369656c2f707737644962386d4d39336d73376877554b37567037374d4b4d6165757a704a2b4e3548422f77414a724d59556b744654494b674f75613146396c34464f69352b372f367a6a6a6e38436148467a636e317745614e712b524e504a6d6f47554c50776e6735714f335361754a4b5530546868664b4d6436566265572b6a79566b2b635477523070672b34322b4377366f6c53546c4f6531665843654f6b776d716555574e527a676c654d2f51554c73567a3871773353535479383845652f417a2f41434e49582b55596c6b62627a7457636b2b39446f726e6b365a6874705668556831783558747945442f736f3676695144556b326a494b727863564f6b6641447a6d72503878713152734941387a485048536f78704e6c717736635a66574e72386e346b35366748702b663952524962704a4369636f504a7a516a754d735431706c55397771556f375648504e46776874686f49624178334e4a785979336747326b343979447853736b7477327730313862703671394b4f43545a6732556f413441334c394230464e57346d585334366554774253306c31455a4a5574514b6a79545139755a3934654b314c7767634165315249714f37704c6a32693153703735777a486255367233414763443350543631587668747170436e3768714361683136624f57576d676851327473705034426e6f4e332f6144556c317167337a54467874724a7774396b6f537270385751552f544947617a6a6139597a744479487266506a754a32724a5530735955306655656f50583952524b6f5963794378556662334e41366f31323363704e76685074765237555843354c55676c5a57415067516f4a47647055636e723046633350784f7346726a62763934556e49534e735a53526e302b4c4870564d6a78427430354b6e66766d78525041556865663556427458617858644c6f3043533743594f314f303433394e7836635a3666536e4e675143775a5854554f37625757577a66722b72784775436d576b7269324a6f684b6c6f4143336c634539654f50546e48317159793952573354746951316257537462446531714d326c5351666d7248314a366e35315775694e5153745278693345747a63534d3168496363644a546e30414365616c647a306a49746c746b7a32377a496b6c747454696d485751554b774d345341636a4e4b5a554141754e44354c50484569656b3370656f4e655462317146774d6c686770594d6765576b456b4249526e73427539387139546d696572727a446b33714770755532347a426a50536e58457243776e4f45444a4839304f4767384f354f536d566c354b47334e7841534431487256646174754c38323953624a454a515a4c6a516563485a744b642b506f536f6e35555459465033417a68716e4a4b4d4a4c2f414137736266695871576671433552773562497549384e683949556c5373636e4851675a4a2b61763774452f45335339746174694c5978595568446d5856765159593877424a2b4643564a542b4a52392b67394455656853427032334152335859374c6166774e4f464f6679366b6e38383134317143387a564a43725865554c504242335948314a4178554e674e3254784759746474482b58647837345165454b496471585031446232335a6235486b783543636c744148565365784a37486f4150576f6e346c32573358625536725a5a6f4d5a443074357146485179674a547553666a6334342f45536b6e30427161744e58796577424a6e53626446364c54393655745a48666f646f48315079714136587a644e5253622b7956737373714c4544597261556f41494b7550554838314b394b586a7857356a387575646b42646a784c4e6e6547326d74473656414e70695456526d67674c645a436c76756e67646637536a394d2b6771755a746f6861646174384f42626f7a39396c4b446363705a54764b7a31566b6a49417a2f3441616b6b375553314f75544c6c4b6b76524c656b48796c757156356a7978684b5143635a43636e32334130467354633739714f366764644c4d3534454e6f774347577a3053416334342b76356d6f58546b735165594c6130746a4675616b6f6a65456d6e4e4d3664657546324c30695368473939394c704264634a3641664d3448356e76524c537668565a48394d526270636f37716e48577a494f3135535570624f536e474d5a2b48427a51433575763670517778634c6936707442796c7442536e6e706e70312f31715258652b33474870462b45784a4b5747596859516a79305a32684730444f3350536766544d52666d4d782b71746a47784849456a6567374e4731627247333279536e7a4956736865633831794d7256744f4d6a33576a2f414a54524c7855306e6268716d77574332527847584c4b5336704b314b474672324a4f43546a41536f2f576733686c48754e75544c75534a446a4438787a424c5a786c4b53663079542b5172754c4d6b333757386936534a4b33507577326f6555766e6a3452672f6d616734447542505567617574774447573546744e6e3065374644624d65423571696843384a425667456e4b6a79656e72317855696464303763304a4d68323353437672352b77712f7743726d71423154633553623762466f63634c4344385468424b5353634b4737766741483630656157713578336f7364586d767151634442474d39386d672b6e42484c5147316257706f6d532f53734e467674374c6a44595a5138746279516b2f777255536e2f414b5342394b49765331427768536a6e74524b44616f356973734d795571444b41326b5a366744412f6c546535576878685157556e487256656378736b78722b3248575535533451652b4454364e717478534d4f4a436a307761456c6f59497067346c544b755079727142344d41456953386f685852426351457472376a337047355167713367704933734863506450662f58365647343035624a4f4f4454364c646e4874375331634b53523961426c49684b774a356931683145746f684b303778485754734b7344507639614e3666553971612b6559346f4977442b486f6b653156773270614a6a6f526e633673714b66544a7a2f5772447355364e7032324f46317a664e6b4a7747455a3359397a3236394b446278635943774e435357354f32534b34495552436e7050486d50714a4f565a2f4c3871433357515535623470617a326f4f4f65652b3748742b63454235663777353768492f72696947734c56626d3761314b596c754f5062746d536e43466670564e6c6c705773314d352f61596c65586f4674766e63374f62417766524b796630724b4f5649387a76794d413856707a37544436687075314e70326c526c4b5050736a422f6e576246743745454570555664514b70354b717036703643534e4550795447776633506f6243516c474f536e6b6b317172374e7141336f7157526e4a6d4b7a782f39747573744d4e5966327054676e6e64697458665a355347644372376b796c6b342f77414b66394b37434b7343422b6f43526f7639524c7669377a4a5356634b77526e7451752f516e32704b58306f794d3955394452507a51704247634c534d6a336f5864373459734971523857526b7050617672674c3445385a2f4d42616d6c2f65493775372f356541667970395a6f61726a644c5a42574e694730746f63783277506a5036476f2b5a43626b70615230636353636970356f4b31726c507a5a4a49536365576c616a6a473771666e524869534f5a4e4953584c375043554978465a776c494177414230484e534a6d433077517039784b476b39453147352b70596d6e5969593051623164464f5a354a714c79745153726d397774537a3247656e7972713879622b4a4f4c7a72706947327150463268574d6273394b4473584756495158464841396657686c6c3079354d5835387a4b4778794165706f7a4d553032684b5731414a4841774b6e75522f4d5972557435772b596f6b656d61365134454168503476536d706b5a555344303730764761387a6b31424537694b6e433048497a51753661577456375146584b48486b4d7441717a4a5343452b7079656c472f4a536850626e743656574f756278644e624f534c4470694c496d783253457935455a4a5544796668794f33422b5a42485163393131435666634e47437075734e4b5755794561633035432b394e35536961714f677435376b66784832365a6f4b6a566478556a637a397a6871504a386945326e39536b306c6674425866533169564f6d51315134675545626e6e4542536c4873453579543150546f4436564a39496544462b3142702b4a5064656a52473553504e625338566239682f43634148714d487233725064386850452b39306d6c394c302b456655454d305936497574307632716f6b642b57743568744b336e6755497874534f41654f36696b665769336942346c7030314c5662595453585a696d386c777177474d6a34546a484a787a6a6a7436303274724b66445331366975627a6a636c384f6d4448497a7464556e4f514f2b43764f665a424e4d39482b435631316c616b3379345432347a732f4c794134677157744a35436a3247656f397355784132327a4d62503841535a74594e76474d564b377547734c6a4b6351743938334243656f6c4a5334442b59342b6d4b586e5748537149304b35535a6a3974754d746f5071524263503776634d6e413271326a6e67656c54362f665a376c32797a54354c4e77544a65616155704d6470676b75484851633966705447782f5a756c50525733726c65524866576e4b324552764d32653237654d6e395035314750654c4a4d742b702f34626e4f4e4e50774232616b4974656f644d7856744b6666754d685453397946792f697752304f456e4836564b6d745a574e3244392b544f626269627932467253705078347a6a4247656e74555138585043647251454a6c35713647533749634b45744c6132453447564b34556542775038777175474e49336550442b2f4b687966753678754468614f7a48726e707a524d7a397365496e4836626f737a496d444a5737752b4b6c7561773142477656676668327937515748582f6757354965387342763841697763642b42386961692b6c62524e6a4d2f64303379306d4446542b39584856764c594a4a484a41484a7a79545545743174756c3764537a486976764b55636239704350716f384368385a2b5130342b32687878744b6a68615173674b78307a7a67344e646a7a4f7641346a64563646707779346365554d784e56385377372f414771564a6b7374774c6c62544359644c77572f4d526c7877344a5572484236594139425570307a616b335a6778377265596237793141426933766f35486f54315030783836706c62376952744a7742337057464957436f37315a3437656e705172716d366d6d66306375514565364c4869586a4e384a6f5565556958446d74326d4f796e4b2f4d426342566e4f374b6c6a48616f7a4d316c4353682b4534394c754b4372616c34464c4b5667487142673848336f646674625337336f714a62584671564c38374471382f4570744947776e334a502f526d6f6d71492b436e65564149473334686857666c52506c6568526d4e3662364c69624a6c5856477662762b35664e6e5973746e303746754532512b7777746f4c3871512f6c4b6433494143514d6e4236416436675631316c614553517a5a375248615a536369524a53584671394345714a412b75667054524e6d3154724e357165697a7a336f5247474e6a4b764b53676366436359507a37312b6a6141755637552b75507369686f6c74536e2b7968775567444f63647a53636a5a4c6f526d683057685266714e55347234387a6c2f5774336e7a4937545539394c6a6a6762423363416b675a774f4b35765869394d6c58417074546769734d4c576a7a46424b79397a77634548413437657443377270473636586975544a533277387666486153306f35334b536f626878365a50726b436d3733685866625a61684c6b577558455a61527555343479704b6565354a474f6367666c53794851456d61474e4e4272645775326c78676633445550786c31484851534a555a78574f4e7a41424a393859712f664433566b6a55476e6f446c794b567679575134705147414d6a49342b574b7a6242384d4c7a4c747a63396c6c35786c584b64724b696b34362f4542697276306d6777374a62472b5537497a5142493634514b6e47435164776d663635683075416f644c35376b2b6e5764595770614277665367633243744b53534467476a46723147707043476e30686166375236306448334734746e6b416b5977616b6b7033506c67413355726854654f41506d612f4e713272715333625369327970324b734f4471554534714f4b535733536c615649634277515267673059594e4673704545546c716a586861322b6432436e5062505839616c566a646464576c4d526b5053636645367366682b5765425564756b635a6166376f4f776e30485566316f2f59482f75385a445034564f6e4a5074366d67623851314a387978744b61615a666e6f53387475664b4a7973416c534544766b393656385162327a49655973305a6d4f2f4851726c4c5148437359344937386e70515a46365569336d335774506c4a782b2f6b62676b723639543248587654527537774e4e72552b456f75647749344a48376c732b33636e33717534506d57635a7072387a4e663270324632314e6d694c794649552b357a31492f6467484835316e4e616c49575646586649507457792f48445372586931624654556f2b35337543303457476d382b552b4467375344305048422b68397363536f336c7177724f3463633859724b7969755a3666364c7141644f4d616e6b64785a6c3446486d754b4850307255503266356d33524a55745857517641394f45316c6868486c4c47415667385937666c576e504256495930537951634262726973597833782f536f787264314339637962744c7450794a6438755730506a62637a6e706a714b696c316c714b3347563870366a35476c3579676f626d7952673870394b455373724751724f4231373139657338654a4d3430776f6c35545a50784e6b6a35315a4565344c74317359694d674a65634739524239656e365971744c493935557839614d425a774f61736d324a61696f453656674841324a39654b5a5850453463446d4f59646d646c684b704374694d354f65706f77302f62724f6a506c6878593739366a637537795a7131464b6945673841644b346732325a664a59625a625773397942776e356e74552f7a4a57534e476f4a4e306b42707368706f446b49365972715737356154385735587652364a70324259725945534a7a54623548786e71632b6748553032625870746c78426365646c4c42364b47456e2b5644774f6f5a3567534446656b4b79454b566b2b6d614f78375937747a744950754b4c4d6168747a5978486a70516e746e417961715855506a424c316263356c757462787431716a714c62737076687838673477442f434f7654743136346f6743786f516546466d4c3679767332375852476c6247704372684a2b462b53707a61694d33787579653347633838644f704657485a48744c2b47576d68626f6367533347556c62686a6f4c6a6b6c33484a7941526b39427a6744413756547974563237546b634e516f766e7a4869456f6148346e43426e4a50584147656142366f3851372f5a37537163386946435933424745414b574648703133413944527469416f457a73656263435545666173527162785031544764756b5279485a6b4f4142674c4144544f527543515479736764653539425679616b38556f6c6b73547134567257327074734e734231784b45705630534d44504134347a30465a7573336a2f42693237457435392b615645712f646764656d434f502f4148714c6133385a4a562b6d735255734f4d73736b7132372f694a4f4f75423644395458484368484559756f7a467472446957704674582b31313474694a4955765456744154737955716c4b3672567a2f61563150703731624e3738577266596d593857506274387830706261594c6f41475341435142774257634c563475544a6a586b57327a4f6c747049414333416a484871654b4262722f6462695a38783737736f7642616a752f41427a754248707742536d784c74484d596d5232637152516d6f6452654b7347314e37544163646550416153386e656f2b67546a4e4e472f45492f634758704e716459634b64796b4a64424366626b413539654b79624638524a64753151374d6167764f4d6f796c6f4c42475430437334366b5a503139714d366d385664517937516c6f3278364d68385a336f4b6c717878775142786e33726c7772584d35386d51454b42482f694c666c2b4b506949773535533032755074614461565a2f64425756717a3671503841537242752b76344e6f694d46753175497755744e744e757048485a49343741667056486165385348374a45573271302b6370785734725546495766516444302f7252794834674f583962714737434853793258566c783441494136714a556e417068777177414d6873755247334163517872792b323932324e4b74567363746b715136564c634a43436f6438424b75704a484f422b745444776c3076616248707048336f5246334357664d66442b777153503455595059446e356b3151734c5645575671517a357a5a5648336c516151426e2b344f534f6e48355661616e6270667255327132515857772b6b4644306c6145414a36352f45547a3036643672484439745848652b51774948636b4636384a6b33366465566f6732747045736a37752b674565516b49414243516e68575156486b416e7652653165442b6a64505752446c796874766c6847587073686130626a334f45717838687a3961723278366e616b744b697a4855525a374b6968615844744f5163486b3936566e33533352624c4a564a664c397743746a54546a68556b456a685352303447546e31474b577945416379336a3165554d615969452f4358534e75316e3471794a4c4d46445668676c556c4d5a57536e414f31704a7965352b496a2b3661737a7868746b58556c39307870474b323277583376764d67746f435368734253654d65695134666f4b723377786165734e756365677948347a6b726170533233536b715341647563664d6e36303454637069395347364f50764c6b6e4b4553564f714c6d4d59484a4f656c4d624751525855712f554b374d574a4a6c30617a665a3039704e316d43454d504b53694a46514267494b694544482b45456e3656412f7545533251326f38644f476d6b42493954382f633966725147584b6b536756754f754c556c515743346f712b496444796142366b6b546e624c4c636b7a464b6153325347326b68744b6a30414f4f534d6b635a716670736745704855346d347549447939612b4c4e6c744c4a44384733417a4a4b6d7a7553436b6734507279454a2f7a47725138553456793142704e793257737449656664523570665874486c676c522f77436f4a716e50432f5441687735467755564e726c5a6253516f6a3932442f414655502b6b55373142633057365449386d316d573148322b624a494f31436a6a7163653437314c34654153656f784e514e35566535644f6735493074704f325779584e69666559375731616b7641444f53654d343963644b41615353336372504a6868514b474a62374c5476583455754861667978394b686c6c6c73547261784a5179684b6e55354b514d2b31474e46587377484c7a486636496c6877625277504d5146665470534878653243317a686e475137664d5053597a39766644546f42562f436f4868513971364678636a3943514252614c63496436676854683878687a6c4a504248625074517934574e396f46635a5833746e30542b4d665476395079704f344e775a7855673852442f41476d665376415766544f61526b5856457a486d67456a6a4e435857314a4b737049776551526a464e6c676c4a4b566651476f705951596a694535546a61347269555a556e47534366546d75374d53566831786578423436386b5548616c42706c61314849786a4665744f7164414f536c5063436f323059444d4b6b364e32747a7155744f4f4f4962485479674d412f576c34384b797568436b334d72422f676459554350714d6731446f30637277477875507455696761626c4f3455664c514d2f7872417062714b354d614b48556c4c467068794542446157336b6a6f707457442b5278574f50744165457a32696458534a61526d33584252655a58743443696371516651672f6f52577962565a466f41426d776a36704c7733436d2f695834564c385174465337553450337168356b5a374f51323650776e35486f66596d7331307675622f706d744f6b7a583450632b637149547a726d77714f34456668493656717677657436786f4f33704b65666a50742b4e565a66763841624c6a704b2b505172704863677932466c743170354a53704f4f78422f6e5637654833696e70793161666977315841734f746f2b4d4c51724753636e42475165536141495548552b6d39573143366a4571347a5a6c72545a4b56594b65767251325572616f714855396158645753726b413450427047516f46733554672f4f7670312f4538784e48714d625972793778734a2f644c77636e353159715171354b446976676a6f4731506f61712b492f6938744e7142546b453537414472566d515a61586f715a4435387547337768485172785466504545416b51316272536d556b75754c4561456a71745838587970613436796267522f7564715347572b6863412b4a5831714c334b2f796271346c70744f78704843454a3641555273576e3153585136384d3549775057696f655a3358553562596d7a7835377a684765515431727061664950586352337158794944555a6e39383647682f5a4643336675425674614738394d6b564e7944666952357934764a42435645717855416b36526d706c7946777036346b64353154796b4a61436c626c6465542f705679745774443663686b4148706b5537617369556a684942786a49715662615944495746536852616f6d6d704b706b3634722b384647774c6c4f676345354f31412b585956474e583679733978592b357159637553416f4c4353436847345a4150505063397174587844384d6f3135315645656b75754d7375785641706177435368517a79665a6636563134442b457469752b71395270754d5269364e5739595248383743775275497a382b42303971572b55335a6d6e6730573746376850457a3278647062387075465a3742454437717471457378393770506248716670543355656e396557534369586449737533737645684b6e5549614a786a734d48754b31472f346378624c396f477a4f513462636545746c547a615767456f5355744b4367414f6e5050316f68397079473272772b51554a436e455330424f6664432f3942566335546655306b306d4d4d713937706e48536e326674646179733053354a75444d61504b5348472f764c3667536a7372417a31362f576d742f38424e55322f5638485469376b77394c6c6f387874344b5757694d4b4f53547a78745632725731746e4e3654384f745079646f2b37705a694e4b4a37495545685248304a714e2b4c624c316e31376f7136494745435239326355447750694839466d6739306e6b52754c5471637532754f6639706e4b35665a583174425a63576d35774a4b6b6a49536c7861564b506f4d6a47666d6167746a384e4e56336d39544c53303539786b78422b2b544a577049417a6a47415057746c654d756f4a576d726870695a44424c626a376a547a59507775446333384a2f4d34393663366830314862314c417544615132383668794e494936724741744766636254394b6a336a3567484575774d7737762f41476d514a486866723679626c745230766c417a2f7530684b6c483541347a55626a2b49326f59447633663779707a5077467431704376706e46613652614c306e5663396368786e396a37452f645730704738713433456e47526a6e723631434e4d654846736b3672752b7170456473356d4f69496c512f646f536852486d2b354a423968696d444c387859784b564e695575353469616d74384a436e593657456a6f74794f41507a36556f7a3476366d6451564a5330554a474e776a6a422b5a4f6176375572467438543948544749546766324b506c71556b676878493659504f4641347a2f657a327050774630367978346574656179325848336e536f37526b707a744766794e534844646963634b4b70596a722b35534e6a75326f646150504c69366368585254664478454a4b695365636b2b764e4e4a5678636c5846454358705a763731464a62553344383174614433424363357752337a57677642625443745032613842774a4469726934676b6439674366353570316f4f324e4e617a316e4c53336861356f52767837724a4766714d2f53684946385268584570635664536f644a61327339755771506349747a573042674d2f652b477837443454557575757364473339754f5776326c6158576868433232556c4f4f32527537656f77616d384744706a567a6c37743065314d375937705a66642b377054755764334b56446e49786e50754b6f4f3550576e5472476f4c584c77394f5a6463616a4f59794351646f49783037716f474a42376938656e787664442b5a594d61394d767253684633685347787746794758476c2f554145667254485738466477746a4b494e79695333564f595648596353326c49374537315a4a7a2f576f2f6f6d37785947696b585a794a486c76497558335a77794777734642514659353738307034785868713361386d32396950486a4d7877684b417732456267573071797248552f46545063794168626d5a3747497353466e454a7a5555526c6d4c39356a51343765456231757466435058497a6e2b745379377632614e6f696461474c3148666c53675671666379537065344b4a4f30657748304645476f756c706d7237507077577342776555366c3543794579577a48336e7a505537694f652f50536e4635384a594e306d7675516b69332b59777a4c596a4f5a546a646b4c6149505135422b57345576657a384531435845714863424b5961745568684730617051307950776f615337675a35364446543353756f394f3664682b5169637035397a61586e334733443569686e6e6b484855312b73646c67575857477062664d746361572f4767726b786d5a434e3651556f53764142395172394b4c7a74475757527071347a6266627262484c34512b68795976797979323632464149563249566b41644b687966326b7774716b3252334863667841744567684464775a53663736564e6a383141436974763168425776434c6c454b6b395148302f774173314750396c394d494e7142736e6e784a61326f795a305351516c4a55426772327134567550516a3639714144526c6e75316f5139414d75464b655649556a7a462b59684961554e79466a31326e49493731584972693433323175584f334f6a33566f672b55386f6a4f5268575255557546755662354b67522b37555355383971725a4f6748343978542b7972694a4b457646736f553373556b704f46353535776364753471366d6f376434733056784b736e796b3458313577416631464162546d435658784b30756a35697a554d6f7955724a632f4d3057696737416f6a4a50705458565671576c544c796b6c4b3256597a3670502f67706543797062614370773478307177703343556369375444554e776734553935517a324754524a455274346769537458706b3048616a674163352b644f306f41546b4b494e4c49737956617544437637496649334a33464a3767356f3161574a3856494d6559746e31546b6748387145577039615350336a67787a384e545333794733576b676b62763779545654494f4b6c705750637a58397272524e77756b4f44714d4e4235324d5075386861452f46744a47776e317753523952575658576c70516b425744334172366833765473625556706b322b6248512f466b7471616351446e49492f6e337a3631383666457a51307a5165734c685a33303746734f456f5551634c62504b5644356a2b744c7848784e58466c4a55637a5634654b55344f6348763655316666436d796b483475774e4947546e50503555336c4c4f3349372f725734703354356b3863434368504b4e525257464168546f497a3644716635565a55526c79366553326e496151416b4a486571306a376e6230316a48414a7961742f545531693377306b494b6e4f7554546271467a584d4f32625335566771477741635a4653526e377242527351734b6548413238314652665a55396578745730453434347154774c6533455a53707a346e56444a5058465479306a6f51664d67534c6b397442566a727a5243323661616a6f4a63566c644f4554664a53516c492b6672546875517434486b49546a504137314e314a484d565246516c49413548616c4347327a6e4134393652564a78675979727258473472796341565063342f45723778326153725262306c4b6c4a63596562494b654f464861522b6f2f4955372b7979576f6d6a376c4c62414d69564f38704b765149526e48387a696e5069666268633943336c6c5232346a716454365a5238662f77434e632f5a73742f3362516b457566384e637951384f665434663961725a6541435a71365669555a52346c6a7970624564755265487768784d4a747859645341536c4f506943543734785548385a4756332f414d4e37672b3272633268544c7a51504f51516b662f3666705549746d764e76685671797a7546516c4964517470527964795672547647666b6b2f383144337646364d2f6f684e6a56486365644d56714f74303447436857636a3134322b6e5371374f504d334530623436652b515a634635673279546f3248437654776a5739684c47355a634b4d71434f426b652b6679714e2b4d6c7943394951706779366d4e636b4b5370497a684f3159422b76772f6e565565495069394d31646131323051323472436c687746745a4b6b6b4a4b527a386c666f4b6a6479385472764d7333374f6b725335463270436d674d4257304a32352f7743564e41435430495334786a79426d667a63307865625a45315a4c676d516f7145435a3934536764464570535144375a414e51335533695a425872757751593771585972722b586e63384a4b326768503546527a2f365653537645585674786a7665545064516c77414f42745154774277506c55612f59656f5a30767a7846636457733543764f62424a376678635559787577366c66646778452b34392f412f6d61746d78626e497661564d4f7350326a37755733477571304f354f434d446f5152337149334a6750323355576e344a5a61556d4d667536454c47454661546c4a39506a43766b464371675a3068724e577a3467796f48386170497a3039526b303874326874585769637166476e526d354b68744f3251764b683648346348363150743542324a58392f544132482f7742704a66424c5364333076427650375361636a754f50704c62627167705373413555634539655079715836446d7332335441334b38714d683534705765453753366f4131454a3139317845674b625243684f766b592b384e4c47662b6f675a2b6c4370756f376c473051624d356169792b6d4f68767a557670494b6b6c4b6a783734506676554573543148574e525a33446d5864436469777639315355495734567665586e6b35566c522f77435a5836304f30734573546238655156584a5a5439556f492f513156466c38533054745a57687961564d4a5461764c6b66446e393846376a307a3178327166574c556b462b343352396c777161557469514d4a49494a547350582f442b74547672686f6a4a7033786777336159397663734d397a54627a573535626967364d6b65656570566e6e50492f5373553635626b32792f796f30685255386c7851587a6e436753434d2f4d567332304d573751756d664c624c7134726268665756637155546a507036437361613875624e373150634a72424b6d33586c4f42536765636e4a342b5a4e4e55686a4278376b7875336a694b573357306d4c70682b79417054466566456c5848784259474f4436644b734c55486831717a57656455545a4e71614d704c51386f4f71436a3849536b5943547a67446a4a4e556c75554638644d3954562b6547446866384e72546b6c51653155796e6b39764c546d6d3766496c426d4e52537833545637382b3357324d4c63713451487675374d746249337038744a796b72786b7043633859394b48333758577072464e6936654e31683345754d6c7074364f3535754134734861563479464253456b64786b6574577842673270462b5135623436326e55334f55302b7077353878784c4b7436687963413548484879724f7576354c6c6e31314763545a6d374970727933507572546f634843696432636b6334366531427452794142474b7841507a4a2f61626871393756374f704a4463517a4668316f72633461633874425176634237447236696e482b306d73476e6e457939505235374e314c545455523943664b5473424b55674a55416a4179656654324e575a66324c624373453968706f35697877704a783038347142507a36357146366545784f7139526d5556474e2b31476d342b5635775170594a4870384f42396151796f78346b42694c4a6b61643154634e48786e6f386e54616f6b784b476c50502f654e344c615841704a435238504a546a507a6f687062784461695753617a4f697972624275736d53366955706b6c7049576767424a4855685135783731377247433162744f5434546368553078374f48424a6354677566766e5430505447615a745333727a3463733271515370684667584d526b2f686461654f776a3663664b6c736f4933664d625a6f626843467331666157623562355445387055394a666d506f635355426e637a676f4a5042796f444248745534384a72324c6c6f694956632b557478725072385737502f566a36566d627849664673767a634e734241616a744a2b44706e47632f714b7558774f6c4c623061707a6366696b4b50542b366e2f53676355444f794b464162356c6a333132424c6b4a747a72715579586b6c534142795038417a4271766b3672695779632f42665334682b4f73744c5474344242786e7255547632715a4d7656556955323870425336456f49343268504150365a6f7434677062656d3279394e6f436632677a2b39534f5033694d416e386942394b704a6e50496c3750366274786f37655a4c474e537748414d5059396944543946396768507879473864386e46566a48576c51334a70667a63385a4a46523956346c4d6141647932496d6f59544b68736c73444859724178556e743273496a47504d6c5139754d6a63386b482b645a364c6e784b3535486175323356456b5a4f42565a395743616a786f6148426d7372547157484f514132367937786b6557734b7173504837774e593857426235747564626933614f664c6357384d4262504a41507546486a2f456661716e5248354746454b36356f766274543336796f4b495630665951654e685546702b67554342536671534774596161557162426e2f2f5a, 3, 2, 5025);
INSERT INTO `personal` (`id_personal`, `nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_genero`, `fecha_nacimiento`, `fecha_contratacion`, `RFC`, `CURP`, `imagen_perfil`, `id_usuario`, `id_sucursal`, `id_ciudad`) VALUES
(5, 'Flactoria', 'Walters', 'zFernandez', 'Ess', 3, '2023-05-12', '2023-05-13', 'EAEM020914441', 'EAEM020914HGTSLGA9', 0x646174613a696d6167652f6a7065673b6261736536342c2f396a2f34414151536b5a4a5267414241514141415141424141442f3467485953554e445831425354305a4a544555414151454141414849414141414141517741414274626e5279556b64434946685a576941414141414141414141414141414141426859334e77414141414141414141414141414141414141414141414141414141414141414141414141415141413974594141514141414144544c5141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141416c6b5a584e6a41414141384141414143527957466c6141414142464141414142526e57466c61414141424b4141414142526957466c614141414250414141414252336448423041414142554141414142527956464a44414141425a4141414143686e56464a44414141425a4141414143686956464a44414141425a4141414143686a63484a30414141426a414141414478746248566a4141414141414141414145414141414d5a57355655774141414167414141416341484d415567424841454a5957566f6741414141414141416236494141446a31414141446b46685a5769414141414141414142696d5141417434554141426a6157466c6149414141414141414143536741414150684141417473395957566f6741414141414141413974594141514141414144544c584268636d45414141414141415141414141435a6d594141504b6e4141414e5751414145394141414170624141414141414141414142746248566a4141414141414141414145414141414d5a5735565577414141434141414141634145634162774276414763416241426c414341415351427541474d414c674167414449414d4141784144622f3277424441414d4341674d4341674d4441774d4541774d45425167464251514542516f484277594944416f4d4441734b4377734e44684951445134524467734c4542595145524d55465255564441385847425955474249554652542f3277424441514d454241554542516b4642516b554451734e464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642542f7741415243414566415634444153494141684542417845422f38514148514141415155424151454241414141414141414141414142674944424155484341454143662f45414567514141494241774d4342414d4742415144425159484141454341774145455155534951597842784e4255534a68635167554d6f47526f534e4373634556557448774d324c68466953436f76455863704f79733849304e564e6a6b744c692f3851414777454141674d424151454141414141414141414141414141674d41415151464267662f7841417045514143416749434167494341674d41417741414141414141514952417945534d51524245794a525951557946434e43635947682f396f4144414d4241414952417845415077434a396d43787564593633307a52496f3065307572694f6534646764346a697a4977423941514d667058364d51685238413450727a33726a37374f327636663035307a715856317a70695738476b327961664362645276755a5859467a6e33346a373974786f75315037543270577375363230327a4562444f3263755341666f526b2f6c564e376332394461644b4d462f354f6d35484b4c676473487632714d393049314f65426738317a41507458367867353075775941597947635a2f6331413154375547743339724c6252365a61777979715645694d2b3541526a497a33502b6c506a6b5664684c426c58534e42385a66466a705664433162702b2b5639566b6d6a387157326847414f516347546a61526a754d6b562b66387a79644e61744b53752b427a674d66353172574e556d6d314353536562646c795759766b7353546b6b3537354e446572366644646158644352413637446a493755452f496a6a306a5a693864782b386e737a7a574c305179694f4f547a494a5644524e37416a73666d4f31586651706b2b377973326475345a474b456c4d55724e466e63697468542f6c496f7a364e6b5a62467436344c4d514254464a4764786a48375243323263627348337a516a31646372632f65536f79384d63615a2f356d596b342f384144672f6e526241516848794754515272586d4733757a4c38426d765377794d48596f324c6d6a55715445785671696931646e7439466951706a7a47586a325065702f5335647257665034687450423539616764564d4667743150784a7559632b68474d6633715a305a4b4645364e674b41724e38774735483645307143616a59787832642f5178716c74454f523841372b764652626e6e36656c44585348556858466c636b664578324f66513537476965354f35435166683936537055426273704e53747a63524d6847543647684f3469495a6f323767346f77756d7751447a6e32716931653141416b553459656c444a5757556944427879425379323331343936596c6c43386a7633704c546a476635543665314c44746b34535a4839434b394d325344366e7669713737324d416473306872736a676e475477616c4c304c7652614e4d47504a3548466565646e497a3838565672644571526b44697650764c4159427a6b594a7136394d477934575841344a7a58797a4669434f414b7168654e32493743765676416f414872566353744975566d3345357152464b6a647a775057714a62302b6d4278532f76344a41624f52375656454c394a3178686d41464f724d436475345a39616f4937344d446a6a327152486448634771466c2f444c6a497a6e35314b53366a4348767851374665347a6a4a35376d6e5576516f39383159415252587137734469706b4e36464f30643647457567635a50464c5855524778494f543731664a6b43364f2f493759493766536c2f347151323349487a6f505856636a38584f636d76547175546e317163577758565546386d746241534a506e6d7438365176504d3661734a5641646d67552f6e6a6e393635516b314d753678676a6e7658556e687933336e70445267526a2f757941352b58483971586b577469354c51626162644f305368313273426b34375659435574785664456f6a342f59564f556a6146376e76785348726f5654585136436330734d6161556e474b577039364a57456d4f6271535772773570444e7348624e5274684e6e70664866412b65616a537959774d716364732b314f746833585034523370686775346a6b723378515862706b6a623263312b462f6862704635345157756d334e69304672714c6e5554414a446c4e357a48676a6e6842482b39596a34772b4447722b486d744457624e6d316a7034734e7979483434736e384434394d63427366364841644438662b75756c356b693076717655316768416a565875576b5144302b46386a474f4f31466c7834352b492f562b68335674663953584e7a62534b513642493439366e304f78526b664b7655772f6a4a502b306b585079584356704855586848622b47506944624b6c6c6f3972626176476f616254377766786c5071564f666a58356a38774b316d447776366274686d44524c42505966643150395258356f364e3176486f4e2b753433466866524e6d4b3567637130626568424242483146646d2f5a6a386264543678365a76597461756a717435597a596163343374477779684f4f3579474835443830655234613864637652716a6c6c50706d79587652476c33576d7a575461666269316d516f364a45716a4242427867634835317778347339437a39463347735755736851323541526d47504d52694e702f4d456676583642324f7257757251627265514d4d636a50784c38694b35622b3356704e7444306a70577049336c33725859746a74377648736475666f522f3571787246484c5555676c6c6c44624f48624b796c57386b685a686c3239425767644e5262644d58417751547933727a785152706e384743377658596b67655847542f6d625039414452726f4a4173495165435542706a787053734a79754b69454b794c62724c4b354952554a592b777851683176664a64523268694a4b7962514d2b784752524a654579365a635267354d69684f50544a4766326f4e367a6e5954574b684e3747516e615059593766714b4b6b7162427872646c66314572474e4e78444c356a344939414d557a307a2f41506a4a67434d4e4579592f4d4850376676542f414654473172475748776f4a335534395363476f33526b5262566b556e506d712b5079556e2b31524c30615a5257326a714779766d6b5a58566950582f714b30547037585265774c62797354496f4f436635687857633950327a587653326c546f537333336443535279534267672f6d445575433665427736376f6e552f68395649724661576a4e4a6230614a636b4164736b6471724c6b6c6741514d5637706d724c716b507846566e58754d392f6e696d727069475047426a7656315a4e677871324c5756674f5650625070564f6453414a4737424874566a314e63785232372b59776a43444f346d674f4f364e77375076326f765974324e54673048474d7064494b6a6437682b49563939367a6a745175312b3975785638676e6e6d6b6a552b65536175714b61725451536d374949495049704c5876484c597167476f7577774d354837313739356c615065796e614f7878785174432b746c364c346738476c4e656e75706f57764e564672475a473478324172327931543777676348507469683632524d4b4776384143726c7348504e4b476f5a2f317a512b3977785a53446e50797230584c6476627361706242435343392f695a465330763234352f53685a4c746966666d7061336d3163456e6d70544b595269397952795142383665572f494a427742373050515844506a424a414863314938306c694f546d72346c3069362f77415350504f525871587879534b7049324a59385a783271537553774f446e48616f306c32517331766e552b3450725370627768534f326565395142767a2b4538307164586a694c4d43426a4754524947724a4e6e646d6137555a3446646a65464c2b5a304c6f725a48454a42507a44734b34703068387a6c754f2f617530504274392f68356f78423366412f3841395636566d58317469736d6b724474636b416b6e6a6d70454d6779434d486e765563466d4147422b6450577032746a2b6c5a6c54464e57546b62497a6e3037696c67347a534650754d6e3270616a4937316430524b7a33675532546b357a6b557068676a337073795959656d6146792f42542f5a383549475163342f656d39706d5967635948714b39632f4677773547336d6b794c384b726e6b653374532b794a7048345961664f4a6873436e62366b6a765773394e522f646443523334562b426e30785650315a3461617a304e7178737465307558534c376b7862317a464f422f4d6a6a345748302f4f7268486c764f6d595478484b6f50422b584666512f44336b555830544a4271504b77413631314f4b3731416d4a4e717871563548656d4f6d65723951365976494c3353723635734c7066777a5153474e68376a4939506c542b6b54773668637061585565664d6c43372f555a4f4d6d6e65754f6770756d64546b696a59795137513673777763483347614c7936655271506f646a2b6954396e5458677639715761377572617831716462653864684848665234564a4437534b4f426b2b6f347a334137303139746678452f787a54656b744f59434b5258755a354e765a754931516a3957726b33514e4a753954316d33677458587a4d6c384f53713455466a6e4870674774422b306e314c62613731466f5a73786930476b776c5038416c444f352f70742f51567776692b504d70522f593662357854594957706875745045596e55536f323959794438527a332f5446476c684c747434735933414476785758394f334b72654f79345a3058493971767250714f65435863367356392b34464c34336259324e536a2b7a544c53517932737a482b58483631516137303763546170704e354a47426274496f553535344f376b664d44397138304858763852576146514d68664d4f5059636633704339536e567572644b745147467462675137584f666a5042592b334f5079576c754c5362593348476d4e395332686c306d342b45454a4d7368507267676a2b7046556e53536c4e63744d5955416c522b5949782b3946577552623948316e4877744848427a6e762f414243442b6e3936462b6b754f6f4c455942587a6b4849375a496f594e796a5a63706659366e364f782f3254306f4c774262714366632b7637303371646f3235706f422f45412b49656a663961523047705052756d6b672f4647546a50624c74567063526e6b5937316961323241796d73622b5343564a456244446a483952524e39362b2f573653786e626a38536d71473130644a4e62796f344d5a6468376b45445037305353327356706245716f4766616954394553315a6a66694471736c787273747375576a684941412f7741785545315758546d434e59397a474d46524a7448636a322f333756473675764550552b704b636a62506a6a36442f66355649383458646b6744486433322f4c35317366534f2f68677668546f75395731433131433256496f795a4d5a516a4877386a7656564461474f4e6e63426a3332315870715973524a7542436b66553156663976496c61534e6b4a4b6e676d6c56756b637250692b4632474f68616e465063473175306a53364133715978384a584f50587456356457336d57374c476335374165744153367861615465693865332b39794f4e75524a747750596348327137307271714c56745874456a595251733433787533495564366b73626632527a70535330445770537a3357706d46775934304f4e72444648476b394b334d6c7368696a2f686b6669795037315764575372666456694c6c68436b63594939694e2f2f77423161646f63666c3662627163427467794b78797539446e53686f47492b6b62746c584b596230797771544830564f7a386c462b704e474375414d65314f72634c754f446b6a30712f734a35666b46303649334141796f423867545575506f614a46334e634d7739676f5848376d726f616c416a674d3442397a32717331756655622b4479744d67615a4834575346777862304941427a2b6c56625a505a6c50552f555562336e3361776468624b41636e75354942352f77424b6e644a3961513264796b47716f397a62486a6344385366366a392f3655506137306e716c68716a7039786e43467552734a32483142783235375a71486636566336624c746b5135417a6a76577248786570444a526455615a4c346b364c62334c4c4870447a524b78777875437059652b4e767233373035463472574258344e426a41484f44635a502f77416c5a49724d3542414f65344139616b6c4a6264514a45654d6e306453442b394d6349475a7156396d7932506931705043746f706a474d626f704666384159715061726d587266524e61306d6547475132317755503847634243337267486b632f577347676249473039366c777a74357171474f66337a5150484174636b2b7a53724b5a49355146595a3363697530664242764e384e4e4a4950627a65782f7744335772382f724233743534574c6b6c573359727537374f6436627a777530346e6b704c4d687763386279522f576b5a6c394c427933534e565667527754565a314431456e5439734a6a455a38794c4835555442572b49344235394d315a7247572f446e50307170366a3051617a70736b486c524e4b585171306f37414f70626e6b386745666e57564a526577494a4f53356444385858656d5739736876507646724c74334644457a72373444714e70376a73616a326e6950707a3346774a524a484170587935514364774979636a414b346f66366936586973356f64517562325272546635537751516a65705a5341426c735947506232716d75394c3031346e533376627458777a4f306b433763415a5047633534503655314b45746d36474847316468746665494d6535545932727951426d4453796b4b446a32484a50723378534a4f725038526c44324d45766c7177426d6b583457375a787a5650704f675158554e314e6453795738434d5938753671435143446a2f72557554566446366430357861616c59764b6f483843347645554b416554332f50745663492b6b5a3833784c5565773157626341446c5743676e6a7653322f696763592f5046524e506d4e375a57387273686b6b514e6d49376c7a6a3050714b6d524c68647541337a4a7249395073794c65305a44315830707048574f6d53575772324e76714f6e7a442f6879726b486a38536b63672f4d454835317931346f2f5a4a754c5757572b364e76444a4153532b6c334c346b41396f354477666f3244387a5755654850326a65722f4141384d634d56302b6f6154477758376c664d3071597a2f4143354f552f38414478386a585576526e326c656b2b76416c6f317a2f676d735341597437786749382f38414c4963412b32447450797232735a7978766c466d75574e3158614f486f756d783078316f316e713845396c354448636b366d4e30596473676a3337567158326d394b532b365736523677735a46613375374d3273776a586a494949502f77444a6e48354375712b762f4466512f454c543073746630324c554e6945523341473257496e484b4d4f567a376475426b47756350476e774a367030376f2b4b78366665665774467370444d6c6b4f4c694d45486438485a7a6e422b486b3437556179633571566753664c487853325950344f364c2f6a5858746a62464e3654527a4168754f504a63483969616f2f47613257313852645230395a465343784564724647764956565265426e6e75545769665a77307956504633546f7077596d574f34526f3542745a573870686a42357a3871797a722b38693133723358377552736d612b6e6b5571636a385a782f70574b636e38736c366f66782b73596f723946646265646d794d466345347135696c68655843346249346f65754c4d72626e796d39425670307470417537694c7a576259325163486b6b43733946303170424e306d3467314f346b5a677353517357343441424250374130373050423935362b57346c41574d764c4b5154774474596a39794b63744c4348524c7539786b78694d4d775935497a366670577739592b48316e6f304b514e62787544454845697837535232494f4f354247667a46424a576e48386a6b2b4e535a6b332b4c7071386e554b782f384d78764b4e764f414a4166373155394f73723676615979423579354f506e562b326752394f33476f794c636562623346684d46567547567430664250747a2f4146716c36546964746451415a5646655167664a546a39384438366b5970527046636c4a6e55485273486b644c6161684865494e333979542f6572476339774d303970326e7070656c326c6f70332f643455687a6a767455445037556d5945647578394f3959576764444f6e4c6a5751636e6435422f54634b7474555a52626744674156555762624e63515a4734784654394d6a2f51566261726176645775794e647a4d4f426e48373146706b4f634f73517a3958616d414f37717741396668466148706e545668623653496d4833693649775a7935415836414544396167332f686c723139725635654e5a517035724479324e79704941414849425074556d33384f2b7470684a627063577977757052684a4d57474d656e776b2f7069744c79513075523273655738536970555a6864584c744f30625a4b386e6e32397144347248647135696b3547374a4f6654756133502f414e68657535437a58746a47574f41513068492f3867714e46396e3637744e544a754e62736d656243674a4733776a317a6b696a2b5847747067656250486b696e4637526e4c7a42375349794c684d4667665876322f7056763035594c48636665324c4b516d465850427a795036566f55763264345a33563565723950695441586235517a6a383542785569587774306e516f4d50316c4263434e64354378497541506e35683470617a7753374f444e4e6d5a74315276314e6e6466695a736c382f45425637705069676e542b6e7a4a4a4f626959794879316d4c4d53434267357a37352f576733716656644a303657653130706e764154687275654949782f3930647750726a36554679586e6d4f64777836696b78696d37665161567830615a7133696872577154465675576769423457334a51666d527966316f6b36483674314739756675393163795378794c6869375a4948797a362f774374597a615858497943334f6355573256365952444f472b416a6b482b6870382b4c564a414f46374e54366f36375647613274325649307943464878456a3350742f7161424638517463686d2f376c7156785a344a49455437652f663841396148646331667a727a7a4979427867343954554554735a6b593449376c5255535555453438757a592b6e2f41426276623159725858725664526a5968446473754a527a366e73636651555a4c307a4672545279326c7574377548774655334848304761797a6f796543364b6f5a496b6c394935682b4c35412b39614c5a613766394c58456433706276626f764d31712b48514c36736f505930724a434f5257744d4b4e7730456d6a654457714e71416e5451726a6e6c7044487379506234736672556a5876732b395164535863624c70666c7176637663524a6b65782b4c503755374634776137714d494d65715371684741593152435030555575547847317959594f743334413532693464663645566855636964755779573736486250374a7439393333544c593278595979397a4964702b5730476d626e3749576f3658706c7a716b6e552b6e433274735049676a5975715a47547a747a6a766a324656397a314e63336b6d2b65356d6e6b4838307368592f765349396656394f754c574f43507a734e736d504a4278786e383630342b55706661582f774142626634436654667334644d784e7675764543326b5063693345512f724933394b337637502b6d773654306c645746706366653757323147346a696e2f415031467975472f504f667a72452f73375745476f6455366861366c62704d31767035634c4d6d64726234786e423963452f725738654337724a6f656f4f6d46482b495067416568534f677975704f4633304a6c75467630616861782f467578794b723956302b57374a4566776b5a494937452f4f726549353766577172583953476c365666337177744f3045444f49304f47626a734437306e4a47343745786537494531765a5252524a71633863574a4136713734473464756666767836313763644d3657495450625132354d78456a4d2f78622f55486e507636653959587039706433326b586b743172456c3362526b3341747054736d7742797879636b6a746e74376436307a70625835646436583036344d6268484f324e3845626b5867452f5846593556434768764f6b6b6e3244506a4e7174687266514d74706249494c6930314f4d584543414168734f4d2f4d45396a574a3363583369326d686d526c4a4735546a2b6e2b2f57746538616448754c36655333303153626d6133696d6146473247526c6367596249775145724b6a70313563576178746253504d5141424b344f573974326130596e6b794a4f4d71706a704b4d556d765a3070344c36347574394561636d4475745955684a4a354f46417a527936734141684f4b7976774273626e5464416d7435776b6267673742795233347a2b56617775655467664c6451354639332b44484655666964704f6f2f66727849332b464478676a76566a64323856746349305570535653484f47344f506635554473733171374e4649516e6f70504970554f75534c4b7253354a59386a32723037794a50544e314e4739654758326b2b702b676a4662586c776d7036554d34733774696467396b666b72394f337972702f6f6e787a3655385268464462336957476f75417073627477474c65794e32626e746a6e3543767a6c7539534e356343525363647359374370566c714e7a464c4730525949446e49343571314a533742726c74485976326f656c724f7a744e5036687472644962385447336c7549787464386f5758635233494b63452b396354533656633274354978555342324a7966722f5774586e385a4f6f645336576d36663147662f456242696a49626f37354943684247786a7a3659354a3738596f4e4c70634d7a7238544e3647726e616a6f5048394f7972754e4f7670552f77433532553931384f66344d5450322b67714c6f32734e70317a464971466e6a62506c75434f666d4b3233777730346634544d53764c544563664a56342f66393675656f4f67394c75306c314734736f326d6851792b61415178326a5063642b337257662f305733544d767435354e57756c61574c7966764d38537570794f4d6a2b316453654b6277366430442f693179686b6d7452454e756362764d5a55594839632f6c584d756d736c3731686f39724a684976764d526b4a2f796c786e3971366238656f51504444556f6b775645734134375938354b513365534b44794b6f57636f6176314c2f6a55306b64737271582b4651336f6f4f6366587457332b4766673362616644703274584e2b317a4c4e46486365534967713449446863354f526e47654f63567a66614b305772355849554f426e323572735877753142627a6f625355387850506a69614a6f397733414b7856654f2f774345436e3537722f5768554e4c5952756f566167796e4a4f503046545a3838352f536f45684942774b7776396b6635525777532b5831476a594a59516254376374524c714b6237654c343251377766684a47526738554a6d7a6b6e366a535258495245556b44314f5478524e71313674725a68796a536c4f6471446e2f667253356151594f3951766357635a6e676c6c4b7144765465546765346f596b3175566f697a4e4b51772f6d4f63305651367442715562426342386668504f52514c6351694961704435677a424a6d4e633837534151506e33724d3257695a487250385a54754a78787a37564c74356f306a646779675a34476363653941365233794d582b37584349665578746a2b6c4c6165626474626553426e42474d55324b70554c617375395631714f30686b6c6477694b435366705750395464635436302f6c4a384543747541375a50484a72377262587072366279456b506c526e734477666e51664a4d526e614d354f4f613077685732433166592b3979584c4574755063484e4e4b47497a6a4c656d5455587a526275536669794f7739365774776b6a67386a464632576c534c53794d6f6341674c37596f68302f655356666c6578512b74554676655273754a42794f78484657567072542b5759577779484f4737596f7256554e36524f3154536d746c6a6c4b6e79354275482b2f7a717256385068636b67352b6c4f692b6634566c62636935376e696b4c6572453741444f657849716c645541676a3666317732753651694d736f41473963316f7470314c4872476e686f4a414a4930773645676b4467484871526e33724937432f74777a43614d4657394278525a5957567562627a374b37496d786b774842394d342b583730582f4a566c31702b7654576436364d54356566776e6a426f757464573836506352676b4431724d4a4a6e6d624d6759534139714e756e372b796254316a6e383033494f4d494d63666e57615564574e6a45752f38546c5a5854614d676356705032665743367871476f332b695261355a324d54504c424b324551465468694d485059385950375544546139303942666c376253476d55784b6f57655676785a4f5739666b5079704f6b367648444c72553749625347614a516b4e7554744241494135507a79667a70336a635974796b765145316170426234612b49382f523355757161754946765775497a4235637368415664796b59497a6e473043756d50414c575636673664314c55504953334d3270534879342f776762493841664c76584646766370335562537841507a72727a374c30754f694c324d4166426648483578702f7057664b314b3556737a3534704b6c374f6749584467375062676d6766786131324c524f6974556c6e5150484b686777546a6c6763632f37785262614e6a7543754f61442f414268307948572b6a376d336b7973624d6a6559426e5951324d6b656f352f656c50374a495246666b776e773136785a626c3733574958314f796958593974464772504a79434d41347a7950552b39617272486a62704b6158456c6c5a53326b355a6352586b49554242332f41416b2f495655394c2b442b6b364670364d6c7a6358567738595a35412b464f655156414841397539596e346f6176506f65756170702b433474706a46475734794279472b6646592b635a7434346f5a6a696c4c6174476733335835316e57726d3675306a4d387942496f34334b71714c37647a33497a39666e564364566c4e784d34683352776b504746484a626a503735724b6444312b6655707a73595133534b514a4639522f593843746d384f394e58724b7a7570586c4d596766593468484a4f4d6a6b38553748654b2b5954797563754d756a56664276554464336d7077467677716a375433484a2f312f705770456b44746e504e5a703462644f7030333144496979504b7339715879344159454f6f35783961307551353966587437554753584a386b4c6c327a384a6e764134614e6f69375a786b56436b74727153597a4a7553506e383630627767304b485675704362714e4c6d4f4746704e6a71434e325641342f4d31722b76394c615271746d39746557714c45774133512f773247434d636a366574656d2b4869365a7563306f3063793279756b5164686c4d3435346f69366336563137713639577a3058544c692b6d6345716b4d656334376e5062387a524e3164345379614c5a6d577876546332544d4d787966695148743858722b672f4f74592b796e4c61614a314d397865544c474c617a614e647a4146747835503566336f636b5a596b33514f4a4a50526a2f5776684831643461364c623672314c7067307931754a66496a6437694e797a6b4534327178787744516a70692f654a687359624d357a576b5876566d706453336b336e334d6c3036544572357a463968354765665842372f577169363061337474566c6977753849476262774d6e6e396561704e394d5a4c3679443777356d697462474251666964797a65784f636630416f31367a6d67734f6a6456764a4474534f42732b354a34412f55697356305471495761527262754d524e6b44507a7a5770334e2f5a6452394436346c397a624c59795373436363714d707a37376775506571697437455474374d71384c724e656f76454453704d6e4333734c46547a6c52494469756c76484d6276444856526e44627266482f783436353938437444754c667153485555695a6f726473376e5841504277526e76673450487458516e6971304f71394a3273434e356c766533455731682f4d4e7253412f38416c7a576561617a4c3844357072476b63673950364a50716e55497437654e70704859345148766a31727048776f364c316e546232467269326c454f37414b4550334b636643542f6c4e512b6b656c4e4b3662627a72657a58373277492b384f537a454875426e742b566268346679576b553175306a79527378414a565151702f32613766682b6173452b7252697934334a5555577157375153756a416f34504b734d456655565573764a357a6e3971327678433645305737733076394a316f334636364270494c6a43687550355342776338594a72476843586d324b4e3254674433726e2b644b4f584c4c4a46556d5669644c6a646b545449764d315763632f444750362f77432f3071366e7477694b57353439614e3942384a6f6c4458545863786c6b55463043414b4d44304e5a33713276776a724f2f30537a4b58567461573461533452773438306b5a51456363416a6a766e4e632b4f4f55746f647a5330435855656876444b31317037624a76356f73384835723747732b3144566d75376c7054384c6c51736e474d6b65763139507972577453594d6a63594e5a33724854516c656434542f476479362b67354f63476c754b6659584c32554d756f366e484f676a75706d556a67416b672f6c56663148314265576c6c4c3573784c534956444541483139635a39364a74466d76744a4569506249344866654d342f51316e2f696472556d705877566c574c594f46586a474d6a2b756172484335554d5562414b2f6e4d7a62324a79656171705a697a62563571624d6a535979394e7757666d53444a7763317663615264586f596773336e5938486e3150705536505448694b37562f504646756836516a51417350692b6c5861615644752f416f503072484b6151364f467457774458533550776c4d664f6e6f64476d4b376c526a5767783655684f304b446a31715a4470694b43416f2b644a2b56656871776d615846724a444741775036564561336c62424752396130692b36655357545047302b6c526e36666938737274774d64774b4f475a5673584c46526e2b35675058493961734e4e315634585146796a6438566458505443784834636b66536f46316f6f7459697944637734796161736966516c346d7468646f64374663344c6775435078447656773837576c3547344739414f3359304564493367744c6c593558396539484f7154323978626a6b493638686c2f6d465531544b69584d2b6f57747a714552743479554d654f527a6e6e2f70566a4462752b6c33636f584b6771477839662f536c2b46454e7071736c753873617a545154684733386a446771426a316f2f7742563655754c65387649374b47474b7875457779746b414847446a4862312f576c763675676274374d77737a756e52636e413539756137442b796f7a50307471694e6a43336749392b55482b67726b683759323934385a41425673563166396b68476c306e58414163724e44394d62572f766d6861754c455a2b6b644a4c4168695848426f443859374672726f58566f6c6b4554455246575059596c542f414e4b50314731514361482b753941627150703238302b4f593237334342524b4f363459485037564f71735646374f63644d3677366b304747473161376d533155664371766c546a325063666b525648713269577657686d75727a6446634f2b3653524a4d412f4d37733537317032722b4332743373747635642f5a7872444749397a6c79585075634c36386670544e74396e69376b565775745257512f7a69475267702b574e74424f55464f3430625950457366322f735a763037346636566f63747748743076455a6433336d6344474d656e7055324471474c514a2f4c30526772794d717331764e684d416e47647642504a3731726b2f67363131703761654c794747324b7176384b4669646f494f5078443278556d33384449763449462b6b4156677a43473055627750516b6e2f725449354d622f414c624d6d6d37765a5365452b74336b2f55754c3634754a7a50453677695a3932446c574f4f426759552f74573067454c38513550796f4c304c776e737441366c673177585677397a4445304935554979483059592b6565445234463348646a4978776178356d70792b693052785078303841495675756f4c7a615655666439716a4f4d6b757659666b61317a7136786b734c5361545953716a4a2b51393678377753304b3076374f38757278444c496a49735a4f52734f43536550586b6476394b4e756f4464575670502f4149627146784532307235456a2b62452f734e723577536363697659356d6e6b3078753552535859456135656168665458456b643658746d41784743434278326f633655366b4f6f586252594b6d4c4444497a6e3249717668753345306d79646f41535438475350307a534c42625451374b3875343770476e507770483262323448745135386e4c513334336a322b78392b7249744d316935324b5838795167717262514f66666d72754b53363169394c5141517a7a6c526c2b634447427a2b6c5a3162496b39306a794d517a503841584e616c306c714d4f6e7a72635848784a41512b302b754f51507a72444f6f787632464a32396c4c71505373335464336357795843584452595863677775635a49372b6e623871764f6b64516e765a6f37655355496b514c474938724a6767674d50586b41382b3151622f55764e5735755a666a6c596c324a343345386e39545833686a707a6172717a4a6454764647366c6c64514d6e4235412b66723941614b4c555a57794f466f3632736d6a31766f6131314b50473365397946493541566d56782b675037566e4a366c757275363058704b65334a6254702f687530624a6d6a574b514a6863635a526765357a527430743466616a71576a2f3466704f74336474706b616d5735446f4371676a6e346741564277654d34372f4f73343066573976696c7056743933557470306b304369506c704e7150335072676a6a6a337063564837652f774c632b545452736d6e364e46705667686e5a555a385a516b635a49414250716566336f777364433039374b796c696a61462f4d324f56624f5279632f7457663674655433384833644c64484d682b49752f7741574d3548482b2b316146302f715351775246325641707953324f2f797248386278713332775a535457692b31667079574b4657745a4a4a46322f686b504f654f333172456454316936304b4f612f67414d39764730674247636b416e413450667458534d4e3862795a5968474447464463396d34465a566f76544e6d6277536167586c6b7a6e617032726e3534356f336c2b33422b6a504639737a7a542f4537566576625744527457744c75326a754e2f6d41797573636f436c735932672b6d4f3537314736653056656e704e567445544566336b7a52354f54735944614d2b754d45666b6136695870617a366b3665466c466931564347522f774157306a492f4d5972464f74656e626a7072555a4c61344b6c674e79756879724b654d2f7361305a4a636c3956534b67375945366a4a694e756348324e4431334f6b415a324a48746a314e572b7079357a6b35346f54764a6863536b49344a526746353774575249636c656836613968742f4f50347955794d44312b64594a315671582b49617a64536e6e6449783437647a577436784e35496c43734a5a4d636c65785038413631683030725358456f626e76546366733177534935514d2f4871616e6158616d5335556b44494f4b6972446c7344492b56464f673661654a53764235464d6d3151324d5735614c32776a386d41417267314c6a62464a525274786a483171524262467753546a4e6369643264424c30795841534b66444836443272324731794267302b317668446b6330686b5a48635a706f72673973314a4d5445674159705452446a4e41744638625673677952426c4949484e5664375a42346d774f4b753545347a676b656c4d7443534f654237477445474b616f7a573644324e34574864546b56634a7254434a485a787549357950576f3356554a74376f506a345432343961716f70684a41756677672b76657570424b63625a696c476e614e71384572696137763730776b6d614e344a64692f77417744456b342b57422b74644e4f753648343142474f5236567a52396d75336a6e366e755a4335557877466b32396d3577516631422f4b756e546a79534f334872534d316447527135474236716858556267657175772f65756f507368334b78366231437168672b2b444a78786a44342f7161356b3170476931613548662b4933503531306e396b426749656f566248784333593439442f4546436c614a3543714a3033464973694c74624c664f6c4f706273615362654f6549417277446b45647858304d4b327937557a676e4a79633054526b5a36596c787975635644693037376d3072436157514f356661375a323539463968387173427a5870786a35306d55557936737237534b554f476b5656505968653154736331396a3272305570527273492b4a37556b594847654b39497a587751446971645746732f4866776e61542f73374f794c744c7a734f505843722f41487a557672432f6c744e4d6c6c66756e4f4f33506f503172503841524f6f6452364e30533365433464466b636e5a6e6a507277615431423474366a72746b316e65783274326a6b5a6434514a527a364d7550365636334e676b704d6442714c6a4c3841704c714d717a753759564d35595646754e544e346f41543463383839365072547771754e5868686e4e31445a4e636765584849535762506f426a2b39586d742b414f6f6152306c507169514d6256484369384f53736b68422b4432476366504663314f57535355657a66504970626d7a4b3946437663475357504b5263356f73364974726a714739763767724b624745424e674a32376a322f6f542b64553176594e5936644d546b46546735375673486833706b576a644d32384c723863784d386750484c5977503041705761584666737a3933526d3356634c57434333444e4772746b45483539714e2f427652333154553470595a677069776a73335a51636a4f506f436679716c36776a7439593631677359462f67326f334f52794e7847542f38416150317253656c494a4e416d4268594d7a6f4274786a6e2f41475451386e57794b64706f326a7144784c306a6f63523950574f7457385454576f754c715a4a79704c5a2b474a683645676b3838342b7459703464616b64553858496232614d416d533564307a6e6154444a782b74516455384e37712b316537763841554c7766656232527049315267465165324f536654327139384e656c49756d4f706f357037785a6e32746c455842446247474635354a79423655626c474b307845492b35646d7a5865715278785273454164324f41663552327a52425a333633762b485763514563556542495341322f4a355079396631724e6454766d7537395133423759427a6a355566394b655235696c387165506c696877766d2b666f526c6e534e58304b5347796c74596467496b5a59314f3747306633357851426f6d726e567456614e55554b6f4c6438385a78526a70563961656662797a5472436c733462632f7742527857626548444a4a665845795075506c6866333966306f73726878354c76324c672b535a7566542b364b424144673435465a52343358426b366a575067624c64426a366c6a2f65744c3066556d525633414841397653736438584c775858565634793842565251502f43503961696c394b46525435325a64717a34592f5476575839523667594e586147426d586163747a786b6a4a2f72576b367532386c7577465974716433353275334c6273677a4e2f55306c4b374e3056624c5855627834724352675158326e4761793647336b754c676f69376a576b6d507a54414a426d435231694a3941536363304e726151615a3156655730625a546b4c7a36397a2b6e4e486a66474c5a7478525430447a32736b4633355254346837556357747065616661524c4a42676b444849346f615a5264613071716368547952526f647a57616b7667526a6a387143556c4b724e4653693769526f62652f755a316a69534d75783271674a4c452f70525061394539565177376c304f367555484a61474a6d2f74554c517272376a65515466686458444b78374374593033784d75374b46556b753756596d4743566a422f70546f596355757a506b3868774d762b3858466c3846335a5432787a6a2b496847442b6453596456676b58473557353765744848564856396a72576c5855496a686857556a65305367427943446e397657736731574b4f336b655745345063414469677a654c4250366a4d575a7a5668574a454c6268774d30335063776a7667596f4948565478323061344a6373526e307852766f665273477536637435714f6f2f646b635a454b444c4565354f655070673169666a753648537a4b4b755258335771514b517539632b6d50576f616178424a4c74445a394b6c6457644a614461517772595855387a746e7a504f6b556a6a4859414131515733543853754448497749394d30582b4f6f3973696e7a566f673962776e7949355279706246436c75686b4248595a725764524f6b7a39504c5a6168595472494d2f3841666261555a4a7964755649786766555a2b56412b6739506e554f6f37585462615579724e4d6b5962626767456a4a7838686e394b33786877674b62733162774a6a2f776e55724f596772357a465354327777326a3936366158426a3537347246726e70314f6d3753312b36686b6a6a4f415165654f516631725937615a5a3759534b63717779763531696e4b396d584a475547724d53312f2f77444f4c744d444b79734f5072585250325269336e64514c327a46626b4831487850584f3355624b646275794d6a4d7a666c7a572f665a4c6e614c55746135777633654946516553647a595039767a71343654596e4d72696457774b79684d4546434f61644b3570697a6c58795677446a335070543038336c726e762b645337325a314655654b43447a2b314b4a7a55523767754267592b744b686b596b687532654b5279563069367045697671384761394a714d69646e31665638764a72356c705459666f2f444c7162706e584f6f4f6e744d62534c4b53362b37724c4a4d493255597a747877534d396a774d6e6973396653396130695a4a4c2b78757264473747614967592b703756732f5433574d33542b6d7a5769346d566d7947635a49474143442b51465676555770516455576e6b334d65314d455a54676a352f74587063336e776e5058534e7350476359716c646c6c42314130787364516a75476b2b414d6f79527350302f333272517834683668314a306463614a4e4d30316848687767345647392b2f317244644b30526449684967755a6e566a6b6951672f7742714a49745a6d6930755779686d327879484c37654d6e2f5946632b506b4a53556f73764a676e7455554770332f414a6c6f386a4942444c4a6e797763355850592f6c5767364631686133396c763877416f426b45342f5435566139432b472b6c3953394f5379586763376e4b52756e42554144504872795350796f47366e365073656864666b744970576e4c524b374d654d5a4a34787a36416672565a4b6d6e4971432f34585a5a7a5774684272647866574c744e39354f3651354f5354676e76794f3361744b306d36653376493564712f774444422b4a64324d6a35316b4f6c333974456847306e6433424e477165496b73646f464674616c2b42356a526b746a39525761666b515448527754534e44676c45756f69522f69646c5a3839752f7256666f74324c6e714b5234332b4a517a7152396366336f4a6a36376d656665664c523862657837667253423168643255776133644958504739554448483535704438714c30794c78704c73312b454e3938516b352b49484e615230796b624d576c556a302b5663776638417441317666754638497970344968546e3956703176465871534a42733175354f50535061763741552f4835436772534d755477334e557a72313552615756326b5952345a594852314935775650593534716c384d4c55517858386d53775a305865526a4f4e332b763730446144312f64745a5754584567753161434d757777474c4642753766504e61466f5056396c6346517838686a675962742b762b754b542f6c5935797670676634575846485374476e3243346a424a394b786e78446b4c3951332b534342495634396363663272574e4f3142626945474d683178777735465978317063656272476f754747444f2b4350555a4f4b32516d7049794a564b6d6a503961755674345a6e596a434b57353968574277335161365863633831736e584e34734f67587a6e7673322f7151503731672f774237456479534d455a7a785631703061594a396f314c6f6d322f37615757746450516d4f4f2b434c63576a534841597277777a2b6e366b2b6c59334a65535765706254784c477856766249715a707775745531466261324f4a35574a445a774267456b35394d4147716a5749354c4f2f6b68592b61364e744d67506638414f6e4a665368386672734b656e304c33526c593769783730614b706c745858626e493744316f513666486d51524563476a6d78695a6f686e74585079536f36575063534e61496269326a49596a6763487655794e4a6c42566d334a38365362435731646e6849326e34696a633835394b5339374975413854456a31464d686b662f494d73616638415a4370737668535373532f7969716a574a476d4d554566426b594b50706e7656704e6544412f684f354934474b6932396f2f6d2b664e67757877716e2b55552f354a5073474d46485350626a52597638504b4b764b6a634437347164595453525152356249414846546b514e4356774f6539566b4470444d626552734d4f5154324970554d6b6b787554437151786357336e335a646d4f773549487a702b777432686c7733784c3645314f4d4d665a635a396355714e465667546972795a584942597136497576794b6d6a536a62385249774d664f6d50444c54377578763574646974306d537a567669634571433347546a327a2b3471387464474f764d366873526f4d416e7357502b6e39365050416e545939513658366a30365a414933786c39756362305a632f6c747a2b56466a6c634768456d34797375787144366c6f6b4976664c576562346f7a4447336c48417a674e794d384875614e2b6e4a7a4e6f566d7a7073635241454831774d5a2f5047667a7245656e744f75394a6b7549354a486a564a5769645153465a6c5066352b763631732f5373786c30473177632f43567a3943525358436e52504b6b704a4d793371614d4c7239344163714a5734373435726450737041445639552f7a4732556b6e3244442f774474574639567837656f7230486b6955357832725a2f7377794e48314865676344376d667a2f4149695563565557594d743854725742524a47717475516a6b4d4454302f66647953654d2b315172475153516a4f52566935527471743378324643316f7a615930497874586b6743704367456363556a7a4939696e4f42327a37556f7a4b47494179635a774f395a365332576b7859372b6c664f33776b65703756474e7a68786c536f504f435254736b364b6f4a3966537163694c5168376a5942794d5a373037356d527a55435a79784158346c4a3952586a543744745a536365324b5332325572507846457a4534347a3667696c47365a515274556738594170503363426778624766536e6359546a627a33465a6e6b665a366d5059734f7a723849475051597055624f79684632674675325031706f726d50345743665431715a7056764a633339744847663472757144417a6a4a786e46444849334a4a444a50366d3464426c374c524c43315741724562525a326c50724937453766307248764547382f7848717a5570535379787a474c507958346630794457397a53773654703775414668746f79646f39465564763046637a61684f5a70387335647043574a423963357274546c574b76796366446338726b526c5a67336367656d4b6c5253794f6f42596e6e3171483852342f434166317177747771386b5a7838363473704b364f306b5077416b6b5a79774e50623237354a5072555a584376747a7966616e2b5855594f52514f6d564a554f4f373773626a373936737449735775626873382f446b3156785273583548617445384b374a5a39597543774249675066302b4e616135714b73576f38694a62336c31706d316f706d436a74744f4252487058694e655751496e5554443050596a38385659782f642b6f4e56314b32754c4f445a615450456a497547594b78475363392b4b666b3850374b35554e45307352493741676a39786e3936354d386b4a64364e554d632f5263364a3470785735334c637a57622b6a4238456652687a566f4e5a6731654e332b39724e49353441494a2b5a4e5a787148682f647768696d325665772f6c4e553661566661544d474b7647665535795031484644444a6b7837787a4a504647617163516938524e4976722f515a6f724742726c2f4d5573492b34555a50627565514f315944714555396c4c4e485047384d716e444a4970566839516132684f733733543930627035386565656561627539593072714f4d51366a59787a4a6e42575663342b68376a386a5857786679556f61794b7a452f416939775a696d6e36772b6b584b586352437645774b385a373864766f61724c71396161396c6469536a7357412b5a4f613150715077763076554c57366e306135653264554c69467a356963444f4f666948314a4e5a48486c3842733843753567386d47654e775a7a737547574e314a423530334d4869516a4932393650394d6e4c7279654236316d76536b674552372f6d613048535833785949724e6c2f745271783769457353724a486e7658777430662b5566576d375631565051314a686b792f50616c52644478712f7430744c5175564766515653577476493867655275506e567672444e504556546b2f31716b4e70637953686a4f36453865583647744359635571746841625a56675667516331416c736b6d6e35554d44324e52706d753069614d66436652766176644d653552674a57336a7675497130765a6259394a705141345a7565334a70744e4c4249447649515051743371356e49634267654436557a6c5152366d6f354155692b36666e5379734a57432f42434d674435444e4748326233527456316d7966444237565a4d442f414a58782f7744665762337437397a304b3749625948585957507a372f745248396d7256326a3632564762643934676d684f65324141342f2b576a782f77425a4d524b504b456c2b4546585531673176712b704171575554737967486e4a5935346f6f364c6d6b6b30746779374e6b6843723873412f317a5554725332387257645149474e376231507654505264314d3039314334786c565966544a483978563361455a456e424e416631672b4f704c76747a4a6e6974622b7a432b2f7132356a79634e5a766a2f414f4a48575139635365583144644447446b5a78394b302f374d5632453634455934456c7049426e3379682f74526638305938715845362f69627977414341514d415636336e67687432374e5668757354374f4d397837566132302b39652b305979666c537256565268396973537363746a745878346b4233386765673572365355593450464a566757424a77324f4b447232552f7742436f535a4a63484f3048504e507a42565462676475446e6b303275426b38626a3669764a68385a594e6a3544307062526645635567746866305076583231537a4d2f484f4f394d4351457351534d38352b644c626449696b455a504a7a536d36426f2f455a41504f33737543523246504641597a36656d4258704f7a61534237563563636f4735775436656c59754f6d346e726b6b4e66457055416769692f7734734775756f4c575841335174356e62735642495036346f554232746a484a484750617449384d42485a2b66657a4861465659786a6b35647341592b654b62343050396974436330754d47776f36786b625275687239486d6161646b3873795033637534446673542b6c594e49426b6e67673973567233692f66424e4c736f46636c704a6d636a3542636631623971794e6c434b56432f4d35726635546153526b38524f6d3252584447546a74552b326a4a794d6b6e4846514764764d3274327a7838366c326274324f51337058486b6c79733638465a4e5559504979314f776669415059393661444d7663636d6e5557517153426a5076564e32522f736653514937485048595559394339515766547331316433547942586a45617169376d4a334139732f4b673646414843643839382b706f72364d3653587154554a6d6c6b4b57397541575665376b3577506c324e4c7955345532535036432f6f7138533731545672714d45704c4f38674f50526e4a583648474b4f46763069477a494446516638415a72502b673974752b70434e737871355646505041592f327854577064523339727163364c49504a445956646f4f422b6c637a4c6a6264524e45585332614739304a546a65447837314176484d5962626a4939785763363172756f584559535434497a38574167556b564b30377249775771525845666e4266584f44575234353351785a497349377957432f4b69347430646c4733646a73506c56626439495756782f7757654a332b65522b6e2f576f562f316862785271596f414a57357778794150327178307a58374b366e68433343435134796a63596f6c6b6c4353566b644d782f78586d764f6b7457577774727152466c7477374750346368697749392f77435767434738496454752b4d6a4f4b3033375230456139585275434e77745930372f414459352f65736b696b32734f516356375038416a344c346c4e657a7a2b643870744d30626f32796d3147336c654f4a3345514c79474f4d7474487563646833355074526870306a4b427a7750536f2f677831666f3354656e5841314f5357457a7543437141715141652f49397a586b39336252366a4d746e4d4a626263664b63484f56394f31614a52355364446478616a586f49344c6f3777684f5165636739716e2b66354f446e4e55466e4c764b4d652f72556e554a474b716b5a4f34307070644233525a2f664137414376524b504d415944766d6879657a756f30334a4963397a7470754954766e4c6b4d505530536948476d45386c774744676a6b65394d433643494d6968795437776f775a475944746b392f7253556139414f43647673615a785a636c515777334f38636e4e65764d416334796653716e544a574b4864773374557665524a7a2b476c3154464e6a48563977594e43743432504d736863452f386f2f2f414e43694c374f563246363730734d65576b646533664d62442b394176572b7277584d646e4241784a6856684a6b667a452b6e3655516542576f4c702f576d6b7974795263716d443668675650396136474f4e5979736163755358345a307a346c326f696d677541502b49686a4a78324935482f414d782f5368377056397434376e676d4c4837696a54784567452b68753447664a6c52776365684f332b2f375541644d543764525a53636b6f514f666d4b52364d324a38764861594b2b495577485556774f634861522b6c6148396d75344339665778595a483365515a7a6a6e672f327a575a6549736d33715363664432552f74526e396e6d3846763137705734453768496f4937416c47786e2f66725671326a466c72697a744b53344738484849347a55363275666a497a6b477169466a4d467950697a2b745434596775442b4842357250544d564538797156394f503372314a31474437446b56425a6957782f576c724734414f426d71742b79795a486462526b672f4b6e44644b38656345443171496b5a63416b347833487658724d49332b4948387146374a304c4d325346394f2f4e4c4d684f426e676535714d386d31674d6b484e4b655a414d6438386e464b6b7446756a3859513745415947653263556b763561454f64793968696e6f5a4e796b4653656539654f4633594b5a474f78726e526269363948716574445563544752657a5a374531723368375971756a68354967574d32344d52337742672f6b63316c6c71692b664847553439363248707a6662615a62524b6a43464c645a4e783957596c7366762b5752585138574737526838702f564a4152347458686d31793374654e73454f34382f356a2f6f6f6f436d684b676c574f434d3164645a3667627271532b6b3362385073474f32462b456630716738347378794f4278522b566b716641663436347757694f332f4142526b34506170304b737042427776666e3171707662714f3262644b366f6f4f636b347173752b76494c63464c5a664f595a2b4d2f68487478574c69334b30626553515943666351354937303233554e6f6b34676564544b787746414a7839617a6b3633714f75524f724670577a77714b4d666f4f4b733944365575326e677562672b5741655535335654777953626b784c6c466d686f2b356941526b6473567150684532394e554a424a2f676a2f414f70575578447967766f52337256504238756c6c714c6538696674752f3172426d64515a70784a646f563466684a62575638355a2b515037305966396e4c47514c4d31756a535a335a623339364476444345505953796e6846694148794a2f3261304b4f556d46526e73425753553348614831716d552b71364262616a4769544c7770344b6e4656452f514e724575354a4a51447a7459676a48365a6f6d6c6c2b4c6739766e587437644132794c2f414465394a553659747854394152725053554e774657334351736f7753457a6e3631483655364e2b37367a637a5842446d4c6274487079446b6b555467716a6c7966683963306d5058744c735a356e6c763449797a41454351456b62654467664d6b552f46636e53566c5353695966396f6d594472626c7677327351786e3547736c52683934354a4278774436316f336a5071746c314c31704e6657302f6d32336b78786f635979564850422b6561424a706b552b5a4775316c48723631366e77564b47434b614f4c6c34796d39685862325976724732744953424c74444d422f4c36315957596b303068512b3556504a4e55665156773178716b32375038417753635a3964772f316f6d6533447a534b52334e623155497442354d377935462b6b45756a366b6b7755626747712f6444495659595030724f6f486e3036584242322b686f713076587736714a4843397135736f2f61305059534144614f4f666e5446786272496d526e643876576e5972754f564d41676e4f6165695a4f34484e57707445576974573156546c79633037735a41514277616c536c47354a4135396159754c714f4c6a494a786d6963793673595547326265534f617472447066562b6f4e43315055624b415357396d70444d57414c4e6a4f426e7667454838785139484e4a715637466278483432634b76747a366e3556316c345a4730307178747243306a56596c554c774f573435592f4d31612b713550596964726f346d314c5174523066445831724e6278763841676552634b333050592f6c52643458546948584e4b6b4a32714c79496b6a304739633132684a6f6d685478367670467a706c744c70386a6a7a49476958594d6f702b4832494a4a794f784e6364576d6b513652635279577a73753251534c753943446b66307271702f4a48366f72446c6a7a6b7036307a722f716450503057547a4d62664c4a624875426e2b315a5a6f7556317063386643335035555a36583468364a3166596558486543796c375044655952686e2f4b63345966543838566d73392f4e61736b6c70496b4e7832444f413250516e42373068786b744e47584176704a4646346c7346366a6c2b4c41324c2b5a785258396e69394d50694c6f76414a4d6a7268683778754d2f332f4b7330363076354c692b6470377637356459473870447356526759795278527234413667305069466f4c444f54507450357131576f30746d664a546764355738774b4277324f3154664e334b447832356f6574704a4755414562527a566973354a35414b34774b7872585268325745626c6d3547443279616369754e6f594566503656414e7763633845306b584242783359314c6f73736b75393741446b48337236527a754f6533746d6f534f49427543594a3549627658715441683976776a3566765332396c306951376644672f576d6e55794164312f4f6d326d337236652b44544c794548687372364850426f485a5356394835414b2b774b4432507a723071484f51324d44745556596a4742385249486f54536c6c4877675a35344e594661327a315632697a3071322b383373664f665446624a4a637832466a4b7858454d534673447667444e5a583064624e6358364f46445962743745444f663655636452797961663072636d5a77307a7837474b2b6d34342f6f61362f6972577a6d65532b545555593750634e6353764b784473357a7648494f65615a6b694f7a676b5a395255755468687448772f4b6f387367636b6759486175666e6479624f6a6a6a78535441667172523733564c706e685a5752414141546a422b564f3650304368685357396d5a6933346f6c34483639364b6d5143516e6a623371544752744a34795253466d636442796a79474e50734c5779515277774a4767344152635a2b74574d4c4179415a414873616a4f5166774836313848496b39614235472b32584346453459426242783876657458384b4d786148657a4535486e59412b69672f3372486e755276786e6b6a4f4b30337738313230307a6f76554a70726d4f46316d6b777275417a4879307867647a7a574c4f3338656c5a72787832575868706b36592b3749424338447353522f77436c614773594541636e47426e6b38597241744a38526f656c64496c7431456233444b767879456c554b672b67372f723655493954654d6d70613545597072795753466334514e68414232776f342f5076576e48344754507670417a7a77787257326444617031626f3967483358384c754f536b575a442b3348366d6758714c786e73624a764b7462637a6e31655673416650412f31726e765565725a726b4a6951746735373478565464617649306a6b4d574a353550474b32722b4c78703732594a65584e72536f302f71627857763841567a35596e4d63513545556262567838774f2f35304c586e56563163424e387a757835424a786d672f7743394535596b6c6a372f414e4b586433445449674c42646f343537563163506a7777306b6a46504e4b66624a3933714c5354416c692b505155303835534a435353546b344a71754571454e73596b56384779635a7944322b566233476c526d744f5151644b61756250586f5a546b5273536a4435486a5035567173654a58553434507257496d62796e51717847547a6a307257756d74576976744a6a6b4c67756e77743735487251744b554b4b354b4d6b457773316d6a49595a7a373156366c704d7354466f6556376a6d694453726d4b2f74565a4742485945564a6e74446a42376575613544754d715a314f396758623952336c71776a5a57417a6a366972614c712f66384c417131544a3949567963714350656f732f5430556935564d45653150546730436d78753436735a387175374b397162683147357669426c7470376d6e6f644352446b6a6b56636156704a6e6e6a686a475763674b506d6172362b677266525964495763695853536b626e42794469756d2b674c59645036544e724e384d4c4375355559344a39415071577742387a516634632b484e74703752584639746d6b5844434d45374650397a2b314566563271706633317262517371616661487a587a3264774f4354374c7a2b644c69334a38526335704b786a716a726136306a703634754a53457662746d414b48474a487953667947663272437279514f672f6b2f774174576e57765637362f7152434e2f774230685a6b6878366a50346a387a676674564263534b566a42626b6d753768687752794a4e6f6e2f65443559543139616c43386b684b4d6a6c5a647533642f76365643473375446e506331374a49476c6955652b65666c576a543078536d347374726e554775724b57306d773464665876337a2f5770766839726939486451575771474d7a2f414857547a504b33594c6345597a366436466458764a4c55695a45334b42385170375374536a314f41796f51534f47414f635572346f736e4a74666f36763841443737554e6a7257714e5a36355a52364e614d435575556b61514b665150783639736a2b6e4e62665936375a6174614a63324e314465577a66686d74334471667a46666e56616c726559734849556a6b55536450646161723072644762533951754c426e3459323737642f3148592f6e5761666978663841523043337337355335337166697837412b744c3839684947475063483272472f436a7835303771537a6730375862684c4c5631776f6e634249702b65446e737265344f426e7433774e5a4d7757586a766a74584d6e46776453427232695930357a6b735144795254676d4135334448714455465a67667848763674337231326a4b6b34497a783370614a736d764e355a7a6b6e4935353756486d753163676e4f65324d385648655646634463547a67456d6f6330366c384a7a3878517568792f4350796250484568795433394b2b324e476638416b39434b634b4463587868436563306c42687345686733503072467861326568547042373466784178795350384c4b42332b6566394b643853373379744b7434564a4a6c6b79662f41416a2f414b69705053576d424e4f79784f53323750766744412f725178346e336d4e5374344132516b494a4873784a2f73467272772b6b446d7665625149537a4d4679704178334270486e626b656d4a47336a61514133634450656f5770617662365a626b3342325a4841484a4a3971354535577a7152333254556b5862764c4436553545527433456a4a5047445149335873435074454c4652774275464f4c34684934557061715237622f774470532f686b393050556f30477246686867355559705379676b6b734f336567762f414c6637324369334746372f4142642f327157765554505a7263756f694466796b31654c78357a6e53514d3873594b792f7672364b7979375344746b45304c616a3161544352627a4d4744647a36443836714e613177336b545271334a352b7444516b44376c4a496250507a7274513866486a6a2b7a6e543869546575693962567070306b38795a6e5a75354a7961696666436f4371526739732b6c52496d42794151534f474f654b616c6e556e59462f447a6d7443545768536e364a737376384d4433397153726b7170444145446b453471484e4a6c683355656e7454586d6c48354f45786e4a6f3467536d79653930774a4948486f5253664e4d70336c734661687979414b6f56676f50494a70496d4a4a586b4e6a7636476f323773564c736e43646c7951426a74696c4e4d305478746e4b4831714235327a617538647334466643585964702b4c3142393665355771425261666563416b594a7a3339714a4f6b4e624e746572627353456e4f44375a394b4441755842554842504f4b73644d6c435843766b67717749464447305531744e6d36644f5333476e5844722b4b462f692b6e306f347437694f6441516432654d566e326c617435397759347a6c4e6f49624e45556434454b685732734f655057737562447a647047754f6531544362377076474e6f392b4b62613278786a422f72555730313164767864753346573055735534566b494a724134796a326149744e57697457315a6d4f463542356f68365373676d71524f526b4b32525552555653547744566e704677734c626c354f61474e734f30747331622f477a484549596d4f534f574237566b586944346749323753394e6d4c687a69356d4841782f6b4239666d66793936722b7276456c46696b73394f6d4f526b5458434545592f79716637316d4539386267376c50347657757a34766a38667449777a6c7964734a6f373879674e6e497a37302f4e6671306c7575655333417a51354450736955413976656e55756c476f572b54786a3148593130656d597064687246645a343359482f4e586a584b2f3468474e7777464a71695455414a4d4668742b644b532b56745256633541552f465557785657456b3079733231686b45657444316c49326b7a5830455247777348786e6b452b33742f77436c4b756453776f2b4c6e4e44732b72676172656f47356456626a354166372f4b676c2b673452765165576d70686f31566d4162626e6b39365844654d38677a6e6167786e50716144494e61575059547a6b484f545537547459574b4e544b77354a4a4a4e4274456b673130322b6b4d7a766e4338686131586f4c375239393062596a54373242746274462f34524d7857534966355132446b664939717759613739394c52772f42426e6c782f4e554762714a45754461577145454862774d376a366d676b6f7a5847534578615437503054385038417846302f784636652f77415573466b675a58387161336d78756a594450636477633848362b314562334c46535165652f65754950732b39545848546e58326e68704757472b595773305237454f634b333142782b2f76585a6b633556384544474d59726c35735378765854484a323254354c6e4b4b44794f2b632b74527a644b4d6241796763595539716a75342b496b344f655061764449534d635a487457514e364f4462337738747458576434346a707a676c55413555676570482f555547366c30547147694d5a4a6f306c67556a4d714e775071447a5734793343624f4238514f5451523469616d486773374f4e68756e6b35583049482f5569747a38654d33592b4f5763576f6964476449744f68694235564157412b645a6831726366662b6f4c6c7367684743382b6d41422f6174516446736261576232544a507941724674526e4d74354a4b472f346a6c6950636b354e566d61686a735a6754655279474a6f746f4a586c7365766f4b48646630526457654e70476234464941486f4b496e6e4c7354743961727234504753784f463968584561664c6b64656c4a55774d6c364874586c55744e496e73777763302f44305841696e456a6e6a48784841712b7a75586e672b6c51395831574c536f63764943352f434b663873335551666a676f37425857374778306164556a6379736557793341717576745a612b6752643245516643414d564131473761356e6d6b645351654d6e3071484849466a594d52674441596d7570676734625a7a4d732b5571525053354478417163766a61445463652b476644747563633077743059343078337a67676a74587339776979636b767535474f4d55394e62417539456e63376f54475350376d6d596e5a6435666e6e427a33704a6e5a4e7851636363556870444b51546b5a504f4b4e644130304f4c4f5a4847374734656e79703657546344687433474d436f556b6e4468635a42394b64457365786d43674f63597a5569714a326645426f7964684a492f4d5635484b44475475777939732b314b387734486447507655666163755748352f7744536973485873653268553362695750714f394f7848796e2b4c384a484a5070544565537934626b2b395037796f4b6267635a4a4a396146464e30544958495859446c68362b39536f66345144642f6571735857304b4647574f50537063556f474f4d41306165794a32364e6336543175324f6a777979763562782f77324750336f6c736279337579786975504f2f774464394b7833514c35664f6a747966686b62622b746162307230394a5958547a53536c7849423849474142545931374c615661434153386c577a674442433855725439587662505546556e66623834794f514d5569654233576377482b49464a556650465a2f65645958746e4b4338325a4f6366434d4c2b51485035304538536d69386263566f31612f366f7533755972644c5a7847635a64426e503530587968756e656e6a645847304d2b5248474d6b753250384165617854707a726534696353337838364a54754143674e6a2b6c534f7166453639366a64424732324e4273534d676677783873667566576c342f485564445735545778335570547338754e734d547a6d76594e716f426e75507251336158303134573339757778567046644b534e7a4145447658525670555a3558566c7439347752794f4b52424b5a4e51556c754d66705665626e4765426e7347373145744c38767142587350664e556c5975676e613556584f5069396554785463476f6c745568394649497856564a6643475844484f6655564646773431434a6c4a41422f53726a524b6f4a4a372f3841687a4b654d47686162557932704d775971526b456534716664582f2f41482b52482f43777a517a4f344e367744454d44334e4a6253646c784c746455597949703558734d5659576c3735737932346676334a3942517444634c424f64784c4265654433716470562b3575464371437a484c63656c53375a636b6b6736754c7462477a4b4932546a6a4653756c3756555837314d663478375a394251753130743971567462676b46796433484141356f77743577736952673556467838714672657a4d326c47776b3071344b366a356f596f56494b6b48317a6b563176344e2b4a533961614d316e644f493956737874594d32544c474f424a6e31506f666e7a363178544e7141745172416e7a474f4d4432394b5065682b70376a7033564c505549574b7a516b4d52364833423977653149795257526358333643692f5a3232386854676338667254597978334541676a74554b77316144553747473768496547564136737649494e546f4a465963594a786e69755056646a62544f53627a793449476157356967556e47365a676f2b6d54576636795675757062566e5950484568634d7241717739786a754f4b5872306836323165574b306e6357786b5a3478504a6e626e6b6e413953636e41392f6c6d71337033545a50385676493533453333636d484b387163484839713671303654474c73754f6f645145505474784b5068336f56416235316b44426e596841474f4d38316f2f694e634c446f385345343353416a487942724f6c6e5653726635683378365669386d53576d62664739746e6a7145446b6a445971727670544d704142424871665770576f58636351387763716668436b2b7676516c72327643315230584766664e5946393378523055346b725662364f77684d6b684450364b4f352b645a33713136327058444d484a48595a50464b764e542b39655938737535786e497a7a3871715249694d4735592b7131747834464671527a386d586c614679534f30546a4b73414d466836307778663775684b397a7754536a4b475233436763396854556b78614d4c75394f316442556b5a4c51705a557775385a7878333747767033614f5038656345385937557a4c4951692f446b41354a46535a674a62646e41477a326f47746c58756a31483875414e6e50484f5436556c4838374f654637307737487967414f4350656e494a6b5a41696b695431714c5155705569537a4c456f6344446b59347076594377474351527765314e764c75566c794d44676d6c52334c684e6f2b494c774b7474506f714446755632766b45766a414f65314e7879484f577a6a30785339792b56385752363470454a2b4a634447654d5566374a4a5778526b567077546c7a36656c4f6c47592f356965536156497355556d567754366b2b6c4a5352434377475750427836696857774b326537575751456b455a77434455314a684a6c564f4d4873525659577937595062746e307038536d4c6b454273637454493643533257566c64694a7873624c71633572632b6a645a47745753535a444d4d4b347a325072574251534c486a676c322f6d394b4c2b6b4f717a6f563445596b777945427a37664f6957324d70473953776f713543344a484a724f6570656a413138313348494568413365556532667236555a793637446136656c786354496b5247643263352b6c5a4c315831315072457a77322b364732505a41652f316f6c7036464a4f396a6c3171636d706d4f327459736763626b2f765430794a706745434f4a5a582f414248322b56566d6b58763353796b6b436f6a6e6a4c6d6b616449317a6547346b4f5143635a39363051536b72596130715152514577514b67476365767255794e6c4b687a775750414e5673633545687751772f656e664f33526b343550595564366f55322b6d546d75496b5948323950536f316d7a5071684f4f4237647162526a49783348345236415533624f73476f354441656d4b6e5262525a58467a746b59486b35714265536678316447776638756539537239764c64736b4b6366694171756e6b56796f62385841426f464a41716b36592f714679354d5a336334427a3635716c4e7737332b396a6b452f46557a5658486b49636b4c3234717074706c456f51743848715436307249306e7370745757567a4969334a5a546c4d646750577254515359316c754749594e6b4c6a6767554e585633695a676e43646a6a36643664733953614e4a4d5a4159594148624e49557970494d2b6d3556754c7957637275327468545278617a6641574b374d386b566e3353617951326754494754757a363053332b6f473074676d372b49336f4f3570744b534161715261574d683148565449522f446950485047614c4265375371416e34752b5053672f702f4e76623550444e79633164615a496269344a664f41653261463742794f6e534e6c384f50464739364f6b52477a643661352f693237486c542f6d58304234487950373175756a2b4b576836314235747450494841472b4a34324258507a3748386a584a4d647a764156654d2f7452503052314574694c69476334556368674d6b6d73576646613549474c34765a587739423650707859374a4c6a6e6c58633450365972367930654f7a65364e737364764675334b6a4d546e6a6e3539383149315471437a30754a7070706a744137446b3146745846317376464c425a426b4b3373615a616a7330705076305a703473616b6f7662613379443561456b44334a2f3643732b6e31455173476c624b342f434467315a654c65744a46314464766b5958344e6f50734f61797135314a376a652b35746f35427954574c4e6a2b57646d2f472b4545776a316e71685972622b4332356a324f4f3142313565764d6838776c67783548714b693354544e4d694b646f5078466961616b755368324666346a385a48725449345978412b5a394d53304d615350496d576a4934393669484f3867734e7871595a676265544177564874696f4c70684178664c6477414b3266564a49564a33304f68664c694446753263676574654c4772625742777550583370506d3730574b59375578786a33706841596965526854787a336f627069307863724643435351426e4139363838317042676e5950616b794e764f5132443270414f7a43594a4a39614753566c756d3748354d66416f6236476b6f4e6a6b453433634531345a465a776a446b44672b314f53456c4146582f7865744d6972566c4e336f5752473441417752372b3165786f457a6868337a54586d4464384a77666d4b63643978327479666c565556462b68546775537a74674874544f534a52744a3267647a58752f4a436b5a394f6163456f6b556f716a4139666571643942306a364550754f34416a423570364f585a455152744e52386c7051435346483961666e5544497a75485955794b4a307a794e77654a4f6339754b386c496a597177794f777236454677642f4344676976764a6a644e3253526e6a6a6d6939684a50736c71463870447549595a48486570554e797633635a4179764761683272596b5652794d2b32615862686c33457147417a6a3876576a74524b75793675756f4c7161775332615a70594535525750346168323068755758484a4a7a6a4e4d4d775a565944412b5270323154644b4e7677456e6b6968663543746c6e755971714467477243427842434669556e2f414a6d46516f634b7557623467635971584334585a385a444b4478696e7832396937625a6178796b4d4363426950576e6c6c4c42774f4d39766171394a316d662b4a38434c3645314c535663425133413978527861737070746b32435154446748747974525a32574b395669636473416436565953625859484a4a37633071394354414d5632754f357a3246464c544974374a39334a7667446e3468786971573564706269506b355431375a713374376a7a4c514b36686c486571692f5a5957444b44676e676471577153416b5036684766754a4753646f33597a513745366b676b414d546a4a3961496269624e6b344b342b4849624f63304c7336796b4265366b6b664f67793759574e63746a73376d4a506958427a32466578584245536f7677687565615a6b4c46742b2f613373426d6e5632744b4f4e7a456471782b365962757468373030534542593751423739366c7846372f55677248436735482b6c562b6b576b38656a6f4569597449636b3936764e433039726342322b466a6b6e4a70366162305a3965676a746e43434e63344f336e6d726d79554b454942335a37304c7933367867474d4b534f35504e54375055705a647057514b423341346f704b67587032464d55727868736762665450765474726547334476774e783961703474526a614c63374e67656e656f35754a377079596f7a744841394f4b4330317354467479333066613576314f61337339323158634d5742394256727166694c706654466a4d4c70386d452b584645702b4f55676334397672574c64546465334975494c6c4239336d6951695062794154362f7744725158656131633677373346784b5a4a69535337415a5076534d6646726b2b6a6f796258315176714871435457722b6565584c4d376c6a36397a564b6438734a45654274354441392f6c535a3541752f59434741775366576f4e74637954376c2f43523346466c635875674f54704a6e7330736b317366694164543631434c656238522b4b51385a7a33715449362b5a74334563667255575751784f56544372675a3470616266525456717875356352445a6e4a4a3577612b525146417a6b5a37413136714c4b77503834374835313447456368424878413835394b70375a537638696c58664554787763595070544f7a4a59412f504761654c466668555a556e6e4e526e625a4a7641794d34707263577149313751714a6972627a7961396e6346316372676e7563313637494f4642424979612b5170494153447832705767346f584979435663444a4650435a6c5463467774515a70417368664752697045552b423850504752524a6c4e30787956636f4e764a3735487239613952746f41504a50633137484a2f435534776636313847477775724450714d5553596171724553794643426a5047666c5359397866626b41347a785870597543534f4f324b38326371352b46514f4150576d396f584c62736569636873446b2b6f4e4f7a736855766767396a67303067335337386e4f4d436b6c4849626e4b34795451702b694e736b5262416e444d51652b66656e464c4656424143676b35704545694e436477624978323961384d6d774b4d6e5954563336445431324b6537614e74694a74552f7a6539534a4a43636431774d466169547a49416a41636567703253565a63455a34356f6c587369657a37617a7343724d6f2b5876562f7038424d49596a4f54676a48725648444c384f7838675a347852523036676b7431696b2b4c6432592b6839364f4b3248463759777a72356f513973642f6e537a4d79674c75445364732b6c4d33492b37337a786e424f6554534c75526c64537676544872516d55576e5a59623543447741514f315372653549516a634562676b6b63315869516a423363455a3756386b366a442f414973314975746a4671697774705a494a6d6d33746a50465773733633554f3973625750475065715a746749424a5a57486232715a476f6d696a4366434d2b2f616d386c4e57694e5673754e4c517368516a4334396651564531693157535664736756514d6252794b64735a774143574a4765507254477275796b4d426c536347686b725767462b52755750466f357747327237386d6835575863784334623077503631655763797951797152755941347a3756524e4e74754a454179755057737332364b57694b41384d353373446b39314861704d622b5959686e6e642b4d656c523937475861764761734e4e743432686431554b46377457574f78725831746d6d614c66384133617969334c756a505972794b7535664a6a747a497375344e7a394257656150316b756b325974706f664e554546535061725639666d314745704447766673654f4b31787037526c554c746c7a4c6532566f67587a417a4f636251655438365461612f42472f6c2b55632f7935396144312f6a3342335a5751383539674b735836685733437159313370384959726b307555333048386630447579755a376a62756a45434b66773977667a717a7562316b6a58624e73624f447478576278645a5479794c4757624c6468365666365471597562636c775762504a4e584b63616f536f71376f2f2f5a, 19, 2, 1008);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo`
--

CREATE TABLE `platillo` (
  `id_platillo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `id_tipoplatillo` int(11) NOT NULL,
  `id_ingsec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `platillo`
--

INSERT INTO `platillo` (`id_platillo`, `nombre`, `precio`, `imagen`, `id_tipoplatillo`, `id_ingsec`) VALUES
(1, 'Taco de Chorizo', '8.00', '../images/menu/tacoschorizo.jpg', 1, 2),
(2, 'Taco de pastor', '8.00', '../images/menu/tacodepastor.jpg', 1, 1),
(5, 'Taco de Costilla de cerdo', '9.00', '../images/menu/tacodecabezadecerdo.jpg', 1, 3),
(8, 'Agua de Horchata', '25.00', 'images/menu/AguaHorchata06:02:13_PM.jpg', 4, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo_pedido`
--

CREATE TABLE `platillo_pedido` (
  `id_platped` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_platillo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `id_privilegio` int(11) NOT NULL,
  `privilegio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`id_privilegio`, `privilegio`) VALUES
(1, 'Admin pedido'),
(2, 'Admin atributo'),
(3, 'Admin usuarios'),
(4, 'Borrar usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_publicacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `titulo`, `contenido`, `fecha_publicacion`) VALUES
(1, 'Feliz 5 de Mayo', '<p style=\"text-align: center;\"><strong>Ven y festeja el 5 de mayo con nosotros.</strong></p>\r\n<p>En nuestra sucursal de Parque Celaya tendremos una gran fiesta</p>', '2023-05-30 07:27:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `id_puesto` int(11) NOT NULL,
  `puesto` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`id_puesto`, `puesto`) VALUES
(1, 'usuario'),
(2, 'administracion'),
(3, 'repartición'),
(4, 'atención al cliente'),
(5, 'usuario'),
(6, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_privilegio`
--

CREATE TABLE `puesto_privilegio` (
  `id_pupriv` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL,
  `id_privilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puesto_privilegio`
--

INSERT INTO `puesto_privilegio` (`id_pupriv`, `id_puesto`, `id_privilegio`) VALUES
(1, 2, 2),
(2, 2, 3),
(3, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_social`
--

CREATE TABLE `red_social` (
  `id_red` int(11) NOT NULL,
  `red_social` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `red_social`
--

INSERT INTO `red_social` (`id_red`, `red_social`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Instagram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_sucursal`
--

CREATE TABLE `red_sucursal` (
  `id_sucurred` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_red` int(11) NOT NULL,
  `enlace` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `red_sucursal`
--

INSERT INTO `red_sucursal` (`id_sucurred`, `id_sucursal`, `id_red`, `enlace`) VALUES
(1, 1, 1, 'https://www.facebook.com/TaqueriaBininiGrillos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `id_tipohorario` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `mapa` text DEFAULT NULL,
  `imagen` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`, `id_tipohorario`, `id_ciudad`, `mapa`, `imagen`) VALUES
(1, 'Aztecas', 'Aztecas # 823 col. la joya', 1, 11007, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.458092283225!2d-100.8292632!3d20.528429599999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cbaee6c822355%3A0x796c6daaa87ad7e3!2sLos%20Aztecas%20823%2C%20La%20Joya%2C%2038040%20Celaya%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1684723661084!5m2!1ses-419!2smx', NULL),
(2, 'Parque Celaya', 'Eje Nor-Poniente Manuel J. Clouthier 801, Zona Industrial, 38020', 2, 11007, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29888.22148549374!2d-100.87537958916013!3d20.54604809999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cbadbd832fc25%3A0xae76fb42b3103164!2sTaqueria%20Binini%20Grillos!5e0!3m2!1ses-419!2smx!4v1684724692420!5m2!1ses-419!2smx', NULL),
(5, 'Matustino', 'dfdfdfdfdf', 2, 2001, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_sucursal`
--

CREATE TABLE `telefono_sucursal` (
  `id_sucurtel` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `telefono` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `telefono_sucursal`
--

INSERT INTO `telefono_sucursal` (`id_sucurtel`, `id_sucursal`, `telefono`) VALUES
(6, 1, '451 25 64 545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_pedido`
--

CREATE TABLE `temp_pedido` (
  `id_temp` int(11) NOT NULL,
  `hora_pedido` time NOT NULL,
  `comentario_general` text DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temp_pedido`
--

INSERT INTO `temp_pedido` (`id_temp`, `hora_pedido`, `comentario_general`, `id_cliente`, `id_sucursal`) VALUES
(17, '07:25:15', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_platillo`
--

CREATE TABLE `temp_platillo` (
  `id_temppl` int(11) NOT NULL,
  `id_temp` int(11) NOT NULL,
  `id_platillo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temp_platillo`
--

INSERT INTO `temp_platillo` (`id_temppl`, `id_temp`, `id_platillo`, `cantidad`, `comentario`) VALUES
(22, 17, 2, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_uc`
--

CREATE TABLE `temp_uc` (
  `id_tempuc` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temp_uc`
--

INSERT INTO `temp_uc` (`id_tempuc`, `id_ubicacion`, `id_temp`) VALUES
(14, 1, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_horario`
--

CREATE TABLE `tipo_horario` (
  `id_tipohorario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dias` varchar(30) NOT NULL,
  `hora` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_horario`
--

INSERT INTO `tipo_horario` (`id_tipohorario`, `nombre`, `dias`, `hora`) VALUES
(1, 'Vespertino', 'Martes a domingo', '15:00 a 23:00'),
(2, 'Matutino', 'Todos los dÃ­as', '11:00 a 19:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mensaje`
--

CREATE TABLE `tipo_mensaje` (
  `id_tipomensaje` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_mensaje`
--

INSERT INTO `tipo_mensaje` (`id_tipomensaje`, `tipo`) VALUES
(1, 'Observación'),
(2, 'Sugerencia'),
(3, 'Queja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_platillo`
--

CREATE TABLE `tipo_platillo` (
  `id_tipoplatillo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio_base` decimal(5,2) DEFAULT NULL,
  `id_ingprinc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_platillo`
--

INSERT INTO `tipo_platillo` (`id_tipoplatillo`, `nombre`, `descripcion`, `precio_base`, `id_ingprinc`) VALUES
(1, 'Taco', 'Un taco es un platillo tradicional de la gastronomía mexicana que consiste en una tortilla de maíz que se dobla y se rellena con diversos ingredientes. Es una comida muy popular en México y en otros países de América Latina, así como en todo el mundo, debido a su sabor distintivo y su facilidad de preparación.\r\n\r\nLa tortilla se calienta en un comal o sartén hasta que esté suave y flexible, y luego se rellena con los ingredientes deseados, que pueden variar según la región geográfica y los gustos personales. \r\n\r\nLos tacos son una comida versátil que se puede disfrutar en cualquier momento del día, ya sea como desayuno, almuerzo, cena o incluso como un bocadillo para llevar. Son una parte integral de la cultura culinaria mexicana y han ganado popularidad en todo el mundo gracias a su delicioso sabor y su fácil adaptación a diferentes preferencias alimentarias y culturas culinarias.', '8.00', 1),
(2, 'Torta', 'La torta mexicana es un sándwich tradicional de la gastronomía mexicana que se elabora con un pan blanco de forma ovalada y suave, conocido como \"telera\" o \"bolillo\", que se corta a lo largo y se rellena con una variedad de ingredientes.\r\n\r\nLa torta mexicana es una comida muy popular en México y en muchos otros países, debido a su sabor distintivo y su facilidad de preparación. Se puede disfrutar como un almuerzo rápido, una cena ligera o incluso como un bocadillo para llevar.\r\n\r\nLa torta mexicana es un plato que ha evolucionado a lo largo del tiempo y que ha sido influenciado por diversas culturas culinarias. Es una comida versátil que se puede disfrutar en cualquier momento del día y que ha sido parte integral de la cultura culinaria mexicana durante muchos años.', '30.00', 2),
(3, 'Quesadilla', 'La quesadilla es un platillo tradicional de la gastronomía mexicana que consiste en una tortilla de maíz o harina de trigo, doblada por la mitad y rellena con diversos ingredientes.\r\n\r\nPara preparar una quesadilla, se calienta una tortilla en un comal o sartén hasta que esté suave y flexible, se agrega el queso y los demás ingredientes, y luego se dobla por la mitad para crear una especie de empanada. \r\n\r\nLa quesadilla se originó en México y se ha convertido en una comida popular en muchos otros países debido a su delicioso sabor y su facilidad de preparación. También existe una variante llamada \"sincronizada\", que es similar a la quesadilla pero con dos tortillas y una capa de jamón o tocino en el medio.', '20.00', 3),
(4, 'Agua', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_cliente`
--

CREATE TABLE `ubicacion_cliente` (
  `id_ubiclient` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `direccion` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion_cliente`
--

INSERT INTO `ubicacion_cliente` (`id_ubiclient`, `id_cliente`, `id_ciudad`, `direccion`) VALUES
(1, 1, 11011, 'P. de La Juventud 504-int 1, Centro'),
(3, 7, 21015, 'Camino de los huacales'),
(5, 1, 5018, 'Camino del maÅ•quÃ©s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_pedido`
--

CREATE TABLE `ubicacion_pedido` (
  `id_ubiped` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(32) NOT NULL,
  `token` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`, `token`) VALUES
(1, 'mych7461@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'fba1c59c73bc8298431ea7739bcb6761ccd1aa48d1ba8767816d6be5592cce34'),
(2, 'cliente1@gmail.com', 'c8ffe9a587b126f152ed3d89a146b445', ''),
(3, '200@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(4, 'cliente2@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(5, 'cliente3@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(6, 'cliente4@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(19, 'Bae@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(25, 'juanx@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(27, 'kenlw@gmail.com', '202cb962ac59075b964b07152d234b70', NULL),
(29, 'mych7462@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(30, 'luislayo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(31, 'nuevousr@gmail.com', '202cb962ac59075b964b07152d234b70', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_publicacion`
--

CREATE TABLE `usuario_publicacion` (
  `id_usuariopublicacion` int(11) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_puesto`
--

CREATE TABLE `usuario_puesto` (
  `id_usupues` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_puesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_puesto`
--

INSERT INTO `usuario_puesto` (`id_usupues`, `id_usuario`, `id_puesto`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 1),
(4, 2, 6),
(5, 3, 2),
(6, 4, 6),
(8, 4, 6),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(13, 19, 1),
(15, 19, 2),
(17, 25, 1),
(18, 25, 6),
(19, 27, 1),
(20, 27, 6),
(23, 29, 1),
(24, 30, 1),
(25, 30, 2),
(26, 31, 1),
(27, 31, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora_pedido`
--
ALTER TABLE `bitacora_pedido`
  ADD PRIMARY KEY (`id_bpedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `correo_sucursal`
--
ALTER TABLE `correo_sucursal`
  ADD PRIMARY KEY (`id_sucurcorreo`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `ingrediente_principal`
--
ALTER TABLE `ingrediente_principal`
  ADD PRIMARY KEY (`id_ingprinc`);

--
-- Indices de la tabla `ingrediente_secundario`
--
ALTER TABLE `ingrediente_secundario`
  ADD PRIMARY KEY (`id_ingsec`);

--
-- Indices de la tabla `ip_sucursal`
--
ALTER TABLE `ip_sucursal`
  ADD PRIMARY KEY (`id_ipsucursal`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_ingprinc` (`id_ingprinc`);

--
-- Indices de la tabla `is_sucursal`
--
ALTER TABLE `is_sucursal`
  ADD PRIMARY KEY (`id_issucursal`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `is_sucursal_ibfk_1` (`id_ingsec`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id_mensaje`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_estatus` (`id_estatus`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_ciudad` (`id_ciudad`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD PRIMARY KEY (`id_platillo`),
  ADD KEY `id_tipoplatillo` (`id_tipoplatillo`),
  ADD KEY `id_ingsec` (`id_ingsec`);

--
-- Indices de la tabla `platillo_pedido`
--
ALTER TABLE `platillo_pedido`
  ADD PRIMARY KEY (`id_platped`,`id_pedido`,`id_platillo`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_platillo` (`id_platillo`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`id_privilegio`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id_puesto`);

--
-- Indices de la tabla `puesto_privilegio`
--
ALTER TABLE `puesto_privilegio`
  ADD PRIMARY KEY (`id_pupriv`),
  ADD KEY `id_privilegio` (`id_privilegio`),
  ADD KEY `id_puesto` (`id_puesto`);

--
-- Indices de la tabla `red_social`
--
ALTER TABLE `red_social`
  ADD PRIMARY KEY (`id_red`);

--
-- Indices de la tabla `red_sucursal`
--
ALTER TABLE `red_sucursal`
  ADD PRIMARY KEY (`id_sucurred`,`id_sucursal`,`id_red`),
  ADD KEY `id_sucursal` (`id_sucursal`),
  ADD KEY `id_red` (`id_red`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`),
  ADD KEY `id_tipohorario` (`id_tipohorario`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `telefono_sucursal`
--
ALTER TABLE `telefono_sucursal`
  ADD PRIMARY KEY (`id_sucurtel`,`id_sucursal`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `temp_pedido`
--
ALTER TABLE `temp_pedido`
  ADD PRIMARY KEY (`id_temp`),
  ADD KEY `tpedido_ibfk_1` (`id_cliente`),
  ADD KEY `tpedido_ibfk_2` (`id_sucursal`);

--
-- Indices de la tabla `temp_platillo`
--
ALTER TABLE `temp_platillo`
  ADD PRIMARY KEY (`id_temppl`) USING BTREE,
  ADD KEY `id_pedido` (`id_temp`),
  ADD KEY `id_platillo` (`id_platillo`);

--
-- Indices de la tabla `temp_uc`
--
ALTER TABLE `temp_uc`
  ADD PRIMARY KEY (`id_tempuc`) USING BTREE,
  ADD UNIQUE KEY `id_temp` (`id_temp`),
  ADD KEY `id_ubicacion` (`id_ubicacion`),
  ADD KEY `id_pedido` (`id_temp`);

--
-- Indices de la tabla `tipo_horario`
--
ALTER TABLE `tipo_horario`
  ADD PRIMARY KEY (`id_tipohorario`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tipo_mensaje`
--
ALTER TABLE `tipo_mensaje`
  ADD PRIMARY KEY (`id_tipomensaje`);

--
-- Indices de la tabla `tipo_platillo`
--
ALTER TABLE `tipo_platillo`
  ADD PRIMARY KEY (`id_tipoplatillo`) USING BTREE,
  ADD KEY `id_ingprinc` (`id_ingprinc`);

--
-- Indices de la tabla `ubicacion_cliente`
--
ALTER TABLE `ubicacion_cliente`
  ADD PRIMARY KEY (`id_ubiclient`,`id_cliente`,`id_ciudad`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `ubicacion_pedido`
--
ALTER TABLE `ubicacion_pedido`
  ADD PRIMARY KEY (`id_ubiped`,`id_ubicacion`,`id_pedido`),
  ADD UNIQUE KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_ubicacion` (`id_ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `usuario_publicacion`
--
ALTER TABLE `usuario_publicacion`
  ADD PRIMARY KEY (`id_usuariopublicacion`,`id_publicacion`,`id_usuario`),
  ADD KEY `id_publicacion` (`id_publicacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario_puesto`
--
ALTER TABLE `usuario_puesto`
  ADD PRIMARY KEY (`id_usupues`,`id_usuario`,`id_puesto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_puesto` (`id_puesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora_pedido`
--
ALTER TABLE `bitacora_pedido`
  MODIFY `id_bpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32060;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `correo_sucursal`
--
ALTER TABLE `correo_sucursal`
  MODIFY `id_sucurcorreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ingrediente_principal`
--
ALTER TABLE `ingrediente_principal`
  MODIFY `id_ingprinc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingrediente_secundario`
--
ALTER TABLE `ingrediente_secundario`
  MODIFY `id_ingsec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ip_sucursal`
--
ALTER TABLE `ip_sucursal`
  MODIFY `id_ipsucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `is_sucursal`
--
ALTER TABLE `is_sucursal`
  MODIFY `id_issucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `platillo`
--
ALTER TABLE `platillo`
  MODIFY `id_platillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `platillo_pedido`
--
ALTER TABLE `platillo_pedido`
  MODIFY `id_platped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `id_privilegio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `id_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `puesto_privilegio`
--
ALTER TABLE `puesto_privilegio`
  MODIFY `id_pupriv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `red_social`
--
ALTER TABLE `red_social`
  MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `red_sucursal`
--
ALTER TABLE `red_sucursal`
  MODIFY `id_sucurred` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `telefono_sucursal`
--
ALTER TABLE `telefono_sucursal`
  MODIFY `id_sucurtel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `temp_pedido`
--
ALTER TABLE `temp_pedido`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `temp_platillo`
--
ALTER TABLE `temp_platillo`
  MODIFY `id_temppl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `temp_uc`
--
ALTER TABLE `temp_uc`
  MODIFY `id_tempuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_horario`
--
ALTER TABLE `tipo_horario`
  MODIFY `id_tipohorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_mensaje`
--
ALTER TABLE `tipo_mensaje`
  MODIFY `id_tipomensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_platillo`
--
ALTER TABLE `tipo_platillo`
  MODIFY `id_tipoplatillo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicacion_cliente`
--
ALTER TABLE `ubicacion_cliente`
  MODIFY `id_ubiclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ubicacion_pedido`
--
ALTER TABLE `ubicacion_pedido`
  MODIFY `id_ubiped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuario_publicacion`
--
ALTER TABLE `usuario_publicacion`
  MODIFY `id_usuariopublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_puesto`
--
ALTER TABLE `usuario_puesto`
  MODIFY `id_usupues` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `correo_sucursal`
--
ALTER TABLE `correo_sucursal`
  ADD CONSTRAINT `correo_sucursal_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `ip_sucursal`
--
ALTER TABLE `ip_sucursal`
  ADD CONSTRAINT `ip_sucursal_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `ip_sucursal_ibfk_3` FOREIGN KEY (`id_ingprinc`) REFERENCES `ingrediente_principal` (`id_ingprinc`);

--
-- Filtros para la tabla `is_sucursal`
--
ALTER TABLE `is_sucursal`
  ADD CONSTRAINT `is_sucursal_ibfk_1` FOREIGN KEY (`id_ingsec`) REFERENCES `ingrediente_secundario` (`id_ingsec`),
  ADD CONSTRAINT `is_sucursal_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_mensaje` (`id_tipomensaje`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id_estatus`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`),
  ADD CONSTRAINT `personal_ibfk_4` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `personal_ibfk_5` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`);

--
-- Filtros para la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `platillo_ibfk_1` FOREIGN KEY (`id_tipoplatillo`) REFERENCES `tipo_platillo` (`id_tipoplatillo`),
  ADD CONSTRAINT `platillo_ibfk_2` FOREIGN KEY (`id_ingsec`) REFERENCES `ingrediente_secundario` (`id_ingsec`);

--
-- Filtros para la tabla `platillo_pedido`
--
ALTER TABLE `platillo_pedido`
  ADD CONSTRAINT `platillo_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `platillo_pedido_ibfk_2` FOREIGN KEY (`id_platillo`) REFERENCES `platillo` (`id_platillo`);

--
-- Filtros para la tabla `puesto_privilegio`
--
ALTER TABLE `puesto_privilegio`
  ADD CONSTRAINT `puesto_privilegio_ibfk_1` FOREIGN KEY (`id_privilegio`) REFERENCES `privilegio` (`id_privilegio`),
  ADD CONSTRAINT `puesto_privilegio_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`);

--
-- Filtros para la tabla `red_sucursal`
--
ALTER TABLE `red_sucursal`
  ADD CONSTRAINT `red_sucursal_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`),
  ADD CONSTRAINT `red_sucursal_ibfk_2` FOREIGN KEY (`id_red`) REFERENCES `red_social` (`id_red`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`id_tipohorario`) REFERENCES `tipo_horario` (`id_tipohorario`),
  ADD CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `telefono_sucursal`
--
ALTER TABLE `telefono_sucursal`
  ADD CONSTRAINT `telefono_sucursal_ibfk_1` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `temp_pedido`
--
ALTER TABLE `temp_pedido`
  ADD CONSTRAINT `tpedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `tpedido_ibfk_2` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`);

--
-- Filtros para la tabla `temp_platillo`
--
ALTER TABLE `temp_platillo`
  ADD CONSTRAINT `temppl_ibfk_1` FOREIGN KEY (`id_temp`) REFERENCES `temp_pedido` (`id_temp`),
  ADD CONSTRAINT `temppl_ibfk_2` FOREIGN KEY (`id_platillo`) REFERENCES `platillo` (`id_platillo`);

--
-- Filtros para la tabla `temp_uc`
--
ALTER TABLE `temp_uc`
  ADD CONSTRAINT `tempuc_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion_cliente` (`id_ubiclient`),
  ADD CONSTRAINT `tempuc_ibfk_2` FOREIGN KEY (`id_temp`) REFERENCES `temp_pedido` (`id_temp`);

--
-- Filtros para la tabla `tipo_platillo`
--
ALTER TABLE `tipo_platillo`
  ADD CONSTRAINT `tipo_platillo_ibfk_1` FOREIGN KEY (`id_ingprinc`) REFERENCES `ingrediente_principal` (`id_ingprinc`);

--
-- Filtros para la tabla `ubicacion_cliente`
--
ALTER TABLE `ubicacion_cliente`
  ADD CONSTRAINT `ubicacion_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `ubicacion_cliente_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`);

--
-- Filtros para la tabla `ubicacion_pedido`
--
ALTER TABLE `ubicacion_pedido`
  ADD CONSTRAINT `ubicacion_pedido_ibfk_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion_cliente` (`id_ubiclient`),
  ADD CONSTRAINT `ubicacion_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`);

--
-- Filtros para la tabla `usuario_publicacion`
--
ALTER TABLE `usuario_publicacion`
  ADD CONSTRAINT `usuario_publicacion_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicacion` (`id_publicacion`),
  ADD CONSTRAINT `usuario_publicacion_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_puesto`
--
ALTER TABLE `usuario_puesto`
  ADD CONSTRAINT `usuario_puesto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_puesto_ibfk_2` FOREIGN KEY (`id_puesto`) REFERENCES `puesto` (`id_puesto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
