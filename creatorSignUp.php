<?php require ('top.php'); 
?>

<form enctype="multipart/form-data" action="new-member-api.php" method="POST">
    <h3>YES, THIS FORM IS REALLY LONG BUT YOU ONLY HAVE TO FILL IT THIS ONCE!</h3>
    <h5>YOU NEED TO HAVE AT LEAST A SONG IN YOUR NAME TO BECOME A MEMBER. 
    INSTEAD YOU CAN <a href='/fansignup.php'>BECOME A FAN</a>. UPLOAD ONLY SONGS YOU OWN. WE FROWN SERIOUSLY AGAINST PIRACY. SO DO NOT THINK OF GAMING OUR SYSTEM. WE WILL CATCH YOU!</h5>
        <div class="form-group">
            <label>Choose a unique username:<sup>*</sup></label>
            <input type="text" name="userName" id="userNameCreator" class="form-control" required>
            <p id="userNameCheckCreator" class="match"></p>
        </div>
        <div class="form-group">
            <label>Enter password:<sup>*</sup></label>
            <input type="password" name="password" id="passwordCreator" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Repeat password:<sup>*</sup></label>
            <input type="password" name="repeatPassword" id="repeatPasswordCreator" class="form-control" required>
            <p id="passwordCheckCreator" class="match"></p>
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
            <label>Upload a profile pix:<sup>*</sup></label>
            <input type="file" name="profilePix" class="form-control" required accept=".png,.jpg">
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
            <label>Tell us about yourself:<sup>*</sup></label>';
            <textarea name="bio" rows="4" cols="50" placeholder="Type it this way starting with your name.
                Damilare Ademeso is a minister of the gospel devoted to seeing the flames of worship across the nations e.t.c " required></textarea>
        </div>
        <div class="form-group">
            <label>Phone number:<sup>*</sup></label>
            <input type="tel" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email Address:<sup>*</sup></label>
            <input type="email" id="emailCreator" name="email" class="form-control" required>
            <p id="emailCheckCreator" class="match"></p>
        </div>
        <div class="form-group">
            <label>Facebook Name:<sup>*</sup></label>
            <input type="text" name="fbName" class="form-control" placeholder="e.g web.facebook.com/your-username/">
        </div>
        <div class="form-group">
            <label>Twitter Handle:<sup>*</sup></label>
            <input type="text" name="twitterName" class="form-control" placeholder="e.g twitter.com/your-username">
        </div>
        <div class="form-group">
            <label>Instagram Handle:<sup>*</sup></label>
            <input type="text" name="igName" class="form-control" placeholder="e.g instagram.com/your-username">
        </div>
       
        <div class="form-group">
             <label>Type in the song title:<sup>*</sup></label>
            <input class="form-group" type="text" name="songTitle" required >
        </div>
        <div class="form-group">
             <label>Is this song part of an album?<sup>*</sup></label>
            <select type="text" id="albumQuestioned" name="albumQuestioned" required onchange="partOfAlbum()">
                <option></option>
                <option>yes</option>
                <option>no</option>
            </select>
        </div>
        <div class="form-group">
             <label id="albumLabel" class="albumLabel">Album Title:<sup>*</sup></label>
            <input id="album" class="form-group" type="hidden" name="album" required >
        </div>
		<div class="form-group">
             <label>Is this song for free download or purchase?<sup>*</sup></label>
            <select type="text" id="freeDownload" name="freeDownload" required>
                <option></option>
                <option>yes, i want it downloaded free</option>
                <option>no, i want to earn royalty from it</option>
            </select>
        </div>
        <div class="form-group">
             <label>Genre:<sup>*</sup></label>
            <select class="form-group" type="text" name="genre" required >
			<?php require('genres.php'); ?>
            </select>
        </div>
        <div class="form-group">
             <label>Select mp3 to upload:<sup>*</sup></label>
            <input class="form-group" type="file" name="songFile" required accept=".mp3">
        </div>
        <div class="form-group">
             <label>Select album cover for your song:<sup>*</sup></label>
            <input class="form-group" type="file" name="albumCover" required accept=".png,.jpg">
        </div>
        <div class="form-group">
             <label>Type in the lyrics:<sup>*</sup></label>
            <textarea name="lyrics" rows="4" cols="50" placeholder="Please ensure it contains the necessary song parts like choruses, verses and bridge" required></textarea>
        </div>
        <div class="form-group">
             <label>Is there any other thing you feel your fans should know about this song?<sup>*</sup></label>
            <textarea name="additionalComment" rows="4" cols="50" placeholder="..Like your youtube channel or website"></textarea>
        </div>

        <div id="submit_wrapper"> 
            <input type="submit" id="submitNewMember" name="submitNewCreator" class="btn btn-primary" value="Submit">
            <input type="reset" name="reset" class="btn btn-default" value="Reset">
        </div>
    </form>
<script src="/js/creatorsignup.js"></script>
<?php require ('footer.php'); 
?>