<?php

class UploadController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $form = new Application_Form_Upload();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            $data = $this->getRequest()->isPost();
            if($form->isValid($data)){
                $form->file->receive();
                $form->file->setDestination(APPLICATION_PATH . '/uploads/'. $form->file->getFileInfo["name"]);
                var_dump($form->file->getFileInfo);
                exit;
            }
        }
    }


}

