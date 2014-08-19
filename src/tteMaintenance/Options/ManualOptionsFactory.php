<?php


namespace tteMaintenance\Options;


class ManualOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\ManualOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'manual';
    }
}