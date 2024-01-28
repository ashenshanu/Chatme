<?php 
  session_start();
  if(!isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 1){
    header("location: users.php");
  }elseif(!isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 0){
    header("location: index.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form verification">
      <header>Account Verification</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <p>Please enter the 6 digit code sent to your email address.</p>
        <div class="error-text"></div>
        <div class="field input">
          <label>Code</label>
          <input type="text" name="veri_code" id="veri_code" placeholder="Enter 6 digits code" required>
        </div>
        
        <div class="field button">
          <button type="submit" class="loading-btn" name="submit"><span>Continue</span><img src="assets/loading-icon.gif" alt="ChatMe Loading"></button>
          <input type="button" name="resend" id="resend" value="Resend">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/verification.js"></script>
  <?php include "php/background.php"; ?>


</body>
</html>
