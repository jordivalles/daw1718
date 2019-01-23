<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_redirect("Departament/index");
    }

    public function indexAction()
    {
        // action body
        $this->_redirect("Departament/index");
    }

}



