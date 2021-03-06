<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/questionnaire_functions.php';
sec_session_start();
?>

<?php if (login_check($mysqli) == true) : ?>
    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id']) && isset($_POST['json'])){
        $stmt = $mysqli->prepare("UPDATE answer 
                                  SET answer = ? 
                                  WHERE question_id = ? 
                                  AND user_id = ?");

        $user_id = $_SESSION['user_id'];
        $questions = json_decode($_POST['json'], true);
        //for($i = 0; $i < count($questions); $i++){
        if(isset($questions['item_id'])){
            //save picklist
            savePicklist($mysqli, $user_id, $questions['list_id'], $questions['item_id'], $questions['checked'], $questions['type']);
        } else {
            //save standard answer / slider
            saveTextField($mysqli, $user_id, $questions['id'], $questions['answer']);
        }
        //}
    }
    ?>

<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>

