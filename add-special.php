<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $special = (new SpecialMap())->findById($id);
    $header = (($id)?'Редактировать':'Добавить').' специальность';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-special.php">Список специальностей</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
    <form action="save-special.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$special->name;?>">
        </div>
        <div class="form-group">
            <label>Отдел</label>
            <select class="form-control" name="otdel_id">
                <?= Helper::printSelectOptions($special->otdel_id, (new OtdelMap())->arrOtdels());?>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" name="saveSpecial" class="btn btn-primary">Сохранить</button>
        </div>
        
        <input type="hidden" name="special_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
    require_once 'template/footer.php';
?>