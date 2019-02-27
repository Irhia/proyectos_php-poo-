-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2019 a las 01:59:45
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chollo`
--
CREATE DATABASE IF NOT EXISTS `chollo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chollo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio_venta` int(10) NOT NULL,
  `precio_chollo` int(10) NOT NULL,
  `precio_correcto` int(10) NOT NULL,
  `valoracion_admin` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_sitio_web` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `titulo`, `url`, `foto`, `descripcion`, `precio_venta`, `precio_chollo`, `precio_correcto`, `valoracion_admin`, `id_usuario`, `id_categoria`, `id_sitio_web`) VALUES
(2, 'Samsung S8', 'https://www.mediamarkt.es/es/product/_m%C3%B3vil-samsung-galaxy-s8-6-2-qhd-octa-core-4-gb-ram-red-4g-12-mp-64-gb-plata-1360797.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-79090049/fee_786_587_png/M%C3%B3vil---Samsung-Galaxy-S8---6.2%22--QHD---Octa-Core--4-GB-RAM--Red-4G--12-MP--64-GB--Plata', 'Samsung S8', 559, 450, 350, 'Rojo', 18, 61, 11),
(3, 'BQ X2 PRO', 'https://www.mediamarkt.es/es/product/_m%C3%B3vil-bq-aquaris-x2-pro-5-65-full-hd-snapdragon-660-4-gb-ram-64-gb-4g-dual-camera-12-mp-1409784.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-77624326/fee_786_587_png/M%C3%B3vil---BQ-Aquaris-X2-Pro--5.65%22--Full-HD---Snapdragon-660--4-GB-RAM--64-GB--4G-Dual-Camera-12-MP', 'BQ X2 PRO', 349, 275, 300, 'Amarillo', 18, 61, 11),
(4, 'Tarjeta microSD - Samsung EVO Plus 32 GB', 'https://www.mediamarkt.es/es/product/_tarjeta-microsd-samsung-evo-plus-mb-mc32ga-32-gb-95-mb-s-20-mb-s-1363800.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-75425239/fee_786_587_png/Tarjeta-microSD---Samsung-EVO-Plus-MB-MC32GA--32-GB--95-MB-s--20-MB-s', 'Tarjeta microSD - Samsung EVO Plus 32 GB', 9, 10, 11, 'Verde', 18, 64, 11),
(5, 'Auriculares inalámbricos APPLE Airpods blanco', 'https://www.worten.es/productos/moviles-smartphones/accesorios/auriculares-inalambricos/auricular-airpods-apple-5957995', 'https://www.worten.es/i/db7b3b4fa438a8abee14ebfb32b736814d473e0e.jpg', 'Auriculares inalámbricos APPLE Airpods blanco', 179, 120, 150, 'Rojo', 18, 64, 12),
(6, '', 'https://www.worten.es/productos/informatica/tablet/tablet-10-5-samsung-galaxy-tab-s4-t830-blanca-6663135', 'https://www.worten.es/i/a786aac8f5b6fd7122349add9a757fa1fbd96f19.jpg', '', 569, 570, 599, 'Verde', 18, 62, 12),
(7, 'Apple iPad (2018)', 'https://www.mediamarkt.es/es/product/_apple-ipad-2018-9-7-32-gb-wifi-plata-1403765.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-79190948/fee_786_587_png/Apple-iPad-%282018%29--9.7%22--32-GB--WiFi--Plata', 'Número de artículo:\r\n1403765\r\n4.5\r\n(18) valoracionesValora este producto\r\n9 de 9 clientes han recomendado este producto\r\n\r\nResolución: 2048 x 1536 píxeles Calidad de imagen: QXGA Tipo de pantalla: 9.7\" LED IPS Retina Procesador: A10 Fusion Modelo Procesad', 329, 250, 275, 'Rojo', 18, 62, 11),
(8, 'Samsung TV 49 4k', 'https://www.phonehouse.es/televisores/samsung/tv-led-49-quot-4k-hdr-smart-tv-1500hz.html', 'https://res.cloudinary.com/dcubq1zfl/image/upload/q_auto,f_auto/img/res/autoimg/3/6/8/6/5/36865_spc_380_380_qhigh_product.jpg', 'Samsung TV LED 49 4K HDR Smart TV 1500Hz', 519, 600, 650, 'Verde', 18, 63, 13),
(9, 'TV PHILIPS 65 Oled ', 'https://www.worten.es/productos/tv/led/tv-philips-65oled803-oled-65-165-cm-4k-ultra-hd-smart-tv-6675200', 'https://www.worten.es/i/27cbe4cfdbe784e46a5f0fefa1f0d648a2139ba7.jpg', 'TV PHILIPS 65OLED803 (OLED - 65\'\' - 165 cm - 4K Ultra HD ', 2398, 2400, 2680, 'Verde', 18, 63, 12),
(10, ' Samsung Galaxy Watch, 46 mm', 'https://www.mediamarkt.es/es/product/_smartwatch-samsung-galaxy-watch-46-mm-1-3-768-mb-4-gb-472-mah-bluetooth-silver-1428689.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-79316743/fee_786_587_png/Smartwatch---Samsung-Galaxy-Watch--46-mm--1.3%22--768-MB--4-GB--472-mAh--Bluetooth--Silver', 'Smartwatch - Samsung Galaxy Watch, 46 mm, 1.3\", 768 MB, 4 GB, 472 mAh, Bluetooth, Silver', 299, 320, 350, 'Verde', 18, 65, 11),
(11, 'Samsung Galaxy Watch, 42 mm', 'https://www.mediamarkt.es/es/product/_smartwatch-samsung-galaxy-watch-42-mm-1-2-1-5-gb-ram-samoled-gps-wifi-rosa-1443655.html', 'https://picscdn.redblue.de/doi/pixelboxx-mss-80213079/fee_786_587_png/Smartwatch---Samsung-Galaxy-Watch--42-mm--1.2%22--1.5-GB-RAM--sAMOLED--GPS--WiFi--Rosa', 'Smartwatch - Samsung Galaxy Watch, 42 mm, 1.2\", 1.5 GB RAM, sAMOLED, GPS, WiFi, Rosa', 349, 299, 320, 'Amarillo', 18, 65, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `activo` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(61, 'Móviles', 'Móviles', ''),
(62, 'Tablets', 'Tablets', ''),
(63, 'Tv', 'Tv', ''),
(64, 'Accesorios', 'Accesorios', ''),
(65, 'Smartwatches', 'Smartwatches', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios_web`
--

CREATE TABLE `sitios_web` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sitios_web`
--

INSERT INTO `sitios_web` (`id`, `nombre`, `descripcion`, `url`) VALUES
(11, 'Media Markt', 'Media Markt', 'https://www.mediamarkt.es/'),
(12, 'Worten', 'Worten', 'https://www.worten.es/'),
(13, 'Phonehouse', 'Phonehouse', 'https://www.phonehouse.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `email`, `fecha_registro`, `activo`) VALUES
(18, 'Beatriz', '$2y$10$umkaAzZ9TLOg4pGzpdLHy.jme2jhz7I5YnPuqb4vX0wdhEaXMZlY2', 'bea@gmail.com', '2019-02-24 22:33:03', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_categoria`,`id_sitio_web`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_sitio_web` (`id_sitio_web`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sitios_web`
--
ALTER TABLE `sitios_web`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `sitios_web`
--
ALTER TABLE `sitios_web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `anuncios_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `anuncios_ibfk_3` FOREIGN KEY (`id_sitio_web`) REFERENCES `sitios_web` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
