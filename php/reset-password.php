<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['current_email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $encrypt_pass = md5($new_password);

    if(isset($new_password)){
        $updatePassword = mysqli_query($conn, "UPDATE users SET password = '{$encrypt_pass}' WHERE email = '{$email}'");
        if($updatePassword){
            echo "success";

        }else{
            echo "Password is not Updated!";
        }

    }else{
        echo "field are required!";
    }


    

    
?>