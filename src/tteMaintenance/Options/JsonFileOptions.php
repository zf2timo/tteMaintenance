<?php


namespace tteMaintenance\Options;


use Zend\Stdlib\AbstractOptions;

class JsonFileOptions extends AbstractOptions implements JsonFileOptionsInterface
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
     * @var bool
     */
    protected $strictMode = true;

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

    /**
     * @param boolean $strictMode
     */
    public function setStrictMode($strictMode)
    {
        $this->strictMode = $strictMode;
    }

    /**
     * @return boolean
     */
    public function getStrictMode()
    {
        return $this->strictMode;
    }

}