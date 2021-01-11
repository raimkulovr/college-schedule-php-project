<?php
require_once 'secure.php';
$idUser = Helper::clearInt($_GET['idUser']);
$idDay = Helper::clearInt($_GET['idDay']);
if ((new TeacherMap())->findById($idUser) ->validate()) {
    $teacher = (new UserMap())->findProfileById($idUser);
} else {
    header('Location: 404.php');
}
$schedule = new ScheduleMap();
$day = $schedule->findDayById($idDay);
$header = 'Добавить расписание. День: '.$day->name. '.Преподаватель: '.$teacher->fio;
require_once 'template/header.php';
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-teacher-schedule.php">Расписание</a></li>
        <li><a href="list-schedule.php?id=<?=$idUser;?>">Расписание преподавателя</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<section class="box-body">
    <h3><?=$header;?></h3>
</section>
<div class="box-body">
<?php if (Helper::hasFlash()) :?>
<div class="alert alert-danger alert-dismissible">

<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

<h4><i class="icon fa fa-ban"></i> Ошибка!</h4>
<?= Helper::getFlash();?>
</div>
<?php endif;?>
<form action="save-schedule.php" method="POST">
    <div class="form-group">
        <label>Группа и предмет</label>
        <select class="form-control" name="lesson_plan_id">
            <?= Helper::printSelectOptions(0, (new LessonPlanMap())->arrPlanByTeacherId($idUser));?>
        </select>
    </div>
    <div class="form-group">
        <label>Пара</label>
        <select class="form-control" name="lesson_num_id">
            <?= Helper::printSelectOptions(0, $schedule->arrLessonNums());?>
        </select>
    </div>
    <div class="form-group">
        <label>Аудитория</label>
        <select class="form-control" name="classroom_id">
            <?= Helper::printSelectOptions(0, (new ClassroomMap())->arrClassrooms());?>
        </select>
    </div>
    <input type="hidden" name="day_id" value="<?=$idDay;?>" />
    <input type="hidden" name="user_id" value="<?=$idUser;?>" />
    <div class="form-group">
    <button type="submit" name="saveSchedule" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>