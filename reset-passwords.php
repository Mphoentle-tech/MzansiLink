<?php
include 'includes/config.php';

// Temporary password for all users
$temp_password = 'Test1234!';

// Hash the temporary password
$hashed_password = password_hash($temp_password, PASSWORD_DEFAULT);

// Update all users
$sql = "UPDATE users SET password='$hashed_password'";

if (mysqli_query($conn, $sql)) {
    echo "All user passwords have been reset to: $temp_password";
} else {
    echo "Error updating passwords: " . mysqli_error($conn);
}
?>