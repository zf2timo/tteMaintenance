<?php


namespace tteMaintenance\Options;


use Zend\Stdlib\AbstractOptions;

/**
 * Class ModuleOptions
 * @package tteMaintenance\Options
 */
class ModuleOptions extends AbstractOptions implements ModuleOptionsInterface
{
    /**
     * @param string $maintenanceProvider
     */
    public function setMaintenanceProvider($maintenanceProvider)
    {
        $this->maintenanceProvider = $maintenanceProvider;
    }

    /**
     * @return string
     */
    public function getMaintenanceProvider()
    {
        return $this->maintenanceProvider;
    }

    /**
     * @param bool $manualMaintenance
     */
    public function setManualMaintenance($manualMaintenance)
    {
        $this->manualMaintenance = $manualMaintenance;
    }

    /**
     * @return boolean
     */
    public function getManualMaintenance()
    {
        return $this->manualMaintenance;
    }

    /**
     * @param string $redirect
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    }

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * @param string $redirectType
     */
    public function setRedirectType($redirectType)
    {
        $this->redirectType = $redirectType;
    }

    /**
     * @return string
     */
    public function getRedirectType()
    {
        return $this->redirectType;
    }

    /**
     * @var bool
     */
    protected $manualMaintenance;

    /**
     * @var string
     */
    protected $maintenanceProvider;

    /**
     * @var string
     */
    protected $redirect;

    /**
     * @var string
     */
    protected $redirectType;
}