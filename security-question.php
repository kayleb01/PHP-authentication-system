<?php
require_once('functions/inc.php');
require_once('functions/security-question-func.php');

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
    <title>Zuri's|Recover password</title>
</head>
<body>
<div class="card">
<?php
       
       if ($_SESSION['errors']) {
          foreach($_SESSION['errors'] as $error){
           echo '<div class="errors">'. $error .'</div>';
          }
          unset($_SESSION['errors']);
       }
       ?>
      
   <form  action="functions/security-question-func.php" method="POST">
      <div class="email-login">
         <label for="email"> <b>Question</b></label>
         <input type="text"  name="email" value="<?php  echo $question['question']?>" readonly style="background-color:silver; font-weight:bold">

         <label for="email"> <b>Answer</b></label>
         <input type="text"  name="answer" placeholder="Your answer">
      </div>
      <input type="hidden" name="email" value="<?=$_GET['email']?>">
      <button class="cta-btn">Submit</button>
     <span class="go-back forget-pass" onclick="window.history.back()">Go back</span>
   </form>
</div>
</body>
</html>