<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
$size = 10;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$subjectMap = new SubjectMap();
$count = $subjectMap->count();
$subjects = $subjectMap->findAll($page*$size-$size, $size);
$header = 'Список предметов';
require_once 'template/header.php';
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

        <div class="box-body">
            <a class="btn btn-success" href="add-subject.php">Добавить предмет</a>
        </div>
        <div class="box-body">
        <?php
        if ($subjects) {
        ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                <th>Название</th>
                <th>Часы</th>
                <th>Отделение</th>
                
                </tr>
            </thead>

            <tbody>
            <?php
            foreach ($subjects as $subject) {
                echo '<tr>';
                echo '<td><a href="view-subject.php?id='.$subject->subject_id.'">'.$subject->name.'</a> '. '<a href="add-subject.php?id='.$subject->subject_id.'"><i class="fa fa-pencil"></i></a></td>';
                echo '<td>'.$subject->hours.'</td>';
                echo '<td>'.$subject->otdel.'</td>';
                
                echo '</tr>';
            }
            ?>
            </tbody>
            </table>
        <?php } else {
        echo 'Ни одного предмета не найдено';
        } ?>
        </div>
        <div class="box-body">
        <?php Helper::paginator($count, $page, $size); ?>
        </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>