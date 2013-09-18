<?php

namespace Maintenance\Options;

/**
 * Interface ModuleOptionsInterface
 * @package Maintenance\Options
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
    public function getManuelMaintenance();

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
     * @param boolean $manuelMaintenance
     */
    public function setManuelMaintenance($manuelMaintenance);
}