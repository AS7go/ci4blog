<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container">
    <h1 class="mb-4"><?= esc($title) ?></h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <?php if (!empty($users)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><a href="<?= site_url("/users/" . $user->id) ?>"><?= esc($user->name) ?></a></td>
                    <td><?= esc($user->email) ?></td>
                    <td><?= esc($user->status) ?></td>
                    <td><?= esc($user->created_at) ?></td>
                    <td>
                        <a href="<?= site_url("/users/edit/" . $user->id) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                       
                        <form action="<?= site_url('users/delete/' . $user->id) ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            <!-- <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Delete</button> -->
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No users found</p>
        <!-- <p class="text-muted">Нет пользователей</p> -->
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
