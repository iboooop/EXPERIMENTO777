-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-04-2026 a las 04:49:08
-- Versión del servidor: 11.3.2-MariaDB
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bnuuy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rabbits`
--

DROP TABLE IF EXISTS `rabbits`;
CREATE TABLE IF NOT EXISTS `rabbits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `breed` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `rabbits`
--

INSERT INTO `rabbits` (`id`, `breed`, `description`, `image_url`) VALUES
(1, 'Blanco Hotot', 'Proviene de Francia y es famoso por el \"delineador\" negro que rodea sus ojos. Es un conejo extremadamente curioso, inteligente y con mucha energía, ideal para quienes aman ver a un bnuuy explorando cada rincón de la casa con entusiasmo.', 'assets/bnuuys/blancohotot.jpg'),
(2, 'Arlequín', 'Esta raza francesa destaca por su pelaje dividido en bandas de colores simétricos. Se le conoce como el payaso de los conejos debido a su apariencia colorida y su personalidad juguetona, siempre buscando llamar la atención de forma tierna.', 'assets/bnuuys/conejoarlequin.jpg'),
(3, 'Belier', 'Originario de Holanda, se distingue por sus largas orejas caídas que le dan un aspecto muy dulce. Cuando se emociona y corre, sus orejas parecen hélices de helicóptero intentando despegar. Es una de las razas más dóciles y cariñosas que existen.', 'assets/bnuuys/conejobelier.jpg'),
(4, 'Californiano', 'Desarrollado en EE.UU., tiene un cuerpo blanco con nariz, orejas y patas oscuras, lo que le da un aspecto muy elegante. Es un conejo tranquilo y equilibrado que disfruta mucho de los momentos de calma, siendo perfecto para un ambiente hogareño relajado.', 'assets/bnuuys/conejocaliforniano.jpg'),
(5, 'Angora Inglés', 'Es literalmente una nube viviente con patas. Su pelaje es tan denso y suave que requiere muchos cuidados, pero a cambio ofrece abrazos inigualables. Son conejos muy calmados que parecen peluches reales salidos de un cuento de fantasía.', 'assets/bnuuys/conejoenglishangora.jpeg'),
(6, 'Holandés', 'Reconocible por su patrón de \"v\" invertida en la cara y su cuerpo de dos colores. Es un conejo pequeño pero con una gran inteligencia; aprenden trucos rápido y siempre parecen estar vestidos de etiqueta para una ocasión especial.', 'assets/bnuuys/conejoholandes.jpg'),
(7, 'Tan (Negro y Fuego)', 'Una raza atlética y elegante de Inglaterra con un contraste de color fuego intenso. Es conocido por ser el \"deportista\" del mundo bnuuy, ya que tiene muchísima energía y le encanta realizar saltos acrobáticos o \"binkies\" cuando está feliz.', 'assets/bnuuys/conejotan.jpg'),
(8, 'Gigante de Flandes', 'Es el rey de los conejos por su gran tamaño, pudiendo llegar a pesar lo mismo que un perro pequeño. A pesar de su imponente físico, es un gigante bonachón que ama pasar horas durmiendo y recibiendo caricias de sus humanos favoritos.', 'assets/bnuuys/giganteflandes.jpg'),
(9, 'Liebre (Hare)', 'A diferencia de los conejos domésticos, la liebre es una atleta nata de patas largas y orejas puntiagudas. Nacen totalmente desarrolladas y listas para correr. Son criaturas solitarias, veloces y muy independientes que representan la vida silvestre.', 'assets/bnuuys/hare.jpg'),
(10, 'Lop Inglés', 'Es la raza con las orejas más largas del mundo, las cuales pueden llegar a medir más de 60 centímetros. Requieren cuidados especiales porque a veces se las pisan, pero su apariencia es majestuosa y su carácter es sumamente pacífico.', 'assets/bnuuys/lobinglesa.jpg'),
(11, 'Mini Lop', 'Una versión compacta y adorable del Belier. Es muy popular por su tamaño pequeño y su cara redondeada. Un dato muy tierno es que suelen hacer un suave \"ronroneo\" con sus dientes cuando se sienten seguros y muy felices a tu lado.', 'assets/bnuuys/minilop.jpg'),
(12, 'Orejas Caídas', 'Este término agrupa a diversas razas que comparten la característica de no poder levantar sus orejas. Son bnuuys conocidos por tener una personalidad muy relajada, casi como si vivieran en un estado eterno de vacaciones y descanso total.', 'assets/bnuuys/orejascaidas.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'bon1', 'bon1@bon1.cl', '$2y$10$MP3mBLHsUgMFwmF0OsLqPetUBmPgepI7KByoXDvchNJ7dQrsiFohO', '2026-04-23 01:13:21'),
(2, 'ola', 'ola@1.cl', '$2y$10$O/nsg9Gvfou6no80B3tBPe6LvSavy0fEUxNwOS3zpLavftyiMITRq', '2026-04-23 01:34:00'),
(3, 'nau', '123@a.cl', '$2y$10$aaaZubqP4Hv8BtlDjxR1je73VpVKrGYnmgT7grUfSZQacl2iTPDMa', '2026-04-23 01:34:45'),
(4, 'olap', 'olap@a.cl', '$2y$10$situUICHPXlWlJ1hgcqnP.Oh/ZUWQ43n8UhdL0Tbj9yNDruNDYIWK', '2026-04-23 01:39:29'),
(5, 'martinsito', 'martinsito@teamo.cl', '$2y$10$mQgnjnyBPbk2aB9sDgTkFuqExa1uSw7HVXahgqJYnMYXO/Dx/vC6y', '2026-04-23 01:41:06'),
(6, 'martin12', 'martin12@dkmlk.cl', '$2y$10$7pdZ9igJKrw4qgRnOm9er.Ryj5KHkaLPmKutXpZmEBp4LQPL.QvSm', '2026-04-23 01:57:47'),
(7, 'martin', 'martin12@fsd.com', '$2y$10$7ZX1y0mckre4/AjHwedkT.DXcRI65ZUdQl2OjbWznETZmMT2GhFgG', '2026-04-23 03:28:17'),
(8, 'asd', 'martin12@jkdsnfk.com', '$2y$10$06o.QMYA3Pz5KvDUckYUreNpZXF6Q5BzQ7i4JB4pQUUq0O5Mr43Oi', '2026-04-23 03:39:37'),
(9, 'martin1', 'martin12@aslkdmn.com', '$2y$10$8BUKl9jNtXaKtg2kGK.Tt.JaN8Fdyc7kIriQD.gv6ywM5g6znWsxu', '2026-04-23 03:55:25'),
(10, 'martin777', 'martin777@a.com', '$2y$10$1b5w5GGAQTcj0o6qi5NCCOTVswNUHfeWHeG7vshIuPN5oEv/IkQ0e', '2026-04-23 04:07:30'),
(11, 'tais777', 'tais777@kjnkjas.com', '$2y$10$/ER9bBgj4s8HL/vWbr7T9uPMs46fN/HcwUiN3INXTXEQNaVpG/Sea', '2026-04-23 04:10:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
