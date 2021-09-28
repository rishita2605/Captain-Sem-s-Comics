<!DOCTYPE html>
<html lang="en">
<?php 
require_once __DIR__ . '/includes/header.php';
?>
<body>
  <div class="full-screen-div">
    <div class="content">
      <div class="right">
      </div>
      <div class="left">
        <div class="heading-1">Hey There!</div>
        <div class="heading-2">Get your dose of comics every 5 minutes...</div>
        <div class="heading-2">Enter your mail, verify & you're good to go</div>
        <!-- <form method="POST" action="index.php"> -->
        <div class="form-group" id="register-form-group">
          <input type="email" placeholder="Enter your email" name="email" id="email" />
          <button type="submit" id="subscribe" name="subscribe">Subscribe</button>
        </div>
        <div class="form-group"  id="otp-form-group">
          <input type="number" placeholder="Enter the OTP" name="otp" id="otp" />
          <button type="submit" id="verifyotp" name="verifyotp">Verify</button>
        </div>
        <!-- </form> -->
      </div>

    </div>
  </div>
  <script src="includes/js/script.js"></script>
</body>

</html>