
<?php 
session_start();
require ('../db/config.php'); 
require ('../playButton.php'); 
require ('../playListWidget.php'); 
?>
   <div class="container">
       <div class="row">
            <?php
            $query = 'SELECT * FROM songs WHERE approved="YES"';
            $stmt = mysqli_query ($dbc,$query);
            $i=0;
            while ($row=mysqli_fetch_array($stmt)):
        	?>

                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
             <a href="<?php echo $row["songLink"]; ?>"> <img src="<?php echo $row["albumCover"]; ?>" alt="<?php echo $row["songTitle"]; ?> by <?php echo $row["userName"]; ?>" /></a>
			
                         <div><?php echo ucfirst($row["songTitle"]); ?></div>
                         <div><?php echo ucfirst($row["userName"]); ?></div>
						<?php
                         $playButtonIndex = new playButton ($row['songFile'],$row["userName"],$row["songTitle"],$row["lyrics"],$row["albumCover"]);
                         $i++;
						
						$playListWidget = new playListWidget($_SESSION['loggedIn'],$_SESSION['user'],$row["songTitle"],$row["userName"]);
						
                       ?>
					   
                 </div>


             <?php            
            endwhile;
            ?>
        </div>
        
    </div>