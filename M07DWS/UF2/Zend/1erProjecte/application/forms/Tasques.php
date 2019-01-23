<?php

class Application_Form_Tasques extends Zend_Form_SubForm
{

    public function init()
    {
        $tasca=new Zend_Form_Element_Text('tasca');
        $tasca->setLabel('Indica tasca');
        $tasca->setRequired(true);
        
        $this->addElements(array($tasca));
    }


}

