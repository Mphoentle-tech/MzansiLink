<?php
include 'includes/config.php';
include 'includes/header.php';

if (isset($_GET['search']) && $_GET['search'] != "") {
    $search = $_GET['search'];

    $sql = "SELECT * FROM products
            WHERE title LIKE '%$search%'
            OR category LIKE '%$search%'
            OR description LIKE '%$search%'
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM products ORDER BY id DESC";
}

$result = mysqli_query($conn, $sql);
?>

<section class="page-header">
    <p class="section-tag">Marketplace</p>
    <h1>Browse Products</h1>
    <p>Explore items listed by local sellers in the community.</p>
</section>

<section class="search-section">
    <form method="GET" class="search-form">
        <input type="text" name="search" placeholder="Search products...">
        <button type="submit">Search</button>
    </form>
</section>

<section class="featured">
    <div class="product-grid">

        <?php if (mysqli_num_rows($result) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="product-card">
                    <img src="uploads/<?php echo $row['image']; ?>" class="product-photo">

                    <h3><?php echo $row['title']; ?></h3>

                    <p><?php echo $row['description']; ?></p>

                    <span>R<?php echo $row['price']; ?></span>

                    <a href="product.php?id=<?php echo $row['id']; ?>" class="view-btn">View Product</a>
                </div>

            <?php } ?>

        <?php } else { ?>

            <p class="no-results">No products found.</p>

        <?php } ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>