<?php


namespace Maintenance\Provider;


use Maintenance\Options\JsonFileOptions;
use Maintenance\Options\JsonFileOptionsInterface;
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
        $jsonFileOptions = $serviceLocator->get('Maintenance\Options\JsonFileOptionsFactory');

        return new JsonFile($jsonFileOptions);
    }
}