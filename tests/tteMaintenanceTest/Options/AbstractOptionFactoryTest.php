<?php

namespace tteMaintenanceTest\Options;

use tteMaintenance\Options\AbstractOptionFactory;

class AbstractOptionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractOptionFactory
     */
    protected $optionsFactory;

    /**
     * @covers tteMaintenance\Options\AbstractOptionFactory::createService
     */
    public function testCreateServiceReturnsCorrectClass()
    {
        $slMock = $this->getMock('\Zend\ServiceManager\ServiceLocatorInterface');
        $slMock->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    array(
                        'tteMaintenance' => array(
                            'global' => array(
                                'maintenanceProvider' => array(),
                            ),
                            'timeSpan' => array(
                                'start' => 1,
                                'end' => 5
                            ),
                            'jsonFile' => array(
                                'targetFile' => 'maintenance.json',
                                'propertyName' => 'isMaintenance',
                            ),
                            'manual' => array(
                                'Maintenance' => true,
                            ),
                        ),
                    )
                )
            );

        $this->optionsFactory->expects($this->once())
            ->method('getClass')
            ->will($this->returnValue('\tteMaintenance\Options\JsonFileOptions'));
        $this->optionsFactory->expects($this->once())
            ->method('getConfigKey')
            ->will($this->returnValue('jsonFile'));

        $this->assertInstanceOf('tteMaintenance\Options\JsonFileOptions', $this->optionsFactory->createService($slMock));
    }

    protected function setUp()
    {
        $this->optionsFactory = $this->getMockForAbstractClass('tteMaintenance\Options\AbstractOptionFactory');
    }

    protected function tearDown()
    {
        $this->optionsFactory = null;
    }
}
