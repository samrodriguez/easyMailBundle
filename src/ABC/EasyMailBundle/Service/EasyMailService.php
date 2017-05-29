<?php
namespace ABC\EasyMailBundle\Service;

use ABC\EasyMailBundle\Clases\Mail;
use ABC\EasyMailBundle\Clases\TemplateBody;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EasyMailService
{
    /* de Config*/
    protected $from;
    protected $reply;
    protected $defaultTheme;
    protected $themes;
    
    /* Contructor */
    protected $swiftmailer;
    protected $templating;
    
 
    public function __construct($swiftmailer, $templating)
    {
        $this->templating  = $templating;
        $this->swiftmailer = $swiftmailer;
    }
    
    public function getFrom()
    {
        return $this->from;
    }

    public function getReply()
    {
        return $this->reply;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setReply($reply)
    {
        $this->reply = $reply;
    }
       
    public function getDefaultTheme()
    {
        return $this->defaultTheme;
    }
    
    public function setDefaultTheme($defaultTheme)
    {
        $this->defaultTheme = $defaultTheme;
    }

    public function getThemes()
    {
        return $this->themes;
    }
    
    public function setThemes($themes)
    {
        $this->themes = $themes;
    }
    

                    
    public function send($settings)
    {
        $templateBoby = new TemplateBody($this->templating, $this->defaultTheme, $this->themes);
        
        $mail         = new Mail($this->from, $this->reply);
        $mail->setTempleBody($templateBoby);
        $mail->setSettings($settings);
        
        if (!$this->swiftmailer->send($mail->composeEmail(), $failures)) {
            echo "Failures:";
            print_r($failures);
        }
    }
}
