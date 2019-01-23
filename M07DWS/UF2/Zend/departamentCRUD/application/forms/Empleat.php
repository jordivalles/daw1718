<?php

class Application_Form_Empleat extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        $this->setName('empForm');
        
        $id = new Zend_Form_Element_Hidden('id');
        
        $nom = new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom:')
                ->setRequired(true)
		->addFilter('StringTrim');		
        
        $dpt = new Zend_Form_Element_Select('dpt');
        $dpt->setLabel('Departament:');
                
	$enviar = new Zend_Form_Element_Submit('enviar');
	$this->addElements(array($nom, $id, $dpt, $enviar));
    }
}

