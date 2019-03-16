<?php
class playButton{

  public $songFile;

	function __construct($songFile,$userName,$songTitle,$lyrics,$albumCover) {
	    $this->songFile = $songFile;
		$this->userName = $userName;
		$this->songTitle = $songTitle;
		$this->lyrics = $lyrics;
		$this->albumCover = $albumCover;
		
?>
<div class="music-play" data-songfile="<?php echo $this->songFile; ?>" data-username="<?php echo $this->userName; ?>" data-songtitle="<?php echo $this->songTitle; ?>" data-lyrics="<?php echo $this->lyrics; ?>" data-albumcover="<?php echo $this->albumCover; ?>">PLAY</div>
<?php
	}
}