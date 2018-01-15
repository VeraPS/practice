<?php
	require_once('php/rb-init.php');
	
	checkRoles([0, 1, 3]);

	$student = false;

    if ($_SESSION['role'] == 1) {
        $student = $logged_user;
    }
    else {
        if (isset($_GET["student"])){
            $student = loadUser($_GET["student"]);
        }
        else {
            goToUrl("index.php");
        }
    }

	if ($_POST['phone'] || $_POST['email'] || $_POST['title_of_skills'] || $_POST['skills']) {
		if ($_POST['phone'] || $_POST['email'] ){
			$phone = trim ( $_POST['phone'] );
			$email = trim ( $_POST['email'] );
			R::exec('INSERT INTO users_dvfu_db (id, phone, email) VALUES(:id, :phone, :email) ON DUPLICATE KEY UPDATE phone = :phone, email = :email', 
				[':id' => $student['id'], ':phone' => $phone, ':email' => $email]);
		}
		
		if ($_POST['title_of_skills'] || $_POST['skills']){
			$title_of_skills = trim ( $_POST['title_of_skills'] );
			$skills = trim ( $_POST['skills'] );
			R::exec('INSERT INTO students (id, title_of_skills, skills) VALUES(:id, :title_of_skills, :skills) ON DUPLICATE KEY UPDATE title_of_skills = :title_of_skills, skills = :skills', 
				[':id' => $student['id'], ':title_of_skills' => $title_of_skills, ':skills' => $skills]);
		}
		header("Refresh:0");
		exit('Данные пользователя сохранены');
	}
	require_once('php/form.php');
?>
<html>
    <header>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Практика ДВФУ</title>
        <link rel="stylesheet" href="css/foundation.css">
        <link rel="stylesheet" href="css/app.css">
        <link href="css/style.css" rel="stylesheet">
    </header>
    <body>
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


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title"><?php echo $student['name'];?></div>
                </div>
            </div>
			
			<form method='post' action="" target="_parent">
				<?php
					getInputHTML("title_of_skills", "Заголовок навыков", "Заголовок навыков", $student['title_of_skills']);
					getInputHTML("phone", "Телефон", "Телефон", $student['phone']);
					getInputHTML("email", "Почта", "", $student['email']);
					getTextAreaHTML("skills", "Навыки", $student['skills']);
					if (($_SESSION['role'] == 0) || ($_SESSION['role'] == 1)) {
                        getButtonHTML("Сохранить");
                    }
				?>
			</form>
        </div>

    <?php @include 'php/footer.php'?></body>
</html>