<?php

namespace ABC\EasyMailBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('abc_easy_mail');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
        $rootNode
        ->children()
            ->scalarNode('from')
                ->isRequired()
                ->cannotBeEmpty()
            ->end()
            ->scalarNode('reply')
                ->isRequired()
                ->cannotBeEmpty()
            ->end()
            ->scalarNode('default_theme')
                ->isRequired()
                
            ->end()
            ->arrayNode('themes')
                ->prototype('array')
                ->children()
                    ->scalarNode('twig')->end()
                    ->scalarNode('logo')->end()
                    ->scalarNode('title')->end()
                    ->scalarNode('footer')->end()
                ->end()
            ->end()
            
        ->end()
        ;
        return $treeBuilder;
    }
}
