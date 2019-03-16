<?php
require ('../db/config.php');
session_start();
//LOGIN
 if (isset($_POST['submitNewLogIn'])): 
        $query5 = 'SELECT password,email,userName,membershipType FROM member WHERE email="'.$_POST["emailLogIn"].'"';
        $stmt5 = mysqli_query ($dbc,$query5);
		$row5 = mysqli_fetch_array($stmt5);
		if ($row5['email']==$_POST["emailLogIn"]&&password_verify($_POST['passwordLogIn'], $row5['password'])):
			ob_end_clean();
			$_SESSION['loggedIn']=true;
			$_SESSION['loggedInUserType']=$row5['membershipType'];
			$_SESSION['user']=$row5['userName'];
			$_SESSION['userEmail']=$row5['email'];
			header('Location: ../dashboard.php');
			exit;
	   endif;
		
 endif;
?>