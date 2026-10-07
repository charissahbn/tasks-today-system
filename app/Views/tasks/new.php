<h1><?= esc($title) ?></h1>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('tasks') ?>" method="post">
    <?= csrf_field() ?>

    <div>
    <label for="title">Task Title</label>
    <input
        type="text"
        id="title"
        name="title"
        value="<?= esc(old('title')) ?>"
    >
</div>

<br>

<div>
    <label for="status">Status</label>
    <select id="status" name="status">
        <option value="pending" <?= old('status', 'pending') === 'pending' ? 'selected' : '' ?>>
            Pending
        </option>
        <option value="completed" <?= old('status') === 'completed' ? 'selected' : '' ?>>
            Completed
        </option>
    </select>
</div>

<br>

<div>
    <label for="task_date">Task Date</label>
    <input
        type="date"
        id="task_date"
        name="task_date"
        value="<?= esc(old('task_date')) ?>"
    >
</div>

<br>

    <button type="submit">Save Task</button>
</form>

<p>
    <a href="<?= site_url('tasks') ?>">Back to Task List</a>
</p>