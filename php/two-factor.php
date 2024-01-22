<?php 

session_start();
    include_once "config.php";
    $auth_code = mysqli_real_escape_string($conn, $_POST['auth_code']);

    if(!empty($auth_code)){
        if($_SESSION['authCode'] == $auth_code){
            $status = "Active now";
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE email = '{$_SESSION['waiting_email']}'");
            if($sql2){
                $_SESSION['status'] = $status;

                echo"success";
            }
        }else{
            echo "Verification Code is Incorrect!";
        }
    }else{
        echo "All input fields are required!";
    }
?>