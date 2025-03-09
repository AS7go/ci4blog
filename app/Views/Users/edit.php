<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="mb-4 text-center">Edit User</h1>
            <!-- <h1 class="mb-4 text-center">Редактирование пользователя</h1> -->

            <?php if(session()->has('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>

            <?= form_open('/users/update/' . $user->id, ['class'=>'row-3']) ?>
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <!-- <label for="name" class="form-label">Имя</label> -->
                        <input type="text" name="name" id="name" class="form-control" value="<?= old('name', $user->name) ?>">
                    </div>

                    <!-- <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= old('email', $user->email) ?>" readonly>
                    </div> -->

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <p class="form-control form-control-plaintext" readonly style="padding-left: 1em;"><?= $user->email ?></p>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <!-- <label for="status" class="form-label">Статус</label> -->
                        <div class="input-group">
                            <select name="status" class="form-control" id="status" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\' fill=\'%23212529\'%3E%3Cpath fill-rule=\'evenodd\' d=\'M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z\'/%3E%3C/svg%3E'); background-repeat: no-repeat; background-position: right 0.75rem center; background-size: 16px 12px; padding-right: 2.5rem;">
                                <option value="new" <?= ($user->status === 'new') ? 'selected' : '' ?>>New</option>
                                <option value="admin" <?= ($user->status === 'admin') ? 'selected' : '' ?>>Admin</option>
                                <option value="user" <?= ($user->status === 'user') ? 'selected' : '' ?>>User</option>

                                <!-- <option value="new" <?= ($user->status === 'new') ? 'selected' : '' ?>>Новый</option>
                                <option value="admin" <?= ($user->status === 'admin') ? 'selected' : '' ?>>Админ</option>
                                <option value="user" <?= ($user->status === 'user') ? 'selected' : '' ?>>Пользователь</option> -->
                            </select>
                        </div>
                    </div>



                </div>
            </div>

            <div class="d-flex justify-content-start">
                <button type="submit" class="btn btn-primary me-2">Edit</button>
                <!-- <button type="submit" class="btn btn-primary me-2">Редактировать</button> -->
                <a href="<?= site_url("/users") ?>" class="btn btn-secondary">Cancel</a>
                <!-- <a href="<?= site_url("/users") ?>" class="btn btn-secondary">Отмена</a> -->
            </div>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>