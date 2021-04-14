<?php
session_start();

if (isset($_SESSION['email'])) {
unset($_SESSION['email']);
unset($_SESSION['fullname']);

header('location:../login.php');
}