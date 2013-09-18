<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'tteMaintenance\Controller\Skeleton' => 'tteMaintenance\Controller\SkeletonController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'tteMaintenance' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/maintenance.html',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Maintenance\Controller',
                        'controller'    => 'Maintenance',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Maintenance' => __DIR__ . '/../view',
        ),
    ),
);
