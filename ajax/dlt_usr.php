<?php
$id = trim(filter_var($_POST["id"], FILTER_SANITIZE_SPECIAL_CHARS));

// echo $id;
// exit();

$error = '';

if (strlen($id) == 0)
    $error .= 'Insert valid ID number';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$sql = 'DELETE FROM users WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$id]);

echo "Done";
