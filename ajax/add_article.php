<?php
$title = trim(filter_var($_POST["title"], FILTER_SANITIZE_SPECIAL_CHARS));
$anons = trim(filter_var($_POST["anons"], FILTER_SANITIZE_SPECIAL_CHARS));
$full_text = trim(filter_var($_POST["full_text"], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if (strlen($title) < 5)
    $error .= 'Insert valid name article';
elseif (strlen($anons) < 10)
    $error .= 'Insert valid anons name';
elseif (strlen($full_text) < 10)
    $error .= 'Insert valid text';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql = 'INSERT INTO articles(title, anons, full_text, date, avtor) VALUES(?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $anons, $full_text, time(), $_COOKIE['login']]);

echo "Done";
