<?php
require ('../db/config.php');
//LOGIN
	$query5 = 'UPDATE member SET password="'.password_hash($_POST['newPassword'],PASSWORD_DEFAULT).'" WHERE email="'.$_POST["emailLogIn"].'"';
		if ($stmt5 = mysqli_query ($dbc,$query5)):
			$query6 = 'SELECT membershipType, userName FROM member WHERE email="'.$_POST["emailLogIn"].'"';
			$stmt6 = mysqli_query ($dbc,$query6);
			$row6 = mysqli_fetch_array($stmt6);

			$_SESSION['loggedIn']=true;
			$_SESSION['loggedInUserType']=$row6['membershipType'];
			$_SESSION['user']=$row6['userName'];
			$_SESSION['userEmail']=$_POST['emailLogIn'];
			echo 'updated';
	   endif;
?>