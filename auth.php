<?php
session_start();

function adminOnly() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header("Location: login.php");
        exit();
    }
}

function userOnly() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
        header("Location: login.php");
        exit();
    }
}
?>