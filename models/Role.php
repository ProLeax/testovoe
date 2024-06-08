<?php
require_once 'Database.php';
class Role {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM roles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM roles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO roles (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
        return $this->db->lastInsertId();
    }
    public function update($id, $name) {
        $stmt = $this->db->prepare("UPDATE roles SET name = :name WHERE id = :id");
        return $stmt->execute(['name' => $name, 'id' => $id]);
    }
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM roles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}