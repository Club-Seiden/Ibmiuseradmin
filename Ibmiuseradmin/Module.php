<?php
namespace Ibmiuseradmin;

use Ibmiuseradmin\Model\Ibmiuseradmin;
use Ibmiuseradmin\Model\IbmiuseradminTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Ibmiuseradmin\Model\IbmiuseradminTable' =>  function($sm) {
                    $tableGateway = $sm->get('IbmiuseradminTableGateway');
                    $table = new IbmiuseradminTable($tableGateway);
                    return $table;
                },
                'IbmiuseradminTableGateway' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ibmiuseradmin());
                    return new TableGateway('USER', $dbAdapter, null, $resultSetPrototype);
                },
            ),
        );
    }
    
    
    public function getAutoloaderConfig()
    {
        return array(
            /*'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),*/
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}