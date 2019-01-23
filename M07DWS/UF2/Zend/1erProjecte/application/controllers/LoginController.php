<?php

class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        $session=new Zend_Session_Namespace('usuari');
        $session->unsetAll();
        $this->_helper->layout()->setLayout("layout2");
        $this->view->title = "Pagina inicial";
    }

    public function indexAction()
    {
        $form=new Application_Form_Login();
        $usuaris=new Application_Model_DbTable_Usuaris();
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $data=$this->getRequest()->getPost();
            if($form->isValid($data)){
                $nom=$data['nom'];
                $password=$data['password'];
                $aux=$usuaris->isValid($nom,$password);
                if($aux!=null){
                    $session=new Zend_Session_Namespace('usuari');
                    $nav=new Zend_Session_Namespace('nav');
                    $session->sessio=1;
                    $session->user=$aux;
                    $this->_redirect('/'.$nav->Controller);
                }
                $this->_redirect('/Login');
            }else{
                var_dump($form->password->getMessages());
                exit;
            }
        }
    }

    public function destroyAction()
    {
        $this->_redirect('/Login');
    }


}



