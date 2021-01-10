<?php
require_once 'secure.php';
$id = Helper::clearInt($_GET['id']);
if ((new TeacherMap())->findById($id)) {
    $teacher = (new UserMap())->findProfileById($id);
} else {
    header('Location: 404.php');
}
$header = 'План преподавателя: '.$teacher->fio;
$plans = (new LessonPlanMap())->findByTeacherId($id);
$i = 1;
require_once 'template/header.php';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
    <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

    <li><a href="list-teacher-schedule.php">Расписание</a></li>

    <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <a class="btn btn-success" href="add-plan.php?id=<?=$id;?>">Добавить пункт плана</a>
</div>
<?php if (Helper::hasFlash()) :?>

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i>Ошибка!</h4>
    <?= Helper::getFlash();?>
</div>

<?php endif;?>
<div class="box-body">
    <?php if ($plans) : ?>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
            <th>No</th>
            <th>Группа</th>
            <th>Предмет</th>
            <th>Количество часов</th>
            <th></th>
            </tr>
            </thead>
        <tbody>
            <?php foreach ($plans as $plan) :
            ?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$plan->gruppa;?></td>
                <td><?=$plan->subject;?></td>
                <td><?=$plan->hours;?></td>
                <td><a href="delete-plan.php?id=<?=$plan->lesson_plan_id;?>&idplan=<?=$id;?>"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php $i++; endforeach;?>
        </tbody>
    </table>
    <?php else: ?>
    <p>План отутствует</p>
    <?php endif; ?>
</div>
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>