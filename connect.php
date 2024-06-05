<?php
session_start(); // Start the session
$userid = $_POST['userid'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];

// Check if all fields are filled
if(empty($userid) || empty($email) || empty($password) || empty($confirmpassword)) {
    echo "All fields are required!";
} else {
    $conn = new mysqli('localhost', 'root', '', 'login');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        // Check if the email already exists in the database
        $check_query = "SELECT * FROM register WHERE email='$email'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            // Display an alert message using JavaScript
            echo "<script>alert('User with this email already exists. Please login or use a different email.');";
            // Redirect back to the register page
            echo "window.location.href = 'register.php';";
            echo "</script>";
        } else {
            // Proceed with registration
            $stmt = $conn->prepare("INSERT INTO register (userid, email, password, confirmpassword) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $userid, $email, $password, $confirmpassword);
            $execval = $stmt->execute();

            if ($execval) {
                // Set session variable for userid and email
                $_SESSION['userid'] = $userid;
                $_SESSION['email'] = $email;
                // Redirect to the home page
                header("Location: home.php");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        }

        $stmt->close();
        $conn->close();
    }
}
?>
