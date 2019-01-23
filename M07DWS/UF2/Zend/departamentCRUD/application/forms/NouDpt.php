<?php

class Application_Form_NouDpt extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        $this->setName('dptForm');
        
        $id = new Zend_Form_Element_Hidden('id');
        
        $nom = new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom:')
                ->setRequired(true)
		->addFilter('StringTrim');		

	$enviar = new Zend_Form_Element_Submit('enviar');
	$this->addElements(array($nom, $id, $enviar));
    }
}
