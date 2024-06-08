<?php
require 'controllers/RoleController.php';
$roleController = new RoleController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action == 'create') {
    $roleController->create();
} elseif ($action == 'edit' && $id) {
    $roleController->edit($id);
} elseif ($action == 'delete' && $id) {
    $roleController->delete($id);
} else {
    $roleController->index();
}
