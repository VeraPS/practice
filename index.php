<?php 
	require_once('php/rb-init.php');

	$search ='%%';

    if (isset($_POST["search"])){
        $search ='%'.trim($_POST["search"]).'%';
    }

	if (($_POST['login']) && ($_POST['pass'])){
		$login = trim ( $_POST['login'] );
		$pass = trim ( $_POST['pass'] );
		$save = $_POST['save'];
		$user_id = R::getCell('SELECT u.id FROM users_dvfu_db u WHERE u.login = :login AND u.pass = :pass', [':login' => $login, ':pass' => $pass]);
		
		if ($user_id) {
			$_SESSION = array();
			$_SESSION['logged_user_id'] = $user_id;
			
    		$load_user = loadUser($user_id);

            if ($save) {
                setcookie('user', $user_id.':'.md5($load_user['pass']), time() + 60 * 60 * 24 * 30);
            }

			switch ($load_user['role']) {
				case 0: 
					goToUrl("admin-mainPage.php");
					break;
				case 1: 
					goToUrl('student-personalProfile.php');
					break;
				case 2:
                    goToUrl('index.php');
					break;
				case 3: 
					goToUrl('index.php');
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

        <? include("php/login.php"); ?>


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
		$vacancy = R::getAll('SELECT vac.*, us.name FROM vacancy vac, concern con, users_dvfu_db us where vac.id_conc = con.id and vac.id_conc = us.id and (vac.title like :search or us.name like :search)', [":search" => $search]);
		if ($_SESSION['role'] == 3) {
			$vacancy = R::getAll('SELECT vac.*, us.name FROM vacancy vac, concern con, users_dvfu_db us where vac.id_conc = con.id and vac.id_conc = us.id and vac.id_conc = :id and (vac.title like :search or us.name like :search)', [":search" => $search, ':id' => $_SESSION['logged_user_id']]);
		}
		foreach ($vacancy as &$vac) {
			echo 
				'<div class="grid-container">
				<div class="grid-x grid-margin-x vacant-row">
					<div class="small-12 medium-4 large-4 cell">
						<p class="font_bold font_gray">'.$vac["name"].'</p>
					</div>
					<div class="small-12 medium-5 large-5 cell">
						<p class="font_bold font_gray">'.$vac["title"].'</p>
					</div>
					<div class="small-12 medium-3 large-3 cell ">
						<a class="font_bold font_white" href="vac-page.php?id='.$vac["id"].'">
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