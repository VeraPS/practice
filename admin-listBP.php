<?php
	require_once('php/rb-init.php');
	checkRoles([0]);

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
                        getHeaderMenu('adminMenu');
                    ?>
                </div>
            </div>
        </div>

        <form method='post' action="" name="searchform" target="_parent">
            <div class="grid-container">
                <input name="search" value="<? echo $_POST["search"];?>" class="vacant-search" placeholder="Поиск">
            </div>
        </form>

        <div class="grid-container">
            
            <?php
                $Concs = R::getAll("SELECT udb.name, udb.id uid, conc.* FROM users_dvfu_db udb LEFT JOIN concern conc ON udb.id = conc.id WHERE udb.role = 3 and udb.name like :search", [":search" => $search]);
                foreach ($Concs as &$conc) {
                echo'
                    <div class="vacant-container">
                        <div class="grid-x grid-padding-x vacant-row ">
                        <!-- Заголовок -->
                        
                            <div class="small-12 medium-6 large-6 cell">
                                <p class="font_bold font_gray">'.$conc["name"].'</p>
                            </div>
            
                            <a class="small-12 medium-3 large-3 cell vacant-content" href="BP-changeBP.php?id=' . $conc["uid"] . '">
                                
                                    <button class="button button_blue button_radius font_bold font_white" type="submit" value="Submit">Изменить</button>
                                
                            </a>
            
                            <a class="small-12 medium-3 large-3 cell vacant-content" href="BP-del.php?id=' . $conc["uid"] . '">
                                <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                            </a>
                        </div>'

//                        .'<!-- Контент -->
//                        <div class="vacant-content vacant-content-hide">
//                            <div class="grid-x grid-padding-x vacant-row_small ">
//                                <div class="small-12 medium-9 large-9 cell ">
//                                    <p class="font_bold font_gray">PHP программист</p>
//                                </div>
//
//                                <div class="small-12 medium-3 large-3 cell ">
//                                    <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
//                                </div>
//
//                            </div>
//
//
//                            <div class="grid-x grid-padding-x vacant-row_small">
//                                <div class="small-12 medium-9 large-9 cell ">
//                                    <p class="font_bold font_gray">HTML/CSS</p>
//                                </div>
//
//                                <div class="small-12 medium-3 large-3 cell ">
//                                    <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
//                                </div>
//                            </div>
//
//                            <div class="grid-x grid-padding-x vacant-row_small">
//
//                                <div class="small-12 medium-4 large-4 cell ">
//                                    <button class="button button_blue button_radius font_white" type="submit" value="Submit">Добавить вакансию</button>
//                                </div>
//
//                            </div>
//
//                        </div>'

                    .'</div>';
                }
            ?>

 


        </div>
        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
    <?php @include 'php/footer.php'?></body>
</html>