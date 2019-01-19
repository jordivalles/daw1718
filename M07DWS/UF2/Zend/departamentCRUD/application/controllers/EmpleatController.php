<?php

class EmpleatController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $acl = Zend_Registry::get('acl');
            
        if (! $acl->isAllowed('admin', 'empleats_update'))
                $this->_redirect("Login/logout");
        
        $this->_helper->layout->setLayout('layout2');
    }

    public function indexAction()
    {
        $emps = new Application_Model_DbTable_Empleat();
        // $this->view->emps = $emps->fetchAll();
        $this->view->emps = $emps->allInfo();
        
    }

    public function guardarAction()
    {        
        $depmodel = new Application_Model_DbTable_Departament();
        $dpts = $depmodel->allData();
        
        $form = new Application_Form_Empleat();
        $form->dpt->addMultiOptions($dpts); //    >
        
        $this->view->frm = $form; 
        
        if ($this->getRequest()->isPost()){ 
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $nom = $form->getValue('nom');
                $dpt = $form->getValue('dpt');
                
                // Gravem
                $empmodel = new Application_Model_DbTable_Empleat();
                $empmodel->guardar($nom, $dpt);
                $this->_redirect("Empleat");
            } else { 
                $form->populate($formData);
            }
        }
        // action body
    }

    public function eliminarAction()
    {
        $empmodel = new Application_Model_DbTable_Empleat();
        $id = $this->_getParam('id');
        $empmodel->eliminar($id);
        $this->_redirect('Empleat/');
    }

    public function modificarAction()
    {
        
        // Model de departaments per obtenir els dpt del desplegablñe
        $depmodel = new Application_Model_DbTable_Departament();
        $dpts = $depmodel->allData();
        
        // Omplim el desplegable de la vista
        $form = new Application_Form_Empleat();
        $form->dpt->addMultiOptions($dpts); //    >
                
        // Form a la vista
        $this->view->frm = $form;

        // Model d'empleats
        $depemps = new Application_Model_DbTable_Empleat();

                
        if ($this->getRequest()->isPost()){ 
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $nom = $form->getValue('nom');
                $id = $form->getValue('id');
                $dpt = $form->getValue('dpt');

                $depemps->editar($id, $nom, $dpt);
                
                $this->_redirect("Empleat");
            } else {
                $form->populate($formData); 
            }
        } else {
            // Primera vegada
            $form->id->setValue($this->_getParam('id'));
            
            $emp = $depemps->seleccionar ($this->_getParam('id'));
            $form->populate($emp);       
        }
    }
}







