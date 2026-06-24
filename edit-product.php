<?php
include '../includes/auth.php';
adminOnly();
include '../includes/config.php';

$id = $_GET['id'];

$product_query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'");
$product = mysqli_fetch_assoc($product_query);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE products 
            SET title='$title', category='$category', price='$price', description='$description'
            WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: products.php");
        exit();
    } else {
        $message = "Error updating product: " . mysqli_error($conn);
    }
}
?>

<?php include '../includes/header.php'; ?>

<section class="form-section">
    <div class="form-box">
        <p class="section-tag">Admin Management</p>
        <h1>Edit Product</h1>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Product Name</label>
            <input type="text" name="title" value="<?php echo $product['title']; ?>" required>

            <label>Category</label>
            <input type="text" name="category" value="<?php echo $product['category']; ?>" required>

            <label>Price</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" required>

            <label>Description</label>
            <textarea name="description" required><?php echo $product['description']; ?></textarea>

            <button type="submit" class="btn-form">Update Product</button>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>