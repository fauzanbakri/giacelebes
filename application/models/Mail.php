<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mail extends CI_Model {
	public function __construct() { 
                parent::__construct(); 
                
                require APPPATH.'libraries/phpmailer/src/Exception.php';
                require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
                require APPPATH.'libraries/phpmailer/src/SMTP.php';
                 
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){

	}
	function mail($to, $subject, $mailContent) {

        // PHPMailer object
            $response = false;
		    $mail = new PHPMailer();
	   

	    // SMTP configuration
		    $mail->isSMTP();
		    $mail->Host     = 'smtp.gmail.com';
		    $mail->SMTPAuth = true;
		    $mail->Username = 'port.makassar@gmail.com';
		    $mail->Password = 'uskesfhotjknqzrr';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port     = 587;

		    $mail->setFrom('admin@sisemocs.com', ''); // user email
		    $mail->addReplyTo('port.makassar@gmail.com', ''); //user email

		    // Add a recipient
		    $mail->addAddress($to); //email tujuan pengiriman email

		    // Email subject
		    $mail->Subject = $subject; //subject email

		    // Set email format to HTML
		    $mail->isHTML(true);

		    // Email body content
		    
		    $mail->Body = $mailContent;

		    // Send email
		    if(!$mail->send()){
		        echo 'Message could not be sent.';
		        echo 'Mailer Error: ' . $mail->ErrorInfo;
		    }else{
		        echo 'Message has been sent';
		    }
		    $mail->clearAddresses();
      		$mail->clearAttachments();
	}
}
