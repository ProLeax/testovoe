<?php
require_once 'models/User.php';
require_once 'models/Role.php';
require_once 'models/UserRole.php';

class UserController {
    private $user;
    private $userRole;
    public function __construct() {
        $this->user = new User();
        $this->userRole = new UserRole();
    }
    public function index() {
        $users = $this->user->getAll();
        include 'views/user_list.php';
    }
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $this->user->create($_POST['username'], $_POST['email']);
            if (isset($_POST['roles'])) {
                foreach ($_POST['roles'] as $roleId) {
                    $this->userRole->assignRole($userId, $roleId);
                }
            }
            header('Location: user.php');
        } else {
            $roles = $this->userRole->getAllRoles();
            include 'views/user_form.php';
        }
    }
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->user->update($id, $_POST['username'], $_POST['email']);
            $this->userRole->removeAllRoles($id);
            if (isset($_POST['roles'])) {
                foreach ($_POST['roles'] as $roleId) {
                    $this->userRole->assignRole($id, $roleId);
                }
            }
            header('Location: user.php');
        } else {
            $user = $this->user->getById($id);
            $roles = $this->userRole->getAllRoles();
            $userRoles = array_column($this->userRole->getUserRoles($id), 'id');
            include 'views/user_form.php';
        }
    }
    public function delete($id) {
        $this->user->delete($id);
        header('Location: user.php');
    }
}

