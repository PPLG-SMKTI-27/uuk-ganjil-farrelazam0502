<?php
// File: index.php

session_start();

// Define base path
define('BASE_PATH', __DIR__);

// Load config
require_once 'config/config.php';
require_once 'config/database.php';

// Auto load classes
spl_autoload_register(function($class) {
    if (file_exists('App/Models/' . $class . '.php')) {
        require_once 'App/Models/' . $class . '.php';
    } else if (file_exists('App/Controller/' . $class . '.php')) {
        require_once 'App/Controller/' . $class . '.php';
    }
});

// SIMPLE ROUTING WITH SWITCH CASE
$page = $_GET['page'] ?? 'login';

switch($page) {
    case 'login':
        require_once 'App/Controller/AuthController.php';
        $controller = new AuthController();
        $controller->login();
        break;
        
    case 'register':
        require_once 'App/Controller/AuthController.php';
        $controller = new AuthController();
        $controller->register();
        break;
        
    case 'logout':
        require_once 'App/Controller/AuthController.php';
        $controller = new AuthController();
        $controller->logout();
        break;
        
    case 'dashboard':
        require_once 'App/Controller/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;
        
    case 'guest':
        require_once 'App/Controller/GuestController.php';
        $controller = new GuestController();
        $controller->index();
        break;
        
    case 'guest_create':
        require_once 'App/Controller/GuestController.php';
        $controller = new GuestController();
        $controller->create();
        break;
        
    case 'guest_edit':
        $id = $_GET['id'] ?? 0;
        require_once 'App/Controller/GuestController.php';
        $controller = new GuestController();
        $controller->edit($id);
        break;
        
    case 'guest_show':
        $id = $_GET['id'] ?? 0;
        require_once 'App/Controller/GuestController.php';
        $controller = new GuestController();
        $controller->show($id);
        break;
        
    case 'guest_delete':
        $id = $_GET['id'] ?? 0;
        require_once 'App/Controller/GuestController.php';
        $controller = new GuestController();
        $controller->delete($id);
        break;
        
    default:
        // Default ke login
        require_once 'App/Controller/AuthController.php';
        $controller = new AuthController();
        $controller->login();
}
?>