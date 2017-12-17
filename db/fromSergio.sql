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
DROP TABLE IF EXISTS `call_status`;
CREATE TABLE IF NOT EXISTS `call_status` (
  `id` int(4) unsigned NOT NULL,
  `id_vacancy` int(4) unsigned NOT NULL,
  `id_student` int(4) unsigned NOT NULL,
  `call_status` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacancy` (`id_vacancy`),
  KEY `id_student` (`id_student`),
  CONSTRAINT `FK_call_status_students` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`),
  CONSTRAINT `FK_call_status_vacancy` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancy` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.call_status: ~0 rows (приблизительно)
DELETE FROM `call_status`;
/*!40000 ALTER TABLE `call_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `call_status` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.coach
DROP TABLE IF EXISTS `coach`;
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
DROP TABLE IF EXISTS `concern`;
CREATE TABLE IF NOT EXISTS `concern` (
  `id` int(4) unsigned NOT NULL,
  `name_conc` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.concern: ~0 rows (приблизительно)
DELETE FROM `concern`;
/*!40000 ALTER TABLE `concern` DISABLE KEYS */;
/*!40000 ALTER TABLE `concern` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.groups_dvfu_db
DROP TABLE IF EXISTS `groups_dvfu_db`;
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
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(4) unsigned NOT NULL,
  `title_of_skills` varchar(255) DEFAULT NULL,
  `skills` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.students: ~2 rows (приблизительно)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `title_of_skills`, `skills`) VALUES
	(1, 'Погромист', 'Пишет на <h3>PHP</h3>'),
	(2, 'Веб-погромист', 'Обладает html + css');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.students_dvfu_db
DROP TABLE IF EXISTS `students_dvfu_db`;
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
DROP TABLE IF EXISTS `terms`;
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
DROP TABLE IF EXISTS `users_dvfu_db`;
CREATE TABLE IF NOT EXISTS `users_dvfu_db` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0 -admin;1-students;2-coach;3-concern',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Дамп данных таблицы practice_dvfu.users_dvfu_db: ~5 rows (приблизительно)
DELETE FROM `users_dvfu_db`;
/*!40000 ALTER TABLE `users_dvfu_db` DISABLE KEYS */;
INSERT INTO `users_dvfu_db` (`id`, `login`, `pass`, `role`, `name`, `email`, `phone`) VALUES
	(1, 'student1', '1', 1, 'Вера ПС', 'vera@dvfu.ru', '46814761'),
	(2, 'student2', '2', 1, 'Женя БВ', 'zheka@dvfu.ru', '5715872887'),
	(3, 'coach1', '1', 2, '', '', ''),
	(4, 'admin1', '1', 0, '', '', ''),
	(5, 'concern1', '1', 3, '', '', '');
/*!40000 ALTER TABLE `users_dvfu_db` ENABLE KEYS */;

-- Дамп структуры для таблица practice_dvfu.vacancy
DROP TABLE IF EXISTS `vacancy`;
CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `id_conc` int(4) unsigned NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `conditions` varchar(2000) DEFAULT NULL,
  `term_of_practice` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `term_of_practice` (`term_of_practice`),
  KEY `id_conc` (`id_conc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы practice_dvfu.vacancy: ~0 rows (приблизительно)
DELETE FROM `vacancy`;
/*!40000 ALTER TABLE `vacancy` DISABLE KEYS */;
/*!40000 ALTER TABLE `vacancy` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
