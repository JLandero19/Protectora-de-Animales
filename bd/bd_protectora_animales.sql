-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2023 a las 21:41:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_protectora_animales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_category_id` int(11) NOT NULL,
  `who_request` varchar(100) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `activity_category_id`, `who_request`, `start`, `end`) VALUES
(1, 1, 'Colegio Rodrigo de Jerez', '2023-11-08 12:00:00', '2023-11-08 13:00:00'),
(2, 1, 'IES La Arboleda', '2023-11-09 12:00:00', '2023-11-09 13:00:00'),
(3, 2, 'Colegio San José', '2023-11-15 11:15:00', '2023-11-15 12:15:00'),
(4, 3, 'Asociación de ayuda psicológica', '2023-11-16 11:15:00', '2023-11-16 12:15:00'),
(5, 1, 'Actividad contra el maltrato animal', '2023-11-10 17:00:00', '2023-11-10 18:00:00'),
(6, 2, 'Colegio San Lucar', '2023-11-17 17:00:00', '2023-11-17 18:00:00'),
(7, 3, 'Libre para particulares', '2023-11-24 17:00:00', '2023-11-25 17:00:00'),
(8, 2, 'Actividad contra el cancer', '2023-11-20 12:00:00', '2023-11-20 13:00:00'),
(9, 1, 'Instituto IES Guadiana', '2023-11-29 17:00:00', '2023-11-29 21:00:00'),
(10, 2, 'Instituto Banderin', '2023-11-27 16:30:00', '2023-11-27 17:30:00'),
(11, 2, 'Actividad contra el maltrato animal', '2023-11-22 21:00:00', '2023-11-22 22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities_categories`
--

CREATE TABLE `activities_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `textColor` varchar(20) NOT NULL,
  `backgroundColor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `activities_categories`
--

