<?php

    function getInputHTML($name, $placeholder, $described, $value) {
        echo'
            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-8 large-8 cell">
                    <input class="input input_blue input-largeFont" name="'.$name.'" placeholder="'.$placeholder.'" aria-describedby="'.$described.'" value="'.htmlentities($value).'">
                </div>
            </div>
        ';
    }

    function getTextAreaHTML($name, $placeholder, $value) {
        echo'
            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-12 large-12 cell">
                    <textarea class="input input_blue input-largeFont" name="'.$name.'" placeholder="'.$placeholder.'">'.htmlentities($value).'</textarea>
                </div>
            </div>
        ';
    }

	
    function getButtonHTML($name) {
        echo'
            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-4 medium-offset-8 large-4 cell large-offset-8">
                    <button class="button button_blue button_radius button-padding font_bold font_white" type="submit" value="Submit">'.$name.'</button>
                </div>
            </div>    
        ';
    }

    function getTable($result, $titleForTable) {

        //Так выглядит вызов этой функции

        //Ключи для построения/именования таблицы
        // $titleForTable = array(
        //     "id"    => "ID",
        //     "name"  => "Название",
        //     "email"  => "Почта",
        //     "phone"  => "Номер телефона",
        // );

        //Вызов построителя таблицы
        // getTable($result, $titleForTable);

        $keys = array_keys($titleForTable);

        if (!empty($result)){
            echo '<div class="grid-x grid-margin-x content-container">
                    <div class="small-12 medium-12 large-12 cell content-table content-table-rowColor content-table-header">
                    <table>
                    <thead>
                    <tr>';
            foreach($titleForTable as &$index) {
                echo '<th>',$index ,'</th>';
            }
            echo '</tr>
                    </thead>
                    <tbody>';
            foreach($result as &$row) {
                echo '<tr>';
                foreach($keys as &$index) {
                    echo '<td>',$row[$index] ,'</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>
                    </table>
                    </div>
                    </div>';
        }
        else {
//            getError("Упс, кажется у нас нет информации по вашим данным...");
        }
    }

?>