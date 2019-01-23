<?php

class Application_Form_Departament extends Zend_Form
{

    public function init()
    {
        $id=new Zend_Form_Element_Hidden('id');
        
        $nom=new Zend_Form_Element_Text('nom');
        $nom->setLabel('Nom del departament');
        $nom->setRequired(true);
        
        $submit=new Zend_Form_Element_Submit('Enviar');
        $submit->setValue('Enviar');
        
        $this->addElements(array($id,$nom,$submit));
    }


}

