<?php
require($_SERVER['DOCUMENT_ROOT'].'/getID3-1.9.15/getid3/getid3.php');
require($_SERVER['DOCUMENT_ROOT'].'/getID3-1.9.15/getid3/write.php');
class AddSong extends getid3_writetags{
    public $userName;
    public $email;
    public $songTitle;
    public $album;
    public $songFile;
    public $genre;
    public $albumCover;
    public $lyrics;
    public $additionalComment;
    public $TextEncoding;
    public $getID3;
    public $songLink;
	public $freeDownload;
    
    function __construct($userName,$songTitle,$album,$songFile,$genre,$albumCover,$lyrics,$additionalComment,$songLink,$freeDownload) {
        
        $this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());
        
        $this->userName = $userName;
        $this->songTitle = $songTitle;
        $this->album = $album;
        $this->songFile = str_replace(' ','-',$songFile);
        $this->genre = $genre;
        $this->albumCover = str_replace(' ','-',$albumCover);
        $this->lyrics = $lyrics;
        $this->additionalComment = $additionalComment;
        $this->songLink=$songLink;
		$this->freeDownload=$freeDownload;

        $this->TextEncoding = 'UTF-8';
                // Initialize getID3 tag-writing module
        $this->getID3 = new getID3;
        // Initialize getID3 engine
        $this->getID3->setOption(array('encoding'=>$this->TextEncoding));
        
        //$tagwriter->tagformats = array('id3v1', 'id3v2.3');
        $this->tagformats = array('id3v2.3');
        
        // set various options (optional)
        $this->overwrite_tags    = true;  // if true will erase existing tag data and write only passed data; if false will merge passed data with existing tag data (experimental)
        $this->remove_other_tags = false; // if true removes other tag formats (e.g. ID3v1, ID3v2, APE, Lyrics3, etc) that may be present in the file and only write the specified tag format(s). If false leaves any unspecified tag formats as-is.
        $this->tag_encoding      = $this->TextEncoding;
        $this->remove_other_tags = true;
        //AUDIO TAGGING DONE
        
        $this->changeMetaData();
        $this->insertSong();

    }
     
	function insertSong() {

		$query1='INSERT INTO `songs`(`userName`, `songTitle`,`album`, `songFile`, `genre`, `albumCover`,`lyrics`,`additionalComment`,`songLink`,`freeDownload`) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $stmt1 = mysqli_prepare($this->dbc, $query1);
        mysqli_stmt_bind_param($stmt1,'ssssssssss', $this->userName,$this->songTitle,$this->album,$this->songFile,$this->genre,$this->albumCover,$this->lyrics,$this->additionalComment,$this->songLink,$this->freeDownload);
        
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_close($stmt1);
	}
	
	    function changeMetaData(){
	    /** change song metadata */
                    //Add metadata
                    // populate data array

                    $TagData = array(
                        'artist' => array(strtoupper($this->userName.'||music.zijela.com')),
                        'title'                  => array(strtoupper($this->songTitle).'||music.zijela.com'),
                        'album'                  => array('music.zijela.com'),
                        'comment'                => array('contact us on 2348182818327/2348136776626/music@zijela.com for your gospel music upload, promotion and concert/worship meetings publicity'),
                        'genre'                  => array($this->genre),
                        'unsychronised_lyric'    =>  array ( $this->lyrics ),
                    );

                    $albumCoverPath='..'.$this->albumCover;
                    $fd = fopen($albumCoverPath, 'rb');
                    $APICdata = fread($fd, filesize($albumCoverPath));
                    fclose($fd);
                    if($APICdata) {
                        $TagData += array(
                            'attached_picture' => array(0 => array(
                                'data'          => $APICdata,
                                'picturetypeid' => '0x03',
                                'description'   => 'cover',
                                'mime'          => 'image/'.pathinfo($albumCoverPath, PATHINFO_EXTENSION)
                            ))
                        );
                    }



                    $this->filename = $this->songFile;
                    $this->tag_data = $TagData;

                    // write tags
                    if($this->WriteTags()){
                        echo 'tagged';
                    }

                    //Metadata done
	}
	
}