
<?php
include 'includes/config.php';

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);
?>

<?php include 'includes/header.php'; ?>

<section class="product-detail-section">
    <div class="product-detail-card">
        <img src="uploads/<?php echo $product['image']; ?>" class="detail-img">

        <div class="detail-info">
            <p class="section-tag"><?php echo $product['category']; ?></p>
            <h1><?php echo $product['title']; ?></h1>
            <h2>R<?php echo $product['price']; ?></h2>
            <p><?php echo $product['description']; ?></p>

            <a href="login.php" class="btn-primary">Login to Contact Seller</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>