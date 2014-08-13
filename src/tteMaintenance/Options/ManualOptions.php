<?php


namespace tteMaintenance\Options;


use Zend\Stdlib\AbstractOptions;

class ManualOptions extends AbstractOptions implements ManualOptionsInterface
{
    /**
     * @var bool
     */
    protected $isMaintenance;

    /**
     * @return boolean
     */
    public function getIsMaintenance()
    {
        return $this->isMaintenance;
    }

    /**
     * @param boolean $isMaintenance
     */
    public function setIsMaintenance($isMaintenance)
    {
        $this->isMaintenance = (bool)$isMaintenance;
    }
} 