<?php


namespace Maintenance\Options;


class JsonFileFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'Maintenance\Options\JsonFileOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'jsonFile';
    }
}