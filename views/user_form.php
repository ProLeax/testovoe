<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Form</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>User Form</h1>
    </header>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?= isset($user['username']) ? $user['username'] : '' ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= isset($user['email']) ? $user['email'] : '' ?>">
        <br>
        <label for="roles">Roles:</label>
        <br>
        <?php foreach ($roles as $role): ?>
            <label>
                <input type="checkbox" name="roles[]" value="<?= $role['id'] ?>" <?= isset($userRoles) && in_array($role['id'], $userRoles) ? 'checked' : '' ?>>
                <?= $role['name'] ?>
            </label><br>
        <?php endforeach; ?>
        <br>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>
