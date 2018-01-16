<?php
    require_once('php/rb-init.php');
    checkRoles([0]);

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


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">Группы</div>
                </div>
            </div>


            <form action="admin-watchGroup.php" method="post">
                <!-- Тоже захардкодил -->

                <select name="groupID">
                    <?
                        $groups = R::getAll("SELECT * FROM groups_dvfu_db");
                        foreach ($groups as $group) {
                            echo '<option value="'.$group["id_group"].'">'.$group["number"].'</option>';
                        }
                    ?>
                </select>
                <?php
                    require_once('php/rb-init.php');
                    @include 'php/form.php';

                    getButtonHTML('Найти');


                    $id_group = $_POST['groupID'];

                    if($id_group) {
                        

                        $user = R::getAll("
                            select users.name, users.phone, vac.title
                            from students_dvfu_db stdvfu
                            left join users_dvfu_db users on users.id = stdvfu.id
                            left join (select * from call_status where call_status = 1) calls on calls.id_student = stdvfu.id
                            left join vacancy vac on vac.id = calls.id_vacancy
                            where stdvfu.id_group = :group
                        ", [":group" => $id_group]);

//                        var_dump($user);

                        echo R::getCell("select users.name from users_dvfu_db users, groups_dvfu_db grs where users.id = grs.id_coach and grs.id_group = :group", [":group" => $id_group]);

                        $titleForTable = array(
                            "name"  => "ФИО",
                            "phone"  => "Номер телефона"
                            ,"title"  => "Вакансия"
                        );
                        getTable($user, $titleForTable);
                    }


                ?>
            </form>

        </div>

    <?php @include 'php/footer.php'?></body>
</html>