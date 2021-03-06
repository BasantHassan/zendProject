<?php
class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $categories = new Application_Model_DbTable_Category();
        $this->view->categories = $categories->fetchAll();
    }

    public function addAction()
    {
        $form=new Application_Form_Category();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $name=$form->getValue('name');
                $category=new Application_Model_DbTable_Category();
                $category->addCategory($name);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        $user = new Application_Model_DbTable_Category();
        $id = $this->getRequest()->getParam('id');
        if($user->deleteCategory($id))
            $this->redirect('Category/index');
    }

    public function listAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


}









