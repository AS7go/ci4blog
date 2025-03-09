<?= $this->extend("layouts/default") ?>

<?= $this->section("content") ?>

<div class="container">
    <h1 class="mb-4"><?= esc($title) ?></h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= esc($user->name) ?></td>
                    <td><?= esc($user->email) ?></td>
                    <td><?= esc($user->status) ?></td>
                    <td><?= esc($user->created_at) ?></td>

                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-start">
            <a href="<?= site_url("/users") ?>" class="btn btn-secondary">Back</a>
        </div>
</div>

<?= $this->endSection() ?>
