<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title . ' - ' . SITENAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASEURL; ?>/index.php?page=dashboard"><?php echo SITENAME; ?></a>
            
            <?php if (isLoggedIn()): ?>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="<?php echo BASEURL; ?>/index.php?page=guest">Data Tamu</a>
                <?php if ($_SESSION['user_role'] == 'admin'): ?>
                <a class="nav-link" href="<?php echo BASEURL; ?>/index.php?page=register">Tambah User</a>
                <?php endif; ?>
                <a class="nav-link" href="<?php echo BASEURL; ?>/index.php?page=logout">Logout</a>
            </div>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container mt-4">
        <?php 
        if (isset($_SESSION['message'])) {
            echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>