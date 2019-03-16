<?php
class Song{

  public $userName;
  public $song;

	function __construct($userName,$song) {
	    $this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());
        
        $this->userName = str_replace('-',' ',$userName);
        $this->song = str_replace('-',' ',$song);
        
        
    $query = 'SELECT * FROM songs WHERE userName="'.$this->userName.'" AND songTitle="'.$this->song.'"';
    $stmt = mysqli_query ($this->dbc,$query);
    $row=mysqli_fetch_array($stmt);
    if ($row['approved']=='no'):
        exit;
    endif;
	
	$query7 = 'SELECT sex FROM member WHERE userName="'.$this->userName.'"';
    $stmt7 = mysqli_query ($this->dbc,$query7);
    $row7=mysqli_fetch_array($stmt7);
	if ($row7['sex']=='male'):
		$sex='his';
	else:
		$sex='her';
	endif;
?>    
    <div id="song_heading"><?php echo ucfirst($this->userName); ?> - <?php echo ucfirst($this->song); ?></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-3">
					<div class="row ">
						<div>
							<div class="thumbnail">
								<img class="img-responsive rounded" src="<?php echo  $row["albumCover"] ; ?>" alt="<?php echo  $this->song ; ?> - <?php echo  $this->userName ; ?>" />
							</div>
							<?php $playButtonSong = new playButton ($row['songFile'],$row["userName"],$row["songTitle"],$row["lyrics"],$row["albumCover"]);
								$playListWidgetSong = new playListWidget($_SESSION['loggedIn'],$_SESSION['user'],$row["songTitle"],$row["userName"]);
							?>
							<div><?php echo $row["downloadCounter"]; ?> stream<?php if($row["downloadCounter"]>1){echo 's';} ?> </div>
						   <div class="fb-like" data-href="<?php echo $row['songLink']; ?>" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
							<a class="twitter-share-button" href="<?php echo $row['songLink']; ?>" data-size="large">Tweet</a>
							<a href="whatsapp://send?text=<?php echo $row['songLink']; ?>" data-action="share/whatsapp/share">Share via Whatsapp</a>
							<?php if ($row['freeDownload']==1): ?>
							<form action="/force_download.php" method="post">
								<input type="hidden" name="file_name" value="<?php echo $row["songFile"]; ?>"/>
								<div id="submit_wrapper">
								<input type="hidden" name="artiste_name" value="<?php echo $this->userName; ?>"/>
								<input type="hidden" name="song_title" value="<?php echo $this->song; ?>"/>
								<input type="hidden" name="download_counter" value="<?php echo $row["downloadCounter"]; ?>"/>
								<input id="download" type="submit" value="DOWNLOAD MP3"/>
								</div>
							</form>
							<?php
							else:
							?>
							<form action="" method="post">
								<input type="hidden" name="file_name" value="<?php echo $row["songFile"]; ?>"/>
								<div id="submit_wrapper">
								<input type="hidden" name="artiste_name" value="<?php echo $this->userName; ?>"/>
								<input type="hidden" name="song_title" value="<?php echo $this->song; ?>"/>
								<input type="hidden" name="download_counter" value="<?php echo $row["downloadCounter"]; ?>"/>
								<input id="download" type="submit" value="PURCHASE MP3"/>
								</div>
							</form>
							<?php
							endif;	  
							?>
							<div>Want to know more about <?php echo $this->userName; ?>? Check out <?php echo $sex; ?> <a href="/<?php echo str_replace(' ','-',$this->userName); ?>">BIO</a></div>

						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-10">
					<?php 
					if(!empty($row["fbName"])):
					?>   
										<div style="color:blue;">Facebook profile: <a target="_blank" href="https://www.facebook.com/<?php echo $row["fbName"]; ?>"><?php echo $row["fbName"]; ?></a></div>

					<?php
					endif;
					if(!empty($row["twitterName"])):
					?>
						
										<div style="color:blue;">Twitter profile: <a target="_blank" href="https://www.twitter.com/<?php echo $row["twitterName"]; ?>"><?php echo $row["twitterName"]; ?></a></div>
					<?php
					endif;
					if(!empty($row["igName"])):
					?>
						
										<div style="color:blue;">Instagram profile: <a target="_blank" href="https://www.instagram.com/<?php echo $row["igName"]; ?>"><?php echo $row["igName"]; ?></a></div>
					<?php
					endif;
						if(!empty($row["youtube"])):
					?>
						
										<div style="color:blue;">Youtube Link: <a target="_blank" href="<?php echo $row["youtube"]; ?>"><?php echo $row["youtube"]; ?></a></div>
					<?php endif; ?>
							  
						<div>Lyrics</div>
						<div>
						   <?php echo nl2br($row["lyrics"]); ?>
						</div>

							<form action="/lyric_download.php" method="post">
								<input type="hidden" name="lyrics" value="<?php echo $row["lyrics"]; ?>"/>
								<input type="hidden" name="lyricsName" value="<?php echo $row["songLink"]; ?>"/>
								<div id="submit_wrapper">
								<input type="hidden" name="artiste_name" value="<?php echo $this->userName; ?>"/>
								<input type="hidden" name="song_title" value="<?php echo $this->song; ?>"/>
								<input id="download" type="submit" value="DOWNLOAD LYRIC"/>
								</div>
							  </form>
				</div>
			</div>
		</div>
    <!-- ADD FACEBOOK COMMENT -->
	<div>What do you feel about this song?</div>
    <div class="fb-comments" data-href="https://music.zijela.com/<?php echo $row["songLink"]; ?>" data-numposts="20"></div>
    
    <!-- OTHER SONGS BY SAME CREATOR -->
	<div class="container">
		<div class="row">
		<div> More songs from <?php echo $this->userName; ?></div>
            <?php
            $query6 = 'SELECT * FROM songs WHERE userName="'.$this->userName.'" AND songTitle!="'.$this->song.'"';
            $stmt6 = mysqli_query($this->dbc, $query6);
            while ($row6 = mysqli_fetch_array($stmt6)):
            ?>
			  <div class="col-lg-3">
				<div><?php echo $row6['songTitle']; ?></div>
			 <div class="thumbnail"><a href="<?php echo $row6['songLink']; ?>">
					<img class="img-responsive rounded" src="<?php echo  $row6["albumCover"] ; ?>" alt="<?php echo  $row6['songTitle'] ; ?> - <?php echo  $row6['userName'] ; ?>" />
				</a></div> 
				<?php $playButtonOtherSongs = new playButton ($row6['songFile'],$row6["userName"],$row6["songTitle"],$row6["lyrics"],$row6["albumCover"]);
				$playListWidgetOtherSongs = new playListWidget($_SESSION['loggedIn'],$_SESSION['user'],$row["songTitle"],$row["userName"]);?>
			  </div>
				<?php 
            endwhile;
            ?>
		</div>
    </div>

<?php

	}
	
}

