<?php
require_once 'secure.php';
if (isset($_POST['otdel_id'])) {
    $otdel = new Otdel();
    $otdel->otdel_id = Helper::clearInt($_POST['otdel_id']);
    $otdel->name = Helper::clearString($_POST['name']);

    if ((new OtdelMap())->save($otdel)) {
        header('Location: view-otdel.php?id='.$otdel->otdel_id);
    } else {
        if ($otdel->otdel_id) {
            header('Location: add-otdel.php?id='.$otdel->otdel_id);
        } else {
            header('Location: add-otdel.php');
        }
    }
}