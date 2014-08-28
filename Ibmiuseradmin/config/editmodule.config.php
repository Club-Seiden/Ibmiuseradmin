<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'ibmiuseradmin' => 'Ibmiuseradmin\Controller\IbmiuseradminController'
        )
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'ibmiuseradmin' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/ibmiuseradmin',
                            'defaults' => array(
                                'controller' => 'ibmiuseradmin',
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
                'route' => 'zfcadmin/ibmiuseradmin',
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'ibmiuseradmin' => __DIR__ . '/../view'
        )
    )
);