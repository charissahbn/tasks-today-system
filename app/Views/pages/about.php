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

<p>Tasks for Today Management System</p>
<p>Developed by: Charissa Haban</p>
<p>This system helps users view today's tasks, browse the complete task list, and access a demo user profile.</p>