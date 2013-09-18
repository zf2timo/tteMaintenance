<?php


namespace tteMaintenance\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ModuleOptionsFactory extends AbstractOptionFactory
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\ModuleOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'global';
    }
}