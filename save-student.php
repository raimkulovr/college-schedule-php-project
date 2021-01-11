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

    
    if (isset($_POST['saveStudent'])) {
        $student = new Student();
        $student->gruppa_id = Helper::clearInt($_POST['gruppa_id']);
        $student->zach = Helper::clearString($_POST['num_zach']);
        $student->user_id = $user->user_id;
        
        if ((new StudentMap())->save($user, $student)) {
            header('Location: profile-student.php?id='.$student->user_id);
        } else {
            if ($student->user_id) {
                header('Location: add-student.php?id='.$student->user_id);
            } else {
                header('Location: add-student.php');
            }
        }
        exit();
    }
}