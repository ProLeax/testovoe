<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($username, $email) {
        $stmt = $this->db->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
        $stmt->execute(['username' => $username, 'email' => $email]);
        return $this->db->lastInsertId();
    }

    public function update($id, $username, $email) {
        $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email WHERE id = :id");
        return $stmt->execute(['username' => $username, 'email' => $email, 'id' => $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
