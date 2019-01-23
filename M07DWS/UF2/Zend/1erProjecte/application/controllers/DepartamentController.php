<?php

class DepartamentController extends Zend_Controller_Action
{

    public function init()
    {
        $session=new Zend_Session_Namespace('usuari');
        $nav=new Zend_Session_Namespace('nav');
        $acl= Zend_Registry::get('acl');
        //var_dump($acl->isAllowed($session->user['rol'],'Departament'));
        //exit;
        //if(!isset($session->sessio)){
        if(!$acl->isAllowed($session->user['rol'],'Departament')){
            $nav->Controller='Departament';
            $this->_redirect('/Login');
        }
    }

    public function indexAction()
    {
        // action body
        $Departament=new Application_Model_DbTable_Departament();
        $dpts=$Departament->fetchAll();
        $this->view->dpts=$dpts;
    }

    public function nouAction()
    {
        $form=new Application_Form_Departament();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $data=$this->getRequest()->getPost();
            if($form->isValid($data)){
                $nom=$data['nom'];
                $dpt=new Application_Model_DbTable_Departament();
                $dpt->nouDpt($nom);
                $this->_redirect('/Departament');
            }
        }
    }

    public function eliminarAction()
    {
        $dpt=new Application_Model_DbTable_Departament();
        $id=$this->_getParam('id',-1);
        $dpt->eliminarDpt($id);
        $this->_redirect('/Departament');
    }

    public function modificarAction()
    {
        $form=new Application_Form_Departament();
        $dpt=new Application_Model_DbTable_Departament();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $data=$this->getRequest()->getPost();
            if($form->isValid($data)){
                $nom=$data['nom'];
                $id=$data['id'];
                $dpt->modificarDpt($id,$nom);
                $this->_redirect('/Departament');
            }
        }else{
            $id=$this->_getParam('id',-1);
            $dept=$dpt->getOne($id);
            if(!$dept)$this->_redirect ('/Departament');
            $form->id->setValue($id);
            $form->populate($dept);
        }
    }


}







