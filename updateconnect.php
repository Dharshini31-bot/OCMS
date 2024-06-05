<?php
session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if all fields are filled
    if(empty($userid) || empty($email) || empty($password) || empty($confirmpassword)) {
        echo "All fields are required!";
    } elseif ($password !== $confirmpassword) {
        echo "Passwords do not match!";
    } else {
        $conn = new mysqli('localhost', 'root', '', 'login');
        if ($conn->connect_error) {
            echo "$conn->connect_error";
            die("Connection Failed: " . $conn->connect_error);
        } else {
            // Update the user's details in the database
            $stmt = $conn->prepare("UPDATE register SET email=?, password=?, confirmpassword=? WHERE userid=?");
            $stmt->bind_param("sssi", $email, $password, $confirmpassword, $userid);
            $execval = $stmt->execute();

            if ($execval) {
                // Set session variable for userid
                $_SESSION['userid'] = $userid;

                // Redirect to the home page
                header("Location: home.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        }
    }
} else {
    echo "Invalid request method.";
}
?>
