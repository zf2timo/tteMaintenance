<?php

return array(
    'factories' => array(
        // Option Factories
        'tteMaintenance\Options\ModuleOptionsFactory' => 'tteMaintenance\Options\ModuleOptionsFactory',
        'tteMaintenance\Options\TimeSpanOptionsFactory' => 'tteMaintenance\Options\TimeSpanOptionsFactory',
        'tteMaintenance\Options\ManuelOptionsFactory' => 'tteMaintenance\Options\ManuelOptionsFactory',
        'tteMaintenance\Options\JsonFileOptionsFactory' => 'tteMaintenance\Options\JsonFileOptionsFactory',

        // Provider Factories
        'tteMaintenance\Provider\TimeSpanFactory' => 'tteMaintenance\Provider\TimeSpanFactory',
        'tteMaintenance\Provider\ManuelFactory' => 'tteMaintenance\Provider\ManuelFactory',
        'tteMaintenance\Provider\JsonFileFactory' => 'tteMaintenance\Provider\JsonFileFactory',
    ),
);
