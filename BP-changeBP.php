<?php
	require_once('php/rb-init.php');
	
	checkRoles([0, 3]);
	
	if ($_POST['name'] || $_POST['contract_num'] || $_POST['contract_date'] || $_POST['description']) {
		if ($_POST['name']){
			$name = trim ( $_POST['name'] );
			R::exec('UPDATE users_dvfu_db SET name = :name WHERE id = :id', 
				[':id' => $logged_user['id'], ':name' => $name]);
		}
		
		if ($_POST['contract_num'] || $_POST['contract_date'] || $_POST['description']){
			$contract_num = trim ( $_POST['contract_num'] );
			$contract_date = trim ( $_POST['contract_date'] );
			$description = trim ( $_POST['description'] );
			R::exec('INSERT INTO concern (id, contract_num, contract_date, description) VALUES(:id, :contract_num, :contract_date, :description) ON DUPLICATE KEY UPDATE contract_num = :contract_num, contract_date = :contract_date, description = :description', 
				[':id' => $logged_user['id'], ':contract_num' => $contract_num, ':contract_date' => $contract_date, ':description' => $description]);
		}
		header("Refresh:0");
		exit('Данные БП изменены');
	}
	require_once('php/form.php');
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
                        getHeaderMenu('bpMenu');
                    ?>
                </div>
            </div>
        </div>


        <div class="grid-container">

            <div class="grid-container">
                <div class="grid-x grid-margin-x">
                    <div class="small-12 medium-12 large-12 cell form-title">Изменить БП</div>
                </div>
            </div>

			<form method='post' action="" target="_parent">
				<?php
					getInputHTML("name", "Название предприятия", "Название предприятия", $logged_user['name']);
					getInputHTML("contract_num", "Номер договора", "Номер договора", $logged_user['contract_num']);
					getInputHTML("contract_date", "Срок окончания договора", "Срок окончания договора", $logged_user['contract_date']);
					getTextAreaHTML("description", "Описание предприятия", $logged_user['description']);
					getButtonHTML("Изменить БП");
				?>
			</form>

        </div>

    <?php @include 'php/footer.php'?></body>
</html>