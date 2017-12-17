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
	
	//Проверка прав текущего пользователя
    function checkRoles($roles = array()) {
		session_start();
		if (! in_array($_SESSION['role'], $roles)) {
			goToUrl('index.php');
		}
    }

	//Загрузить данные пользователя
    function loadUser($logged_user_id) {
		$user = R::getRow('SELECT * FROM users_dvfu_db u WHERE u.id = :id', [':id' => $logged_user_id]);
		switch ($user['role']) {
			case 0: 
				break;
			case 1: 
				$skills = R::getRow('SELECT * FROM students st WHERE st.id = :id', [':id' => $logged_user_id]);
				$user["title_of_skills"] = $skills["title_of_skills"];
				$user["skills"] = $skills["skills"];
				break;
			case 3: 
				break;
			case 3: 
				break;
		}
		return $user;
    }
?>