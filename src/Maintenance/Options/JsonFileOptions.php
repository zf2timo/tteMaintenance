<?php


namespace Maintenance\Options;


class JsonFileOptions implements JsonFileOptionsInterface
{
    /**
     * @var string
     */
    protected $targetFile;

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
}