<?php
ob_start();
if (isset ($_POST['lyrics'])) {
	
	$file = fopen($_POST['artiste_name'].'-'.$_POST['song_title'].".txt", "w");
	fwrite($file, $_POST['lyrics']);
	fclose($file);
	$myfile='http://music/'.$_POST['artiste_name'].'-'.$_POST['song_title'].'.txt';
	header('content-type:text/plain');
	header("Content-Length: " . filesize($myfile));
	header('content-disposition:attachment; filename="'.basename($myfile).'"');
	readfile($myfile);
	unlink($myfile);
	exit();

}

