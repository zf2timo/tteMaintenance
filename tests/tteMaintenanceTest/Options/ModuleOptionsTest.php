<?php

namespace tteMaintenanceTest\Options;

use tteMaintenance\Options\ModuleOptions;

class ModuleOptionsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ModuleOptions
     */
    protected $options;

    public function setUp()
    {
        $this->options = new ModuleOptions();
    }

    /**
     * @covers tteMaintenance\Options\ModuleOptions::setMaintenanceProvider
     * @covers tteMaintenance\Options\ModuleOptions::getMaintenanceProvider
     */
    public function testSetMaintenanceProvider()
    {
        $this->options->setMaintenanceProvider('tteMaintenance\Provider\TimeSpan');
        $this->assertSame('tteMaintenance\Provider\TimeSpan', $this->options->getMaintenanceProvider());
    }

    /**
     * @covers tteMaintenance\Options\ModuleOptions::setManualMaintenance
     * @covers tteMaintenance\Options\ModuleOptions::getManualMaintenance
     */
    public function testManualMaintenance()
    {
        $this->options->setManualMaintenance(true);
        $this->assertTrue($this->options->getManualMaintenance());
    }

    /**
     * @covers tteMaintenance\Options\ModuleOptions::setRedirect
     * @covers tteMaintenance\Options\ModuleOptions::getRedirect
     */
    public function testRedirectOption()
    {
        $this->options->setRedirect('/');
        $this->assertSame($this->options->getRedirect(), '/');
    }

    /**
     * tteMaintenance\Options\ModuleOptions::setRedirectType
     * tteMaintenance\Options\ModuleOptions::getRedirectType
     */
    public function testRedirectTypeOptions()
    {
        $this->options->setRedirectType('route');
        $this->assertSame($this->options->getRedirectType(), 'route');
    }
}