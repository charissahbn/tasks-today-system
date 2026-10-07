<nav>
    <a href="/">Welcome</a> |
    <a href="/tasks">Task List</a> |
    <a href="/profile">Profile</a> |
    <a href="/about">About</a>
    |

<?php if (session()->get('isLoggedIn')): ?>
    <span>
        Logged in as <?= esc(session()->get('username')) ?>
    </span>

    <form
        action="<?= site_url('logout') ?>"
        method="post"
        style="display: inline;"
    >
        <?= csrf_field() ?>
        <button type="submit">Logout</button>
    </form>
<?php else: ?>
    <a href="<?= site_url('login') ?>">Login</a>
<?php endif; ?>
</nav>

<hr>

<h1><?= esc($title) ?></h1>

<?php if (session()->get('isLoggedIn')): ?>
    <p>
        <a href="<?= site_url('tasks/new') ?>">Add New Task</a>
    </p>
<?php else: ?>
    <p>
        <a href="<?= site_url('login') ?>">Log in to manage tasks</a>
    </p>
<?php endif; ?>

<?php if (empty($tasks)): ?>

    <p>No tasks available.</p>

<?php else: ?>

    <table>
        <thead>
            <tr>
               <th>Task</th>
               <th>Status</th>
               <th>Task Date</th>
               <?php if (session()->get('isLoggedIn')): ?>
    <th>Actions</th>
<?php endif; ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tasks as $task): ?>
              <tr>
                 <td><?= esc($task['title']) ?></td>
                 <td><?= esc($task['status']) ?></td>
                 <td><?= esc($task['task_date']) ?></td>
                 <?php if (session()->get('isLoggedIn')): ?>
    <td>
        <a href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">
            Edit
        </a>

        <form
            action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>"
            method="post"
            style="display: inline;"
            onsubmit="return confirm('Archive this task?');"
        >
            <?= csrf_field() ?>
            <button type="submit">Delete</button>
        </form>
    </td>
<?php endif; ?>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>