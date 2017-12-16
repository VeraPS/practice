<?php 

    function getHeaderMenu($typeOfMenu) {
        switch ($typeOfMenu) {
            case 'adminMenu':
                // echo'
                //     <nav class="headerMenu small-12 medium-4 large-4 cel">
                //         <ul>
                //             <li>
                //                 <a href="#">Меню</a>
            
                //                 <ul>
                //                     <li>
                //                         <a href="#">Личный кабинет</a>
                //                     </li>
                //                     <li>
                //                         <a href="#">Список вакансий</a>
                //                     </li>
                //                     <li>
                //                         <a href="#">Приглашения на практику</a>
                //                     </li>
                //                     <li>
                //                         <a href="#">Статус заявок</a>
                //                     </li>
                //                 </ul>
            
                //             </li>
                //         </ul>
                //     </nav>
                // ';
                    echo 'Я хз че у админа';
                break;
            case 'bpMenu':
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cel">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="#">Личный кабинет</a>
                                    </li>
                                    <li>
                                        <a href="#">Входящие заявки</a>
                                    </li>
                                    <li>
                                        <a href="#">Исходящие заявки</a>
                                    </li>
                                    <li>
                                        <a href="#">Список студентов</a>
                                    </li>
                                    <li>
                                        <a href="#">Принятые студенты</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                ';
                break;
            case 'studentMenu':
                echo'
                    <nav class="headerMenu small-12 medium-4 large-4 cel">
                        <ul>
                            <li>
                                <a href="#">Меню</a>
            
                                <ul>
                                    <li>
                                        <a href="#">Личный кабинет</a>
                                    </li>
                                    <li>
                                        <a href="#">Список вакансий</a>
                                    </li>
                                    <li>
                                        <a href="#">Приглашения на практику</a>
                                    </li>
                                    <li>
                                        <a href="#">Статус заявок</a>
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