INSERT INTO `activities_categories` (`id`, `title`, `description`, `textColor`, `backgroundColor`) VALUES
(1, 'Visita Guiada', 'La visita guiada a la protectora de animales Love4Pets es una experiencia educativa que brinda a los visitantes la oportunidad de conocer de cerca el compromiso y el esfuerzo dedicado a la protección de animales en situación de vulnerabilidad. Durante la visita', '#ffffff', '#01BC58'),
(2, 'Clases doma de caballo', 'Las clases de doma de caballo de Love4Pets es una oportunidad para aquellos interesados en aprender las habilidades de doma y monta de caballos. Esta actividad educativa y recreativa está diseñada para principiantes.', '#ffffff', '#CF6E00'),
(3, 'Actividad para niños con dificultad para socializar', 'Está actividad está diseñada para que los niños con problemas para socializar puedan interactuar con los animales de la protectora de animales.', '#ffffff', '#1F7FFB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopted`
--

CREATE TABLE `adopted` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `adopted`
--

INSERT INTO `adopted` (`id`, `animal_id`, `user_id`, `start_date`, `end_date`) VALUES
(1, 6, 2, '2023-10-30 18:19:39', NULL),
(2, 1, 2, '2023-10-30 18:30:04', NULL),
(3, 10, 2, '2023-11-08 20:44:15', NULL),
(4, 2, 3, '2023-11-22 17:03:45', NULL),
(10, 7, 2, '2023-11-23 17:52:16', '2023-11-26 17:09:16'),
(11, 3, 3, '2023-11-29 10:56:21', NULL),
(12, 25, 3, '2023-11-30 19:07:39', NULL),
(13, 23, 3, '2023-11-30 19:09:05', NULL),
(14, 27, 3, '2023-11-30 19:09:31', NULL),
(15, 9, 3, '2023-11-30 19:10:02', NULL),
(16, 21, 3, '2023-11-30 19:10:27', NULL),
(17, 16, 3, '2023-11-30 19:11:03', NULL),
(18, 4, 2, '2023-12-18 17:06:45', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `all_data_activities`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `all_data_activities` (
`id` int(11)
,`activity_category_id` int(11)
,`title` varchar(250)
,`description` text
,`textColor` varchar(20)
,`backgroundColor` varchar(20)
,`start` datetime
,`end` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `chip` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `race` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `sex` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `image` varchar(200) NOT NULL,
  `specie_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `animals`
--

INSERT INTO `animals` (`id`, `chip`, `name`, `race`, `description`, `sex`, `age`, `image`, `specie_id`, `creation_date`) VALUES
(1, '614309598645434', 'Dilmas', 'Beagle', 'Dilmas fue encontrado en la calle, desnutrido y asustado. Ha sido rescatado y ahora está en proceso de recuperación.', 'Macho', 2, 'dilmas.jpg', 1, '2023-10-09 00:00:00'),
(2, '315721630843402', 'Camelia', 'Shiba Inu', 'Camelia fue abandonada en un refugio para animales. A pesar de estar un poco nerviosa al principio, ha comenzado a adaptarse bien.', 'Hembra', 3, 'camelia.jpg', 1, '2023-10-09 00:00:00'),
(3, '736379412631870', 'Chispita', 'Papillon', 'Chispita fue encontrado en un parque, solo y desorientado. Fue rescatado y ahora está buscando un hogar amoroso.', 'Macho', 1, 'chispita.jpg', 1, '2023-10-09 00:00:00'),
(4, '353771083769184', 'Coimbra', 'Jack Russell', 'Coimbra fue entregada por su dueño anterior debido a dificultades financieras. Está buscando un nuevo hogar donde la cuiden y amen.', 'Hembra', 3, 'coimbra.jpg', 1, '2023-10-09 00:00:00'),
(5, '454039989805193', 'Chocobom', 'Pitweiler', 'Chocobomfue rescatado de un refugio para animales mayores. Tiene artritis, pero su personalidad encantadora lo hace muy especial.', 'Macho', 11, 'chocobom.jpg', 1, '2023-10-09 00:00:00'),
(6, '297627241471039', 'Manué', 'Cobrador', 'Manué fue encontrado en un parque, vagando sin rumbo fijo. Estaba desnutrido y deshidratado, pero ahora está en proceso de recuperación y en busca de un nuevo hogar', 'Macho', 10, 'manue.jpg', 1, '2023-10-09 00:00:00'),
(7, '867767427592998', 'Leiya', 'Frisón', 'Leiya fue rescatada de un entorno de maltrato y abandono. Estaba extremadamente asustada, pero con amor y cuidados veterinarios, ha comenzado a confiar en las personas', 'Hembra', 1, 'leiya.jpg', 1, '2023-10-09 00:00:00'),
(8, '127599537231523', 'Mollete', 'Chiguagua', 'Molletefue encontrado abandonado en una caja en la puerta de un refugio para animales. Es un cachorro juguetón que necesita un hogar cariñoso', 'Macho', 1, 'mollete.jpg', 1, '2023-10-09 00:00:00'),
(9, '148305539962479', 'Whiskers', 'Desconocido', 'Whiskers fue rescatado de un refugio de animales donde había sido abandonado por su dueño anterior. Estaba buscando un nuevo hogar cariñoso.', 'Macho', 2, 'whiskers.jpg', 2, '2023-10-10 00:00:00'),
(10, '282066089319851', 'Luna', 'Desconocido', 'Luna fue encontrada en un callejón, sola y desnutrida. Fue rescatada y ahora está en proceso de recuperación.', 'Hembra', 3, 'luna.jpg', 2, '2023-10-10 00:00:00'),
(11, '765894180127803', 'Simón', 'Desconocido', 'Simón fue encontrado vagando en un parque, desorientado y hambriento. Fue rescatado y ahora busca un hogar amoroso.', 'Macho', 1, 'simon.jpg', 2, '2023-10-10 00:00:00'),
(12, '116960737121816', 'Bella', 'Desconocido', 'Bella fue entregada a un refugio debido a problemas de alergia en su hogar anterior. Está en busca de un nuevo lugar donde la amen.', 'Hembra', 4, 'bella.jpg', 2, '2023-10-10 00:00:00'),
(13, '816071652985621', 'Oliver', 'Desconocido', 'Oliver fue rescatado de una situación de maltrato y abandono. Estaba extremadamente asustado, pero con el tiempo ha comenzado a confiar en las personas.', 'Macho', 2, 'oliver.jpg', 2, '2023-10-10 00:00:00'),
(14, '539401670575053', 'Nala', 'Desconocido', 'Nala fue encontrada en un refugio de animales después de ser abandonada por su dueño anterior. Es una gatita tímida pero dulce en busca de un nuevo hogar.', 'Hembra', 2, 'nala.jpg', 2, '2023-10-10 00:00:00'),
(15, '806218374022518', 'Leo', 'Desconocido', 'Leo fue rescatado de la calle cuando era un gatito recién nacido. Ha crecido felizmente en un hogar de acogida y ahora está listo para ser adoptado.', 'Macho', 1, 'leo.jpg', 2, '2023-10-10 00:00:00'),
(16, '333787695107805', 'Mia', 'Desconocido', 'Mia fue encontrada en un parque, solitaria y hambrienta. Fue rescatada y ahora está buscando un nuevo hogar donde pueda recibir todo el cariño que merece.', 'Hembra', 1, 'mia.jpg', 2, '2023-10-10 00:00:00'),
(17, '894227433301953', 'Trovador', 'Andaluz', 'Trovador llegó a nuestra protectora de animales en busca de un nuevo hogar. Este hermoso caballo de raza Andaluz, con su pelaje bayo, busca un lugar donde lo cuiden y le den el cariño que se merece.', 'Macho', 7, 'trovador.jpg', 3, '2023-10-10 00:00:00'),
(18, '230555332003789', 'Lluna', 'Pura Sangre Inglés', 'Luna fue rescatada y ahora está en nuestro refugio en busca de una familia amorosa. Es una yegua Pura Sangre Inglés de color alazán que espera ansiosamente un hogar.', 'Hembra', 12, 'lluna.jpg', 3, '2023-10-10 00:00:00'),
(19, '886719632038726', 'Thunder', 'Cuarto de Milla', 'Thunder llegó a nuestra protectora en busca de un nuevo comienzo. Es un caballo Cuarto de Milla con un pelaje pío overo y está ansioso por encontrar un hogar.', 'Macho', 6, 'thunder.jpg', 3, '2023-10-10 00:00:00'),
(20, '937362274816186', 'Aurora', 'Frisón', 'Aurora, una majestuosa yegua Frisón de color negro, está en nuestro refugio esperando una segunda oportunidad.', 'Hembra', 8, 'aurora.jpg', 3, '2023-10-10 00:00:00'),
(21, '044495166091582', 'Max', 'Appaloosa', 'Max es un caballo Appaloosa con un pelaje leopardo que llegó a nuestra protectora en busca de un lugar donde pueda disfrutar de la vida.', 'Macho', 1, 'max.jpg', 3, '2023-10-10 00:00:00'),
(22, '785605219833976', 'Belleza', 'Árabe', 'Belleza, una joven yegua Árabe de color gris, fue rescatada y ahora busca un hogar lleno de amor y cuidados en nuestra protectora de animales.', 'Hembra', 4, 'belleza.jpg', 3, '2023-10-10 00:00:00'),
(23, '284096108029494', 'Rocky', 'Mustang', 'Rocky fue rescatado de la vida salvaje y ahora está en nuestro refugio en busca de un hogar. Este caballo Mustang de color castaño ha superado muchas dificultades y espera una nueva vida.', 'Macho', 9, 'rocky.jpg', 3, '2023-10-10 00:00:00'),
(24, '561042430199188', 'Diamond', 'Paso Fino', 'Diamond, un caballo Paso Fino de color bayo, llegó a nuestra protectora de animales en busca de un lugar donde pueda pasar sus años dorados.', 'Macho', 12, 'diamond.jpg', 3, '2023-10-10 00:00:00'),
(25, '133319740339629', 'Sunny', 'Canario', 'Sunny es un canario encantador que ha llegado a nuestra protectora de animales en busca de un nuevo hogar. Su canto melodioso ilumina el refugio y espera encontrar una familia que aprecie su belleza y melodías.', 'Macho', 2, 'canario-sunny.jpg', 4, '2023-10-10 00:00:00'),
(26, '333149987324418', 'Kiwi', 'Periquito', 'Kiwi es un periquito juguetón que ha sido rescatado y ahora está en nuestro refugio. Anhela un hogar donde pueda explorar y jugar con seguridad.', 'Macho', 1, 'periquito-kiwi.jpg', 4, '2023-10-10 00:00:00'),
(27, '410270211488343', 'Coco', 'Cacatúa', 'Coco, una cacatúa con una personalidad única, ha llegado a nuestro refugio en busca de una segunda oportunidad. Coco disfruta del contacto humano y de hacer sonidos divertidos.', 'Macho', 5, 'cacatua-coco.jpg', 4, '2023-10-10 00:00:00'),
(28, '360686999976592', 'Lola', 'Agaporni', 'Lola es un agaporni cariñoso que fue rescatado y ahora está en nuestro refugio esperando un hogar lleno de amor y atención.', 'Hembra', 5, 'agaporni-lola.jpg', 4, '2023-10-10 00:00:00'),
(29, '480390092592723', 'Charlie', 'Canario', 'Charlie es un canario tranquilo que ha encontrado refugio en nuestro centro. Su dulce canto es una alegría para todos los que lo conocen.', 'Macho', 4, 'canario-charlie.jpg', 4, '2023-10-10 00:00:00'),
(30, '120760182074532', 'Paqui', 'Periquito', 'Paqui, una periquita curiosa, está en nuestro refugio en busca de un hogar que aprecie su personalidad juguetona y su amor por aprender nuevos trucos.', 'Hembra', 2, 'periquito-paqui.jpg', 4, '2023-10-10 00:00:00'),
(31, '642260921580003', 'Loki', 'Loro', 'Loki, un loro gris africano inteligente, está en nuestro refugio en busca de una familia que le brinde amor y estimulación mental. Loki puede hablar y es un compañero juguetón.', 'Macho', 8, 'loro-loki.jpg', 4, '2023-10-10 00:00:00'),
(32, '997362275016185', 'Paquito', 'Loro', 'Es un loro de color azul y amarillo, le gustas pipas y si le hablas te contesta de forma graciosa', 'Macho', 2, '0.94561100-1700756019-loro-paquito.jpg', 4, '2023-11-23 17:13:39');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `animals_species`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `animals_species` (
`id` int(11)
,`chip` varchar(15)
,`name` varchar(100)
,`race` varchar(20)
,`description` text
,`sex` varchar(10)
,`age` int(3)
,`image` varchar(200)
,`specie_id` int(11)
,`specie_name` varchar(100)
,`creation_date` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `calendar_activities`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `calendar_activities` (
`id` int(11)
,`title` varchar(353)
,`who_request` varchar(100)
,`textColor` varchar(20)
,`backgroundColor` varchar(20)
,`activity_category_id` int(11)
,`category_title` varchar(250)
,`category_description` text
,`start` datetime
,`end` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `publication_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `comment`, `status`, `publication_id`, `user_id`, `creation_date`, `modify_date`) VALUES
(1, 'Se le ve cara majete al colega', 'Valido', 9, 2, '2023-10-26 18:00:17', '2023-10-26 18:09:04'),
(2, 'Me encanta este caballo', 'Valido', 9, 2, '2023-11-04 22:18:57', '2023-11-08 09:56:36');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `comment_user`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `comment_user` (
`id` int(11)
,`comment` varchar(500)
,`status` varchar(20)
,`publication_id` int(11)
,`user_id` int(11)
,`creation_date` datetime
,`modify_date` datetime
,`dni` varchar(9)
,`name` varchar(100)
,`lastname` varchar(150)
,`tlf` varchar(12)
,`user_image` varchar(200)
,`role_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_emails`
--

CREATE TABLE `contact_emails` (
  `id` int(11) NOT NULL,
  `name_to` varchar(50) NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `contact_emails`
--

INSERT INTO `contact_emails` (`id`, `name_to`, `mail_to`, `subject`, `message`, `creation_date`) VALUES
(1, 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:46:58'),
(2, 'Javier Landero Rodriguez', 'javierlandero9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:48:58'),
(3, 'Javier Landero Rodriguez', 'javierlandero9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:50:23'),
(4, 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:54:26'),
(5, 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:57:48'),
(6, 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', 'Mas información sobre la adopción.', 'Mas información sobre la adopción.', '2023-11-30 18:59:06'),
(7, 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', 'Adopción de un animal', 'Me gustaría hacer una visita para ver si puedo adoptar alguno de vuestros perros.', '2023-12-18 16:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `order_id` text DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `donations`
--

INSERT INTO `donations` (`id`, `order_id`, `name`, `email`, `amount`, `status`, `creation_date`) VALUES
(1, 'EC-50T51780Y3999134G', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '5.00', 'Aceptado', '2023-09-13 23:43:48'),
(2, 'EC-6SK449084R572352T', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '15.00', 'Aceptado', '2023-09-12 23:57:21'),
(3, 'EC-5TS031879E023562N', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '15.00', 'Aceptado', '2023-09-24 17:36:25'),
(4, 'EC-0S152321LE772121F', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '5.00', 'Aceptado', '2023-09-14 17:41:20'),
(6, 'EC-34C38753A2372050G', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '5.00', 'Aceptado', '2023-10-14 17:47:05'),
(7, 'EC-7G764292FE470803P', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '5.00', 'Aceptado', '2023-10-14 17:53:36'),
(8, 'EC-91919292SE405794A', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '15.00', 'Aceptado', '2023-11-15 09:47:07'),
(9, 'EC-7GB40466LS5148543', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '15.00', 'Aceptado', '2023-11-17 11:54:43'),
(14, 'EC-82J396863X4523807', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-11-25 17:54:16'),
(15, 'EC-2P0835426M8833618', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-11-27 17:55:21'),
(16, 'EC-4DS412807J8229513', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-11-30 17:58:31'),
(19, 'EC-13K66063BU729810V', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '25.00', 'Aceptado', '2023-12-01 18:22:23'),
(20, 'EC-4X762608X58501003', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-12-01 18:32:16'),
(21, 'EC-5WA10704HF4868522', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-12-01 18:32:59'),
(22, 'EC-46F43810V1788451A', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-12-01 18:37:11'),
(23, 'EC-26B61760LW5366847', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '20.00', 'Aceptado', '2023-12-01 18:38:08'),
(24, 'EC-80T27864CR005273V', 'Javier Landero Rodriguez', 'javiersevillista9@gmail.com', '10.00', 'Aceptado', '2023-12-18 17:16:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `category` varchar(25) NOT NULL,
  `specie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `category`, `specie_id`) VALUES
(1, 'gallery-1.jpg', 'gallery', 2),
(2, 'gallery-2.jpg', 'gallery', 1),
(3, 'gallery-3.jpg', 'gallery', 2),
(4, 'gallery-4.jpg', 'gallery', 2),
(5, 'gallery-5.jpg', 'gallery', 1),
(6, 'gallery-6.jpg', 'gallery', 1),
(7, 'gallery-7.jpg', 'gallery', 1),
(8, 'gallery-8.jpg', 'gallery', 3),
(9, 'gallery-9.jpg', 'gallery', 1),
(10, 'gallery-10.jpg', 'gallery', 2),
(11, 'gallery-11.jpg', 'gallery', 1),
(12, 'gallery-12.jpg', 'gallery', 1),
(13, 'gallery-13.jpg', 'gallery', 2),
(14, 'gallery-14.jpg', 'gallery', 2),
(15, 'gallery-15.jpg', 'gallery', 3),
(16, '0.65961900-1700755771-leiya.jpg', 'publications', 1),
(17, '0.94561100-1700756019-loro-paquito.jpg', 'animals', 4),
(21, '0.99900200-1703001189-perro-galeria-1.jpg', 'publications', 1),
(23, '0.83893000-1703001295-gato-galeria-1.jpg', 'publications', 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `no_adopted_animals`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `no_adopted_animals` (
`id` int(11)
,`chip` varchar(15)
,`name` varchar(100)
,`race` varchar(20)
,`description` text
,`sex` varchar(10)
,`age` int(3)
,`image` varchar(200)
,`specie_id` int(11)
,`specie_name` varchar(100)
,`creation_date` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `specie_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `publications`
--

INSERT INTO `publications` (`id`, `title`, `description`, `image`, `specie_id`, `user_id`, `creation_date`, `modify_date`) VALUES
(2, 'La experiencia de Luna', 'Luna finalmente llegó a su nuevo hogar. Al principio, la gata se escondía bajo el sofá y solo salía por las noches para explorar. Con el tiempo, Luna se transformó en una gata cariñosa y juguetona.', '0.82727600-1697714342-luna.jpg', 2, 2, '2023-10-19 13:19:02', NULL),
(3, 'El cariño de Camelia', 'Los primeros días en su nuevo hogar fueron desafiantes. Camelia estaba asustada y desconfiada. Pasamos tiempo juntos y poco a poco, Camelia comenzó a abrirse, y su personalidad cariñosa empezó a emerger.', '0.97226500-1697714522-camelia.jpg', 1, 2, '2023-10-19 13:22:02', NULL),
(4, 'Es pequeño pero con mucha energía', 'Desde el momento en que Chispita entró en su nuevo hogar, trajo consigo una dosis de alegría y energía. Juguetón y afectuoso, Chispita rápidamente se ganó el corazón de todos en la familia.', '0.80144200-1697715184-chispita.jpg', 1, 2, '2023-10-19 13:33:04', NULL),
(5, 'Sunny mi nuevo amigo', 'Sunny se encuentra estupendamente bien con nosotros y le ha gustado especialmente una zona de la casa donde practicamente se lleva allí todo el día, al principio se quedaba en la jaula y poco a poco los fuimos soltando por la casa, ya hasta canta cuando estamos cocinando.', '0.56646000-1698248138-canario-sunny.jpg', 4, 3, '2023-10-25 17:35:38', NULL),
(6, 'Rocky Balboa, nunca se rinde', 'Al principio Rocky era un poco tímido pero con tiempo y cariño nos ha ido cogiendo confianza ahora nos deja montar sobre su lomo.', '0.25921400-1698248320-rocky.jpg', 3, 3, '2023-10-25 17:38:40', NULL),
(7, 'El graciosillo', 'Este colega desde que llego a nuestro hogar le encantó a nuestra familia, cada vez que entra alguien a casa lo saluda con sonidos graciosos y todos nos divertimos que ese tipo de detalles que nos deja nuestro pequeño amigo', '0.38071900-1698248963-cacatua-coco.jpg', 4, 3, '2023-10-25 17:49:23', NULL),
(8, 'Tiene cara de malo pero es muy cariñoso', 'Este amiguito desde que lo vimos en la protectora ya sabiamos que no era lo que aparenta, parece enfadado pero cuando se acostumbró a nuestra compañía y al cariño que le damos se la pasa mirando lo que hacemos y de vez en cuando le apetece que lo acariciemos cuando estamos en el sofá viendo la televisión', '0.85097800-1698249158-whiskers.jpg', 2, 3, '2023-10-25 17:52:38', NULL),
(9, 'Ya solo por la cara se le ve lo bueno que es', 'Con solo lo verle la cara vimos que esté amiguito se vendría con nosotros, damos muchos paseos con él parece que le encanta cuando vamos a buscarlo o darle de comer se emociona porque sabe que lo tratamos como uno más de la familia', '0.78746900-1698249366-max.jpg', 3, 3, '2023-10-25 17:56:06', NULL),
(10, 'Se han hecho amigos', 'Estamos felices de adoptar de Bella se lleva muy bien con nuestro perro, al principio desconfió pero ahora se llevan como buenos amigos', '0.30376600-1699722560-bella.jpg', 2, 2, '2023-11-11 18:09:20', NULL),
(11, 'Mia está chiquita', 'Es chiquita, pero todos las queremos desde que la adoptamos, fue un proceso largo de adaptación porque no se dejaba acariciar con el tiempo nos ha cogido cariño', '0.03469600-1699807483-mia.jpg', 2, 3, '2023-11-12 17:44:43', NULL),
(12, 'Nuestro nuevo amigo', 'Está siendo increíble tenerlo en casa, es cariñosa y tranquila, aunque también sus arranques cuando entra alguien nuevo a casa.', '0.65961900-1700755771-leiya.jpg', 1, 2, '2023-11-23 17:09:31', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `publications_users`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `publications_users` (
`id` int(11)
,`title` varchar(150)
,`description` text
,`image` text
,`specie_id` int(11)
,`specie_name` varchar(100)
,`creation_date` datetime
,`modify_date` datetime
,`user_id` int(11)
,`dni` varchar(9)
,`name` varchar(100)
,`lastname` varchar(150)
,`tlf` varchar(12)
,`user_image` varchar(200)
,`role_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `profile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `email`, `password`, `profile`) VALUES
(1, 'admin@gmail.com', 'f8ded71672a8b44720a1b98c24a94efc5b551572c83f7460c7a4c5687c38dd1c191d45226d51a4a49325e855cadc5ec9f7efef0e760fab9c7b3f867932ef3f75', 'admin'),
(2, 'javiersevillista9@gmail.com', 'e788c9098e9af811c184fc759a95d743925c4ed2c3a25c0f23f8e44b920709d60ebfa47bde9fd25e2c257d9e49cdf0f6de1c35119493ea4d0d756f56de19366b', NULL),
(3, 'javiersevillista3@gmail.com', 'e788c9098e9af811c184fc759a95d743925c4ed2c3a25c0f23f8e44b920709d60ebfa47bde9fd25e2c257d9e49cdf0f6de1c35119493ea4d0d756f56de19366b', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `role_users`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `role_users` (
`role_id` int(11)
,`email` varchar(100)
,`password` text
,`profile` varchar(10)
,`user_id` int(11)
,`dni` varchar(9)
,`name` varchar(100)
,`lastname` varchar(150)
,`tlf` varchar(12)
,`image` varchar(200)
,`code` varchar(20)
,`confirm` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `species`
--

INSERT INTO `species` (`id`, `name`, `image`) VALUES
(1, 'Perro', 'dog-icon.png'),
(2, 'Gato', 'cat-icon.png'),
(3, 'Caballo', 'horse-icon.png'),
(4, 'Pájaro', 'bird-icon.png'),
(5, 'Otro', 'other-icon.png');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `species_animals_adopted`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `species_animals_adopted` (
`id` int(11)
,`chip` varchar(15)
,`name` varchar(100)
,`race` varchar(20)
,`description` text
,`sex` varchar(10)
,`age` int(3)
,`image` varchar(200)
,`specie_id` int(11)
,`specie_name` varchar(100)
,`user_id` int(11)
,`dni` varchar(9)
,`user_name` varchar(100)
,`user_lastname` varchar(150)
,`tlf` varchar(12)
,`image_user` varchar(200)
,`role_id` int(11)
,`adopted_id` int(11)
,`start_date` datetime
,`end_date` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `species_animals_sponsored`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `species_animals_sponsored` (
`id` int(11)
,`chip` varchar(15)
,`name` varchar(100)
,`race` varchar(20)
,`description` text
,`sex` varchar(10)
,`age` int(3)
,`image` varchar(200)
,`specie_id` int(11)
,`specie_name` varchar(100)
,`user_id` int(11)
,`dni` varchar(9)
,`user_name` varchar(100)
,`user_lastname` varchar(150)
,`tlf` varchar(12)
,`image_user` varchar(200)
,`role_id` int(11)
,`sponsored_id` int(11)
,`status` varchar(20)
,`start_date` datetime
,`end_date` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sponsored`
--

CREATE TABLE `sponsored` (
  `id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT 'Activo',
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sponsored`
--

INSERT INTO `sponsored` (`id`, `animal_id`, `user_id`, `status`, `start_date`, `end_date`) VALUES
(1, 11, 2, 'Cancelado', '2023-10-23 13:16:34', '2023-11-23 13:16:34'),
(2, 12, 2, 'Activo', '2023-11-26 19:38:24', '2023-12-26 19:38:24'),
(3, 13, 3, 'Activo', '2023-11-29 10:20:57', '2023-12-29 10:20:57'),
(10, 8, 3, 'Cancelado', '2023-11-30 19:38:16', '2023-12-30 19:38:16'),
(11, 4, 2, 'Cancelado', '2023-12-18 17:04:58', '2024-01-17 17:04:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Perro'),
(2, 'Gato'),
(3, 'Caballo'),
(4, 'Pájaro'),
(5, 'Amigos'),
(6, 'Historia feliz'),
(7, 'Familia'),
(8, 'Cachorro'),
(9, 'Melenudo'),
(10, 'Grandullon'),
(11, 'Pequeño'),
(12, 'Cariñoso'),
(13, 'Tranquilo'),
(14, 'Natural'),
(16, 'Amiguito'),
(17, 'Ejemplo 1'),
(18, 'sdf');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tags_for_publicacion`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tags_for_publicacion` (
`id` int(11)
,`tag_id` int(11)
,`name` varchar(50)
,`publication_id` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags_publications`
--

CREATE TABLE `tags_publications` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `publication_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tags_publications`
--

INSERT INTO `tags_publications` (`id`, `tag_id`, `publication_id`) VALUES
(2, 2, 2),
(3, 1, 3),
(4, 1, 4),
(5, 4, 5),
(6, 3, 6),
(7, 4, 7),
(8, 2, 8),
(9, 3, 9),
(12, 2, 11),
(13, 7, 11),
(14, 10, 11),
(15, 1, 12),
(16, 12, 12),
(17, 13, 12),
(27, 2, 10),
(28, 5, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(150) DEFAULT NULL,
  `tlf` varchar(12) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `confirm` varchar(10) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `name`, `lastname`, `tlf`, `image`, `code`, `confirm`, `role_id`) VALUES
(1, '000000000', 'Administrador', NULL, NULL, 'admin.png', NULL, 'Aceptado', 1),
(2, '29628686V', 'Javier', 'Landero Rodríguez', '625812956', '0.61390200-1702916102-ace_perfil.jpg', 'qEcHEepw2kDxCiYwo673', 'Aceptado', 2),
(3, '29628685Q', 'Adrian', 'Landero Rodríguez', '625812956', NULL, 'K3axU6IVUIi1U84gD7HZ', 'Aceptado', 3);

-- --------------------------------------------------------

--
-- Estructura para la vista `all_data_activities`
--
DROP TABLE IF EXISTS `all_data_activities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_data_activities`  AS SELECT `a`.`id` AS `id`, `a`.`activity_category_id` AS `activity_category_id`, `ac`.`title` AS `title`, `ac`.`description` AS `description`, `ac`.`textColor` AS `textColor`, `ac`.`backgroundColor` AS `backgroundColor`, `a`.`start` AS `start`, `a`.`end` AS `end` FROM (`activities_categories` `ac` join `activities` `a` on(`ac`.`id` = `a`.`activity_category_id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `animals_species`
--
DROP TABLE IF EXISTS `animals_species`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `animals_species`  AS SELECT `a`.`id` AS `id`, `a`.`chip` AS `chip`, `a`.`name` AS `name`, `a`.`race` AS `race`, `a`.`description` AS `description`, `a`.`sex` AS `sex`, `a`.`age` AS `age`, `a`.`image` AS `image`, `a`.`specie_id` AS `specie_id`, `s`.`name` AS `specie_name`, `a`.`creation_date` AS `creation_date` FROM (`species` `s` join `animals` `a` on(`s`.`id` = `a`.`specie_id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `calendar_activities`
--
DROP TABLE IF EXISTS `calendar_activities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `calendar_activities`  AS SELECT `a`.`id` AS `id`, concat(`a`.`who_request`,' (',`ac`.`title`,')') AS `title`, `a`.`who_request` AS `who_request`, `ac`.`textColor` AS `textColor`, `ac`.`backgroundColor` AS `backgroundColor`, `ac`.`id` AS `activity_category_id`, `ac`.`title` AS `category_title`, `ac`.`description` AS `category_description`, `a`.`start` AS `start`, `a`.`end` AS `end` FROM (`activities_categories` `ac` join `activities` `a` on(`ac`.`id` = `a`.`activity_category_id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `comment_user`
--
DROP TABLE IF EXISTS `comment_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `comment_user`  AS SELECT `c`.`id` AS `id`, `c`.`comment` AS `comment`, `c`.`status` AS `status`, `c`.`publication_id` AS `publication_id`, `c`.`user_id` AS `user_id`, `c`.`creation_date` AS `creation_date`, `c`.`modify_date` AS `modify_date`, `u`.`dni` AS `dni`, `u`.`name` AS `name`, `u`.`lastname` AS `lastname`, `u`.`tlf` AS `tlf`, `u`.`image` AS `user_image`, `u`.`role_id` AS `role_id` FROM (`comments` `c` join `users` `u` on(`c`.`user_id` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `no_adopted_animals`
--
DROP TABLE IF EXISTS `no_adopted_animals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `no_adopted_animals`  AS SELECT `a`.`id` AS `id`, `a`.`chip` AS `chip`, `a`.`name` AS `name`, `a`.`race` AS `race`, `a`.`description` AS `description`, `a`.`sex` AS `sex`, `a`.`age` AS `age`, `a`.`image` AS `image`, `a`.`specie_id` AS `specie_id`, `s`.`name` AS `specie_name`, `a`.`creation_date` AS `creation_date` FROM (`animals` `a` join `species` `s` on(`a`.`specie_id` = `s`.`id`)) WHERE !(`a`.`id` in (select `adopted`.`animal_id` from `adopted`)) AND !(`a`.`id` in (select `sponsored`.`animal_id` from `sponsored` where `sponsored`.`status` like 'Activo'))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `publications_users`
--
DROP TABLE IF EXISTS `publications_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `publications_users`  AS SELECT `p`.`id` AS `id`, `p`.`title` AS `title`, `p`.`description` AS `description`, `p`.`image` AS `image`, `p`.`specie_id` AS `specie_id`, `s`.`name` AS `specie_name`, `p`.`creation_date` AS `creation_date`, `p`.`modify_date` AS `modify_date`, `p`.`user_id` AS `user_id`, `u`.`dni` AS `dni`, `u`.`name` AS `name`, `u`.`lastname` AS `lastname`, `u`.`tlf` AS `tlf`, `u`.`image` AS `user_image`, `u`.`role_id` AS `role_id` FROM ((`publications` `p` join `species` `s` on(`s`.`id` = `p`.`specie_id`)) join `users` `u` on(`p`.`user_id` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `role_users`
--
DROP TABLE IF EXISTS `role_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `role_users`  AS SELECT `r`.`id` AS `role_id`, `r`.`email` AS `email`, `r`.`password` AS `password`, `r`.`profile` AS `profile`, `u`.`id` AS `user_id`, `u`.`dni` AS `dni`, `u`.`name` AS `name`, `u`.`lastname` AS `lastname`, `u`.`tlf` AS `tlf`, `u`.`image` AS `image`, `u`.`code` AS `code`, `u`.`confirm` AS `confirm` FROM (`roles` `r` join `users` `u` on(`r`.`id` = `u`.`role_id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `species_animals_adopted`
--
DROP TABLE IF EXISTS `species_animals_adopted`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `species_animals_adopted`  AS SELECT `a`.`id` AS `id`, `a`.`chip` AS `chip`, `a`.`name` AS `name`, `a`.`race` AS `race`, `a`.`description` AS `description`, `a`.`sex` AS `sex`, `a`.`age` AS `age`, `a`.`image` AS `image`, `a`.`specie_id` AS `specie_id`, `s`.`name` AS `specie_name`, `u`.`id` AS `user_id`, `u`.`dni` AS `dni`, `u`.`name` AS `user_name`, `u`.`lastname` AS `user_lastname`, `u`.`tlf` AS `tlf`, `u`.`image` AS `image_user`, `u`.`role_id` AS `role_id`, `ad`.`id` AS `adopted_id`, `ad`.`start_date` AS `start_date`, `ad`.`end_date` AS `end_date` FROM (((`animals` `a` join `species` `s` on(`s`.`id` = `a`.`specie_id`)) join `adopted` `ad` on(`ad`.`animal_id` = `a`.`id`)) join `users` `u` on(`ad`.`user_id` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `species_animals_sponsored`
--
DROP TABLE IF EXISTS `species_animals_sponsored`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `species_animals_sponsored`  AS SELECT `a`.`id` AS `id`, `a`.`chip` AS `chip`, `a`.`name` AS `name`, `a`.`race` AS `race`, `a`.`description` AS `description`, `a`.`sex` AS `sex`, `a`.`age` AS `age`, `a`.`image` AS `image`, `a`.`specie_id` AS `specie_id`, `s`.`name` AS `specie_name`, `u`.`id` AS `user_id`, `u`.`dni` AS `dni`, `u`.`name` AS `user_name`, `u`.`lastname` AS `user_lastname`, `u`.`tlf` AS `tlf`, `u`.`image` AS `image_user`, `u`.`role_id` AS `role_id`, `sp`.`id` AS `sponsored_id`, `sp`.`status` AS `status`, `sp`.`start_date` AS `start_date`, `sp`.`end_date` AS `end_date` FROM (((`animals` `a` join `species` `s` on(`s`.`id` = `a`.`specie_id`)) join `sponsored` `sp` on(`sp`.`animal_id` = `a`.`id`)) join `users` `u` on(`sp`.`user_id` = `u`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `tags_for_publicacion`
--
DROP TABLE IF EXISTS `tags_for_publicacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tags_for_publicacion`  AS SELECT `tp`.`id` AS `id`, `tp`.`tag_id` AS `tag_id`, `t`.`name` AS `name`, `tp`.`publication_id` AS `publication_id` FROM (`tags` `t` join `tags_publications` `tp` on(`t`.`id` = `tp`.`tag_id`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_activities_categories` (`activity_category_id`);

--
-- Indices de la tabla `activities_categories`
--
ALTER TABLE `activities_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adopted`
--
ALTER TABLE `adopted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_adopted_animal` (`animal_id`),
  ADD KEY `FK_adopted_user` (`user_id`);

--
-- Indices de la tabla `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chip` (`chip`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_users` (`user_id`),
  ADD KEY `FK_comments_publications` (`publication_id`);

--
-- Indices de la tabla `contact_emails`
--
ALTER TABLE `contact_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`) USING HASH;

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_users` (`user_id`),
  ADD KEY `publications_specie` (`specie_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sponsored`
--
ALTER TABLE `sponsored`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sponsored_animal` (`animal_id`),
  ADD KEY `FK_sponsored_user` (`user_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags_publications`
--
ALTER TABLE `tags_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tags_tag_publications` (`tag_id`),
  ADD KEY `FK_publication_tag_publications` (`publication_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`,`code`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `activities_categories`
--
ALTER TABLE `activities_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `adopted`
--
ALTER TABLE `adopted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contact_emails`
--
ALTER TABLE `contact_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sponsored`
--
ALTER TABLE `sponsored`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tags_publications`
--
ALTER TABLE `tags_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `FK_activities_categories` FOREIGN KEY (`activity_category_id`) REFERENCES `activities_categories` (`id`);

--
-- Filtros para la tabla `adopted`
--
ALTER TABLE `adopted`
  ADD CONSTRAINT `FK_adopted_animal` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `FK_adopted_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_specie` FOREIGN KEY (`specie_id`) REFERENCES `species` (`id`),
  ADD CONSTRAINT `publications_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sponsored`
--
ALTER TABLE `sponsored`
  ADD CONSTRAINT `FK_sponsored_animal` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  ADD CONSTRAINT `FK_sponsored_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tags_publications`
--
ALTER TABLE `tags_publications`
  ADD CONSTRAINT `FK_publication_tag_publications` FOREIGN KEY (`publication_id`) REFERENCES `publications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_tags_tag_publications` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
