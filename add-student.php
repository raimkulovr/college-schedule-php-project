<?php
require_once 'secure.php';
if (!Helper::can('admin') && !Helper::can('manager')) {
    header('Location: 404.php');
    exit();
    }
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$student = (new StudentMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' студента';
require_once 'template/header.php';
?>

<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-student.php">Студенты</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
<form action="save-student.php" method="POST">
    <?php require_once '_formUser.php'; ?>
    
    <!-- роль -->
    <input type="hidden" name="role_id" value="4" >
    
    <div class="form-group">
    <label>Группа</label>
    <select class="form-control" name="gruppa_id">
        <?= Helper::printSelectOptions($student->gruppa_id, (new GruppaMap())->arrGruppa());?>
    </select>
    </div>
    <div class="form-group">
    <label>Номер зачетки</label>
        <input type="text" class="form-control" name="num_zach" value="<?=$student->zach;?>">
    </div>
    <div class="form-group">
        <label>Заблокировать</label>
        <div class="radio">
            <label>
                <input type="radio" name="active" value="1" <?=($user->active)?'checked':'';?>> Нет
            </label> &nbsp;
            <label>
                <input type="radio" name="active" value="0" <?=(!$user->active)?'checked':'';?>> Да
            </label>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" name="saveStudent" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>