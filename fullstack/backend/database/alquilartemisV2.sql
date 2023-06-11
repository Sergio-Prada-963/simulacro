-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2023 a las 01:41:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquilartemis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombreCliente` varchar(60) NOT NULL,
  `telefonoCliente` bigint(80) NOT NULL,
  `direccion` text NOT NULL,
  `correoCliente` text NOT NULL,
  `tipoCliente` varchar(60) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cotizacion` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `duracion` text NOT NULL,
  `nombreCliente` int(80) NOT NULL,
  `telefonoCliente` bigint(80) NOT NULL,
  `direccionCliente` int(100) NOT NULL,
  `tipoCliente` int(20) NOT NULL,
  `productos` int(100) NOT NULL,
  `nombreEmpleado` int(80) NOT NULL,
  `horaAlquiler` text NOT NULL,
  `precioProducto` bigint(100) NOT NULL,
  `total` bigint(200) NOT NULL,
  `detalleCot` text NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` bigint(80) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT current_timestamp(),
  `cargo` varchar(50) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombreProducto` varchar(100) NOT NULL,
  `costoDia` bigint(80) NOT NULL,
  `descripcion` text NOT NULL,
  `marca` text NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 0
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usuario` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` int(100) NOT NULL,
  `userName` text NOT NULL
);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `nombreEmpleado` (`nombreEmpleado`),
  ADD KEY `nombreCliente` (`nombreCliente`),
  ADD KEY `telefonoCliente` (`telefonoCliente`),
  ADD KEY `direccionCliente` (`direccionCliente`),
  ADD KEY `tipoCliente` (`tipoCliente`),
  ADD KEY `precioProducto` (`precioProducto`),
  ADD KEY `productos` (`productos`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`nombreEmpleado`) REFERENCES `empleados` (`id_empleado`),
  ADD CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`nombreCliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `cotizacion_ibfk_3` FOREIGN KEY (`telefonoCliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `cotizacion_ibfk_4` FOREIGN KEY (`direccionCliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `cotizacion_ibfk_5` FOREIGN KEY (`tipoCliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `cotizacion_ibfk_6` FOREIGN KEY (`precioProducto`) REFERENCES `productos` (`id_productos`),
  ADD CONSTRAINT `cotizacion_ibfk_7` FOREIGN KEY (`productos`) REFERENCES `productos` (`id_productos`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
