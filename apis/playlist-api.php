<?php
//ADD TO JSON PLAYLIST

if (isset($_POST['song'])&&isset($_POST['creator'])&&isset($_POST['user'])):
    $url = $_SERVER['DOCUMENT_ROOT']."/playList.json"; // path to your JSON file 
    $data = json_decode(file_get_contents($url),TRUE); // put the contents of the file into a variable

    $data[$_POST['user']][]=array("song"=>$_POST['song'],"creator"=>$_POST['creator']);
    $append=json_encode($data);
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/playList.json',$append);
endif; 

?>