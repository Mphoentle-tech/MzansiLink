<?php
include '../includes/auth.php';
adminOnly(); // Restrict to admin
include '../includes/config.php';
include '../includes/header.php';
?>

<section class="page-header">
    <p class="section-tag">Admin Panel</p>
    <h1>MzansiLink Admin Dashboard</h1>
    <p>Manage users, products and platform activity using role-based access control.</p>
</section>

<section class="dashboard-section">
    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>Total Users</h3>
            <p><?php echo $user_count['total']; ?> registered users</p>
            <a href="users.php" class="btn-primary">Manage Users</a>
        </div>
        <div class="dashboard-card">
            <h3>Total Products</h3>
            <p><?php echo $product_count['total']; ?> products listed</p>
            <a href="products.php" class="btn-primary">Manage Products</a>
        </div>
        <div class="dashboard-card">
            <h3>Access Control</h3>
            <p>Only admin users can access this management area.</p>
            <a href="../dashboard.php" class="btn-primary">User Dashboard</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>