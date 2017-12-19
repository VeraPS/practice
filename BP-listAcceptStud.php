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
            <input class="vacant-search" placeholder="Поиск">
        </div>

        <div class="grid-container">
            

                    <div class="vacant-container">
                        <div class="grid-x grid-padding-x vacant-row vacant-header">
                        <!-- Заголовок -->
                        
                            <div class="small-12 medium-6 large-6 cell">
                                <p class="font_bold font_gray">Иванов И.И.</p>
                            </div>

                            <div class="small-12 medium-6 large-6 cell">
                                <p class="font_bold font_gray vacant-content">HTML, CSS, JS</p>
                            </div>


                        </div>

                        <!-- Контент -->
                        <div class="vacant-content vacant-content-hide">
                            <div class="grid-x grid-padding-x vacant-row_small ">
                                <div class="small-12 medium-4 large-4 cell "> 
                                    <div class="small-12 medium-12 large-12 cell "> 
                                        <p class="font_gray font_bold">qweqwewqeqwe@mail</p>
                                    </div>

                                    <div class="small-12 medium-12 large-12 cell "> 
                                        <p class="font_gray font_bold">+70123345845</p>
                                    </div>

                                    <div class="small-12 medium-12 large-12 cell ">
                                        <div class="grid-x grid-padding-x">
                                            <div class="small-12 medium-12 large-12 cell">
                                                <button class="button button_blue button_radius font_bold font_white" type="submit" value="Submit">Пригласить</button>
                                            </div>
                            
                                            <!-- <div class="small-12 medium-6 large-6 cell">
                                                <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                                            </div> -->
                                        </div>
                                    </div>

                                                               
                                </div>

                                <div class="small-12 medium-8 large-8 cell "> 
                                    <p class="font_gray font_bold">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
                                </div>
                                <!-- <div class="small-12 medium-9 large-9 cell ">
                                    <p class="font_bold font_gray">PHP программист</p>
                                </div>

                                <div class="small-12 medium-3 large-3 cell ">
                                    <button class="button button_red button_radius font_bold font_white" type="submit" value="Submit">Удалить</button>
                                </div> -->

                          


                            <!-- <div class="grid-x grid-padding-x vacant-row_small">
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

                            </div> -->

                        </div>

                    </div>

 


        </div>
        <script src="js/jquery.js"></script>
        <script src="js/app.js"></script>
    <?php @include 'php/footer.php'?></body>
</html>