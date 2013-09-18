<?php


namespace tteMaintenance\Options;


interface JsonFileOptionsInterface
{
    public function getTargetFile();

    public function setTargetFile($targetFile);

    public function getPropertyName();

    public function setPropertyName($propertyName);

    public function getStrictMode();

    public function setStrictMode($isStrictMode);
}