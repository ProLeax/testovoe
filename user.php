<?php
require 'controllers/UserController.php';
$userController = new UserController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action == 'create') {
    $userController->create();
} elseif ($action == 'edit' && $id) {
    $userController->edit($id);
} elseif ($action == 'delete' && $id) {
    $userController->delete($id);
} else {
    $userController->index();
}
