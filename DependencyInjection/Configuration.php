<?php
namespace Crunch\Bundle\UserAdminBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('crunch_user_admin');

        $rootNode
            ->children()
                ->scalarNode('db_driver')
                    ->isRequired()
                    ->validate()
                    ->ifNotInArray(array('orm', 'mongodb'))
                        ->thenInvalid('Invalid database driver "%s"')
                    ->end()
                ->end()
                ->booleanNode('group')->defaultFalse()->end()
            ->end();

        return $treeBuilder;
    }
}
