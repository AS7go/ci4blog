<?= $this->extend('layouts/default') ?>

<?= $this->section("title") ?>Home page title<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-info">
        <p><?= session('success') ?></p>
    </div>
<?php endif ?>


<div class="container mt-5">
    <div class="row justify-content-left">
        <div class="col-md-8">
            <div class="card-body text-left">
                <h1 class="card-title mb-4">Home page</h1>
                    <hr class="mb-4">
                    <a href="<?= site_url('/signup/new') ?>" class="btn btn-outline-success">Sign Up</a>
                    <!-- <a href="<?= site_url('/signup/new') ?>" class="btn btn-outline-success">Регистрация</a> -->
                    <a href="<?= site_url('/login/login-form') ?>" class="btn btn-outline-primary">Login</a>
                    <!-- <a href="<?= site_url('/login/login-form') ?>" class="btn btn-outline-primary">Авторизация</a> -->
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<!-- <?= $this->section('footer') ?> -->
<?= $this->endSection() ?>