<?php

namespace tteMaintenance\Options;

class ModuleOptionsFactory extends AbstractOptionFactory
{
    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\ModuleOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'global';
    }
}
