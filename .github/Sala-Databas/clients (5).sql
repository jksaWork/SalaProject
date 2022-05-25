-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 01:37 PM
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
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `access_token`, `merchant_id`, `refresh_token`, `name`, `password`, `email`, `mobile`, `pos_secret`, `pos_email`, `pos_products_count`, `expired_date`, `created_at`, `updated_at`) VALUES
(1, 'F3C9EKK7Wn8fUymT3UYg_pNtsbft-HGf8vSegCUvG90.p9KkK1VBqpFEBwFcNQjEmsHxJNmIlgHDo1agVW3C4cw', '1374813601', 'kWY7BjWsklkwmUyzBfSQIRUc8wQVqtoWAA7ugKfJxPw.HbIYqliAiFS9w_Gj9jF-q8RUl9AgyYGjXL-A9-GHCC0', 'Demo', '$2y$10$4x.yZlgvnnAXdxOFiQNrOuAtt.INZFAM4ALIkaz7Wquxkw8AiNra.', 'onebrand.1b@outlook.com', '+966500000000', 'eyJpdiI6ImpXWEQ4SmYzeCtndjRPVS9KaDlIdEE9PSIsInZhbHVlIjoicGE5ZWFPTWcvSVNaWHhTY3hXcXlhYnRkRm1yUUFwU205N2hPWmRtRVJSOD0iLCJtYWMiOiIyNjYzM2NlNGNhODE5ZTM1ZjJlZGYxOTI3NTNjOTMzMmY1YjRkYjk1ZGRkNGVkNTQ5MGIyZWZmMTdmNjk5NWY0IiwidGFnIjoiIn0=', 'onebrand.1b@outlook.com', '5', '1651580746', '2022-04-19 10:25:47', '2022-04-19 10:54:42'),
(2, 'F3C9EKK7Wn8fUymT3UYg_pNtsbft-HGf8vSegCUvG90.p9KkK1VBqpFEBwFcNQjEmsHxJNmIlgHDo1agVW3C4cw', '1374813601', 'kWY7BjWsklkwmUyzBfSQIRUc8wQVqtoWAA7ugKfJxPw.HbIYqliAiFS9w_Gj9jF-q8RUl9AgyYGjXL-A9-GHCC0', 'Demo', '$2y$10$4x.yZlgvnnAXdxOFiQNrOuAtt.INZFAM4ALIkaz7Wquxkw8AiNra.', 'onebrand.1b@outlook.com', '+966500000000', 'eyJpdiI6ImpXWEQ4SmYzeCtndjRPVS9KaDlIdEE9PSIsInZhbHVlIjoicGE5ZWFPTWcvSVNaWHhTY3hXcXlhYnRkRm1yUUFwU205N2hPWmRtRVJSOD0iLCJtYWMiOiIyNjYzM2NlNGNhODE5ZTM1ZjJlZGYxOTI3NTNjOTMzMmY1YjRkYjk1ZGRkNGVkNTQ5MGIyZWZmMTdmNjk5NWY0IiwidGFnIjoiIn0=', 'onebrand.1b@outlook.com', '5', '1351580746', '2022-04-19 10:25:47', '2022-04-19 10:54:42'),
(3, 'F3C9EKK7Wn8fUymT3UYg_pNtsbft-HGf8vSegCUvG90.p9KkK1VBqpFEBwFcNQjEmsHxJNmIlgHDo1agVW3C4cw', '1374813601', 'kWY7BjWsklkwmUyzBfSQIRUc8wQVqtoWAA7ugKfJxPw.HbIYqliAiFS9w_Gj9jF-q8RUl9AgyYGjXL-A9-GHCC0', 'Demo', '$2y$10$4x.yZlgvnnAXdxOFiQNrOuAtt.INZFAM4ALIkaz7Wquxkw8AiNra.', 'onebrand.1b@outlook.com', '+966500000000', 'eyJpdiI6ImpXWEQ4SmYzeCtndjRPVS9KaDlIdEE9PSIsInZhbHVlIjoicGE5ZWFPTWcvSVNaWHhTY3hXcXlhYnRkRm1yUUFwU205N2hPWmRtRVJSOD0iLCJtYWMiOiIyNjYzM2NlNGNhODE5ZTM1ZjJlZGYxOTI3NTNjOTMzMmY1YjRkYjk1ZGRkNGVkNTQ5MGIyZWZmMTdmNjk5NWY0IiwidGFnIjoiIn0=', 'onebrand.1b@outlook.com', '5', '1651580746', '2022-04-19 10:25:47', '2022-04-19 10:54:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
