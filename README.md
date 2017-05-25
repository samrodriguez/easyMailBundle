Symfony 2.x easyMailBundle
==========================



## Installing the easyMailBundle in a new Symfony2 project
So the easyMailBundle is ready for installation, great news but how do we install it.  The installation process is actually very simple.  Set up a new Symfony2 project with Composer.

Require from the command line directly:
```
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
```
clear cache and update database:
``` shell
php app/console cache:clear
```

and now you're done.
