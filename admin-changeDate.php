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


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">Изменить срок практики</div>
                </div>
            </div>

            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-8 large-8 cell">
                    <input class="input input_blue input-largeFont" placeholder="Вид практики">
                </div>
            </div>

            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-8 large-8 cell">
                    <input class="input input_blue input-largeFont" placeholder="Дата начала">
                </div>
            </div>

            <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-8 large-8 cell">
                        <input class="input input_blue input-largeFont" placeholder="Дата окончания">
                    </div>
                </div>

            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-8 large-8 cell"></div>
                <div class="small-12 medium-4 large-4 cell">
                    <a class="font_bold font_white">
                        <div class="button button_blue button_radius button-padding">Сохранить</div>
                    </a>
                </div>
            </div>
        </div>

    </body>
</html>