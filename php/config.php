<?php
    //Подключение к БД
    
    $host = 'localhost';
    $login = 'root';
    $password = 'root';
    $dbName = 'practice_dvfu';

    $db = mysql_connect($host, $login, $password);
    mysql_select_db($dbName, $db);

    if (!$db) {
        die('Ошибка соединения: ' . mysql_error());
    }
?>