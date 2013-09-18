<?php
namespace tteMaintenance\Options;

interface TimeSpanOptionsInterface
{
    /**
     * @param Int $start
     */
    public function setStart($start);

    /**
     * @param Int $end
     */
    public function setEnd($end);

    /**
     * @return Int
     */
    public function getEnd();

    /**
     * @return Int
     */
    public function getStart();
}