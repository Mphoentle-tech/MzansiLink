<?php
include '../includes/auth.php';
adminOnly();
include '../includes/config.php';
include '../includes/header.php';

$products = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>

<section class="page-header">
    <p class="section-tag">Products</p>
    <h1>Manage Products</h1>
</section>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($product = mysqli_fetch_assoc($products)) { ?>
            <tr>
                <td><?php echo $product['id']; ?></td>
                <td><?php echo $product['title']; ?></td>
                <td><?php echo $product['category']; ?></td>
                <td>R<?php echo $product['price']; ?></td>
                <td><img src="../uploads/<?php echo $product['image']; ?>" class="admin-product-img"></td>
                <td>
                    <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="edit-btn">Edit</a>
                    <a href="delete-product.php?id=<?php echo $product['id']; ?>" class="delete-btn">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>