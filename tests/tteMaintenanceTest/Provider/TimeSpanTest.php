<?php

namespace tteMaintenanceTest\Provider;

use tteMaintenance\Provider\TimeSpan;

class TimeSpanTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers tteMaintenance\Provider\TimeSpan::isMaintenance
     */
    public function testIsMaintenanceWithCorrectValues()
    {
        $provider = new TimeSpan($this->getStart(), $this->getEnd(), new \DateTime('2014-08-15 22:30:00'));
        $this->assertSame(true, $provider->isMaintenance());

        $provider = new TimeSpan($this->getStart(), $this->getEnd(), new \DateTime('2014-08-15 16:00:00'));
        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\TimeSpan::__construct
     * @covers tteMaintenance\Provider\TimeSpan::getCurrent
     * @covers tteMaintenance\Provider\TimeSpan::getStart
     * @covers tteMaintenance\Provider\TimeSpan::getEnd
     */
    public function testConstructor()
    {
        $current = new \DateTime('2014-08-15 18:00:00');
        $start = $this->getStart();
        $end = $this->getEnd();
        $provider = new TimeSpan($start, $end, $current);

        $this->assertSame($current, $provider->getCurrent());
        $this->assertSame($start, $provider->getStart());
        $this->assertSame($end, $provider->getEnd());
    }

    /**
     * @return \DateTime
     */
    protected function getStart()
    {
        return new \DateTime('2014-08-15 22:00:00');
    }

    /**
     * @return \DateTime
     */
    protected function getEnd()
    {
        return new \DateTime('2014-08-15 23:00:00');
    }
}
