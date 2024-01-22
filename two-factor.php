<?php 
  session_start();
  
  if(isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 0){
    header("location: verification.php");
  }elseif(!isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 1){
    header("location: users.php");
  }elseif(!isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 0){
    header("location: index.php");
  }
  $temp = $_SESSION['authCode'];
  echo "<script>console.log(".$temp.")</script>";
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form authentication">
      <header>Two Factor Authentication</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <p>Please enter the 6 digit code sent to your email address.</p>
        <div class="error-text"></div>
        <div class="field input">
          <label>Code</label>
          <input type="text" name="auth_code" id="auth_code" placeholder="Enter 6 digits code" required>
        </div>
        
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>

      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/two-factor.js"></script>

</body>
</html>
