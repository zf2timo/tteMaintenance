<?php


namespace tteMaintenance\Options;


class ManuelOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\ManuelOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'manuel';
    }
}