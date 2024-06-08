<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Role List</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Role List</h1>
        <nav>
            <ul>
                <li><a href="/role.php?action=create">Add Role</a></li>
                <li><a href="/user.php?action=create">Add User</a></li>
                <li><a href="/index.php">Menu list</a></li>
            </ul>
        </nav>
    </header>
    <ul>
        <?php foreach ($roles as $role): ?>
            <li>
                <?= $role['name'] ?>
                <a href="/role.php?action=edit&id=<?= $role['id'] ?>">Edit</a>
                <a href="/role.php?action=delete&id=<?= $role['id'] ?>" onclick="return confirm('Are you sure you want to delete this role?');">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>
