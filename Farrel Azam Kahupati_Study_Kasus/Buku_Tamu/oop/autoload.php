<?php
spl_autoload_register(function ($class) {
    // Ubah namespace menjadi path folder
    $path = __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});
