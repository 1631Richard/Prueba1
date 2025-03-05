-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2024 a las 04:39:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

create database pry_web;
use pry_web;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pry_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IDUsuario` varchar(20) NOT NULL,
  `correo_electronico` varchar(200) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDUsuario`, `correo_electronico`, `contrasena`) VALUES
('C001', 'kevin_risco@gmail.com', '12345'),
('C002', 'paul_calloquispe@gmail.com', '12345'),
('C003', 'richard_anchelia@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_producto`
--

CREATE TABLE `cliente_producto` (
  `IDUsuario` varchar(4) NOT NULL,
  `IDProducto` varchar(4) NOT NULL,
  `fecha_adquisicion` datetime DEFAULT current_timestamp(),
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente_producto`
--

INSERT INTO `cliente_producto` (`IDUsuario`, `IDProducto`, `fecha_adquisicion`, `Cantidad`) VALUES
('C001', 'P001', '2024-11-19 03:10:27', 1),
('C001', 'P004', '2024-11-19 03:10:27', 1),
('C001', 'P005', '2024-11-19 03:10:27', 1),
('C001', 'P008', '2024-11-19 03:10:27', 1),
('C002', 'P001', '2024-11-21 09:45:23', 0),
('C002', 'P003', '2024-11-19 04:38:16', 1),
('C002', 'P006', '2024-11-19 04:50:26', 1),
('C002', 'P007', '2024-11-19 04:53:36', 1),
('C002', 'P009', '2024-11-19 03:10:27', 1),
('C003', 'P003', '2024-11-19 03:10:27', 1),
('C003', 'P006', '2024-11-19 03:10:27', 1),
('C003', 'P007', '2024-11-19 03:10:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDProducto` varchar(6) NOT NULL,
  `nom_producto` varchar(25) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `IDUsuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IDProducto`, `nom_producto`, `descripcion`, `precio`, `IDUsuario`) VALUES
('P001', 'Producto1', 'Descripcion del producto 1', 10.50, 'C001'),
('P002', 'Producto2', 'Descripcion del producto 2', 15.99, 'C002'),
('P003', 'Producto3', 'Descripcion del producto 3', 7.25, 'C003'),
('P004', 'Producto4', 'Descripcion del producto 4', 12.30, 'C001'),
('P005', 'Producto5', 'Descripcion del producto 5', 20.00, 'C001'),
('P006', 'Producto6', 'Descripcion del producto 6', 5.99, 'C003'),
('P007', 'Producto7', 'Descripcion del producto 7', 50.00, 'C003'),
('P008', 'Producto8', 'Descripcion del producto 8', 35.75, 'C001'),
('P009', 'Producto9', 'Descripcion del producto 9', 8.99, 'C002'),
('P010', 'Producto10', 'Descripcion del producto 10', 60.00, 'C002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDUsuario` varchar(20) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `sexo` char(1) DEFAULT NULL CHECK (`sexo` in ('F','M'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDUsuario`, `nombre`, `apellido`, `sexo`) VALUES
('C001', 'Kevin', 'Risco', 'M'),
('C002', 'Paul', 'Calloquispe', 'M'),
('C003', 'Richard', 'Anchelia', 'M');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- Indices de la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD PRIMARY KEY (`IDUsuario`,`IDProducto`),
  ADD KEY `IDProducto` (`IDProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDUsuario` (`IDUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`IDUsuario`);

--
-- Filtros para la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD CONSTRAINT `cliente_producto_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `cliente` (`IDUsuario`),
  ADD CONSTRAINT `cliente_producto_ibfk_2` FOREIGN KEY (`IDProducto`) REFERENCES `productos` (`IDProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `cliente` (`IDUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
