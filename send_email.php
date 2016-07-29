<?php

//Sends an email to "target_email" including form data.
//returns 0 if failed validation, 1 if success

$target_email = 'stillframedesign@gmail.com';

$in_name = isset($_POST['name']) ? $_POST['name'] : "";
$in_email = isset($_POST['email']) ? $_POST['email'] : "";
$in_message = isset($_POST['message']) ? $_POST['message'] : "";
$in_subject = isset($_POST['subject']) ? $_POST['subject'] : 'contact form inquiry';

header('Content-Type: application/json');

if ($in_name == "" || $in_email == "" || $in_message == "")
{
    $return = json_encode(array('message' => 'please fill in all fields'));
    header('HTTP/1.1 400 Bad Request');
    header('Content-Type: application/json; charset=UTF-8');
    echo $return;
}
else{
    $message = "from: " . $in_name . "\r\n";
    $message .= "email" . $in_email . "\r\n";
    $message .= $in_message;
    mail($target_email, $in_subject, $message);
}