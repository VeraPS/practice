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


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">Группы</div>
                </div>
            </div>


            <form action="admin-watchGroup.php" method="post">
                <!-- Тоже захардкодил -->
                <select name="groupID">
                    <option value="1">Б8419а</option>
                    <option value="2">Б8119а</option>
                </select>
                <?php
                    require_once('php/rb-init.php');
                    @include 'php/form.php';

                    getButtonHTML('Найти');

                    $id_group = $_POST['groupID'];

                    if($id_group) {
                        
                        //Захардкодил преподавателя
                        $id_coach = 0;

                        $user = R::getAll("SELECT users_dvfu_db.id, users_dvfu_db.name, users_dvfu_db.phone, users_dvfu_db.email ,students_dvfu_db.id, students_dvfu_db.id_group, groups_dvfu_db.id_group, groups_dvfu_db.id_coach, groups_dvfu_db.number FROM students_dvfu_db
                            CROSS JOIN groups_dvfu_db ON students_dvfu_db.id_group = groups_dvfu_db.id_group
                            CROSS JOIN users_dvfu_db ON students_dvfu_db.id = users_dvfu_db.id
                            WHERE groups_dvfu_db.id_coach = '.$id_coach.'
                            AND students_dvfu_db.id_group = '.$id_group.'
                        ");

                        $titleForTable = array(
                            "number"  => "Номер группы",
                            "name"  => "ФИО",
                            "phone"  => "Номер телефона",
                        );

                        getTable($user, $titleForTable);
                    }


                ?>
            </form>

        </div>

    <?php @include 'php/footer.php'?></body>
</html>