<?php
$userMap = new UserMap();
$user = $userMap->findById($id);
?>
<div class="form-group">
<label>Фамилия</label>
    <input type="text" class="form-control" name="lastname" required="required" value="<?=$user->lastname;?>">
</div>
<div class="form-group">
    <label>Имя</label>
    <input type="text" class="form-control" name="firstname" required="required" value="<?=$user->firstname;?>">
</div>
<div class="form-group">
    <label>Отчество</label>
    <input type="text" class="form-control" name="patronymic" value="<?=$user->patronymic;?>">
</div>
<div class="form-group">
    <label>Пол</label>
    <select class="form-control" name="gender_id">
    <?=Helper::printSelectOptions($user->gender_id, $userMap->arrGenders());?>
    </select>
</div>
<div class="form-group">
    <label>Дата рождения</label>
    <input type="date" class="form-control" name="birthday" value="<?=$user->birthday;?>">
</div>
<div class="form-group">
    <label>Логин</label>
    <input type="text" class="form-control" name="login" required="required" value="<?=$user->login;?>">
</div>
<div class="form-group">
    <label>Пароль</label>
    <input type="password" class="form-control" name="password" required="required">
</div>
<input type="hidden" name="user_id" value="<?=$id;?>"/>