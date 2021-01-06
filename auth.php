<?php
require_once 'autoload.php';
session_start();

$message = 'Войдите для просмотра расписания занятий';
if (isset($_SESSION['role'])) {
    header('Location: index.php');
    exit;
} elseif (isset($_POST['login']) && isset($_POST['password'])) {
    $login = Helper::clearString($_POST['login']);
    $password = Helper::clearString($_POST['password']);
    $userMap = new UserMap();
    $user = $userMap->auth($login, $password);

    if ($user) {
        $_SESSION['id'] = $user->user_id;
        $_SESSION['role'] = $user->sys_name;
        $_SESSION['roleName'] = $user->name;
        $_SESSION['fio'] = $user->fio;
        header('Location: index.php');
        exit;
    } else {
        $message = '<span style="color:red;">Некорректен логин или пароль</span>';
    }
}
require_once 'template/login.php';