<?php
$username = trim(filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST["email"], FILTER_SANITIZE_EMAIL));
$mess = trim(filter_var($_POST["mess"], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if (strlen($username) < 2)
    $error .= 'Insert valid name';
elseif (strlen($email) < 5)
    $error .= 'Insert valid email';
elseif (strlen($mess) < 10)
    $error .= 'Insert valid message';

if ($error != '') {
    echo $error;
    exit();
}

$to = "test@e.co";
$subject = "=?utf-8?B?" . base64_encode("New message") . "?=";
$message = "User: $username.<br>$mess";
$headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n";

mail($to, $subject, $mess, $headers);

echo "Done";
