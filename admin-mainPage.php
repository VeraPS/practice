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
                <div class="small-12 medium-4 large-4 cell header-dropDown">
                    <?php 
                        @include 'php/header.php';
                        getHeaderMenu('adminMenu');
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="small-12 medium-6 large-6 cell">
                <a class="font_bold font_white">
                    <div class="button button_blue button_radius button-padding button-margin">Добавить Базу Практики</div>
                </a>
            </div>
            <div class="small-12 medium-6 large-6 cell">
                <a class="font_bold font_white">
                    <div class="button button_blue button_radius button-padding button-margin">Список БП</div>
                </a>
            </div>
        </div>
        <div class="grid-x grid-margin-x">
            <div class="small-12 medium-6 large-6 cell">
                <a class="font_bold font_white">
                    <div class="button button_blue button_radius button-padding button-margin">Изменить вид/срок практики</div>
                </a>
            </div>
            <div class="small-12 medium-6 large-6 cell">
                <a class="font_bold font_white">
                    <div class="button button_blue button_radius button-padding button-margin">Сформировать таблицу</div>
                </a>
            </div>
        </div>
    </div>

<?php @include 'php/footer.php'?></body>

</html>