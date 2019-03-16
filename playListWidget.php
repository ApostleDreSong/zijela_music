
			   
<?php
class playListWidget{
        public $loggedIn;
        public $user;
        public $songTitle;
        public $creator;
        public $songInDb;
        public $creatorInDb;
		
	function __construct($loggedIn,$user,$songInDb,$creatorInDb) {
	    $this->loggedIn = $loggedIn;
		$this->user = $user;
		$this->songInDb = $songInDb;
		$this->creatorInDb = $creatorInDb;
		$this->playListVariable='<div class="dashboardAdd playListAdd" data-songindb="'.$this->songInDb.'" data-creatorindb="'.$this->creatorInDb.'" data-user="'.$this->user.'"> ADD TO YOUR PLAYLIST</div>';

?>
			<?php if ($this->loggedIn===true):?>
			
						<?php
						//CHECK JSON DATA FOR PLAYLIST

						$url =  $_SERVER['DOCUMENT_ROOT']."/playList.json"; // path to your JSON file 
						$data = json_decode(file_get_contents($url),TRUE); // put the contents of the file into a variable
						//change to accomodate for empty
							for($i=0;$i<count($data[$this->user]);$i++):
							
								if($data[$this->user][$i]['song']==$this->songInDb&&$data[$this->user][$i]['creator']==$this->creatorInDb):

								$this->playListVariable = '<div class="cursor playListAdd">ADDED TO PLAYLIST</div>';
											
										break;
								endif;
							endfor;
			   else:
					$this->playListVariable = '<div  class="cursor" onclick="tellUserTojoin()"> ADD TO YOUR PLAYLIST</div>';   

			   endif;
				echo $this->playListVariable;
			   ?>

<?php
	}
}