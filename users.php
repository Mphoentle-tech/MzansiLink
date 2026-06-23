<?php
include '../includes/auth.php';
adminOnly(); // Restrict to admin
include '../includes/config.php';
include '../includes/header.php';

// Fetch all users
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<section class="page-header">
    <p class="section-tag">Admin Panel</p>
    <h1>Manage Users</h1>
    <p>View, edit, or delete users in the system.</p>
</section>

<section class="search-section">
    <div class="table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td>
                                <a class="edit-btn" href="edit-user.php?id=<?php echo $row['id']; ?>">Edit</a>
                                <a class="delete-btn" href="delete-user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="no-results">No users found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<?php include '../includes/footer.php'; ?>