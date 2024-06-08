<?php
require_once 'Database.php';

class UserRole {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function assignRole($userId, $roleId) {
        $stmt = $this->db->prepare("INSERT INTO user_roles (user_id, role_id) VALUES (:user_id, :role_id)");
        return $stmt->execute(['user_id' => $userId, 'role_id' => $roleId]);
    }
    public function removeRole($userId, $roleId) {
        $stmt = $this->db->prepare("DELETE FROM user_roles WHERE user_id = :user_id AND role_id = :role_id");
        return $stmt->execute(['user_id' => $userId, 'role_id' => $roleId]);
    }
    public function removeAllRoles($userId) {
        $stmt = $this->db->prepare("DELETE FROM user_roles WHERE user_id = :user_id");
        return $stmt->execute(['user_id' => $userId]);
    }
    public function removeRoleByRoleId($roleId) {
        $stmt = $this->db->prepare("DELETE FROM user_roles WHERE role_id = :role_id");
        return $stmt->execute(['role_id' => $roleId]);
    }
    public function getUserRoles($userId) {
        $stmt = $this->db->prepare("SELECT r.id, r.name FROM roles r JOIN user_roles ur ON r.id = ur.role_id WHERE ur.user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllRoles() {
        $stmt = $this->db->query("SELECT * FROM roles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}