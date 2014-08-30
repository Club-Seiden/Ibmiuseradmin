<?php
return array(
    /*
     * We have one controller we are using in this module. One key thing to understand is that this is declaring
     * the full namespace of the method on the right, and on the left it is used for clarification for potentially 
     * like named files. 
     */
    'controllers' => array(
        'invokables' => array(
            'Ibmiuseradmin\Controller\Ibmiuseradmin' => 'Ibmiuseradmin\Controller\IbmiuseradminController'
        )
    ),
    /*
     * This is a child route of the ZFCAdmin module. We can add child routes from one module to another as long as we
     * specifiy the route we are a child of. Because it is a child route you must refer to it with its parent route to
     * use it. In this case that would be zfcadmin/ibmiuseradmin
     */
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
                        ),
                        
                        'page' => array(
                            'type' => 'Segment',
                            'options' => array(
                                'route' => '/imbiuseradmin/page/[:page[/]]',
                                'constraints' => array(
                                    'page' => '[0-9]+'
                                ),
                                'defaults' => array(
                                    'page' => 1,
                                    'controller' => 'Ibmiuseradmin\Controller\Ibmiuseradmin',
                                    'action' => 'index'
                                )
                            )
                        )
                        
                    )
                )
            )
        )
    ),
    /*
     * This adds navigation to our admin tree. This allows it to show up on the main menu of the admin module. 
     */
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