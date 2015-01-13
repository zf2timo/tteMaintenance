<?php

namespace tteMaintenanceTest\Provider;

use tteMaintenance\Provider\AbstractProvider;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\MvcEvent;

class AbstractProviderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|AbstractProvider
     */
    protected $mock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|MvcEvent
     */
    protected $event;

    /**
     * @covers tteMaintenance\Provider\AbstractProvider::onBootstrap
     */
    public function testOnBootstrapChecksMaintenanceStatus()
    {
        $this->mock->expects($this->once())
            ->method('isMaintenance')
            ->will($this->returnValue(false));

        $this->assertNull($this->mock->onBootstrap($this->event));
    }

    /**
     * @covers tteMaintenance\Provider\AbstractProvider::onBootstrap
     */
    public function testOnBootstrapHandlesInvalidMaintenanceStatus()
    {
        $this->mock->expects($this->once())
            ->method('isMaintenance')
            ->will($this->returnValue(null));

        $this->assertNull($this->mock->onBootstrap($this->event));
    }

    /**
     * @covers tteMaintenance\Provider\AbstractProvider::onBootstrap
     */
    public function testRedirectToFile()
    {
        $this->mock->expects($this->once())
            ->method('isMaintenance')
            ->will($this->returnValue(true));

        $optionsMock = $this->getMock('tteMaintenance\Options\ModuleOptionsInterface');
        $optionsMock->expects($this->once())
            ->method('getRedirectType')
            ->will($this->returnValue(AbstractProvider::REDIRECT_TYPE_FILE));
        $optionsMock->expects($this->once())
            ->method('getRedirect')
            ->will($this->returnValue('index.html'));

        $slMock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $slMock->expects($this->once())
            ->method('get')
            ->will($this->returnValue($optionsMock));

        $appMock = $this->getMock('Zend\Mvc\ApplicationInterface');
        $appMock->expects($this->once())
            ->method('getServiceManager')
            ->will($this->returnValue($slMock));

        $httpResponse = new Response();
        $this->event->expects($this->once())
            ->method('getApplication')
            ->will($this->returnValue($appMock));
        $this->event->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue($httpResponse));

        /** @var Response $result */
        $result = $this->mock->onBootstrap($this->event);

        $this->assertInstanceOf('Zend\Http\Response', $result);
        $this->assertSame(Response::STATUS_CODE_302, $result->getStatusCode());
        $this->assertTrue($result->getHeaders()->has('Location'));
        $headers = $result->getHeaders()->toArray();
        $this->assertSame('index.html', $headers['Location']);
    }

    /**
     * @covers tteMaintenance\Provider\AbstractProvider
     */
    public function testMaintenanceInConsoleEnvironment()
    {
        $this->mock->expects($this->once())
            ->method('isMaintenance')
            ->will($this->returnValue(true));

        $optionsMock = $this->getMock('tteMaintenance\Options\ModuleOptionsInterface');
        $optionsMock->expects($this->once())
            ->method('getRedirectType')
            ->will($this->returnValue(AbstractProvider::REDIRECT_TYPE_FILE));
        $optionsMock->expects($this->once())
            ->method('getRedirect')
            ->will($this->returnValue('index.html'));

        $slMock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $slMock->expects($this->once())
            ->method('get')
            ->will($this->returnValue($optionsMock));

        $appMock = $this->getMock('Zend\Mvc\ApplicationInterface');
        $appMock->expects($this->once())
            ->method('getServiceManager')
            ->will($this->returnValue($slMock));

        $httpResponse = new \Zend\Console\Response();
        $this->event->expects($this->once())
            ->method('getApplication')
            ->will($this->returnValue($appMock));
        $this->event->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue($httpResponse));

        /** @var Response $result */
        $result = $this->mock->onBootstrap($this->event);

        $this->assertNull($result);
    }

    /**
     * @covers tteMaintenance\Provider\AbstractProvider::onBootstrap
     */
    public function testRedirectToUrl()
    {
        $this->mock->expects($this->once())
            ->method('isMaintenance')
            ->will($this->returnValue(true));

        $optionsMock = $this->getMock('tteMaintenance\Options\ModuleOptionsInterface');
        $optionsMock->expects($this->exactly(2))
            ->method('getRedirectType')
            ->will($this->returnValue(AbstractProvider::REDIRECT_TYPE_ROUTE));
        $optionsMock->expects($this->once())
            ->method('getRedirect')
            ->will($this->returnValue('default/maintenance'));

        $httpRouterMock = $this->getMock('Zend\Mvc\Router\Http\TreeRouteStack');
        $httpRouterMock->expects($this->once())
            ->method('assemble')
            ->will($this->returnValue('http://example.com/maintenance.html'));

        $slMock = $this->getMock('Zend\ServiceManager\ServiceLocatorInterface');
        $slMock->expects($this->exactly(2))
            ->method('get')
            ->will($this->returnValueMap(
                array(
                    array('tteMaintenance\Options\ModuleOptionsFactory', $optionsMock),
                    array('httpRouter', $httpRouterMock)
                )
            ));

        $appMock = $this->getMock('Zend\Mvc\ApplicationInterface');
        $appMock->expects($this->once())
            ->method('getServiceManager')
            ->will($this->returnValue($slMock));

        $httpResponse = new Response();
        $this->event->expects($this->once())
            ->method('getApplication')
            ->will($this->returnValue($appMock));
        $this->event->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue($httpResponse));

        /** @var Response $result */
        $result = $this->mock->onBootstrap($this->event);

        $this->assertInstanceOf('Zend\Http\Response', $result);
        $this->assertSame(Response::STATUS_CODE_302, $result->getStatusCode());
        $this->assertTrue($result->getHeaders()->has('Location'));
        $headers = $result->getHeaders()->toArray();
        $this->assertSame('http://example.com/maintenance.html', $headers['Location']);
    }

    protected function setUp()
    {
        $this->mock = $this->getMockForAbstractClass('\tteMaintenance\Provider\AbstractProvider');
        $this->event = $this->getMock('\Zend\Mvc\MvcEvent');
    }
}
