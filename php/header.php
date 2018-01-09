<?php 

    function getHeaderMenu() {
		session_start();

		if (! isset($_SESSION['role'])) {
			echo '
				<nav class="headerMenu small-12 medium-4 large-4 cell">
                    <ul>
                        <li>
                            <a id="login" href="index.php">Вход</a>
                        </li>
					</ul>
				</nav>
			';
			return;
		}
	

		switch ($_SESSION['role']) {
            case 0: // админ
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cell">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="admin-mainPage.php">Личный кабинет</a>
                                    </li>
                                    <li>
                                        <a href="admin-listBP.php">Список БП</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Список вакансий</a>
                                    </li>
                                    <li>
                                        <a href="calls-status.php?show=1">Статус заявок</a>
                                    </li>
                                    <li>
                                        <a href="calls-status.php">Необработанные заявки</a>
                                    </li>
                                    <li>
                                        <a href="admin-watchGroup.php">Просмотр групп</a>
                                    </li>
                                    <li>
                                        <a href="student-list.php">Список студентов</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Выход</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                ';
                break;
            case 3: // предприятие
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cell">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="index.php">Список вакансий</a>
                                    </li>
                                    <li>
                                        <a href="calls-status.php">Входящие заявки</a>
                                    </li>
                                    <li>
                                        <a href="calls-status.php?show=1">Принятые студенты</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Выход</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                ';
                break;
            case 2: // препод
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cell">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="index.php">Список вакансий</a>
                                    </li>
                                    <li>
                                        <a href="coach-watchGroup.php">Список групп</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Выход</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                ';
                break;
            case 1: // студент
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cell">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="student-personalProfile.php">Личный кабинет</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Список вакансий</a>
                                    </li>
                                    <li>
                                        <a href="calls-status.php">Статус заявок</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Выход</a>
                                    </li>
                                </ul>
            
                            </li>
                        </ul>
                    </nav>
                ';
                break;
            default:
                echo 'ERROR KEY';
                break;
        }
    }

?>