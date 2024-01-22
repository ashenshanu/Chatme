<?php
session_start();
include_once "config.php";
include_once "email-functions.php";

if(isset($_SESSION['waiting_email'])){
    emailVerificationSend($_SESSION['waiting_email']);
    echo "Code Sent.";
}


?>