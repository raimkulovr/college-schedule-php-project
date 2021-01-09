<?php
    require_once 'secure.php';
    $id = 0;
    if (isset($_GET['id'])) {
        $id = Helper::clearInt($_GET['id']);
    }
    $gruppa = (new GruppaMap())->findById($id);
    $header = (($id)?'Редактировать':'Добавить').' группу';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-gruppa.php">Группы</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
    <form action="save-gruppa.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$gruppa->name;?>">
        </div>
        <div class="form-group">
            <label>Специальность</label>
            <select class="form-control" name="special_id">
                <?= Helper::printSelectOptions($gruppa->special_id, (new SpecialMap())->arrSpecials());?>
            </select>
        </div>
        <div class="form-group">
            <label>Дата образования</label>
            <input type="date" class="form-control" name="date_begin" required="required" value="<?=$gruppa->date_begin;?>">
        </div>

        <div class="form-group">
            <label>Дата окончания</label>
            <input type="date" class="form-control" name="date_end" required="required" value="<?=$gruppa->date_end;?>">
        </div>
        <div class="form-group">
            <button type="submit" name="saveGruppa" class="btn btn-primary">Сохранить</button>
        </div>
        
        <input type="hidden" name="gruppa_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
    require_once 'template/footer.php';
?>