<?php
//CREATE NEW FAN
    if (isset($_POST['submitNewFan'])): 
        require ('membership.php'); 
        require ('mailer.php');


                $welcomeEmailBody = 'Dear '.$_POST['userName'].', Welcome to Zijela. Here is a link to your music dashboard on https://music.zijela.com/login.php. There is so much you can do on your dashboard. Explore! <br>All the best. <br>We love you.<br>Dresongs,<br>CEO, ZijelaMUSIC';


                //NEW FAN
                $newFan = new Membership ();
                $newFan->addFan($_POST['userName'],password_hash($_POST['password'],PASSWORD_DEFAULT), $_POST['firstName'], $_POST['lastName'], $_POST['dob'],$_POST['sex'],$_POST['phone'], $_POST['email'],date('Y-m-d'),'fan');
                $newMemberMail = new Mailer ($welcomeEmailBody, $_POST['email'],  'WELCOME TO ZIJELA!');
       		$_SESSION['loggedIn']=true;
			$_SESSION['user']=$_POST['userName'];
		    $_SESSION['userEmail']=$_POST['email'];
			$_SESSION['loggedInUserType']='fan';
	   ob_end_clean();
       header('Location: ../dashboard.php');
    endif;
?>