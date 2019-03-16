<?php
session_start();
require ('../db/config.php'); 

$updateOptions=['songTitle','album','genre','lyrics','additionalComment'];

if($_FILES['profilePix']!==''):
	move_uploaded_file($_FILES['profilePix']['tmp_name'],str_replace(' ','-','../profiles/'.$_SESSION['user'].'.'.pathinfo($_FILES['profilePix']['name'],PATHINFO_EXTENSION)));
endif;

 foreach ($_POST as $key => $value){
	if ($_POST[$key]!==''):
		$sql = 'UPDATE member SET '.$key.'="'.$value.'" WHERE userName="'.$_SESSION['user'].'"';
		$query = mysqli_query($dbc, $sql);
	endif;
} 