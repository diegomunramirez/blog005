-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2025 a las 06:10:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mini_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Tecnología', 'Últimos avances en tecnología. ', '2025-07-13 23:53:23', '2025-07-13 23:53:23'),
(2, 'Finanzas', 'Conoce como administrar tus ingresos.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Hogar', 'Tips para el hogar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(64) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` text NOT NULL,
  `reading_time` int(11) NOT NULL,
  `status` varchar(64) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `slug`, `content`, `image_path`, `reading_time`, `status`, `created_at`) VALUES
(1, 'Géneros musicales regionales', 'Artes', 'géneros-musicales-regionales', 'El genero musical depende del ritmo y el tempo con el que se toque.             a', '1752450886_7edd8a3c23e981be3959.jpg', 7, 'published', '2025-07-14 02:28:17'),
(3, 'Alta cocina', 'Cocina', 'alta-cocina', 'Aprende recetas de Chiapas.aa', '1752464325_1dbc439c067693bbdf87.png', 6, 'published', '2025-07-14 03:38:45'),
(4, 'Empieza a invertir', 'Finanzas', 'empieza-a-invertir', 'Gestiona tus ingresos', 'finanzas_1.jpg', 10, 'published', '2025-07-14 09:49:41'),
(5, 'Introducción a la programación', 'Tecnología', 'introducción-a-la-programación', 'Aprende Java desde cero', 'introduccion_programacion.jpg', 8, 'published', '2025-07-14 09:51:32'),
(6, 'Inteligencia artificial', 'Tecnología', 'inteligencia-artificial', '¿Como funciona la IA?', 'inteligencia_artificial.jpg', 8, 'published', '2025-07-14 09:52:32'),
(7, 'Teoría de cuerdas', 'Física', 'teoría-de-cuerdas', 'Esta es la teoría de cuerdas', 'teoria-de-cuerdas.jpg', 4, 'published', '2025-07-14 09:55:34'),
(8, 'Teoría del color', 'Psicología', 'teoría-del-color', 'Así influye el color en nuestras decisiones', 'teoria_del_color.jpg', 5, 'published', '2025-07-14 09:56:31'),
(9, 'La caída de la antigua Roma', 'Historia', 'la-caída-de-la-antigua-roma', 'Caída de Roma', 'antigua_roma.jpg', 8, 'published', '2025-07-14 10:00:20'),
(10, 'Desarrollo móvil con Android Studio', 'Tecnología', 'desarrollo-móvil-con-android-studio', 'Desarrolla tu primera app móvil', 'android_studio_logo.png', 15, 'published', '2025-07-14 04:06:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
