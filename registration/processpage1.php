<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['registration_data']['username'] = $_POST['username'];
    $_SESSION['registration_data']['password'] = $_POST['password'];

    // Redirect to page 2
    header('Location: page2.php');
    exit();
} else {
    // If someone tries to access this page directly, redirect to page 1
    header('Location: page1.php');
    exit();
}
?>