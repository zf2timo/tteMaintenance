<?php

namespace tteMaintenanceTest\Options;

use tteMaintenance\Options\JsonFileOptions;

class JsonFileOptionsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var JsonFileOptions
     */
    protected $options;

    protected function setUp()
    {
        $this->options = new JsonFileOptions();
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::setTargetFile
     */
    public function testSetTargetFile()
    {
        $this->options->setTargetFile('index.html');
        $this->assertSame('index.html', $this->options->getTargetFile());
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::getTargetFile
     */
    public function testGetTargetFile()
    {
        $this->options->setTargetFile('index.html');
        $this->assertSame('index.html', $this->options->getTargetFile());
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::setPropertyName
     */
    public function testSetPropertyName()
    {
        $this->options->setPropertyName('isMaintenance');
        $this->assertSame('isMaintenance', $this->options->getPropertyName());
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::getPropertyName
     */
    public function testGetPropertyName()
    {
        $this->options->setPropertyName('isMaintenance');
        $this->assertSame('isMaintenance', $this->options->getPropertyName());
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::setStrictMode
     */
    public function testSetStrictMode()
    {
        $this->options->setStrictMode(true);
        $this->assertTrue($this->options->getStrictMode());
    }

    /**
     * @covers tteMaintenance\Options\JsonFileOptions::getStrictMode
     */
    public function testGetStrictMode()
    {
        $this->options->setStrictMode(true);
        $this->assertTrue($this->options->getStrictMode());
    }

    protected function tearDown()
    {
        $this->options = null;
    }
}
