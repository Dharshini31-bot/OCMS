<?php
session_start();

if (isset($_SESSION['userid'])) {
    header('Location: home.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'connect.php';

    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    // Check if the user exists in the database
    $query = "SELECT * FROM register WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // User exists, check password
        if (password_verify($password, $user['password'])) {
            $_SESSION['userid'] = $user['userid']; // Assuming userid is unique
            header('Location: home.php');
            exit();
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // User doesn't exist, display message to register
        echo "<script>alert('User not found. Please register.');</script>";
    }
}
?>