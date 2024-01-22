CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `formulario` (`id`, `nombre`, `apellido`, `telefono`, `email`, `texto`) VALUES
(2, 'Marcos', 'Marín García', '661841131', 'maringarciamarcos2004@gmail.com', 'Hola ¿cuánto tarda un envío en llegarme?'),
(3, 'Marcos', 'Marín García', '661841131', 'maringarciamarcos2004@gmail.com', 'Hola ¿cuánto tarda un envío en llegarme?'),
(4, 'Marcos', 'Marín García', '661841131', 'maringarciamarcos2004@gmail.com', 'Hola ¿cuánto tarda un envío en llegarme?'),
(5, 'Jesús', 'García', '678400543', 'marinaillescas@hotmail.com', 'Tenéis tienda en Madrid?');

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `imagen_2` varchar(255) NOT NULL,
  `imagen_3` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `precio_oferta` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `productos` (`id`, `nombre`, `imagen`, `imagen_2`, `imagen_3`, `precio`, `precio_oferta`, `categoria`) VALUES
(1, 'ZAPATILLAS ADIDAS CRAZY LIGHT DERRICK ROSE \"2011\"', 'adidas crazy light 2011 rose.jfif', 'zapa rose.jpg', '', '155', NULL, 'zapatilla'),
(2, 'Camiseta Kobe Bryant Los Angeles Lakers', 'cami kobe 8.jpg', 'kobe detars.jpg', 'foto kobe.jpg', '95', NULL, 'camiseta'),
(3, 'Zapatillas Nike Jordan 4 \"1989\"', 'jordan 4 89.jfif', 'zapa jordan 4.JPG', '', '185', NULL, 'zapatilla'),
(4, 'Camiseta LeBron James Miami Heat', 'cami lebron miami front.webp', 'cami lebron miami behind.jpg', 'foto lebron.jpg', '95', NULL, 'camiseta'),
(5, 'Zapatillas Adidas Superstar Kareem Abdul-Jabbar', 'suprestar kareem.jfif', 'zapa jabbar.jpg', '', '130', NULL, 'zapatilla'),
(6, 'Zapatillas Converse Pro Leather Julius Erving \"1976\"', 'converse pro leather erving 76.jfif', 'zapa erving.jpg', '', '110', NULL, 'zapatilla'),
(8, 'Zapatillas Air Jordan 11 \"1995\"', 'jordan 11 95.jfif', 'zapa jordan 11.JPG', '', '230', NULL, 'zapatilla'),
(10, 'Camiseta Dirk Nowitzki Dallas Mavericks', 'cami dirk 98 99.jpg', 'cami dirk behind.jpg', 'foto dirk.jpg', '95', NULL, 'camiseta'),
(11, 'Camiseta Steve Nash Phoenix Suns', 'cami nash fronr.jpg', 'cami nash behind.jpg', 'foto nash.jpg', '95', NULL, 'camiseta'),
(12, 'Camiseta Manu Ginobili Edición Especial Firmada', 'camiseta ginobili por detras.jpg', 'ginobili camiseta.jpg', 'foto ginobili.jpg', '550', NULL, 'camiseta'),
(13, 'Camiseta Allen Iverson Philadelphia 76ers', 'cami iverson.jpg', 'iverson detras.JPG', 'foto iverson.webp', '95', NULL, 'camiseta'),
(14, 'Camiseta Tracy McGrady Toronto Raptors', 'cami tmac raptors.jpg', 'tmac detras.jpg', 'foto mcgrady.jpg', '95', '60', 'camiseta'),
(15, 'Camiseta Dražen Petrović New Jersey Nets', 'drazen petrovic cami.jpg', 'drazen petrovic cami detras.jpg', 'petrovic fot.jpg', '95', NULL, 'camiseta'),
(16, 'Camiseta Larry Bird Boston Celtics', 'cami bird.jpg', 'larry bird detras.jpg', 'foto bird.jpg', '95', NULL, 'camiseta'),
(17, 'Camiseta Reggie Miller Indiana Pacers', 'miller delante.jpeg', 'miller detras.jpeg', 'miller foto.jpg', '95', NULL, 'camiseta'),
(18, 'Camiseta Stephen Curry Golden State Warriors', 'curry cami delante.jpg', 'curry cami detars.jpg', 'curry foto.jpg', '95', NULL, 'camiseta'),
(19, 'Camiseta Shaquille O´Neal Orlando Magic', 'cami shaq magic.jpg', 'shaq detras.jpg', 'foto shaq.jpg', '95', '65', 'camiseta'),
(20, 'Nike Kobe 6 Grinch Edition', 'kobegrinch.jpg', 'zapa grinch.webp', '', '240', '210', 'zapatilla'),
(24, 'Gorra Toronto Raptors', 'gorra raptoras.jpg', '', '', '30', NULL, 'accesorio'),
(25, 'Mini aro nba', 'miniaro.jpg', '', '', '20', NULL, 'accesorio'),
(26, 'Llavero acrílico de coleccionista Boston celtics', 'llavero coleccionista celtics.jpg', '', '', '5', NULL, 'accesorio'),
(28, 'ZAPATILLAS NIKE KOBE 4 \"2009\"', 'nike kobe 4  20098.jfif', 'zapa kobe 4.jpg', '', '180', NULL, 'zapatilla'),
(29, 'Zapatillas Reebok Question Allen Iverson \"1996\"', 'reebok question 96 iverson.jfif', 'zapa iverson.webp', '', '160', NULL, 'zapatilla'),
(30, 'Zapatillas Air Jordan 5 \"1990\"', 'air jordan 5 de 1990.jfif', 'zapa jordan 5.JPG', '', '220', NULL, 'zapatilla'),
(31, 'Balón oficial nba wilson', 'balon wilson.jpg', '', '', '135', NULL, 'accesorio'),
(32, 'CINTA JORDAN AZUL CIAN', 'cinta jordan.jpg', '', '', '10', NULL, 'accesorio'),
(33, 'Gorra all star denver 2005', 'gorra denver.jpg', '', '', '35', NULL, 'accesorio');

