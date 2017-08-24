<?php

namespace Phpforce\SalesforceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('phpforce_salesforce')
            ->children()
                ->arrayNode('soap_client')->isRequired()
                    ->children()
                        ->scalarNode('wsdl')->isRequired()->end()
                        ->scalarNode('username')->isRequired()->end()
                        ->scalarNode('password')->isRequired()->end()
                        ->scalarNode('token')->isRequired()->end()
                        ->scalarNode('logging')->defaultValue('%kernel.debug%')->end()
                        ->arrayNode('options')
                            ->children()
                                ->scalarNode('proxy_host')->end()
                                ->scalarNode('proxy_port')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
