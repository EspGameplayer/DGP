-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-12-2019 a las 12:38:46
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zezible`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE IF NOT EXISTS `actividad` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `categoria_id` int(255) DEFAULT NULL,
  `usuario_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_actividad_categoria` (`categoria_id`),
  KEY `fk_actividad_usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `descripcion`, `fecha`, `hora`, `lugar`, `tipo`, `estado`, `categoria_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 'bailar tangooooo', 'esta actividad es para aprender a bailar', '2019-11-14', '12:12:00', 'estadio', 'Grupal', 'Disponible', 3, 1, '2019-11-08 20:00:08', '2019-11-09 23:12:52'),
(3, 'basket', 'basketball  and oneeeeeeeeeee', '2019-11-29', '12:55:00', 'estadio', 'Simple', 'Cerrada', 1, 2, '2019-11-08 22:07:41', '2019-11-08 22:27:44'),
(4, 'danza', 'no cachooo', '2019-11-20', '12:12:00', 'no se', 'Simple', 'Disponible', 4, 2, '2019-11-09 00:32:55', '2019-11-09 00:34:51'),
(5, 'voleyball', 'jugar voley conmigo', '2019-11-27', '13:15:00', 'cancha 5', 'Simple', 'Cerrada', 1, 2, '2019-11-09 21:52:40', '2019-11-13 19:05:45'),
(6, 'actividad-m@m', 'esta actividad es para nada, como todo en esta vida', '2019-11-28', '12:12:00', 'estadio', 'Grupal', 'Disponible', 5, 1, '2019-11-27 11:24:38', '2019-11-27 11:24:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_grupal`
--

