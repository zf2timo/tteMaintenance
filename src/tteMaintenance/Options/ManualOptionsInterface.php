<?php
namespace tteMaintenance\Options;

interface ManualOptionsInterface
{
    /**
     * @return boolean
     */
    public function getIsMaintenance();

    /**
     * @param boolean $isMaintenance
     */
    public function setIsMaintenance($isMaintenance);
}