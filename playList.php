<?php
	$url = $_SERVER['DOCUMENT_ROOT']."/playList.json"; // path to your JSON file 
    $data = json_decode(file_get_contents($url),TRUE); // put the contents of the file into a variable 
	//if ($data['dresongs'] instanceof Countable):
		foreach ($data[$_SESSION['user']] as $list):
				echo '<div>'.$list['song'].'-'.$list['creator'].'</div>';
				$query = 'SELECT * FROM songs WHERE songTitle="'.$list['song'].'" AND userName="'.$list['creator'].'"';
				$stmt = mysqli_query ($dbc,$query);
				$row = mysqli_fetch_array($stmt);
				$playListButton = new playButton ($row['songFile'],$row["userName"],$row["songTitle"],$row["lyrics"],$row["albumCover"]);					 
				
		endforeach;
//	endif;
