<?php


namespace tteMaintenance\Provider;
use tteMaintenance\Exception\InvalidArgumentException;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class TimeSpan
 * @package tteMaintenance\Provider
 */
class TimeSpan extends AbstractProvider
{
    /**
     * @var Int
     */
    protected $start;

    /**
     * @var Int
     */
    protected $end;

    public function __construct($start, $end)
    {
        if ((int)$start < 0 || (int)$start > 23) {
            throw new InvalidArgumentException(sprintf(
                'Parameter $start wasn\'t valid. Expected integer between 0 and 23. Got %s(%s)',
                (int)$start,
                gettype($start)
            ));
        }
        if ((int)$end < 0 || (int)$end > 23) {
            throw new InvalidArgumentException(sprintf(
                'Parameter $end wasn\'t valid. Expected integer between 0 and 23. Got %s(%s)',
                (int)$end,
                gettype($end)
            ));
        }

        $this->setStart($start);
        $this->setEnd($end);
    }


    /**
     * Defines a Maintenance form 21 til 5 o' clock
     *
     * @return bool
     */
    public function isMaintenance()
    {
        $now = new \DateTime('now');
        if ($now->format('H') >= $this->getStart() || $now->format('H') <= $this->getEnd()) {
            return true;
        }
        return false;
    }

    /**
     * @param Int $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return Int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param Int $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return Int
     */
    public function getStart()
    {
        return $this->start;
    }
}