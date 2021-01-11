<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
if (isset($_POST['user_id'])) {
    $user = new User();
    $user->lastname = Helper::clearString($_POST['lastname']);
    $user->user_id= Helper::clearInt($_POST['user_id']);
    $user->firstname = Helper::clearString($_POST['firstname']);
    $user->patronymic = Helper::clearString($_POST['patronymic']);
    $user->birthday = Helper::clearString($_POST['birthday']);
    $user->login = Helper::clearString($_POST['login']);
    $user->pass = password_hash(Helper::clearString($_POST['password']), PASSWORD_BCRYPT);
    $user->gender_id = Helper::clearInt($_POST['gender_id']);
    $user->role_id = Helper::clearInt($_POST['role_id']);
    $user->active = Helper::clearInt($_POST['active']);
    
    if (isset($_POST['saveTeacher'])) {
        $teacher = new Teacher();
        $teacher->otdel_id = Helper::clearInt($_POST['otdel_id']);
        $teacher->user_id = $user->user_id;
        if ((new TeacherMap())->save($user, $teacher)) {
            header('Location: profile-teacher.php?id='.$teacher->user_id);
        } else {
            if ($teacher->user_id) {
                header('Location: add-teacher.php?id='.$teacher->user_id);
            } else {
                header('Location: add-teacher.php');
            }
        }
        exit();
    }
}