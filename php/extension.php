<?php 

    //Показать alert
    function getAlert($text) {
        echo "<script>alert('".$text."');</script>"; 
    }

    //Редирект на страницу с указанным url
    function goToUrl($url) {
        echo "<script>window.location.href='".$url."'</script>";
    }

    //Получение результата запроса одной командой
    function getValue($sql,$row,$field) {
        return mysql_result(mysql_query($sql), $row, $field);
    }
?>