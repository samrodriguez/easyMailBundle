<?php

namespace ABC\EasyMailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $mail = $this->get('easy.mailer');
        $settings = array('theme'=>'other',
                          'to'=>'melitor@gmail.com',
                          /*
                          'cc'=>'myemail@email.com',
                          'bcc'=> 'otheremail@email.com',
                          */
                          'subject' => 'This is my subject',
                          'body'    => array(
                                        /*
                                         'logo'   => 'Mylogo.jpg',
                                         'title'  => 'Diferent Company Name',
                                         */
                                        'content' => 'Put your text',
                                        'footer'  => 'Saludos'
                                    )
                    );
        
       
        $mail->send($settings);
        return $this->render('ABCEasyMailBundle:Default:index.html.twig');
    }
}
