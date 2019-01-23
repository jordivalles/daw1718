<?php

class Application_Form_Login extends Zend_Form
{

    public function init()
    {
        $nom=new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nick');
        $nom->setRequired(true);
        
        $password=new Zend_Form_Element_Password('password');
        $password->setLabel('Password');
        $password->setRequired(true);
        $password->addValidator('regex',false,array('/^A\w{3,4}$/'));
        //$password->addValidator('regex',false,array('/^A'));
        
        $submit=new Zend_Form_Element_Submit('Enviar');
        $submit->setValue('Enviar');
        
        $this->addElements(array($nom,$password,$submit));
    }


}

