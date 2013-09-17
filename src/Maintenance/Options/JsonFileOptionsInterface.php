<?php


namespace Maintenance\Options;


interface JsonFileOptionsInterface
{
    public function getTargetFile();

    public function setTargetFile($targetFile);

    public function getPropertyName();

    public function setPropertyName($propertyName);
}