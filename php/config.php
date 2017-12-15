<?php
    //Подключение к БД

    $host = 'localhost';
    $login = 'root';
    $password = 'root';
    $dbName = 'practice_dvfu';

    $db = mysql_connect($host, $login, $password);

    if (!$db) {
        die('Ошибка соединения: ' . mysql_error());
    }
    else {
        mysql_select_db($dbName, $db);
    }
?>