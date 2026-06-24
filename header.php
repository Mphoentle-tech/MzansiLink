<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// define a base URL for your site
$base_url = '/'; // Adjust if your files are in a subfolder
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MzansiLink Marketplace</title>
    <!-- Use absolute path to avoid folder issues -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
    <div class="logo">MzansiLink</div>

    <div class="nav-links">
        <a href="<?php echo $base_url; ?>index.php">Home</a>
        <a href="<?php echo $base_url; ?>browse.php">Browse</a>
        <a href="<?php echo $base_url; ?>dashboard.php">Dashboard</a>

        <!-- Admin links -->
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
            <a href="<?php echo $base_url; ?>admin/index.php">Admin</a>
            <a href="<?php echo $base_url; ?>admin/users.php">Users</a>
            <a href="<?php echo $base_url; ?>admin/products.php">Products</a>
        <?php } ?>

        <!-- Login/Register or Logout -->
        <?php if (isset($_SESSION['user_id'])) { ?>
            <a href="<?php echo $base_url; ?>logout.php">Logout</a>
        <?php } else { ?>
            <a href="<?php echo $base_url; ?>register.php" class="btn-small">Register</a>
            <a href="<?php echo $base_url; ?>login.php">Login</a>
        <?php } ?>
    </div>
</nav>