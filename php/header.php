<?php 

    function getHeaderMenu($typeOfMenu) {
        switch ($typeOfMenu) {
            case 'adminMenu':
                echo'
                <nav class="headerMenu">
                    <ul>
                        <li>
                            <a href="#">Explicabo?</a>
        
                            <ul>
                                <li>
                                    <a href="#">Lorem.2</a>
                                </li>
                                <li>
                                    <a href="#">Eveniet.2</a>
                                </li>
                                <li>
                                    <a href="#">Omnis.2</a>
                                </li>
                                <li>
                                    <a href="#">Beatae.2</a>
                                </li>
                            </ul>
        
                        </li>
                    </ul>
                </nav>
                ';
                break;
            case 'bpMenu':
                echo'bpMenu';
                break;
            case 'studentMenu':
                echo'studentMenu';
                break;
            default:
                echo 'ERROR KEY';
                break;
        }
    }

?>