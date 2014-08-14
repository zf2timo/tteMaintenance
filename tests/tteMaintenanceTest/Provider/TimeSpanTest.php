<?php

namespace tteMaintenanceTest\Provider;

use tteMaintenance\Options\TimeSpanOptions;
use tteMaintenance\Provider\TimeSpan;

class TimeSpanTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers tteMaintenance\Provider\TimeSpan::isMaintenance
     */
    public function testIsMaintenanceWithCorrectValues()
    {

        $provider = new TimeSpan(22, 23);
        $this->assertSame(true, $provider->isMaintenance());

        $provider = new TimeSpan(22, 23);
        $this->assertSame(false, $provider->isMaintenance());
    }

}
 
