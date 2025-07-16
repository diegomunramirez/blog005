-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2025 a las 18:30:15
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
(3, 'Hogar', 'Tips para el hogar', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Cocina', 'Alta gastronomia', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
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

INSERT INTO `posts` (`id`, `title`, `category_id`, `slug`, `content`, `image_path`, `reading_time`, `status`, `created_at`) VALUES
(1, 'Introducción a la programación', 1, 'introducción-a-la-programación', 'Guia definitiva para crear tu primera app para Adnroid', 'android_studio_logo.png', 4, 'published', '2025-07-16 21:45:05'),
(2, 'Introducción a la programación', 1, 'introducción-a-la-programación', 'Guia definitiva para crear tu primera app para Adnroid', 'android_studio_logo.png', 4, 'published', '2025-07-16 21:55:57'),
(3, 'Introducción a la programación', 1, 'introducción-a-la-programación', 'Guia definitiva para crear tu primera app para Adnroid', 'android_studio_logo.png', 4, 'published', '2025-07-16 21:58:52'),
(4, 'Conoce las 10 mejores recetas mexicanas', 4, 'conoce-las-10-mejores-recetas-mexicanas', 'Recetas típicas mexicanas ', 'alta_cocina.png', 4, 'published', '2025-07-16 22:04:41');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category\` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category\` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
