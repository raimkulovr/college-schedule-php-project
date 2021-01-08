<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
      <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>

      <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>

      </li>
      <li class="header">Пользователи</li>

      <li <?=($_SERVER['PHP_SELF']=='/list-teacher.php')?'class="active"':'';?>>

        <a href="list-teacher.php"><i class="fa fa-users"></i><span>Преподаватели</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-student.php')?'class="active"':'';?>>

        <a href="list-student.php"><i class="fa fa-users"></i><span>Студенты</span></a>
      </li>
    </ul>
  </section>
</aside>