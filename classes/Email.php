<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email,$nombre,$token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

 
    }

    public function enviarConfirmacion(){
        // Crear objeto email

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '9f370efa9c36a8';
        $mail->Password = 'e293e488e626ad';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF_8';

        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en App Salon, solo confirma presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui : <a href='https://calm-gorge-46266.herokuapp.com/confirmar-cuenta?token=" . $this->token ."'>Confirmar Cuenta</a></p>";
        $contenido .= "<p>Si no solicitaste este cambio o cuenta, por favor ignorar este correo</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar email

        $mail->send();

    }

    public function enviarInstrucciones(){

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '9f370efa9c36a8';
        $mail->Password = 'e293e488e626ad';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com','AppSalon.com');
        $mail->Subject = 'Reestablece tu password';
        $mail->isHTML(true);
        $mail->CharSet = 'UTF_8';

        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password sigue el siguiente enlace </p>";
        $contenido .= "<p>Presiona aqui : <a href='https://calm-gorge-46266.herokuapp.com/recuperar?token=" . $this->token ."'>Recuperar Password</a></p>";
        $contenido .= "<p>Si no solicitaste este cambio, por favor ignorar este correo</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //Enviar email

        $mail->send();

    }

}