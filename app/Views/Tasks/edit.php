<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?><?= esc($task->title) ?><?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title mb-4">Task Edit <?= $task->id ?></h1>

                    <?php if (session()->getFlashdata('warning')): ?>
                        <div class="alert alert-warning"><?= session()->getFlashdata('warning') ?></div>
                    <?php endif ?>

                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php if (is_array(session()->getFlashdata('errors'))): ?>
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php else: ?>
                                <?= esc(session()->getFlashdata('errors')) ?>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <?= form_open('tasks/update/' . $task->id) ?>
                        <?= csrf_field() ?> 

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required value="<?= old('title', isset($task->title) ? $task->title : '') ?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" required><?= old('description', isset($task->description) ? $task->description : '') ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="created_at" class="form-label">Created At</label>
                            <input type="datetime-local" name="created_at" id="created_at" class="form-control" required value="<?= $task->created_at ?>">
                        </div>

                        <div class="d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary me-2">Save</button>
                            <a href="<?= site_url("/tasks") ?>" class="btn btn-secondary">Cancel</a>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>