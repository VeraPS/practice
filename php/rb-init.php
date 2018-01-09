<?php 
	require_once("rb-mysql.php");
	require_once('config.php');
	require_once('php/extension.php');

	R::setup( 'mysql:host='.$host.';dbname='.$dbName, $login, $password);
	
	session_start();

	if (!isset($_SESSION['logged_user_id'])) {
        list($idCookie, $hashCookie) = explode(':', $_COOKIE['user']);

        if ($idCookie) {
            $tmpUser = loadUser($idCookie);
            if ($hashCookie == md5($tmpUser['pass'])) {
                $_SESSION['logged_user_id'] = $idCookie;
            }
        }
	}

	if (isset($_SESSION['logged_user_id'])) {
        $logged_user = loadUser($_SESSION['logged_user_id']);
        $_SESSION['role'] = $logged_user['role'];
    }

    if (!isset($_SESSION['logged_user_id'])) {
        if ('/index.php' != strtolower($_SERVER['PHP_SELF']) && '/vac-page.php' != strtolower($_SERVER['PHP_SELF'])) {
            goToUrl('index.php');
        }
    }

?>