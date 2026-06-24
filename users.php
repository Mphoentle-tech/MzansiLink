<?php
// ===== DEBUG MODE =====
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../includes/auth.php';
adminOnly(); // Ensure only admin can access
include '../includes/config.php';
include '../includes/header.php';

// Fetch users from database
$sql = "SELECT user_id, fullname, email, role FROM users ORDER BY user_id ASC";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>

<section class="page-header">
    <p class="section-tag">Admin Panel</p>
    <h1>Manage Users</h1>
    <p>All registered users are listed below.</p>
</section>

<section class="dashboard-section">
    <div class="dashboard-grid">
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($user = mysqli_fetch_assoc($result)): ?>
                <div class="dashboard-card">
                    <h3><?php echo $user['fullname']; ?></h3>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Role:</strong> <?php echo ucfirst($user['role']); ?></p>
                    <a href="edit-user.php?id=<?php echo $user['user_id']; ?>">Edit User</a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-results">No users found in the database.</p>
        <?php endif; ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>