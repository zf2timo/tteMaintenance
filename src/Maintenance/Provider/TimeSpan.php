<?php


namespace Maintenance\Provider;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class TimeSpan
 * @package Maintenance\Provider
 */
class TimeSpan extends AbstractProvider
{
    /**
     * Defines a Maintenance form 21 til 5 o' clock
     *
     * @return bool
     */
    public function isMaintenance()
    {
        $now = new \DateTime('now');
        if ($now->format('H') > 21 && $now->format('H') < 5) {
            return true;
        }
        return false;
    }

}