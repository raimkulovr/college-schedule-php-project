<?php
$user = (new UserMap())->findProfileById($id);
if ($user) {
?>
<tr>
    <th>Ф.И.О.</th>
    <td><?=$user->fio;?></td>
</tr>
<tr>
    <th>Пол</th>
    <td><?=$user->gender;?></td>
</tr>
<tr>
    <th>Дата рождения</th>
    <td><?=date("d.m.Y", strtotime($user->birthday));?></td>
</tr>
<tr>
    <th>Логин</th>
    <td><?=$user->login;?></td>
</tr>
<tr>
    <th>Роль</th>
    <td><?=$user->role;?></td>
</tr>
<?php } ?>
