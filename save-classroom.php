<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
if (isset($_POST['classroom_id'])) {
    $classroom = new Classroom();
    $classroom->classroom_id = Helper::clearInt($_POST['classroom_id']);
    $classroom->name = Helper::clearString($_POST['name']);

    if ((new ClassroomMap())->save($classroom)) {
        header('Location: view-classroom.php?id='.$classroom->classroom_id);
    } else {
        if ($classroom->classroom_id) {
            header('Location: add-classroom.php?id='.$classroom->classroom_id);
        } else {
            header('Location: add-classroom.php');
        }
    }
}