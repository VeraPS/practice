<?php
	require_once('php/rb-init.php');

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
        setcookie('user', '', time() - 60 * 60 * 24 * 30);
    }

    session_destroy();

    goToUrl('index.php');
?>