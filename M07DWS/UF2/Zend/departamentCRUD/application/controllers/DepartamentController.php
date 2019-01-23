<?php

class DepartamentController extends Zend_Controller_Action
{

    public function init()
    {
        
    }

    public function indexAction()
    {
        $var = "hola";
        $this->view->var = $var;
        
        $dpts = new Application_Model_DbTable_Departament();
        $this->view->dpts = $dpts->fetchAll();
    }

    public function guardarAction()
    {
     
        $form = new Application_Form_NouDpt ();
        $form->setAction ('guardar');
        $this->view->frm = $form; 
        
        if ($this->getRequest()->isPost()){ 
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $nom = $form->getValue('nom');
                
                // Gravem
                $dpts = new Application_Model_DbTable_Departament();
                $dpts->guardar($nom);
                $this->_redirect("Departament");
            } else { 
		$this->view->errorNom = $form->getErrors('nom');
                $form->populate($formData);
            }
        }
    }

    public function eliminarAction()
    {
        $dpts = new Application_Model_DbTable_Departament();
        $id = $this->_getParam('id');
        $dpts->eliminar($id);
        $this->_redirect('Departament/');
    }

    public function modificarAction()
    {
        $form = new Application_Form_NouDpt ();
        $dpts = new Application_Model_DbTable_Departament();
        
        // $form->setAction ('modificar');
        $this->view->frm = $form; 
        
        if ($this->getRequest()->isPost()){ 
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)){
                $nom = $form->getValue('nom');
                $id = $form->getValue('id');

                // Gravem
                $dpts->editar($id, $nom);
                $this->_redirect("Departament");
            } else {
                $form->populate($formData); 
            }
        } else {
            // Primera vegada
            $form->id->setValue($this->_getParam('id'));
            
            $dpt = $dpts->seleccionar ($this->_getParam('id'));
            $form->populate($dpt);       
        }
    }
}







