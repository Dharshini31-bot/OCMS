<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Enroll Course</title>

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
         <h3 class="name">NOT YET REGISTERED</h3>
         <p class="role">student</p>
         <a href="profile.php" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>
   </section>
</header>

<div class="side-bar">
   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h3 class="name">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['userid'])) {
            echo $_SESSION['userid'];
        } else {
            echo "no userid";
        }
        ?>
    </h3>
      <p class="role">student</p>
      <a href="profile.php" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="home.php"><i class="fas fa-home"></i><span>home</span></a>
      <a href="about.php"><i class="fas fa-question"></i><span>about</span></a>
      <a href="courses.php"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers.php"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact.php"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>
</div>

<section class="form-container">
   <form action="enroll_reg_connect.php" method="post" enctype="multipart/form-data">
      <h3>Enroll in a Course</h3>
      
      <p>Your UserID <span>*</span></p>
      <input type="text" name="userid" placeholder="Enter your UserID" required maxlength="50" class="box">
      <p>Your Email <span>*</span></p>
      <input type="email" name="email" placeholder="Enter your Email" required maxlength="50" class="box">
    
      <p>Course Title <span>*</span></p>
      <select name="course_title" required class="box">
         <option value="" disabled selected>Select a course</option>
         <option value="HTML">HTML</option>
         <option value="CSS">CSS</option>
         <option value="JS">JavaScript (JS)</option>
         <option value="Bootstrap">Bootstrap</option>
         <option value="jQuery">jQuery</option>
         <option value="SASS">SASS</option>
         <option value="PHP">PHP</option>
         <option value="MySQL">MySQL</option>
         <option value="React">React</option>
      </select>
      <p>Enrollment Date <span>*</span></p>
      <input type="date" name="enrollment_date" required class="box">
      <input type="submit" value="Enroll Now" name="submit" class="btn">
   </form>
</section>



<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
