<?php

class Application_Model_DbTable_Usuaris extends Zend_Db_Table_Abstract
{

    protected $_name = 'usuaris';

    function isValid($user,$password){
        $usuari=$this->fetchRow("user='".$user."' and password='".$password."'");
        if(!$usuari){
            return null;
        }
        return $usuari->toArray();
    }
}

