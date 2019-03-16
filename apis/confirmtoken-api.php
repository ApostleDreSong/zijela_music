<?php
session_start();

if ($_POST['token']==$_SESSION['token']){
	//echo json_encode(array('correct'=>true));
	echo 'correct';
}