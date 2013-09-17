<?php


namespace Maintenance\Provider;


class JsonFile extends AbstractProvider
{
    /**
     * @var string
     */
    protected $targetFile;

    /**
     * @var string
     */
    protected $propertyName;

    /**
     * @param string $targetFile
     * @param string $propertyName
     */
    public function __construct($targetFile, $propertyName)
    {
        $this->setTargetFile($targetFile);
        $this->setPropertyName($propertyName);
    }

    /**
     * @return bool
     */
    public function isMaintenance()
    {

    }

    /**
     * @param string $targetFile
     */
    public function setTargetFile($targetFile)
    {
        $this->targetFile = $targetFile;
    }

    /**
     * @return string
     */
    public function getTargetFile()
    {
        return $this->targetFile;
    }

    /**
     * @param string $propertyName
     */
    public function setPropertyName($propertyName)
    {
        $this->propertyName = $propertyName;
    }

    /**
     * @return string
     */
    public function getPropertyName()
    {
        return $this->propertyName;
    }


}