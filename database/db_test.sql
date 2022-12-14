-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2022 at 12:28 PM
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
                              `name_category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                              `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `status`) VALUES
                                                               (1, 'Ch??a x??c ?????nh', 0),
                                                               (3, 'Fontend', 0),
                                                               (4, 'Backend', 0),
                                                               (45, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
                           `id` int NOT NULL,
                           `name_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `id_course` int DEFAULT NULL,
                           `id_teacher` int DEFAULT NULL,
                           `slot` int DEFAULT '3',
                           `time_learn` tinyint DEFAULT NULL,
                           `time_start` date DEFAULT NULL,
                           `time_end` date DEFAULT NULL,
                           `status_class` tinyint DEFAULT '0'
) ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name_class`, `id_course`, `id_teacher`, `slot`, `time_learn`, `time_start`, `time_end`, `status_class`) VALUES
                                                                                                                                          (8, 'ReactJS1122C3', 195, 5, 3, 1, '2022-12-30', '2023-05-30', 0),
                                                                                                                                          (11, 'Laravel0223C5', 197, 2, 3, 1, '2023-02-01', '2023-08-01', 0),
                                                                                                                                          (12, 'NODEJS0223C2', 193, 2, 3, 0, '2023-02-01', '2023-08-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes_archive`
--

CREATE TABLE `classes_archive` (
                                   `id` int NOT NULL,
                                   `name_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                                   `id_course` int DEFAULT NULL,
                                   `id_teacher` int DEFAULT NULL,
                                   `slot` int DEFAULT NULL,
                                   `time_learn` tinyint DEFAULT NULL,
                                   `time_start` date DEFAULT NULL,
                                   `time_end` date DEFAULT NULL,
                                   `time_archive` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
                           `id` int NOT NULL,
                           `name_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `price_course` int DEFAULT NULL,
                           `image_course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                           `status_course` tinyint DEFAULT '0',
                           `description_course` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
                           `quote` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
                           `discount` smallint DEFAULT '0',
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL,
                           `id_category` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name_course`, `price_course`, `image_course`, `status_course`, `description_course`, `quote`, `discount`, `created_at`, `updated_at`, `id_category`) VALUES
                                                                                                                                                                                       (193, 'NodeJS', 150000, 'nodejs.png', 0, 'L???p tr??nh Backend b???ng NodeJS', 'NodeJS l?? m???t m??i tr?????ng runtime ch???y JavaScript ??a n???n t???ng v?? c?? m?? ngu???n m???, ???????c s??? d???ng ????? ch???y c??c ???ng d???ng web b??n ngo??i tr??nh duy???t c???a client. N???n t???ng n??y ???????c ph??t tri???n b???i Ryan Dahl v??o n??m 2009, ???????c xem l?? m???t gi???i ph??p ho??n h???o cho c??c ???ng d???ng s??? d???ng nhi???u d??? li???u nh??? v??o m?? h??nh h?????ng s??? ki???n (event-driven) kh??ng ?????ng b???.', 0, '2022-11-04 20:00:37', '2022-11-25 14:26:42', 4),
                                                                                                                                                                                       (195, 'ReactJS', 100000, 'react.png', 0, 'L???p tr??nh Fontend b???ng ReactJS', 'ReactJS l?? m???t opensource ???????c ph??t tri???n b???i Facebook, ra m???t v??o n??m 2013, b???n th??n n?? l?? m???t th?? vi???n Javascript ???????c d??ng ????? ????? x??y d???ng c??c t????ng t??c v???i c??c th??nh ph???n tr??n website. M???t trong nh???ng ??i???m n???i b???t nh???t c???a ReactJS ???? l?? vi???c render d??? li???u kh??ng ch??? th???c hi???n ???????c tr??n t???ng Server m?? c??n ??? d?????i Client n???a.', 0, '2022-11-06 04:11:34', '2022-12-03 07:11:23', 3),
                                                                                                                                                                                       (197, 'Laravel', 200000, 'laravel.png', 0, 'L???p tr??nh Backend b???ng Laravel', 'Laravel l?? m???t trong nh???ng PHP Web Framework ph??? bi???n nh???t theo m???u MVC (Model-View- Controller). ???????c t???o b???i Taylor Otwell, Laravel framework l?? ngu???n m??? v?? mi???n ph?? gi??p b???n ????a ra c??c s???n ph???m ch???t l?????ng cao. C??c code s??? ???????c gi???m thi???u ??i, nh??ng v???n ?????t ti??u chu???n ng??nh, gi??p b???n ti???t ki???m ???????c h??ng tr??m gi??? ?????ng h??? d??nh cho vi???c ph??t tri???n.Laravel ???? tr??? n??n kh?? th??ng d???ng v?? c?? s???n mi???n ph??. Laravel web development r???t h???u ??ch trong vi???c t???o ra ph???n m???m web ???????c c?? nh??n h??a m???t c??ch nhanh ch??ng v?? hi???u qu???.', 0, '2022-11-25 14:13:52', '2022-12-08 10:15:35', 4),
                                                                                                                                                                                       (198, 'VueJS', 420000, 'Vue.png', 0, 'L???p tr??nh Fontend b???ng VueJS', 'Vue.js l?? m???t framework Javascript ???????c t???o b???i Evan You, gi??p ch??ng ta x??y d???ng giao di???n ng?????i d??ng c??ng nh?? x??y d???ng Single Page Application th??n thi???n v???i ng?????i d??ng, ch??ng x??y d???ng t??? c??c th?? vi???n, c??ch tri???n khai component, c??c ch???c n??ng ?????c tr??ng c???a n?? nh?? SFC (Single File Component). Phi??n b???n ???n ?????nh m???i nh???t hi???n t???i c???a Vue.js l?? 2.6.10. N??o ch??ng ta c??ng ??i v??o nh???ng ki???n th???c c?? b???n nh???t c???a Vue.', 0, '2022-11-26 04:08:08', '2022-12-08 10:15:56', 3),
                                                                                                                                                                                       (199, 'HTML/CSS/JS', 300000, 'htmlcssjs.png', 0, 'L???p tr??nh web c?? b???n b???ng HTML/CSS/JS', 'Html css javascript l?? g??? ????y l?? t??n c???a m???t lo???i ng??n ng??? l???p tr??nh. V???i s??? ph??t tri???n c???a c??ng ngh??? th??ng tin, hi???n nay c?? nhi???u lo???i ng??n ng??? l???p tr??nh kh??c nhau. M???i m???t ng??n ng??? l???p tr??nh l???i ???????c s??? d???ng cho m???c ????ch v?? nh??m ng??nh kh??c nhau. \n\nNg??n ng??? l???p tr??nh html css javascript l?? m???t lo???i m?? h??a ph??? bi???n v?? kh??ng th??? thi???u ????? thi???t l???p n??n m???t website', 0, '2022-11-30 07:33:52', '2022-11-30 07:33:58', 3),
                                                                                                                                                                                       (200, 'AngularJS', 300000, 'Angular.png', 0, 'L???p tr??nh Fontend b???ng AngularJS', 'AngularJS l?? m???t framework c?? c???u tr??c cho c??c ???ng d???ng web ?????ng. N?? cho ph??p b???n s??? d???ng HTML nh?? l?? ng??n ng??? m???u v?? cho ph??p b???n m??? r???ng c?? ph??p c???a HTML ????? di???n ?????t c??c th??nh ph???n ???ng d???ng c???a b???n m???t c??ch r?? r??ng v?? s??c t??ch. Hai t??nh n??ng c???t l??i: Data binding v?? Dependency injection c???a AngularJS lo???i b??? ph???n l???n code m?? b???n th?????ng ph???i vi???t. N?? x???y ra trong t???t c??? c??c tr??nh duy???t, l??m cho n?? tr??? th??nh ?????i t??c l?? t?????ng c???a b???t k??? c??ng ngh??? Server n??o.', 0, '2022-11-30 07:38:13', NULL, 3),
                                                                                                                                                                                       (201, 'ExpressJS', 100000, 'Expressjs.png', 0, 'L???p tr??nh Backend b???ng ExpressJS', 'Expressjs l?? m???t framework ???????c x??y d???ng tr??n n???n t???ng c???a Nodejs. N?? cung c???p c??c t??nh n??ng m???nh m??? ????? ph??t tri???n web ho???c mobile. Expressjs h??? tr??? c??c method HTTP v?? midleware t???o ra API v?? c??ng m???nh m??? v?? d??? s??? d???ng.', 0, '2022-11-30 07:39:41', NULL, 4),
                                                                                                                                                                                       (202, 'NuxtJS', 500000, 'nuxtjs.png', 0, 'L???p tr??nh Fontend b???ng NuxtJS', 'Nuxt.JS l?? m???t Javascript framework ????? t???o c??c ???ng d???ng VueJS. M???c ti??u l?? ????? ch??ng ta c?? th??? t???o m???t ???ng d???ng linh ho???t nh??ng ???????c render ph??a m??y ch???, t????ng t??? m???t trang web t??nh gi???ng nh?? c??c website th??ng th?????ng (??i???u m?? c?? l???i cho SEO).\n\nNuxtJS t???p trung v??o kh??a c???nh render giao di???n ng?????i d??ng. Ngo??i ra, Nuxt.js c?? r???t nhi???u t??nh n??ng gi??p b???n ph??t tri???n gi???a ph??a client v?? server nh?? D??? li???u b???t ?????ng b??? (Asynchronous Data), Middleware, Layouts, v.v.', 0, '2022-11-30 07:42:08', NULL, 3),
                                                                                                                                                                                       (203, 'NextJS', 300000, 'nextjs.png', 0, 'L???p tr??nh Fontend b???ng NextJS', 'Next.js l?? m???t framework front-end React ???????c ph??t tri???n d?????i d???ng open-source b??? sung c??c kh??? n??ng t???i ??u h??a nh?? render ph??a m??y ch??? (SSR) v?? t???o trang web static. Next.js x??y d???ng d???a tr??n th?? vi???n React, c?? ngh??a l?? c??c ???ng d???ng Next.js s??? d???ng core c???a React v?? ch??? th??m c??c t??nh n??ng b??? sung', 0, '2022-11-30 07:44:36', NULL, 3),
                                                                                                                                                                                       (205, 'aloalo', 12312, 'img.png', 1, 'aloalo', 'aloalo', 0, '2022-12-14 09:09:11', '2022-12-16 08:03:02', 1);

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
    (41, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `detail_class_archive`
--

CREATE TABLE `detail_class_archive` (
                                        `id` int NOT NULL,
                                        `id_class` int DEFAULT NULL,
                                        `id_students` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

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
                                                               (1, ' L??m quen v?? l???p nh??m h???c t???p ', 1),
                                                               (10, 'H?????ng d???n c??ch h???c hi???u qu??? ', 1),
                                                               (11, 'Gi???i thi???u m?? h??nh client ', 1),
                                                               (12, 'Gi???i thi???u v??? HTML - CSS ', 1),
                                                               (13, 'C??i ?????t m??i tr?????ng', 1),
                                                               (14, 'H?????ng d???n s??? d???ng Dev tools', 1),
                                                               (15, 'H?????ng d???n c??c k?? n??ng code c?? b???n', 1);

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
                                                                (1, 'Gi???i thi???u v?? l??m quen', 195),
                                                                (2, 'HTML - CSS - JS c?? b???n', 195);

-- --------------------------------------------------------

--
-- Table structure for table `notification_admin`
--

CREATE TABLE `notification_admin` (
                                      `id` int NOT NULL,
                                      `title` text,
                                      `body` text,
                                      `time` datetime DEFAULT NULL,
                                      `url` text,
                                      `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `notification_admin`
--

INSERT INTO `notification_admin` (`id`, `title`, `body`, `time`, `url`, `status`) VALUES
    (22, '????n ????ng k?? m???i', 'H???c vi??n Nguy???n ?????c 3 v???a ????ng k??', '2022-12-17 10:54:29', 'http://localhost/courses/admin/orders.?s=1671249264', 1);

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
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
                                       `email` varchar(255) DEFAULT NULL,
                                       `keyy` varchar(255) DEFAULT NULL,
                                       `expDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `keyy`, `expDate`) VALUES
    ('thienduc.nguyen098@gmail.com', '2b8232210c9d7115c69c1b5a6fc0acb42ceaa87c58', '2022-11-28 14:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `rate_courses`
--

CREATE TABLE `rate_courses` (
                                `id` int NOT NULL,
                                `rate` float DEFAULT NULL,
                                `content_rate` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
                                `id_course` int DEFAULT NULL,
                                `id_student` int DEFAULT NULL,
                                `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rate_courses`
--

INSERT INTO `rate_courses` (`id`, `rate`, `content_rate`, `id_course`, `id_student`, `status`) VALUES
    (22, 4, 'uci', 195, 3, 0);

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
                                                                        (1, 'test', 50, '2022-11-24'),
                                                                        (4, 'fzepcz90', 90, '2022-12-03'),
                                                                        (5, 'nzfozk50', 50, '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
                            `id` int NOT NULL,
                            `name_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `username_student` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `email_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `phone_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `password_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `image_student` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                            `role` tinyint DEFAULT '1',
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            `status_student` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name_student`, `username_student`, `email_student`, `phone_student`, `password_student`, `image_student`, `role`, `created_at`, `updated_at`, `status_student`) VALUES
                                                                                                                                                                                                   (1, 'Nguy???n ?????c', 'ntduc106', 'nguyenduc10603@gmail.com', '\n0823565831', '$2y$10$ThUPMQrd/PoYQLunDZ.F/u14ftdDa7.z5stoZpcx.vI/PYuVgR9fC', 'avatar.png', 1, '2022-03-03 05:56:00', '2022-04-20 04:14:18', 0),
                                                                                                                                                                                                   (3, 'Nguy???n ?????c 3', 'ntduc2k3', 'thienduc.nguyen098@gmail.com', '0823565833', '$2y$10$ThUPMQrd/PoYQLunDZ.F/u14ftdDa7.z5stoZpcx.vI/PYuVgR9fC', 'avatar.png', 1, '2021-04-02 22:56:00', '2022-06-02 22:58:00', 0);

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
                              `amount` float DEFAULT NULL,
                              `status` tinyint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `order_code`, `order_date`, `order_pay`, `id_students`, `id_class`, `amount`, `status`) VALUES
    (63, 1671249264, '2022-12-17 10:54:29', 1, 3, 8, 100000, 0);

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
                                                                                                                                                                                                                 (2, 'giangvienbe', 'thienduc.nguyen098@gmail.com', '0823565831', '12345678', 'blog_4.jpg', 'backend devLorem ipsum dolor sit amet, consectetuer adipiscing elit.Maecenas porttitor congue massa.Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.Nunc viverra imperdiet enim.Fusce est.', 'Backend', 0, '2022-11-05 03:52:30', '2022-12-14 09:13:45', 0),
                                                                                                                                                                                                                 (5, 'giangvienfre', 'ducntph27832@fpt.edu.vn', '0868400973', '1231231231', 'blog_4.jpg', 'fontend devLorem ipsum dolor sit amet, consectetuer adipiscing elit.Maecenas porttitor congue massa.Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.Nunc viverra imperdiet enim.Fusce est.', 'Fontend', 0, '2022-11-05 08:39:00', '2022-12-16 07:41:49', 0);

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
    ADD KEY `FK_ID_COURSEEE` (`id_course`),
    ADD KEY `FK_ID_TEACHERSR` (`id_teacher`);

--
-- Indexes for table `classes_archive`
--
ALTER TABLE `classes_archive`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_GV` (`id_teacher`),
    ADD KEY `FK_ID_KHOAHOC` (`id_course`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_CATE` (`id_category`);

--
-- Indexes for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_CLASS` (`id_class`),
    ADD KEY `FK_ID_STUDENTSES` (`id_students`);

--
-- Indexes for table `detail_class_archive`
--
ALTER TABLE `detail_class_archive`
    ADD PRIMARY KEY (`id`),
    ADD KEY `FK_ID_STUDSS` (`id_students`),
    ADD KEY `FK_ID_CLASES` (`id_class`);

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
-- Indexes for table `notification_admin`
--
ALTER TABLE `notification_admin`
    ADD PRIMARY KEY (`id`);

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
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `detail_classes`
--
ALTER TABLE `detail_classes`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `detail_class_archive`
--
ALTER TABLE `detail_class_archive`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `notification_admin`
--
ALTER TABLE `notification_admin`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
    ADD CONSTRAINT `FK_ID_COURSEEE` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`),
    ADD CONSTRAINT `FK_ID_TEACHERSR` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `classes_archive`
--
ALTER TABLE `classes_archive`
    ADD CONSTRAINT `FK_ID_GV` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
    ADD CONSTRAINT `FK_ID_KHOAHOC` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
    ADD CONSTRAINT `FK_ID_CATE` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `detail_classes`
--
ALTER TABLE `detail_classes`
    ADD CONSTRAINT `FK_ID_CLASS` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`),
    ADD CONSTRAINT `FK_ID_STUDENTSES` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);

--
-- Constraints for table `detail_class_archive`
--
ALTER TABLE `detail_class_archive`
    ADD CONSTRAINT `FK_ID_CLASES` FOREIGN KEY (`id_class`) REFERENCES `classes_archive` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `FK_ID_STUDSS` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`);

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

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
    ADD CONSTRAINT `fk_id_class_tbl` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    ADD CONSTRAINT `fk_id_std_class` FOREIGN KEY (`id_students`) REFERENCES `students` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
