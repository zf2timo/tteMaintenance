<?php

namespace tteMaintenance\Provider;

use Zend\EventManager\ListenerAggregateInterface;

/**
 * Class MaintenanceProviderInterface
 * @package tteMaintenance\Provider
 */
interface MaintenanceProviderInterface extends ListenerAggregateInterface {

    /**
     * @return bool
     */
    public function isMaintenance();

}