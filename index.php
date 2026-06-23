<?php
include 'includes/config.php';
include 'includes/header.php';

// Fetch featured products dynamically
$sql = "SELECT * FROM products WHERE featured = 1 ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<section class="hero">
    <div class="hero-text">
        <p class="tagline">Township-powered online marketplace</p>
        <h1>Buy and sell trusted goods in your community.</h1>
        <p class="hero-description">
            MzansiLink connects local buyers and sellers through a simple,
            secure and community-focused C2C marketplace.
        </p>
        <div class="hero-buttons">
            <a href="browse.php" class="btn-primary">Browse Products</a>
            <a href="register.php" class="btn-secondary">Start Selling</a>
        </div>
    </div>
</section>

<section class="featured">
    <p class="section-tag">Popular listings</p>
    <h2>Featured Products</h2>

    <div class="product-grid">

        <?php if(mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="product-card">
                    <img src="uploads/<?php echo $row['image']; ?>" class="product-photo">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <span>R<?php echo $row['price']; ?></span>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-results">No featured products found.</p>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>