<?php


namespace Maintenance\Options;


class ManuelOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'Maintenance\Options\ManuelOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'manuel';
    }
}