<?php

return array(
    'factories' => array(
        // Option Factories
        'tteMaintenance\Options\ModuleOptionsFactory' => 'tteMaintenance\Options\ModuleOptionsFactory',
        'tteMaintenance\Options\TimeSpanOptionsFactory' => 'tteMaintenance\Options\TimeSpanOptionsFactory',
        'tteMaintenance\Options\ManualOptionsFactory' => 'tteMaintenance\Options\ManualOptionsFactory',
        'tteMaintenance\Options\JsonFileOptionsFactory' => 'tteMaintenance\Options\JsonFileOptionsFactory',

        // Provider Factories
        'tteMaintenance\Provider\TimeSpanFactory' => 'tteMaintenance\Provider\TimeSpanFactory',
        'tteMaintenance\Provider\ManualFactory' => 'tteMaintenance\Provider\ManualFactory',
        'tteMaintenance\Provider\JsonFileFactory' => 'tteMaintenance\Provider\JsonFileFactory',
    ),
);
