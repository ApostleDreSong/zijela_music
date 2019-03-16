<?php
 require('top.php'); ?>
<form enctype="multipart/form-data" action="api.php" method="POST">
    <h3>FILLING THIS FORM GIVES YOU AN ACCESS TO A MUSIC DASHBOARD WHERE YOU CAN RELATE WITH YOUR FAVOURITE ARTISTES, TALK ABOUT THEIR SONGS AND SAVE YOUR FAVOURITE PLAYLIST FOR LISTENING AT ALL TIMES</h3>
        <h5>DO YOU HAVE A SONG OF YOUR OWN? WHY NOT FILL THE <a href='/creatorsignup.php'>CREATORS</a> FORM INSTEAD?.</h5>
    
        <div class="form-group">
            <label>Choose a unique username:<sup>*</sup></label>
            <input type="text" name="userName" id="userNameFan" class="form-control" required>
            <p id="userNameCheckFan" class="match"></p>
        </div>
        <div class="form-group">
            <label>Enter password:<sup>*</sup></label>
            <input type="password" name="password" id="passwordFan" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Repeat password:<sup>*</sup></label>
            <input type="password" name="repeatPassword" id="repeatPasswordFan" class="form-control" required>
            <p id="passwordCheckFan" class="match"></p>
        </div>
        <div class="form-group">
            <label>First name:<sup>*</sup></label>
            <input type="text" name="firstName" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Last Name:<sup>*</sup></label>
            <input type="text" name="lastName" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Date of Birth:<sup>*</sup></label>
            <input type="date" name="dob" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Sex:<sup>*</sup></label>
            <select name="sex" class="form-control" required>
				<option></option>
                <option name="male" class="form-control">male</option>
                <option name="female" class="form-control">female</option>
            </select>
        </div>

        <div class="form-group">
            <label>Phone number:<sup>*</sup></label>
            <input type="tel" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email Address:<sup>*</sup></label>
            <input type="email" id="emailFan" name="email" class="form-control" required>
            <p id="emailCheckFan" class="match"></p>
        </div>


        <div id="submit_wrapper"> 
            <input type="submit" id="submitNewFan" name="submitNewFan" class="btn btn-primary" value="Submit">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
        </div>
    </form>
<script src="/js/fansignup.js"></script>
<?php
 require('footer.php'); ?>