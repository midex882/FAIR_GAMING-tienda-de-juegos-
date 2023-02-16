-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-02-2023 a las 14:25:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `usuario` int(11) NOT NULL,
  `juego` int(11) NOT NULL,
  `comentario` varchar(500) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`usuario`, `juego`, `comentario`, `fecha`) VALUES
(0, 3, 'No funcionan los comentario', '2023-02-13'),
(0, 7, 'Creo que solo puedo poner un comentario por juego', '2023-02-13'),
(0, 17, 'Bof como esta el juego', '2023-02-14'),
(0, 24, 'Veamos si los comentarios funcionan', '2023-02-14'),
(3, 3, '', '2023-02-13'),
(3, 6, 'AAAAAAA', '2023-02-01'),
(3, 7, 'Sí, así que es mejor lo que uno va a poner. Salchicha', '2023-02-13'),
(3, 10, 'umm yummy kebab', '2023-02-03'),
(3, 16, 'umm rica cabra durum 2x1', '2023-01-31'),
(4, 2, 'Nunca me había sentido tan triste', '2023-01-27'),
(4, 6, 'Este juego me hace querer abandonar mi vida', '2023-02-02'),
(4, 12, 'SANGREEEEEEE', '2023-02-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `plataforma` int(11) NOT NULL,
  `caratula` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `plataforma`, `caratula`, `fecha_lanzamiento`, `activo`) VALUES
