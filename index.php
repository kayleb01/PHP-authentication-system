<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location:login.php');
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
<div class="card-index">
   <h1>Welcome to your dashboard</h1>
   <span><a class="btn" href="functions/logout.php"> Logout</a></span>
</div>
</body>
</html>