<?php
namespace DataProviders\Module\Configuration;

$config = array(
    'controllers' => array(
        'invokables' => array(
		'dataProviders' => 'DataProviders\Controller\DataProvidersController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'dataProviders' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/dataProviders[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'dataProviders',
                        'action' => 'Home',
                    ),
                ),
            ),
        ),
    ),
);



return $config;
