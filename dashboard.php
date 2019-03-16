<?php require('top.php'); 
if(!$_SESSION['loggedIn']):
    echo 'You don\'t have a dashboard yet, please <a href="/signup.php">sign up</a> or <a href="/login.php">Log in</a> now.';
else:
?>
<div>Hey <?php echo $_SESSION['user']; ?>! How are you doing today?</div>
<div class="container">
	<div class="row">
		<div id="dashBoardMenu" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div id="editBio"class="dashBoardMenuButton cursor">Edit your profile</div>
			<div class="dashBoardMenuButton cursor">Song List</div>
			<div id="editSong" data-user="<?php echo $_SESSION['user']; ?>" class="dashBoardMenuButton cursor">Edit Your Song details</div>
			<?php //require ('feed.php'); ?>
			<div id="addNewSongButton" class="dashBoardMenuButton cursor">Add new song</div>
			<div id="addToPlaylistDashboard" class="dashBoardMenuButton cursor">Add more songs to playlist</div>
			<div class="dashBoardMenuButton cursor">Feed</div>
			<?php //require ('feed.php'); ?>
			<div class="dashBoardMenuButton cursor">Write Post</div>
			<?php //require ('writePost.php'); ?>
			<div class="dashBoardMenuButton cursor">Inbox</div>
			<?php //require ('writePost.php'); ?>
		</div>		
		<input id="userNameDashBoard" class="form-group" type="hidden"  required value="<?php echo $_SESSION['user']; ?>">      
		<input id="userEmailDashBoard" class="form-group" type="hidden"  required value="<?php echo $_SESSION['userEmail']; ?>" > 

		<div id="monitor" class="solidBorder col-lg-6 col-md-6 col-sm-6 col-xs-6">

		
		</div>
		<div id="playList" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
			<div>
				<div id="playListDiv">PLAYLIST</div>	
				<div id="usersListOfSongs"><?php require ('playList.php'); ?></div>
			</div>
		</div>
	</div>
</div>
<?php
endif;
?>
<?php //require ('extraControls.php'); ?>
<?php require ('mediaPlayer.php'); ?>
<?php require ('footer.php'); ?>
<script src="/js/dashboard.js"></script>