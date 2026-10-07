<h1><?= esc($title) ?></h1>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<?php if (isset($validation)): ?>
    <div style="color: red;">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('login') ?>" method="post">
    <?= csrf_field() ?>

    <div>
    <label for="username">Username</label>
    <input
        type="text"
        id="username"
        name="username"
        value="<?= esc(old('username')) ?>"
        autocomplete="username"
    >
</div>

<br>

<div>
    <label for="password">Password</label>
    <input
        type="password"
        id="password"
        name="password"
        autocomplete="current-password"
    >
</div>

<br>

    <button type="submit">Login</button>
</form>

<p>
    <a href="<?= site_url('/') ?>">Back to Welcome Page</a>
</p>