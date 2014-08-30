<?php
namespace Ibmiuseradmin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

class IbmiuseradminTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll($paginated = false)
    {
        /*
         * if ($paginated) {
         * $resultSet = $this->tableGateway->select();
         * $paginatorAdapter = new DbSelect (
         * $select->where ( $data ),
         * // the adapter to run it against
         * $this->tableGateway->getAdapter (),
         * // the result set to hydrate
         * $resultSetPrototype );
         * $paginator = new Paginator ( $paginatorAdapter );
         * return $paginator;
         * }
         */
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(array(
            'user_id' => $id
        ));
        $row = $rowset->current();
        if (! $row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveUser(Ibmiuseradmin $user, $password = false)
    {
        $data = array(
            'username' => $user->username,
            'display_name' => $user->display_name,
            'state' => $user->state,
            'email' => $user->email
        );
        
        if ($password) {
            $bcrypt = new Bcrypt();
            $bcrypt->setCost(14);
            $securepass = $bcrypt->create($user->password);
            $data['password'] = $securepass;
        }
        
        $id = (int) $user->user_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getUser($id)) {
                $this->tableGateway->update($data, array(
                    'user_id' => $id
                ));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteUser($id)
    {
        $this->tableGateway->delete(array(
            'user_id' => $id
        ));
    }
}