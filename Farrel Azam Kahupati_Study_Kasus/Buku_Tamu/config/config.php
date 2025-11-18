<?php
// File: config/config.php

// Base URL
define('BASEURL', 'http://localhost/Buku_Tamu');
define('SITENAME', 'Buku Tamu Digital');

// Helper functions
function redirect($url) {
    header("Location: " . BASEURL . "/index.php?page=" . $url);
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function flash($name, $message = '') {
    if (!empty($message)) {
        $_SESSION[$name] = $message;
    } else if (isset($_SESSION[$name])) {
        echo '<div class="alert alert-info">' . $_SESSION[$name] . '</div>';
        unset($_SESSION[$name]);
    }
}
?>