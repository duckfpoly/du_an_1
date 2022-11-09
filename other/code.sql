CREATE TABLE `categories` (
    `id`              bigint UNSIGNED NOT NULL,
    `name_category`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `categories` SET `name_category` = 'Lập trình';

CREATE TABLE `courses` (
    `id`                  bigint UNSIGNED NOT NULL,
    `name_course`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `price_course`        int DEFAULT NULL,
    `image_course`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status_course`       tinyint DEFAULT NULL,
    `description_course`  text COLLATE utf8mb4_unicode_ci,
    `quote`               text COLLATE utf8mb4_unicode_ci,
    `created_at`          timestamp NULL DEFAULT NULL,
    `updated_at`          timestamp NULL DEFAULT NULL,
    `id_category`         int DEFAULT NULL,
    `id_teacher`          int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `courses` ADD CONSTRAINT FK_ID_CATE FOREIGN KEY (id_category) REFERENCES categories (id);
ALTER TABLE `courses` ADD CONSTRAINT FK_ID_TEACHER FOREIGN KEY (id_teacher) REFERENCES teachers (id);


CREATE TABLE `detail_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `lession`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `detail_courses` ADD CONSTRAINT FK_ID_COURSE FOREIGN KEY (id_course) REFERENCES `courses` (id)


CREATE TABLE `detail_lession` (
    `id`              bigint UNSIGNED NOT NULL,
    `content_lession`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `id_lession`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `detail_lession` ADD CONSTRAINT FK_ID_COURSE FOREIGN KEY (id_lession) REFERENCES `detail_courses` (id)


CREATE TABLE `rate_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `rate`            int DEFAULT NULL,
    `content_rate`    text COLLATE utf8mb4_unicode_ci,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `rate_courses` ADD CONSTRAINT FK_ID_COURSE_2 FOREIGN KEY (id_course) REFERENCES `courses` (id)


CREATE TABLE `sale_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `coupon`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `price_discount`  float DEFAULT NULL,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `sale_courses` ADD CONSTRAINT FK_ID_COURSE_3 FOREIGN KEY (id_course) REFERENCES `courses` (id)

CREATE TABLE `teachers` (
    `id`                  bigint UNSIGNED NOT NULL,
    `name_teacher`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email_teacher`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone_teacher`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password_teacher`    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_teacher`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `about_teacher`       text COLLATE utf8mb4_unicode_ci,
    `scope_teacher`       text COLLATE utf8mb4_unicode_ci,
    `star_teacher`        int DEFAULT NULL,
    `rate_teacher`        int DEFAULT NULL,
    `created_at`          timestamp NULL DEFAULT NULL,
    `updated_at`          timestamp NULL DEFAULT NULL,
    `status_teacher`      tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `students` (
    `id` bigint UNSIGNED NOT NULL,
    `name_student`        varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email_student`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone_student`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password_student`    varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `image_student`       varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at`          timestamp NULL DEFAULT NULL,
    `updated_at`          timestamp NULL DEFAULT NULL,
    `status_student`      tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `staff_manager` (
    `id`            bigint UNSIGNED NOT NULL,
    `username`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `scope`         tinyint COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`        tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `classes` (
    `id`                int DEFAULT NULL,
    `name_class`        VARCHAR(255) DEFAULT NULL,
    `id_course`         int DEFAULT NULL,
    `slot`              int DEFAULT NULL,
    `time_learn`        tinyint DEFAULT NULL,
    `time_start`        datetime DEFAULT NULL,
    `time_end`          datetime DEFAULT NULL,
    `status_class`      tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `classes` ADD CONSTRAINT FK_ID_COURSE       FOREIGN KEY (id_course)    REFERENCES `courses`    (id)
ALTER TABLE `classes` ADD CONSTRAINT check_slot_class   CHECK( slot <= 30 )

CREATE TABLE `detail_classes` (
   `id`                 int DEFAULT NULL,
   `id_students`        int DEFAULT NULL,
   `id_class`           int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `detail_classes` ADD CONSTRAINT FK_ID_COURSE       FOREIGN KEY (id_class)       REFERENCES `classes`    (id)
ALTER TABLE `detail_classes` ADD CONSTRAINT FK_ID_STUDENTSS    FOREIGN KEY (id_students)    REFERENCES `students`   (id)

CREATE TABLE `classes_archive` (
       `id`                int NOT NULL,
       `name_class`        VARCHAR(255) NOT NULL,
       `id_students`       int DEFAULT NULL,
       `id_course`         int DEFAULT NULL,
       `slot`              int DEFAULT NULL,
       `time_learn`        tinyint DEFAULT NULL,
       `time_start`        timestamp DEFAULT NULL,
       `time_end`          timestamp DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `orders` (
       `id`                 int NOT NULL,
       `order_date`         tinyint DEFAULT NULL,
       `order_pay`          tinyint DEFAULT NULL,
       `status`             tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `order_detail` (
       `id`                int NOT NULL,
       `id_students`       int DEFAULT NULL,
       `id_course`         int DEFAULT NULL,
       `id_order`          int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `order_detail` ADD CONSTRAINT FK_ID_ORDERS    FOREIGN KEY (id_order)    REFERENCES `orders`   (id)
ALTER TABLE `order_detail` ADD CONSTRAINT FK_ID_STD    FOREIGN KEY (id_students)    REFERENCES `students`   (id)
ALTER TABLE `order_detail` ADD CONSTRAINT FK_ID_COUR    FOREIGN KEY (id_course)    REFERENCES `courses`   (id)
