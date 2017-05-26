easyMailBundle
==========================

The easyMailBundle, for Symfony2, provide an easy way to send email with temple

## Installing
easyMailBundle uses Composeris, please checkout the [composer website](http://getcomposer.org) for more information.

The simple following command will install `easyMailBundle` into your project. It also add a new
entry in your `composer.json` and update the `composer.lock` as well.

```bash
composer require samdeb/easymailbundle:dev-master
```

Once the new project is set up, open the composer.json file and add the samdeb/easymailbundle as a dependency:
``` js
//composer.json
//...
"require": {
        //other bundles
        "samdeb/easymailbundle": "dev-master"
```
Save the file and have composer update the project via the command line:
``` shell
composer update
```
Now just update the app/AppKernel.php:
``` php
//app/AppKernel.php
//...
    public function registerBundles()
    {
        $bundles = array(
            //Other bundles
            new ABC\EasyMailBundle\ABCEasyMailBundle(),
        );
```

<a name="configuration"></a>

### Configuration example
Add the bundle to orm configuration:
You can configure default query parameter names and templates

```
#app/config/config.yml
#...
abc_easy_mail:
    from: system@mydomain.com
    reply: soporte@mydomain.com
    theme : default 
    twig:
        default: 
            template: ABCEasyMailBundle:Default:easyMail.html.twig
            logo: 'logo.img'
            title: 'Company Name'
            footer: 'Atte.'
        #other: 
            #template: MyBundle:Default:mail.html.twig
            #logo: 'logo.img'
            #title: 'Other Company Name'
            #footer: 'Atte.'
```
and now you're done.


## Usage examples:

### Controller (Basic)

```php
// ABC\EasyMailBundle\Controller\DefaultController.php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $mail = $this->get('easy.mailer');
        $settings = array(
                          'to'=>'email@mydomain.com',
                          'subject' => 'This is my subject',
                          'body'    => array(
                                        'content' => 'Put your text',
                                    )
                    );
        $mail->send($settings);
        return $this->render('ABCEasyMailBundle:Default:index.html.twig');
    }
}
```
### Controller (Advanced)

```php
// ABC\EasyMailBundle\Controller\DefaultController.php

class DefaultController extends Controller
{
    public function indexAction()
    {
        $mail = $this->get('easy.mailer');
        $settings = array('theme'=>'other',
                          'to'=>'email@mydomain.com',
                          /*
                          'cc'=>'myemail@mydomain.com',
                          'bcc'=> 'otheremail@mydomain.com',
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
```

### View
```twig
{% extends "ABCEasyMailBundle:Default:Layout.html.twig" %}

{% block logo %} {{ asset('img/'~logo)}} {% endblock %}
{% block title %} {{title}} {% endblock %}
{% block content %} {{content}} {% endblock %}
{% block footer %} {{footer}} {% endblock %}
```
