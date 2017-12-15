-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2017 г., 10:51
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice_dvfu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `call_status`
--

CREATE TABLE `call_status` (
  `id_vacancy` int(4) UNSIGNED NOT NULL,
  `id_student` int(4) UNSIGNED NOT NULL,
  `call_status` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `coach`
--

CREATE TABLE `coach` (
  `id_coach` int(4) UNSIGNED NOT NULL,
  `name_coach` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `other_conts` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `concern`
--

CREATE TABLE `concern` (
  `id_conc` int(4) UNSIGNED NOT NULL,
  `name_conc` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id_group` int(4) UNSIGNED NOT NULL,
  `number` varchar(8) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id_group`, `number`, `title`) VALUES
(1, 'Б8419а', 'Прикладная информатика в дизайне'),
(2, 'Б8119а', 'Прикладная информатика в дизайне'),
(3, 'Б8419б', 'Прикладная Информатика в экономике '),
(4, 'Б8119б', 'Прикладная информатика в экономике');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id_student` int(4) UNSIGNED NOT NULL,
  `name_st` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(64) DEFAULT NULL,
  `skills` varchar(2000) DEFAULT NULL,
  `id_group` int(4) UNSIGNED NOT NULL,
  `id_coach` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `terms`
--

CREATE TABLE `terms` (
  `terms_id` int(11) NOT NULL,
  `start_practice` date DEFAULT NULL,
  `end_practice` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_dvfu`
--

CREATE TABLE `users_dvfu` (
  `id_user_dvfu` int(4) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0 -admin;1-students;2-coach;3-concern'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_dvfu`
--

INSERT INTO `users_dvfu` (`id_user_dvfu`, `login`, `pass`, `role`) VALUES
(1, 'student1', '1', 1),
(2, 'student2', '2', 1),
(3, 'coach1', '1', 2),
(4, 'admin1', '1', 0),
(5, 'concern1', '1', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancy`
--

CREATE TABLE `vacancy` (
  `id_vacancy` int(4) UNSIGNED NOT NULL,
  `id_conc` int(4) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `conditions` varchar(2000) DEFAULT NULL,
  `term_of_practice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `call_status`
--
ALTER TABLE `call_status`
  ADD KEY `id_vacancy` (`id_vacancy`),
  ADD KEY `id_student` (`id_student`);

--
-- Индексы таблицы `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`id_coach`);

--
-- Индексы таблицы `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`id_conc`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id_group`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `coach` (`id_coach`);

--
-- Индексы таблицы `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`terms_id`);

--
-- Индексы таблицы `users_dvfu`
--
ALTER TABLE `users_dvfu`
  ADD PRIMARY KEY (`id_user_dvfu`);

--
-- Индексы таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id_vacancy`),
  ADD KEY `id_conc` (`id_conc`),
  ADD KEY `term_of_practice` (`term_of_practice`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coach`
--
ALTER TABLE `coach`
  MODIFY `id_coach` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `concern`
--
ALTER TABLE `concern`
  MODIFY `id_conc` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id_student` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users_dvfu`
--
ALTER TABLE `users_dvfu`
  MODIFY `id_user_dvfu` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id_vacancy` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `call_status`
--
ALTER TABLE `call_status`
  ADD CONSTRAINT `call_status_ibfk_1` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancy` (`id_vacancy`),
  ADD CONSTRAINT `call_status_ibfk_2` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`);

--
-- Ограничения внешнего ключа таблицы `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `users_dvfu` (`id_user_dvfu`);

--
-- Ограничения внешнего ключа таблицы `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `concern_ibfk_1` FOREIGN KEY (`id_conc`) REFERENCES `users_dvfu` (`id_user_dvfu`);

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `coach` (`id_coach`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`id_student`) REFERENCES `users_dvfu` (`id_user_dvfu`);

--
-- Ограничения внешнего ключа таблицы `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `terms_ibfk_1` FOREIGN KEY (`terms_id`) REFERENCES `vacancy` (`term_of_practice`);

--
-- Ограничения внешнего ключа таблицы `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`id_conc`) REFERENCES `concern` (`id_conc`),
  ADD CONSTRAINT `vacancy_ibfk_2` FOREIGN KEY (`term_of_practice`) REFERENCES `terms` (`terms_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