(1, 'The Evil Within 2', 'Sebastian Castellanos se encuentra una vez más con el terror de STEM, en esta ocasión para salvar a su hija.', 2, 'https://s1.gaming-cdn.com/images/products/2133/616x353/the-evil-within-2-pc-juego-steam-cover.jpg?v=1650450943', '2023-02-02', 1),
(2, 'Outer Wilds', 'Viaja por un sistema solar cargado en tiempo real y explora las ruinas de los Nomai, mientras descubres tu auténtico propósito', 2, 'https://s1.gaming-cdn.com/images/products/2586/616x353/outer-wilds-pc-juego-steam-cover.jpg?v=1671637488\r\n', '2023-02-02', 1),
(3, 'Resident Evil Village', 'Toma el control de Ethan Winters para salvar a su hija secuestrada', 2, '          https://s3.gaming-cdn.com/images/products/6329/616x353/resident-evil-village-pc-juego-steam-cover.jpg?v=1651568947\r\n', '2022-02-16', 1),
(4, 'Metro Exodus', 'Artyom y sus compañeros de la orden han escapado de Moscú en el Aurora, y deben encontrar un nuevo hogar', 2, '          https://s3.gaming-cdn.com/images/products/6512/616x353/metro-exodus-gold-edition-gold-edition-pc-juego-steam-cover.jpg?v=1651160153\r\n', '2021-02-18', 1),
(5, 'Days Gone', 'En un mundo donde los muertos caminan, ábrete paso por las ruinas del antiguo mundo y mejora tu equipo para sobrevivir y prosperar', 1, '          https://s3.gaming-cdn.com/images/products/6791/616x353/days-gone-pc-juego-steam-cover.jpg?v=1651574197\r\n', '2021-02-18', 1),
(6, 'Fallout New Vegas', 'Explora el desierto del Mojave y encuentra a tu asesino', 1, '          https://s3.gaming-cdn.com/images/products/155/616x353/fallout-new-vegas-ultimate-ultimate-pc-juego-steam-europe-cover.jpg?v=1662374421\r\n', '2019-02-20', 1),
(7, 'Minecraft', 'Construye, lucha, planta, mina, tala y sobrevive en este mundo abierto generado proceduralmente', 1, '          https://s2.gaming-cdn.com/images/products/442/616x353/minecraft-java-y-bedrock-edition-pc-juego-cover.jpg?v=1671725699\r\n', '2018-02-07', 1),
(8, 'God Of War 4', 'Reencuéntrate con Kratos, y explora las tierras nórdicas con Atreus mientras desvelas los secretos de los dioses del panteón de Odin', 1, '          https://s3.gaming-cdn.com/images/products/7325/616x353/god-of-war-pc-juego-steam-cover.jpg?v=1668157899\r\n', '2019-02-13', 1),
(9, 'Horizon Zero Dawn', 'Conoce a Alloy y ayúdala a descubrir sus orígenes y la historia del mundo en el que vive', 4, '          https://s2.gaming-cdn.com/images/products/6202/616x353/horizon-zero-dawn-complete-edition-pc-juego-steam-cover.jpg?v=1651566259\r\n', '2018-02-15', 1),
(10, 'Call of Duty: Modern Warfare II', 'Mata, mata y mata un poco más, ya sea con tus amigos o sin ellos', 4, '          https://s3.gaming-cdn.com/images/products/12827/616x353/call-of-duty-modern-warfare-ii-cross-gen-bundle-xbox-one-xbox-series-x-s-cross-gen-bundle-xbox-one-xbox-series-x-s-juego-microsoft-store-cover.jpg?v=1669138987\r\n', '2022-02-10', 1),
(11, 'Sniper Elite 4', 'Conviértete en un francotirador, y lleva a cabo ejecuciones legendarias', 4, '          https://s3.gaming-cdn.com/images/products/8864/616x353/sniper-elite-4-xbox-one-xbox-series-x-s-xbox-one-xbox-series-x-s-juego-microsoft-store-europe-cover.jpg?v=1654528086\r\n', '2023-02-08', 1),
(12, 'SCORN', 'Adéntrate en un infierno de sufrimiento, y transmutación, y vive para contarlo', 4, '          https://s3.gaming-cdn.com/images/products/8255/616x353/scorn-pc-juego-steam-cover.jpg?v=1665734659\r\n', '2022-02-16', 1),
(13, 'Hollow Knight', 'Explora el precioso y desafiante mundo de Hollow Knight, un plataformer 2D de los mejores que se han creado', 3, '          https://s3.gaming-cdn.com/images/products/2198/616x353/hollow-knight-pc-mac-juego-steam-cover.jpg?v=1649252899\r\n', '2020-02-04', 1),
(14, 'Imp Of The Sun', 'Conviértete en el emperador del Sol', 3, '          https://s2.gaming-cdn.com/images/products/10666/616x353/imp-of-the-sun-pc-juego-steam-cover.jpg?v=1649358538\r\n', '2022-02-17', 1),
(15, 'The Knight Witch', 'Controla a una bruja chibi y usa tus poderes para derrotar al mal', 3, '          https://s2.gaming-cdn.com/images/products/10948/616x353/the-knight-witch-pc-juego-steam-cover.jpg?v=1669797506\r\n', '2022-02-15', 1),
(16, 'Goat Simulator 3', 'Controla a una cabra, o a varias cabras, y explora el extraño mundo a tu alrededor', 3, '          https://s2.gaming-cdn.com/images/products/12121/616x353/goat-simulator-3-pc-juego-epic-games-europe-cover.jpg?v=1673341137\r\n', '2022-02-16', 1),
(17, 'aventuras de cipote johnson', 'comeme los huevos', 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjDABh7vrtksWfU_7jVFi1ZG0zvNeFBAzQRA&usqp=CAU', '2022-03-02', 1),
(24, 'Dead Space', 'Controla a Isaac Clarke y enfréntate a los necromorfos que habitan la USS Ishimura', 1, 'https://s2.gaming-cdn.com/images/products/9094/616x353/dead-space-pc-juego-origin-cover.jpg?v=1674837212', '2023-02-02', 1),
(25, 'Hogwarts Legacy', 'Entra en el mundo de Harry Potter y esclaviza elfos mientras te conviertes en el mago más cruel y peor vestido de la historia', 2, 'https://s2.gaming-cdn.com/images/products/7072/616x353/hogwarts-legacy-pc-juego-steam-europe-cover.jpg?v=1676112832', '2023-02-08', 1),
(26, 'Horizon Zero Dawn', 'Controla a Aloy y descubre los secretos del pasado de la humanidad mientras aprendes sobre tus propios orígenes', 1, 'https://s2.gaming-cdn.com/images/products/6202/616x353/horizon-zero-dawn-complete-edition-pc-juego-steam-cover.jpg?v=1651566259', '2023-02-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `logo` varchar(300) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `activo`, `logo`) VALUES
(1, 'Play Station', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Playstation_logo_colour.svg/1200px-Playstation_logo_colour.svg.png'),
(2, 'Steam', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Steam_icon_logo.svg/2048px-Steam_icon_logo.svg.png'),
(3, 'Nintendo Switch', 1, '../assets/logos_plataformas/switch.png'),
(4, 'XBOX', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Xbox_one_logo.svg/2048px-Xbox_one_logo.svg.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `nick` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(35) COLLATE latin1_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `nick`, `pass`, `activo`) VALUES
(0, 'administrador', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 1),
(3, 'kebebo kebabo', 'blandum69', 'ec6a6536ca304edf844d1d248a4f08dc', 1),
(4, 'Elon Musket', 'musket4life', 'ec6a6536ca304edf844d1d248a4f08dc', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`usuario`,`juego`,`fecha`),
  ADD KEY `COM_JUEGO` (`juego`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JUEGO_PLAT` (`plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `COM_JUEGO` FOREIGN KEY (`juego`) REFERENCES `juegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `COM_USU` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `JUEGO_PLAT` FOREIGN KEY (`plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
