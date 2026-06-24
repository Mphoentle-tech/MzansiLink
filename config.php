<?php
// ===== CONFIG =====
$host = "sql108.infinityfree.com";  
$db   = "if0_41846661_mzansilink_db";  
$user = "if0_41846661";  
$pass = "Kutlwano05";  

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>