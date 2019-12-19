-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-12-2019 a las 20:55:35
-- Versión del servidor: 5.5.29
-- Versión de PHP: 7.2.18

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
(1, 'matias', 'Lineros', 'Ramírez', '2019-11-01', 23456, 'm@m.cl', '$2y$10$K86iKmTfpFQcX9MGzL/3YuuUPhHzKPgn5tGpi2uaGDgX5RYIbMU0u', NULL, 1, NULL, NULL);

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
