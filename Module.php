<?php
namespace Ibmiuseradmin;

// This is the file that creates the objects we will work with from our database
use Ibmiuseradmin\Model\Ibmiuseradmin;
// The table contains all our actions we will do to our database
use Ibmiuseradmin\Model\IbmiuseradminTable;
// Takes in the file that defines our objects from the database and gives a way of storing the results
use Zend\Db\ResultSet\ResultSet;
// This is used to crate the gateway to our database table by hitting the table, using the database adapter,
// and where it will store the results
use Zend\Db\TableGateway\TableGateway;

class Module
{
    
    /*
     * This method pulls in the service config that is global for the entire system. Basically it creates
     * one giant array that stores a bunch of key value pairs that confi the system.
     * Doing it in here it does the same thing as adding entries to module.config.php.
     *
     * This one specifically is going to create two factories. Factories are used to instantiate
     * classes that need variables to be instantiated as opposed to invokables that require
     * no variables to be instantiated.
     */
    public function getServiceConfig()
    {
        return array(
            
            'factories' => array(
            /*
             *  This creates the tablegateway to interact with the database. It is using a closure (aka anonymous function)
             *  as the value it is setting. 
             */
                'Ibmiuseradmin\Model\IbmiuseradminTable' => function ($sm)
                {
                    $tableGateway = $sm->get('IbmiuseradminTableGateway');
                    $table = new IbmiuseradminTable($tableGateway);
                    return $table;
                },
                /*
                 * This is taking in the database adapter, the resultsetprototype, creating an instance with your model
                 * of the database results and returns an object that can interact with the database. 
                 */
                'IbmiuseradminTableGateway' => function ($sm)
                {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Ibmiuseradmin());
                    return new TableGateway('USER', $dbAdapter, null, $resultSetPrototype);
                }
            )
        );
    }
    /*
     * This loads all the classes in each file and makes them available througout the module. The classmapautoloader
     * loads all the files explicitly and is faster. The standard autoloader will go 'discover' all the available
     * classes but does take processing. Once you are in production it would improve performance to comment out the
     * standard autoloader. 
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }
    
    /*
     * This grabs the config file from the confgi directory and adds it to the service manager
     * array.
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}