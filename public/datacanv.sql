-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Сер 30 2016 р., 16:20
-- Версія сервера: 10.1.13-MariaDB
-- Версія PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `datacanv`
--

-- --------------------------------------------------------

--
-- Структура таблиці `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_cnv` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `ordered` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `carts`
--

INSERT INTO `carts` (`id`, `id_user`, `id_cnv`, `status`, `ordered`, `created_at`, `updated_at`) VALUES
(2, 2, 14, NULL, 1, NULL, '2016-08-30 05:41:35'),
(3, 2, 19, NULL, 0, NULL, NULL),
(4, 2, 20, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'auto', 'auto.png', NULL, NULL),
(2, 'event', 'event.png', NULL, NULL),
(3, 'food', 'food.png', NULL, NULL),
(4, 'restaurand', 'restaurant.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `cnv`
--

CREATE TABLE `cnv` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pr_size` int(11) NOT NULL DEFAULT '1',
  `id_material` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL,
  `id_cat` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'event',
  `id_hanger` int(2) NOT NULL,
  `json_data` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT '1',
  `main` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cnv`
--

INSERT INTO `cnv` (`id`, `id_pr_size`, `id_material`, `id_user`, `id_cat`, `id_hanger`, `json_data`, `name`, `public`, `main`, `created_at`, `updated_at`) VALUES
(14, 1, 1, 2, '2', 2, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"triangle","originX":"left","originY":"top","left":8.01,"top":74.9,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.74,"scaleY":1.76,"angle":270.22,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"triangle","originX":"left","originY":"top","left":590.89,"top":19.48,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.76,"scaleY":1.76,"angle":88.9,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":235.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is event!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"12":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 1, NULL, '2016-08-30 05:27:17'),
(15, 1, 1, 1, '1', 2, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"triangle","originX":"left","originY":"top","left":8.01,"top":74.9,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.74,"scaleY":1.76,"angle":270.22,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"triangle","originX":"left","originY":"top","left":590.89,"top":19.48,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.76,"scaleY":1.76,"angle":88.9,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#71BA82","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#BA528D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#5468BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":215.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is auto!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"13":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 1, NULL, '2016-08-30 05:28:44'),
(16, 1, 1, 1, 'event', 0, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"triangle","originX":"left","originY":"top","left":8.01,"top":74.9,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.74,"scaleY":1.76,"angle":270.22,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"triangle","originX":"left","originY":"top","left":590.89,"top":19.48,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.76,"scaleY":1.76,"angle":88.9,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":235.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is event!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"12":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 0, NULL, NULL),
(17, 2, 1, 1, '1', 2, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"triangle","originX":"left","originY":"top","left":8.01,"top":74.9,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.74,"scaleY":1.76,"angle":270.22,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"triangle","originX":"left","originY":"top","left":590.89,"top":19.48,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.76,"scaleY":1.76,"angle":88.9,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#71BA82","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#BA528D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#5468BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":215.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is auto!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"13":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 1, NULL, '2016-08-30 07:59:12'),
(18, 1, 1, 2, '1', 1, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#71BA82","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#BA528D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#5468BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":215.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is auto!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"13":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 0, NULL, NULL),
(19, 1, 1, 2, '1', 1, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"triangle","originX":"left","originY":"top","left":8.01,"top":74.9,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.74,"scaleY":1.76,"angle":270.22,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#71BA82","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#BA528D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#5468BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":215.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is auto!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"13":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 0, 0, NULL, NULL),
(20, 1, 2, 2, '1', 1, '{"objects":[{"type":"rect","originX":"left","originY":"top","left":51.83,"top":21,"width":30,"height":30,"fill":"#57B1BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":16,"scaleY":1.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"circle","originX":"left","originY":"top","left":14,"top":112,"width":60,"height":60,"fill":"#71BA82","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":3.92,"scaleY":3.92,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":322,"top":116,"width":60,"height":60,"fill":"#BA528D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":266,"top":291,"width":60,"height":60,"fill":"#ABBAB8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","originX":"left","originY":"top","left":409,"top":219,"width":60,"height":60,"fill":"#5468BA","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.29,"scaleY":2.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":30,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","originX":"left","originY":"top","left":192,"top":29,"width":215.67,"height":45.2,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"This is auto!","fontSize":40,"fontWeight":"normal","fontFamily":"Arial","fontStyle":"","lineHeight":1.16,"textDecoration":"","textAlign":"left","textBackgroundColor":"","styles":{"0":{"8":{},"9":{},"10":{},"11":{},"13":{}}}}],"background":"#E8E8E8"}', 'Canvas_30884', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `components`
--

CREATE TABLE `components` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `components`
--

INSERT INTO `components` (`id`, `title`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'gdfgdf', 'apple-20clip-20art-apple_green_clipart.png', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `dispatches`
--

CREATE TABLE `dispatches` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `hangers`
--

CREATE TABLE `hangers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `hangers`
--

INSERT INTO `hangers` (`id`, `title`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'circle', 10, 'circle_m_c.png', NULL, '2016-08-30 06:52:55'),
(2, 'clear', 5, 'clear_m_c.png', NULL, '2016-08-30 06:53:13');

-- --------------------------------------------------------

--
-- Структура таблиці `materials`
--

CREATE TABLE `materials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `materials`
--

INSERT INTO `materials` (`id`, `title`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'inDoor', 10, 'indoor.jpg', NULL, '2016-08-30 05:38:10'),
(2, 'outDoor', 20, 'outdoor.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `anchor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `menus`
--

INSERT INTO `menus` (`id`, `item`, `anchor`, `created_at`, `updated_at`) VALUES
(1, 'banners', 'banners', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_09_073715_create_canvas_table', 1),
('2016_08_15_110901_create_categories_table', 1),
('2016_08_16_094258_create_carts_table', 1),
('2016_08_17_081438_create_size_price_canvas_table', 1),
('2016_08_22_063309_create_sliders_table', 1),
('2016_08_22_063509_create_socials_table', 1),
('2016_08_22_081901_create_settings_table', 1),
('2016_08_23_081058_create_subs_table', 1),
('2016_08_23_085430_create_qandas_table', 1),
('2016_08_23_110859_create_materials_table', 1),
('2016_08_23_132846_create_menus_table', 1),
('2016_08_26_082849_create_dispatches_table', 1),
('2016_08_29_085858_create_components_table', 1),
('2016_08_29_100233_create_hangers_table', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `qa`
--

CREATE TABLE `qa` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `qa`
--

INSERT INTO `qa` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Apa itu Lorem Ipsum?', 'Lorem Ipsum adalah text contoh digunakan didalam industri pencetakan dan typesetting. Lorem Ipsum telah menjadi text contoh semenjak tahun ke 1500an, apabila pencetak yang kurang terkenal mengambil sebuah galeri cetak dan merobakanya menjadi satu buku spesimen. Ia telah bertahan bukan hanya selama lima kurun, tetapi telah melonjak ke era typesetting elektronik, dengan tiada perubahan ketara. Ia telah dipopularkan pada tahun 1960an dengan penerbitan Letraset yang mebawa kangungan Lorem Ipsum, dan lebih terkini dengan sofwer pencetakan desktop seperti Aldus PageMaker yang telah menyertakan satu versi Lorem Ipsum.', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'logo.png',
  `number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `settings`
--

INSERT INTO `settings` (`id`, `logo`, `number`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', '1.773.669.5154', NULL, '2016-08-30 11:17:59');

-- --------------------------------------------------------

--
-- Структура таблиці `size_prices`
--

CREATE TABLE `size_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` double(8,2) NOT NULL,
  `size_h` double(8,2) NOT NULL,
  `size_w` double(8,2) NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `size_prices`
--

INSERT INTO `size_prices` (`id`, `size`, `size_h`, `size_w`, `price`, `title`, `created_at`, `updated_at`) VALUES
(1, 1.50, 400.00, 600.00, 10, 'x1', NULL, NULL),
(2, 2.50, 500.00, 600.00, 20, 'x2', NULL, '2016-08-30 05:38:52');

-- --------------------------------------------------------

--
-- Структура таблиці `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `sliders`
--

INSERT INTO `sliders` (`id`, `images`, `created_at`, `updated_at`) VALUES
(1, 'index.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `socials`
--

INSERT INTO `socials` (`id`, `href`, `image`, `created_at`, `updated_at`) VALUES
(1, 'http://yepi.com', 'yepi.png', NULL, NULL),
(2, 'http://facebook.com', 'fb.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `subs`
--

CREATE TABLE `subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.co', '$2y$10$nQ/tMHvneg49srDx.3RSveCu48dRXXPjsz0LhMfZ1AfaZWnwvwvWK', '1', '6lAiWrnuTqwdhWPFlao2YBspMV6JXMAfGc4qz7ljUIEpnRcGpvnhyH9AqUTr', '2016-08-29 13:27:33', '2016-08-30 11:01:53'),
(2, 'User', 'user@mail.co', '$2y$10$qJ9cGBFeuM9Dc5xayBiwnuM5TYqJcjlG21CrjejKufo8kc31pBHiK', '', '1aVVnzQPCniSADEpFpOFEq1KU4y4GOeVt53BwHSTFxXMXjrKkbTsVKQOgP0z', '2016-08-29 13:44:24', '2016-08-30 11:14:34');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `cnv`
--
ALTER TABLE `cnv`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `dispatches`
--
ALTER TABLE `dispatches`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `hangers`
--
ALTER TABLE `hangers`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Індекси таблиці `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `size_prices`
--
ALTER TABLE `size_prices`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `cnv`
--
ALTER TABLE `cnv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблиці `components`
--
ALTER TABLE `components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `dispatches`
--
ALTER TABLE `dispatches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `hangers`
--
ALTER TABLE `hangers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `size_prices`
--
ALTER TABLE `size_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
