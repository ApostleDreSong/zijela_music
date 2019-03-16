<?php
require ('../db/config.php');
require ('../newsong.php');
require ('../mailer.php');
//ADD NEW SONG FROM DASHBOARD
if (isset($_POST['newSongDashBoard'])):
	move_uploaded_file($_FILES['mp3']['tmp_name'],'..'.$_POST['songFile']);
	move_uploaded_file($_FILES['cover']['tmp_name'],'..'.$_POST['albumCover']);
	
	$broadcastEmailBody = '<p>Dear Zijelan, <br>' . $_POST['userName'] . ' just released a new song titled ' . $_POST['songTitle'] . '
			on <a href="https://music.zijela.com">ZijelaMUSIC</a>.
			<br>Here is the link to the song: <a href="https://music.zijela.com'.$_POST['songLink'].'">https://music.zijela.com'.$_POST['songLink'].'</a>.
			<br>Feel free to comment on the song page and share your thoughts with the singer. You are also free to share it with friends and on your social media pages.</p>
			<br>All the best. We love you<br>
			<br>Admin,<br>
			<br>music@zijela.com<br>
			<br>ZijelaMUSIC. </p>';


	$newSongDashBoardEmailBody = '<p>Dear '.$_POST['userName'].',<br>Your first song titled ' . $_POST['songTitle'] . ' has been released on <a href="http://music.zijela.com">ZijelaMUSIC</a>.
				<br>Here is the link to the song: <a href="'.$_POST['songLink'].'">https://music.zijela.com'.$_POST['songLink'].'</a>.
				<br>Feel free to comment on the song page and share your thoughts with family and friends. You can also share it on your social media pages.</p>
				<br>All the best. We love you<br>
				<br>Admin,
				<br>music@zijela.com
				<br>ZijelaMUSIC. </p>';
	
	$newSongDashBoard = new AddSong ($_POST['userName'],$_POST['songTitle'], $_POST['album'],$_POST['songFile'], $_POST['genre'],$_POST['albumCover'], $_POST['lyrics'], $_POST['additionalComment'],$_POST['songLink'],$_POST['freeDownload']);
	$newSongDashBoardMail = new Mailer ($newSongDashBoardEmailBody, $_POST['userEmail'], 'NEW SONG UPLOADED');
	//BROADCAST
	$query5 = 'SELECT email FROM member WHERE userName !="'.$_POST['userName'].'"';
	$stmt5 = mysqli_query($dbc, $query5);
	while ($row5 = mysqli_fetch_array($stmt5)):
	$broadcastMail = new Mailer ($broadcastEmailBody, $row5['email'], 'NEW SONG ON ZIJELA MUSIC');
	endwhile;
	
endif;