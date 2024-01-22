<?php 

session_start();
    include_once "config.php";
    $veri_code = mysqli_real_escape_string($conn, $_POST['veri_code']);

    if(!empty($veri_code)){
        $sql = mysqli_query($conn, "SELECT * FROM verification WHERE email = '{$_SESSION['waiting_email']}' ORDER BY log_id DESC");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $code = $row['code'];
            if($veri_code === $code){
                $status = "Active now";
                $sql2 = mysqli_query($conn, "UPDATE users SET email_verification = true WHERE email = '{$_SESSION['waiting_email']}'");
                if($sql2){
                    $delete_code = mysqli_query($conn, "DELETE FROM verification WHERE email='{$_SESSION['waiting_email']}';");
                    if($delete_code){

                        session_destroy();
                        echo "success";

                    }
                }else{
                    echo "Something went wrong. Please try again!";
                }
            }else{
                echo "Verification Code is Incorrect!";
            }
        }else{
            echo "$email - This email not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>