DROP TABLE IF EXISTS `actividad_grupal`;
CREATE TABLE IF NOT EXISTS `actividad_grupal` (
  `id` int(255) NOT NULL,
  `maximo_socios` int(255) DEFAULT NULL,
  `minimo_voluntarios` int(255) DEFAULT NULL,
  `cupo_socios` int(255) NOT NULL,
  `cupo_voluntarios` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_grupal`
--

INSERT INTO `actividad_grupal` (`id`, `maximo_socios`, `minimo_voluntarios`, `cupo_socios`, `cupo_voluntarios`, `created_at`, `updated_at`) VALUES
(1, 20, 10, 19, 9, '2019-11-08 20:00:09', '2019-11-21 09:49:51'),
(6, 13, 11, 13, 11, '2019-11-27 11:24:39', '2019-11-27 11:24:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_individual`
--

DROP TABLE IF EXISTS `actividad_individual`;
CREATE TABLE IF NOT EXISTS `actividad_individual` (
  `id` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_individual`
--

INSERT INTO `actividad_individual` (`id`, `created_at`, `updated_at`) VALUES
(3, '2019-11-08 22:07:41', '2019-11-08 22:07:41'),
(5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_usuario`
--

DROP TABLE IF EXISTS `actividad_usuario`;
CREATE TABLE IF NOT EXISTS `actividad_usuario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(255) DEFAULT NULL,
  `actividad_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_actividad_usuario_persona` (`usuario_id`),
  KEY `fk_actividad_usuario_actividad` (`actividad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad_usuario`
--

INSERT INTO `actividad_usuario` (`id`, `usuario_id`, `actividad_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2019-11-08 22:07:41', '2019-11-08 22:07:41'),
(7, 3, 3, '2019-11-08 22:27:45', '2019-11-08 22:27:45'),
(17, 2, 4, '2019-11-09 00:32:56', '2019-11-09 00:32:56'),
(20, 3, 1, '2019-11-09 23:07:12', '2019-11-09 23:07:12'),
(21, 1, 5, '2019-11-13 19:05:46', '2019-11-13 19:05:46'),
(32, 1, 1, '2019-11-14 17:19:21', '2019-11-14 17:19:21'),
(33, 2, 1, '2019-11-21 09:49:51', '2019-11-21 09:49:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Deporte', NULL, NULL, NULL),
(2, 'Turismo', NULL, NULL, NULL),
(3, 'Baile', NULL, NULL, NULL),
(4, 'Arte', NULL, NULL, NULL),
(5, 'Otros', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `comentario` text,
  `usuario_id` int(255) DEFAULT NULL,
  `actividad_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_persona` (`usuario_id`),
  KEY `fk_comentario_actividad` (`actividad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `comentario`, `usuario_id`, `actividad_id`, `created_at`, `updated_at`) VALUES
(1, 'buena actividad', 1, 1, '2019-11-08 20:07:22', '2019-11-08 20:07:22'),
(2, 'nos vemos ahí !!!', 2, 1, '2019-11-13 19:12:27', '2019-11-13 19:12:27'),
(3, 'hola', 1, 4, '2019-11-21 09:17:43', '2019-11-21 09:17:43'),
(4, 'm', 1, 6, '2019-12-07 12:48:54', '2019-12-07 12:48:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id` int(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Gestor', NULL, NULL),
(2, 'Socio', NULL, NULL),
(3, 'Voluntario', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

DROP TABLE IF EXISTS `socio`;
CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(255) NOT NULL,
  `gusto` text,
  `necesidad` text,
  `observacion` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `gusto`, `necesidad`, `observacion`, `created_at`, `updated_at`) VALUES
(2, 'nada', 'nada', 'ningunaaa', '2019-11-08 19:59:26', '2019-11-08 19:59:32'),
(4, NULL, NULL, NULL, '2019-11-13 19:10:37', '2019-11-13 19:10:37'),
(6, 'nada', 'nada', 'ninguna', '2019-11-21 09:58:07', '2019-11-21 09:58:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `ApellidoP` varchar(255) DEFAULT NULL,
  `ApellidoM` varchar(255) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `telefono` int(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `role_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_usuario_role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `ApellidoP`, `ApellidoM`, `nacimiento`, `telefono`, `email`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'matias', 'Lineros', 'Ramírez', '2019-11-01', 23456, 'm@m.cl', '$2y$10$K86iKmTfpFQcX9MGzL/3YuuUPhHzKPgn5tGpi2uaGDgX5RYIbMU0u', NULL, 1, NULL, NULL),
(2, 'alexis', 'molina', 'molina', '2019-11-21', 123456, 'a@a.cl', '$2y$10$Kx8HCEXW9lRxymD3SXu80ODq5uLAXi.VRgQHIxp8VMHQ0DrRl0e4G', 'kbnFDAi3FgIqpecchJoWSlUry8OXxhSqX6xF8tzRiBDOnAdJh8Kqy6DLXoq0', 2, '2019-11-08 19:59:26', '2019-11-08 19:59:26'),
(3, 'voluntario', 'Lineros', 'nene', NULL, 1234, 'v@v.cl', '$2y$10$0FEKOwiyTNCRd.2VTI2AkejzaNpOJQgNVrFPjMrOh486RnC550vNi', NULL, 3, '2019-11-08 22:05:35', '2019-11-10 00:31:08'),
(4, 'juan', 'perez', 'perezito', '2000-12-30', 23456789, 'j@j.cl', '$2y$10$YG4sy5HSPyddiDT04CZRq.cKURLUB2FxHP9wM2hR13p1IATEcF1xO', NULL, 2, '2019-11-13 19:10:37', '2019-11-13 19:10:37'),
(5, 'Pedro', 'camilo', 'jackson', '1998-06-10', 34567, 'prueba1@prueba1.cl', '$2y$10$7oC6ha/PKlf7Akl.l/H.8OuZunaHutpM5cmD.TAG4dyhbkvJ2BSve', NULL, 3, '2019-11-13 19:30:30', '2019-11-13 19:30:30'),
(6, 'juan', 'perez', 'j', '2019-11-09', 1234, 'juan@juan.cl', '$2y$10$KRBKqj2FkcNvBKdUjYLeueBLtUdS8yytaktw4afsrbyDYmIDU7Znm', NULL, 2, '2019-11-21 09:58:06', '2019-11-21 09:58:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

DROP TABLE IF EXISTS `valoracion`;
CREATE TABLE IF NOT EXISTS `valoracion` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `socio_id` int(255) DEFAULT NULL,
  `voluntario_id` int(255) DEFAULT NULL,
  `actividad_id` int(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `valoracion` int(5) DEFAULT NULL,
  `descripcion` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_valoracion_socio` (`socio_id`),
  KEY `fk_valoracion_voluntario` (`voluntario_id`),
  KEY `fk_valoracion_actividad` (`actividad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`id`, `socio_id`, `voluntario_id`, `actividad_id`, `estado`, `valoracion`, `descripcion`, `created_at`, `updated_at`) VALUES
(8, 2, 3, 3, 'socio-voluntario', NULL, 'muy bueno', '2019-12-07 13:33:15', '2019-12-07 13:33:15'),
(9, 2, 3, 3, 'socio-voluntario', 4, 'bueno, pero no tanto.', '2019-12-07 14:04:14', '2019-12-07 14:04:14'),
(10, 2, 3, 3, 'socio-voluntario', 3, 'muy malo!', '2019-12-12 09:26:41', '2019-12-12 09:26:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id` int(255) NOT NULL,
  `participar` text,
  `espera` text,
  `observacion` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voluntario`
--

INSERT INTO `voluntario` (`id`, `participar`, `espera`, `observacion`, `created_at`, `updated_at`) VALUES
(3, 'nada', 'nadita', 'ningunaaaaaaaaaa', '2019-11-08 22:05:35', '2019-11-10 00:30:19'),
(5, NULL, NULL, NULL, '2019-11-13 19:30:30', '2019-11-13 19:30:30');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `fk_actividad_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `fk_actividad_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `actividad_grupal`
--
ALTER TABLE `actividad_grupal`
  ADD CONSTRAINT `fk_actividad_grupal_actividad` FOREIGN KEY (`id`) REFERENCES `actividad` (`id`);

--
-- Filtros para la tabla `actividad_individual`
--
ALTER TABLE `actividad_individual`
  ADD CONSTRAINT `fk_actividad_individual_actividad` FOREIGN KEY (`id`) REFERENCES `actividad` (`id`);

--
-- Filtros para la tabla `actividad_usuario`
--
ALTER TABLE `actividad_usuario`
  ADD CONSTRAINT `fk_actividad_usuario_actividad` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `fk_actividad_usuario_persona` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_actividad` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `fk_comentario_persona` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `gestor`
--
ALTER TABLE `gestor`
  ADD CONSTRAINT `fk_gestor_persona` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `fk_socio_persona` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuario_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_valoracion_actividad` FOREIGN KEY (`actividad_id`) REFERENCES `actividad` (`id`),
  ADD CONSTRAINT `fk_valoracion_socio` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`),
  ADD CONSTRAINT `fk_valoracion_voluntario` FOREIGN KEY (`voluntario_id`) REFERENCES `voluntario` (`id`);

--
-- Filtros para la tabla `voluntario`
--
ALTER TABLE `voluntario`
  ADD CONSTRAINT `fk_voluntario_persona` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
