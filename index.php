<?php 
include ("/php/config.php"); 
$db = mysql_connect("practice","root","");
mysql_select_db("practice_dvfu",$db);
//|| die(mysql_error())
if (($_POST['login']) && ($_POST['pass'])){
		$login = trim ( $_POST['login'] );
		$pass = trim ( $_POST['pass'] );
		$b_count=mysql_result(mysql_query("SELECT COUNT(*) FROM users_dvfu WHERE users_dvfu.login = '".$login."' AND users_dvfu.pass = '".$pass."'"),0);
	   // echo $b_count; 
		if  ($b_count>0) {
			$role = mysql_result(mysql_query("SELECT role FROM users_dvfu WHERE users_dvfu.login = '".$login."' AND users_dvfu.pass = '".$pass."'"),0);	
			 //echo $role;
			 switch ($role) {
							case 0:
								echo "<script>window.location.href='admin-mainPage.php'</script>";
								break;
							case 1:
								echo "<script>window.location.href='student-personalProfile.php'</script>";
								break;
							case 2:
								echo "<script>alert(\"Страница преподавателя\");</script>"; 
								break;
							case 3:
								echo "<script>window.location.href='BP-personalProfile.php'</script>";
								break;
						}
		}	
		else
		{ 
			echo "<script>alert(\"Зарегестрируйтесь в системе ДВФУ\");</script>"; 
			
		}echo "<script>window.location.href='index.php'</script>";
	}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Foundation for Sites</title>
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

					<p class="loginForm-discription loginForm-checkBox"><input type="checkbox">Запомнить меня</p>
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
				<div class="small-12 medium-4 large-4 cell header-dropDown">Тут меню</div>
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




</body>

</html>