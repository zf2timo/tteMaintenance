<?php

namespace Maintenance\Provider;

use Zend\EventManager\ListenerAggregateInterface;

/**
 * Class MaintenanceProviderInterface
 * @package Maintenance\Provider
 */
interface MaintenanceProviderInterface extends ListenerAggregateInterface {

    /**
     * @return bool
     */
    public function isMaintenance();

}