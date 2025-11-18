<?php
// File: App/Models/User.php
class User {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function findByUsername($username) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->single();
    }
    
    public function login($username, $password) {
        $user = $this->findByUsername($username);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }
    
    public function register($data) {
        $this->db->query("INSERT INTO users (username, password, nama_lengkap, role) 
                         VALUES (:username, :password, :nama_lengkap, :role)");
        
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':nama_lengkap', $data['nama_lengkap']);
        $this->db->bind(':role', $data['role']);
        
        return $this->db->execute();
    }
    
    public function getAll() {
        $this->db->query("SELECT * FROM users ORDER BY created_at DESC");
        return $this->db->resultSet();
    }
}
?>