-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-12-2022 a las 16:02:37
-- Versión del servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
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
-- Base de datos: `proyecto_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_agregado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`, `fecha_agregado`) VALUES
(1, 'Bujías', 'Bujías para automoviles', '05-30-2022 01:25:23 pm'),
(9, 'Motores', 'Motores para automoviles', '05-30-2022 01:34:47 pm'),
(10, 'Llantas', 'Llantas para automoviles', '05-30-2022 01:55:25 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `imagen`) VALUES
(1, 'NGK Spark Plugs', 'https://seeklogo.com/images/N/ngk-logo-93069CD40C-seeklogo.com.png'),
(3, 'Motorcraft', 'https://static.wixstatic.com/media/94e5e5_beca9f75e27e40b0b434a3f3744672f1~mv2.png/v1/fill/w_400,h_184,al_c,q_85,enc_auto/motorcraft.png'),
(4, 'Bosch', 'https://upload.wikimedia.org/wikipedia/commons/c/c3/Bosch_logo.png'),
(5, 'Ferrari', 'https://i.pinimg.com/originals/cd/36/19/cd3619f9e171f176bf0774017147170d.png'),
(6, 'Porsche', 'http://assets.stickpng.com/images/580b585b2edbce24c47b2cac.png'),
(7, 'BMW', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f4/BMW_logo_%28gray%29.svg/600px-BMW_logo_%28gray%29.svg.png'),
(8, 'Michelin', 'https://www.buscopng.com/wp-content/uploads/2020/11/Michelin-logo.png'),
(9, 'Pirelli', 'https://marcas-logos.net/wp-content/uploads/2020/03/Pirelli-Logo.png'),
(10, 'GOODYEAR', 'https://www.pngmart.com/files/16/Goodyear-Logo-PNG-Picture.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` char(20) NOT NULL,
  `nombre` char(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_agregado` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `codigo`, `nombre`, `descripcion`, `fecha_agregado`, `stock`, `id_categoria`, `imagen`, `marca`) VALUES
(18, '5612', 'Bujía Motorcraft SP-515', 'Compatible con numerosos motores de diferentes marcas y modelos', '05-30-2022 12:43:53 pm', 12, 1, 'https://autopartsjr.com.ve/4749-thickbox_default/bujia-explorer-eddie-bauer-fx4-mustang-sport-trac-sp515.jpg', 3),
(19, '5613', 'Bosch 4417 Platinum + 4 FRGR7DQP', 'Cuenta con las especificaciones adecuadas para poder usarse en marcas como BMW, Toyota y Honda', '05-30-2022 12:46:40 pm', 8, 1, 'https://i.ebayimg.com/images/g/ONEAAOxyQQRR7doN/s-l500.jpg', 4),
(20, '5614', 'NGK 3403 g-power', 'Es muy económica en lo que respecta a las bujías', '05-30-2022 12:48:51 pm', 5, 1, 'https://i.ebayimg.com/images/g/LRwAAOSwvGFcuOT2/s-l400.jpg', 1),
(21, '8912', 'V8 biturbo de 3.9 litros', 'Rinde 670 CV a 8000, acelera de 0 a 100km/h en 3 seg, y alcanza 330km/h', '05-30-2022 01:35:12 pm', 3, 9, 'https://cdn.motor1.com/images/mgl/AV7AN/s4/2017-ferrari-488-gtb.jpg', 5),
(22, '8913', '718 Boxster S: 2.5-litre 4 cilindros turbo', 'Capaz de llegar hasta los 350 caballos de fuerza', '05-30-2022 01:47:32 pm', 7, 9, 'https://autosdeprimera.com/wp-content/uploads/2020/01/porsche_718_boxster_cayman_gts_40_e.jpg', 6),
(23, '8914', 'BMW 3 cilindros turbo de 1.5 litros', 'Cuenta con TwinPower Turbo ligado a una transmisión automática de doble embrague', '05-30-2022 01:51:14 pm', 3, 9, 'http://www.blogcdn.com/es.autoblog.com/media/2013/01/11-bmw-1-series-3-cyl-fd-1357673018.jpg', 7),
(24, '1289', 'Latitude Sport', 'Llante con un innovador compuesto para la banda de rodadura, con sílice y elastómeros de ultima generación', '05-30-2022 01:57:33 pm', 67, 10, 'https://unillantas.com.sv/storage/app/public/products/November2019/latitude-sport.png', 8),
(25, '1290', 'Cinturato™ P1™', 'Solucion premium para movilidad urbana', '05-30-2022 02:03:31 pm', 34, 10, 'http://www.tireschile.cl/assets/images/products/uploads/1606324273.jpg', 9),
(26, '1291', 'Llanta 235/80 R17 GOODYEAR WRANGLER ADVENTURE KEVLAR 120/117R', 'Buen rendimiento y conducción', '05-30-2022 02:07:16 pm', 20, 10, 'https://www.serna1.com/20097-large_default/llanta-235-80-r17-goodyear-wranglerall-terrain-adventure-with-kevlar-120-117r.jpg', 10),
(27, '11111', 'prueba', 'prebs', '06-11-2022 11:32:50 am', 12, 1, 'erddg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`idtipo`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `token` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`, `correo`, `estado`, `tipo`, `token`) VALUES
(1, 'admin', '$2y$10$rFVGxj6gS9MlGBzv9Rd.2.pBRpODnbADzNX5ieat7VCL5A/qli7wm', 'admin@gmail.com', 1, 1, 'xjl4tejf'),
(4, 'empleado', '$2y$10$dcD5A14AUp3ijb/T0xhlUORX4sz4nG5vjc1RX9Iby3cxNDtWkfQ.i', 'empleado@gmail.com', 1, 2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`idtipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
