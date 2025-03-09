<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">User Login</h1>
            <!-- <h1 class="mb-4 text-center">Авторизация пользователя</h1> -->

            <?php if(session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>

            <?= form_open('/login/store') ?>
            <?= csrf_field() ?>
            <div class="d-flex flex-column gap-3">
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                </div>

                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>

            <div class="d-flex gap-2 mt-3">
                <button type="submit" class="btn btn-primary">Login</button>
                <!-- <button type="submit" class="btn btn-primary">Войти</button> -->
                <a href="<?= site_url("/") ?>" class="btn btn-secondary">Cancel</a>
                <!-- <a href="<?= site_url("/") ?>" class="btn btn-secondary">Отмена</a> -->
            </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
