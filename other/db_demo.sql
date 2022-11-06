-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2022 at 08:27 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`) VALUES
(1, 'Lập trình '),
(2, 'Đồ họa'),
(3, 'Ứng dụng Office');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_course` int DEFAULT NULL,
  `image_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_course` tinyint DEFAULT '1',
  `description_course` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_category` int DEFAULT NULL,
  `id_teacher` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_course`, `price_course`, `image_course`, `status_course`, `description_course`, `quote`, `created_at`, `updated_at`, `id_category`, `id_teacher`) VALUES
(193, 'Lập trình C++', 2333, 'course_4.jpg', 0, 'Khóa học lập trình C++ cơ bản dành cho người mới', 'Khóa học lập trình C++ cơ bản dành cho người mới', '2022-11-04 20:00:37', '2022-11-05 23:31:32', 1, 5),
(194, 'Lập trình C++', 800000, 'course_4.jpg', 0, 'Lập trình C++ để đi làm', 'Lập trình C++ để đi làm', '2022-11-03 05:56:00', '2022-11-05 23:31:48', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_lesson`
--

CREATE TABLE `detail_lesson` (
  `id` int NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `id_lesson` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_courses`
--

CREATE TABLE `lesson_courses` (
  `id` int NOT NULL,
  `lession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_course` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_courses`
--

CREATE TABLE `rate_courses` (
  `id` int NOT NULL,
  `rate` int DEFAULT NULL,
  `content_rate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_course` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_courses`
--

CREATE TABLE `sale_courses` (
  `id` int UNSIGNED NOT NULL,
  `coupon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_discount` float DEFAULT NULL,
  `id_course` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_manager`
--

CREATE TABLE `staff_manager` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` tinyint DEFAULT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `name_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_student` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `id` int NOT NULL,
  `id_students` int DEFAULT NULL,
  `id_course` int DEFAULT NULL,
  `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `name_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_teacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_teacher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `scope_teacher` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `star_teacher` int DEFAULT NULL,
  `rate_teacher` int DEFAULT NULL,
  `role` tinyint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_teacher` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name_teacher`, `email_teacher`, `phone_teacher`, `password_teacher`, `image_teacher`, `about_teacher`, `scope_teacher`, `star_teacher`, `rate_teacher`, `role`, `created_at`, `updated_at`, `status_teacher`) VALUES
(2, 'Đức Nguyễn', 'duc@gmail.com', '0823565831', '0823565831', 'blog_4.jpg', 'backend dev', 'intern', NULL, NULL, 0, '2022-11-05 03:52:30', '2022-11-05 09:18:32', 1),
(5, 'Bùi huy', 'huy@gmail.com', '0868400973', 'buihuy2000', 'blog_4.jpg', 'fontend dev', 'Junior', NULL, NULL, 0, '2022-11-05 08:39:00', '2022-11-05 09:17:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_CATE` (`id_category`),
  ADD KEY `FK_ID_TEACHERR` (`id_teacher`);

--
-- Indexes for table `detail_lesson`
--
ALTER TABLE `detail_lesson`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_LESSON` (`id_lesson`);

--
-- Indexes for table `lesson_courses`
--
ALTER TABLE `lesson_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_COURSE` (`id_course`);

--
-- Indexes for table `rate_courses`
--
ALTER TABLE `rate_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_COURSE_2` (`id_course`);

--
-- Indexes for table `sale_courses`
--
ALTER TABLE `sale_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_COURSE_3` (`id_course`);

--
-- Indexes for table `staff_manager`
--
ALTER TABLE `staff_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID_COURSE_6` (`id_course`),
  ADD KEY `FK_ID_STUDENTS` (`id_students`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `detail_lesson`
--
ALTER TABLE `detail_lesson`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_courses`
--
ALTER TABLE `lesson_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_courses`
--
ALTER TABLE `rate_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_courses`
--
ALTER TABLE `sale_courses`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_manager`
--
ALTER TABLE `staff_manager`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_ID_CATE` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_ID_TEACHERR` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `detail_lesson`
--
ALTER TABLE `detail_lesson`
  ADD CONSTRAINT `FK_ID_LESSON` FOREIGN KEY (`id_lesson`) REFERENCES `lesson_courses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `lesson_courses`
--
ALTER TABLE `lesson_courses`
  ADD CONSTRAINT `FK_ID_COURSE` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `rate_courses`
--
ALTER TABLE `rate_courses`
  ADD CONSTRAINT `FK_ID_COURSE_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `sale_courses`
--
ALTER TABLE `sale_courses`
  ADD CONSTRAINT `FK_ID_COURSE_3` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `FK_ID_COURSE_6` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `FK_ID_STUDENTS` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
