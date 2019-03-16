  <div class="container">
 
       <p>Hear what’s trending for free in the ZijelaMusic community</p>
              <h3>We are rebranding our website. You can listen and download your favourite songs for the next seven days. We are coming back bigger and better.</h3>
       <div class="row">
            <?php
            $query = 'SELECT * FROM songs WHERE approved="YES"';
            $stmt = mysqli_query ($dbc,$query);
            $i=0;
            while ($row=mysqli_fetch_array($stmt)):
        	?>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
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