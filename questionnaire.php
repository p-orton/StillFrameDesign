<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/questionnaire_functions.php';
sec_session_start();
?>

<?php include 'head.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <?php
    if (isset($_SESSION['user_id']) && isset($_GET['mile'])) {

        //Get the milestone title and print it to the page
        $mile = $_GET['mile'];
        echo getMilestoneHeader($mile, $mysqli);
        echo '<form class="questionnaire-form" method="post">';

        $userid = $_SESSION['user_id'];

        //Get all questions related to the milestone and print them to the page
        $stmt = $mysqli->prepare("SELECT type_id, question_id FROM milestone_question WHERE milestone_id = ? ORDER BY display_order");
        if ($stmt) {
            $stmt->bind_param("i", $mile);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($type, $question);
            while($stmt->fetch()){
                switch($type){
                    case 1:
                        echo getTextField($question, $userid, $mysqli);
                        break;
                    case 2:
                        echo getSlider($question, $userid, $mysqli);
                        break;
                    case 3:
                        echo getPickList($question, $userid, $mysqli);
                        break;
                }
            };
            $stmt->close();
        } else {
            echo $mysqli->error;
        }

        echo "</form>";
    } else {
        //TO DO: redirect to profile
    }
    ?>
    <div class="div-save-status"></div>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>
<?php include 'foot.php'; ?>







