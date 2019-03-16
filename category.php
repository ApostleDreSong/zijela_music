<?php
class Category{
    public $type;
    
    function __construct($type){
        $this->type = $type;
    
        //INITIALIZE DB
        $this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());
        ?>
        <div><?php echo $type; ?></div>
        <?php
        $query5 = 'SELECT DISTINCT '.$type.' FROM songs';
        $stmt5 = mysqli_query($this->dbc, $query5);
        $row5 = mysqli_fetch_array($stmt5);
        while ($row5 = mysqli_fetch_array($stmt5)):
        ?>
            <div><?php echo $row5['genre']; ?></div>
        <?php
            $query6 = 'SELECT * FROM songs WHERE '.$type.'="'.$row5['genre'].'"';
            $stmt6 = mysqli_query($this->dbc, $query6);
            while ($row6 = mysqli_fetch_array($stmt6)):
            ?>
            <div><?php echo $row6['songTitle']; ?></div>
            dont't forget to show album art song title and artiste
            <?php    
            endwhile;
        endwhile;
    }
}