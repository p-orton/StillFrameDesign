<?php

//Gets the title of milestone, and in doing so, confirms that the milestone id exists in the DB
function getMilestoneHeader($mile_id, $mysqli){

    $stmt = $mysqli->prepare("SELECT mile_title FROM milestone WHERE mile_id = ?");
    $title = null;
    if($stmt) {
        $stmt->bind_param("i", $mile_id);
        if($stmt->execute()) {
            $stmt->bind_result($title);
            $stmt->fetch();
        }
        $stmt->close();
    }

    if(!$title){
        questionnaireError("failed to load the questionnaire, please contact stillframedesign@gmail.com if problem persists.");
        return null;
    } else {
        return "<h3>" . $title . "</h3>";
    }
}

function getTextField($question_id, $user_id, $mysqli){
    $stmt = $mysqli->prepare("SELECT question_text, question_datatype, answer
                              FROM question_standard_answer_v 
                              WHERE question_id = ?
                              AND user_id = ?");
    $text = $answer = $html = "";
    $datatype = 0;
    if ($stmt) {
        $stmt->bind_param("ii", $question_id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($text, $datatype, $answer);
        $stmt->fetch();
        $html = '<p>'. $text . '</p><input type="text" id="' . $question_id . '" value="' . $answer . '"><br/>';
        $stmt->close();
    } else {
        return $mysqli->error;
    }
    return $html;
}

function saveTextField($mysqli, $user_id, $question_id, $value){
    $stmt = $mysqli->prepare("UPDATE answer
                                SET answer = ?
                                WHERE answer.question_id = ?
                                AND answer.user_id = ?");
    //$text = $answer = $html = "";
    //$datatype = 0;
    if ($stmt) {
        $stmt->bind_param("sii", $value, $question_id, $user_id);

        if($stmt->execute()){
            echo "saved";
        }else {
            questionnaireError($mysqli->error);
        }
        //$stmt->store_result();
        //$stmt->bind_result($text, $datatype, $answer);
        //$stmt->fetch();
        //$html = '<p>'. $text . '</p><input type="text" name="' . $question_id . '" value="' . $answer . '"><br/>';
        $stmt->close();
    } else {
        questionnaireError($mysqli->error);
    }
    //return $html;
}

function getSlider($question_id, $user_id, $mysqli){


    $stmt = $mysqli->prepare("SELECT text_left, text_right, answer
                              FROM question_slider_answer_v
                              WHERE question_id = ?
                              AND user_id = ?");
    $left = $right = $html = $answer = "";

    if ($stmt) {
        $stmt->bind_param("ii", $question_id, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($left, $right, $answer);
        $stmt->fetch();
        if(!$answer){
            $answer = 50;
        }
        $html  = '<div class="slider-container"><div class"slider">';
        $html .= '<div class="slider-option-left"><p>' . $left . '</p></div>';
        $html .= '<input id="' . $question_id . '" type = "range" min="0" max="100" value="' . $answer . '"/>';
        $html .= '<div class="slider-option-right"><p>' . $right . '</p></div>';
        $html .= '</div></div>';
        $stmt->close();
        return $html;
    } else {
        return $mysqli->error;
    }
}

function getPickList($id, $user_id, $mysqli){
    $stmt = $mysqli->prepare("SELECT list_id, list_text, can_select_multiple FROM question_picklist WHERE question_id = ? ");
    $list = $text = $html = "";
    $selectMultiple = true;

    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($list, $text, $selectMultiple);
        $stmt->fetch();
        $html = '<p>' . $text . '</p>';
        $stmt->close();
        //return $html;
    } else {
        return $mysqli->error;
    }

    $stmt = $mysqli->prepare("SELECT item_id, item_text, item_selected 
                              FROM question_picklist_answer_v 
                              WHERE list_id = ?
                               AND  user_id = ?
                              ORDER BY item_order");
    $item = $itemText = $itemSelected = "";

    if ($stmt) {
        $stmt->bind_param("ii", $list, $user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($item, $itemText, $itemSelected);
        if($selectMultiple){
            //Checkboxes
            while($stmt->fetch()){
                $html .= '<input type="checkbox" id="' . $item . '" name="' . $list . '" value="false" checked="' . $itemSelected . '">';
                $html .= '<label for="' . $item . '"><p>' . $itemText . '</p></label>';
            }
        } else {
            //radio buttons
            while($stmt->fetch()){
                $html .= '<input type="radio" id="' . $item . '" name="' . $list . '" value="false" checked="' . $itemSelected . '">';
                $html .= '<label for="' . $item . '"><p>' . $itemText . '</p></label>';
            }
        }


        $stmt->close();
        return $html;
    } else {
        return $mysqli->error;
    }
}

function savePicklist($mysqli, $user_id, $question_id, $item_id, $value){

}

function questionnaireError($message){
    echo $message;
}
