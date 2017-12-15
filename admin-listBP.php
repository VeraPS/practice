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
                    <div class="small-12 medium-4 large-4 cell header-dropDown">Тут меню</div>
                </div>
            </div>
        </div>

        <div class="grid-container">
            <input class="vacant-search" placeholder="Поиск">
        </div>

        <div class="grid-container">
            
            <?php
                for ($i = 1; $i <= 10; $i++) {
                echo'
                    <div class="vacant-container">
                        <div class="grid-x grid-padding-x vacant-row vacant-header">
                        <!-- Заголовок -->
                        
                            <div class="small-12 medium-6 large-6 cell">
                                <p class="font_bold font_gray">farpost.ru</p>
                            </div>
            
                            <div class="small-12 medium-3 large-3 cell vacant-content">
                                <button class="button button_blue button_radius font_bold font_white" type="submit" value="Submit">Изменить</button>
                            </div>
            
                            <div class="small-12 medium-3 large-3 cell vacant-content">
                                <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                            </div>
                        </div>

                        <!-- Контент -->
                        <div class="vacant-content vacant-content-hide">
                            <div class="grid-x grid-padding-x vacant-row_small ">
                                <div class="small-12 medium-9 large-9 cell ">
                                    <p class="font_bold font_gray">PHP программист</p>
                                </div>

                                <div class="small-12 medium-3 large-3 cell ">
                                    <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                                </div>

                            </div>


                            <div class="grid-x grid-padding-x vacant-row_small">
                                <div class="small-12 medium-9 large-9 cell ">
                                    <p class="font_bold font_gray">HTML/CSS</p>
                                </div>

                                <div class="small-12 medium-3 large-3 cell ">
                                    <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                                </div>
                            </div>

                            <div class="grid-x grid-padding-x vacant-row_small">

                                <div class="small-12 medium-4 large-4 cell ">
                                    <button class="button button_blue button_radius font_white" type="submit" value="Submit">Добавить вакансию</button>
                                </div>

                            </div>

                        </div>

                    </div>';
                }
            ?>

 


        </div>
        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>