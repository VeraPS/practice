<?php 
	require_once('php/rb-init.php');
    checkRoles([0, 1, 3]);

    $showStatus = false;
    if (isset($_GET["show"])) {
        if ($_GET["show"] == 1) {
            $showStatus = true;
        }
    }

    if ($_SESSION['role'] == 1) {
        $showStatus = true;
    }

    $search ='%%';

    if (isset($_POST["search"])){
        $search ='%'.trim($_POST["search"]).'%';
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
        <div class="header">
            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-8 large-8 cell header-title">Практика ДВФУ</div>
                    <?php
                        @include 'php/header.php';
                        getHeaderMenu('studentMenu');
                    ?>
                </div>
            </div>
        </div>

        <form method='post' action="" name="searchform" target="_parent">
            <div class="grid-container">
                <input name="search" value="<? echo $_POST["search"];?>" class="vacant-search" placeholder="Поиск">
            </div>
           <!-- <input name="show" value="<?/* echo $_GET["show"] */?>" style="visibility: hidden"  placeholder="Поиск">-->
        </form>

        <div class="grid-container">

		<?php
            $calls = false;
            if ($showStatus) {
                switch ($_SESSION['role']) {
                    case 0:
                        $calls = R::getAll('SELECT calls.*, vac.title, st.name, vac.id_conc id_conc FROM call_status calls, users_dvfu_db conc, users_dvfu_db st, vacancy vac where calls.id_vacancy = vac.id and vac.id_conc = conc.id and calls.id_student = st.id and (vac.title like :search or st.name like :search)', [":search" => $search]);
                        break;
                    case 1:
                        $calls = R::getAll('SELECT calls.*, vac.title, st.name, vac.id_conc id_conc FROM call_status calls, users_dvfu_db conc, users_dvfu_db st, vacancy vac where calls.id_vacancy = vac.id and vac.id_conc = conc.id and calls.id_student = st.id and calls.id_student = :id_student and (vac.title like :search)', [':id_student' => $_SESSION['logged_user_id'], ":search" => $search]);
                        break;
                    case 3:
                        $calls = R::getAll('SELECT calls.*, vac.title, st.name, vac.id_conc id_conc FROM call_status calls, users_dvfu_db conc, users_dvfu_db st, vacancy vac where calls.call_status=1 and calls.id_vacancy = vac.id and vac.id_conc = conc.id and calls.id_student = st.id and vac.id_conc = :conc_id and (vac.title like :search or st.name like :search)', [':conc_id' => $_SESSION['logged_user_id'], ":search" => $search]);
                        break;
                }
            }
            else {
                switch ($_SESSION['role']) {
                    case 0:
                        $calls = R::getAll('SELECT calls.*, vac.title, st.name, vac.id_conc id_conc FROM call_status calls, users_dvfu_db conc, users_dvfu_db st, vacancy vac where isnull(calls.call_status) and calls.id_vacancy = vac.id and vac.id_conc = conc.id and calls.id_student = st.id and (vac.title like :search or st.name like :search)', [":search" => $search]);
                        break;
                    case 3:
                        $calls = R::getAll('SELECT calls.*, vac.title, st.name, vac.id_conc id_conc FROM call_status calls, users_dvfu_db conc, users_dvfu_db st, vacancy vac where isnull(calls.call_status) and calls.id_vacancy = vac.id and vac.id_conc = conc.id and calls.id_student = st.id and vac.id_conc = :conc_id and (vac.title like :search or st.name like :search)', [':conc_id' => $_SESSION['logged_user_id'], ":search" => $search]);
                        break;
                }
            }

            if (count($calls) < 1) {
                echo 'Список пуст';
            }

			if ($calls) {
                foreach ($calls as &$call) {
                    echo '<div class="grid-x grid-margin-x vacant-row">';

                    echo
                        '<div class="small-12 medium-9 large-9 cell">
                            <p class="font_bold font_gray">';
//                                echo 'Вакансия ';
                                echo '<a href="vac-page.php?id='.$call["id_vacancy"].'">';
                                echo $call["title"];
                                echo '</a>';
                                if (($_SESSION['role'] == 0) || ($_SESSION['role'] == 3)) {
                                    echo ', студент ';
                                    echo '<a class="font_bold font_gray" href="student-personalProfile.php?student='.$call["id_student"].'">';
                                    echo $call["name"];
                                    echo '</a>';
                                }
                    echo    '</p>
                        </div>';

                    if ($showStatus == false) {
                        switch ($_SESSION['role']) {
                            case 3:
                            case 0:
                                echo
                                    '<div class="small-12 medium-3 large-3 cell ">
                                    <a class="font_bold font_white" href="accept-call.php?id=' . $call["id"] . '&conc=' . $call["id_conc"] . '&status=1">
                                        <div class="button button_green button_radius">Принять</div>
                                    </a>
                                    <a class="font_bold font_white" href="accept-call.php?id=' . $call["id"] . '&conc=' . $call["id_conc"] . '&status=2">
                                        <div class="button button_red button_radius">Отклонить</div>
                                    </a>
                                </div>';
                                break;
                        }
                    }
                    else {
                        switch ($_SESSION['role']) {
                            case 1:
                            case 0:
                                echo '<div class="small-12 medium-3 large-3 cell ">';
                                switch ($call["call_status"]) {
                                    case 1:
                                        echo '<div class="button button_green button_radius">Принята</div>';
                                        break;
                                    case 2:
                                        echo '<div class="button button_red button_radius">Отклонена</div>';
                                        break;
                                    default:
                                        echo '<div class="button button_blue button_radius">Не обработано</div>';
                                        break;
                                }
                                echo '</div>';
                                break;
                        }
                    }

                    echo '</div>';
                }
            }
		?>
		


        </div>

    <?php @include 'php/footer.php'?></body>
</html>