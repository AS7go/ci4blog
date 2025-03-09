<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Task List<?= $this->endSection() ?>
<!-- <?= $this->section("title") ?>Список задач<?= $this->endSection() ?> -->

<?= $this->section("content") ?>

<div class="container">
    <h1 class="mb-4">Task List</h1>
    <!-- <h1 class="mb-4">Список задач</h1> -->

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif ?>

    <?php if (!empty($tasks)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <!-- <th>Название</th>
                    <th>Описание</th>
                    <th>Дата создания</th>
                    <th>Действия</th> -->
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task->id ?></td>
                    <td><a href="<?= site_url("/tasks/" . $task->id) ?>"><?= esc($task->title) ?></a></td>
                    <td><?= esc($task->description) ?></td>
                    <td><?= esc($task->created_at) ?></td>
                    <td>
                        <a href="<?= site_url("/tasks/edit/" . $task->id) ?>" class="btn btn-outline-primary btn-sm">Edit</a>
                        <!-- <a href="<?= site_url("/tasks/edit/" . $task->id) ?>" class="btn btn-outline-primary btn-sm">Редактировать</a> -->

                        <form action="<?= site_url('/tasks/delete/' . $task->id) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        <!-- <form action="<?= site_url('/tasks/delete/' . $task->id) ?>" method="post" class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');"> -->
                            <?= csrf_field() ?>    
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            <!-- <button type="submit" class="btn btn-outline-danger btn-sm">Удалить</button> -->
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">No tasks found.</p>
        <!-- <p class="text-muted">Задачи отсутствуют.</p> -->
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
