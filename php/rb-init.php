<?php 
	require_once("rb-mysql.php");
	require_once('config.php');
	require_once('php/extension.php');

	R::setup( 'mysql:host='.$host.';dbname='.$dbName, $login, $password);
	
	session_start();
	
	if (!$_SESSION['logged_user_id']) {
		if ('/index.php' != strtolower($_SERVER['PHP_SELF'])) {
			goToUrl('index.php');
		}
	}
	
	$logged_user = loadUser($_SESSION['logged_user_id']);
	$_SESSION['role'] = $logged_user['role'];
?>