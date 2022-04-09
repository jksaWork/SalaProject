-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2022 at 01:34 PM
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
-- Dumping data for table `botagaty_pos_products`
--

INSERT INTO `botagaty_pos_products` (`id`, `client_id`, `product_code`, `name`, `product_price`, `product_currency`, `pos_price`, `available`, `merchant_id`, `merchant_name`, `created_at`, `updated_at`) VALUES
(1, '1', '3175', '{\"ar\":\"Cards\",\"en\":\"Cards\"}', '24', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(2, '1', '3176', '{\"ar\":\"Serial_Cards\",\"en\":\"Serial_Cards\"}', '2.99', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(3, '1', '3179', '{\"ar\":\"PlayStation Network - $70 PSN Card (Saudi Store Only)\",\"en\":\"PlayStation Network - $70 PSN Card (Saudi Store Only)\"}', '280', 'SAR', 'SAR', '0', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(4, '1', '3224', '{\"ar\":\"GoldenCard\",\"en\":\"GoldenCard\"}', '40', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(5, '1', '3225', '{\"ar\":\"AmOnecard\",\"en\":\"AmOnecard\"}', '20', 'SAR', 'SAR', '0', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(6, '1', '3339', '{\"ar\":\"Voucher_A\",\"en\":\"Voucher_A\"}', '1.99', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(7, '1', '3340', '{\"ar\":\"Voucher_B\",\"en\":\"Voucher_B\"}', '20', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(8, '1', '3341', '{\"ar\":\"Voucher_C\",\"en\":\"Voucher_C\"}', '15', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(9, '1', '3440', '{\"ar\":\"Pubg Mobile 600+ Free 60 UC - $9.99 Recharge Voucher\",\"en\":\"Pubg Mobile 600+ Free 60 UC - $9.99 Recharge Voucher\"}', '160', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(10, '1', '3441', '{\"ar\":\"Pubg Mobile 300+ Free 25 UC - $4.99 Recharge Voucher\",\"en\":\"Pubg Mobile 300+ Free 25 UC - $4.99 Recharge Voucher\"}', '70', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(11, '1', '3442', '{\"ar\":\"Pubg Mobile 60 UC - $0.99 Recharge Voucher\",\"en\":\"Pubg Mobile 60 UC - $0.99 Recharge Voucher\"}', '50', 'EGP', 'EGP', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(12, '1', '3501', '{\"ar\":\"Voucher30\",\"en\":\"Voucher30\"}', '30', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(13, '1', '3502', '{\"ar\":\"Voucher40\",\"en\":\"Voucher40\"}', '30', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55'),
(14, '1', '3503', '{\"ar\":\"Voucher50\",\"en\":\"Voucher50\"}', '30', 'SAR', 'SAR', '1', '307598', '{\"ar\":\"OneCard_Integration\",\"en\":\"OneCard_Integration\"}', '2022-04-09 07:37:55', '2022-04-09 07:37:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
