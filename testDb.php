<?php

class TestDb{
    public $query;
    
    function __construct($query){
  
    $this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());
        $this->query = $query;
                
        $stmt5 = mysqli_query($this->dbc, $query);
        if (mysqli_num_rows($stmt5)>0):
            $this->answer = true;
            return $this->answer;
        else:
            $this->answer = false;
            return $this->answer;
            
        endif;
    }
    
    
}