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
                                                               (1, 'Chưa xác định', 0),
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
                                                                                                                                                                                       (193, 'NodeJS', 150000, 'nodejs.png', 0, 'Lập trình Backend bằng NodeJS', 'NodeJS là một môi trường runtime chạy JavaScript đa nền tảng và có mã nguồn mở, được sử dụng để chạy các ứng dụng web bên ngoài trình duyệt của client. Nền tảng này được phát triển bởi Ryan Dahl vào năm 2009, được xem là một giải pháp hoàn hảo cho các ứng dụng sử dụng nhiều dữ liệu nhờ vào mô hình hướng sự kiện (event-driven) không đồng bộ.', 0, '2022-11-04 20:00:37', '2022-11-25 14:26:42', 4),
                                                                                                                                                                                       (195, 'ReactJS', 100000, 'react.png', 0, 'Lập trình Fontend bằng ReactJS', 'ReactJS là một opensource được phát triển bởi Facebook, ra mắt vào năm 2013, bản thân nó là một thư viện Javascript được dùng để để xây dựng các tương tác với các thành phần trên website. Một trong những điểm nổi bật nhất của ReactJS đó là việc render dữ liệu không chỉ thực hiện được trên tầng Server mà còn ở dưới Client nữa.', 0, '2022-11-06 04:11:34', '2022-12-03 07:11:23', 3),
                                                                                                                                                                                       (197, 'Laravel', 200000, 'laravel.png', 0, 'Lập trình Backend bằng Laravel', 'Laravel là một trong những PHP Web Framework phổ biến nhất theo mẫu MVC (Model-View- Controller). Được tạo bởi Taylor Otwell, Laravel framework là nguồn mở và miễn phí giúp bạn đưa ra các sản phẩm chất lượng cao. Các code sẽ được giảm thiểu đi, nhưng vẫn đạt tiêu chuẩn ngành, giúp bạn tiết kiệm được hàng trăm giờ đồng hồ dành cho việc phát triển.Laravel đã trở nên khá thông dụng và có sẵn miễn phí. Laravel web development rất hữu ích trong việc tạo ra phần mềm web được cá nhân hóa một cách nhanh chóng và hiệu quả.', 0, '2022-11-25 14:13:52', '2022-12-08 10:15:35', 4),
                                                                                                                                                                                       (198, 'VueJS', 420000, 'Vue.png', 0, 'Lập trình Fontend bằng VueJS', 'Vue.js là một framework Javascript được tạo bởi Evan You, giúp chúng ta xây dựng giao diện người dùng cũng như xây dựng Single Page Application thân thiện với người dùng, chúng xây dựng từ các thư viện, cách triển khai component, các chức năng đặc trưng của nó như SFC (Single File Component). Phiên bản ổn định mới nhất hiện tại của Vue.js là 2.6.10. Nào chúng ta cùng đi vào những kiến thức cơ bản nhất của Vue.', 0, '2022-11-26 04:08:08', '2022-12-08 10:15:56', 3),
                                                                                                                                                                                       (199, 'HTML/CSS/JS', 300000, 'htmlcssjs.png', 0, 'Lập trình web cơ bản bằng HTML/CSS/JS', 'Html css javascript là gì? Đây là tên của một loại ngôn ngữ lập trình. Với sự phát triển của công nghệ thông tin, hiện nay có nhiều loại ngôn ngữ lập trình khác nhau. Mỗi một ngôn ngữ lập trình lại được sử dụng cho mục đích và nhóm ngành khác nhau. \n\nNgôn ngữ lập trình html css javascript là một loại mã hóa phổ biến và không thể thiếu để thiết lập nên một website', 0, '2022-11-30 07:33:52', '2022-11-30 07:33:58', 3),
                                                                                                                                                                                       (200, 'AngularJS', 300000, 'Angular.png', 0, 'Lập trình Fontend bằng AngularJS', 'AngularJS là một framework có cấu trúc cho các ứng dụng web động. Nó cho phép bạn sử dụng HTML như là ngôn ngữ mẫu và cho phép bạn mở rộng cú pháp của HTML để diễn đạt các thành phần ứng dụng của bạn một cách rõ ràng và súc tích. Hai tính năng cốt lõi: Data binding và Dependency injection của AngularJS loại bỏ phần lớn code mà bạn thường phải viết. Nó xảy ra trong tất cả các trình duyệt, làm cho nó trở thành đối tác lý tưởng của bất kỳ công nghệ Server nào.', 0, '2022-11-30 07:38:13', NULL, 3),
                                                                                                                                                                                       (201, 'ExpressJS', 100000, 'Expressjs.png', 0, 'Lập trình Backend bằng ExpressJS', 'Expressjs là một framework được xây dựng trên nền tảng của Nodejs. Nó cung cấp các tính năng mạnh mẽ để phát triển web hoặc mobile. Expressjs hỗ trợ các method HTTP và midleware tạo ra API vô cùng mạnh mẽ và dễ sử dụng.', 0, '2022-11-30 07:39:41', NULL, 4),
                                                                                                                                                                                       (202, 'NuxtJS', 500000, 'nuxtjs.png', 0, 'Lập trình Fontend bằng NuxtJS', 'Nuxt.JS là một Javascript framework để tạo các ứng dụng VueJS. Mục tiêu là để chúng ta có thể tạo một ứng dụng linh hoạt nhưng được render phía máy chủ, tương tự một trang web tĩnh giống như các website thông thường (điều mà có lợi cho SEO).\n\nNuxtJS tập trung vào khía cạnh render giao diện người dùng. Ngoài ra, Nuxt.js có rất nhiều tính năng giúp bạn phát triển giữa phía client và server như Dữ liệu bất đồng bộ (Asynchronous Data), Middleware, Layouts, v.v.', 0, '2022-11-30 07:42:08', NULL, 3),
                                                                                                                                                                                       (203, 'NextJS', 300000, 'nextjs.png', 0, 'Lập trình Fontend bằng NextJS', 'Next.js là một framework front-end React được phát triển dưới dạng open-source bổ sung các khả năng tối ưu hóa như render phía máy chủ (SSR) và tạo trang web static. Next.js xây dựng dựa trên thư viện React, có nghĩa là các ứng dụng Next.js sử dụng core của React và chỉ thêm các tính năng bổ sung', 0, '2022-11-30 07:44:36', NULL, 3),
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
    (22, 'Đơn đăng ký mới', 'Học viên Nguyễn Đức 3 vừa đăng ký', '2022-12-17 10:54:29', 'http://localhost/courses/admin/orders.?s=1671249264', 1);

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
                                                                                                                                                                                                   (1, 'Nguyễn Đức', 'ntduc106', 'nguyenduc10603@gmail.com', '\n0823565831', '$2y$10$ThUPMQrd/PoYQLunDZ.F/u14ftdDa7.z5stoZpcx.vI/PYuVgR9fC', 'avatar.png', 1, '2022-03-03 05:56:00', '2022-04-20 04:14:18', 0),
                                                                                                                                                                                                   (3, 'Nguyễn Đức 3', 'ntduc2k3', 'thienduc.nguyen098@gmail.com', '0823565833', '$2y$10$ThUPMQrd/PoYQLunDZ.F/u14ftdDa7.z5stoZpcx.vI/PYuVgR9fC', 'avatar.png', 1, '2021-04-02 22:56:00', '2022-06-02 22:58:00', 0);

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
