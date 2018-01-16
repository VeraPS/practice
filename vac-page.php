<?php 
	require_once('php/rb-init.php');
	$role = -1;
	if (isset($_SESSION['role'])) {
		$role = $_SESSION['role'];
	}
	$id = -1;
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
	}

    $can_add = false;
    if ($id != -1) {
        $vac = R::getRow('SELECT vac.*, us.name FROM vacancy vac, concern con, users_dvfu_db us where vac.id_conc = con.id and vac.id_conc = us.id and vac.id = :id', [':id' => $id]);
    }
    else {
        $can_add = true;
    }

	if (! $vac) {
		if ($role != 3) {
			goToUrl('index.php');
		}
	}

	
	$can_call = false;
    $cancelled = false;
	if ($role == 1) {
        $can_call = !( R::getRow('SELECT * FROM call_status where id_vacancy = :id and (id_student=:stud or call_status=1)', [':id' => $id, ':stud' => $_SESSION['logged_user_id']]) );

		if ($can_call) {
			if ($_POST['call']) {
                R::exec('INSERT INTO call_status (id_vacancy, id_student) VALUES (:id, :stud)', [':id' => $id, ':stud' => $_SESSION['logged_user_id']]);
                $can_call = !( R::getRow('SELECT * FROM call_status where id_vacancy = :id and id_student = :stud', [':id' => $id, ':stud' => $_SESSION['logged_user_id']]) );
			}
		}
        $cancelled = ( R::getRow('SELECT * FROM call_status where id_vacancy = :id and id_student=:stud and call_status=2', [':id' => $id, ':stud' => $_SESSION['logged_user_id']]) );
	}

    if ($role == 3) {
	    $title = trim($_POST["title"]);
        $address = $_POST['address'];
        $conditions = $_POST['conditions'];
        $description = $_POST['description'];
        if ($_POST["add"]) {
            if ($title) {
                R::exec('INSERT INTO vacancy (id_conc, title, address, conditions, description) VALUES (:id_conc, :title, :address, :conditions, :description)', [':id_conc' => $_SESSION['logged_user_id'], ':title' => $title, ':address' => $address, ':conditions' => $conditions, ':description' => $description]);
                $newID = R::getInsertID();
                goToUrl('vac-page.php?id='.$newID);
            }
            else {
                header("Refresh:0");
//                exit("Не заполнено название вакансии");
            }
        }
    }

	$can_save = ($role == 0) || (($role == 3) && ($_SESSION['logged_user_id'] == $vac["id_conc"]));

	if (($role == 0 || $role == 3) && $_POST["save"]) {
		$address = $_POST['address'];
		$conditions = $_POST['conditions'];
        $description = $_POST['description'];
        $title = trim($_POST["title"]);

        if (!$title) {
            header("Refresh:0");
            getAlert('Пустое название вакансии');
        }
		
		R::exec('UPDATE vacancy SET title=:title, address=:address, conditions=:conditions, description=:description WHERE id=:id', [':id' => $vac['id'], ':title' => $title, ':address' => $address, ':conditions' => $conditions, ':description' => $description]);
		header("Refresh:0");
		getAlert('Данные вакансии сохранены');
	}

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

        <? include("php/login.php"); ?>

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
                        if ($can_add) {
                            echo 'Добавить вакансию';
                        }
                        else {
                            if (($role == 0) || ($role == 3)) {
                                echo $vac["title"] . ' в ' . $vac["name"];
                            }
                        }
					?>
					</div>
                </div>
            </div>

            <form action="" method="post">
                <?php
                    @include 'php/form.php';
                    if (($role == 0) || ($role == 3)) {
//                        if ($can_add) {
                            getInputHTML('title', 'Название вакансии', 'Название вакансии', $vac["title"]);
//                        }
                        getInputHTML('address', 'Адрес вакансии', 'Адрес вакансии', $vac["address"]);
                        getTextAreaHTML('conditions', 'Требования', $vac["conditions"]);
                        getTextAreaHTML('description', 'Примечания', $vac["description"]);

                        if ($role == 0 || $role == 3) {
                            if ($can_add) {
                                getButtonHTML('Добавить');
                                echo '<input name="add" value="true" style="visibility: hidden">';
                            }
                            if ($can_save) {
                                getButtonHTML('Сохранить');
                                echo '<input name="save" value="true" style="visibility: hidden">';
                            }
                        }
                    }
                    else {
                        echo '
                            <div class="grid-container">
                    
                    
                                    <div class="grid-x grid-margin-x">
                                        <div class="small-12 medium-12 large-12 cell form-title form-title_blue form-title_underline">'.$vac["title"].'</div>
                                    </div>
                    
                    
                                    <div class="grid-x grid-margin-x form-img-container">
                                        <div class="small-12 medium-12 large-12 cell">
                                            <img class="form-img" src="img/phpCoder.jpg" alt="php coder">
                                        </div>
                                    </div>
                    
                                    <div class="grid-x grid-margin-x">
                                        <div class="small-12 medium-12 large-12 cell"><p class="form-subtitle form-subtitle_bold">Требования:</p></div>
                                        <div class="small-12 medium-12 large-12 cell form-text form-text_bold">
                                            <p>'.$vac["conditions"].'</p>
                                        </div>
                                    </div>   
                    
                                    <div class="grid-x grid-margin-x">
                                        <div class="small-12 medium-12 large-12 cell"><p class="form-subtitle form-subtitle_bold form-subtitle_rightSide">Адрес:</p></div>
                                        <div class="small-12 medium-6 medium-offset-6 large-5 large-offset-7 cell form-text form-text_bold">
                                            <p>'.$vac["address"].'</p>
                                        </div>
                                    </div> 
                                    
                                    <div class="grid-x grid-margin-x">
                                        <div class="small-12 medium-12 large-12 cell"><p class="form-subtitle form-subtitle_bold">Примечание:</p></div>
                                        <div class="small-12 medium-12 large-12 cell form-text form-text_bold">
                                            <p>'.$vac["description"].'</p>
                                        </div>
                                    </div>  
                                    ';

                                    if ($cancelled) {
                                        echo '
                                            <div class="grid-x grid-margin-x">
                                                <div class="small-12 medium-5 large-5 cell medium-offset-3">
                                                    <div class="button button_red button-padding font_bold font_white" type="submit" value="Submit">Ваша заявка отклонена</div>
                                                </div>
                                            </div>';
                                    }
                                    else {
                                        if (($role == 1) && ($can_call)) {
                                            echo '
                                            <div class="grid-x grid-margin-x">
                                                <div class="small-12 medium-5 large-5 cell medium-offset-3">
                                                    <button class="button button_blue button-padding font_bold font_white" type="submit" value="Submit">Отправить резюме</button>
                                                </div>
                                            </div>';
                                            echo '<input name="call" value="true" style="visibility: hidden">';
                                        }
                                    }
                                
                                
                            echo '</div>';


                    }
				?>
            </form>

        </div>
    <?php @include 'php/footer.php'?></body>
</html>