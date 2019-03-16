<?php
require('mail/mail_config.php');
class Mailer extends PHPMailer{
 
public $emailBody; 
public $email;
public $subject;
	function __construct($emailBody, $email, $subject) {
	    
        $this->emailBody = $emailBody;
        $this->email = $email;
	    
        $this->IsSMTP();    
        $this->SMTPDebug = 1;
        $this->SMTPAuth = TRUE;
        $this->SMTPSecure = "";
        $this->Port     = 25;
        $this->Username = "music@zijela.com";
        $this->Password = "people@8624";
        $this->Host     = "localhost";
        $this->Mailer   = "smtp";
        
        $this->SetFrom("music@zijela.com", "ZijelaMUSIC");
        $this->AddReplyTo("music@zijela.com", "ZijelaMUSIC");
        $this->ReturnPath="music@zijela.com";
        $this->IsHTML(true);
        $this->AddAddress($this->email);
        $this->Subject = $subject;
        $this->MsgHTML($this->emailBody);
        $this->Send();
    }
    
}


?>  
     
     
     
     
     
     
     
     
     
     
     
        