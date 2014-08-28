<?php

namespace tteMaintenance\Options;

interface TimeSpanOptionsInterface
{
    /**
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start);

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end);

    /**
     * @return \DateTime
     */
    public function getEnd();

    /**
     * @return \DateTime
     */
    public function getStart();
}
