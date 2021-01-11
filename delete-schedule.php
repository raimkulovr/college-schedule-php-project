<?php
require_once 'secure.php';
$id = Helper::clearInt($_GET['id']);
$idTeacher = Helper::clearInt($_GET['idTeacher']);
(new ScheduleMap())->delete($id);
header('Location: list-schedule.php?id='.$idTeacher);