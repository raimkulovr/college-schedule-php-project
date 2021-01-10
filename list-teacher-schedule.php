<?php
require_once 'secure.php';
$header = 'Расписание и планы преподавателей';
require_once 'template/header.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$count = (new TeacherMap())->count();
$teachers = (new LessonPlanMap())->findTeachers($page*$size-$size, $size);
?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
<h1><?=$header;?></h1>
<ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
    <li class="active"><?=$header;?></li>
</ol>
</section>
<?php if ($teachers) : ?>
<div class="box-body">

<table class="table table-bordered table-hover">
<thead>
    <tr>
    <th>Ф.И.О. преподавателя</th>
    <th>Отделение</th>
    <th>Количество пунктов в плане</th>
    <th>Общее количество часов</th>
    <th></th>
    </tr>
</thead>
<tbody>
    <?php foreach ($teachers as $teacher) : ?>
    <tr>
    <td><?=$teacher->fio;?></td>
    <td><?=$teacher->otdel;?></td>
    <td><?=$teacher->count_plan;?></td>
    <td><?=($teacher->sum_hours)?
    $teacher->sum_hours : 0;?></td>
    <td>
        <a href="list-plan.php?id=<?=$teacher->user_id;?>" title="План преподавателя"><i class="fa fa-table"></i></a>&nbsp;
        <a href="list-schedule.php?id=<?=$teacher->user_id;?>" title="Расписание преподавателя"><i class="fa fa-calendar-plus-o"></i></a>
    </td>
    </tr>
    <?php endforeach;?>
</tbody>

</table>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page, $size); ?>
</div>
<?php else: ?>
<div class="box-body">
<p>Преподаватели не найдены</p>
</div>
<?php endif; ?>
</div>
</div>
</div>
<?php require_once 'template/footer.php'; ?>