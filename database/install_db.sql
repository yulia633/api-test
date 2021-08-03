CREATE DATABASE IF NOT EXISTS `mydb`;

USE `mydb`;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci,
  `surname` varchar(100) COLLATE utf8_unicode_ci,
  `patronymic` varchar(100) COLLATE utf8_unicode_ci,
  `organization` varchar(100) COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Record of users
-- ----------------------------
INSERT INTO `users` (`name`, `surname`, `patronymic`, `organization`) VALUES ('Ivan', 'Ivanov', 'Ivanovich', '');
INSERT INTO `users` (`name`, `surname`, `patronymic`, `organization`) VALUES ('Alex', 'Alexov', 'Alexeevich', '');
INSERT INTO `users` (`name`, `surname`, `patronymic`, `organization`) VALUES ('', '', '', 'OOO Brazilio Coffee');


-- ----------------------------
-- Table structure for ads
-- ----------------------------
DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(13,4) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ads_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Record of ads
-- ----------------------------
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Sale my home',
    'The house is located in a beautiful location in the Sestroretsk resort',
    123.456,
    'https://home-main.com',
    '2020-07-23',
    1
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Sale my home 2',
    'The house is located in a beautiful location in the Sestroretsk resort',
    993.456,
    'https://home-main.com',
    '2020-06-23',
    1
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Rent a room',
    'Rent a room in a communal apartment on Vaska with an attic',
    12.000,
    'https://rent-room.com',
    '2021-08-23',
    2
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Sale car',
    'Just sale my car',
    230.500,
    'https://car.com',
    '2019-07-23',
    3
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Laptop',
    'Just sale my laptop',
    20.500,
    'https://laptop.com',
    '2020-07-03',
    3
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'X-Box',
    'I bought X-box',
    30.50,
    'https://game.com',
    '2019-07-13',
    2
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Sale wood desk',
    'I want to sale cool wood desk fot coding',
    13.590,
    'https://desk.com',
    '2021-09-13',
    1
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Red car',
    'Sale my red car',
    230.500,
    'https://red-car.com',
    '2020-07-09',
    1
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Laptop',
    'I Just sale laptop',
    30.200,
    'https://laptop-red.com',
    '2019-07-23',
    2
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Games for PS',
    'I bouhgt games for PS.',
    1.500,
    'https://ps-game.com',
    '2019-04-23',
    1
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Tent outdoor',
    'Very super tent for outdoor, rest and forest',
    4.700,
    'https://tent-outdoor.com',
    '2021-05-21',
    2
);
INSERT INTO `ads` (`title`, `description`, `price`, `photo`, `date_created`, `user_id`)
VALUES (
    'Tent blue',
    'Just sale my tent',
    7.500,
    'https://tent.com',
    '2021-05-23',
    2
);

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8_unicode_ci,
  `ad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `photos_ads_fk` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Record of photos
-- ----------------------------
INSERT INTO `photos` (`photo`, `ad_id`) VALUES ('https://name-one.com', 1);
INSERT INTO `photos` (`photo`, `ad_id`) VALUES ('https://name-second.com', 1);
INSERT INTO `photos` (`photo`, `ad_id`) VALUES ('https://name-third.com', 2);
INSERT INTO `photos` (`photo`, `ad_id`) VALUES ('https://name-other.com', 3);
