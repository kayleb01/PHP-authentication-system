<?php
if (isset($_POST['password'])) {
    /***
     * validate user new passwords
     */
    
    //get the data from the database
    $email = stripslashes($_POST['email']);
    $path = '../data/data.json';
    $data = file_get_contents($path);
    $raw_arr = json_decode($data, true);
    $user_data = $raw_arr[$email];
}