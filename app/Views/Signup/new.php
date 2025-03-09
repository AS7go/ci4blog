<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4 text-center">New User Registration</h1>
            <!-- <h1 class="mb-4 text-center">Регистрация пользователя</h1> -->

            <?php if(session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>

            <?= form_open('/signup/store') ?>
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <!-- <label for="name" class="form-label">Имя</label> -->
                        <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <!-- <label for="password" class="form-label">Пароль</label> -->
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <!-- <label for="password_confirmation" class="form-label">Повторите пароль</label> -->
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2">Register</button>
                <!-- <button type="submit" class="btn btn-primary me-2">Зарегистрировать</button> -->
                <a href="<?= site_url("/") ?>" class="btn btn-secondary">Cancel</a>
                <!-- <a href="<?= site_url("/") ?>" class="btn btn-secondary">Отмена</a> -->
            </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>