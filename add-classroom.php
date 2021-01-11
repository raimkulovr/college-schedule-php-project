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
    $classroom = (new ClassroomMap())->findById($id);
    $header = (($id)?'Редактировать':'Добавить').' аудиторию';
    require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-classroom.php">Список аудиторий</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
    <form action="save-classroom.php" method="POST">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" name="name" required="required" value="<?=$classroom->name;?>">
        </div>
        
        
        <div class="form-group">
            <button type="submit" name="saveclassroom" class="btn btn-primary">Сохранить</button>
        </div>
        
        <input type="hidden" name="classroom_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
    require_once 'template/footer.php';
?>