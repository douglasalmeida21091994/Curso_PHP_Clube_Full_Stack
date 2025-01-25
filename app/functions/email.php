<?php
    
function send(array $data) {
    $email = new PHPMailer\PHPMailer\PHPMailer();
    $email->CharSet = 'UTF-8';
    $email->SMTPSecure = 'plain';
    $email->isSMTP();
    $email->Host = 'sandbox.smtp.mailtrap.io';
    $email->Port = 465;
    $email->SMTPAuth = true;
    $email->Username = 'd52a5e45e379a9';
    $email->Password = '1b87c0e650d0dd';
    $email->isHTML(true);
    $email->setFrom('dougalmeida@gmail.com'); // Email que vai enviar
    $email->FromName = $data['quem']; // Nome do remetente
    $email->addAddress($data['para']); // Email que vai receber
    $email->Body = $data['message'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'Nome: ' . $_POST['name'] . 'Email: ' . $_POST['email'] . 'Assunto: ' . $_POST['assunto'] . 'Mensagem: ' . $_POST['message'];
    $email->msgHTML($data['message']);

     return $email->send();

    // echo $email->ErrorInfo;
    

}