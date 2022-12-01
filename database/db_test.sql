-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2022 at 03:11 AM
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
-- Table structure for table `detail_classes`
--

CREATE TABLE `detail_classes` (
                                  `id` int NOT NULL,
                                  `id_students` int DEFAULT NULL,
                                  `id_class` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_classes`
--

INSERT INTO `detail_classes` (`id`, `id_students`, `id_class`) VALUES
    (26, 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_CLASS` (`id_class`),
    ADD KEY `FK_ID_STUDENTSES` (`id_students`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_classes`
--
ALTER TABLE `detail_classes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD CONSTRAINT `FK_ID_CLASS` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`),
    ADD CONSTRAINT `FK_ID_STUDENTSES` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
