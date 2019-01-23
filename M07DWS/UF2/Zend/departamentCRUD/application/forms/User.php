<?php

class Application_Form_User extends Zend_Form
{

    public function init()
    {        
        $this->setName('loginForm');
                
        $nom = new Zend_Form_Element_Text('nom');
        $nom->setLabel('Username:')
                ->setRequired(true)
		->addFilter('StringTrim');		

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password:')
                ->setRequired(true)
		->addFilter('StringTrim');
        
	$enviar = new Zend_Form_Element_Submit('enviar');
	$this->addElements(array($nom, $password, $enviar));
    }


}

