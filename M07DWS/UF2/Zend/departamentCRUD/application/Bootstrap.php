<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    public function _initACL () 
    {
        
        $acl = new Zend_Acl();
        $acl->addRole(new Zend_Acl_Role ('user'));
        $acl->addRole(new Zend_Acl_Role ('admin'), 'user');
        
        $acl->addResource(new Zend_Acl_Resource('empleats_index'));
        $acl->addResource(new Zend_Acl_Resource('empleats_update'));
        
        $acl->allow ('user', 'empleats_index');
        $acl->deny ('user', 'empleats_update');
        $acl->allow ('admin', 'empleats_update');
        
        Zend_Registry::set('acl',$acl);

    }
    
    public function _initMenu () 
    {
        $menu = array (
            '0' => array ('nom' => 'Llistat empleats', 'cont' => 'empleat', 'action' => 'index'), 
            '1' => array ('nom' => 'Nou empleat', 'cont' => 'empleat', 'action' => 'guardar'), 
        );
        Zend_Registry::set('menu', $menu);
    }
}

