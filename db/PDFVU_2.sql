-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.53 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных practice_dvfu2
CREATE DATABASE IF NOT EXISTS `practice_dvfu2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `practice_dvfu2`;

-- Дамп структуры для таблица practice_dvfu2.call_status
CREATE TABLE IF NOT EXISTS `call_status` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_vacancy` int(4) unsigned NOT NULL,
  `id_student` int(4) unsigned NOT NULL,
  `call_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacancy` (`id_vacancy`),
  KEY `id_student` (`id_student`),
  CONSTRAINT `FK_call_status_vacancy` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_call_status_users_dvfu_db` FOREIGN KEY (`id_student`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.call_status: ~7 rows (приблизительно)
DELETE FROM `call_status`;
/*!40000 ALTER TABLE `call_status` DISABLE KEYS */;
INSERT INTO `call_status` (`id`, `id_vacancy`, `id_student`, `call_status`) VALUES
	(14, 13, 1001, 2),
	(15, 10, 1002, NULL),
	(16, 11, 1002, 1),
	(17, 12, 1004, NULL),
	(18, 9, 1004, 2),
	(19, 8, 1007, NULL),
	(20, 14, 1007, 1);
/*!40000 ALTER TABLE `call_status` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.coach
CREATE TABLE IF NOT EXISTS `coach` (
  `id` int(4) unsigned NOT NULL,
  `other_conts` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_coach_users_dvfu_db` FOREIGN KEY (`id`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.coach: ~2 rows (приблизительно)
DELETE FROM `coach`;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
INSERT INTO `coach` (`id`, `other_conts`) VALUES
	(2001, 'FEFU'),
	(2002, 'Институт математики');
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.concern
CREATE TABLE IF NOT EXISTS `concern` (
  `id` int(4) unsigned NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `contract_num` int(11) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_concern_users_dvfu_db` FOREIGN KEY (`id`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.concern: ~3 rows (приблизительно)
DELETE FROM `concern`;
/*!40000 ALTER TABLE `concern` DISABLE KEYS */;
INSERT INTO `concern` (`id`, `description`, `contract_num`, `contract_date`) VALUES
	(3001, 'барахолка', 2030, '2031-10-06'),
	(3002, 'магазин', 2056, '2058-02-18'),
	(3003, 'программисты', 2061, '2062-07-23');
/*!40000 ALTER TABLE `concern` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.groups_dvfu_db
CREATE TABLE IF NOT EXISTS `groups_dvfu_db` (
  `id_group` int(4) unsigned NOT NULL,
  `number` varchar(8) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_coach` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id_group`),
  KEY `FK_groups_dvfu_db_users_dvfu_db` (`id_coach`),
  CONSTRAINT `FK_groups_dvfu_db_users_dvfu_db` FOREIGN KEY (`id_coach`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu2.groups_dvfu_db: ~3 rows (приблизительно)
DELETE FROM `groups_dvfu_db`;
/*!40000 ALTER TABLE `groups_dvfu_db` DISABLE KEYS */;
INSERT INTO `groups_dvfu_db` (`id_group`, `number`, `title`, `id_coach`) VALUES
	(1, 'Б8419а', 'Прикладная информатика в дизайне 4', 2001),
	(2, 'Б8119а', 'Прикладная информатика в дизайне 1', 2001),
	(3, 'Б8419б', 'Прикладная Информатика в экономике ', 2002);
/*!40000 ALTER TABLE `groups_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(4) unsigned NOT NULL,
  `title_of_skills` varchar(255) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_student` (`id`),
  CONSTRAINT `FK_students_users_dvfu_db` FOREIGN KEY (`id`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.students: ~9 rows (приблизительно)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `title_of_skills`, `skills`) VALUES
	(1001, 'веб-программист', 'PHP, Ruby, JS'),
	(1002, 'программист', 'C#, C++, Java'),
	(1003, 'программист', 'Delphi, Algol'),
	(1004, 'программист', 'Pascal'),
	(1005, 'веб-программист', 'Angular, NodeJS'),
	(1006, 'дизайнер', 'Photoshop, Corel Draw'),
	(1007, 'музыкант', 'FL Studio, Adobe Audition'),
	(1008, 'монтажёр', 'Adobe AA'),
	(1009, 'программист', 'Common Lisp');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.students_dvfu_db
CREATE TABLE IF NOT EXISTS `students_dvfu_db` (
  `id` int(4) unsigned DEFAULT NULL,
  `id_group` int(4) unsigned DEFAULT NULL,
  KEY `FK_students_dvfu_db_users_dvfu_db` (`id`),
  KEY `FK_students_dvfu_db_groups_dvfu_db` (`id_group`),
  CONSTRAINT `FK_students_dvfu_db_groups_dvfu_db` FOREIGN KEY (`id_group`) REFERENCES `groups_dvfu_db` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_students_dvfu_db_users_dvfu_db` FOREIGN KEY (`id`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu2.students_dvfu_db: ~9 rows (приблизительно)
DELETE FROM `students_dvfu_db`;
/*!40000 ALTER TABLE `students_dvfu_db` DISABLE KEYS */;
INSERT INTO `students_dvfu_db` (`id`, `id_group`) VALUES
	(1001, 1),
	(1002, 1),
	(1003, 1),
	(1004, 2),
	(1005, 2),
	(1006, 2),
	(1007, 3),
	(1008, 3),
	(1009, 3);
/*!40000 ALTER TABLE `students_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.terms
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL,
  `start_practice` date DEFAULT NULL,
  `end_practice` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.terms: ~0 rows (приблизительно)
DELETE FROM `terms`;
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.users_dvfu_db
CREATE TABLE IF NOT EXISTS `users_dvfu_db` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0 -admin;1-students;2-coach;3-concern',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3004 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu2.users_dvfu_db: ~15 rows (приблизительно)
DELETE FROM `users_dvfu_db`;
/*!40000 ALTER TABLE `users_dvfu_db` DISABLE KEYS */;
INSERT INTO `users_dvfu_db` (`id`, `login`, `pass`, `role`, `name`, `email`, `phone`) VALUES
	(900, 'ad1', '2', 0, 'admin', 'admin@admin.ru', '999999999'),
	(1001, 'st1', '2', 1, 'Александр Вовненко', 'av@ya.ru', '1236741589'),
	(1002, 'st2', '2', 1, 'Ирина Буланая', 'ib@rambler.ru', '1156347829'),
	(1003, 'st3', '2', 1, 'Артём Мячин', 'am@ya.ru', '1678923415'),
	(1004, 'st4', '2', 1, 'Александр Кайданович', 'ak@ya.ru', '6789123415'),
	(1005, 'st5', '2', 1, 'Михаил Дзебан', 'md@rambler.ru', '1678341259'),
	(1006, 'st6', '2', 1, 'Денис Голубев', 'dg@mail.ru', '6712341589'),
	(1007, 'st7', '2', 1, 'Елизавета Карпова', 'ek@rambler.ru', '3471281569'),
	(1008, 'st8', '2', 1, 'Константин Кириченко', 'kk@ya.ru', '4156123789'),
	(1009, 'st9', '2', 1, 'Евгения Воронцова', 'ev@mail.ru', '3415126789'),
	(2001, 'co1', '2', 2, 'Кленина НВ', 'kl@dvfu.ru', '33458634689'),
	(2002, 'co2', '2', 2, 'Святуха ИВ', 'sv@dvfu.ru', '21546124689'),
	(3001, 'bp1', '2', 3, 'Farpost', 'mail@farpost.ru', '5864689637'),
	(3002, 'bp2', '2', 3, 'DNS', 'dns@dns.ru', '71351351351'),
	(3003, 'bp3', '2', 3, 'Rhonda', 'rh@rh.ru', '68434868461');
/*!40000 ALTER TABLE `users_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu2.vacancy
CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_conc` int(4) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `conditions` varchar(2000) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `term_of_practice` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `term_of_practice` (`term_of_practice`),
  KEY `id_conc` (`id_conc`),
  CONSTRAINT `FK_vacancy_users_dvfu_db` FOREIGN KEY (`id_conc`) REFERENCES `users_dvfu_db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu2.vacancy: ~7 rows (приблизительно)
DELETE FROM `vacancy`;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`id`, `id_conc`, `title`, `description`, `conditions`, `address`, `term_of_practice`) VALUES
	(8, 3001, 'Менеджер контента', 'работа на дому', 'пользователь ПК', 'домашний офис', NULL),
	(9, 3001, 'Рекламный представитель', 'опыт в рекламе', 'коммуникабельность', 'г. Владивосток', NULL),
	(10, 3002, 'Продавец', 'опрятность', 'знание устройства ПК', 'любой филиал ДНС', NULL),
	(11, 3002, 'Кассир', 'ищем честных', 'опыт работы в 1С-Торговля', 'любой филиал ДНС', NULL),
	(12, 3002, 'Кладовщик', '', 'внимательность', 'центральный склад', NULL),
	(13, 3003, 'Программист C++', 'нужен кодер', 'C++, основы программирования', 'главный офис Rhonda', NULL),
	(14, 3003, 'Веб-программист', 'желательно иметь репозиторий в GitHub с проектами', 'JS, React, Redux, AngularJS, NodeJS', 'главный офис Rhonda', NULL);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
