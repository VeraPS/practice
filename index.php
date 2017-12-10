<?php 

    //Поключение
	$user = "root";
	$pass = "root";
	$dbName = "practice_dvfu";
	
	try {
		$dbh = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', $user, $pass);
	} catch (PDOException $e) {
		die('Подключение не удалось: ' . $e->getMessage());
	}

//|| die(mysql_error())
if (($_POST['login']) && ($_POST['pass'])){
		$login = trim ( $_POST['login'] );
		$pass = trim ( $_POST['pass'] );
		$b_count=mysql_result(mysql_query("SELECT COUNT(*) FROM users_dvfu WHERE users_dvfu.login = '".$login."' AND users_dvfu.pass = '".$pass."'"),0);
	   // echo $b_count; 
		if  ($b_count>0) {
			$role = mysql_result(mysql_query("SELECT role FROM users_dvfu WHERE users_dvfu.login = '".$login."' AND users_dvfu.pass = '".$pass."'"),0);	
			 //echo $role;
			 switch ($role) {
							case 0:
								echo "<script>window.location.href='admin-mainPage.php'</script>";
								break;
							case 1:
								echo "<script>window.location.href='student-personalProfile.php'</script>";
								break;
							case 2:
								echo "<script>alert(\"Страница преподавателя\");</script>"; 
								break;
							case 3:
								echo "<script>window.location.href='BP-personalProfile.php'</script>";
								break;
						}
		}	
		else
		{ 
			echo "<script>alert(\"Зарегестрируйтесь в системе ДВФУ\");</script>"; 
			
		}echo "<script>window.location.href='index.php'</script>";
	}
?>
<html>
    <head>

    </head>

    <body>
		<form method='post' action="" name="formname2" target="_parent"> 
			
				<label>
				  <input type="text" name='login' placeholder="логин">
				</label>
			 
				<label>
				  <input type="password" name='pass' placeholder="пароль">
				</label>
			
				<input type='submit' class="secondary button" name='submit' value='Войти'> 
			
			</form>
 
    </body>
</html>