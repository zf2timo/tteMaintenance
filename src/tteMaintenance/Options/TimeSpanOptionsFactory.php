<?php


namespace tteMaintenance\Options;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TimeSpanOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\TimeSpanOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'timeSpan';
    }
}