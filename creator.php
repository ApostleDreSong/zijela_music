<?php
class Creator{

  public $userName;

	function __construct($userName) {
	    $this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());
        
        $this->userName = str_replace('-',' ',$userName);
        $query = 'SELECT * FROM member WHERE userName="'.$this->userName.'"';
        $stmt = mysqli_query ($this->dbc,$query);
        $row=mysqli_fetch_array($stmt);
        if ($row['sex']=='male'):
            $sex='his';
        else:
            $sex='her';
        endif;
        
	
        $fb=ob_get_contents();

        
        $fb = str_replace('property="og:url" content="https://music.zijela.com"', 'property="og:url" content="'. $row['userProfile'].'"', $fb);
        $fb = str_replace('property="og:title" content="ZijelaMUSIC"', 'property="og:title" content="Download all songs by '. $this->userName.' on music.zijela.com"', $fb);
        $fb = str_replace('property="og:image" content="/logo/gmh.png"', 'property="og:image" content="'. $row["profilePix"].'"', $fb);
        $fb = str_replace('property="og:image:alt" content="ZijelaMusic"', 'property="og:image:alt" content="'. $this->userName.'"', $fb);
        $fb = str_replace('property="og:description" content="ZijelaMusic is a music streaming platform that lets you listen to millions of songs from around the world, or upload your own. Start listening now!"', 'property="og:description" content="'. $row["bio"].'"', $fb);

        ob_end_clean();
        echo $fb;
?>	
	<div>Welcome to <?php echo ucfirst($this->userName); ?>'s page.</div>
			<div>Here you can find everything you need to know about <?php echo ucfirst($this->userName); ?>, download all <?php echo $sex; ?> songs and lyrics.</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="thumbnail">
							<img class="profile_pix" src="<?php echo  $row["profilePix"] ; ?>" alt="<?php echo  $row["userName"] ; ?> 's pix" />
						</div> 
						<div class="fb-share-button" data-href="https://music.zijela.com<?php echo $row6['songLink']; ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fmusic.zijela.com%2F<?php echo $this->userName; ?> ; ?>&amp;src=sdkpreparse">Share</a></div>
						<?php if($_SESSION['loggedIn']===true): ?>
						<div id="followButton" class="cursor" data-user="<?php echo $_SESSION['user']; ?>">follow</div>
						<?php else: ?>
						<div class="cursor" onclick="onlyUserscanFollow()" >follow</div>
						<?php endif; ?>
					</div>
					<div class="col-lg-8">
						<div>BIOGRAPHY</div>
						<div>Full Name: <?php echo $row["firstName"].' '.$row["lastName"]; ?></div>
						<div>Sex: <?php echo $row["sex"]; ?></div>
						<div>ABOUT <?php echo strtoupper($row["userName"]); ?>:</div>

						<div id="member_bio_read"><?php echo $row["bio"]; ?></div>

						<div>facebook name: <a target="_blank" href="facebook.com/<?php echo $row["fbName"]; ?>"><?php echo $row["fbName"]; ?></a></div>
						<div>twitter handle: <a target="_blank" href="twitter.com/<?php echo $row["twitterName"]; ?>"><?php echo $row["twitterName"]; ?></a></div>
						<div>instagram handle: <a target="_blank" href="instagram.com/<?php echo $row["igName"]; ?>"><?php echo $row["igName"]; ?></a></div>
					</div>
				</div>
			</div>
			<div>DISCOGRAPHY</div>
			<div>Below is a list of all songs by <?php echo ucfirst($this->userName); ?>. Click to download/Listen online:</div>
			<div class="container">	
				<?php
				$query5 = 'SELECT DISTINCT album FROM songs WHERE userName="'.$this->userName.'"';
				$stmt5 = mysqli_query($this->dbc, $query5);
				while ($row5 = mysqli_fetch_array($stmt5)):
				?>
			
				<div class="row">
				<div>ALBUM NAME: <?php echo $row5['album']; ?></div>
				<?php
					$query6 = 'SELECT * FROM songs WHERE album="'.$row5['album'].'" AND userName="'.$this->userName.'"';
					$stmt6 = mysqli_query($this->dbc, $query6);
					?>

					<?php
						while ($row6 = mysqli_fetch_array($stmt6)):
						?>
						  <div class="col-lg-3">
							<div><?php echo $row6['songTitle']; ?></div>
							<div class="thumbnail">
								<a href="<?php echo $row6['songLink']; ?>">
									<img class="img-responsive rounded" src="<?php echo  $row6["albumCover"] ; ?>" alt="<?php echo  $row6['songTitle'] ; ?> - <?php echo  $row6['userName'] ; ?>" />
								</a>
							</div> 
							<?php
							$playButtonCreator = new playButton ($row6['songFile'],$row6["userName"],$row6["songTitle"],$row6["lyrics"],$row6["albumCover"]);
							$playListWidgetCreator = new playListWidget($_SESSION['loggedIn'],$_SESSION['user'],$row6["songTitle"],$row6["userName"]);
							?>
						 </div>
					
				<?php					
					endwhile;
				?>
					</div>
				<?php
				endwhile;
				?>
				 
			</div>
		<div>Send a personal message to <?php echo ucfirst($this->userName); ?></div>

		<div>	
			<div>Your message: </div>
			<textarea id="messageForCreator" rows="4" cols="50" placeholder="Your message goes here" required="required"></textarea><br>
			<input type="submit" value="SEND MESSAGE" id="messageCreator">
		</div>	

        
<?php        

    }

}