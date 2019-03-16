<?php
class Membership{

  public $userName;
  public $password;
  public $firstName;
  public $lastName;
  public $dob;
  public $profilePix;
  public $sex;
  public $bio;
  public $phone;
  public $email;
  public $fbName;
  public $twitterName;
  public $igName;
  public $membershipDate;
  public $membershipType;
  public $userProfile;
	function __construct() {
    	
    	
    	$this->dbc = mysqli_connect('localhost','codeafri_dresongs','people@8624','codeafri_mygospel')
        or die("Error in connection: " .mysqli_connect_error());

    	
	}
	
	function addCreator( $userName, $userProfile,$password, $firstName, $lastName, $dob, $profilePix, $sex, $bio, $phone, $email, $fbName, $twitterName, $igName, $membershipDate, $membershipType) {
	    
	    $profilePix = str_replace(' ','-',$profilePix);
	    $userProfile=$userProfile;
	    
        $query1='INSERT INTO `member` (`userName`,`userProfile`,`password`,`firstName`,`lastName`,`dob`,`profilePix`,`sex`,`bio`,`phone`,`email`,`fbName`,`twitterName`,`igName`,`membershipDate`,`membershipType`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $stmt1 = mysqli_prepare($this->dbc, $query1);
        mysqli_stmt_bind_param($stmt1,'ssssssssssssssss', $userName,$userProfile,$password, $firstName,$lastName,$dob,$profilePix,$sex,$bio,$phone,$email,$fbName,$twitterName,$igName,$membershipDate,$membershipType);
        if(mysqli_stmt_execute($stmt1)):
            echo 'WELCOME TO ZIJELA '.$this->userName.'. NOW YOU CAN RULE YOUR WORLD';
        endif;
        mysqli_stmt_close($stmt1);
	    
	}
    
    	function addFan( $userName, $password, $firstName, $lastName, $dob, $sex,$phone, $email,$membershipDate, $membershipType) {
    	    echo 'new FAN CREATED';
    	   
    	    
        $query1='INSERT INTO `member` (`userName`,`password`,`firstName`,`lastName`,`dob`,`sex`,`phone`,`email`,`membershipDate`,`membershipType`) VALUES (?,?,?,?,?,?,?,?,?,?)';
  
        
        
        $stmt1 = mysqli_prepare($this->dbc, $query1);
        mysqli_stmt_bind_param($stmt1,'ssssssssss', $userName,$password, $firstName,$lastName,$dob,$sex,$phone,$email,$membershipDate,$membershipType);
        if(mysqli_stmt_execute($stmt1)):
            echo 'WELCOME TO ZIJELA '.$this->userName.'. NOW YOU CAN ENJOY THE BEST SONGS';
        endif;
        mysqli_stmt_close($stmt1);
	    
	}
}


?>