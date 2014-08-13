<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Exception\InvalidArgumentException;
use tteMaintenance\Options\ManualOptionsInterface;

class Manual extends  AbstractProvider
{

    /**
     * @var bool
     */
    protected $isMaintenance;

    /**
     * @param bool|ManualOptionsInterface $isMaintenance
     * @throws \tteMaintenance\Exception\InvalidArgumentException
     */
    public function __construct($isMaintenance)
    {
        if (!is_bool($isMaintenance) && !($isMaintenance instanceof ManualOptionsInterface)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid Argument was given. Expect bool or ManualOptionsInterface. %s was given.',
                is_object($isMaintenance) ? get_class($isMaintenance) : gettype($isMaintenance)
            ));
        }

        if ($isMaintenance instanceof ManualOptionsInterface) {
            $state = $isMaintenance->getIsMaintenance();
        } else {
            $state = $isMaintenance;
        }

        $this->setIsMaintenance($state);
    }

    /**
     * @param bool $isMaintenance
     */
    public function setIsMaintenance($isMaintenance)
    {
        $this->isMaintenance = (bool)$isMaintenance;
    }

    /**
     * @return bool
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