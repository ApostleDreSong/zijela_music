<?php
session_start();
require ('../db/config.php'); 

$updateOptions=['songTitle','album','genre','lyrics','additionalComment'];

if($_POST['freeDownload']!==''):
	if($_POST['freeDownload']=='yes, i want it downloaded free'):
		$freeDownload=1;	
		$sql = 'UPDATE songs SET freeDownload="'.$freeDownload.'" WHERE userName="'.$_SESSION['user'].'" AND songTitle="'.$_POST['songTitle'].'"';
		$query = mysqli_query($dbc, $sql);

	else: 
		$freeDownload=0;
		$sql = 'UPDATE songs SET freeDownload="'.$freeDownload.'" WHERE userName="'.$_SESSION['user'].'" AND songTitle="'.$_POST['songTitle'].'"';
		$query = mysqli_query($dbc, $sql);
	endif;
endif;

if($_FILES['albumCover']!==''):
	move_uploaded_file($_FILES['albumCover']['tmp_name'],str_replace(' ','-','../cover/'.$_SESSION['user'].'-'.$_POST['songTitle'].'.'.pathinfo($_FILES['albumCover']['name'],PATHINFO_EXTENSION)));
endif;

for ($i=0;$i<count($updateOptions);$i++):
	if($_POST[$updateOptions[$i]]!==''):
		$sql = 'UPDATE songs SET '.$updateOptions[$i].'="'.$_POST[$updateOptions[$i]].'" WHERE userName="'.$_SESSION['user'].'" AND songTitle="'.$_POST['songTitle'].'"';
		$query = mysqli_query($dbc, $sql);
	endif;	
endfor;