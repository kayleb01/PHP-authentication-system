<?php
require_once('inc.php');

/**Get the file content and convert it to an assoc array if case if theres any data it just append to it */
$database = [];
$file_data = file_get_contents('../data/data.json');
$database = json_decode($file_data, true);

/***
 * Validation of all input fields
 */
if(isset($_POST)){

    if (empty($_POST['fullname'])) {
        $error[] = "Fullname field is empty";
    }
    if (empty($_POST['email'])) {
        $error[] = "Email field is empty";
    }
    if (empty($_POST['email'])) {
        $error[] = "Email field is empty";
    }
    if (empty($_POST['password'])) {
        $error[] = "Password field is empty";
    }
    if (empty($_POST['password_confirm'])) {
        $error[] = "Password confirmation field is empty";
    }
    if (empty($_POST['question'])) {
        $error[] = "Question field is empty";
    }
    if (empty($_POST['answer'])) {
        $error[] = "Answer field is empty";
    }
    if ($_POST['password_confirm'] != $_POST['password']  ) {
      $error[] = " Password confirmation do not match";
    }
   
    /**
     * if there are validation errors 
     * set the errors in a session redirect back with error
     * 
     */
    if(!empty($error)){
        $_SESSION['errors'] = $error;
        header('location: ../register.php');
    }else{
       
        $fullname   = stripslashes($_POST['fullname']);
        $email      = stripslashes(trim($_POST['email']));
        $password   = sha1(trim($_POST['password']));
        $question   = stripslashes(trim($_POST['question']));
        $answer     = stripslashes(trim($_POST['answer']));

        $database[$email] = ['fullname' => $fullname, 'email' => $email, 'password' => $password, 'question' => $question, 'answer' => $answer];
        $encoded_data =  json_encode($database);

        //open the file and save the users data
        $file_path = '../data/data.json';
        
        if (!file_exists($file_path)) {
           $error[] = "File not found";
           $_SESSION['errors'] = $error;
           header('location: ../register.php');
        }

        $file_open = fopen($file_path, 'w');

        
        fwrite($file_open, $encoded_data);
        fclose($file_open);

        //redirect to the index page
        header('location:../index.php');


    }

}