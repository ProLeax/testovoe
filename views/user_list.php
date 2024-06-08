<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>User List</h1>
        <nav>
            <ul>
                <li><a href="/user.php?action=create">Add User</a></li>
                <li><a href="/role.php?action=create">Add Role</a></li>
                <li><a href="/index.php">Menu list</a></li>
            </ul>
        </nav>
    </header>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?= $user['username'] ?> (<?= $user['email'] ?>)
                <a href="/user.php?action=edit&id=<?= $user['id'] ?>">Edit</a>
                <a href="/user.php?action=delete&id=<?= $user['id'] ?>">Delete</a>
                <ul>
                    <?php
                    $userRoles = $this->userRole->getUserRoles($user['id']);
                    foreach ($userRoles as $role): ?>
                        <li><?= $role['name'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>

</html>
