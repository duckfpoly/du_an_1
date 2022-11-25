-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2022 at 02:41 PM
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
-- Table structure for table `account_manager`
--

CREATE TABLE `account_manager` (
                                   `id` int NOT NULL,
                                   `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                   `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                   `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                   `scope` tinyint DEFAULT NULL,
                                   `status` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_manager`
--

INSERT INTO `account_manager` (`id`, `email`, `username`, `password`, `scope`, `status`) VALUES
    (1, 'nguyenduc10603@gmail.com', 'admin', '$2y$10$MKr.a3rumkxIch.0szCVDeUNJBxv.efPwwDnTOyRcg0b9.O/0.0Ge', 1, 0);

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
                                                     (3, 'Fontend'),
                                                     (4, 'Backend');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
                           `id` int NOT NULL,
                           `name_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `id_course` int DEFAULT NULL,
                           `slot` int DEFAULT '3',
                           `time_learn` tinyint DEFAULT NULL,
                           `time_start` date DEFAULT NULL,
                           `time_end` date DEFAULT NULL,
                           `status_class` tinyint DEFAULT '0'
) ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name_class`, `id_course`, `slot`, `time_learn`, `time_start`, `time_end`, `status_class`) VALUES
                                                                                                                            (1, 'Fontend', 195, 3, 0, '2022-11-08', '2023-05-08', 0),
                                                                                                                            (2, 'Backend', 193, 3, 1, '2022-11-11', '2023-05-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes_archive`
--

CREATE TABLE `classes_archive` (
                                   `id` int NOT NULL,
                                   `name_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `id_students` int DEFAULT NULL,
                                   `id_course` int DEFAULT NULL,
                                   `slot` int DEFAULT NULL,
                                   `time_learn` tinyint DEFAULT NULL,
                                   `time_start` timestamp NULL DEFAULT NULL,
                                   `time_end` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes_archive`
--

INSERT INTO `classes_archive` (`id`, `name_class`, `id_students`, `id_course`, `slot`, `time_learn`, `time_start`, `time_end`) VALUES
    (1, 'Fontend', 1, 195, 3, 0, '2022-11-07 17:00:00', '2022-11-10 17:00:00');

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
                           `discount` smallint DEFAULT '0',
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           `id_category` int DEFAULT NULL,
                           `id_teacher` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_course`, `price_course`, `image_course`, `status_course`, `description_course`, `quote`, `discount`, `created_at`, `updated_at`, `id_category`, `id_teacher`) VALUES
                                                                                                                                                                                                     (193, 'NodeJs', 200000, 'course_4.jpg', 0, 'Khóa học lập trình C++ cơ bản dành cho người mới', 'Khóa học lập trình C++ cơ bản dành cho người mới', 50, '2022-11-04 20:00:37', '2022-11-25 14:26:42', 4, 2),
                                                                                                                                                                                                     (195, 'ReactJs', 520000, 'course_4.jpg', 0, 'Khóa học lập trình PHP cơ bản dành cho người mới', 'Khóa học lập trình PHP cơ bản dành cho người mới', 50, '2022-11-06 04:11:34', '2022-11-10 07:58:01', 3, 5),
                                                                                                                                                                                                     (197, 'Java Spring', 60000000, 'bg.png', 0, 'Lập trình java', 'Lập trình java', 0, '2022-11-25 14:13:52', '2022-11-25 14:32:31', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_classes`
--

CREATE TABLE `detail_classes` (
                                  `id` int NOT NULL,
                                  `id_students` int DEFAULT NULL,
                                  `date_sub` tinyint DEFAULT NULL,
                                  `time_sub` tinyint DEFAULT NULL,
                                  `id_class` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_classes`
--

INSERT INTO `detail_classes` (`id`, `id_students`, `date_sub`, `time_sub`, `id_class`) VALUES
                                                                                           (16, 1, 0, 1, 1),
                                                                                           (17, 2, 0, 1, 1),
                                                                                           (18, 3, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_lesson`
--

CREATE TABLE `detail_lesson` (
                                 `id` int NOT NULL,
                                 `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
                                 `id_lesson` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `detail_lesson`
--

INSERT INTO `detail_lesson` (`id`, `content`, `id_lesson`) VALUES
                                                               (1, ' Làm quen và lập nhóm học tập ', 1),
                                                               (10, 'Hướng dẫn cách học hiệu quả ', 1),
                                                               (11, 'Giới thiệu mô hình client ', 1),
                                                               (12, 'Giới thiệu về HTML - CSS ', 1),
                                                               (13, 'Cài đặt môi trường', 1),
                                                               (14, 'Hướng dẫn sử dụng Dev tools', 1),
                                                               (15, 'Hướng dẫn các kĩ năng code cơ bản', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_courses`
--

CREATE TABLE `lesson_courses` (
                                  `id` int NOT NULL,
                                  `lession` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                                  `id_course` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_courses`
--

INSERT INTO `lesson_courses` (`id`, `lession`, `id_course`) VALUES
                                                                (1, 'Giới thiệu và làm quen', 195),
                                                                (2, 'HTML - CSS - JS cơ bản', 195);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
                          `id` int NOT NULL,
                          `order_date` datetime DEFAULT NULL,
                          `order_pay` tinyint DEFAULT NULL,
                          `status` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `order_pay`, `status`) VALUES
    (1, '2022-11-11 19:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
                                `id` int NOT NULL,
                                `id_students` int DEFAULT NULL,
                                `id_course` int DEFAULT NULL,
                                `time_learn` tinyint DEFAULT NULL,
                                `id_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_students`, `id_course`, `time_learn`, `id_order`) VALUES
    (1, 1, 195, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rate_courses`
--

CREATE TABLE `rate_courses` (
                                `id` int NOT NULL,
                                `rate` float DEFAULT NULL,
                                `content_rate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
                                `id_course` int DEFAULT NULL,
                                `id_student` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_courses`
--

INSERT INTO `rate_courses` (`id`, `rate`, `content_rate`, `id_course`, `id_student`) VALUES
                                                                                         (10, 5, 'alp\n', 193, 3),
                                                                                         (11, 4, 'alualu\n', 193, 3),
                                                                                         (12, 3, '????', 193, 3),
                                                                                         (13, 2, 'adsad', 193, 3),
                                                                                         (14, 1, 'aloalo', 193, 3),
                                                                                         (15, 4, 'slkjdfjdsbfd', 195, 1),
                                                                                         (16, 1, 'aikudaksjbdasd', 193, 1),
                                                                                         (17, 4, 'ujulih;kvj\\\n', 195, 1),
                                                                                         (18, 3, 'dấdwadw', 195, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
                         `id` int NOT NULL,
                         `sale_code` varchar(255) DEFAULT NULL,
                         `percent_discount` int DEFAULT NULL,
                         `time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_code`, `percent_discount`, `time`) VALUES
                                                                        (4, 'fzepcz99', 99, '2022-12-03'),
                                                                        (5, 'nzfozk50', 50, '2022-12-01');

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

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name_student`, `email_student`, `phone_student`, `password_student`, `image_student`, `role`, `created_at`, `updated_at`, `status_student`) VALUES
                                                                                                                                                                               (1, 'Nguyễn Đức', 'duc@gmail.com', '0823565831', 'nguyenduc', 'course_4.jpg', 1, '2022-10-03 05:56:00', '2022-04-20 04:14:18', 0),
                                                                                                                                                                               (2, 'Nguyễn Đức 2', 'duc2@gmail.com', '0823565832', '123456', 'course_4.jpg', 1, '2022-11-02 22:56:00', '2022-11-02 22:58:00', 0),
                                                                                                                                                                               (3, 'Nguyễn Đức 3', 'duc3@gmail.com', '0823565833', '12345678', 'course_4.jpg', 1, '2021-04-02 22:56:00', '2022-06-02 22:58:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
                              `id` int NOT NULL,
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

INSERT INTO `tbl_orders` (`id`, `order_code`, `order_date`, `order_pay`, `id_students`, `id_class`, `day_sub`, `time_sub`, `amount`, `status`) VALUES
                                                                                                                                                   (1, 1669132640, '2022-11-22 22:57:23', 2, 1, 2, 0, 1, 2000000, 1),
                                                                                                                                                   (5, 1669193066, '2022-11-23 15:44:30', 0, 2, 1, 0, 3, 2000000, 1),
                                                                                                                                                   (6, 1669283550, '2022-10-24 16:52:34', 2, 3, 1, 0, 1, 2000000, 2),
                                                                                                                                                   (7, 1669345253, '2021-11-25 10:00:54', 0, 3, 1, 0, 1, 2000000, 0);

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
                            `role` tinyint DEFAULT '0',
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            `status_teacher` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name_teacher`, `email_teacher`, `phone_teacher`, `password_teacher`, `image_teacher`, `about_teacher`, `scope_teacher`, `role`, `created_at`, `updated_at`, `status_teacher`) VALUES
                                                                                                                                                                                                                 (2, 'Nguyễn Đức', 'duc@gmail.com', '0823565831', '12345678', 'blog_4.jpg', 'backend dev', 'intern', 0, '2022-11-05 03:52:30', '2022-11-12 02:21:22', 0),
                                                                                                                                                                                                                 (5, 'Bùi huy', 'huy@gmail.com', '0868400973', '12345678', 'blog_4.jpg', 'fontend dev', 'Junior', 0, '2022-11-05 08:39:00', '2022-11-05 09:17:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_manager`
--
ALTER TABLE `account_manager`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_COURSEEE` (`id_course`);

--
-- Indexes for table `classes_archive`
--
ALTER TABLE `classes_archive`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_CATE` (`id_category`),
    ADD KEY `FK_ID_TEACHERR` (`id_teacher`);

--
-- Indexes for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_CLASS` (`id_class`),
    ADD KEY `FK_ID_STUDENTSES` (`id_students`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_id_orders` (`id_order`),
    ADD KEY `FK_ID_STD` (`id_students`),
    ADD KEY `FK_ID_COUR` (`id_course`);

--
-- Indexes for table `rate_courses`
--
ALTER TABLE `rate_courses`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_COURSE_2` (`id_course`),
    ADD KEY `fk_id_stdss` (`id_student`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_id_studentts` (`id_students`),
    ADD KEY `fk_id_classss` (`id_class`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_manager`
--
ALTER TABLE `account_manager`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes_archive`
--
ALTER TABLE `classes_archive`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `detail_classes`
--
ALTER TABLE `detail_classes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_lesson`
--
ALTER TABLE `detail_lesson`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lesson_courses`
--
ALTER TABLE `lesson_courses`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rate_courses`
--
ALTER TABLE `rate_courses`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
    ADD CONSTRAINT `FK_ID_COURSEEE` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
    ADD CONSTRAINT `FK_ID_CATE` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
    ADD CONSTRAINT `FK_ID_TEACHERR` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD CONSTRAINT `FK_ID_CLASS` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`),
    ADD CONSTRAINT `FK_ID_STUDENTSES` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);

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
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
    ADD CONSTRAINT `FK_ID_COUR` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
    ADD CONSTRAINT `fk_id_orders` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
    ADD CONSTRAINT `FK_ID_STD` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);

--
-- Constraints for table `rate_courses`
--
ALTER TABLE `rate_courses`
    ADD CONSTRAINT `FK_ID_COURSE_2` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
    ADD CONSTRAINT `fk_id_stdss` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
