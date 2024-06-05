<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update</title>

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
         <h3 class="name">
        <?php
        // Check if a session is already active
        if (session_status() == PHP_SESSION_NONE) {
            // If not, start the session
            session_start();
        }
        // Check if the user ID is set in the session
        if (isset($_SESSION['userid'])) {
            // Display the user ID
            echo $_SESSION['userid'];
        } else {
            // Display a default name if the user ID is not set
            echo "no userid";
        }
        ?>
    </h3>
         <p class="role">studen</p>
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
        // Check if a session is already active
        if (session_status() == PHP_SESSION_NONE) {
            // If not, start the session
            session_start();
        }
        // Check if the user ID is set in the session
        if (isset($_SESSION['userid'])) {
            // Display the user ID
            echo $_SESSION['userid'];
        } else {
            // Display a default name if the user ID is not set
            echo "no userid";
        }
        ?>
    </h3>
   
      <p class="role">studen</p>
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

   <form action="updateconnect.php" method="post" enctype="multipart/form-data">
      <h3>update profile</h3>
      <p>update username</p>
      <input type="text" name="userid" placeholder="enter your userid" maxlength="50" class="box">
      <p>update email</p>
      <input type="email" name="email" placeholder="enter your new email id" maxlength="50" class="box">
      <p>previous password</p>
      <input type="password" name="old_pass" placeholder="enter your old password" maxlength="20" class="box">
      <p>new password</p>
      <input type="password" name="password" placeholder="enter your old password" maxlength="20" class="box">
      <p>confirm password</p>
      <input type="password" name="confirmpassword" placeholder="confirm your new password" maxlength="20" class="box">
    
      
      <input type="submit" value="update profile" name="submit" class="btn">
   </form>

</section>
















<!-- custom js file link  -->
<script src="js/script.js"></script>

   
</body>
</html>