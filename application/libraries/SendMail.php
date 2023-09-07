<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require 'PHPMailer/PHPMailerAutoload.php';

class SendMail
{

    public $mail;

    public function __construct()
    {
		$this->mail = new PHPMailer; 
		$this->mail->isSMTP(); 
		// $this->mail->SMTPDebug = 2; 
		$this->mail->Debugoutput = 'html'; 
		$this->mail->Port = 25; 
		$this->mail->SMTPSecure = 'tls'; 
		$this->mail->SMTPAuth = true; 
		$this->mail->Username = "bayi2023@bayi.space"; 
		$this->mail->Password = "Bayi@2023";
		$this->mail->CharSet = 'UTF-8';
    }

    public function clearAddresses()
    {
        if(method_exists($this->mail, 'clearAddresses')) {
            $this->mail->clearAddresses();
        }
    }

    public function sendTo($toEmail = "djaem025@gmail.com", $recipientName = "jaem", $subject= "last testing", $msg = "ito na talaga")
    {
        // $this->mail->setFrom('bayi2023@bayi.space', 'BAYI');
        // $this->mail->addAddress($toEmail, $recipientName);
        // //$this->mail->isHTML(true); 
        // $this->mail->Subject = $subject;
        // $this->mail->Body = $msg;
        // if (!$this->mail->send()) {
        //     log_message('error', 'Mailer Error: ' . $this->mail->ErrorInfo);
            
        //     echo $this->mail->ErrorInfo;
        // }
        // return true;
        
        
        $config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "mail";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;


        $this->library('email');


        $this->email->initialize($config);

		$this->email->from("bayi2023@bayi.space", "BAYI");
		$this->email->to($toEmail, $recipientName);
		$this->email->subject($subject);
		$msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center>BAYI</center>";

		$this->email->message($msg);

		

		$this->email->send();


    }

}
