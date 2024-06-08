<?php
require_once 'models/Role.php';
require_once 'models/UserRole.php';

class RoleController {
    private $role;
    private $userRole;

    public function __construct() {
        $this->role = new Role();
        $this->userRole = new UserRole();
    }

    public function index() {
        $roles = $this->role->getAll();
        include 'views/role_list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->role->create($_POST['name']);
            header('Location: role.php');
        } else {
            include 'views/role_form.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->role->update($id, $_POST['name']);
            header('Location: role.php');
        } else {
            $role = $this->role->getById($id);
            include 'views/role_form.php';
        }
    }

    public function delete($id) {
        $this->userRole->removeRoleByRoleId($id);
        $this->role->delete($id);
        header('Location: role.php');
    }
}