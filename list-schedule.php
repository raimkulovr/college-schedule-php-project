<?php
require_once 'secure.php';
$id = Helper::clearInt($_GET['id']);
if ((new TeacherMap())->findById($id)->validate()) {
    $teacher = (new UserMap())->findProfileById($id);
} else {
    header('Location: 404.php');
}
$header = 'Расписание преподавателя: '.$teacher->fio;
$daysSchedules = (new ScheduleMap())->findByTeacherId($id);
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li><a href="list-teacher-schedule.php">Расписание</a></li>
    <li class="active"><?=$header;?></li>
</ol>
</section>
<section class="box-body">
<h3><?=$header;?></h3>
</section>
<div class="box-body">
<?php if ($daysSchedules) : ?>
<table class="table table-bordered table-hover">
    <?php foreach ($daysSchedules as $day) : ?>
    <tr>
        <th colspan="4">
        <h4 class="center-block">
        <?=$day['name'];?>
        <a href="add-schedule.php?idUser=<?=$id;?>&idDay=<?=$day['id'];?>"><i class="fa fa-plus"></i></a>
        </h4>
        </th>
    </tr>

    <?php if ($day['gruppa']) : ?>
    <?php foreach ($day['gruppa'] as $gruppa) : ?>
    <tr>
        <th colspan="4"><?=$gruppa['name'];?></th>
    </tr>

    <?php foreach ($gruppa['schedule'] as $schedule ) : ?>
    <tr>
        <td><?=$schedule['lesson_num'];?></td>
        <td><?=$schedule['subject'];?></td>
        <td><?=$schedule['classroom'];?></td>
        <td><a href="delete-schedule.php?id=<?=$schedule['schedule_id'];?>&idTeacher=<?=$id;?>"><i class="fa fa-trash"></i></a></td>
    </tr>

    <?php endforeach;?>
    <?php endforeach;?>

    <?php else: ?>
    <tr>

    <td colspan="4">Отутствует расписание на этот день</td>
    </tr>
    <?php endif; ?>
    <?php endforeach;?>
</table>
<?php else: ?>
<p>Расписание отутствует</p>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>