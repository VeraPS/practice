<html>
    <header>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Foundation for Sites</title>
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


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">Добавить БП</div>
                </div>
            </div>

            <form action="" method="post">
                <?php
                    @include 'php/form.php';
                    getInputHTML('name','Название предприятия','name-format');
                    getInputHTML('number','Номер договора','name-format');
                    getInputHTML('date','Срок окончания договора','name-format');
                    getInputHTML('mail','Почта','name-format');
                    getInputHTML('password','Пароль','name-format');
                    getTextAreaHTML('describe', 'Описание предприятия');
                    getButtonHTML('Добавить БП');
                ?>
            </form>

        </div>

    </body>
</html>