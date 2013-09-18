<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Options\JsonFileOptions;
use tteMaintenance\Options\JsonFileOptionsInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class JsonFileFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var JsonFileOptionsInterface $jsonFileOptions */
        $jsonFileOptions = $serviceLocator->get('tteMaintenance\Options\JsonFileOptionsFactory');

        return new JsonFile($jsonFileOptions);
    }
}