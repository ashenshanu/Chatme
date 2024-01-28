<?php 
  session_start();
  include_once "./php/config.php";
  if(isset($_SESSION['unique_id'])){
    $status = "Offline now";
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_SESSION['unique_id']}");
    if($sql){
        session_destroy();
    }
  }

?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>ChatMe</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <button type="submit" class="loading-btn" name="submit"><span>Submit to Sign Up</span><img src="assets/loading-icon.gif" alt="ChatMe Loading"></button>

        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
  <?php include "php/background.php"; ?>
  

</body>
</html>
