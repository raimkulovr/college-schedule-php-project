<?php
require_once 'secure.php';
$size = 10;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$specialMap = new SpecialMap();
$count = $specialMap->count();
$specials = $specialMap->findAll($page*$size-$size, $size);
$header = 'Список специальностей';
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
            <a class="btn btn-success" href="add-special.php">Добавить специальность</a>
        </div>
        <div class="box-body">
        <?php
        if ($specials) {
        ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                <th>Название</th>
                <th>Отделение</th>
                
                </tr>
            </thead>

            <tbody>
            <?php
            foreach ($specials as $special) {
                echo '<tr>';
                echo '<td><a href="view-special.php?id='.$special->special_id.'">'.$special->name.'</a> '. '<a href="add-special.php?id='.$special->special_id.'"><i class="fa fa-pencil"></i></a></td>';
                echo '<td>'.$special->otdel.'</td>';
                
                echo '</tr>';
            }
            ?>
            </tbody>
            </table>
        <?php } else {
        echo 'Ни одной группы не найдено';
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