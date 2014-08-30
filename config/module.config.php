<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Ibmiuseradmin\Controller\Ibmiuseradmin' => 'Ibmiuseradmin\Controller\IbmiuseradminController'
        )
    ),
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'ibmiuseradmin' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/ibmiuseradmin[/:action][/:user_id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'user_id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'controller' => 'Ibmiuseradmin\Controller\Ibmiuseradmin',
                                'action' => 'index'
                            )
                        )
                    )
                )
            )
        )
    ),
    'navigation' => array(
        'admin' => array(
            'ibmiuseradmin' => array(
                'label' => 'IBM i Users',
                'route' => 'zfcadmin/ibmiuseradmin'
            )
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'ibmiuseradmin' => __DIR__ . '/../view'
        )
    )
);