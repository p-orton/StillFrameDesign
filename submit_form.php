<!--
    This file is used only if javascript is disabled, otherwise send_email.php is used primarily
-->


<?php include 'head.php'; ?>

<?php

//Sends an email to "target_email" including form data.

$target_email = 'stillframedesign@gmail.com';

$in_name = isset($_POST['name']) ? $_POST['name'] : "";
$in_email = isset($_POST['email']) ? $_POST['email'] : "";
$in_message = isset($_POST['message']) ? $_POST['message'] : "";
$in_subject = isset($_POST['subject']) ? $_POST['subject'] : 'contact form inquiry';

if ($in_name == "" || $in_email == "" || $in_message == "")
{
    echo "<p> please fill in all fields </p>";
    include 'contact_content.php';
}
else{
    $message = "from: " . $in_name . "\r\n";
    $message .= "email: " . $in_email . "\r\n";
    $message .= $in_message;
    mail($target_email, $in_subject, $message);
    ?>
    <div class="div-contact-container">
        <div class="div-contact-form">
            <h1>Thank you!</h1>
            <p>we'll get back to you shortly.</p>
        </div>
    </div>
    <?php
}
?>

<?php include 'foot.php'; ?>
