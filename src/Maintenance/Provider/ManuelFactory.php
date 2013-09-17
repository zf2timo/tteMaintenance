<?php


namespace Maintenance\Provider;


use Maintenance\Options\ManuelOptions;
use Maintenance\Options\ManuelOptionsInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ManuelFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ManuelOptionsInterface $manuelOptions */
        $manuelOptions = $serviceLocator->get('Maintenance\Options\ManuelOptionsFactory');

       return new Manuel($manuelOptions->getIsMaintenance());
    }
}