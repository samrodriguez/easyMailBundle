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
    protected $theme;
    protected $twig;
    
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
       
    public function getTheme()
    {
        return $this->theme;
    }
    
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    public function getTwig()
    {
        return $this->twig;
    }
    
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }
    

                    
    public function send($settings)
    {
        $templateBoby = new TemplateBody($this->templating, $this->theme, $this->twig);
        $mail         = new Mail($this->from, $this->reply);
        $mail->setTempleBody($templateBoby);
        $mail->setSettings($settings);
        
        if (!$this->swiftmailer->send($mail->composeEmail(), $failures)) {
            echo "Failures:";
            print_r($failures);
        }
    }
}
