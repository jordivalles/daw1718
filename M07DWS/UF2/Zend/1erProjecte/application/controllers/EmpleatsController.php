<?php

class EmpleatsController extends Zend_Controller_Action
{

    public function init()
    {
        $session=new Zend_Session_Namespace('usuari');
        $nav=new Zend_Session_Namespace('nav');
        if(!isset($session->sessio)){
            $nav->Controller='Empleats';
            $this->_redirect('/Login');
        }
    }

    public function indexAction()
    {
        $Empleats=new Application_Model_DbTable_Empleats();
        $emps=$Empleats->getAll();
        $this->view->emps=$emps;
    }

    public function nouAction()
    {
        $Empleat=new Application_Model_DbTable_Empleats();
        $Departament=new Application_Model_DbTable_Departament();
        $Tasques=new Application_Model_DbTable_Tasques();
        
        $dpt=$Departament->fetchAll();
        $form=new Application_Form_Empleats();
        $form->dpt->options=$this->recordSetToArray($dpt);
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $data=$this->getRequest()->getPost();
            if($form->isValid($data)){
                $nom=$data['nom'];
                $dept=$data['dpt'];
                
                if($dept!=-1){
                    $Empleat->nouEmp($nom,$dept);
                    $this->_redirect('/Empleats');
                }
                $Formulari=new Application_Form_Tasques();
                $form->addSubForm($Formulari,'Tasques');
                if(isset($data['Tasques'])){
                    $idemp=$Empleat->nouEmp($nom,$dept);
                    $Tasques->novaTasca($idemp, $data['Tasques']['tasca']);
                    $this->_redirect('/Empleats');
                }
            }
        }
    }
    private function recordSetToArray($arg){
        $result=array();
        foreach ($arg as $a){
            $result[$a->id]=$a->nom;
        }
        //$result[-1]='altres';
        return $result;
    }
    public function eliminarAction()
    {
        // action body
    }

    public function modificarAction()
    {
        // action body
    }


}









