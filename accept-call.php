<?php
	require_once('php/rb-init.php');
	
	$callId = -1;
	if (isset($_GET["id"])) {
		$callId = $_GET["id"];
	}
    $status = -1;
    if (isset($_GET["status"])) {
        $status = $_GET["status"];
    }

    $id_conc = -1;
    if (isset($_GET["conc"])) {
        $id_conc = $_GET["conc"];
    }

    if ($_SESSION['role'] != 0) {
        if ($id_conc != $_SESSION['logged_user_id']) {
            $id_conc = -1;
            getAlert('Нарушение доступа');
        }
    }

    if (R::getRow('SELECT calls.* FROM call_status calls, vacancy vac where calls.id=:callId and isnull(calls.call_status) and calls.id_vacancy = vac.id and vac.id_conc = :conc_id', [':conc_id' => $id_conc, ':callId' => $callId])) {
        R::exec('UPDATE call_status SET call_status=:status WHERE id=:id', [':id' => $callId, ':status' => $status]);
        getAlert('Статус заявки изменён');
    }
    else {
        getAlert('Статус заявки не изменён');
    }

    goToUrl('calls-status.php');
?>