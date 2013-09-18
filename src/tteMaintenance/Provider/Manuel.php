<?php


namespace tteMaintenance\Provider;


class Manuel extends  AbstractProvider
{

    /**
     * @var bool
     */
    protected $isMaintenance;

    /**
     * @param bool $isMaintenance
     */
    public function __construct($isMaintenance)
    {
        $this->setIsMaintenance($isMaintenance);
    }

    /**
     * @param boolean $isMaintenance
     */
    public function setIsMaintenance($isMaintenance)
    {
        $this->isMaintenance = (bool)$isMaintenance;
    }

    /**
     * @return boolean
     */
    public function getIsMaintenance()
    {
        return $this->isMaintenance;
    }

    /**
     * @return bool
     */
    public function isMaintenance()
    {
        return (bool)$this->isMaintenance;
    }
}