<?php
namespace Ibmiuseradmin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Ibmiuseradmin\Model\Ibmiuseradmin;
use Ibmiuseradmin\Form\IbmiuseradminForm;

class IbmiuseradminController extends AbstractActionController
{

    protected $ibmiuseradminTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'users' => $this->getIbmiuseradminTable()->fetchAll()
        ));
    }

    public function addAction()
    {
        $form = new IbmiuseradminForm();
        $form->get('submit')->setValue('Add');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('option');
        
            if ($del == 'Cancel') {
            return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
        
        }
        
        if ($request->isPost()) {
            $user = new Ibmiuseradmin();
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()) {
                $user->exchangeArray($form->getData());
                $this->getIbmiuseradminTable()->saveUser($user);
                
                return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
        }
        return array(
            'form' => $form
        );
    }


    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('user_id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
        }
        
        $user = $this->getIbmiuseradminTable()->getUser($id);
        
        $form = new IbmiuseradminForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('option');
        
            if ($del == 'Cancel') {
                return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
        
        }
        
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
             
            if ($form->isValid()) {
                $this->getIbmiuseradminTable()->saveUser($form->getData());
                
                return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
        }
        
        return array(
            'user_id' => $id,
            'form' => $form
        );
    }

    public function editpasswordAction()
    {
        $id = (int) $this->params()->fromRoute('user_id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
        }
    
        $user = $this->getIbmiuseradminTable()->getUser($id);
    
        $form = new IbmiuseradminForm();
        $form->bind($user);
        $form->get('submit')->setAttribute('value', 'Edit');
    
        $request = $this->getRequest();
    
        if ($request->isPost()) {
            $del = $request->getPost('option');
    
            if ($del == 'Cancel') {
                return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
    
        }
    
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());
             
            if ($form->isValid()) {
                $this->getIbmiuseradminTable()->saveUser($form->getData());
    
                return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
            }
        }
    
        return array(
            'user_id' => $id,
            'form' => $form
        );
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('user_id', 0);
        if (! $id) {
            return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');
            
            if ($del == 'Yes') {
                $id = (int) $request->getPost('user_id');
                $this->getIbmiuseradminTable()->deleteUser($id);
            }
            
            return $this->redirect()->toRoute('zfcadmin/ibmiuseradmin');
        }
        
        return array(
            'user_id' => $id,
            'user' => $this->getIbmiuseradminTable()->getUser($id)
        );
    }

    public function getIbmiuseradminTable()
    {
        if (! $this->ibmiuseradminTable) {
            $sm = $this->getServiceLocator();
            $this->ibmiuseradminTable = $sm->get('Ibmiuseradmin\Model\IbmiuseradminTable');
        }
        return $this->ibmiuseradminTable;
    }
}