<?php
session_start();
include 'includes/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

// Show message if redirected from registration
if (isset($_GET['registered']) && $_GET['registered'] == 1) {
    $message = "Registration successful. You can now login.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Database error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin/index.php");
                exit();
            } else {
                header("Location: dashboard.php");
                exit();
            }
        } else {
            $message = "Incorrect password.";
        }
    } else {
        $message = "No account found with that email.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<section class="form-section">
    <div class="form-box">
        <p class="section-tag">Welcome back</p>
        <h1>Login to MzansiLink</h1>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit" class="btn-form">Login</button>
        </form>

        <p class="form-link">
            Don’t have an account? <a href="register.php">Register here</a>
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>