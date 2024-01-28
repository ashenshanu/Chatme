<?php 
  session_start();
  
  if(isset($_SESSION['unique_id']) && $_SESSION['email_verification'] == 1){
    header("location: users.php");
  }else{
    session_destroy();
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>ChatMe</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
      <div class="link"><a href="send-resets.php">Forgot Password</a></div>

        <div class="field button">
          <button type="submit" class="loading-btn" name="submit"><span>Continue to Chat</span><img src="assets/loading-icon.gif" alt="ChatMe Loading"></button>
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>
  <?php include "php/background.php"; ?>

</body>
</html>
