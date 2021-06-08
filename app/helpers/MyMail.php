<?php

namespace JOSE\app\helpers;

use JOSE\core\App;
use Swift_Message;
use Swift_SmtpTransport;
use Swift_Mailer;

class MyMail
{
    private $mailer;

    public function __construct ()
    {
        $config = App::get('config')['switfmail'];
        $transport = new Swift_SmtpTransport(
            $config['smtp_server'],
            $config['smtp_port'],
            $config['smtp_security']);


        $transport->setUsername($config['username']);
        $transport->setPassword($config['password']);

        $this->mailer = new Swift_Mailer($transport);
    }


    public function send (string $asunto, string $mailTo, string $nameTo, string $text) : bool
    {
        $config = App:: get('config')['switfmail'];
        $message = new Swift_Message($asunto);
        $message->setFrom([$config['email']=> $config['name']]);
        $message->setTo([$mailTo, $nameTo]);
        $message->setBody($text);

        $result = $this->mailer->send($message);

        return ($result === 1);
    }
}