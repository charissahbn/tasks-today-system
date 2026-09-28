<nav>
    <a href="/">Welcome</a> |
    <a href="/tasks">Task List</a> |
    <a href="/profile">Profile</a> |
    <a href="/about">About</a>
</nav>

<hr>

<h1><?= esc($title) ?></h1>

<?php if ($user): ?>
    <p>Username: <?= esc($user['username']) ?></p>
    <p>Full Name: <?= esc($user['full_name']) ?></p>
    <p>Email: <?= esc($user['email']) ?></p>
    <p>Created At: <?= esc($user['created_at']) ?></p>
<?php else: ?>
    <p>No user profile found.</p>
<?php endif; ?>