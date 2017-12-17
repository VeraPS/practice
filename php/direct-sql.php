<?php
	require_once('config.php');

    //Подключение к БД
    $db = mysql_connect($host, $login, $password);

    if (!$db) {
        die('Ошибка соединения: ' . mysql_error());
    }
    else {
        mysql_select_db($dbName, $db);
    }
?>