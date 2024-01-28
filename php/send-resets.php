<?php
    session_start();
    include_once "email-functions.php";

    $bytes = random_bytes(20);
    $randomCode = bin2hex($bytes);
    
    $resetLink = "http://localhost/chatme/reset_password.php?cme-re-p=".$randomCode;

    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['reset_email']);

    if(isset($email)){
        $getUserId = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}';");
        if($getUserId){
            $row = mysqli_fetch_assoc($getUserId);
            if(isset($row)){
                $user_id = $row['unique_id'];
            }
            if(!empty($user_id)){
                $markAttempt = mysqli_query($conn, "INSERT INTO reset_attempt (user_id, reset_url)
                VALUES ('{$user_id}', '{$randomCode}');");

                if($markAttempt){
                    fogetPasswordVerificationSend($email,$resetLink);
                    echo "success";
                }else{
                    echo "Reset URL not Sent";
                }

            }else{
            echo "$email - This email not Attempt to reset";
            }

        }else{
            echo "$email - This email not Exist!";
        }

    }else{
        echo "field are required!";
    }


    

    
?>