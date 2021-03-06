<?php

namespace ABC\EasyMailBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class ABCEasyMailExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        $container->getDefinition('easy.mailer')
                ->addMethodCall('setFrom', array($config['from']));
        $container->getDefinition('easy.mailer')
                ->addMethodCall('setReply', array($config['reply']));
        $container->getDefinition('easy.mailer')
                ->addMethodCall('setDefaultTheme', array($config['default_theme']));
        $container->getDefinition('easy.mailer')
                ->addMethodCall('setThemes', array($config['themes']));
    }
}
