<?php
require ('../db/config.php');
//CHECK LOGIN EMAIL
 if (isset($_GET['checkEmail'])): 
        $query5 = 'SELECT email FROM member WHERE email="'.$_GET["checkEmail"].'"';
        $stmt5 = mysqli_query ($dbc,$query5);
		$row5 = mysqli_fetch_array($stmt5);
        if ($row5['email'] !== $_GET["checkEmail"]):
           $response = array('available'=>false);
           echo json_encode($response);
            exit;
        else:
            $response = array('available'=>true);
            echo json_encode($response);
            exit;
        endif;
 endif;
?>