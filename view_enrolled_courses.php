<?php
// view_enrolled_courses.php

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    // If not, redirect to login page
    header("Location: login.php");
    exit();
}

// Get the userid from the session
$userid = $_SESSION['userid'];

// Connect to the database (replace with your database connection details)
$conn = new mysqli('localhost', 'root', '', 'login');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the enrolled courses for the user
$sql = "SELECT course_title, enrollment_date FROM enrollments WHERE userid = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the results
$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

// Close the statement and the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Enrolled Courses</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
   <section class="flex">
      <a href="home.php" class="logo">Learnify</a>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="toggle-btn" class="fas fa-sun"></div>
      </div>

      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $userid; ?></h3>
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>
   </section>
</header>

<section class="courses">
   <h1 class="heading">Your Enrolled Courses</h1>
   <div class="box-container">
      <?php if (!empty($courses)) : ?>
         <?php foreach ($courses as $course) : ?>
            <div class="box">
               <a href="playlist.php?course=<?php echo urlencode($course['course_title']); ?>" class="course-link">
                   <h3 class="title"><?php echo htmlspecialchars($course['course_title']); ?></h3>
               </a>
               <p class="date">Enrolled on: <?php echo htmlspecialchars($course['enrollment_date']); ?></p>
            </div>
         <?php endforeach; ?>
      <?php else : ?>
         <p>No courses enrolled yet.</p>
      <?php endif; ?>
   </div>
  
</section>



<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
