<?php require('top.php'); 
?>
<!-- ADD PAGE HEADER -->
<div class="page-header text-center">
  <h1>Connect on ZijelaMusic</h1>
  <p>Discover, stream, and share a constantly expanding mix of music from emerging and major artists around the world.</p>
 <a href="/fanSignUp.php><button type="button" class="btn btn-danger">Sign up for free</button></a>
 or <a href="/creatorSignUp.php?type=creator"><button type="button" class="btn btn-danger">Upload your own</button></a>
 </div>
<!-- DIV FOR SONG -->
<?php if (isset($_GET['userName'])): 
            require('testDb.php');
            $testDb = new TestDb('SELECT * FROM member WHERE userName ="'.$_GET['userName'].'" AND membershipType="creator"');

            if ($testDb->answer === true):

                if (isset($_GET['song'])):
                ?>
                    <div class="container">
                       <div class="row">
                            <?php require('song.php'); 
                       $querySong = new Song($_GET['userName'],$_GET['song']);  
                       ?>  
                        </div>
                    </div> 
                <?php
                else:
                ?>
                    <div class="container">
                       <div class="row">
                            <?php require('creator.php'); 
                            $queryCreator = new Creator($_GET['userName']);
                            ?>
                        </div>
                    </div>
                <?php    
                endif;
            else:
                ob_end_clean();
                header("Location: index.php");
            endif;
            ?>
   

<?php else: ?>
<!-- INDEX -->
<!-- LOOP THROUGH TOP 30 DOWNLOADS-->
<?php require('main.php') ?>
<?php endif; ?>

<?php require ('explorer.php'); ?>
<?php require ('mediaPlayer.php'); ?>
<?php require ('footer.php'); ?>