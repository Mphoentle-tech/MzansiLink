<?php
include 'includes/auth.php';
include 'includes/config.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM products WHERE user_id = '$user_id' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<?php include 'includes/header.php'; ?>

<section class="page-header">
    <p class="section-tag">Seller Dashboard</p>
    <h1>My Listings</h1>
    <p>Manage products you have listed on MzansiLink.</p>
</section>

<section class="featured">
    <div class="product-grid">

        <?php if (mysqli_num_rows($result) > 0) { ?>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="product-card">
                    <img src="uploads/<?php echo $row['image']; ?>" class="product-photo">

                    <h3><?php echo $row['title']; ?></h3>

                    <p><?php echo $row['description']; ?></p>

                    <span>R<?php echo $row['price']; ?></span>

                    <a href="product.php?id=<?php echo $row['id']; ?>" class="view-btn">View Product</a>
                </div>

            <?php } ?>

        <?php } else { ?>

            <p class="no-results">You have not added any products yet.</p>

        <?php } ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>