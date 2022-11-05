CREATE TABLE `categories` (
    `id`              bigint UNSIGNED NOT NULL,
    `name_category`   varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `categories` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `categories` ADD PRIMARY KEY (`id`);
INSERT INTO `categories` SET `name_category` = 'Lập trình'

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
    `id_category`         int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
ALTER TABLE `courses` ADD PRIMARY KEY (`id`);
ALTER TABLE `courses` ADD CONSTRAINT FK_ID_CATE FOREIGN KEY (id_category) REFERENCES categories (id)


CREATE TABLE `detail_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `lession`         varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `content_lession` text COLLATE utf8mb4_unicode_ci,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `detail_courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `detail_courses` ADD PRIMARY KEY (`id`);
ALTER TABLE `detail_courses` ADD CONSTRAINT FK_ID_COURSE FOREIGN KEY (id_course) REFERENCES `courses` (id)


CREATE TABLE `rate_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `rate`            int DEFAULT NULL,
    `content_rate`    text COLLATE utf8mb4_unicode_ci,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `rate_courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `rate_courses` ADD PRIMARY KEY (`id`);
    ALTER TABLE `rate_courses` ADD CONSTRAINT FK_ID_COURSE_2 FOREIGN KEY (id_course) REFERENCES `courses` (id)


CREATE TABLE `sale_courses` (
    `id`              bigint UNSIGNED NOT NULL,
    `coupon`          varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `price_discount`  float DEFAULT NULL,
    `id_course`       int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `sale_courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `sale_courses` ADD PRIMARY KEY (`id`);
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
ALTER TABLE `teachers` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
ALTER TABLE `teachers` ADD PRIMARY KEY (`id`);


CREATE TABLE `teachers_courses` (
    `id`          bigint UNSIGNED NOT NULL,
    `id_teachers` int DEFAULT NULL,
    `id_course`   int DEFAULT NULL,
    `status`      tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `teachers_courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `teachers_courses` ADD PRIMARY KEY (`id`);
ALTER TABLE `teachers_courses` ADD CONSTRAINT FK_ID_COURSEE    FOREIGN KEY (id_course)     REFERENCES `courses` (id)
ALTER TABLE `teachers_courses` ADD CONSTRAINT FK_ID_TEACHER     FOREIGN KEY (id_teachers)   REFERENCES `teachers` (id)


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
ALTER TABLE `students` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 1;
ALTER TABLE `students` ADD PRIMARY KEY (`id`);
 

CREATE TABLE `students_courses` (
    `id`          bigint UNSIGNED NOT NULL,
    `id_students` int DEFAULT NULL,
    `id_course`   int DEFAULT NULL,
    `status`      tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `students_courses` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
ALTER TABLE `students_courses` ADD PRIMARY KEY (`id`);
ALTER TABLE `students_courses` ADD CONSTRAINT FK_ID_COURSE_6 FOREIGN KEY (id_course)    REFERENCES `courses`    (id)
ALTER TABLE `students_courses` ADD CONSTRAINT FK_ID_STUDENTS FOREIGN KEY (id_students)  REFERENCES `students`   (id)


CREATE TABLE `staff_manager` (
    `id`            bigint UNSIGNED NOT NULL,
    `username`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `password`      varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `scope`         tinyint COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status`        tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `staff_manager` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
