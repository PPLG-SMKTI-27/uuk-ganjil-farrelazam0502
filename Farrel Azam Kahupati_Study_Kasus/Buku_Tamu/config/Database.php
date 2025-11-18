<?php
// File: config/database.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'buku_tamu_db');

// Buat database secara otomatis
try {
    $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    $pdo->exec("USE " . DB_NAME);
    
    // Create tables
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        nama_lengkap VARCHAR(100) NOT NULL,
        role ENUM('admin','staff') DEFAULT 'staff',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS guests (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nama VARCHAR(100) NOT NULL,
        email VARCHAR(100),
        telepon VARCHAR(20),
        instansi VARCHAR(100),
        tujuan ENUM('pertemuan','pendaftaran','penelitian','sosialisasi','lainnya') NOT NULL,
        bertemu_dengan VARCHAR(100),
        tanggal_berkunjung DATE NOT NULL,
        waktu_masuk TIME NOT NULL,
        waktu_keluar TIME,
        catatan TEXT,
        dibuat_oleh INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (dibuat_oleh) REFERENCES users(id)
    )");
    
    // Insert default admin user if not exists
    $stmt = $pdo->query("SELECT COUNT(*) FROM users");
    if ($stmt->fetchColumn() == 0) {
        $password = password_hash('admin123', PASSWORD_DEFAULT);
        $pdo->exec("INSERT INTO users (username, password, nama_lengkap, role) 
                   VALUES ('admin', '$password', 'Administrator', 'admin')");
    }
    
} catch(PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>