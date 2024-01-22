<?php 
  session_start();
  include_once "./php/config.php";
  if(isset($_GET["cme-re-p"])){
    $sql = mysqli_query($conn, "SELECT * FROM reset_attempt WHERE reset_url = '{$_GET["cme-re-p"]}';");
    $row = mysqli_fetch_assoc($sql);
    $user_id = $row['user_id'];

    if(!empty($user_id)){
      $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$user_id}';");
      $row = mysqli_fetch_assoc($sql);
      $email = $row['email'];
    
      if(!empty($email)){
        $delete_code = mysqli_query($conn, "DELETE FROM reset_attempt WHERE user_id='{$user_id}';");
      }
    }
    
  }else{
    header("location: login.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form new_password">
      <header>Create New Password</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <p>Enter your new password.</p>
        <div class="error-text"></div>
        <div class="field input">
          <label>Code</label>
          <input type="password" name="new_pass" id="new_pass" placeholder="Enter 6 digits code" required>
          <input type="hidden" name="current_email" id="current_email" value="<?php echo $email; ?>">
        </div>
        
        <div class="field button">
          <input type="submit" name="submit" value="Create">
        </div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/password-reset.js"></script>

</body>
</html>
