<?php


namespace tteMaintenanceTest\Provider;


use tteMaintenance\Options\ManualOptions;
use tteMaintenance\Provider\Manual;

class ManualTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers tteMaintenance\Provider\Manual::isMaintenance
     */
    public function testIsMaintenanceWithCorrectValues()
    {
        $options = new ManualOptions();

        $options->setIsMaintenance(true);
        $provider = new Manual($options);
        $this->assertSame(true, $provider->isMaintenance());

        $options->setIsMaintenance(false);
        $provider = new Manual($options);
        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\Manual::isMaintenance
     */
    public function testIsMaintenanceWithString()
    {
        $options = new ManualOptions();

        $options->setIsMaintenance('true');
        $provider = new Manual($options);
        $this->assertSame(true, $provider->isMaintenance());

        $options->setIsMaintenance('false');
        $provider = new Manual($options);
        $this->assertSame(true, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\Manual::isMaintenance
     */
    public function testIsMaintenanceWithInteger()
    {
        $options = new ManualOptions();

        $options->setIsMaintenance(1);
        $provider = new Manual($options);
        $this->assertSame(true, $provider->isMaintenance());

        $options->setIsMaintenance(0);
        $provider = new Manual($options);
        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\Manual::__construct
     */
    public function testConstructorSetsCorrect()
    {
        $options = new ManualOptions();
        $options->setIsMaintenance(true);

        $provider = new Manual($options);
        $this->assertSame(true, $provider->getIsMaintenance());

        $provider = new Manual(false);
        $this->assertSame(false, $provider->getIsMaintenance());
    }
}
 