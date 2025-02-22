<?php
$login = trim(filter_var($_POST["login"], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST["password"], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if (strlen($login) < 3)
    $error .= 'Insert valid login';
elseif (strlen($password) < 5)
    $error .= 'Insert valid password';

if ($error != '') {
    echo $error;
    exit();
}

require_once "../lib/mysql.php";

$salt = 'kasjdh^(%#^&';
$password = md5($salt . $password);

$sql = 'SELECT id FROM users WHERE `login` = ? AND `password` = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $password]);
if ($query->rowCount() == 0)
    echo "Login doesn't exist";
else {
    setcookie('login', $login, time() + 3600 * 24 * 30, "/");
    echo "Done";
}
