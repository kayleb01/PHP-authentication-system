<?php 
require_once('functions/inc.php');

if (isset($_SESSION['email'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Zuri's Login</title>
</head>
<body>
<div class="card">
   <form action="functions/login.php" method="POST">
      <h2 class="title"> Log in</h2>
      <p class="subtitle">Don't have an account? <a href="register.php"> Sign Up</a></p>
      <p class="or"><span></span></p>
      <?php
       
       if ($_SESSION['errors']) {
          foreach($_SESSION['errors'] as $error){
           echo '<div class="errors">'. $error .'</div>';
          }
          unset($_SESSION['errors']);
       }
       ?>
      <div class="email-login">
         <label for="email"> <b>Email</b></label>
         <input type="email" placeholder="Enter Email" name="email">
         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button class="cta-btn" type="submit">Log In</button>
      <a class="forget-pass" href="forgot-password.php">Forgot password?</a>
   </form>
</div>
</body>
</html>