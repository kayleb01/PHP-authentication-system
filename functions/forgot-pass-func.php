<?php
require_once('inc.php');

if(isset($_POST['email'])){
 $email = stripslashes(trim($_POST['email']));

    if (empty($email)) {
        $error[] = "email field is empty";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "The email is not valid without "/@"";
    }

    if(!empty($error)){

        $_SESSION['errors'] = $error;
        header('location: ../forgot-password.php');

    }else{
       
        //get the data from the database :)
        $path = '../data/data.json';
        $data = file_get_contents($path);
        $raw_arr = json_decode($data, true);
        $user_data = $raw_arr[$email];

        if( empty($user_data) ){

            $error[] = "email does not exist in our record, try again later";
            $_SESSION['errors'] = $error;
            header('location:../forgot-password.php');

        }else {
            header('location:../security-question.php?email='. $email .'');
        }

    }

}