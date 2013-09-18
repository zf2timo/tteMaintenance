<?php
namespace Maintenance\Options;

interface ManuelOptionsInterface
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