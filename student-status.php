<?php 
	require_once('php/rb-init.php');

	$calls = R::getAll('SELECT calls.* FROM call_status calls, users_dvfu_db conc where calls.id_vacancy = :id and calls.id_conc = conc.id and conc.id = :conc_id', [':id' => $callId, ':conc_id' => $_SESSION['logged_user_id']]);
	foreach ($calls as &$call) {
		getButtonHTML('Принять студента '.$call["name"]);
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

        <div class="grid-container">
            <input class="vacant-search" placeholder="Поиск">
        </div>

        <div class="grid-container">
            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_green button_radius">Принять</div>
                    </a>
                </div>
            </div>

            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_red button_radius">Отклонена</div>
                    </a>
                </div>
            </div>

            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_red button_radius">Отклонена</div>
                    </a>
                </div>
            </div>

            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_red button_radius">Отклонена</div>
                    </a>
                </div>
            </div>

            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_green button_radius">Принять</div>
                    </a>
                </div>
            </div>

            <div class="grid-x grid-margin-x vacant-row">
                <div class="small-12 medium-9 large-9 cell">
                    <p class="font_bold font_gray">PHP программист</p>
                </div>
                <div class="small-12 medium-3 large-3 cell ">
                    <a class="font_bold font_white">
                        <div class="button button_green button_radius">Принять</div>
                    </a>
                </div>
            </div>                

        </div>

    <?php @include 'php/footer.php'?></body>
</html>