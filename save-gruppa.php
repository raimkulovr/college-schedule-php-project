<?php
require_once 'secure.php';
if (isset($_POST['gruppa_id'])) {
    $gruppa = new Gruppa();
    $gruppa->gruppa_id = Helper::clearInt($_POST['gruppa_id']);
    $gruppa->name = Helper::clearString($_POST['name']);
    $gruppa->special_id = Helper::clearInt($_POST['special_id']);
    $gruppa->date_begin = Helper::clearString($_POST['date_begin']);
    $gruppa->date_end = Helper::clearString($_POST['date_end']);
    if ((new GruppaMap())->save($gruppa)) {
        header('Location: view-gruppa.php?id='.$gruppa->gruppa_id);
    } else {
        if ($gruppa->gruppa_id) {
            header('Location: add-gruppa.php?id='.$gruppa->gruppa_id);
        } else {
            header('Location: add-gruppa.php');
        }
    }
}