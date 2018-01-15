<?php 
	require_once('php/rb-init.php');

	$search ='%%';

    if (isset($_POST["search"])){
        $search ='%'.trim($_POST["search"]).'%';
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

	<div class="loginForm-container loginForm-container-hide">
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
                    <?php
                        @include 'php/header.php';
                        getHeaderMenu($logged_user['role']);
                    ?>
                </div>
            </div>
        </div>

    <?php
        if ($_SESSION['role'] == 3) {
         echo
            '<div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-6 large-6 cell">
                        <a class="font_bold font_white" href="vac-page.php">
                            <div class="button button_blue button_radius button-padding button-margin">Добавить вакансию</div>
                        </a>
                    </div>
                    <div class="small-12 medium-6 large-6 cell">
                        <a class="font_bold font_white" href="BP-changeBP.php">
                            <div class="button button_blue button_radius button-padding button-margin">Изменить БП</div>
                        </a>
                    </div>
                </div>
            </div>';
        }
    ?>

    <form method='post' action="" name="searchform" target="_parent">
        <div class="grid-container">
            <input name="search" value="<? echo $_POST["search"];?>" class="vacant-search" placeholder="Поиск">
        </div>
    </form>

	<?php
		$students = R::getAll('SELECT users.*, st.skills FROM users_dvfu_db users LEFT JOIN students st ON users.id = st.id WHERE users.role = 1 and (users.name like :search or st.skills like :search)', [":search" => $search]);;
		foreach ($students as &$stud) {
			echo 
				'<div class="grid-container">
				<div class="grid-x grid-margin-x vacant-row">
					<div class="small-12 medium-4 large-4 cell">
						<p class="font_bold font_gray">'.$stud["name"].'</p>
					</div>
					<div class="small-12 medium-5 large-5 cell">
						<p class="font_bold font_gray">'.htmlentities($stud["skills"]).'</p>
					</div>
					<div class="small-12 medium-3 large-3 cell ">
						<a class="font_bold font_white" href="student-personalProfile.php?student='.$stud["id"].'">
							<div class="button button_blue button_radius">Перейти</div>
						</a>
					</div>
				</div>
			</div>';
		}
	?>




<?php @include 'php/footer.php'?>
</body>

</html>