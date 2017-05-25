<?php
namespace ABC\EasyMailBundle\Clases;
use ABC\EasyMailBundle\Clases\TemplateBody;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mail{
    
    protected $from;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $reply;
    protected $subject;
    protected $body;
    protected $settings; 
    protected $templeBody;
   
    function __construct($from,$reply) {
        $this->from  = $from;
        $this->reply = $reply;
    }

        
    function getFrom() {
        return $this->from;
    }

    function getTo() {
        return $this->to;
    }

    function getCc() {
        return $this->cc;
    }

    function getBcc() {
        return $this->bcc;
    }

    function getReply() {
        return $this->reply;
    }

    function getSubject() {
        return $this->subject;
    }

    function getBody() {
        return $this->body;
    }

    function setFrom($from) {
        $this->from = $from;
    }

    function setTo($to) {
        $this->to = $to;
    }

    function setCc($cc) {
        $this->cc = $cc;
    }

    function setBcc($bcc) {
        $this->bcc = $bcc;
    }

    function setReply($reply) {
        $this->reply = $reply;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }

    function setBody($body) {
        $this->body = $body;
    }

    function getSettings() {
        return $this->settings;
    }
    
    function setSettings($settings) {
        if (array_key_exists('theme', $settings)) {
            $this->templeBody->setTheme($settings['theme']);
        }
        if (array_key_exists('from', $settings)) {
            $this->from = $settings['from'];
        }
        if (array_key_exists('to', $settings)) {
            $this->to = $settings['to'];
        }
        if (array_key_exists('cc', $settings)) {
            $this->cc = $settings['cc'];
        }
        if (array_key_exists('bcc', $settings)) {
            $this->bcc = $settings['bcc'];
        }
        if (array_key_exists('replay', $settings)) {
            $this->replay = $settings['replay'];
        }
        if (array_key_exists('subject', $settings)) {
            $this->subject = $settings['subject'];
        }
        if (array_key_exists('body', $settings)) {
            if (is_array($settings['body'])>0) {
                $this->templeBody->setSettings($settings['body']);
                $this->templeBody->setBody();
                $this->body = $this->templeBody->getBody();
            }
        } else {
            $this->content = 'Example Message';
        }
        
        return $this->settings = $settings;
    }
    
    function getTempleBody() {
        return $this->templeBody;
    }

    function setTempleBody(TemplateBody $templeBody) {
        $this->templeBody = $templeBody;
    }
    
    public function composeEmail()
    {
        $email = \Swift_Message::newInstance();
        $email->setContentType('text/html');
        $email->setFrom($this->from);
        $email->setTo($this->to);
        
        if ($this->cc != null) {
            $email->setCc($this->cc);
        }
        
        if ($this->bcc != null) {
            $email->setBcc($this->bcc);
        }
        
        if ($this->reply != null) {
            $email->setReplyTo($this->reply);
        } 
        
        $email->setSubject($this->subject);
        $email->setBody($this->body);
        
        return $email;
    }


}