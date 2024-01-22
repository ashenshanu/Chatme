<?php 
  session_start();

?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form reset_password">
      <header>Reset Your Password</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <p>Please enter your E-mail address first.</p>
        <div class="error-text"></div>
        <div class="field input">
          <label>E-mail Address</label>
          <input type="text" name="reset_email" id="reset_email" placeholder="Enter E-mail Address" required>
        </div>
        
        <div class="field button">
          <input type="submit" name="submit" value="Continue">
          <div class="link">
            <a href="login.php">Back</a>
          </div>
        </div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/send-resets.js"></script>

</body>
</html>
