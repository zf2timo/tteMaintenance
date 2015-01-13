<?php

namespace tteMaintenanceTest\Provider;

use tteMaintenance\Options\JsonFileOptions;
use tteMaintenance\Provider\JsonFile;

class JsonFileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsInMaintenance()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsInMaintenance.json');

        $provider = new JsonFile($options);

        $this->assertSame(true, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsNotInMaintenance()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsNotInMaintenance.json');

        $provider = new JsonFile($options);

        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsInMaintenanceWithInteger()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsInMaintenanceWithInteger.json');

        $provider = new JsonFile($options);

        $this->assertSame(true, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsNotInMaintenanceWithInteger()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsNotInMaintenanceWithInteger.json');

        $provider = new JsonFile($options);

        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsMaintenanceWithNonexistentFile()
    {
        $this->setExpectedException(
            '\tteMaintenance\Exception\FileNotException',
            'ThisFileShouldNeverExists.json" wasn\'t found'
        );

        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/ThisFileShouldNeverExists.json');

        $provider = new JsonFile($options);

        $provider->isMaintenance();
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsMaintenanceWithNonexistentFileWithoutStrictMode()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/ThisFileShouldNeverExists.json');
        $options->setStrictMode(false);

        $provider = new JsonFile($options);

        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsMaintenanceWithIncorrectFile()
    {
        $this->setExpectedException(
            '\tteMaintenance\Exception\InvalidFileException',
            'Content wasn\'t valid Json or Property "maintenance" isn\'t set'
        );

        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsMaintenanceWithIncorrectFile.json');

        $provider = new JsonFile($options);

        $provider->isMaintenance();
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::isMaintenance
     */
    public function testIsMaintenanceWithIncorrectFileWithoutStrictMode()
    {
        $options = new JsonFileOptions();
        $options->setPropertyName('maintenance');
        $options->setTargetFile(__DIR__ . '/_files/testIsMaintenanceWithIncorrectFile.json');
        $options->setStrictMode(false);

        $provider = new JsonFile($options);

        $this->assertSame(false, $provider->isMaintenance());
    }

    /**
     * @covers tteMaintenance\Provider\JsonFile::__construct
     * @covers tteMaintenance\Provider\JsonFile::setOptions
     * @covers tteMaintenance\Provider\JsonFile::getOptions
     */
    public function testConstructorSetsOptions()
    {
        $options = new JsonFileOptions();

        $provider = new JsonFile($options);
        $this->assertSame($options, $provider->getOptions());

        $newOptions = new JsonFileOptions();
        $newOptions->setStrictMode(true);
        $newOptions->setTargetFile('test.json');
        $provider->setOptions($newOptions);
        $this->assertSame($newOptions, $provider->getOptions());
    }
}
