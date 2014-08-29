<?php
namespace Ibmiuseradmin\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;

class IbmiuseradminTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('user_id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function saveUser(Ibmiuseradmin $user)
    {
        $data = array(
            'username' => $user->username,
            'display_name'  => $user->display_name,
            'password' => $user->password,
        ); 
        $bcrypt = new Bcrypt();       
        $securePass = $bcrypt->create($data['password']);
        $data['password'] = $securePass;
    
        $id = (int)$user->user_id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getIbmiuseradmin($id)) {
                $this->tableGateway->update($data, array('user_id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }
    
    public function deleteUser($id)
    {
        $this->tableGateway->delete(array('user_id' => $id));
    }


}