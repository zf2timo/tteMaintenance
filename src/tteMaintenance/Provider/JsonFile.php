<?php


namespace tteMaintenance\Provider;


use tteMaintenance\Exception\FileNotException;
use tteMaintenance\Exception\InvalidFileException;
use tteMaintenance\Options\JsonFileOptionsInterface;
use Zend\Json\Json;

class JsonFile extends AbstractProvider
{
    /**
     * @var JsonFileOptionsInterface
     */
    protected $options;

    /**
     * @param JsonFileOptionsInterface $options
     */
    public function __construct(JsonFileOptionsInterface $options)
    {
        $this->setOptions($options);
    }

    /**
     * @throws \tteMaintenance\Exception\FileNotException
     * @throws \tteMaintenance\Exception\InvalidFileException
     * @return bool
     */
    public function isMaintenance()
    {
        if (!is_readable($this->getOptions()->getTargetFile()) ||
            !is_file($this->getOptions()->getTargetFile())) {
            if ($this->getOptions()->getStrictMode()) {
                throw new FileNotException(sprintf(
                    'The file "%s" wasn\'t found or isn\'t readable.',
                    $this->getOptions()->getTargetFile()
                ));
            } else {
                return false;
            }
        }

        $jsonContent = file_get_contents($this->getOptions()->getTargetFile());
        $arrayContent = Json::decode($jsonContent, Json::TYPE_ARRAY);

        if ($arrayContent === false ||
            count($arrayContent) == 0 ||
            !isset($arrayContent[$this->getOptions()->getPropertyName()])) {
            if ($this->getOptions()->getStrictMode()) {
                throw new InvalidFileException(sprintf(
                    'Content wasn\'t valid Json or Property "%s" isn\'t set.',
                    $this->getOptions()->getPropertyName()
                ));
            } else {
                return false;
            }
        }

        if ((bool)$arrayContent[$this->getOptions()->getPropertyName()] === true) {
            return true;
        }
        return false;
    }

    /**
     * @param \tteMaintenance\Options\JsonFileOptionsInterface $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return \tteMaintenance\Options\JsonFileOptionsInterface
     */
    public function getOptions()
    {
        return $this->options;
    }
}