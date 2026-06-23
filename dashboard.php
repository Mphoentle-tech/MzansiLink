<?php
include 'includes/auth.php'; 
include 'includes/header.php';
?>

<section class="page-header">
    <p class="section-tag">User Dashboard</p>
    <h1>Welcome, <?php echo $_SESSION['fullname']; ?> 👋</h1>
    <p>Manage your listings, view marketplace activity, and start selling items in your community.</p>
</section>

<section class="dashboard-section">
    <div class="dashboard-grid">
        <div class="dashboard-card">
            <h3>My Listings</h3>
            <p>View and manage the products you have listed for sale.</p>
            <a href="browse.php" class="view-btn">View Listings</a>
        </div>

        <div class="dashboard-card">
            <h3>Add Product</h3>
            <p>Create a new product listing for buyers to discover.</p>
            <a href="add-product.php" class="view-btn">Add Product</a>
        </div>

        <div class="dashboard-card">
            <h3>Browse Marketplace</h3>
            <p>See products listed by other users.</p>
            <a href="browse.php" class="view-btn">Browse Products</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>