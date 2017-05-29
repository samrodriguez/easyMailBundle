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
    protected $twig;
    protected $logo;
    protected $title;
    protected $content;
    protected $footer;
    protected $body;
 
    /*aux*/
    protected $themes;
    protected $defaultTheme;
    
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
            
            $this->twig     = 'ABCEasyMailBundle:Default:easyMail.html.twig';
            $this->logo     = 'https://github.com/samrodriguez/easyMailBundle/blob/master/web/img/logo.png';
            $this->title    = 'My Company';
            $this->content  = 'Example Message...';
            $this->footer   = 'Atte.';
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

    public function getLogo()
    {
        return $this->logo;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getFooter()
    {
        return $this->footer;
    }

    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody()
    {
        
        $render  = $this->templating->render(
                        $this->getTwig(),
                        array(
                            'logo'      => $this->logo,
                            'title'     => $this->title,
                            'content'   => $this->content,
                            'footer'    => $this->footer
                        )
                    );
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
            $this->logo     = $settings['logo'];
        }
        if (array_key_exists('title', $settings)) {
            $this->title    = $settings['title'];
        }
        if (array_key_exists('content', $settings)) {
            $this->content  = $settings['content'];
        }
        if (array_key_exists('footer', $settings)) {
            $this->footer   = $settings['footer'];
        }
        $this->settings = $settings;
    }
}
