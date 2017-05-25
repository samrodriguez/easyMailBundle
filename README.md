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
Now just update the app/AppKernel.php and app/config/routing.yml to include our bundle, clear the cache and update the schema:
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
add the bundle to orm configuration:
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
        other: 
            template: MyBundle:Default:mail.html.twig
            logo: 'logo.img'
            title: 'Other Company Name'
            footer: 'Atte.'
```
clear cache and update database:
``` shell
php app/console cache:clear
```

and now you're done.
