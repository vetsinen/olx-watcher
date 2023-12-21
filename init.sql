SET NAMES utf8;
SET
time_zone = '+00:00';
SET
foreign_key_checks = 0;
SET
sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `urls`;
CREATE TABLE `urls`
(
    `id`    int      NOT NULL,
    `url`   tinytext NOT NULL,
    `price` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id` int NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `watchers`;
CREATE TABLE `watchers`
(
    `id`     int NOT NULL AUTO_INCREMENT,
    `urlid`  int NOT NULL,
    `userid` int NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;