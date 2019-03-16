<?php
require ('../db/config.php');
//CREATE NEW MEMBER
    if (isset($_POST['submitNewCreator'])): 
        require ('membership.php'); 
        require ('newSong.php');
        require ('mailer.php');
            //profilePix
            $profilePix = str_replace(' ','-','/profiles/'.$_POST["userName"].'.'.pathinfo($_FILES['profilePix']['name'], PATHINFO_EXTENSION));
            
            //albumCover 
            list($albumArtWidth, $albumArtHeight) = getimagesize($_FILES['albumCover']['tmp_name']);
            $albumCoverExtension = pathinfo($_FILES['albumCover']['name'], PATHINFO_EXTENSION);
            $albumCoverExtension;
            $albumCover = str_replace(' ','-','/cover/'.$_POST["userName"].'-'.$_POST["songTitle"].'.'.$albumCoverExtension);
            //songFile
            $songFileExtension = pathinfo($_FILES['songFile']['name'], PATHINFO_EXTENSION);
            $songFile = str_replace(' ','-','/songs/'.$_POST["userName"].'-'.$_POST["songTitle"].'.'.$songFileExtension);
            $songLink=str_replace(' ','-','/'.$_POST['userName'].'/'.$_POST['songTitle']);
            $userProfile = str_replace(' ','-','/'.$_POST['userName']);
            //CHECK FOR COMPLIANCE
            $uploadOk = 1;
            if ($_POST['freeDownload']=='yes, i want it downloaded free'):
				$freeDownload=1;
			else:
				$freeDownload=0;
			endif;

            if ($albumArtWidth < 400 || $albumArtHeight < 400 || $albumArtWidth !== $albumArtHeight):
                $uploadOk = 0;

                echo '*<span class="uploadError">Kindly upload an album art with equal dimensions not lesser than 400x400 px.</span><br>';
            endif;
            if ($_FILES["songFile"]["size"] > 10000000):
                $uploadOk = 0;
                echo '<br>*<span class="uploadError">Please ensure that your song is not greater than 10MB </span><br>';
            endif;
            if ($_FILES["albumCover"]["size"] > 100000):
                $uploadOk = 0;
                echo '*<span class="uploadError">We do not allow album arts bigger than 100kB</span><br>';
            endif;

            // Allow certain file formats
            if ($songFileExtension != "mp3" && $songFileExtension != "MP3"):
                echo $songFileExtension;
                $uploadOk = 0;
                echo '*<span class="uploadError">Only mp3 files are allowed</span><br>';
            endif;
            if ($albumCoverExtension != "jpg" && $albumCoverExtension != "JPG" && $albumCoverExtension!="png" && $albumCoverExtension!="PNG"):
                echo $albumCoverExtension;
                $uploadOk = 0;
                echo '*<span class="uploadError">Upload an album art with a jpg or png extension only</span><br>';
            endif;
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0):
                echo '*<span class="uploadError">Sorry, your file was not uploaded. Kindly click the back button</span><br>';
                // if everything is ok, try to upload file
            else:

                move_uploaded_file($_FILES['songFile']['tmp_name'], $songFile); 
                move_uploaded_file($_FILES['albumCover']['tmp_name'], $albumCover);
                move_uploaded_file($_FILES['profilePix']['tmp_name'], $profilePix);

                if($_POST['album']==""):
                    $_POST['album']="single";
                endif;
                $welcomeEmailBody = 'Dear '.$_POST['userName'].', Welcome to Zijela. Here is a link to your music dashboard: '.$userProfile.' You can login to your dashboard on https:music.zijela.com/login.php. This is a link to your profile: '.$userProfile.' All the best in your music career. <br>We love you.<br>Dresongs,<br>CEO, ZijelaMUSIC';
                $firstSongEmailBody = '<p>Dear '.$_POST['userName'].',<br>Your first song titled ' . $_POST['songTitle'] . ' has been released on <a href="http://music.zijela.com">ZijelaMUSIC</a>.
                            <br>Here is the link to the song: <a href="'.$songLink.'">'.$songLink.'</a>.
                            <br>Feel free to comment on the song page and share your thoughts with family and friends. You can also share it on your social media pages.</p>
                            <br>All the best. We love you<br>
                            <br>Admin,
                            <br>music@zijela.com
                            <br>ZijelaMUSIC. </p>';
                
                $broadcastEmailBody = '<p>Dear Zijelan, <br>' . $_POST['userName'] . ' just released a new song titled ' . $_POST['songTitle'] . '
                            on <a href="https://music.zijela.com">ZijelaMUSIC</a>.
                            <br>Here is the link to the song: <a href="'.$songLink.'">'.$songLink.'</a>.
                            <br>Feel free to comment on the song page and share your thoughts with the singer. You are also free to share it with friends and on your social media pages.</p>
                            <br>All the best. We love you<br>
                            <br>Admin,<br>
                            <br>music@zijela.com<br>
                            <br>ZijelaMUSIC. </p>';
                
                //NEW MEMBER
                $newMember = new Membership ();
                $newMember->addCreator($_POST['userName'],$userProfile, password_hash($_POST['password'],PASSWORD_DEFAULT), $_POST['firstName'], $_POST['lastName'], $_POST['dob'], $profilePix, $_POST['sex'], $_POST['bio'], $_POST['phone'], $_POST['email'], $_POST['fbName'], $_POST['twitterName'], $_POST['igName'],date('Y-m-d'),'creator');
                $newMemberMail = new Mailer ($welcomeEmailBody, $_POST['email'], 'WELCOME TO ZIJELA!');
                //FIRST SONG
                $firstSong = new AddSong ($_POST['userName'],$_POST['songTitle'], $_POST['album'],$songFile, $_POST['genre'],$albumCover, $_POST['lyrics'], $_POST['additionalComment'],$songLink,$freeDownload);
                $firstSongMail = new Mailer ($firstSongEmailBody, $_POST['email'], 'NEW SONG UPLOAD');
                //BROADCAST
                $query5 = 'SELECT email FROM member WHERE userName !="'.$_POST['userName'].'"';
                $stmt5 = mysqli_query($dbc, $query5);
                while ($row5 = mysqli_fetch_array($stmt5)):
                $broadcastMail = new Mailer ($broadcastEmailBody, $row5['email'],  'NEW SONG ON ZIELA MUSIC');
                endwhile;

            endif;
			$_SESSION['loggedIn']=true;
			$_SESSION['user']=$_POST['userName'];
			$_SESSION['userEmail']=$_POST['email'];
			$_SESSION['loggedInUserType']='creator';
            ob_end_clean();
        header('Location: ../dashboard.php');
    endif;
