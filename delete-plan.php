<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
$id = Helper::clearInt($_GET['id']);
$idPlan = Helper::clearInt($_GET['idplan']);
if ((new ScheduleMap())->existsScheduleByLessonPlanId($id) || !(new LessonPlanMap())->delete($id)) {
    Helper::setFlash('Не удалось удалить пункт плана. К нему привязанно расписание.');
}
header('Location: list-plan.php?id='.$idPlan);