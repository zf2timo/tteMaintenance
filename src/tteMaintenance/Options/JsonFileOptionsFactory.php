<?php


namespace tteMaintenance\Options;


class JsonFileOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\JsonFileOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'jsonFile';
    }
}