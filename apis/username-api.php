<?php
require ('../db/config.php');
//CHECK USERNAME
 if (isset($_GET['checkUserName'])): 
        $query5 = 'SELECT userName FROM member WHERE userName="'.$_GET["checkUserName"].'"';
        $stmt5 = mysqli_query ($dbc,$query5);
        if (mysqli_num_rows($stmt5)!==0):
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