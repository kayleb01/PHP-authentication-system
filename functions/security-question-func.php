<?php

if (isset($_GET['email'])) {
   
    $email = stripslashes($_GET['email']);
    $path = '../data/data.json';
    $data = file_get_contents($path);
    $raw_arr = json_decode($data, true);
    $user_data = $raw_arr[$email];

    $quest = $user_data['question'];
    
    //get the question from the questions json
    $q_path = '../data/question.json';
    $content = file_get_contents($q_path);
    $arr = json_decode($content, true);
    $question = $arr[$quest];



}