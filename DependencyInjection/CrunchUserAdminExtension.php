<?php
namespace Crunch\Bundle\UserAdminBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use FOS\UserBundle\DependencyInjection\Configuration as FOSUserConfiguration;

class CrunchUserAdminExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        $loader->load(sprintf('%s.user.xml', $config['db_driver']));
        if ($config['group']) {
            $loader->load(sprintf('%s.group.xml', $config['db_driver']));
        }
    }

    public function prepend (ContainerBuilder $container)
    {
        $fosUserConfigs = $container->getExtensionConfig('fos_user');
        $fosUserConfig = $this->processConfiguration(new FOSUserConfiguration, $fosUserConfigs);

        $config = array(
            'db_driver' => $fosUserConfig['db_driver'],
            'group' => isset($fosUserConfig['group'])
        );

        $container->prependExtensionConfig($this->getAlias(), $config);
    }
}
