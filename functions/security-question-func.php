<?php

if (isset($_GET['email'])) {
   
    $email = stripslashes($_GET['email']);
    $path = 'data/data.json';
    $data = file_get_contents($path);
    $raw_arr = json_decode($data, true);
    $user_data = $raw_arr[$email];

    $quest = $user_data['question'];
    
    //get the question from the questions json
    $q_path = 'data/question.json';
    $content = file_get_contents($q_path);
    $arr = json_decode($content, true);
    $question = $arr[$quest];

}

if (isset($_POST['answer'])) {

    $answer =  stripslashes($_POST['answer']);
   
    $email = stripslashes($_POST['email']);
    $path = '../data/data.json';
    $data = file_get_contents($path);
    $raw_arr = json_decode($data, true);
    $user_data = $raw_arr[$email];

    $quest = $user_data['answer'];

   if ($quest == ucwords($answer)) {
      header('location:reset-password.php');
   }else{
       $error = ['Your answer is wrong, please try again'];
       $_SESSION['errors'] = $error;
       header('location:../security-question.php');
   }
}