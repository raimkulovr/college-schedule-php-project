<?php
require_once 'secure.php';
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $gruppa = (new GruppaMap())->findViewById($id);
    $header = 'Просмотр группы';
    require_once 'template/header.php';
    ?>
    <div class="row">
    <div class="col-xs-12">
    <div class="box">
    <section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-gruppa.php">Группы</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
    </section>
        <div class="box-body">

        <a class="btn btn-success" href="add-gruppa.php?id=<?=$id;?>">Изменить</a>

        </div>
        <div class="box-body">

            <table class="table table-bordered table-hover">
                <tr>
                    <th>Название</th>
                    <td><?=$gruppa->name;?></td>
                </tr>
                <tr>
                    <th>Специальность</th>
                    <td><?=$gruppa->special;?></td>
                </tr>
                <tr>
                    <th>Дата образования</th>
                    <td><?=date("d.m.Y", strtotime($gruppa->date_begin));?></td>
                </tr>

                <tr>
                    <th>Дата окончания</th>
                    <td><?=date("d.m.Y", strtotime($gruppa->date_end));?></td>
                </tr>       
            </table>
        </div>
    </div>
    </div>
    </div>
<?php
}
require_once 'template/footer.php';
?>
