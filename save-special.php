<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
if (isset($_POST['special_id'])) {
    $special = new Special();
    $special->special_id = Helper::clearInt($_POST['special_id']);
    $special->name = Helper::clearString($_POST['name']);
    $special->otdel_id = Helper::clearInt($_POST['otdel_id']);
    if ((new SpecialMap())->save($special)) {
        header('Location: view-special.php?id='.$special->special_id);
    } else {
        if ($special->special_id) {
            header('Location: add-special.php?id='.$special->special_id);
        } else {
            header('Location: add-special.php');
        }
    }
}