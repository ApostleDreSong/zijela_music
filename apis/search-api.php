<?php
require ('../db/config.php');
//SEARCH TEXT DIRECT
 if (isset($_GET['search'])): 
		$searchString="";
        $query5 = 'SELECT songTitle, songLink FROM songs where songTitle LIKE "%'.$_GET['search'].'%"';		
        $stmt5 = mysqli_query ($dbc,$query5);
		while($row5 = mysqli_fetch_array($stmt5)):
			$searchString.="<br>Song - <a class='soughtOut' href='".$row5['songLink']."'>".$row5['songTitle']."</a>";
		endwhile;
		$query6 = 'SELECT userName,userProfile FROM member where userName LIKE "%'.$_GET['search'].'%"';
        $stmt6 = mysqli_query ($dbc,$query6);
		while($row6 = mysqli_fetch_array($stmt6)):
		$searchString.="<br>Creator - <a class='soughtOut' href='".$row6['userProfile']."'>".$row6['userName']."</a>";
		endwhile;
		echo $searchString;
 endif;
?>