<?php
session_start();

if ($_POST['email']) {

   $error = [];

    if (empty($_POST['email'])) {
        $error[] = "email field is empty";
    }
    if (empty($_POST['password'])) {
        $error[] = "Password field is empty";
    }
    /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../login.php');

    }else{

        $email   = stripslashes(trim($_POST['email']));
        $password = sha1(trim($_POST['password']));
        
        //get the data from the database :)
        $path = '../data/data.json';
        $data = file_get_contents($path);
        $raw_arr = json_decode($data, true);
        $user_data = $raw_arr[$email];

        if( empty($user_data) ){

            $error[] = "User credentials doesn'nt match our record, try again later";
            $_SESSION['errors'] = $error;
            header('location:../login.php');

        }else {
           if ($user_data['email'] == $email && $user_data['password'] == $password) {
                //set the session
                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;

                header('location:../index.php');
           }else {

                $error[] = "User credentials doesn'nt match our record, check and try again";
                $_SESSION['errors'] = $error;
                header('location:../login.php');
           }
        }
       

    }
}else{
    header('location:../login.php');
}