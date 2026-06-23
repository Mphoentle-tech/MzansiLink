<?php
include 'includes/auth.php';
include 'includes/config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    $upload_folder = "uploads/" . $image;

    move_uploaded_file($temp_name, $upload_folder);

    $sql = "INSERT INTO products
            (user_id, title, category, price, description, image)
            VALUES
            ('$user_id', '$title', '$category', '$price', '$description', '$image')";

    if (mysqli_query($conn, $sql)) {
        $message = "Product added successfully.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>
<?php include 'includes/header.php'; ?>

<section class="form-section">
    <div class="form-box">
        <p class="section-tag">Seller tools</p>
        <h1>Add New Product</h1>

<?php if ($message != "") { ?>
    <p class="message"><?php echo $message; ?></p>
<?php } ?>
        <form method="POST" enctype="multipart/form-data">
    <label>Product Name</label>
    <input type="text" name="title" placeholder="e.g. Red Nike Sneakers" required>

    <label>Category</label>
    <input type="text" name="category" placeholder="e.g. Clothing, Electronics" required>

    <label>Price</label>
    <input type="number" name="price" placeholder="e.g. 450" required>

    <label>Description</label>
    <textarea name="description" placeholder="Describe the item" required></textarea>

    <label>Product Image</label>
    <input type="file" name="image" required>

    <button type="submit" class="btn-form">Add Product</button>
</form>
    </div>
</section>

<?php include 'includes/footer.php'; ?>