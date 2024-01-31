-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2024 a las 03:18:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_liverpool`
--

CREATE TABLE `productos_liverpool` (
  `ID` bigint(10) NOT NULL,
  `PRODUCTO` varchar(30) NOT NULL,
  `PRECIO` float NOT NULL,
  `IMAGEN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_liverpool`
--

INSERT INTO `productos_liverpool` (`ID`, `PRODUCTO`, `PRECIO`, `IMAGEN`) VALUES
(980001324, 'TV SAMSUN 85 ', 15699.2, 'imagen_1.jpg'),
(980008765, 'BARRA SONIDO BOSE ', 10999.3, 'imagen_2.jpg'),
(980008456, 'BOCINA ALIEN 18', 5678.98, 'imagen_3.jpg'),
(120003456, 'ACER ASPIRE ONE', 21234.9, 'imagen_4.jpg'),
(560008764, 'HP OMEN NOTBOOK', 15970, 'imagen_5.jpg'),
(123456789, 'DJ DRON 18', 23345.9, 'imagen_6.jpg'),
(123456788, 'SALA LOVE RED', 20035, 'imagen_7.jpg'),
(234567777, 'CUADRO TORERO', 10765, 'imagen_8.jpg'),
(234567890, 'CONVERSE TALLA 6', 999.01, 'imagen_9.jpg'),
(345678901, 'SONY PS5 BUNDLE', 14000, 'imagen_10.jpg'),
(456789012, 'LAVADORA LG 18 KG', 14899, 'imagen_1.jpg'),
(567890123, 'SECADORA GE 17 KG', 16876, 'imagen_2.jpg'),
(678901234, 'REFRIGERADOR SAMSUNG 13 PIES', 86000, 'imagen_3.jpg'),
(789012345, 'PLANCHA PARA EL CABELLO ', 3599.99, 'imagen_4.jpg'),
(890123456, 'COLCHON SPRING AIR ', 66299.9, 'imagen_5.jpg'),
(901234567, 'COLCHON SOGNARE', 88000, 'imagen_6.jpg'),
(135792468, 'SET DE CUBIERTOS PLATA 925', 45000, 'imagen_7.jpg'),
(246813579, 'MESA DE CENTRO HOUSE ', 34001, 'imagen_8.jpg'),
(357924680, 'SILLA HAUSE LUCY', 23001, 'imagen_9.jpg'),
(468135791, 'SACO CABALLERO 42', 12345, 'imagen_10.jpg'),
(579246802, 'VESTIDO NOCHE DAMA 21', 10001, 'imagen_1.jpg'),
(690357913, 'BOTTELA DE AGUA LIVERPOOL', 98766, 'imagen_2.jpg'),
(801468024, 'BOLSA DE REGALO ', 55.03, 'imagen_3.jpg'),
(912579135, 'LENTES PRADA ', 45877, 'imagen_4.jpg'),
(987654321, 'LENTES GUCCI ', 99988, 'imagen_5.jpg'),
(876543210, 'LENTES GRADUADOS OPTICA', 6876.01, 'imagen_6.jpg'),
(765432109, 'SET DE COMEDOR 6 PZ', 3000.01, 'imagen_7.jpg'),
(654321098, 'SECADORA CROC ICE', 4500.98, 'imagen_8.jpg'),
(543210987, 'MANTELES NAVIDEÑOS SET 3', 1.46, 'imagen_9.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
