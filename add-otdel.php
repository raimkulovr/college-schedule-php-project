<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $otdel = (new OtdelMap())->findById($id);
    $header = (($id)?'Редактировать':'Добавить').' отдел';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-otdel.php">Список отделений</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
    <form action="save-otdel.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$otdel->name;?>">
        </div>
        
        
        <div class="form-group">
            <button type="submit" name="saveOtdel" class="btn btn-primary">Сохранить</button>
        </div>
        
        <input type="hidden" name="otdel_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
    require_once 'template/footer.php';
?>