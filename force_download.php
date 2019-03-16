<?php
ob_start();
require_once ('db/config.php');
if (isset ($_POST['file_name'])):
    $counter=$_POST["download_counter"];
    $counter=$counter++;
    $query = 'UPDATE song SET downloadCounter='.$counter.' WHERE userName="'.$_POST['artiste_name'].'" AND songTitle="'.$_POST['song_title'].'"';
    $stmt = mysqli_query($dbc, $query);

    $myfile = 'http://music'.$_POST['file_name'];
	header('content-type:audio/mpeg');
	//header("Content-Length: " . filesize($myfile));
	header('content-disposition:attachment; filename="'.basename($myfile).'"');
	readfile($myfile);
	exit();
endif;
?>