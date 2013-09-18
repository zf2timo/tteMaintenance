<?php


namespace tteMaintenance\Options;


use Zend\Stdlib\AbstractOptions;

class TimeSpanOptions extends AbstractOptions implements TimeSpanOptionsInterface
{
    /**
     * @var Int
     */
    protected $start;

    /**
     * @var Int
     */
    protected $end;

    /**
     * @param Int $start
     */
    public function setStart($start)
    {
        $this->start = (int)$start;
    }

    /**
     * @return Int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param Int $end
     */
    public function setEnd($end)
    {
        $this->end = (int)$end;
    }

    /**
     * @return Int
     */
    public function getEnd()
    {
        return $this->end;
    }


} 