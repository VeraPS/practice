<?php
	require_once('php/rb-init.php');
	
	checkRoles([0, 3]);

	$BP = $logged_user;
	$add = false;
	if ($_SESSION['role'] == 0){
        if (isset($_GET["add"])) {
            $add = ($_GET["add"] == 1);
            $BP = false;
        }
        else {
            if (isset($_GET["id"])) {
                $BP = loadUser($_GET["id"]);
            } else {
                goToUrl("index.php");
            }
        }

        if ($_POST['add']) {
            $login = trim($_POST['login']);
            $pass = trim($_POST['pass']);
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            if ($login && $pass && $name) {
                if (R::getRow("SELECT * FROM users_dvfu_db WHERE login=:login", [':login' => $login])) {
                    header("Refresh:0");
                    getAlert("Логин уже существует");
                    exit();
                }
                R::exec('INSERT INTO users_dvfu_db (login, pass, name, email, role) VALUES (:login, :pass, :name, :email, 3)', [':login' => $login, ':pass' => $pass, ':name' => $name, ':email' => $email]);
                $newID = R::getInsertID();
                if ($_POST['contract_num'] || $_POST['contract_date'] || $_POST['description']) {
                    $contract_num = trim($_POST['contract_num']);
                    $contract_date = trim($_POST['contract_date']);
                    $description = trim($_POST['description']);
                    R::exec('INSERT INTO concern (id, contract_num, contract_date, description) VALUES(:id, :contract_num, :contract_date, :description) ON DUPLICATE KEY UPDATE contract_num = :contract_num, contract_date = :contract_date, description = :description',
                        [':id' => $newID, ':contract_num' => $contract_num, ':contract_date' => $contract_date, ':description' => $description]);
                }
                goToUrl("BP-changeBP.php?id='.$newID.'");
                //exit();
            }
            else {
                getAlert("Введите название, логин и пароль");
            }
        }

    }


	if ($_POST['change']) {
        if ($_POST['name'] || $_POST['contract_num'] || $_POST['contract_date'] || $_POST['description']) {
            if ($_POST['name']) {
                $name = trim($_POST['name']);
                R::exec('UPDATE users_dvfu_db SET name = :name WHERE id = :id',
                    [':id' => $BP['id'], ':name' => $name]);
            }

            if ($_POST['contract_num'] || $_POST['contract_date'] || $_POST['description']) {
                $contract_num = trim($_POST['contract_num']);
                $contract_date = trim($_POST['contract_date']);
                $description = trim($_POST['description']);
                R::exec('INSERT INTO concern (id, contract_num, contract_date, description) VALUES(:id, :contract_num, :contract_date, :description) ON DUPLICATE KEY UPDATE contract_num = :contract_num, contract_date = :contract_date, description = :description',
                    [':id' => $BP['id'], ':contract_num' => $contract_num, ':contract_date' => $contract_date, ':description' => $description]);
            }
            header("Refresh:0");
            exit();
        }
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
                        getHeaderMenu('bpMenu');
                    ?>
                </div>
            </div>
        </div>


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">
                    <?php
                        if ($add) {
                            echo 'Добавить БП';
                        }
                        else {
                            echo 'Изменить БП';
                        }
                    ?>
                    </div>
                </div>
            </div>

			<form method='post' action="" target="_parent">
				<?php
					getInputHTML("name", "Название предприятия", "Название предприятия", $BP['name']);
					getInputHTML("contract_num", "Номер договора", "Номер договора", $BP['contract_num']);
					getInputHTML("contract_date", "Срок окончания договора", "Срок окончания договора", $BP['contract_date']);

					if ($add) {
                        getInputHTML("email", "Почта", "Название предприятия",'');
                        getInputHTML("login", "Логин", "Название предприятия", '');
                        getInputHTML("pass", "Пароль", "Название предприятия", '');
                    }

					getTextAreaHTML("description", "Описание предприятия", $BP['description']);
					if (($_SESSION['role'] == 0) || ($_SESSION['role'] == 3)) {
					    if ($add) {
                            getButtonHTML("Добавить БП");
                            echo '<input name="add" value="true" style="visibility: hidden">';
                        }
                        else {
                            getButtonHTML("Изменить БП");
                            echo '<input name="change" value="true" style="visibility: hidden">';
                        }
                    }
				?>
			</form>

        </div>

    <?php @include 'php/footer.php'?></body>
</html>