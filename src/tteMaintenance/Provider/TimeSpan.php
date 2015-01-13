<?php

namespace tteMaintenance\Provider;

/**
 * Class TimeSpan
 * @package tteMaintenance\Provider
 */
class TimeSpan extends AbstractProvider
{
    /**
     * @var \DateTime
     */
    protected $start;

    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @var \DateTime
     */
    protected $current;

    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @param \DateTime $current
     */
    public function __construct(\DateTime $start, \DateTime $end, \DateTime $current)
    {
        $this->current = $current;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Defines a Maintenance form 21 til 5 o' clock
     *
     * @return bool
     */
    public function isMaintenance()
    {
        if ($this->getCurrent()->format('H') >= $this->getStart()->format('H') &&
            $this->getCurrent()->format('H') <= $this->getEnd()->format('H')
        ) {
            return true;
        }
        return false;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return \DateTime
     */
    public function getCurrent()
    {
        return $this->current;
    }
}
