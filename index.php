<?php 
	require_once('php/rb-init.php');

	if (($_POST['login']) && ($_POST['pass'])){
		$login = trim ( $_POST['login'] );
		$pass = trim ( $_POST['pass'] );
		$save = $_POST['save'];
		$user_id = R::getCell('SELECT u.id FROM users_dvfu_db u WHERE u.login = :login AND u.pass = :pass', [':login' => $login, ':pass' => $pass]);
		
		if ($user_id) {
			if ($save) {

			}
			else {

			}
			
			$_SESSION = array();
			$_SESSION['logged_user_id'] = $user_id;
			
			//временное решение
			$load_user = loadUser($user_id);
			switch ($load_user['role']) {
				case 0: 
					break;
				case 1: 
					goToUrl('student-personalProfile.php');
					break;
				case 2: 
					break;
				case 3: 
					goToUrl('BP-changeBP.php');
					break;
				default: 
					break;
			}
			
			//=================
		}
		else {
			getAlert('Зарегестрируйтесь в системе ДВФУ');
		}
	}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Практика ДВФУ</title>
	<link rel="stylesheet" href="css/foundation.css">
	<link rel="stylesheet" href="css/app.css">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>

	<div class="loginForm-container">
		<div class="loginForm-board">
			<form method='post' action="" name="formname2" target="_parent">
				<div class="grid-x">
					<h2 class="loginForm-title">Практики ДВФУ</h2>

					<div class="small-12 medium-12 large-12 cell loginForm-row">
						<p class="loginForm-discription">Если вы не можете войти в свой аккаунт, обратитесь к администратору своей образовательной программы</p>
					</div>

					<div class="small-12 medium-12 large-12 cell loginForm-row">
						<p class="loginForm-discription">Email</p>
						<input class="loginForm-input" type="text" name='login'>
					</div>

					<div class="small-12 medium-12 large-12 cell loginForm-row">
						<p class="loginForm-discription">Пароль</p>
						<input class="loginForm-input" type="password" name='pass'>
					</div>

					<p class="loginForm-discription loginForm-checkBox"><input type="checkbox"  name='save'>Запомнить меня</p>
					<div class="large-offset-9 large-3 cell">
						<input class="button button-padding button-blue" type='submit' class="secondary button" name='submit' value='Войти'>
					</div>

				</div>
			</form>
		</div>
	</div>


	<div class="header">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="small-12 medium-8 large-8 cell header-title">Практика ДВФУ</div>
				<div class="small-12 medium-4 large-4 cell header-dropDown">Вход</div>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<input class="vacant-search" placeholder="Поиск">
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x grid-margin-x vacant-row">
			<div class="small-12 medium-4 large-4 cell">
				<p class="font_bold font_gray">farpost.ru</p>
			</div>
			<div class="small-12 medium-5 large-5 cell">
				<p class="font_bold font_gray">PHP программист</p>
			</div>
			<div class="small-12 medium-3 large-3 cell ">
				<a class="font_bold font_white">
					<div class="button button_blue button_radius">Перейти</div>
				</a>
			</div>
		</div>
	</div>




<?php @include 'php/footer.php'?>
</body>

</html>