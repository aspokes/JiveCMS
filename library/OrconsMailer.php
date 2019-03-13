<?php

/**
 * Created by PhpStorm.
 * User: Chamamme Andrew
 * Date: 18/7/2018
 * Time: 11:48 AM
 * Orcons Systems Email Class
 */


use PHPMailer\PHPMailer\PHPMailer;


class OrconsMailer  {

    private $mail;
    public $status;
    public function __construct()
    {
        $this->mail =  new PHPMailer(true);
        $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'mail.k-pn.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'register@k-pn.com';                 // SMTP username
        $this->mail->Password = 'testregister';                           // SMTP password
        $this->mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465; //465;
        $this->mail->setFrom("register@k-pn.com");
		
//		$this->mail =  new PHPMailer(true);
//        $this->mail->SMTPDebug = 0;                                 // Enable verbose debug output
//        $this->mail->isSMTP();                                      // Set mailer to use SMTP
//        $this->mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
//        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
//        $this->mail->Username = 'f9cc1f660969b2';                 // SMTP username
//        $this->mail->Password = 'dc28a639689ecd';                           // SMTP password
          //$this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
//        $this->mail->Port = 2525; //465;
//        $this->mail->setFrom("register@k-pn.com");
		
		
    }


    /**
     * @param array $recipients
     * @param string $subject
     * @param string $message
     * @param array $attachments
     * @param bool $isHTML
     * @return PHPMailer|string
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send( $recipients,  $subject,  $message,  $isHTML=false){
        try{
            $this->mail->isHTML($isHTML);
            $this->mail->Subject = $subject;
            $this->mail->Body =$message;
            foreach ($recipients as $key=>$recipient){
                $this->mail->addAddress($recipient);
            }
            $this->mail->send();

        return $this->mail;

        }catch (phpmailerException $exception){
            return $this->status =  false;
        }
    }
    

    public function sendWithAttachment( $recipients,  $subject,  $message, $attachments = [],  $isHTML=false){
        try{
            $this->mail->isHTML($isHTML);
            $this->mail->Subject = $subject;
            $this->mail->Body =$message;
            foreach ($recipients as $key=>$recipient){
                $this->mail->addAddress($recipient);
            }
            foreach ($attachments as $attachment){
                $this->mail->addAttachment($attachment);
            }
            $this->mail->send();

            return $this->mail;

        }catch (phpmailerException $exception){
            return $this->status =  false;
        }
    }

}