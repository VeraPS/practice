<?php
    require_once('php/rb-init.php');
    checkRoles([0]);

    $id = -1;
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    R::exec("DELETE FROM users_dvfu_db WHERE id=:id", [":id" => $id]);
    goToUrl("admin-listBP.php");
?>