<?php


namespace Maintenance\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory extends AbstractOptionFactory
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'Maintenance\Options\ModuleOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'global';
    }
}