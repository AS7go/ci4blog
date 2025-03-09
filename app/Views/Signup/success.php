<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>You have successfully registered</h1>
    <!-- <h1>Вы успешно зарегистрированы</h1> -->
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Registration Information</h5>
            <p class="card-text">Congratulations! You have successfully registered on our website.</p>
            <p class="card-text">You can now log in to your account and start using all the features of the site.</p>
            <!-- <h5 class="card-title">Информация о регистрации</h5> -->
            <!-- <p class="card-text">Поздравляем! Вы успешно прошли регистрацию на нашем сайте.</p> -->
            <!-- <p class="card-text">Теперь вы можете войти в свою учетную запись и начать использовать все возможности сайта.</p> -->
        </div>
    </div>
    <div class="mt-4">
        <a href="<?= site_url(relativePath: "/login/login-form") ?>" class="btn btn-primary">Log In</a>
        <!-- <a href="<?= site_url(relativePath: "/login/login-form") ?>" class="btn btn-primary">Войти</a> -->
        <a href="<?= site_url(relativePath: "/") ?>" class="btn btn-secondary">Home</a>
        <!-- <a href="<?= site_url(relativePath: "/") ?>" class="btn btn-secondary">На главную</a> -->
    </div>
</div>

<?= $this->endSection() ?>