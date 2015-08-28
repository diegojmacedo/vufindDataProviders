<?php
namespace DataProviders\Module\Configuration;

$config =[
    'controllers' => [
        'invokables' => [
		'dataProviders' => 'DataProviders\Controller\DataProvidersController',
        ],
    ],
    'vufind' => [
        // This section contains service manager configurations for all VuFind
        // pluggable components:
        'plugin_managers' => [
            'db_table' => [
                'invokables' => [
                    'dataProvider' => 'DataProviders\Db\Table\DataProvider',
                ],
            ],
        ],
    ],

    'router' => [
        'routes' => [
            'dataProviders' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/dataProviders[/:action][/:id]',
                    'constraints' =>[
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => 'dataProviders',
                        'action' => 'Home',
                    ],
                ],
            ],
        ],
    ],
];



return $config;
