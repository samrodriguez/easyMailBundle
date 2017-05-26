<?php
namespace ABC\EasyMailBundle\Clases;

use ABC\EasyMailBundle\Clases\TemplateBody;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mail
{
    protected $from;
    protected $to;
    protected $cc;
    protected $bcc;
    protected $reply;
    protected $subject;
    protected $body;
    protected $settings;
    protected $templeBody;
   
    public function __construct($from, $reply)
    {
        $this->from  = $from;
        $this->reply = $reply;
    }

        
    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getCc()
    {
        return $this->cc;
    }

    public function getBcc()
    {
        return $this->bcc;
    }

    public function getReply()
    {
        return $this->reply;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setCc($cc)
    {
        $this->cc = $cc;
    }

    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
    }

    public function setReply($reply)
    {
        $this->reply = $reply;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getSettings()
    {
        return $this->settings;
    }
    
    public function setSettings($settings)
    {
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
    
    public function getTempleBody()
    {
        return $this->templeBody;
    }

    public function setTempleBody(TemplateBody $templeBody)
    {
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
