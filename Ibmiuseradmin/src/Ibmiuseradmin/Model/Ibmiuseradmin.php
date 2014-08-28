<?php
namespace Ibmiuseradmin\Model;

use Zend\InputFilter\Factory as InputFactory;     // <-- Add this import
use Zend\InputFilter\InputFilter;                 // <-- Add this import
use Zend\InputFilter\InputFilterAwareInterface;   // <-- Add this import
use Zend\InputFilter\InputFilterInterface;        // <-- Add this import

class Ibmiuseradmin
{

    protected $inputFilter; 
    
    public $user_id;
    public $username;
    public $email;
    public $display_name;
    public $password;
    public $state;

    public function exchangeArray($data)
    {
        $this->user_id = (isset($data['user_id'])) ? $data['user_id'] : null;
        $this->username = (isset($data['username'])) ? $data['username'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->display_name = (isset($data['display_name'])) ? $data['display_name'] : null;
        $this->password = (isset($data['password'])) ? $data['password'] : null;
        $this->state = (isset($data['state'])) ? $data['state'] : null;
    }
    
    // Add content to this method:
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
    
    public function getInputFilter()
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();
    
            $inputFilter->add($factory->createInput(array(
                'name'     => 'user_id',
                'required' => true,
                'filters'  => array(
                    array('name' => 'Int'),
                ),
            )));
    
            $inputFilter->add($factory->createInput(array(
                'name'     => 'username',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ),
                ),
            )));
    
            $inputFilter->add($factory->createInput(array(
                'name'     => 'display_name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 1,
                            'max'      => 100,
                        ),
                    ), 
                ),
            )));
    
            $this->inputFilter = $inputFilter;
        }
    
        return $this->inputFilter;
    }
    
}