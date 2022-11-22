-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2022 at 04:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
                              `order_code` int DEFAULT NULL,
                              `order_date` datetime DEFAULT NULL,
                              `order_pay` tinyint DEFAULT NULL,
                              `id_students` int DEFAULT NULL,
                              `id_class` int DEFAULT NULL,
                              `day_sub` tinyint DEFAULT NULL,
                              `time_sub` tinyint DEFAULT NULL,
                              `amount` float DEFAULT NULL,
                              `status` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_code`, `order_date`, `order_pay`, `id_students`, `id_class`, `day_sub`, `time_sub`, `amount`, `status`) VALUES
    (1669132640, '2022-11-22 22:57:23', 2, 3, 2, 0, 1, 2000000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    ADD KEY `fk_id_studentts` (`id_students`),
    ADD KEY `fk_id_classss` (`id_class`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    ADD CONSTRAINT `fk_id_classss` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `fk_id_studentts` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
