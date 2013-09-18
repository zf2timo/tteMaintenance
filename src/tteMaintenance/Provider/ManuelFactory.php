<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Options\ManuelOptions;
use tteMaintenance\Options\ManuelOptionsInterface;
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
        $manuelOptions = $serviceLocator->get('tteMaintenance\Options\ManuelOptionsFactory');

       return new Manuel($manuelOptions->getIsMaintenance());
    }
}