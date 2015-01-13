<?php

namespace tteMaintenance\Options;

class TimeSpanOptionsFactory extends AbstractOptionFactory
{

    /**
     * @return string
     */
    public function getClass()
    {
        return 'tteMaintenance\Options\TimeSpanOptions';
    }

    /**
     * @return string
     */
    public function getConfigKey()
    {
        return 'timeSpan';
    }
}
