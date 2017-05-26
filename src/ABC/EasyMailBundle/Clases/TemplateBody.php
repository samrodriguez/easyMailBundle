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
    protected $view;
    protected $logo;
    protected $title;
    protected $content;
    protected $footer;
    protected $body;
 
    /*aux*/
    protected $themes;
    protected $theme;
    protected $defaultTheme;
    
    public function __construct($templating, $defaultTheme, $themes)
    {
        $this->templating   = $templating;
        $this->themes       = $themes;
        $this->defaultTheme = $defaultTheme;
        $this->setTheme($defaultTheme);
    }
    
    public function getTheme()
    {
        return $this->theme;
    }
    public function setTheme($theme)
    {
        if (array_key_exists($theme, $this->themes)) {
            $this->view = $this->themes[$theme]['template'];
            $this->logo     = $this->themes[$theme]['logo'];
            $this->title    = $this->themes[$theme]['title'];
            $this->content  = 'Example Message...';
            $this->footer   = $this->themes[$theme]['footer'];
        } else {
            $this->view = 'ABCEasyMailBundle:Default:easyMail.html.twig';
            $this->logo     = 'logo.png';
            $this->title    = 'My Company';
            $this->content  = 'Example Message...';
            $this->footer   = 'Atte.';
        }
        
        $this->theme = $theme;
    }
    
    public function getView()
    {
        return $this->view;
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

    public function setView($view)
    {
        $this->view = $view;
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
                        $this->getView(),
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
        if (array_key_exists('logo', $settings)) {
            $this->logo    = $settings['logo'];
        }
        if (array_key_exists('title', $settings)) {
            $this->title    = $settings['title'];
        }
        if (array_key_exists('content', $settings)) {
            $this->content    = $settings['content'];
        }
        if (array_key_exists('footer', $settings)) {
            $this->footer    = $settings['footer'];
        }
        $this->settings = $settings;
    }
}
