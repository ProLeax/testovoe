<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Role Form</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Role Form</h1>
    </header>
    <form method="post">
        <label for="name">Role Name:</label>
        <input type="text" name="name" id="name" value="<?= isset($role['name']) ? $role['name'] : '' ?>">
        <br>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>
