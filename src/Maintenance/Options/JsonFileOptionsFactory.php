<?php


namespace Maintenance\Options;


class JsonFileOptionsFactory extends AbstractOptionFactory
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