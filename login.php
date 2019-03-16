<?php require('top.php'); ?>
<!-- SIGN IN -->
<div id="signInContainer" class="container">
	<form enctype="multipart/form-data" action="/apis/login-api.php" method="POST">
		<div id="emailDiv" class="form-group">
            <label>Email Address:<sup>*</sup></label>
            <input type="email" id="emailLogIn" name="emailLogIn" class="form-control" required>
            <p id="emailCheckLogIn" class="match"></p>
        </div>

		<div id="passwordDiv" class="hidden form-group">
            <label>Enter password:<sup>*</sup></label>
            <input type="password" name="passwordLogIn" id="passwordLogIn" class="form-control" required>
			<p id="passwordCheckLogIn" class="match"></p>
        </div>

            <input type="submit" id="submitLogIn" name="submitLogIn" class="btn btn-primary" value="Submit">
	</form>
	<div> 
		<div id="tokenDiv" class="resetWrapper">
            <label >Enter Reset Token:<sup>*</sup></label>
            <input type="text" name="token" id="token" class="form-control" required>
			<p id="tokenCheck" class="match"></p>
        </div>
		<div id="newPassword" class="form-group resetWrapper">
            <label >Enter New Password:<sup>*</sup></label>
            <input type="password" name="newPasswordLogIn" id="newPasswordLogIn" class="form-control" required>
        </div>
		<div id="repeatNewPassword" class="form-group resetWrapper">
            <label>Enter New Password Again:<sup>*</sup></label>
            <input type="password" name="repeatNewPasswordLogIn" id="repeatNewPasswordLogIn" class="form-control" required>
			<p id="repeatNewPasswordCheckLogIn" class="match"></p>
        </div>

			<input type="button" id="submitNewPassword" name="submitNewPassword" class="resetWrapper btn btn-primary" value="SubmitNewPassword">
			<input type="button" id="forgotPassword" name="forgotPassword" class="resetWrapper btn btn-primary" value="Forgot Password?">
			<input type="button" id="showTokenBtn" name="forgotPassword" class="resetWrapper btn btn-primary" value="Send reset token to my email">
     </div>
  </div>
  
      <!-- FORGOT PASSWORD -->    <!-- FORGOT PASSWORD -->
      
    <div id="resetContainer" class="container">

  </div>
    <?php require('footer.php'); ?>
  <script src="/js/login.js"></script>
  <script src="/js/forgotPassword.js"></script>