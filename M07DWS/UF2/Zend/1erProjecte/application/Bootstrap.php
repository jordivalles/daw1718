<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    function _initAcl(){
        //Creació acl
        $this->getApplication()->bootstrap('db');
        $acl=new Zend_Acl();
        $recs=new Application_Model_DbTable_Recursos();
        foreach($recs->fetchAll()->toArray() as $item){
            $acl->addResource(new Zend_Acl_Resource($item['recurs']));
            //echo ' recurs:'.$item['recurs'];
        }
        $rols=new Application_Model_DbTable_Rols();
        foreach ($rols->fetchAll()->toArray() as $item){
            $acl->addRole(new Zend_Acl_Role($item['rolid']),$item['parentrol']);
        
          //echo ' rols:'.$item['rolid']."parent rol:".$item['parentrol'];
        }
        $permisos=new Application_Model_DbTable_Permisos();
        foreach ($permisos->fetchAll()->toArray() as $item){
            $acl->allow($item['rol'],$item['recurs']);
            //echo ' permis:'.$item['rol']."recurs:".$item['recurs'];
        }
        Zend_Registry::set('acl',$acl);
        
        $this->bootstrap('layout');
        $layout = $this->getResource("layout");
        $view = $layout->getView();
        
        $view->var1 = "Hola";
    }

}

