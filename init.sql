-- Adminer 4.8.1 MySQL 8.1.0 dump

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
    `title` tinytext,
    `id`    int      NOT NULL,
    `url`   tinytext NOT NULL,
    `price` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `urls` (`title`, `id`, `url`, `price`)
VALUES ('Мотоцикл Tekken 250', 718431692, 'https://www.olx.ua/d/uk/obyavlenie/mototsikl-tekken-250-IDMCsTV.html',
        '1 850 $'),
       ('Катушка пустая для удлинителя и кабеля SVITTEX малая-289; большая-369', 818125672,
        'https://www.olx.ua/d/uk/obyavlenie/katushka-pustaya-dlya-udlinitelya-i-kabelya-svittex-malaya-289-bolshaya-369-IDTmLRm.html?reason=hp%7Cpromoted',
        '289 грн. / за 1 шт.'),
       ('Термокомібнезон 92-98', 826613760, 'https://www.olx.ua/d/uk/obyavlenie/termokombnezon-92-98-IDTVo00.html',
        '450 грн.'),
       ('Двигун д240 мтз газ', 826760804,
        'https://www.olx.ua/d/uk/obyavlenie/dvigun-d240-mtz-gaz-IDTX0fG.html?reason=hp%7Cpromoted', '1950 $'),
       ('Компютерне крісло Геймерське крісло з підніжкою і 2 подушками до 150кг', 826963393,
        'https://www.olx.ua/d/uk/obyavlenie/kompyuterne-krslo-geymerske-krslo-z-pdnzhkoyu-2-podushkami-do-150kg-IDTXQXf.html?reason=hp%7Cpromoted',
        '3 700 грн.');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
    `id`    int                                                          NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`email`, `id`)
VALUES ('barroot@yopmail.com', 9),
       ('barroot72@yopmail.com', 12);

DROP TABLE IF EXISTS `watchers`;
CREATE TABLE `watchers`
(
    `id`     int NOT NULL AUTO_INCREMENT,
    `urlid`  int NOT NULL,
    `userid` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `watcher` (`urlid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `watchers` (`id`, `urlid`, `userid`)
VALUES (44, 826613760, 9),
       (35, 826963393, 9);

-- 2023-12-22 11:14:35