<?php


namespace tteMaintenance\Options;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractOptionFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $class = $this->getClass();

        return new $class($config['tteMaintenance'][$this->getConfigKey()]);
    }

    /**
     * @return string
     */
    abstract public function getClass();

    /**
     * @return string
     */
    abstract public function getConfigKey();
} 