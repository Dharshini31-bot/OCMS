<?php
// enroll_process.php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start the session
    session_start();
    
    // Retrieve form data
    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $course_title = $_POST['course_title'];
    $enrollment_date = $_POST['enrollment_date'];

    // Validate form data
    if (empty($userid) || empty($email) || empty($course_title) || empty($enrollment_date)) {
        die("All fields are required.");
    }

    // Connect to the database (replace with your database connection details)
    $conn = new mysqli('localhost', 'root', '', 'login');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO enrollments (userid, email, course_title, enrollment_date) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("isss", $userid, $email, $course_title, $enrollment_date);

    // Execute the query
    if ($stmt->execute()) {
        // Store the userid in session
        $_SESSION['userid'] = $userid;
        
        // Redirect to view_enrolled_courses.php
        header("Location: view_enrolled_courses.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
