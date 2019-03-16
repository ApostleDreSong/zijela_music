<?php
ob_start();
require ('../db/config.php');
//CHECK LOGIN PASSWORD
 if (isset($_POST['LoginPassword'])): 
        $query5 = 'SELECT password FROM member WHERE email="'.$_POST["LoginEmail"].'"';
        $stmt5 = mysqli_query ($dbc,$query5);
		$row5 = mysqli_fetch_array($stmt5);
        if (!password_verify($_POST['LoginPassword'], $row5['password'])):
           $response = array('correct'=>false);
           echo json_encode($response);
            exit;
        else:
            $response = array('correct'=>true);
            echo json_encode($response);
            exit;
        endif;
 endif;
?>