<?php

class Application_Form_Empleats extends Zend_Form
{

    public function init()
    {
        $nom=new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom del empleat');
        $nom->setRequired(true);
        
        $dpt=new Zend_Form_Element_Select('dpt');
        $dpt->setLabel('Departament');
        $dpt->setRequired(true);
        
        $submit=new Zend_Form_Element_Submit('Enviar');
        $submit->setValue('Enviar');
        $submit->setOrder(10);
        $this->addElements(array($nom,$dpt,$submit));
    }

}

