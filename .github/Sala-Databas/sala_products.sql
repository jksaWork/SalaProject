-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2022 at 01:28 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gulfsmo_sala_project`
--

--
-- Dumping data for table `sala_products`
--

INSERT INTO `sala_products` (`id`, `client_id`, `product_id`, `name`, `sku`, `type`, `price`, `status`, `sale_price`, `short_link_code`, `url`, `is_available`, `image`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 954223137, 'فستان', '399991744-30000023450-', 'product', '164', 'sale', '164', 'PWllGr', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p954223137', '1', NULL, NULL, '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(2, 1, 181233954, 'فستان', '399991743-30000025110-', 'product', '77', 'out', '77', 'lXWWoe', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p181233954', '0', NULL, '0', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(3, 1, 1688963107, 'فستان', '399991742-30000022830-', 'product', '83', 'sale', '83', 'jQoomR', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p1688963107', '1', NULL, '1', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(4, 1, 913348396, 'فستان', '33000584-300000199800-', 'product', '114', 'sale', '114', 'BGqqWB', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p913348396', '1', NULL, '6', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(5, 1, 6141485, 'تنورة', '2400409-20000012660-', 'product', '79', 'sale', '79', 'ryxxrz', 'https://salla.sa/dev-wjx74znasiezovol/تنورة/p6141485', '1', NULL, '2', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(6, 1, 1379587374, 'تنورة', '2400408-20000012470-', 'product', '124', 'sale', '124', 'wOXXGB', 'https://salla.sa/dev-wjx74znasiezovol/تنورة/p1379587374', '1', NULL, NULL, '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(7, 1, 738718767, 'تنورة', '2400407-20000012320-', 'product', '83', 'sale', '83', 'yGAAOx', 'https://salla.sa/dev-wjx74znasiezovol/تنورة/p738718767', '1', NULL, '4', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(8, 1, 2045514536, 'تنورة', '219991425-20000012830-', 'product', '94', 'sale', '94', 'dRddQK', 'https://salla.sa/dev-wjx74znasiezovol/تنورة/p2045514536', '1', NULL, '3', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(9, 1, 1271476777, 'بلوزة', '15900691-10000030310-', 'product', '59', 'sale', '59', 'vaYYvp', 'https://salla.sa/dev-wjx74znasiezovol/بلوزة/p1271476777', '1', NULL, '5', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(10, 1, 630608170, 'تنورة', '15701763-200000132500-', 'product', '114', 'sale', '114', 'KObbZn', 'https://salla.sa/dev-wjx74znasiezovol/تنورة/p630608170', '1', NULL, '4', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(11, 1, 2004054059, 'بنطلون', '15504472-5000000500000-', 'product', '74', 'sale', '74', 'aOrrDR', 'https://salla.sa/dev-wjx74znasiezovol/بنطلون/p2004054059', '1', NULL, '5', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(12, 1, 1096392500, 'بنطلون', '15504471-50000004990-', 'product', '84', 'sale', '84', 'OnDDVe', 'https://salla.sa/dev-wjx74znasiezovol/بنطلون/p1096392500', '1', NULL, '2', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(13, 1, 321306165, 'جاكيت', '15504469-40000006570-', 'product', '84', 'sale', '84', 'bbZZxK', 'https://salla.sa/dev-wjx74znasiezovol/جاكيت/p321306165', '1', NULL, '3', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(14, 1, 1828969782, 'فستان', '15504464-30000025290-', 'product', '149', 'sale', '149', 'gDddqW', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p1828969782', '1', NULL, '2', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(15, 1, 1055456311, 'بلوزة', '15504463-10000031180-', 'product', '89', 'sale', '89', 'RxKKjV', 'https://salla.sa/dev-wjx74znasiezovol/بلوزة/p1055456311', '1', NULL, '3', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(16, 1, 146086704, 'فستان', '15504457-300000238900-', 'product', '94', 'sale', '94', 'njaaAb', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p146086704', '1', NULL, '5', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(17, 1, 1519532593, 'بنطلون', '15504454-50000005430-', 'product', '94', 'out', '94', 'WqGGdq', 'https://salla.sa/dev-wjx74znasiezovol/بنطلون/p1519532593', '0', NULL, '0', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(18, 1, 880761138, 'فستان', '15504449-300000237300-', 'product', '144', 'sale', '144', 'DrYYxg', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p880761138', '1', NULL, '2', '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(19, 1, 105150515, 'فستان', '15504448-30000024230-', 'product', '149', 'sale', '149', 'xbWWal', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p105150515', '1', NULL, NULL, '2022-04-09 07:37:57', '2022-04-09 07:37:57'),
(20, 1, 1344440124, 'فستان', '15504447-30000023080-', 'product', '174', 'sale', '174', 'EwYYEV', 'https://salla.sa/dev-wjx74znasiezovol/فستان/p1344440124', '1', NULL, NULL, '2022-04-09 07:37:57', '2022-04-09 07:37:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
