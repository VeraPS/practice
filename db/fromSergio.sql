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

-- Дамп структуры для таблица practice_dvfu.call_status
CREATE TABLE IF NOT EXISTS `call_status` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_vacancy` int(4) unsigned NOT NULL,
  `id_student` int(4) unsigned NOT NULL,
  `call_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacancy` (`id_vacancy`),
  KEY `id_student` (`id_student`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.call_status: ~7 rows (приблизительно)
DELETE FROM `call_status`;
/*!40000 ALTER TABLE `call_status` DISABLE KEYS */;
INSERT INTO `call_status` (`id`, `id_vacancy`, `id_student`, `call_status`) VALUES
	(5, 2, 1, 1),
	(6, 1, 1, NULL),
	(7, 4, 1, NULL),
	(8, 1, 2, 2),
	(9, 5, 2, 2),
	(10, 6, 2, 1),
	(11, 4, 2, NULL);
/*!40000 ALTER TABLE `call_status` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.coach
CREATE TABLE IF NOT EXISTS `coach` (
  `id` int(4) unsigned NOT NULL,
  `other_conts` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.coach: ~0 rows (приблизительно)
DELETE FROM `coach`;
/*!40000 ALTER TABLE `coach` DISABLE KEYS */;
/*!40000 ALTER TABLE `coach` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.concern
CREATE TABLE IF NOT EXISTS `concern` (
  `id` int(4) unsigned NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `contract_num` int(11) DEFAULT NULL,
  `contract_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.concern: ~6 rows (приблизительно)
DELETE FROM `concern`;
/*!40000 ALTER TABLE `concern` DISABLE KEYS */;
INSERT INTO `concern` (`id`, `description`, `contract_num`, `contract_date`) VALUES
	(5, 'dsfsdgsfhdthdsty', 10, '2017-12-19'),
	(6, 'барахолка', 11, '2099-12-30'),
	(9, 'asdfga', 0, '2099-12-31'),
	(12, 'Торговля всяким барахлом', 12345, '2099-12-31'),
	(13, 'фыапыврпфып', 3423, '2099-12-31'),
	(14, 'ыапрывпр', 23523, '2099-12-31');
/*!40000 ALTER TABLE `concern` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.groups_dvfu_db
CREATE TABLE IF NOT EXISTS `groups_dvfu_db` (
  `id_group` int(4) unsigned NOT NULL,
  `number` varchar(8) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `id_coach` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu.groups_dvfu_db: ~4 rows (приблизительно)
DELETE FROM `groups_dvfu_db`;
/*!40000 ALTER TABLE `groups_dvfu_db` DISABLE KEYS */;
INSERT INTO `groups_dvfu_db` (`id_group`, `number`, `title`, `id_coach`) VALUES
	(1, 'Б8419а', 'Прикладная информатика в дизайне', 0),
	(2, 'Б8119а', 'Прикладная информатика в дизайне', 0),
	(3, 'Б8419б', 'Прикладная Информатика в экономике ', 0),
	(4, 'Б8119б', 'Прикладная информатика в экономике', 0);
/*!40000 ALTER TABLE `groups_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(4) unsigned NOT NULL,
  `title_of_skills` varchar(255) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.students: ~4 rows (приблизительно)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `title_of_skills`, `skills`) VALUES
	(1, 'Погромист', 'не Пишет на <h3>PHP</h3> drhsdfhsfg'),
	(2, 'Веб-погромист', 'Обладает html + css'),
	(10, 'кодер', 'чото на чём-то пишет'),
	(11, 'мимокрокодил', 'неизвестные навыки');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.students_dvfu_db
CREATE TABLE IF NOT EXISTS `students_dvfu_db` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_group` (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu.students_dvfu_db: ~0 rows (приблизительно)
DELETE FROM `students_dvfu_db`;
/*!40000 ALTER TABLE `students_dvfu_db` DISABLE KEYS */;
/*!40000 ALTER TABLE `students_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.terms
CREATE TABLE IF NOT EXISTS `terms` (
  `id` int(11) NOT NULL,
  `start_practice` date DEFAULT NULL,
  `end_practice` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.terms: ~0 rows (приблизительно)
DELETE FROM `terms`;
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.users_dvfu_db
CREATE TABLE IF NOT EXISTS `users_dvfu_db` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0 -admin;1-students;2-coach;3-concern',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu.users_dvfu_db: ~11 rows (приблизительно)
DELETE FROM `users_dvfu_db`;
/*!40000 ALTER TABLE `users_dvfu_db` DISABLE KEYS */;
INSERT INTO `users_dvfu_db` (`id`, `login`, `pass`, `role`, `name`, `email`, `phone`) VALUES
	(1, 'student1', '2', 1, 'Вера ПС', 'vera@dvfu.ru', '46814761'),
	(2, 'student2', '2', 1, 'Женя БВ', 'zheka@dvfu.ru', '5715872887'),
	(3, 'coach1', '2', 2, '', '', ''),
	(4, 'admin1', '2', 0, '', '', ''),
	(5, 'concern1', '2', 3, 'FEFU', '', ''),
	(6, 'concern2', '2', 3, 'Farpost.ru', 'mail@Farpost.ru', '534165641'),
	(9, 'BP1', '2', 3, 'New BP', '', NULL),
	(10, 'student3', '2', 1, 'Сергей СЕ', 'sergey@dvfu.ru', '68716871'),
	(11, 'student4', '2', 1, 'Петя АБ', 'petya@dvfu.ru', '99915487'),
	(12, 'concern3', '2', 3, 'DNS', 'dns@dns.ru', NULL),
	(13, 'concern3', '2', 3, 'Нормальное', 'ыфапфы', NULL);
/*!40000 ALTER TABLE `users_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.vacancy
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
  KEY `id_conc` (`id_conc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.vacancy: ~6 rows (приблизительно)
DELETE FROM `vacancy`;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
INSERT INTO `vacancy` (`id`, `id_conc`, `title`, `description`, `conditions`, `address`, `term_of_practice`) VALUES
	(1, 5, 'работа на кафедре', 'нужно вкалывать как раб на галерах', 'любой студент', 'кампус', 1),
	(2, 6, 'программист PHP', 'писать бэкенд на ПХП и всякое', 'студент с прямыми руками', 'главный офис', 1),
	(3, 6, 'Новая вакансия 1', 'Примечания 1', 'Требования 1', 'Адрес 1', NULL),
	(4, 6, 'Погромист', '', '', '', NULL),
	(5, 12, 'Менеджер торгового зала', 'Подойдёт почти любой', 'Знание компьютерного железа', 'ДНС на Алеутской', NULL),
	(6, 6, 'Типа вакансия', 'лолшто', 'Ничего не нужно', 'Где угодно', NULL);
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
