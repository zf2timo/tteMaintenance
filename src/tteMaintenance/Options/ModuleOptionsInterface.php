<?php

namespace tteMaintenance\Options;

/**
 * Interface ModuleOptionsInterface
 * @package tteMaintenance\Options
 */
interface ModuleOptionsInterface
{
    /**
     * @return string
     */
    public function getRedirect();

    /**
     * @return string
     */
    public function getMaintenanceProvider();

    /**
     * @param string $maintenanceProvider
     */
    public function setMaintenanceProvider($maintenanceProvider);

    /**
     * @return boolean
     */
    public function getManualMaintenance();

    /**
     * @return string
     */
    public function getRedirectType();

    /**
     * @param string $redirect
     */
    public function setRedirect($redirect);

    /**
     * @param string $redirectType
     */
    public function setRedirectType($redirectType);

    /**
     * @param bool $manualMaintenance
     */
    public function setManualMaintenance($manualMaintenance);
}