CREATE TABLE `talla_camisetas` (
  `producto_id` int(11) NOT NULL,
  `xs` varchar(255) NOT NULL,
  `s` varchar(255) NOT NULL,
  `m` varchar(255) NOT NULL,
  `l` varchar(255) NOT NULL,
  `xl` varchar(255) NOT NULL,
  `xxl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `talla_camisetas` (`producto_id`, `xs`, `s`, `m`, `l`, `xl`, `xxl`) VALUES
(13, '4', '2', '5', '2', '7', '10'),
(10, '3', '2', '0', '6', '5', '7'),
(15, '7', '9', '11', '10', '13', '14'),
(2, '2', '3', '1', '5', '6', '6'),
(16, '4', '3', '5', '3', '0', '6'),
(4, '1', '0', '0', '3', '5', '4'),
(12, '0', '0', '1', '0', '0', '0'),
(17, '7', '6', '7', '7', '8', '4'),
(19, '4', '4', '2', '0', '1', '3'),
(18, '1', '3', '2', '4', '5', '11'),
(11, '3', '4', '2', '1', '5', '6'),
(14, '4', '2', '5', '1', '6', '11');

CREATE TABLE `talla_zapatillas` (
  `producto_id` int(11) NOT NULL,
  `37` varchar(255) NOT NULL,
  `38` varchar(255) NOT NULL,
  `39` varchar(255) NOT NULL,
  `40` varchar(255) NOT NULL,
  `41` varchar(255) NOT NULL,
  `42` varchar(255) NOT NULL,
  `43` varchar(255) NOT NULL,
  `44` varchar(255) NOT NULL,
  `45` varchar(255) NOT NULL,
  `46` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `talla_zapatillas` (`producto_id`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46`) VALUES
(20, '4', '6', '5', '8', '2', '3', '4', '2', '3', '5'),
(1, '3', '2', '4', '5', '2', '10', '0', '5', '8', '6'),
(5, '2', '3', '3', '5', '2', '0', '1', '4', '2', '8'),
(6, '6', '4', '4', '2', '4', '2', '1', '5', '7', '9'),
(30, '2', '1', '4', '5', '3', '6', '7', '4', '3', '5'),
(8, '2', '4', '4', '5', '6', '3', '1', '0', '2', '1'),
(3, '4', '3', '1', '7', '4', '3', '2', '0', '2', '4'),
(28, '3', '2', '5', '6', '9', '3', '0', '0', '2', '4'),
(29, '4', '3', '1', '3', '2', '6', '6', '3', '2', '9');

ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `talla_camisetas`
  ADD KEY `producto_id` (`producto_id`);

ALTER TABLE `talla_zapatillas`
  ADD KEY `fk_talla_zapatillas_producto` (`producto_id`);

ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

ALTER TABLE `talla_camisetas`
  ADD CONSTRAINT `fk_talla_camisetas_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `talla_zapatillas`
  ADD CONSTRAINT `fk_talla_zapatillas_producto` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

