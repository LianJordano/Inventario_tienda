-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2021 a las 23:33:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tienda_mixta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(11) NOT NULL,
  `cat_descripcion` varchar(255) NOT NULL,
  `cat_imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_descripcion`, `cat_imagen`) VALUES
(1, 'Prueba', 'defaultCategoria.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `emp_id` int(11) NOT NULL,
  `emp_nombre` varchar(100) NOT NULL,
  `emp_correo` varchar(100) NOT NULL,
  `emp_telefono` varchar(20) NOT NULL,
  `emp_logo` varchar(255) NOT NULL,
  `emp_estado` varchar(30) NOT NULL,
  `emp_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(50) NOT NULL,
  `pro_precio` decimal(11,2) NOT NULL,
  `pro_precio_compra` decimal(12,2) DEFAULT NULL,
  `pro_cantidad` int(11) DEFAULT NULL,
  `pro_promocion` tinyint(1) DEFAULT NULL,
  `pro_destacado` tinyint(1) DEFAULT NULL,
  `pro_foto` varchar(255) DEFAULT NULL,
  `pro_categoria_id` int(11) NOT NULL,
  `pro_proveedor_id` int(11) DEFAULT NULL,
  `pro_empresa_id` int(11) DEFAULT NULL,
  `pro_estado` varchar(33) NOT NULL,
  `pro_fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `prov_id` int(11) NOT NULL,
  `prov_nombre` varchar(33) NOT NULL,
  `prov_apellidos` varchar(33) NOT NULL,
  `prov_telefono` varchar(15) NOT NULL,
  `prov_correo` varchar(100) NOT NULL,
  `prov_estado` varchar(33) NOT NULL,
  `prov_emp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_categoria_id` (`pro_categoria_id`),
  ADD KEY `pro_proveedor_id` (`pro_proveedor_id`),
  ADD KEY `pro_empresa_id` (`pro_empresa_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prov_id`),
  ADD KEY `prov_emp_id` (`prov_emp_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`pro_categoria_id`) REFERENCES `categorias` (`cat_id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`pro_proveedor_id`) REFERENCES `proveedores` (`prov_id`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`pro_empresa_id`) REFERENCES `empresas` (`emp_id`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`prov_emp_id`) REFERENCES `empresas` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
