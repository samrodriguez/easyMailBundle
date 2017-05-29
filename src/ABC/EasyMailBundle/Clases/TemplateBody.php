<?php
namespace ABC\EasyMailBundle\Clases;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TemplateBody
{
    protected $templating;
    /*aux*/
    protected $themes;
    protected $defaultTheme;
    
    protected $twig;
    protected $body;
    protected $values = array();
     
    public function __construct($templating, $defaultTheme, $themes)
    {
        $this->templating   = $templating;
        $this->themes       = $themes;
        $this->defaultTheme = $defaultTheme;
        $this->setDefaultTheme($defaultTheme);
    }
    
    public function getDefaultTheme()
    {
        return $this->defaultTheme;
    }
    public function setDefaultTheme($defaultTheme)
    {
        if(is_null($defaultTheme)){
            $this->twig               = 'ABCEasyMailBundle:Default:easyMail.html.twig';
            $this->values['logo']     = 'https://github.com/samrodriguez/easyMailBundle/blob/master/web/img/logo.png';
            $this->values['title']    = 'My Company';
            $this->values['content']  = 'Example Message...';
            $this->values['footer']   = 'Atte.';
            
        }elseif (array_key_exists($defaultTheme, $this->themes)) {
            $default  = $this->themes[$defaultTheme];
            $this->setSettings($default);            
        }
        
        $this->defaultTheme = $defaultTheme;
    }
    
    public function getTwig()
    {
        return $this->twig;
    }

    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody()
    {
        $render  = $this->templating->render( $this->getTwig(), $this->getValues());                   
        $this->body = $render;
    }
    
    public function getSettings()
    {
        return $settings;
    }
    public function setSettings($settings)
    {
        if (array_key_exists('twig', $settings)) {
            $this->twig = $settings['twig'];
        }
        if (array_key_exists('logo', $settings)) {
            $this->values['logo'] = $settings['logo'];
        }
        if (array_key_exists('title', $settings)) {
            $this->values['title'] = $settings['title'];
        }
        if (array_key_exists('content', $settings)) {
            $this->values['content'] = $settings['content'];
        }
        if (array_key_exists('footer', $settings)) {
            $this->values['footer'] = $settings['footer'];
        }
        $this->settings = $settings;
    }
    
    function getValues() {
        return $this->values;
    }

    function setValues(array $values) {
        $this->values = $values;
    }
}
