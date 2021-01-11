<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
if (isset($_POST['lesson_plan_id'])) {
$schedule = new Schedule();
$schedule->lesson_plan_id = Helper::clearInt($_POST['lesson_plan_id']);
$schedule->day_id = Helper::clearInt($_POST['day_id']);
$schedule->lesson_num_id = Helper::clearInt($_POST['lesson_num_id']);
$schedule->classroom_id = Helper::clearInt($_POST['classroom_id']);
$userId = Helper::clearInt($_POST['user_id']);
$scheduleMap = new ScheduleMap();
    if ($schedule->validate() && !$scheduleMap->existsScheduleTeacherAndGruppa($schedule)) {
        if ($scheduleMap->save($schedule)) {

            header('Location: list-schedule.php?id='.$userId);

        } else {
        Helper::setFlash('Не удалось сохранить расписание.');

        header('Location: add-schedule.php?idUser='.$userId.'&idDay='.$schedule->day_id);
        }
    } else { 
        Helper::setFlash('Такое расписание для преподавателя или группы уже существует.');
        header('Location: add-schedule.php?idUser='.$userId.'&idDay='.$schedule->day_id);
    }
} else {
header('Location: 404.php');
}