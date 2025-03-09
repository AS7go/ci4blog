<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?><?= esc($task->title) ?><?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title mb-4">Task Details</h1>

                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" value="<?= $task->id ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" value="<?= esc($task->title) ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" readonly><?= esc($task->description) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Created At</label>
                        <input type="text" class="form-control" value="<?= esc($task->created_at) ?>" readonly>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-start">
                        <a href="<?= site_url("/tasks/edit/".$task->id) ?>" class="btn btn-primary me-2">
                            Edit
                        </a>

                        <form action="<?= site_url('/tasks/delete/' . $task->id) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">
                        <!-- <form action="<?= site_url('/tasks/delete/' . $task->id) ?>" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');"> -->
                            <?= csrf_field() ?>
                            
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <!-- <button type="submit" class="btn btn-danger">Удалить</button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>