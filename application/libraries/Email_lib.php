<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require FCPATH . 'vendor/autoload.php';

class Email_lib {

    public function __construct() {
        $this->CI =& get_instance();
        $this->mail = new PHPMailer(true);
        
    }

    public function Initialize($host,$username,$password,$port,$from_email,$from_name) {
        if ($port == 587) {
            $encnya = 'tls';
        }else{
            $encnya = 'ssl';
        }
        // Atur konfigurasi SMTP
        $this->mail->isSMTP();
        $this->mail->Host = $host;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $username;
        $this->mail->Password = $password;
        $this->mail->SMTPSecure = $encnya;
        $this->mail->Port = $port;
        $this->mail->setFrom($from_email, $from_name);
    }

    public function send_Email($to, $subject, $message, $isHTML = true) {
        // Atur penerima email dan subjek
        $this->mail->addAddress($to);
        $this->mail->Subject = $subject;
        if ($isHTML) {
            $this->mail->isHTML(true);
            $this->mail->Body = $message;
        } else {
            $this->mail->Body = $message;
        }
        try {
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>
