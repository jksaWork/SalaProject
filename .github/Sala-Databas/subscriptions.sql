-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 11:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sala`
--

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `client_id`, `merchant_id`, `price`, `total`, `start_date`, `end_date`, `plan_type`, `plan_name`, `plan_period`, `created_at`, `updated_at`) VALUES
(1, 2, '1234509876', '20.00', '23.00', '2021-10-09T21:00:00.000000Z', '2021-11-09T21:00:00.000000Z', NULL, NULL, '1', '2022-05-18 01:34:01', '2022-05-18 01:34:01'),
(2, 2, '1234509876', '20.00', '23.00', '2021-10-09T21:00:00.000000Z', '2021-11-09T21:00:00.000000Z', NULL, NULL, '1', '2022-05-18 01:34:25', '2022-05-18 01:34:25'),
(3, 2, '1234509876', '20.00', '23.00', '2021-10-09T21:00:00.000000Z', '2021-11-09T21:00:00.000000Z', '20.00', NULL, '1', '2022-05-18 01:35:49', '2022-05-18 01:35:49'),
(4, 2, '1234509876', '20.00', '23.00', '2021-10-09T21:00:00.000000Z', '2021-11-09T21:00:00.000000Z', 'recurring', NULL, '1', '2022-05-17 20:59:03', '2022-05-17 20:59:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;