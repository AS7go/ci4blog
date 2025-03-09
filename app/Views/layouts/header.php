<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Меню</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> -->
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <!-- <a class="nav-link" href="http://localhost/">Home</a> -->
          <a class="nav-link" href="/">Home</a>
        </li>     
        <li class="nav-item">
          <!-- <a class="nav-link" href="http://localhost/tasks">Tasks</a> -->
          <a class="nav-link" href="/tasks">Tasks</a>
        </li>       
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("/tasks/new") ?>">Add Task</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url("/users") ?>">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>

    <!-- Блок с данными авторизированного пользователя и меню Выйти -->
    <div class="navbar-collapse collapse">
      <ul class="navbar-nav ms-auto">
        <?php if (session()->has('user_id')): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= session('user_name') ?> | <?= session('user_email') ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <!-- <li><a class="dropdown-item" href="#">Настройки</a></li> -->
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?= site_url("/logout")?>">Logout</a></li>
              <!-- <li><a class="dropdown-item" href="<?= site_url("/logout")?>">Выйти</a></li> -->
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
     <!-- Конец Блока с данными авторизированного пользователя и меню Выйти -->

  </div>
</nav>