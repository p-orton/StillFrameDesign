<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/questionnaire_functions.php';
sec_session_start();
?>

<?php include 'head.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <?php
        if (isset($_SESSION['user_id'])) {
            $userid = $_SESSION['user_id'];

            $stmt = $mysqli->prepare("SELECT type_id, question_id FROM milestone_question WHERE milestone_id = 1 ORDER BY display_order");

            if ($stmt) {
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($type, $question);
                while($stmt->fetch()){
                    switch($type){
                        case 1:
                            echo getTextField($question, $mysqli);
                            break;
                        case 2:
                            break;
                        case 3:
                            break;
                    }
                };
                $stmt->close();
            } else {
                echo $mysqli->error;
            }
        }
    ?>

    <h3>contact information</h3>

<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>
<?php include 'foot.php'; ?>







