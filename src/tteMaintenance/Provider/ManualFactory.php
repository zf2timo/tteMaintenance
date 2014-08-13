<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Options\ManualOptionsInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ManualFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var ManualOptionsInterface $manualOptions */
        $manualOptions = $serviceLocator->get('tteMaintenance\Options\ManualOptionsFactory');

       return new Manual($manualOptions->getIsMaintenance());
    }
}