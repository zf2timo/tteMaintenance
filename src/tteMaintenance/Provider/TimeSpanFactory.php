<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Options\TimeSpanOptionsInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TimeSpanFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var TimeSpanOptionsInterface $timeSpanOptions */
        $timeSpanOptions = $serviceLocator->get('tteMaintenance\Options\TimeSpanOptionsFactory');

        return new TimeSpan($timeSpanOptions->getStart(), $timeSpanOptions->getEnd());
    }
}