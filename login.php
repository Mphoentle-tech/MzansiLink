<?php
session_start();
include '../includes/config.php'; // Adjust path because admin is in a subfolder

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND role='admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            header("Location: index.php"); // redirect to admin dashboard
            exit();
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "No admin account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MzansiLink</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">MzansiLink</div>
    <div class="nav-links">
        <a href="../index.php">Home</a>
        <a href="../browse.php">Browse</a>
        <a href="../dashboard.php">Dashboard</a>
        <a href="../register.php" class="btn-small">Register</a>
        <a href="../login.php">Login</a>
    </div>
</nav>

<section class="form-section">
    <div class="form-box">
        <p class="section-tag">Admin Login</p>
        <h1>Login as Admin</h1>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter admin email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>

            <button type="submit" class="btn-form">Login</button>
        </form>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
</body>
</html>