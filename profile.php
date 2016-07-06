<?php
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    sec_session_start();
?>

<?php include 'head.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
    <?php
        if (isset($_SESSION['user_id'])) {
            $userid = $_SESSION['user_id'];


            $stmt = $mysqli->prepare("SELECT client_fname, client_lname, client_title, client_company, client_email, 
                client_city, client_province, client_country, client_postal, client_phone FROM client WHERE USER_ID = ? LIMIT 1");

            if ($stmt) {
                $stmt->bind_param('i', $userid);
                $stmt->execute();
                $stmt->bind_result($fname, $lname, $title, $company, $email, $city, $province, $country, $postal, $phone);
                $stmt->fetch();
                $stmt->close();
            } else {
                echo "oops";
                echo $mysqli->error;
            }

            $stmt = $mysqli->prepare("SELECT progress.prog_percent, milestone.mile_id, milestone.mile_title 
                    FROM progress, milestone WHERE progress.mile_id = milestone.mile_id
                    AND progress.user_id = ? ORDER BY milestone.mile_id");

            if ($stmt) {
                $percents = $mile_ids = $titles = [];
                $stmt->bind_param('i', $userid);
                $stmt->execute();
                $stmt->bind_result($percent, $mile_id, $title);
                while($stmt->fetch()){
                    //echo $percent;
                    array_push($percents, $percent);
                    array_push($mile_ids, $mile_id);
                    array_push($titles, $title);
                }
                $stmt->close();
            } else {
                echo "oops";
                echo $mysqli->error;
            }


        }
    ?>
    <div id="div_profile_name">
        <h2><?php echo $fname . " " . $lname; ?></h2>
    </div>
    <div id="div_profile_title">
        <h3><?php echo $company . "<br/>" . $title; ?></h3>
    </div>
    <div id="div_profile_contact">
        <span><?php echo $email . "<br/>" . $phone; ?></span>
    </div>
    <div id="div_profile_address">
        <span>
            <?php echo $city . ", " . $province . ", " . $country . "<br/>" . $postal; ?>
        </span>
    </div>

    <?php
        for($i = 0; $i < count($percents); $i++){
    ?>
        <?php echo '<a href="questionnaire.php?mile=' . $mile_ids[$i] . '">'; ?>
            <div class="div_profile_edit">
                <div class="div_profile_edit_action">
                    go
                </div>
                <div class="div_profile_edit_percent">
                    <?php echo $percents[$i]; ?>
                </div>
                <div class="div_profile_edit_title">
                    <?php echo $titles[$i]; ?>
                </div>
            </div>
        </a>
    <?php } ?>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
    </p>
<?php endif; ?>
<?php include 'foot.php'; ?>







