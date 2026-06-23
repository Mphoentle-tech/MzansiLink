<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";

        $sql = "INSERT INTO users (fullname, email, password, role)
                VALUES ('$fullname', '$email', '$hashed_password', '$role')";

        if (mysqli_query($conn, $sql)) {
            // Redirect to login page automatically
            header("Location: login.php?registered=1");
            exit();
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<section class="form-section">
    <div class="form-box">
        <p class="section-tag">Create account</p>
        <h1>Join MzansiLink</h1>

        <?php 
        // Show success message if redirected from registration
        if (isset($_GET['registered']) && $_GET['registered'] == 1) {
            echo "<p class='message'>Registration successful. You can now login.</p>";
        }

        if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Full Name</label>
            <input type="text" name="fullname" placeholder="Enter your full name" required>

            <label>Email Address</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Create password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" placeholder="Confirm password" required>

            <button type="submit" class="btn-form">Register</button>
        </form>

        <p class="form-link">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>