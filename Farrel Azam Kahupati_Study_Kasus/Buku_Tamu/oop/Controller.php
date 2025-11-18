<?php
namespace oop;

class Controller {
    protected function model($model) {
        $model = 'App\\Models\\' . $model;
        return new $model($this->getDB());
    }

    protected function view($view, $data = []) {
        // Mengubah titik menjadi slash agar sesuai folder
        $view = str_replace('.', '/', $view);
        require_once __DIR__ . '/../App/Views/' . $view . '.php';
    }

    // Ini contoh akses ke database, bisa disesuaikan
    protected function getDB() {
        static $db = null;
        if ($db === null) {
            $config = require __DIR__ . '/../config/Database.php';
            try {
                $db = new \PDO($config['dsn'], $config['username'], $config['password']);
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Koneksi database gagal: " . $e->getMessage());
            }
        }
        return $db;
    }
}
