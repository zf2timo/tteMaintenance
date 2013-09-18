<?php


namespace tteMaintenance\Options;


use Zend\Stdlib\AbstractOptions;

class ManuelOptions extends AbstractOptions implements ManuelOptionsInterface
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