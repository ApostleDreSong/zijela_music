<?php require('top.php'); 
?>		
			<div class="container">	
				<?php
				$query5 = 'SELECT DISTINCT genre FROM songs';
				$stmt5 = mysqli_query($dbc, $query5);
				while ($row5 = mysqli_fetch_array($stmt5)):
				?>
			
				
				<div><?php echo strtoupper($row5['genre']); ?></div>
				<div class="row flex">
				<?php
					$query6 = 'SELECT * FROM songs WHERE genre="'.$row5['genre'].'"';
					$stmt6 = mysqli_query($dbc, $query6);
					?>

					<?php
						while ($row6 = mysqli_fetch_array($stmt6)):
						?>
						  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
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
<?php require ('mediaPlayer.php'); ?>
<?php require ('footer.php'); ?>