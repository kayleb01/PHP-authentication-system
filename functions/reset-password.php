<?php
session_start();
if (isset($_POST['new-password'])) {
    /***
     * validate user new passwords
     */
    $error = [];

    if (empty($_POST['new-password'])) {
        $error[] = "Password field is empty";
    }
    if (empty($_POST['confirm-password'])) {
        $error[] = "Password confirmation field is empty";
    }
    if ($_POST['confirm-password'] != $_POST['new-password']  ) {
        $error[] = " Password confirmation do not match";
      }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
       $error[] = "The email is not valid email";
    }
       /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../reset-password.php?email=' . $_POST['email'] .'');
    }else{

    }

    
   //get the data from the database
    $email = stripslashes($_POST['email']);
    $path = '../data/data.json';
    $data = file_get_contents($path);
    $raw_arr = json_decode($data, true);
  
    $password = sha1(trim($_POST['new-password']));

    //set the new password into the database
    $raw_arr[$email]['password'] = $password;
  
   $new_data =  json_encode($raw_arr);
   file_put_contents($path, $new_data);

   //Redirect the user to a congratulations page
   header('location:../password-changed.php');
}