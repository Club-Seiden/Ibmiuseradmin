<?php
namespace Ibmiuseradmin\Form;

use Zend\Form\Form;

class IbmiuseradminForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ibmiuseradmin');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'user_id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'username',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Username',
            ),
        ));
        $this->add(array(
            'name' => 'display_name',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Display Name',
            ),
        ));
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Email',
            ),
        ));
        $this->add(array(
            'name' => 'status',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Status',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}